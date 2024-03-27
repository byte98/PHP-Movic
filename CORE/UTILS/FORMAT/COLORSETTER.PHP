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

use PHPMovic\Utils\Format\ColorSymbol;
use PHPMovic\Utils\Format\ColorType;
use PHPMovic\Utils\StringUtils;

/**
 * Class which sets color for output.
 */
class ColorSetter
{
    /**
     * Type of color.
     */
    private readonly ColorType $type;

    /**
     * Symbol with actual color.
     */
    private readonly ColorSymbol $symbol;

    /**
     * Creates new setter of color of output.
     * @param ColorType $type Type of color.
     * @param ColorSymbol $symbol Symbol with actual color.
     */
    public function __construct(ColorType $type, ColorSymbol $symbol)
    {
        $this->type = $type;
        $this->symbol = $symbol;
    }

    /**
     * Creates string with actual ability to set color of output.
     * @return string String with actual ability to set color of output.
     */
    public function toString(): string
    {
        $reti = "";
        if ($this->type == ColorType::Foreground) 
        {
            $reti = $this->symbol->toForeground();
        }
        else if ($this->type == ColorType::Background)
        {
            $reti = $this->symbol->toBackground();
        }
        return $reti;
    }

    /**
     * Creates setter of color of output from its string representation.
     */
    public static function fromString(string $string): ?ColorSetter
    {
        $reti = null;
        $string = strtoupper(StringUtils::trim($string));
        if (preg_match('/^(CB|CF)\[(.*)\]$/', $string, $matches))
        {
            $mt = $matches[1];
            $type = null;
            if ($mt == "CB") $type = ColorType::Background;
            if ($mt == "CF") $type = ColorType::Foreground;
            if ($type != null)
            {
                $symbol = ColorSymbol::fromString($matches[2]);
                if ($symbol != null)
                {
                    $reti = new ColorSetter($type, $symbol);
                }
            }
            
        }
        return $reti;
    }
}

?>
