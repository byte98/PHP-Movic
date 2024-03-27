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

namespace PHPMovic\Utils\Format;

use PHPMovic\Utils\Log\Log;
use PHPMovic\Utils\StringUtils;


/**
 * Enumeration of all data symbols used in log format.
 */
enum LogDataSymbol
{
    /**
     * Date and time of log creation.
     */
    case Date;

    /**
     * Level of log.
     */
    case Level;

    /**
     * Mesage of log.
     */
    case Message;

    /**
     * Creates log data symbol from its string representation.
     * @param string $string String representation of log data symbol.
     * @return ?LogDataSymbol Log data symbol parsed from string,
     *                        or NULL if string does not contain valid symbol.
     */
    public static function fromString(string $string): ?LogDataSymbol
    {
        $reti = null;
        $input = strtoupper(StringUtils::trim($string));
        switch ($input) 
        {
            case "DATE":    $reti = LogDataSymbol::Date;    break;
            case "LEVEL":   $reti = LogDataSymbol::Level;   break;
            case "MESSAGE": $reti = LogDataSymbol::Message; break;
        }
        return $reti;
    }

    /**
     * Gets value of log according to symbol.
     * @param Log $log Log to get value from.
     * @param DateTimeFormat $dateFormat Format of expected date.
     * @return string Value from log.
     */
    public function getLogValue(Log $log, DateTimeFormat $dateFormat): string
    {
        $reti = "";
        switch ($this)
        {
            case LogDataSymbol::Date:    $reti = $dateFormat->format($log->getDate()); break;
            case LogDataSymbol::Level:   $reti = $log->getLevel()->toString();         break;
            case LogDataSymbol::Message: $reti = $log->getMessage();                   break;
        }
        return $reti;
    }
}

?>
