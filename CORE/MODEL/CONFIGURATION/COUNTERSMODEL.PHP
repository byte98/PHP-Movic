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

namespace PHPMovic\Model\Configuration;

use PHPMovic\Utils\PathUtils;

/**
 * Model of counters of application.
 */
class CountersModel
{
    /**
     * Path to file with counters.
     */
    private readonly string $file;

    /**
     * Creates new model of counters.
     * @param string $file Path to file with counters.
     */
    public function __construct(string $file)
    {
        $this->file = PathUtils::toAbsolute($file);
    }

    /**
     * Gets path to file with counters.
     * @return string Path to file with counters.
     */
    public function getFile(): string
    {
        return $this->file;
    }
}

?>
