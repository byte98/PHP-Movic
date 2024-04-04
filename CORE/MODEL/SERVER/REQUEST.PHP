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

use PHPMovic\Application;
use PHPMovic\Model\Server\HttpMethod;

/**
 * Class representing request to the server.
 */
class Request
{
    /**
     * Counter of requests.
     */
    private static float $counter = 0.0;

    /**
     * Method used to execute request.
     */
    private readonly HttpMethod $method;

    /**
     * Address of request.
     */
    private readonly string $source;

    /**
     * Address of requested resource.
     */
    private readonly string $resource;

    /**
     * URL of request.
     */
    private readonly string $url;

    /**
     * Data of request.
     */
    private readonly array $data;

    /**
     * Headers of request.
     */
    private readonly array $headers;

    /**
     * Cookies of request.
     */
    private readonly array $cookies;

    /**
     * Data in actual session.
     */
    private readonly array $session;

    /**
     * Number of request.
     */
    private readonly float $number;

    /**
     * Creates new object representing request from
     * actual request.
     */
    public function __construct()
    {
        $parsedMethod = HttpMethod::fromString($_SERVER["REQUEST_METHOD"]);
        if ($parsedMethod == null)
        {
            Application::logger()->error("Unknown HTTP method: " . $_SERVER["REQUEST_METHOD"]);
        }
        else
        {
            $this->method = $parsedMethod;
        }
        $this->source = Request::parseClientAddress();
        $this->resource = Request::parseRequest();
        $this->url = Request::parseURL();
        $this->data = Request::parseData();
        $this->headers = Request::parseHeaders();
        $this->cookies = Request::parseCookies();
        $this->session = Request::parseSession();
        $this->number = Request::$counter;
        Request::$counter += 1.0;
        unset($_REQUEST);
        unset($_SESSION);
        unset($_COOKIE);
        unset($_POST);
        unset($_GET);
    }

    /**
     * Gets value sent by user with request. This methods looks
     * into all cookies, session and request data.
     * @param string $name Name of value.
     * @return mixed Value of request.
     */
    public function getValue(string $name): mixed
    {
        $reti = null;
        if (array_key_exists($name, $this->data))
        {
            $reti = $this->data[$name];
        }
        return $reti;
    }

    /**
     * Creates response to the request.
     * @return Response Response to the request.
     */
    public function createResponse(): Response
    {
        return new Response($this->cookies, $this->session, $this->number);
    }

    /**
     * Gets address of request.
     * @return string Address of request.
     */
    public function getAddress(): string
    {
        return $this->source;
    }

    /**
     * Gets method used to execute request.
     * @return HttpMethod Method used to execute request.
     */
    public function getMethod(): HttpMethod
    {
        return $this->method;
    }

    /**
     * Gets requested resource.
     * @return string Requested resource.
     */
    public function getResource(): string
    {
        return $this->resource;
    }

    /**
     * Gets value of header.
     * @param string $name Name of header.
     * @return string Value of header,
     *                or NULL if header is not set.
     */
    public function getHeader(string $name): ?string
    {
        $reti = null;
        if (array_key_exists($name, $this->headers))
        {
            $reti = $this->headers[$name];
        }
        return $reti;
    }

    /**
     * Gets URL of request.
     * @return string URL of request.
     */
    public function getURL(): string
    {
        return $this->url;
    }

    /**
     * Gets number of request which servers as pseudo-identifier.
     * @return float Number of request.
     */
    public function getNumber(): float
    {
        return $this->number;
    }

    /**
     * Parses all data send with request in actual session.
     * @return array Data in actual session.
     */
    private static function parseSession(): array
    {
        $reti = array();
        foreach($_SESSION as $key => $value)
        {
            $reti[$key] = $value;
        }
        return $reti;
    }

    /**
     * Parses all cookies send with request.
     * @return array Cookies of request.
     */
    private static function parseCookies(): array
    {
        $reti = array();
        foreach($_COOKIE as $key => $value)
        {
            $reti[$key] = $value;
        }
        return $reti;
    }

    /**
     * Parses and saves URL of actual request.
     * @return string URL of actual request.
     */
    private static function parseURL(): string
    {
        $schema = isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on" ? "https" : "http";
        $reti = $schema . "://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
        return $reti;
    }

    /**
     * Parses request URL and gets requested resource.
     * @return string Requested resource.
     */
    private static function parseRequest(): string
    {
        $uri = $_SERVER["REQUEST_URI"];
        $parsed = parse_url($uri);
        return $parsed["path"];
    }

    /**
     * Parses all data send with request.
     * @return array Data of request.
     */
    private static function parseData(): array
    {
        return array_merge($_GET, $_POST, $_REQUEST, $_COOKIE, $_SESSION);
    }

    /**
     * Parses all headers send with request.
     * @return array Headers of request.
     */
    private static function parseHeaders(): array
    {
        $reti = array();
        foreach(getallheaders() as $key => $value)
        {
            $reti[$key] = $value;
        }
        return $reti;
    }

    /**
     * Parses client address.
     * @return string Client address.
     */
    private static function parseClientAddress(): string
    {
        $reti = isset($_SERVER["HTTP_X_FORWARDED_FOR"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER["REMOTE_ADDR"];
        return $reti;
    }
}

?>
