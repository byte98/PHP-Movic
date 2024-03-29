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

namespace PHPMovic;

use PHPMovic\Model\Configuration\Configuration;
use PHPMovic\Utils\Log\Logger;

/**
 * Class which represents whole application.
 */
class Application
{
    /**
     * Configuration of whole application.
     */
    private readonly Configuration $configuration;

    /**
     * Logger of whole application.
     */
    private static Logger $logger;

    /**
     * Creates new instance of application.
     * @param Configuration $configuration Configuration of application.
     */
    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
        Application::$logger = new Logger($configuration->getLogModel(), $configuration->getDateTimeFormat());
    }

    /**
     * Gets logger of application.
     * @return Logger Logger of application.
     */
    public static function logger(): Logger
    {
        return Application::$logger;
    }
}

?>

