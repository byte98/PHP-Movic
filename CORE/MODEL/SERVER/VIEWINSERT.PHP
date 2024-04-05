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

namespace PHPMovic\Model\Server;

use PHPMovic\Model\Server\ViewData;
use PHPMovic\View\Printable;
use PHPMovic\View\View;
use PHPMovic\View\ViewManager;

/**
 * Class which represents insertion of view to response.
 */
class ViewInsert
{
    /**
     * View to insert.
     */
    private readonly View $view;

    /**
     * Data of view.
     */
    private readonly ViewData $data;

    /**
     * Creates new insertion of view to response.
     * @param View $view NView to insert.
     * @param ViewData $data Data of view.
     */
    public function __construct(View $view, ViewData $data)
    {
        $this->view = $view;
        $this->data = $data;
    }

    /**
     * Gets view to insert.
     * @return View View to insert.
     */
    public function getView(): View
    {
        return $this->view;
    }

    /**
     * Gets data of view.
     * @return ViewData Data of view.
     */
    public function getData(): ViewData
    {
        return $this->data;
    }

    /**
     * Inserts view.
     */
    public function insert(): void
    {
        $this->view->render(new Printable($this->data));
    }
}

?>
