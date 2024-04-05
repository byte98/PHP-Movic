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

use PHPMovic\Model\Configuration\ConnectionModel;
use PHPMovic\Model\Database\Driver;
use PHPMovic\Model\Database\QueryInfo;
use PHPMovic\Model\Database\QueryResult;

class PHPMovicMySQLDriver implements Driver
{
    /**
     * Connection to the database.
     */
    private ?\mysqli $connection = null;

    public function query(string $query): QueryResult
    {
        $reti = new QueryResult(false);
        $result = $this->connection->query($query);
        if ($result != false)
        {
            $data = array();
            while ($row = $result->fetch_assoc())
            {
                array_push($data, $row);
            }
            $reti = new QueryResult(true, $data);
        }
        return $reti;
    }

    public function execute(string $query): QueryInfo
    {
        $reti = new QueryInfo(false);
        $result = $this->connection->query($query);
        if ($result != false)
        {
            $id = $this->connection->insert_id;
            $affected = $this->connection->affected_rows;
            $reti = new QueryInfo($id, $affected, $result);
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
            Application::logger()->warning("Cannot connect to database: " . $ex->getMessage());
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
}

?>
