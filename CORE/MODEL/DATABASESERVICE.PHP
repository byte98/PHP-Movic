<?php
// PHP-Movic - base platform for PHP applications.
// Copyright (C) 2024 Jiri Skoda <developer@skodaj.cz>
// 
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
// 
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
// 
// You should have received a copy of the GNU General Public License
// along with this program; if not, write to the Free Software
// Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
// 

namespace PHPMovic\Model;

use PHPMovic\Application;
use PHPMovic\Model\Database\Query;
use PHPMovic\Model\ObjectFactory;
use PHPMovic\Model\DatabaseObject;
use PHPMovic\Model\DatabaseObjectModel;
use PHPMovic\Model\DatabaseProperty;
use PHPMovic\Model\DatabasePropertyModel;
use PHPMovic\Model\DatabaseType;

/**
 * Class representing service which can work with database objects.
 */
class DatabaseService
{
    /**
     * Target of all database manipulations.
     */
    private readonly string $target;

    /**
     * Factory of objects.
     */
    private readonly ObjectFactory $factory;

    /**
     * Flag, whether target is servicable.
     */
    private bool $servicable;

    /**
     * Model of realised object.
     */
    private ?DatabaseObjectModel $objectModel = null;

    /**
     * Creates new service which can work with database objects.
     * @param string $target Name of class of all database manipulations.
     * @param ObjectFactory $factory Factory of objects.
     */
    public function __construct(string $target, ObjectFactory $factory)
    {
        $this->target = $target;
        $this->factory = $factory;
        $this->servicable = $this->checkTarget();
        if ($this->servicable == false)
        {
            Application::logger()->error("Cannot create database service for '" . $this->target . "': target is database object!");
        }
        else
        {
            $this->init();
        }
    }

    /**
     * Initializes service.
     */
    private function init(): void
    {
        Application::logger()->low("Initializing database service for '" . $this->target . "'");
        $reflector = new \ReflectionClass($this->target);
        $attrs = $reflector->getAttributes();
        $tabName = "";
        foreach( $attrs as $attr )
        {
            if ($attr->getName() == DatabaseObject::class)
            {
                $args = $attr->getArguments();
                if (count($args) > 0)
                {
                    $tabName = strval($args[0]);
                }
            }
        }
        if (strlen($tabName) >= 1)
        {
            $this->objectModel = new DatabaseObjectModel($tabName, $this->target);
            $props = $reflector->getProperties();
            foreach( $props as $prop )
            {
                $attrs = $prop->getAttributes();
                foreach( $attrs as $attr )
                {
                    if ($attr->getName() == DatabaseProperty::class)
                    {
                       $args = $attr->getArguments();
                       if (count($args) >= 2 && $args[0] instanceof DatabaseType)
                       {
                            $this->objectModel->addProperty(new DatabasePropertyModel(
                                strval($args[1]),
                                $args[0],
                                $prop->getName()
                            ));
                       }
                    }
                }
            }
            if (count($this->objectModel->getIdentifiers()) > 0 == false)
            {
                Application::logger()->warning("Class '" . $this->target . "' does not have any identifier properties!");
            }
        }
        else
        {
            Application::logger()->error("Cannot create database service for '" . $this->target . "': table name not found!");
        }
        
    }

    /**
     * Checks target, wheter is servicable by service.
     * @return bool TRUE if target is servicable by service,
     *              FALSE otherwise.
     */
    private function checkTarget(): bool
    {
        Application::logger()->low("Checking class '" . $this->target . "' attributes");
        $reti = false;
        $reflector = new \ReflectionClass($this->target);
        foreach($reflector->getAttributes() as $attribute)
        {
            $name = $attribute->getName();
            if ($name == DatabaseObject::class)
            {   
                Application::logger()->debug("Found attribute of class '" . $this->target . "': " . $name . " - OK");
                $reti = true;
                break;
            }
            Application::logger()->debug("Found attribute of class '" . $this->target . "': " . $name);
        }
        return $reti;
    }

    /**
     * Prepares string which preforms selction of right rows in database.
     */
    private function prepareSelectionString(): string
    {
        $reti = "";
        $identifiers = $this->objectModel->getIdentifiers();
        if (count($identifiers) > 0)
        {
            $reti .= " WHERE ";
        }
        for($i = 0; $i < count($identifiers); $i++)
        {
            $reti .= $identifiers[$i]->getColumn() . "=%" . $identifiers[$i]->getName() . "%"; 
            if ($i < count($identifiers) -1)
            {
                $reti .= " AND ";
            }
        }
        return $reti;
    }

