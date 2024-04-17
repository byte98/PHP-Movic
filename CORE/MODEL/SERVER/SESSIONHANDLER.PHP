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
use PHPMovic\Model\Configuration\SessionModel;
use PHPMovic\Utils\ArrayUtils;
use PHPMovic\Utils\DateUtils;
use PHPMovic\Application;

/**
 * Class which handles session in incoming request.
 */
class SessionHandler
{
    /**
     * Data stored in session.
     */
    private readonly array $data;

    /**
     * Data which should be saved in session after check.
     */
    private ?array $output;

    /**
     * Actual timer of session (used for checking session lifetime).
     */
    private \DateTime $timer;

    /**
     * Start of actual time frame of session.
     */
    private \DateTime $frame;

    /**
     * Number of requests in actual time frame.
     */
    private int $requests;

    /**
     * Configuration of session.
     */
    private readonly SessionModel $config;

    /**
     * Flag, whether requests limit has been exceeded.
     */
    private bool $limitExceeded;

    /**
     * Creates new session handler.
     * @param array $data Data stored in session.
     * @param SessionModel $config Configuration of session.
     */
    public function __construct(array $data, SessionModel $config)
    {
        $this->data = $data;
        $this->config = $config;
        $this->timer = DateUtils::now();
        $this->frame = DateUtils::now();
        $this->requests = PHP_INT_MAX;
        $this->parseData();
        $this->output = null;
        $this->limitExceeded = false;
    }

    /**
     * Parses data from session to get usefull information.
     */
    private function parseData(): void
    {
        if (array_key_exists(SessionModel::SessionTimer, $this->data) && 
            $this->data[SessionModel::SessionTimer] instanceof \DateTime)
            {
                $this->timer = $this->data[SessionModel::SessionTimer];
            }
        if (array_key_exists(SessionModel::SessionTimeFrame, $this->data) &&
            $this->data[SessionModel::SessionTimeFrame] instanceof \DateTime)
            {
                $this->frame = $this->data[SessionModel::SessionTimeFrame];
            }
        if (ArrayUtils::checkValue($this->data, SessionModel::SessionRequests, "integer"))
        {
            $this->requests = $this->data[SessionModel::SessionRequests];
        }
    }

    /**
     * Checks session for validity.
     */
    private function checkSession(): void
    {
        $this->limitExceeded = false;
        $expiration = $this->isExpired();
        if ($expiration === false)
        {
            Application::logger()->info("Session has expired");
        }
        else
        {
            Application::logger()->debug("Session is valid for " . DateUtils::elapsed(DateUtils::now(), $expiration));
            $this->checkTimeFrame();
            $this->copyData();
            $this->requests++;
            if ($this->config->getReqCount() >= $this->requests)
            {
                Application::logger()->debug("Request can fit in actual session time frame (actual:" . $this->requests . ", limit:" . $this->config->getReqCount() . ")");
                $this->limitExceeded = false;
            }
            else
            {
                Application::logger()->debug("Request is out of actual time frame (actual:" . $this->requests . ", limit:" . $this->config->getReqCount() . ")");
                $this->limitExceeded = true;
            }
        }
        $this->saveSessionInfo();
    }

    /**
     * Checks, whether requests limit has been exceeded.
     * @return bool TRUE if requests limit has been exceeded,
     *              FALSE otherwise.
     */
    public function exceededLimit(): bool
    {
        return $this->limitExceeded;
    }

    /**
     * Checks, whether actual time frame is expired. If so,
     * it creates new one with resetted counter.
     */
    private function checkTimeFrame(): void
    {
        $now = DateUtils::now();
        $intervalString = "PT" . strval($this->config->getReqTime()) . "S";
        $interval = new \DateInterval($intervalString);
        $valid = new \DateTime($this->frame->format("Y-m-d H:i:s"));
        $valid = $valid->add($interval);
        $expired = $now >= $valid;
        if ($expired == true)
        {
            Application::logger()->info("Time frame has expired - creating new one");
            $this->frame = DateUtils::now();
            $this->requests = 0;
        }
        else
        {
            Application::logger()->low("Time frame is valid for " . DateUtils::elapsed(DateUtils::now(), $valid));
        }
    }

    /**
     * Copies data from input to the output.
     */
    private function copyData(): void
    {
        $this->output = array();
        foreach($this->data as $key => $value)
        {
            if ($key != SessionModel::SessionTimer && $key != SessionModel::SessionTimeFrame && $key != SessionModel::SessionRequests)
            {
                $this->output[$key] = $value;
            }
        }
    }

    /**
     * Saves information about session.
     */
    private function saveSessionInfo(): void
    {
        if ($this->output === null)
        {
            $this->output = array();
        }
        $this->output[SessionModel::SessionTimer] = DateUtils::now();
        $this->output[SessionModel::SessionTimeFrame] = $this->frame;
        $this->output[SessionModel::SessionRequests] = $this->requests;
    }

    /**
     * Checks, if session has expired.
     * @return \DateTime | false
     *          Date time to when is session valid,
     *          or false if session is expired.
     */
    private function isExpired(): \DateTime | false
    {
        $reti = true;
        $now = DateUtils::now();
        $intervalString = "PT" . strval($this->config->getTimeout()) . "S";
        $interval = new \DateInterval($intervalString);
        $valid = new \DateTime($this->timer->format("Y-m-d H:i:s"));
        $valid = $valid->add($interval);
        if ($now >= $valid)
        {
            $reti = false;
        }
        else
        {
            $reti = $valid;
        }
        return $reti;
    }

    /**
     * Gets data from session with checking of session lifetime.
     * @return array Data from session.
     */
    public function getData(): array
    {
        if ($this->data === null)
        {
            $this->checkSession();
        }
        return $this->data;
    }
}

?>
