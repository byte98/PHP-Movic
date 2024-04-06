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

namespace PHPMovic\Utils;

/**
 * Class with some utility function to work with arrays.
 */
abstract class ArrayUtils
{
    /**
     * Checks, whether value is in array and whether has expected type.
     * @param array $data Array which will be checked.
     * @param string $key Key of value expected in array.
     * @param string $type Expected type of value.
     * @return bool TRUE if value exists and has expected type,
     *              FALSE otherwise.
     */
    public static function checkValue(array $data, string $key, string $type): bool
    {
        $reti = false;
        if (array_key_exists($key, $data))
        {
            $dt = gettype($data[$key]);
            if ($dt == $type)
            {
                $reti = true;
            }
        }
        return $reti;
    }
}

?>
