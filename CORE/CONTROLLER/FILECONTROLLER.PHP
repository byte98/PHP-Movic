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

namespace PHPMovic\Controller;

use PHPMovic\Controller\ControllerAdapter;
use PHPMovic\Model\Server\HttpStatus;
use PHPMovic\Model\Server\Request;
use PHPMovic\Model\Server\Response;
use PHPMovic\Utils\PathUtils;
use PHPMovic\View\FileView;

/**
 * Creates new controller which handles request for files.
 */
class FileController extends ControllerAdapter
{

    /**
     * Path to file.
     */
    private readonly string $path;

    /**
     * Name of file in response.
     */
    private readonly string $responseName;

    /**
     * View which renders file.
     */
    private readonly FileView $view;

    /**
     * Creates new controller which handles request for files.
     * @param string $path Path to file.
     * @param string $responseName Name of file in response.
     */
    public function __construct(string $path, string $responseName)
    {
        $this->path = PathUtils::toAbsolute($path);
        $this->view = new FileView($this->path);
        $this->responseName = $responseName;
    }

    public function get(Request $request): Response
    {
        $reti = $request->createResponse();
        if (file_exists($this->path))
        {
            $reti->addView($this->view);
            $reti->setMIME(MimeType::fromPath($path));
            $reti->setHeader("Content-Length", filesize($this->path));
            $reti->setHeader("Content-Disposition", "attachment; filename=" . $this->responseName);
            $reti->setheader("Pragma", " public");
            $reti->clean();
        }
        else
        {
            $reti->setResponseCode(HttpStatus::NotFound);
        }
        return $reti;
    }
}

?>
