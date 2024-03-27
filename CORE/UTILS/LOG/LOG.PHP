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

namespace PHPMovic\Utils\Log;

use PHPMovic\Utils\Log\LogLevel;

/**
 * Class which represents one single log of application.
 */
class Log
{
    /**
     * Message connected with log.
     */
    private readonly string $message;

    /**
     * Level of log.
     */
    private readonly LogLevel $level;

    /**
     * Date and time of log creation.
     */
    private readonly \DateTime $date;

    /**
     * Creates new log.
     * @param string $message Message connected with log.
     * @param LogLevel $level Level of log.
     * @param \DateTime $date Date and time of log creation.
     */
    public function __construct(string $message, LogLevel $level, \DateTime $date = new \DateTime())
    {
        $this->message = $message;
        $this->level = $level;
        $this->date = $date;
    }

    /**
     * Gets message connected with log.
     * @return string Message connected with log.
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Gets level of log.
     * @return LogLevel Level of log.
     */
    public function getLevel(): LogLevel
    {
        return $this->level;
    }

    /**
     * Gets date and time of log creation.
     * @return \DateTime Date and time of log creation.
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

}

?>
