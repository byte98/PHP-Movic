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
 * Class which contains some help functions to work with strings.
 */
abstract class StringUtils
{

    /**
     * Trims string out of whitespaces.
     * @param string $str String to trim.
     * @return string Trimmed string.
     */
    public static function trim(string $str): string
    {
        return preg_replace('/\s+/', '', $str);
    }

    /**
     * Padds string from left.
     * @param string $str String to pad.
     * @param int $length Desired length of returned string.
     * @param string $char Character to pad with.
     * @return string Padded string.
     */
    public static function lpad(string $str, int $length, string $char = " "): string
    {
        $reti = $str;
        if (strlen($str) < $length)
        {
            $reti = str_repeat($char, $length - strlen($str)) . $reti;
        }
        return $reti;
    }
}

?>
