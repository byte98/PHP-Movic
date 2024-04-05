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

use PHPMovic\Application;
use PHPMovic\Model\Configuration\CountersModel;
use PHPMovic\Utils\Event\EventHandler;
use PHPMovic\Utils\Event\EventInfo;
use PHPMovic\Utils\SymbolParser;

/**
 * Class which manages counters of application.
 */
class CountersManager implements EventHandler
{
    /**
     * Counters managed by this counter.
     */
    private array $counters;

    /**
     * Model of counters of application.
     */
    private readonly CountersModel $countersModel;

    /**
     * Creates new manager of counters.
     */
    public function __construct(CountersModel $countersModel)
    {
        $this->countersModel = $countersModel;
        $this->counters = array();
        $this->parseCounters();
    }

    /**
     * Parses counters already available in file.
     */
    private function parseCounters(): void
    {
        if (file_exists($this->countersModel->getFile()) == false)
        {
            $create = fopen($this->countersModel->getFile(), "w");
            fclose($create); 
        }
        $handle = fopen($this->countersModel->getFile(), "r");
        if ($handle)
        {
            while (($line = fgets($handle)) !== false)
            {
                $stream = new SymbolParser($line);
                if ($stream->hasNext())
                {
                    $name = $stream->next();
                    if ($stream->isSymbol())
                    {
                        if ($stream->hasNext())
                        {
                            $value = $stream->next();
                            if (is_numeric($value))
                            {
                                $realVal = floatval($value);
                                $counter = new Counter($name, $realVal);
                                $counter->registerHandler($this);
                                array_push($this->counters, $counter);
                            }
                        }
                    }
                }
            }
            fclose($handle);
        }
    }

    /**
     * Creates new counter or gets already existing one.
     * @param string $name Name of counter.
     * @return Counter New or existing counter.
     */
    public function create(string $name): Counter
    {
        $reti = null;
        foreach($this->counters as $counter)
        {
            if ($counter->getName() == $name)
            {
                $reti = $counter;
                break;
            }
        }
        if ($reti == null)
        {
            $reti = new Counter($name);
            $reti->registerHandler($this);
            array_push($this->counters, $reti);
        }
        return $reti;
    }

    /**
     * Resets all counters.
     */
    public function resetAll(): void
    {
        foreach($this->counters as $counter)
        {
            $counter->reset();
        }
    }

    /**
     * Deletes counter.
     * @param string $name Name of counter.
     */
    public function delete(string $name): void
    {
        foreach($this->counters as $counter)
        {
            if ($counter->getName() == $name)
            {
                unset($counter);
                $this->save();
                break;       
            }
        }
    }

    /**
     * Saves actual state of counters.
     */
    private function save(): void
    {
        $handle = fopen($this->countersModel->getFile(), "w");
        Application::logger()->debug("Saving counters to file '" . realpath($this->countersModel->getFile()) . "'");
        foreach($this->counters as $counter)
        {
            fwrite($handle, "%" . $counter->getName() . "%" . $counter->getValue() . PHP_EOL);
        }
        fclose($handle);
    }

    public function handle(EventInfo $info): void
    {
        if ($info->getName() == Counter::EventAny)
        {
            $this->save();
        }
        else if ($info->getName() == Counter::EventReset)
        {
            Application::logger()->debug("Counter '" . $info->getSender()->getName() . "' has been reseted");;
        }
        else if ($info->getName() == Counter::EventIncrement)
        {
            Application::logger()->debug("Counter '" . $info->getSender()->getName() . "' has been incremented (new value: " . $info->getSender()->getValue() . ")");
        }
        else if ($info->getName() == Counter::EventDecrement)
        {
            Application::logger()->debug("Counter '" . $info->getSender()->getName() . "' has been decremented (new value: " . $info->getSender()->getValue() . ")");
        }
    }
}

?>
