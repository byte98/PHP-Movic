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

namespace PHPMovic\Model\Configuration;

/**
 * Class representing model of connection to the database.
 */
class ConnectionModel
{

    /**
     * Name of machine with database service running.
     */
    private readonly string $hostname;

    /**
     * Name of database used by application.
     */
    private readonly string $database;

    /**
     * Name of user with access to the database.
     */
    private readonly string $username;

    /**
     * Password of user with access to the database.
     */
    private readonly string $password;
    

    /**
     * Creates new model of connection to the database.
     * @param string $hostname Name of machine with database service running.
     * @param string $database Name of database used by application.
     * @param string $username Name of user with access to the database.
     * @param string $password Password of user with access to the database.
     */
    public function __construct(string $hostname, string $database, string $username, string $password)
    {
        $this->hostname = $hostname;
        $this->database = $database;
        $this->username = $username;
        $this->password = $password;        
    }

    /**
     * Gets name of database used by application.
     * @return string Name of database used by application.
     */
    public function getHostname(): string
    {
        return $this->hostname;
    }

    /**
     * Gets name of user with access to the database.
     * @return string Name of user with access to the database.
     */
    public function getDatabase(): string
    {
        return $this->database;
    }

    /**
     * Gets password of user with access to the database.
     * @return string Password of user with access to the database.
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * Gets password of user with access to the database.
     * @return string Password of user with access to the database.
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}

?>
