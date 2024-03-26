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

use DateTime;
use PHPMovic\Utils\Format\DateSymbol;
use PHPMovic\Utils\Format\TimeSymbol;

/**
 * Class which represents format of date and time.
 */
class DateTimeFormat
{
    /**
     * Symbols contained in format.
     */
    private array $symbols;

    /**
     * Creates new format of date and time.
     * @param array $symbols Symbols used for formatting.
     */
    public function __construct(array $symbols = array()) 
    {
        $this->symbols = $symbols;
    }

    /**
     * Adds date symbol to format.
     * @param DateSymbol $symbol Symbol which will be added to format.
     */
    public function addDateSymbol(DateSymbol $symbol): void
    {
        array_push($this->symbols, $symbol);
    }

    /**
     * Adds time symbol to format.
     * @param TimeSymbol $symbol Symbol which will be added to format.
     */
    public function addTimeSymbol(TimeSymbol $symbol): void
    {
        array_push($this->symbols, $symbol);
    }

    /**
     * Adds string to format.
     * @param string $string String which will be added to format.
     */
    public function addString(string $string): void
    {
        array_push( $this->symbols, $string);
    }

    /**
     * Formats date time according to set format.
     * @param DateTime $date Date and time which will be formatted.
     * @return string Formatted date time.
     */
    public function format(DateTime $date): string
    {
        $reti = "";
        foreach ($this->symbols as $symbol)
        {
            if ($symbol instanceof DateSymbol)
            {
                $reti .= $symbol->format($date);
            }
            else if ($symbol instanceof TimeSymbol)
            {
                $reti .= $symbol->format($date);
            }
            else
            {
                $reti .= strval($symbol);
            }
        }
        return $reti;
    }
}

?>
