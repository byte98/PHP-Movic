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

use PHPMovic\Model\Server\Request;
use PHPMovic\Model\Server\Response;

/**
 * Interface abstracting all controllers of the application.
 */
interface Controller
{
    /**
     * Hanldes HTTP GET request.
     * @param Request $request Request to handle.
     * @return Response Response to request.
     */
    public function get(Request $request): Response;

    /**
     * Hanldes HTTP POST request.
     * @param Request $request Request to handle.
     * @return Response Response to request.
     */
    public function post(Request $request): Response;

    /**
     * Hanldes HTTP PUT request.
     * @param Request $request Request to handle.
     * @return Response Response to request.
     */
    public function put(Request $request): Response;

    /**
     * Hanldes HTTP DELETE request.
     * @param Request $request Request to handle.
     * @return Response Response to request.
     */
    public function delete(Request $request): Response;
}

?>
