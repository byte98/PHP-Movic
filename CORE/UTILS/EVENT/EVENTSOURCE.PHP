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

namespace PHPMovic\Utils\Event;

use PHPMovic\Utils\Event\EventHandler;

/**
 * Interface abstracting all sources of various events.
 */
interface EventSource
{
    /**
     * Registers an event handler.
     * @param EventHandler $handler Handler to be registered.
     */
    public function registerHandler(EventHandler $handler): void;

    /**
     * Unregisters an event handler.
     * @param EventHandler $handler Handler to be unregistered.
     */
    public function unregisterHandler(EventHandler $handler): void;
}

?>
