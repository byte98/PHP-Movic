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

    
}

?>
