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

namespace PHPMovic\Utils;

use PHPMovic\Utils\Structs\SymbolStream;

class SymbolParser implements SymbolStream
{
    /**
     * Delimiter of symbols.
     */
    private const Delimiter = "%";

    /**
     * Data which will be parsed.
     */
    private readonly string $data;

    /**
     * Actual position of read data.
     */
    private int $cursor;

    /**
     * Flag, whether lastly read data is symbol.
     */
    private bool $symbol;

    /**
     * Creates new parser of string containing symbols.
     * @param string $data String which will be parsed.
     */
    public function __construct(string $data)
    {
        $this->data = $data;
        $this->symbol = false;
        $this->cursor = 0;
    }

    public function hasNext(): bool
    {
        return $this->cursor < strlen($this->data);
    }

    public function next(): mixed
    {
        $reti = "";
        $this->symbol = false;
        while ($this->hasNext())
        {
            $char = $this->data[$this->cursor];
            if ($char != SymbolParser::Delimiter)
            {
                $reti .= $char;
                $this->cursor++;
            }
            else
            {
                if ($this->symbol == true)
                {
                    $this->cursor++;
                    break;
                }
                else if ($this->symbol == false)
                {
                    if (strlen($reti) > 0)
                    {
                        break;
                    }
                    else
                    {
                        $this->symbol = true;
                        $this->cursor++;
                    }
                }
            }
            
        }
        if (strlen($reti) == 0 && $this->hasNext())
        {
            $reti = $this->next();
        }
        return $reti;
    }

    public function isSymbol(): bool
    {
        return $this->symbol;
    }
}

?>
