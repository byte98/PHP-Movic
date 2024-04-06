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

use PHPMovic\Controller\ControllerAdapter;
use PHPmovic\Model\Server\Request;
use PHPmovic\Model\Server\Response;
use PHPmovic\Controller\Controller;
use PHPMovic\Model\Server\ViewData;
use PHPMovic\View\SimpleView;
use PHPMovicIdentity\PHPMovicIdentity;

class HomePageController extends ControllerAdapter
{

    public function get(Request $request): Response
    {
        $im = PHPMovicIdentity::getManager();
        
        $reti = $request->createResponse();
        $data = new ViewData();
        $data->set("identities", $this->formatIdentities($im->getAllIdentities()));
        $reti->addView(new SimpleView("HOMEPAGEVIEW"), $data);
        return $reti;
    }

    /**
     * Formats identities to be shown in the view.
     * @param array $identities Identities to format.
     * @return string Formatted identities.
     */
    private function formatIdentities(array $identities): string
    {
        $reti = "<table><tr><th>ID</th><th>NAME</th><th>PASSWORD</th></tr>";
        foreach ($identities as $identity)
        {
            $reti .= "<tr><td>" . $identity->getId() ."</td><td>" . $identity->getName() . "</td></tr>";
        }
        $reti .= "</table>";
        return $reti;
    }

}

?>
