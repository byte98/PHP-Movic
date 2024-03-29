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

namespace PHPMovic\Model\Server;

/**
 * Class representing data of view.
 */
class ViewData
{
    /**
     * Data of view.
     */
    private array $data;

    /**
     * Creates new view data.
     */
    public function __construct()
    {
        $this->data = array();
    }

    /**
     * Sets value of data.
     * @param string $key Identifier of data.
     * @param mixed $value Value of data.
     */
    public function set(string $key, mixed $value): void
    {
        $this->data[$key] = $value;
    }

    /**
     * Checks, whether data exists.
     * @param string $key Identifier of data.
     * @return bool TRUE if data exists, FALSE otherwise.
     */
    public function exists(string $key): bool
    {
        return array_key_exists($key, $this->data);
    }

    /**
     * Gets value of data.
     * @param string $key Identifier of data.
     * @return mixed Value of data.
     */
    public function get(string $key): mixed
    {
        return $this->data[$key];
    }

    /**
     * Prints value of data.
     * @param string $key Identifier of data.
     */
    public function print(string $key): void
    {
        if (array_key_exists($key, $this->data))
        {
            echo $this->data[$key];
        }
    }
}

?>
