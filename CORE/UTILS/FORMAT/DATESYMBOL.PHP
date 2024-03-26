<?php
use PHPMovic\Utils\StringUtils;
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
 * Enumeration of all symbols used for date formatting.
 */
enum DateSymbol
{
    /**
     * Day in month.
     */
    case Day;

    /**
     * Zero padded day in month.
     */
    case ZeroDay;

    /**
     * Number of month.
     */
    case Month;

    /**
     * Zero padded number of month.
     */
    case ZeroMonth;

    /**
     * Full length year.
     */
    case Year;

    /**
     * Year shortened to its last two digits.
     */
    case ShortYear;

    /**
     * Gets date symbol from its string representation.
     * @param string $string String representation of date symbol.
     * @return ?DateSymbol Date symbol parsed from its string representation,
     *                    or NULL if it could not be parsed.
     */
    public static function fromString(string $string): ?DateSymbol{
        $reti = null;
        $input = StringUtils::trim($string);
        switch ($input) 
        {
            case "d":   $reti = DateSymbol::Day;       break;
            case "0d":  $reti = DateSymbol::ZeroDay;   break;
            case "m":   $reti = DateSymbol::Month;     break;
            case "0m":  $reti = DateSymbol::ZeroMonth; break;
            case "y":   $reti = DateSymbol::Year;      break;
            case "s":   $reti = DateSymbol::ShortYear; break;
        }
        return $reti;
    }

    /**
     * Formats date according to the symbol.
     * @param \DateTime $date Date to format.
     * @return string String containing value from date according
     *                to the symbol.
     */
    public function format(\DateTime $date): string{
        $reti = "";
        switch($this)
        {
            case DateSymbol::Day:       $reti = $date->format("j");       break;
            case DateSymbol::ZeroDay:   $reti = $date->format("d");       break;
            case DateSymbol::Month:     $reti = $date->format("n");       break;
            case DateSymbol::ZeroMonth: $reti = $date->format("m");       break;
            case DateSymbol::Year:      $reti = $date->format("Y");       break;
            case DateSymbol::ShortYear: $reti = $date->format("y");       break;
        }
        return $reti;
    }
}

?>
