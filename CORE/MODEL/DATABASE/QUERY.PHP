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

namespace PHPMovic\Model\Database;
use PHPMovic\Application;
use PHPMovic\Utils\SymbolParser;
use PHPMovic\Model\Database\QueryPlaceholder;

/**
 * Class which represents query to the database.
 */
class Query
{
    /**
     * Raw string containing query.
     */
    private readonly string $queryString;

    /**
     * Parts of query.
     */
    private array $parts;

    /**
     * Creates new query.
     * @param string $queryString Raw string containing query.
     */
    public function __construct(string $queryString)
    {
        $this->queryString = $queryString;
        $this->parts = array();
        $this->parse();
    }

    /**
     * Parses string defining query.
     */
    private function parse()
    {
        $this->parts = array();
        $stream = new SymbolParser($this->queryString);
        while ($stream->hasNext())
        {
            $next = $stream->next();
            if ($stream->isSymbol())
            {
                array_push($this->parts, new QueryPlaceholder($next));
            }
            else
            {
                array_push($this->parts, $next);
            }
        }
    }

    /**
     * Sets value of placeholder in query.
     * @param string $name Name of placeholder.
     * @param string $value Value of placeholder.
     */
    public function setValue(string $name, string $value)
    {
        foreach($this->parts as $part)
        {
            if ($part instanceof QueryPlaceholder)
            {
                if ($name == $part->getName())
                {
                    $part->setValue($value);
                }
            }
        }
    }

    /**
     * Builds query.
     * @return string Built query ready to be used in database.
     */
    public function build(): string
    {
        $reti = "";
        foreach($this->parts as $part)
        {
            if ($part instanceof QueryPlaceholder)
            {
                $reti .= Application::db()->sanitizeValue($part->getValue());
            }
            else
            {
                $reti .= strval($part);
            }
        }
        return $reti;
    }
}

?>
