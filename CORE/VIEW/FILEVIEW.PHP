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

use PHPMovic\Application;
use PHPMovic\Utils\PathUtils;
use PHPMovic\View\View;
use PHPMovic\View\Printable;

/**
 * Class which represents view which just prints content of file.
 */
class FileView implements View
{
    /**
     * File which content will be printed.
     */
    private readonly string $file;

    /**
     * Creates new view which just prints content of file.
     * @param string $file File which content will be printed.
     */
    public function __construct(string $file)
    {
        $this->file = PathUtils::toAbsolute($file);
    }

    public function render(Printable $data)
    {
        Application::logger()->debug("File view: printing content of file '" . $this->file . "'");
        if (file_exists($this->file))
        {
            readfile($this->file);
        }
        else
        {
            Application::logger()->warning("File view: cannot print content of file '" . $this->file . "': file not found!");
        }
    }
}

?>
