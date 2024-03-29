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

namespace PHPMovic\Model\Server;
use PHPMovic\Utils\StringUtils;

enum HttpMethod
{
    /**
     * HTTP method for reading data.
     */
    case GET;

    /**
     * HTTP method for writing and modifiing data.
     */
    case POST;

    /**
     * HTTP method for writing data.
     */
    case PUT;

    /**
     * HTTP method for updating data.
     */
    case PATCH;

    /**
     * HTTP method for deleting data.
     */
    case DELETE;

    /**
     * Get HTTP method from string.
     * @param string $str String representation of HTTP method.
     * @return ?HttpMethod HTTP method parsed from string,
     *                      or NULL if string does not contain valid HTTP method.
     */
    public static function fromString(string $str): ?HttpMethod
    {
        $reti = null;
        $input = strtoupper(StringUtils ::trim($str));
        switch ($input) 
        {
            case "GET":    $reti = HttpMethod::GET;    break;
            case "POST":   $reti = HttpMethod::POST;   break;
            case "PUT":    $reti = HttpMethod::PUT;    break;
            case "PATCH":  $reti = HttpMethod::PATCH;  break;
            case "DELETE": $reti = HttpMethod::DELETE; break;
        }
        return $reti;
    }
}

?>
