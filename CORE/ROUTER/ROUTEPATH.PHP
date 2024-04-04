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

namespace PHPMovic\Router;

use PHPMovic\Router\Placeholder;

/**
 * Class which represents single path of route.
 */
class RoutePath
{
    /**
     * String defining path.
     */
    private readonly string $pathString;

    /**
     * Parts of route path.
     */
    private array $parts;

    /**
     * Creates new path of route.
     * @param string $path String defining path.
     */
    public function __construct(string $path)
    {
        $this->pathString = $path;
        $this->parts = array();
        $this->parse();
    }

    /**
     * Parses string defining path.
     */
    private function parse(): void
    {
        $explode = explode("/", $this->pathString);
        foreach ($explode as $part)
        {
            $placeholder = Placeholder::fromString($part);
            if ($placeholder != null)
            {
                array_push($this->parts, $placeholder);
            }
            else
            {
                array_push($this->parts, $part);
            }
        }
    }

    /**
     * Gets length of path of route.
     * @return int Length of path of route.
     */
    public function getLength(): int
    {
        return strlen($this->pathString);
    }

    /**
     * Checks, whether given request matches route path.
     * @param string $request Request to check.
     * @return bool TRUE if request matches route path, FALSE otherwise.
     */
    public function matches(string $request): bool
    {
        $reti = true;
        $explode = explode("/", $request);
        if (count($this->parts) == count($explode))
        {
            for ($i = 0; $i < count($this->parts); $i++)
            {
                if ($this->parts[$i] instanceof Placeholder)
                {
                    if ($this->parts[$i]->matches($explode[$i]) == false)
                    {
                        $reti = false;
                        break;
                    }
                }
                else if ($this->parts[$i] != $explode[$i])
                {
                    $reti = false;
                    break;
                }
            }
        }
        return $reti;
    }

    /**
     * Gets data from request according to place holders in path.
     * @param string $request Request to get data from.
     * @return array Data from request.
     */
    public function getData(string $request): array
    {
        $reti = array();
        $explode = explode("/", $request);
        if (count($this->parts) == count($explode))
        {
            for ($i = 0; $i < count($this->parts); $i++)
            {
                if ($this->parts[$i] instanceof Placeholder)
                {
                    $val = $this->parts[$i]->getValue($explode[$i]);
                    if ($val !== null)
                    {
                        $reti[$this->parts[$i]->getName()] = $val;
                    }
                }
            }
        }
        return $reti;
    }

}

?>
