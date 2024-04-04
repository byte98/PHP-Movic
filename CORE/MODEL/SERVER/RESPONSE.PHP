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

/**
 * Class representing response to the request.
 */
class Response
{
    /**
     * Views which are part of response.
     */
    private array $views;

    /**
     * Code of response.
     */
    private int $responseCode;

    /**
     * Headers of response.
     */
    private array $headers;

    /**
     * Array with set cookies.
     */
    private array $cookies;

    /**
     * Data in actual session.
     */
    private array $session;

    /**
     * Number of response.
     */
    private readonly float $number;

    /**
     * Creates new response.
     * @param array $cookies Array with set cookies.
     * @param array $session Data in actual session.
     * @param float $number Number of response (should be same as number of request).
     */
    public function __construct(array $cookies, array $session, float $number)
    {
        $this->views = array();
        $this->responseCode = 200;
        $this->headers = array();
        $this->cookies = $cookies;
        $this->session = $session;
        $this->number = $number;
    }

    /**
     * Sets value of header.
     * @param string $headerName Name of header.
     * @param string $value Value of header.
     */
    public function setHeader(string $headerName, string $value): void
    {
        $this->headers[$headerName] = $value;
    }

    /**
     * Sets value of cookie.
     * @param string $name Name of cookie.
     * @param string $value Value of cookie.
     */
    public function setCookie(string $name, string $value): void
    {
        $this->cookies[$name] = $value;
    }

    /**
     * Adds view to response.
     * @param string $viewName Name of view.
     * @param ViewData $data Data of view.
     */
    public function addView(string $viewName, ViewData $data = new ViewData()): void
    {
        array_push($this->views, new ViewInsert($viewName, $data));
    }

    /**
     * Sets code of response.
     * @param int $code Code of response.
     */
    public function setResponseCode(int $code): void
    {
        $this->responseCode = $code;
    }

    /**
     * Gets all views added to response.
     * @return array All views added to response.
     */
    public function getViews(): array
    {
        return $this->views;
    }

    /**
     * Gets all set headers.
     * @return array All set headers.
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * Gets code of response.
     * @return int Code of response.
     */
    public function getResponseCode(): int
    {
        return $this->responseCode;
    }

    /**
     * Gets number of response.
     * @return float Number of response.
     */
    public function getNumber(): string
    {
        return $this->number;
    }
}

?>
