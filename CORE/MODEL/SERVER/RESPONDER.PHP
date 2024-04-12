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
use PHPMovic\Utils\Log\LogLevel;
use PHPmovic\Model\Server\HttpStatus;
use PHPMovic\Utils\DateUtils;

/**
 * Class which handles responses to requests.
 */
class Responder
{
    /**
     * Sends response.
     * @param Response $response Response to send.
     */
    public function respond(Response $response): void
    {
        $this->handleSession($response);
        $this->handleCookies($response);
        $this->handleHeaders($response);
        http_response_code($response->getResponseCode()->value);
        $this->handleClean($response);
        $this->handleViews($response);
        Application::logger()->log(
            Responder::getLevelFromStatus($response->getResponseCode()),
            "Response (#" . $response->getNumber() . " to " . $response->getAddress() . "): " . $response->getResponseCode()->toString() .
            " (in " . DateUtils::elapsed($response->getRequestTime(), DateUtils::now()) . ")");
    }

    /**
     * Handles cleaning of output buffer.
     * @param response $response Response defining actions with cleaning.
     */
    private function handleClean(Response $response): void
    {
        if ($response->getClean() == true)
        {
            ob_clean();
            flush();
        }
    }

    /**
     * Gets level of log assigned to HTTP status code.
     * @param HttpStatus $status HTTP status code.
     * @return LogLevel Level of log assigned to HTTP status code.
     */
    private static function getLevelFromStatus(HttpStatus $status): LogLevel
    {
        $reti = LogLevel::Info;
        $val = $status->value;
        if ($val >= 200 && $val <= 299)
        {
            $reti = LogLevel::Success;
        }
        else if ($val >= 400 && $val <= 499)
        {
            $reti = LogLevel::Warning;
        }
        else if ($val >= 500 && $val <= 599)
        {
            $reti = LogLevel::Critical;
        }
        return $reti;
    }

    /**
     * Handles session flushing and data management.
     * @param response $response Response defining actions with session.
     */
    private function handleSession(Response $response): void
    {
        if ($response->getFlushSession() == true)
        {
            Application::logger()->debug("Response (#" . $response->getNumber() . " to " . $response->getAddress() . "): flushing session");
            session_destroy();
            session_unset();
            session_start();
        }
        $c = 0;
        foreach($response->getSession() as $key => $value)
        {
            $_SESSION[$key] = $value;
            $c++;
        }
        Application::logger()->debug("Response (#" . $response->getNumber() . " to " . $response->getAddress() . "): " . $c . " session variables set");
    }

    /**
     * Handles all application cookies.
     * @param response $response Response defining actions with cookies.
     */
    private function handleCookies(Response $response): void
    {
        $toSet = array();
        $deleted = 0;
        $set = 0;
        foreach($response->getCookies() as $key => $value)
        {
            $toSet[$key] = $value;
        }
        if (isset($_SERVER["COOKIE"]))
        {
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                if (array_key_exists($name, $toSet) == false)
                {
                    setcookie($name, '', time()-1000);
                    setcookie($name, '', time()-1000, '/');
                    $deleted++;
                }
                
            }
        }
        foreach($toSet as $key => $value)
        {
            setcookie($key, $value);
            $set++;
        }
        Application::logger()->debug("Response (#" . $response->getNumber() . " to " . $response->getAddress() . "): Cookies handled - " . $deleted . " cookies deleted, " . $set . " cookies set");
    }

    /**
     * Handles all response headers.
     * @param response $response Response defining actions with headers.
     */
    private function handleHeaders(Response $response): void
    {
        $counter = 0;
        foreach($response->getHeaders() as $key => $value)
        {
            header($key . ": " . $value);
            $counter++;
        }
        Application::logger()->debug("Response (#" . $response->getNumber() . " to " . $response->getAddress() . "): " . $counter . " headers set");
    }

    /**
     * Handles all response views.
     * @param response $response Response defining actions with views.
     */
    private function handleViews(Response $response): void
    {
        $counter = 0;
        foreach($response->getViews() as $view)
        {
            $view->insert();
            $counter++;
            Application::logger()->debug("Response (#" . $response->getNumber() . " to " . $response->getAddress() . "): view inserted: " . $view->getView()::class);
        }
        Application::logger()->low("Response (#" . $response->getNumber() . " to " . $response->getAddress() . "): " . $counter . " views inserted");
    }
}

?>
