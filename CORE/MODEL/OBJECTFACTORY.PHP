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
 * Inteface abstracting factories for creating other objects.
 */
interface ObjectFactory
{
    /**
     * Creates one object.
     * @param array $data Data from database.
     * @return object Newly created object with data from database,
     *                or NULL if object cannot be created from data.
     */
    public function createOne(array $data): ?object;

    /**
     * Creates every possible object based on data from database.
     * @param array $data Data from database.
     * @return array Array with every possible object based on data from database,
     *               or empty array if object cannot be created from data.
     * 
     */
    public function createMany(array $data): array;
}

?>
