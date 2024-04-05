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
use PHPMovic\Model\Database\QueryInfo;
use PHPMovic\Model\Database\QueryResult;

/**
 * Interface abstracting all database drivers,
 * which can perform queries.
 */
interface Driver
{
    /**
     * Performs query to the database.
     * @param string $query String representing query to the database.
     * @return QueryResult Result of the query.
     */
    public function query(string $query): QueryResult;

    /**
     * Executes query to the database.
     * @param string $query String representing query to the database.
     * @return QueryInfo Result of the query.
     */
    public function execute(string $query): QueryInfo;

    /**
     * Connects to the database.
     * @param ConnectionModel $connection Model of connection to the database.
     * @return bool TRUE if connection was successful,
     *              FALSE otherwise.
     */
    public function connect(ConnectionModel $connection): bool;

    /**
     * Closes connection to the database.
     * @return bool TRUE if closing of the connection was successful,
     *              FALSE otherwise.
     */
    public function close(): bool;

    /**
     * Checks, whether connection is open.
     * @return bool TRUE if connection is open,
     *              FALSE otherwise.
     */
    public function isOpen(): bool;
}

?>
