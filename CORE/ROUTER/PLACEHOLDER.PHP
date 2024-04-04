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

use PHPMovic\Router\PlaceholderType;
use PHPMovic\Utils\StringUtils;

/**
 * Class which represents place holder in route paths.
 */
class Placeholder
{
    /**
     * Data type of place holder.
     */
    private readonly PlaceholderType $type;

    /**
     * Name of place holder.
     */
    private string $name;

    /**
     * Creates new place holder.
     * @param PlaceholderType $type Data type of place holder.
     * @param string $name Name of place holder.
     */
    private function __construct(PlaceholderType $type, string $name)
    {
        $this->type = $type;
        $this->name = $name;
    }

    /**
     * Creates new place holder from its string representation.
     * @param string $str String representation of place holder.
     * @return ?Placeholder Place holder parsed from its string representation,
     *                      or NULL if string representation is invalid.
     */
    public static function fromString(string $str): ?Placeholder
    {
        $reti = null;
        $parts = explode("::", $str);
        if (count($parts) == 2)
        {
            $name = $parts[0];
            $type = PlaceholderType::fromString($parts[1]);    
            if ($type != null)
            {
                $reti = new Placeholder($type, $name);
            }
        }
        return $reti;
    }

    /**
     * Checks, whether place holder value from given part of path matches
     * defined data type.
     * @return bool TRUE if value matches, FALSE otherwise.
     */
    public function matches(string $part): bool
    {
        $reti = false;
        if ($this->type == PlaceholderType::Bool)
        {
            $check = strtoupper(StringUtils::trim($part));
            if ($check == "TRUE" || $check == "FALSE")
            {
                $reti = true;
            }
        }
        else if ($this->type == PlaceholderType::Integer)
        {
            $check = StringUtils::trim($part);
            if (is_numeric($check))
            {
                $reti = filter_var($check, FILTER_VALIDATE_INT);
            }
        }
        else if ($this->type == PlaceholderType::Number)
        {
            $check = StringUtils::trim($part);
            $reti = is_numeric($check);
        }
        else if ($this->type == PlaceholderType::Text)
        {
            $reti = true;
        }
        return $reti;
    }

    /**
     * Gets value of part of request path according to the place holder.
     * @return bool | int | float | string | null Value of part of request path,
     *                                          or NULL if value is does not
     *                                          match defined data type.
     */
    public function getValue(string $request): bool | int | float | string | null
    {
        $reti = null;
        if ($this->type == PlaceholderType::Bool)
        {
            $check = strtoupper(StringUtils::trim($request));
            if ($check == "TRUE")
            {
                $reti = true;
            }
            else if ($check == "FALSE")
            {
                $reti = false;
            }
        }
        else if ($this->type == PlaceholderType::Integer)
        {
            $check = StringUtils::trim($request);
            $intval = intval($check);
            if ($intval !== false)
            {
                $reti = $intval;
            }
        }
        else if ($this->type == PlaceholderType::Number)
        {
            $check = StringUtils::trim($request);
            $floatval = floatval($check);
            if ($floatval !== false)
            {
                $reti = $floatval;
            }
        }
        else if ($this->type == PlaceholderType::Text)
        {
            $reti = $request;
        }
        return $reti;
    }

    /**
     * Gets name of place holder.
     * @return string Name of place holder.
     */
    public function getName(): string
    {
        return $this->name;
    }
}

?>
