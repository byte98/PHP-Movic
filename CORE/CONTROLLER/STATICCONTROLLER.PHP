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

namespace PHPMovic\Controller;

use PHPMovic\Controller\ControllerAdapter;

/**
 * Class which handles static routes.
 */
class StaticController extends ControllerAdapter
{
    /**
     * Root path to look for files.
     */
    private readonly string $root;

    /**
     * Creates new controller for static routes.
     * @param string $root Root path to look for files.
     */
    public function __construct(string $root)
    {
        $this->root = $root;
    }

    public function get(Request $request): Response
    {
        var_dump($request->getValue("file"));
        $reti = $request->createResponse();

        return $reti;
    }
}

?>
