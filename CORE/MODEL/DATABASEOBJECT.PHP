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

/**
 * Class which represents object stored in the database.
 */
#Attribute(Attribute::TARGET_CLASS)
class DatabaseObject
{
    /**
     * Name of table in which object should be stored.
     */
    private readonly string $table;

    /**
     * Creates new object which is stored in the database.
     * @param string $table Name of table in which object should be stored.
     */
    public function __construct(string $table)
    {
        $this->table = $table;   
    }

    /**
     * Gets name of table in which object should be stored.
     * @return string Name of table in which object should be stored.
     */
    public function getTable(): string
    {
        return $this->table;
    }
}

?>
