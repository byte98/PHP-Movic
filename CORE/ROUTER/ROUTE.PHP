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
     * Number which can be used as pseudo-identifier of route.
     */
    private readonly float $number;

    /**
     * Creates new route.
     * @param RoutePath $path Path of route.
     * @param Controller $controller Controller of route.
     */
    private function __construct(RoutePath $path, Controller $controller)
    {
        $this->path = $path;
        $this->controller = $controller;
        $counter = Application::counters()->create("ROUTES");
        $this->number = $counter->getValue();
        $counter->increment();
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
     * Creates new route.
     * @param string $pth Path of route.
     * @param Controller $cntrl Controller of route.
     * @return Route Newly created route,
     *               or NULL if any of the following errors occurred:
     *               - controller does not implement controller interface
     */
    public static function createFromController(string $pth, Controller $cntrl): ?Route
    {
        $reti = null;
        $path = new RoutePath($pth);
        if (Route::checkController($cntrl::class))
        {
            $reti = new Route($path, $cntrl);
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
     * Checks, whether given string matches path of route exactly
     * (ignoring parsing of placeholders).
     * @param string $path String to check.
     * @return bool TRUE if path matches this route,
     *              FALSE otherwise
     */
    public function matchesString(string $path): bool
    {
        $reti = false;
        $reti = $this->path->matchesString($path);
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

    /**
     * Gets data from request.
     * @param string $request Path to resource wanted by request.
     */
    public function getData(string $request): array
    {
        return $this->path->getData($request);
    }

    /**
     * Gets number of route.
     * This number should be unique for every route and can be used
     * as pseudo-identifier of route.
     * @return float Number of route.
     */
    public function getNumber(): float
    {
        return $this->number;
    }

}

?>
