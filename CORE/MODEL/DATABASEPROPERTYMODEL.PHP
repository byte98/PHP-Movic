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

use PHPMovic\Model\DatabaseType;

/**
 * Class representing model of database object property.
 */
class DatabasePropertyModel
{
    /**
     * Name of column in which is property stored.
     */
    private readonly string $column;

    /**
     * Database type of property.
     */
    private readonly DatabaseType $type;

    /**
     * Name of property in actual object.
     */
    private readonly string $name;

    /**
     * Creates new model of database object property.
     * @param string $column Name of column in which is property stored.
     * @param DatabaseType $type Database type of property.
     * @param string $name Name of property in actual object.
     */
    public function __construct(string $column, DatabaseType $type, string $name)
    {
        $this->column = $column;
        $this->type = $type;
        $this->name = $name;
    }

    /**
     * Gets name of property in actual object.
     * @return string Name of property in actual object.
     */
    public function getColumn(): string
    {
        return $this->column;
    }

    /**
     * Gets database type of property.
     * @return DatabaseType Database type of property.
     */
    public function getType(): DatabaseType
    {
        return $this->type;
    }

    /**
     * Gets name of property in actual object.
     * @return string Name of property in actual object.
     */
    public function getName(): string
    {
        return $this->name;
    }
}

?>
