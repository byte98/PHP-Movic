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

use PHPMovic\Model\DatabasePropertyModel;
use PHPMovic\Model\DatabaseType;

/**
 * Class which represents model of database object.
 */
class DatabaseObjectModel
{
    /**
     * Name of database table where is object stored.
     */
    private readonly string $table;

    /**
     * Name of class which represents database object.
     */
    private readonly string $className;

    /**
     * Properties of database object.
     */
    private array $properties;

    /**
     * Creates new model of database object.
     * @param string $table Name of database table where is object stored.
     * @param string $className Name of class which represents database object.
     */
    public function __construct(string $table, string $className)
    {
        $this->table = $table;
        $this->className = $className;
        $this->properties = array();
    }

    /**
     * Gets name of database table where is object stored.
     * @return string Name of database table where is object stored.
     */
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * Gets name of class which represents database object.
     * @return string Name of class which represents database object.
     */
    public function getClassName(): string
    {
        return $this->className;
    }

    /**
     * Adds property of object to model.
     * @param DatabasePropertyModel $property Property of object.
     */
    public function addProperty(DatabasePropertyModel $property): void
    {
        array_push($this->properties, $property);
    }

    /**
     * Gets properties of object.
     * @return array Properties of object.
     */
    public function getProperties(): array
    {
        return $this->properties;
    }

    /**
     * Gets all properties which can serve as identifiers.
     * @return array Properties which can serve as identifiers.
     */
    public function getIdentifiers(): array
    {
        $reti = array();
        foreach ($this->properties as $property)
        {
            if ($property->getType() == DatabaseType::Identifier)
            {
                array_push($reti, $property);
            }
        }
        return $reti;
    }

    /**
     * Gets all properties which are not identifiers.
     * @return array Properties which are not identifiers.
     */
    public function getNonIdentifiers(): array
    {
        $reti = array();
        foreach ($this->properties as $property)
        {
            if ($property->getType() != DatabaseType::Identifier)
            {
                array_push($reti, $property);
            }
        }
        return $reti;
    }
}

?>
