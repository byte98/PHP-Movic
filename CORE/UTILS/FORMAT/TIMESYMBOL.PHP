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
use PHPMovic\Utils\StringUtils;

/**
 * Enumeration of all symbols used for formatting time.
 */
enum TimeSymbol
{
    /**
     * Hour in 24 hours format.
     */
    case Hour24;

    /**
     * Zero padded hour in 24 hours format.
     */
    case ZeroHour24;

    /**
     * Hour in 12 hours format.
     */
    case Hour12;

    /**
     * Zero padded hour in 12 hours format.
     */
    case ZeroHour12;

    /**
     * Minutes.
     */
    case Minute;

    /**
     * Zero padded minutes.
     */
    case ZeroMinute;

    /**
     * Seconds.
     */
    case Second;

    /**
     * Zero padded seconds.
     */
    case ZeroSecond;

    /**
     * Milliseconds.
     */
    case Millisecond;

    /**
     * Zero padded milliseconds.
     */
    case ZeroMillisecond;

    /**
     * Lower case period.
     */
    case PeriodLower;

    /**
     * Upper case period.
     */
    case PeriodUpper;

    /**
     * Gets time symbol from its string representation.
     * @param string $str String representation of time symbol.
     * @return ?TimeSymbol Time symbol parsed from its string representation,
     *                     or NULL if symbol cannot be parsed.
     */
    public static function fromString(string $str) : ?TimeSymbol
    {
        $reti = null;
        $input = StringUtils::trim($str);
        switch($input)
        {
            case "H":  $reti = TimeSymbol::Hour24;          break;
            case "0H": $reti = TimeSymbol::ZeroHour24;      break;
            case "G":  $reti = TimeSymbol::Hour12;          break;
            case "0G": $reti = TimeSymbol::ZeroHour12;      break;
            case "M":  $reti = TimeSymbol::Minute;          break;
            case "0M": $reti = TimeSymbol::ZeroMinute;      break;
            case "S":  $reti = TimeSymbol::Second;          break;
            case "0S": $reti = TimeSymbol::ZeroSecond;      break;
            case "U":  $reti = TimeSymbol::Millisecond;     break;
            case "0U": $reti = TimeSymbol::ZeroMillisecond; break;
        }
        return $reti;
    }
}

