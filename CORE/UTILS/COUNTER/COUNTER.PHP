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

namespace PHPMovic\Utils\Counter;
use PHPMovic\Utils\Event\AbstractEventSource;

/**
 * Class which represents counter.
 */
class Counter extends AbstractEventSource
{
    /**
     * Identifier of any event of counter.
     */
    public const EventAny = "Counter::any.event";

    /**
     * Identifier of incrementation event.
     */
    public const EventIncrement = "Counter::increment.event";

    /**
     * Identifier of decrementation event.
     */
    public const EventDecrement = "Counter::decrement.event";

    /**
     * Identifier of reset event.
     */
    public const EventReset = "Counter::reset.event";

    /**
     * Actual value of counter.
     */
    private float $value;

    /**
     * Name of counter.
     */
    private string $name;

    /**
     * Creates new counter.
     * @param string $name Name of counter.
     * @param float $value Initial value of counter.
     */
    public function __construct(string $name, float $value = 0.0)
    {
        parent::__construct();
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * Gets actual value of counter.
     * @return float Actual value of counter.
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * Increments value of counter.
     */
    public function increment(): void
    {
        $this->value = $this->value + 1;
        $this->triggerEvent(Counter::EventIncrement);
        $this->triggerEvent(Counter::EventAny);
        if (PHP_FLOAT_MAX - rand(16, 128) < $this->value)
        {
            $this->reset();
        }
    }

    /**
     * Decrements value of counter.
     */
    public function decrement(): void
    {
        $this->value = $this->value - 1;
        $this->triggerEvent(Counter::EventDecrement);
        $this->triggerEvent(Counter::EventAny);
        if ($this->value < 0)
        {
            $this->reset();
        }
    }

    /**
     * Resets counter.
     */
    public function reset(): void
    {
        $this->value = 0.0;
        $this->triggerEvent(Counter::EventReset);
        $this->triggerEvent(Counter::EventAny);
    }

    /**
     * Gets name of counter.
     * @return string Name of counter.
     */
    public function getName(): string
    {
        return $this->name;
    }
}

?>