    /**
     * Checks, whether object matches this database service.
     * @param object $object Object to check.
     * @return bool TRUE if object matches this database service,
     *              FALSE otherwise.
     */
    private function checkObject(object $object): bool
    {
        $reti = false;
        if ($object::class == $this->target)
        {
            $reti = true;
            Application::logger()->debug("Checking object '" . $object::class . "' for use by service '" . $this->target . "': OK");
        }
        else
        {
            Application::logger()->warning("Cannot use object '" . $object::class . "' for use by service for '" . $this->target . "'!");
        }
        return $reti;
    }

    /**
     * Applies data from object to the query.
     * @param Query $query Query which will be filled with data.
     * @param object $object Object from which data will be taken.
     */
    private function applyQueryData(Query &$query, object $object): void
    {
        foreach($this->objectModel->getProperties() as $property)
        {
            $query->setValue($property->getName(), $object->{$property->getName()});
        }
    }

    /**
     * Reads object by its identifiers.
     * @param array $identifiers Array with values of identifiers
     *                           (in the same order as in database object definition).
     * @return object Object read from database,
     *                or NULL if object does not exist.
     */
    public function read(array $identifiers): ?object
    {
        $reti = null;
        $queryString = "SELECT * FROM " . $this->prepareSelectionString();
        $query = new Query($queryString);
        $propIds = $this->objectModel->getIdentifiers();
        for($i = 0; $i < $propIds; $i++)
        {
            if ($i < count($identifiers))
            {
                $query->setValue($propIds[$i]->getName(), $identifiers[$i]);
            }
        }
        $result = Application::db()->query($query);
        if ($result->isSuccess())
        {
            if (count($result->getResults()) > 0)
            {
                Application::logger()->debug("Found " . $this->target . " with identifiers: " . implode(", ", $identifiers));
                $reti = $this->factory->createOne($result->getResults()[0]);
            }
            else
            {
                Application::logger()->base("There is no '" . $this->target . "' with identifiers: " . implode(", ", $identifiers));
            }
        }
        else
        {
            Application::logger()->warning("Reading '" . $this->target . "' failed: " . $result->getMessage());
        }
        return $reti;
    }

    /**
     * Reads all objects from database.
     */
    public function readAll(): array
    {
        $reti = array();
        $queryString = "SELECT * FROM " . $this->objectModel->getTable();
        $query = new Query($queryString);
        $result = Application::db()->query($query);
        if ($result->isSuccess())
        {
            $reti = $this->factory->createMany($result->getResults());
            Application::logger()->debug("Read all of " . $this->target . " successfully (" . $result->getAffectedRows() . " rows)");;
        }
        else
        {
            Application::logger()->warning("Reading all of " . $this->target . " failed: " . $result->getMessage());
        }
        return $reti;
    }

    /**
     * Updates object in database.
     * @param object $target Object to update.
     */
    public function update(object $target): void
    {
        if ($this->checkObject($target))
        {
            // Step 1: Prepare query.
            $queryString = "UPDATE " . $this->objectModel->getTable() . " SET ";
            $props = $this->objectModel->getNonIdentifiers();
            for($i = 0; $i < count($props); $i++)
            {
                $queryString .= $props[$i]->getColumn() . "=%";
                if ($props[$i]->getType() == DatabaseType::Text)
                {
                    $queryString .= "'";
                }
                $queryString.= $props[$i]->getName();
                if ($props[$i]->getType() == DatabaseType::Text)
                {
                    $queryString .= "'";
                }
                $queryString .= "%";
                if ($i < count($props) -1)
                {
                    $queryString .= ", ";
                }
            }
            $queryString .= $this->prepareSelectionString();
            $query = new Query($queryString);

            // Step 2: Set property data
            foreach($props as $prop)
            {
                $query->setValue($prop->getName(), $target->{$prop->getName});
            }

            // Step 3: Execute query
            $db = Application::db();
            $res = $db->execute($query);
            if ($res->isSuccess())
            {
                Application::logger()->debug("Updated '" . $target::class . "'");
            }
            else
            {
                Application::logger()->warning("Object '" . $target::class . "' cannot be updated: " . $res->getMessage());
            }
        }
    }

    /**
     * Deletes object from database.
     * @param object $target Object to delete.
     */
    public function delete(object $target): void
    {
        if ($this->checkObject($target))
        {
            $queryString = "DELETE FROM " . $this->objectModel->getTable() . $this->prepareSelectionString();
            $query = new Query($queryString);
            $this->applyQueryData($query, $target);
            $result = Application::db()->execute($query);
            if ($result->isSuccess())
            {
                Application::logger()->debug("Deleted object ". $target::class ."'");
            }
            else
            {
                Application::logger()->warning("Cannot delete object '" . $target::class . "' from database!");
            }
        }
    }
}

?>
