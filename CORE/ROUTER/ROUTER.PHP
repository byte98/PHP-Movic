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
use PHPMovic\Controller\StaticController;
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
        $counter = Application::counters()->create("ROUTES");
        $counter->reset();
        $this->buildRoutingTable();
        $this->buildStaticRoutes();
        Application::logger()->info("Routing table contains " . count($this->routes) . " routes.");
    }

    /**
     * Builds routing table from configuration.
     */
    private function buildRoutingTable(): void
    {
        foreach ($this->configuration->getRoutes()->getRoutes() as $key => $value)
        {
            $controller = $this->configuration->getSourcesModel()->getUserNamespace() . "\\Controller\\" . $value;
            Application::logger()->debug("Creating route: '" . $key . "' -> '" . $controller . "'");
            if ($this->tableContains($key))
            {
                Application::logger()->info("Route for path '" . $key . "' already exists. Skipping.");
            }
            else
            {
                $route = Route::create($key, $controller);
                if ($route != null)
                {
                    array_push($this->routes, $route);
                }
            }
        }
    }

    /**
     * Builds static routes from configuration.
     */
    private function buildStaticRoutes(): void
    {
        foreach($this->configuration->getRoutes()->getStaticRoutes() as $key => $value)
        {
            Application::logger()->debug("Creating static route: '" . $key . "' -> '" . $value . "'");
            if ($this->tableContains($key))
            {
                Application::logger()->info("Route for path '" . $key . "' already exists. Skipping.");
            }
            else
            {
                $path = $key;
                if (str_ends_with($path, "/") == false)
                {
                    $path = $path . "/";
                }
                $path .= "%FILE::TEXT%";
                if (str_starts_with($value, DIRECTORY_SEPARATOR) == false)
                {
                    $value = DIRECTORY_SEPARATOR . $value;
                }
                $filePath = $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . "CONTENT"  . $value;
                $route = Route::createFromController($path, new StaticController($filePath));
                if ($route != null)
                {
                    array_push($this->routes, $route);
                }
            }
        }
    }

    /**
     * Checks, whether there is already route in routing table
     * for given path.
     * @param string $path Path to check.
     * @return bool TRUE if route already exists,
     *              FALSE otherwise.
     */
    private function tableContains(string $path): bool
    {
        $reti = false;
        foreach($this->routes as $route)
        {
            if ($route->matchesString($path))
            {
                $reti = true;
                break;
            }
        }
        return $reti;
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
                    Application::logger()->debug("ROUTER:: route(#" . $route->getNumber() . ") with controller '" . $route->getController()::class . "' matches path " . $path . " and is current candidate.");
                }
                else
                {
                    Application::logger()->debug("ROUTER:: route(#" . $route->getNumber() . ") with controller '" . $route->getController()::class . "' matches path " . $path);
                }
            }
            else
            {
                Application::logger()->debug("ROUTER:: route(#" . $route->getNumber() . ") with controller '" . $route->getController()::class . "' does not match path " . $path);
            }
        }
        return $reti;
    }
}

?>
