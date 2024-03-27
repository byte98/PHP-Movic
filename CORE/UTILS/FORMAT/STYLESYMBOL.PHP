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
 * Enumeration of all style symbols usable in format string.
 */
enum StyleSymbol
{

    /**
     * Text in bold style.
     */
    case Bold;

    /**
     * Text in italic style.
     */
    case Italic;

    /**
     * Underlined text.
     */
    case Underline;

    /**
     * Reset all formatting.
     */
    case Reset;

    /**
     * Gets string representation of the symbol ready to
     * be printed out.
     * @return string String representation of the symbol.
     */
    public function toString(): string
    {
        $reti = "\x1B";
        switch ($this)
        {
            case StyleSymbol::Bold:      $reti .= "[1m"; break;
            case StyleSymbol::Italic:    $reti .= "[3m"; break;
            case StyleSymbol::Underline: $reti .= "[4m"; break;
            case StyleSymbol::Reset:     $reti .= "[0m"; break;
            default:                     $reti = "";     break;
        }
        return $reti;
    }

    /**
     * Gets style symbol from its string representation.
     * @param string $str String representation of the symbol.
     * @return ?StyleSymbol Style symbol parsed from its string representation,
     *                      or NULL if string does not contain any valid style symbol.
     */
    public static function fromString(string $str): ?StyleSymbol
    { 
        $reti = null;
        $input = strtoupper(StringUtils::trim($str));
        switch($input)
        {
            case "B":  $reti = StyleSymbol::Bold;       break;
            case "I":  $reti = StyleSymbol::Italic;     break;
            case "U":  $reti = StyleSymbol::Underline;  break;
            case "FR": $reti = StyleSymbol::Reset;      break;
        }
        return $reti;
    }
}

?>
