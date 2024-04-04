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

use PHPMovic\Utils\Format\ColorSetter;
use PHPMovic\Utils\Format\StyleSymbol;
use PHPMovic\Utils\Format\LogDataSymbol;
use PHPMovic\Utils\Log\Log;

/**
 * Class which holds format of log.
 */
class LogFormat
{
    /**
     * Array with symbols defining format.
     */
    private array $symbols;

    /**
     * Creates new format of logs.
     * @param array $symbols Array with symbols defining format.
     */
    public function __construct(array $symbols = array())
    {
        $this->symbols = $symbols;
    }

    /**
     * Adds new symbol defining style to format.
     * @param StyleSymbol $style Symbol defining style.
     */
    public function addStyle(StyleSymbol $style): void
    {
        array_push($this->symbols, $style);
    }

    /**
     * Adds new symbol defining color to format.
     * @param ColorSetter $color Symbol defining color.
     */
    public function addColor(ColorSetter $color): void
    {
        array_push($this->symbols, $color);
    }

    /**
     * Adds new symbol defining data to format.
     * @param LogDataSymbol $data Symbol defining data.
     */
    public function addData(LogDataSymbol $data): void
    {
        array_push($this->symbols, $data);
    }

    /**
     * Adds string to format.
     * @param string $string String to add.
     */
    public function addString(string $string): void
    {
        array_push($this->symbols, $string);
    }

    /**
     * Formats log according to the format.
     * @param Log $log Log to format.
     * @param DateTimeFormat $dateFormat Date format to use.
     * @param bool $style Flag, whether style should be applied.
     * @return string String containing formatted log.
     */
    public function format(Log $log, DateTimeFormat $dateFormat, bool $style = true): string
    {
        $reti = "";
        foreach($this->symbols as $symbol)
        {
            if ($symbol instanceof LogDataSymbol)
            {
                $reti .= $symbol->getLogValue($log, $dateFormat);
            }
            else if ($symbol instanceof ColorSetter && $style == true)
            {
                $reti .= $symbol->toString();
            }
            else if ($symbol instanceof StyleSymbol && $style == true)
            {
                $reti .= $symbol->toString();
            }
            else if (gettype($symbol) == "string")
            {
                $reti .= $symbol;
            }
            else if ($symbol instanceof StyleSymbol == false && $symbol instanceof ColorSetter == false && $symbol instanceof LogDataSymbol == false)
            {
                $reti .= var_export($symbol, true);
            }
        }
        return $reti;
    }
}

?>
