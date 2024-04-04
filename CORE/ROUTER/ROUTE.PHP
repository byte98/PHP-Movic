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

use PHPMovic\Controller\Controller;
use PHPMovic\Router\RoutePath;
use PHPMovic\Application;

/**
 * Class representing one single route.
 */
class Route
{
    /**
     * Path of route.
     */
    private RoutePath $path;

    /**
     * Controller of route.
     */
    private Controller $controller;

    /**
     * Creates new route.
     * @param RoutePath $path Path of route.
     * @param Controller $controller Controller of route.
     */
    private function __construct(RoutePath $path, Controller $controller)
    {
        $this->path = $path;
        $this->controller = $controller;
    }

    /**
     * Creates new route.
     * @param string $pth Path of route.
     * @param string $cntrl Controller of route.
     * @return Route Newly created route,
     *               or NULL if any of the following errors occurred:
     *               - controller class not found
     *               - controller does not implement controller interface
     */
    public static function create(string $pth, string $cntrl): ?Route
    {
        $reti = null;
        $path = new RoutePath($pth);
        if (Route::checkController($cntrl))
        {
            $reti = new Route($path, new $cntrl());
        }
        return $reti;
    }

    /**
     * Checks, whether given controller class is existing and
     * if implements controller interface.
     * @param string $controller Controller class name.
     * @return bool TRUE if controller is valid,
     *              FALSE otherwise
     */
    private static function checkController(string $controller): bool
    {
        $reti = false;
        if (class_exists($controller, true))
        {
            if (in_array(Controller::class, class_implements($controller)))
            {
                $reti = true;
            }
            else
            {
                Application::logger()->error("Cannot create route: class '" . $controller . "' does not implement controller interface!");
            }
        }
        else
        {
            Application::logger()->error("Cannot create route: class '" . $controller . "' not found!");
        }
        return $reti;
    }

    /**
     * Gets controller assigned to route.
     * @return Controller Controller assigned to route.
     */
    public function getController(): Controller
    {
        return $this->controller;
    }

    /**
     * Checks, whether given path matches this route.
     * @param string $path Path to check.
     * @return bool TRUE if path matches this route,
     *              FALSE otherwise
     */
    public function matches(string $path): bool
    {
        $reti = false;
        $reti = $this->path->matches($path);
        return $reti;
    }

    /**
     * Gets length of path of route.
     * @return int Length of path.
     */
    public function getLength(): int
    {
        return $this->path->getLength();
    }

}

?>
