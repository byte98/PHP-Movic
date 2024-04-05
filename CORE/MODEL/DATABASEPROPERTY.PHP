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
 * Class representing property of database object.
 */
#Attribute(Attribute::TARGET_PROPERTY)
class DatabaseProperty
{
    /**
     * Data type of property.
     */
    private readonly DatabaseType $type;

    /**
     * Name of column where property is stored.
     */
    private readonly string $column;

    /**
     * Creates new property of database object.
     * @param DatabaseType $type Data type of property.
     * @param string $column Name of column where property is stored.
     */
    public function __construct(DatabaseType $type, string $column)
    {
        $this->type = $type;
        $this->column = $column;
    }

    /**
     * Gets data type of property.
     * @return DatabaseType Data type of property.
     */
    public function getType(): DatabaseType
    {
        return $this->type;
    }

    /**
     * Gets name of column where property is stored.
     * @return string Name of column where property is stored.
     */
    public function getColumn(): string
    {
        return $this->column;
    }
}

?>
