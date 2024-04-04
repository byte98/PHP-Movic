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

namespace PHPMovic\Router;

use PHPmovic\Utils\StringUtils;

/**
 * Enumeration of all data types which are allowed
 * in path place holders.
 */
enum PlaceholderType
{
    /**
     * Booolean data type.
     */
    case Bool;

    /**
     * Integer number data type.
     */
    case Integer;

    /**
     * Any number data type.
     */
    case Number;

    /**
     * Textual data type.
     */
    case Text;

    /**
     * Parses place holder data type from its string representation.
     * @param string $str String representation of data type.
     * @return ?PlaceholderType Parsed data type of place holder,
     *                          or NULL if string does not contains
     *                          any valid data type.
     */
    public static function fromString(string $str): ?PlaceholderType
    {
        $reti = null;
        $input = strtoupper(StringUtils::trim($str));
        switch($input)
        {
            case "BOOL":    $reti = PlaceholderType::Bool;    break;
            case "INTEGER": $reti = PlaceholderType::Integer; break;
            case "NUMBER":  $reti = PlaceholderType::Number;  break;
            case "TEXT":    $reti = PlaceholderType::Text;    break;
        }
        return $reti;
    }
}

?>
