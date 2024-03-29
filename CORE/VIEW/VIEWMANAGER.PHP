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

namespace PHPMovic\View;

use PHPMovic\Model\Server\ViewData;

/**
 * Class which some utility functions to work with views.
 */
abstract class ViewManager
{
    /**
     * Path to PHP-Movic default views.
     */
    private const SystemPath = $_SERVER["DOCUMENT_ROOT"] . "/CORE/VIEW/";

    /**
     * Path to users views.
     */
    private const UserPath = $_SERVER["DOCUMENT_ROOT"] . "/CONTENT/VIEW/";

    /**
     * Gets path to view.
     * @param string Name of view.
     * @return string Path to view or NULL if view does not exists.
     */
    private static function getViewPath(string $name): ?string
    {
        $reti = null;
        $check = array();
        if (str_ends_with($name, ".phtml") == false && str_ends_with($name, ".PHTML") == false)
        {
            array_push($check, ViewManager::SystemPath . $name . ".phtml");
            array_push($check, ViewManager::SystemPath . $name . ".PHTML");
            array_push($check, ViewManager::UserPath . $name . ".phtml");
            array_push($check, ViewManager::UserPath . $name . ".PHTML");
        }
        else
        {
            array_push($check, ViewManager::SystemPath . $name);
            array_push($check, ViewManager::UserPath . $name);
        }
        foreach ($check as $path)
        {
            if (file_exists($path))
            {
                $reti = $path;
                break;
            }
        }
        return $reti;
    }

    /**
     * Requests view.
     * @param string $name Name of view.
     * @param ViewData $data Data of view.
     */
    public static function requestView(string $name, ViewData $data): void
    {
        $path = ViewManager::getViewPath($name);
        if ($path != null)
        {
            $_VIEW = $data;
            include($path);
        }
    }
}

?>
