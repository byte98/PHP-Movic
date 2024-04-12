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
 * Class which contains some utility classes.
 */
abstract class PathUtils
{

    /**
     * Checks, whether path is absolute.
     * @param string $path Path to check.
     * @return bool TRUE if path is absolute,
     *              FALSE otherwise.
     */
    public static function isAbsolute(string $path): bool
    {
        $reti = false;
        if (str_starts_with($path, DIRECTORY_SEPARATOR) || preg_match('/^[a-zA-Z]:/', $path))
        {
            // Path starts with / or C:/ (script assumes that path is absolute)
            $reti = true;
        }
        return $reti;
    }

    /**
     * Transforms path to its absolute variant.
     * @param string $path Path to transform.
     * @return string Absolute path.
     */
    public static function toAbsolute(string $path): string
    {
        $reti = $path;
        if (PathUtils::isAbsolute($reti) == false)
        {
            $reti = realpath($_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . $path);
        }
        return $reti;
    }
}

?>
