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
 * Enumeration of all available color symbols.
 */
enum ColorSymbol
{
    /**
     * Symbol of black color.
     */
    case Black;

    /**
     * Symbol of gray color.
     */
    case Gray;

    /**
     * Symbol of white color.
     */
    case White;

    /**
     * Symbol of red color.
     */
    case Red;

    /**
     * Symbol of green color.
     */
    case Green;

    /**
     * Symbol of blue color.
     */
    case Blue;

    /**
     * Symbol of cyan color.
     */
    case Cyan;

    /**
     * Symbol of magenta color.
     */
    case Magenta;

    /**
     * Symbol of yellow color.
     */
    case Yellow;

    /**
     * Creates string which sets background color of text.
     * @return string String which sets background color of text.
     */
    public function toBackground(): string
    {
        $reti = "\x1B";
        switch($this)
        {
            case ColorSymbol::Black:   $reti .= "[;40m";   break;
            case ColorSymbol::Gray:    $reti .= "[;100m";  break;
            case ColorSymbol::White:   $reti .= "[;107m";  break;
            case ColorSymbol::Red:     $reti .= "[;101m";  break;
            case ColorSymbol::Green:   $reti .= "[;102m";  break;
            case ColorSymbol::Blue:    $reti .= "[;104m";  break;
            case ColorSymbol::Cyan:    $reti .= "[;106m";  break;
            case ColorSymbol::Magenta: $reti .= "[;105m";  break;
            case ColorSymbol::Yellow:  $reti .= "[;103m";  break;
            default:                   $reti .= "[;49m";   break;
        }
        return $reti;
    }

    /**
     * Creates string which sets foreground color of text.
     * @return string String which sets foreground color of text.
     */
    public function toForeground(): string
    {
        $reti = "\x1B";
        switch($this)
        {
            case ColorSymbol::Black:   $reti .= "[;30m";   break;
            case ColorSymbol::Gray:    $reti .= "[;90m";   break;
            case ColorSymbol::White:   $reti .= "[;97m";   break;
            case ColorSymbol::Red:     $reti .= "[;91m";   break;
            case ColorSymbol::Green:   $reti .= "[;92m";   break;
            case ColorSymbol::Blue:    $reti .= "[;94m";   break;
            case ColorSymbol::Cyan:    $reti .= "[;96m";   break;
            case ColorSymbol::Magenta: $reti .= "[;95m";   break;
            case ColorSymbol::Yellow:  $reti .= "[;93m";   break;
            default:                   $reti .= "[;39m";   break;
        }
        return $reti;
    }

    /**
     * Creates color symbol from its string representation.
     * @param string $string String representation of color symbol.
     * @return ?ColorSymbol Color symbol parsed from its string representation,
     *                       or NULL if string representation is not valid.
     */
    public static function fromString(string $string): ?ColorSymbol
    {
        $reti = null;
        $input = strtoupper(StringUtils::trim($string));
        switch($input)
        {
            case "BLACK":   $reti = ColorSymbol::Black;   break;
            case "GRAY":    $reti = ColorSymbol::Gray;    break;
            case "WHITE":   $reti = ColorSymbol::White;   break;
            case "RED":     $reti = ColorSymbol::Red;     break;
            case "GREEN":   $reti = ColorSymbol::Green;   break;
            case "BLUE":    $reti = ColorSymbol::Blue;    break;
            case "CYAN":    $reti = ColorSymbol::Cyan;    break;
            case "MAGENTA": $reti = ColorSymbol::Magenta; break;
            case "YELLOW":  $reti = ColorSymbol::Yellow;  break;
            default:        $reti = null;                 break;
        }
        return $reti;
    }
}

?>
