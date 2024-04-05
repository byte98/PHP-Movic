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

require_once($_SERVER["DOCUMENT_ROOT"] . "/CORE/BASELOADER.PHP");
use PHPMovic\Application;
use PHPMovic\BaseLoader;
use PHPMovic\Model\Configuration\Configuration;
use PHPMovic\Model\Configuration\ConfigurationLoader;

/**
 * Class which provides initial loading of application.
 */
class Bootloader
{
    /**
     * Path to file with actual configuration.
     */
    private readonly string $configFile;

    /**
     * Configuration loaded from provided file.
     */
    private Configuration $configuration;

    /**
     * Basic loader of classes.
     */
    private readonly BaseLoader $loader;

    /**
     * Application loaded by this loader.
     */
    private ?Application $application = null;

    /**
     * Creates new initial loader.
     */
    public function __construct(string $configFile)
    {
        $this->loader = new BaseLoader();
        $this->configFile = $configFile;
    }

    /**
     * Performs initial loading of application.
     * @return Application New instance of application.
     */
    public function load(): Application
    {
        $this->enableAutoLoad();
        $this->defineStdout();
        $this->loadCongfiugration();
        $this->setTimezone();
        $this->startSession();
        $this->application = new Application($this, $this->configuration);
        Application::logger()->debug("Bootloader finished");
        return $this->application;
    }

    /**
     * Performs loading of application.
     */
    private function loadCongfiugration()
    {
        $loader = new ConfigurationLoader($this->configFile);
        $this->configuration = $loader->getConfiguration();
    }

    /**
     * Enables automatic loading of class files.
     */
    private function enableAutoLoad(): void
    {
        spl_autoload_register($this->loader);
    }

    /**
     * Defines standard streams to be used.
     */
    private function defineStdout(): void
    {
        if(!defined('STDIN'))  define('STDIN',  fopen('php://stdin',  'rb'));
        if(!defined('STDOUT')) define('STDOUT', fopen('php://stdout', 'wb'));
        if(!defined('STDERR')) define('STDERR', fopen('php://stderr', 'wb'));
    }

    /**
     * Sets default time zone of application.
     */
    private function setTimezone(): void
    {
        date_default_timezone_set($this->configuration->getTimezone());
    }

    /**
     * Starts session of application.
     */
    private function startSession(): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE)
        {
            session_start();
        }
    }
    
    /**
     * Gets base loader of classes of application.
     * @return BaseLoader Base loader of classes of application.
     */
    public function getBaseLoader(): BaseLoader
    {
        return $this->loader;
    }
}

?>
