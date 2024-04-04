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

namespace PHPMovic\View;

use PHPMovic\Model\Server\ViewData;

/**
 * Class which wraps data to be printable.
 */
class Printable
{
    /**
     * Data which will be wrapped to be printable.
     */
    private readonly ViewData $data;

    /**
     * Creates new wrapper of data.
     * @param ViewData $data Data to wrap.
     */
    public function __construct(ViewData $data)
    {
        $this->data = $data;
    }

    /**
     * Prints data.
     * @param string $key Identifier of data.
     * @return bool TRUE if data can be printed,
     *              FALSE otherwise.
     */
    public function __invoke(string $key): bool
    {
        $reti = $this->data->exists($key);
        if ($reti == true)
        {
            $this->data->print($key);
        }
        return $reti;
    }
}

?>
