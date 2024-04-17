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

namespace PHPMovic\Model\Configuration;

/**
 * Class which holds configuration of sessions.
 */
class SessionModel
{
    /**
     * Name of variable in session data, where timer is stored.
     */
    public const SessionTimer = "__phpmovic_session_timer";

    /**
     * Name of variable in session data, where date and time
     * of start of actual time frame is stored.
     */
    public const SessionTimeFrame = "__phpmovic_session_timeframe";

    /**
     * Name of variable in session data, where number of requests
     * during defined time frame is stored.
     */
    public const SessionRequests = "__phpmovic_session_requests";

    /**
     * Name of variable in session data, where IP address is stored.
     */
    public const SessionIP = "__phpmovic_session_address";

    /**
     * Timeout of session (in seconds).
     */
    private readonly int $timeout;

    /**
     * Flag, whether session should have same IP address as long
     * as session exists.
     */
    private readonly bool $matchIP;

    /**
     * Time frame used for counting requests.
     */
    private readonly int $reqTime;

    /**
     * Maximal number of requests during defined time frame.
     */
    private readonly int $reqCount;

    /**
     * Creates new holder of confiugration of sessions.
     * @param int $timeout Timeout of session (in seconds).
     * @param bool $matchIP Flag, whether session should have same IP
     *                      address as long as session exists.
     * @param int $reqTime Time frame used for counting requests.
     * @param int $reqCount Maximal number of requests during defined
     *                      time frame.
     */
    public function __construct(int $timeout, bool $matchIP, int $reqTime, int $reqCount)
    {
        $this->timeout = $timeout;
        $this->matchIP = $matchIP;
        $this->reqTime = $reqTime;
        $this->reqCount = $reqCount;
    }

    /**
     * Gets timeout of session (in seconds).
     * @return int Timeout of session (in seconds).
     */
    public function getTimeout(): int
    {
        return $this->timeout;
    }
    
    /**
     * Gets flag, whether session should have same IP address as long as session exists.
     * @return bool Flag, whether session should have same IP address as long as session exists.
     */
    public function getMatchIP(): bool
    {
        return $this->matchIP;
    }
    
    /**
     * Gets time frame used for counting requests.
     * @return int Time frame used for counting requests.
     */
    public function getReqTime(): int
    {
        return $this->reqTime;
    }
    
    /**
     * Gets maximal number of requests during defined time frame.
     * @return int Maximal number of requests during defined time frame.
     */
    public function getReqCount(): int
    {
        return $this->reqCount;
    }
}

?>
