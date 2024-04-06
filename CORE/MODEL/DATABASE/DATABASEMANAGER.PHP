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

namespace PHPMovic\Model\Database;

use PHPMovic\Application;
use PHPMovic\Model\Database\Driver;
use PHPMovic\Model\Configuration\ConnectionModel;

/**
 * Class which manages connections to the database.
 */
class DatabaseManager
{
    /**
     * Array with all managed connections.
     */
    private array $connections;

    /**
     * Model of connection to the database.
     */
    private readonly ConnectionModel $model;

    /**
     * Creates new manager of connections to the database.
     * @param ConnectionModel $model Model of connection to the database.
     */
    public function __construct(ConnectionModel $model)
    {
        $this->model = $model;
        $this->connections = array();
    }

    /**
     * Gets connection to the database.
     * @return Driver Driver providing connection to the database.
     */
    public function get(): Driver
    {
        $reti = $this->getOpened();
        if ($reti == null)
        {
            Application::logger()->base("There is no opened connection to the database");
            if (class_exists($this->model->getDriver()))
            {
                $className = $this->model->getDriver();
                $reti = new $className($this->model);
                array_push($this->connections, $reti);
                Application::logger()->info("Created new connection to the database");
                $open = $reti->connect($this->model);
                if ($open == false)
                {
                    Application::logger()->critical("Connection to the database failed: cannot open connection!");
                }
            }
            else
            {
                Application::logger()->critical("Cannot create connection to the database: class '" . $this->model->getDriver() . "' does not exist!");
            }
        }
        else
        {
            Application::logger()->low("Reusing opened connection to the database");
        }
        return $reti;
    }

    /**
     * Gets any opened connection to the database.
     * @return ?Driver Any opened connection to the database,
     *                 or NULL if there is no such connection.
     */
    private function getOpened(): ?Driver
    {
        $reti = null;
        $counter = 0;
        foreach ($this->connections as $connection)
        {
            if ($connection->isOpen())
            {
                $reti = $connection;
                $counter++;
                break;
            }
        }
        if ($reti == null)
        {
            Application::logger()->debug("Searched through " . $counter . "/" . count($this->connections) ." connections: no opened connection found.");
        }        
        else
        {
            Application::logger()->debug("Searched through " . $counter . "/" . count($this->connections) ." connections: found opened connection.");
        }
        return $reti;
    }

    /**
     * Closes all opened connections to the database.
     */
    public function closeAll(): void
    {
        $counter = 1;
        $closed = 0;
        foreach ($this->connections as $connection)
        {
            if ($connection->isOpen())
            {
                Application::logger()->debug("Closing connection " . $counter . "/" . count($this->connections));
                $result = $connection->close();
                if ($result == false)
                {
                    Application::logger()->error("Connection to the database cannot be closed!");
                }
                else
                {
                    $closed++;
                }
            }
            else
            {
                Application::logger()->debug("Closing connection " . $counter . "/" . count($this->connections) . ": already closed - skipping");
            }
            $counter++;
        }
        Application::logger()->low("Connections to the database has been closed (" . $closed . "/" . count($this->connections) . " connections needs to be closed)");
    }
}

?>
