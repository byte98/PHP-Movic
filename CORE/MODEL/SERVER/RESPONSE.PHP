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

use PHPMovic\View\View;
use PHPMovic\Model\Server\HttpStatus;

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
    private HttpStatus $responseCode;

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
     * Flag, whether session should be flushed.
     */
    private bool $flushSession;

    /**
     * Number of response.
     */
    private readonly float $number;

    /**
     * Time of request handling start.
     */
    private readonly \DateTime $requestTime;

    /**
     * Address to which response will be sent.
     */
    private readonly string $address;

    /**
     * Flag, whether output buffer should be cleaned.
     */
    private bool $clean;


    /**
     * Creates new response.
     * @param array $cookies Array with set cookies.
     * @param array $session Data in actual session.
     * @param float $number Number of response (should be same as number of request).
     * @param \DateTime $requestTime Time of request handling start.
     * @param string $address Address to which response will be sent.
     */
    public function __construct(array $cookies, array $session, float $number, \DateTime $requestTime, string $address)
    {
        $this->views = array();
        $this->responseCode = HttpStatus::OK;
        $this->headers = array();
        $this->cookies = $cookies;
        $this->session = $session;
        $this->number = $number;
        $this->requestTime = $requestTime;
        $this->flushSession = false;
        $this->clean = false;
        $this->address = $address;
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
     * Removes cookie.
     * @param string $name Name of cookie.
     */
    public function removeCookie(string $name): void
    {
        if (array_key_exists($name, $this->cookies))
        {
            unset($this->cookies[$name]);
        }
    }

    /**
     * Sets value in session.
     * @param string $name Name of value.
     * @param mixed $value Value itself.
     */
    public function setSession(string $name, mixed $value): void
    {
        $this->session[$name] = $value;
    }

    /**
     * Flushes all data in session.
     */
    public function flushSession(): void
    {
        $this->flushSession = true;
        $this->session = array();
    }

    /**
     * Adds view to response.
     * @param View $view View to add.
     * @param ViewData $data Data of view.
     */
    public function addView(View $view, ViewData $data = new ViewData()): void
    {
        array_push($this->views, new ViewInsert($view, $data));
    }

    /**
     * Sets code of response.
     * @param HttpStatus $code Code of response.
     */
    public function setResponseCode(HttpStatus $code): void
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
     * @return HttpStatus Code of response.
     */
    public function getResponseCode(): HttpStatus
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

    /**
     * Gets time of request handling start.
     * @return \DateTime Time of request handling start.
     */
    public function getRequestTime(): \DateTime
    {
        return $this->requestTime;
    }

    /**
     * Gets session data.
     * @return array Session data.
     */
    public function getSession(): array
    {
        return $this->session;
    }

    /**
     * Gets cookies data.
     * @return array Cookies data.
     */
    public function getCookies(): array
    {
        return $this->cookies;
    }

    /**
     * Gets flag, whether session should be flushed.
     * @return bool TRUE if session should be flushed,
     *              FALSE otherwise.
     */
    public function getFlushSession(): bool
    {
        return $this->flushSession;
    }

    /**
     * Gets address to which response will be sent.
     * @return string Address to which response will be sent.
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * Cleans output buffer.
     */
    public function clean(): void
    {
        $this->clean = true;
    }

    /**
     * Checks, whether output buffer should be cleaned.
     * @return bool TRUE if output buffer should be cleaned,
     *              FALSE otherwise.
     */
    public function getClean(): bool
    {
        return $this->clean;
    }
}

?>
