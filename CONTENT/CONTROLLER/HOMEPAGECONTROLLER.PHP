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

// This file contains demonstration of basic functionality
// of PHP-Movic. It is not intended to be used in production.
// For more information, please see project wikipedia at
// https://github.com/byte98/PHP-Movic/wiki

namespace MyApp\Controller;

use PHPmovic\Model\Server\Request;
use PHPmovic\Model\Server\Response;
use PHPmovic\Controller\Controller;

class HomePageController implements Controller
{

    public function get(Request $request): Response
    {
        $reti = $request->createResponse();
        $reti->addView("homepage");
        return $reti;
    }

    public function post(Request $request): Response
    {
        $reti = $request->createResponse();
        $reti->setResponseCode(405); // 405 Method Not Allowed
        return $reti;
    }

    public function put(Request $request): Response
    {
        $reti = $request->createResponse();
        $reti->setResponseCode(405); // 405 Method Not Allowed
        
        return $reti;
    }

    public function delete(Request $request): Response
    {
        $reti = $request->createResponse();
        $reti->setResponseCode(405); // 405 Method Not Allowed
        return $reti;
    }
}

?>
