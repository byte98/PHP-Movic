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

/**
 * Class which holds information about event.
 */
class EventInfo
{
    /**
     * Name of event.
     */
    private readonly string $name;

    /**
     * Sender of event.
     */
    private readonly object $sender;

    /**
     * Data connected with event.
     */
    private readonly mixed $data;

    /**
     * Creates new information about event.
     * @param string $name Name of event.
     * @param object $sender Sender of event.
     * @param mixed $data Data connected with event.
     */
    public function __construct(string $name, object $sender, mixed $data = null)
    {
        $this->name = $name;
        $this->sender = $sender;
        $this->data = $data;
    }

    /**
     * Gets name of event.
     * @return string Name of event.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Gets sender of event.
     * @return object Sender of event.
     */
    public function getSender(): object
    {
        return $this->sender;
    }

    /**
     * Gets data connected with event.
     * @return mixed Data connected with event.
     */
    public function getData(): mixed
    {
        return $this->data;
    }
}

?>
