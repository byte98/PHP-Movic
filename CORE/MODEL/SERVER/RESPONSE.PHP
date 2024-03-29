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
     * Creates new response.
     */
    public function __construct()
    {
        $this->views = array();
        $this->responseCode = 200;
        $this->headers = array();
    }

    /**
     * Sets value of header.
     * @param string $headerName Name of header.
     * @param string $value Value of header.
     */
    public function setHeader($headerName, $value): void
    {
        $this->headers[$headerName] = $value;
    }

    /**
     * Adds view to response.
     * @param string $viewName Name of view.
     * @param ViewData $data Data of view.
     */
    public function addView(string $viewName, ViewData $data = null): void
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
}

?>
