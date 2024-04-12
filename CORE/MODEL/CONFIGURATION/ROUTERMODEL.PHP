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

namespace PHPMovic\Model\Configuration;

/**
 * Class which holds model of router.
 */
class RouterModel
{
    /**
     * Array with all routes from configuration.
     */
    private readonly array $routes;

    /**
     * Array with all static routes from configuration.
     */
    private readonly array $staticRoutes;
    /**
     * Creates new model of router.
     * @param array $routes Array with all routes from configuration.
     * @param array $staticRoutes Array with all static routes from configuration.
     */
    public function __construct(array $routes, array $staticRoutes)
    {
        $this->routes = $routes;
        $this->staticRoutes = $staticRoutes;
    }

    /**
     * Gets array with all routes from configuration.
     * @return array Array with all routes from configuration.
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }

    /**
     * Gets array with all static routes from configuration.
     * @return array Array with all static routes from configuration.
     */
    public function getStaticRoutes(): array
    {
        return $this->staticRoutes;
    }
}

?>
