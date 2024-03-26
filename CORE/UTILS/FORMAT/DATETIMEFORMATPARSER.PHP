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

use PHPMovic\Utils\Format\DateTimeFormat;
use PHPMovic\Utils\Format\DateSymbol;
use PHPMovic\Utils\Format\TimeSymbol;
use PHPMovic\Utils\SymbolParser;

/**
 * Class with ability to parse date and time format string.
 */
class DateTimeFormatParser
{
    /**
     * String representing format of date and time.
     */
    private readonly string $formatString;

    /**
     * Format parsed from format string.
     */
    private ?DateTimeFormat $format;


    /**
     * Creates new parser of date time format.
     * @param string $format String containing format of date and time.
     */
    public function __construct(string $format)
    {
        $this->format = null;
        $this->formatString = $format;
    }

    /**
     * Parses format from format string.
     */
    private function parse(): void
    {
        $this->format = new DateTimeFormat();
        $stream = new SymbolParser($this->formatString);
        while($stream -> hasNext())
        {
            $val = $stream -> next();
            if ($stream->isSymbol())
            {
                $this->parseSymbol($val);
            }
            else
            {
                $this->format->addString($val);
            }
        }
    }

    /**
     * Parses symbol represented by its string value.
     * @param string $symbol String representation of symbol.
     */
    private function parseSymbol(string $symbol)
    {
        $dateSymbol = DateSymbol::fromString($symbol);
        if ($dateSymbol == null)
        {
            $timeSymbol = TimeSymbol::fromString($symbol);
            if ($timeSymbol == null)
            {
                $this->format->addString("%" . $symbol . "%");
            }
            else
            {
                $this->format->addTimeSymbol($timeSymbol);
            }
        }
        else
        {
            $this->format->addDateSymbol($dateSymbol);
        }
    }

    /**
     * Gets format from parsed string.
     * @return DateTimeFormat Format of date and time parsed from string.
     */
    public function getFormat(): DateTimeFormat
    {
        if ($this->format == null) 
        {
            $this->parse();
        }
        return $this->format;
    }
}

?>
