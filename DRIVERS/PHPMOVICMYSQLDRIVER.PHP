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

use PHPMovic\Application;
use PHPMovic\Model\Configuration\ConnectionModel;
use PHPMovic\Model\Database\Driver;
use PHPMovic\Model\Database\Query;
use PHPMovic\Model\Database\QueryInfo;
use PHPMovic\Model\Database\QueryResult;

class PHPMovicMySQLDriver implements Driver
{
    /**
     * Connection to the database.
     */
    private ?\mysqli $connection = null;

    public function query(Query $query): QueryResult
    {
        $queryString = $query->build();
        $reti = new QueryResult(false, query: $queryString, message: "Query not executed: cannot find connection to the database!");
        if ($this->connection != null)
        {
            try
            {
                $result = $this->connection->query($queryString);
                if ($result != false)
                {
                    $data = array();
                    while ($row = $result->fetch_assoc())
                    {
                        array_push($data, $row);
                    }
                    $reti = new QueryResult(true, $queryString, $data);
                }
            }
            catch (mysqli_sql_exception $ex)
            {
                $reti = new QueryResult(false, query: $queryString, message: $ex->getMessage());
            }
        }
        return $reti;
    }

    public function execute(Query $query): QueryInfo
    {
        $queryString = $query->build();
        $reti = new QueryInfo(false, query: $queryString, message: "Query not executed: cannot find connection to the database!");
        if ($this->connection != null)
        {
            try
            {
                $result = $this->connection->query($queryString);
                if ($result != false)
                {
                    $id = $this->connection->insert_id;
                    $affected = $this->connection->affected_rows;
                    $reti = new QueryInfo($id, $queryString, "", $affected, $result);
                }
            }
            catch (mysqli_sql_exception $ex)
            {
                $reti = new QueryResult(false, query: $queryString, message: $ex->getMessage());
            }
        }
        return $reti;
    }

    public function connect(ConnectionModel $connection): bool
    {
        $reti = false;
        if ($this->isOpen())
        {
            $this->connection->close();
        }
        try
        {
            $this->connection = new mysqli(
                $connection->getHostname(),
                $connection->getUsername(),
                $connection->getPassword(),
                $connection->getDatabase()
            );
        }
        catch(mysqli_sql_exception $ex)
        {
            Application::logger()->warning("Cannot connect to database: MySQLi#" . $ex->getCode() . " " . $ex->getMessage());
            $reti = false;
            $this->connection = null;
        }
        if ($this->connection === false)
        {
            $reti = false;
            $this->connection = null;
        }
        else
        {
            $reti = true;
        }
        return $reti;
    }

    public function close(): bool
    {
        $reti = false;
        if ($this->connection != null)
        {
            $reti = $this->connection->close();
            $this->connection = null;
        }
        return $reti;
    }

    public function isOpen(): bool
    {
        $reti = false;
        if ($this->connection != null)
        {
            $reti = $this->connection->ping();
        }
        return $reti;
    }

    public function sanitizeValue(string $value): string
    {
        $reti = "";
        if ($this->connection != null)
        {
            $reti = $this->connection->escape_string($value);
        }
        else
        {
            Application::logger()->warning("Cannot sanitize value: connection has not been created yet!");
        }
        return $reti;
    }
}

?>
