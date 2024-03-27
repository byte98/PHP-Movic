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

use PHPMovic\Utils\Format\LogFormat;
use PHPMovic\Utils\Format\LogDataSymbol;
use PHPMovic\Utils\Format\StyleSymbol;
use PHPMovic\Utils\Format\ColorSetter;
use PHPMovic\Utils\SymbolParser;

/**
 * Class which parses log format from format string.
 */
class LogFormatParser
{
    /**
     * String defining format.
     */
    private readonly string $formatString;

    /**
     * Parsed format.
     */
    private ?LogFormat $format;

    /**
     * Creates new parser of log format.
     * @param string $formatString String defining format of logs.
     */
    public function __construct(string $formatString)
    {
        $this->formatString = $formatString;
        $this->format = null;
    }

    /**
     * Parses string format.
     */
    private function parse(): void
    {
        $this->format = new LogFormat();
        $stream = new SymbolParser($this->formatString);
        while ($stream->hasNext())
        {
            $symbol = $stream->next();
            if ($stream->isSymbol())
            {
                $this->parseSymbol($symbol);
            }
            else
            {
                $this->format->addString($symbol);
            }
        }
    }

    /**
     * Parses one symbol.
     *  @param string $symbol String containing symbol to be parsed.
     */
    private function parseSymbol(string $symbol): void
    {
        $dataSymbol = LogDataSymbol::fromString($symbol);
        if ($dataSymbol == null)
        {
            $styleSymbol = StyleSymbol::fromString($symbol);
            if ($styleSymbol == null)
            {
                $colorSymbol = ColorSetter::fromString($symbol);
                if ($colorSymbol == null)
                {
                    $this->format->addString($symbol);
                }
                else
                {
                    $this->format->addColor($colorSymbol);
                }
            }
            else
            {
                $this->format->addStyle($styleSymbol);
            }
        }
        else
        {
            $this->format->addData($dataSymbol);
        }
    }

    /**
     * Gets format parsed from format string.
     * @return LogFormat Parsed format.
     */
    public function getFormat(): LogFormat
    {
        if ($this->format == null) 
        {
            $this->parse();
        }
        return $this->format;
    }
}

?>
