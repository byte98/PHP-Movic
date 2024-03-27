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



use PHPMovic\Utils\StringUtils;

/**
 * Enumeration of all available levels of log.
 */
enum LogLevel
{

    /**
     * Lowest level of log.
     */
    case Low;

    /**
     * Base level of log.
     */
    case Base;

    /**
     * Log with some kind of important information.
     */
    case Info;

    /**
     * Log informing about successfull operation.
     */
    case Success;

    /**
     * Log with some kind of warning.
     */
    case Warning;

    /**
     * Log holding information about error.
     */
    case Error;

    /**
     * Log informing about critical error.
     */
    case Critical;

    /**
     * Gets integer representation of weight of this log level.
     * @return int Weight of this log level.
     */
    private function getWeight(): int
    {
        $reti = 0;

        switch($this)
        {
            case LogLevel::Low:      $reti = 1;  break;
            case LogLevel::Base:     $reti = 2;  break;
            case LogLevel::Info:     $reti = 4;  break;
            case LogLevel::Success:  $reti = 8;  break;
            case LogLevel::Warning:  $reti = 16; break;
            case LogLevel::Error:    $reti = 32; break;
            case LogLevel::Critical: $reti = 64; break;
        }

        return $reti;
    }

    /**
     * Gets string representation of this log level.
     * @return string String representation of this log level.
     */
    public function toString(): string
    {
        $reti = "<UNKNOWN>";

        switch($this)
        {
            case LogLevel::Low:      $reti = "LOW";      break;
            case LogLevel::Base:     $reti = "BASE";     break;
            case LogLevel::Info:     $reti = "INFO";     break;
            case LogLevel::Success:  $reti = "SUCCESS";  break;
            case LogLevel::Warning:  $reti = "WARNING";  break;
            case LogLevel::Error:    $reti = "ERROR";    break;
            case LogLevel::Critical: $reti = "CRITICAL"; break;
        }

        return $reti;
    }

    /**
     * Gets log level from its string representation.
     * @param string $level String representation of log level.
     * @return LogLevel Log level from string representation,
     *                  or NULL if string does not contain valid log level.
     */
    public static function fromString(string $level): ?LogLevel
    {
        $reti = null;
        $input = strtoupper(StringUtils::trim($level));
        switch($input)
        {
            case "LOW":      $reti = LogLevel::Low;       break;
            case "BASE":     $reti = LogLevel::Base;      break;
            case "INFO":     $reti = LogLevel::Info;      break;
            case "SUCCESS":  $reti = LogLevel::Success;   break;
            case "WARNING":  $reti = LogLevel::Warning;   break;
            case "ERROR":    $reti = LogLevel::Error;     break;
            case "CRITICAL": $reti = LogLevel::Critical;  break;
        }
        return $reti;
    }

    /**
     * Gets log level from its string representation.
     * @param string $level String representation of log level.
     * @param LogLevel $ifNull If string does not contain valid log level,
     *                         this level will be returned.
     * @return LogLevel Log level from string representation,
     *                  or $ifNull if string does not contain valid log level.
     */
    public static function fromStringOrDefined(string $level, LogLevel $ifNull): LogLevel
    {
        $reti = LogLevel::fromString($level);
        if ($reti == null)
        {
            $reti = $ifNull;
        }
        return $reti;
    }

    /**
     * Checks if this log level is greater than or equals to given log level.
     * @param LogLevel $other Log level to compare with.
     * @return bool TRUE if this log level is greater or equals to given log level,
     *              FALSE otherwise.
     */
    public function isGreaterOrEquals(LogLevel $other): bool
    {
        return $this->getWeight() >= $other->getWeight();
    }
}

?>
