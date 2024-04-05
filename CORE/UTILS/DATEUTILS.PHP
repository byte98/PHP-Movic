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

namespace PHPMovic\Utils;

use DateTime;
use DateTimeZone;

/**
 * Class which contains some utility functions
 * to work with dates.
 */
abstract class DateUtils
{
    /**
     * Gets default time zone for whole application.
     * @return DateTimeZone Default time zone for whole application.
     */
    public static function getDefaultTimezone(): DateTimeZone
    {
        $tz = date_default_timezone_get();
        $reti = new DateTimeZone($tz);
        return $reti;
    }

    /**
     * Gets actual date and time.
     * @return DateTime Actual date and time.
     */
    public static function now(): DateTime
    {
        $reti = new DateTime('now', DateUtils::getDefaultTimezone());
        return $reti;
    }

    /**
     * Gets time elapsed between two dates and times in human readable format.
     * @param DateTime $start Start date and time.
     * @param DateTime $end End date and time.
     * @return string Time elapsed between two dates and times in human readable format.
     */
    public static function elapsed(DateTime $start, DateTime $end): string
    {
        $interval = $start->diff($end);
    
        $elapsed = '';
        if ($interval->days > 0) {
            $elapsed .= $interval->days . ' day' . ($interval->days > 1 ? 's ' : ' ');
        }
        if ($interval->h > 0) {
            $elapsed .= $interval->h . ' hour' . ($interval->h > 1 ? 's ' : ' ');
        }
        if ($interval->i > 0) {
            $elapsed .= $interval->i . ' minute' . ($interval->i > 1 ? 's ' : ' ');
        }
        if ($interval->s > 0) {
            $elapsed .= $interval->s . ' second' . ($interval->s > 1 ? 's ' : ' ');
        }
        if ($interval->f > 0) {
            $elapsed .= $interval->f . ' millisecond';
        }

        // Trim any extra space at the end
        $elapsed = trim($elapsed);

        return $elapsed;
    }
}

?>
