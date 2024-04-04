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
use PHPMovic\Utils\Event\EventInfo;

/**
 * Class which abstracts common properties of event source.
 */
abstract class AbstractEventSource implements EventSource
{
    /**
     * Array of handlers of event.
     */
    private array $handlers;

    /**
     * Creates new source of event.
     */
    public function __construct()
    {
        $this->handlers = array();
    }

    public function registerHandler(EventHandler $handler): void
    {
        array_push($this->handlers, $handler);
    }

    public function unregisterHandler(EventHandler $handler): void
    {
        if (in_array($handler, $this->handlers))
        {
            $key = array_search($handler, $this->handlers);
            unset($this->handlers[$key]);
        }   
    }

    /**
     * Triggers event.
     * @param string $name Name of event.
     * @param mixed $data Data of event.
     */
    protected function triggerEvent(string $name, mixed $data = null): void
    {
        foreach ($this->handlers as $handler)
        {
            $handler->handle(new EventInfo($name, $this, $data));
        }
    }
}

?>
