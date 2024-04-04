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

use PHPMovic\Application;
use PHPMovic\Router\Route;
use PHPMovic\Model\Configuration\Configuration;

/**
 * Class which represents router of whole application.
 */
class Router
{

    /**
     * Array with routes managed by router.
     */
    private array $routes;

    /**
     * Configuration of whole application.
     */
    private readonly Configuration $configuration;

    /**
     * Creates new router.
     * @param Configuration $configuration Configuration of whole application.
     */
    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
        $this->routes = array();
        $this->buildRoutingTable();
    }

    /**
     * Builds routing table from configuration.
     */
    private function buildRoutingTable(): void
    {
        foreach ($this->configuration->getRoutes()->getRoutes() as $key => $value)
        {
            $controller = $this->configuration->getSourcesModel()->getUserNamespace() . "\\Controller\\" . $value;
            $route = Route::create($key, $controller);
            if ($route != null)
            {
                array_push($this->routes, $route);
            }
        }
        Application::logger()->info("Routing table contains " . count($this->routes) . " routes.");
    }

    /**
     * Gets route assigned to given path.
     * @param string $path Path to check.
     * @return Route Route assigned to given path,
     *               or NULL if no route can be found.
     */
    public function route(string $path): ?Route
    {
        $reti = null;
        $retiLen = PHP_INT_MIN;
        foreach($this->routes as $route)
        {
            if ($route->matches($path))
            {
                if ($route->getLength() > $retiLen)
                {
                    $reti = $route;
                    $retiLen = $route->getLength();
                }
            }
        }
        return $reti;
    }
}

?>
