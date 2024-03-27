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


use PHPMovic\Application;
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
     * Creates new initial loader.
     */
    public function __construct(string $configFile)
    {
        $this->configFile = $configFile;
    }

    /**
     * Performs initial loading of application.
     * @return Application New instance of application.
     */
    public function load(): Application
    {
        $this->enableAutoLoad();
        $this->loadCongfiugration();
        return new Application($this->configuration);
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
        spl_autoload_register(function($className)
        {
            $path = Bootloader::determineClassPath($className);
            if (file_exists($path))
            {
                require_once($path);
            }
        });
    }

    /**
     * Determines path to file with definition of class from
     * its name.
     * @param string $className Fully qualified name of class.
     * @return string Path to file with definition of class.
     */
    private static function determineClassPath(string $className): string{
        $reti = "";
        $classPath = str_replace('\\', DIRECTORY_SEPARATOR, str_replace("PHPMovic\\", "", $className));
        $rootPath = $_SERVER["DOCUMENT_ROOT"];
        $reti = $rootPath . DIRECTORY_SEPARATOR . strtoupper($classPath) . ".PHP";
        $reti = str_replace("PHP-Movic/", "PHP-Movic/CORE/", $reti);
        return $reti;
    }
}

?>
