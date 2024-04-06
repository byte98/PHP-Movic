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
use PHPMovic\View\View;

/**
 * Class which represents simple view which just inserts template 
 * of view and sets data.
 */
class SimpleView implements View
{
    /**
     * Path to file with template.
     */
    private readonly string $template;

    /**
     * Root namespace for all users views.
     */
    private static string $root = "";

    /**
     * Sets root namespace for all users views.
     * @param string $root Root namespace for all users views.
     */
    public static function setRoot(string $root): void
    {
        SimpleView::$root = $root;
    }

    /**
     * Creates new simple view.
     * @param string $template Path to file with template.
     * @param array $data Data of view.
     */
    public function __construct(string $template)
    {
        $this->template = $template;
    }

    public function render(Printable $data): void
    {
        $GLOBALS["_VIEW"] = $data;
        Application::loadSource(SimpleView::$root . "\\" . "VIEW" . "\\" . $this->template);
    }
}

?>
