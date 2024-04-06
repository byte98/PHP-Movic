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

/**
 * Class representing placeholder in query.
 */
class QueryPlaceholder
{
    /**
     * Name of placeholder.
     */
    private readonly string $name;

    /**
     * Value of placeholder.
     */
    private string $value;

    /**
     * Create new placeholder used in queries.
     * @param string $name Name of placeholder.
     * @param string $value Value of placeholder.
     */
    public function __construct(string $name, string $value = "")
    {
        if (strlen($value) == 0)
        {
            $value = $name;
        }
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * Gets name of placeholder.
     * @return string Name of placeholder.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Gets value of placeholder.
     * @return string Value of placeholder.
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * Sets value of placeholder.
     * @param string $value New value of placeholder.
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }
}

?>
