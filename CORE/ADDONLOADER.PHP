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
use PHPMovic\Utils\DateUtils;
use PHPMovic\Utils\PathUtils;

/**
 * Class which performs loading of addons.
 */
class AddonLoader
{
    /**
     * Path to folder with addons.
     */
    private readonly string $path;

    /**
     * Array with all loaded addons.
     */
    private array $addons;

    /**
     * Buffer with names of loaded classes.
     */
    private array $classBuffer;

    /**
     * Array with successfully loaded classes of addons.
     */
    private array $loadedClasses;

    /**
     * Creates new loader of addons.
     * @param string $path Path to folder with addons.
     */
    public function __construct(string $path)
    {
        if (str_ends_with($path, DIRECTORY_SEPARATOR) == false)
        {
            $path .= DIRECTORY_SEPARATOR;
        }
        $this->path = $path;
        $this->addons = array();
        $this->classBuffer = array();
        $this->loadedClasses = array();
    }

    /**
     * Loads all available addons.
     */
    public function loadAll(): void
    {
        $this->loadedClasses = array();
        $path_to_folder = $this->path;
        $contents = scandir($path_to_folder);
        $child_folders = array_filter($contents, function($item) use ($path_to_folder) {
            return is_dir($path_to_folder . '/' . $item) && $item !== '.' && $item !== '..';
        });
        foreach($child_folders as $folder)
        {
            $folder = $this->path . $folder;  
            $folderClasses = array();
            Application::logger()->low("Looking into '" . $folder . "' for addon");
            $contents = scandir($folder);
            $php_files = array_filter($contents, function($item) use ($folder) {
                return is_file($folder . '/' . $item) &&
                    preg_match('/\.(php|phtml)$/i', $item);
            });
            foreach($php_files as $file)
            {
                $file = $folder . DIRECTORY_SEPARATOR . $file;
                Application::logger()->debug("Checking file '" . $file . "'");
                $classes = $this->findClassesImplementingInterface($file, Addon::class);
                if (count($classes) > 0)
                {
                    Application::logger()->debug("Addon found in '" . $file . "'");
                    foreach( $classes as $class )
                    {
                        array_push($folderClasses, $class);
                    }
                }
                else
                {
                    Application::logger()->debug("No addon found in '" . $file . "'");
                }
            }
            if (count($folderClasses) > 1)
            {
                Application::logger()->error("Addon loading from '" . $folder . "' failed: multiple addons found!");
            }
            else if (count($folderClasses) < 1)
            {
                Application::logger()->warning("Addon loading from '" . $folder . "' failed: no addons found!");
            }
            else
            {
                $className = $folderClasses[0];
                $this->loadClass($className);    
            }
        }
    }

    /**
     * Loads class which represents addon.
     * @param string $className Name of class.
     */
    private function loadClass(string $className): void
    {
        $addon = new $className();
        array_push($this->addons, $addon);
        $info = $addon->getInfo();
        if ($info == null)
        {
            Application::logger()->warning("Cannot get information about '" . $className . "'!");
        }
        else
        {
            $start = DateUtils::now();
            Application::logger()->base("Loading addon '" . $info->getName() . "' (version " . $info->getVersion() . ")");
            $config = $addon->getInfo()->getConfigFile();
            $configFile = $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . "CONFIGURATION" . DIRECTORY_SEPARATOR . $config;
            if (str_ends_with(strtoupper($configFile), ".YAML") == false && str_ends_with(strtoupper($configFile), ".YML") == false)
            {
                $check = array();
                array_push($check, $configFile . ".yml");
                array_push($check, $configFile . ".YML");
                array_push($check, $configFile . ".yaml");
                array_push($check, $configFile . ".YAML");
                $configFile = $check[count($check) - 1];
                foreach($check as $file)
                {
                    if (file_exists($file))
                    {
                        Application::logger()->debug("Looking for file '" . $file . "': found");
                        $configFile = $file;
                        break;
                    }
                    else
                    {
                        Application::logger()->debug("Looking for file '" . $file . "': not found");
                    }
                }
            }
            $config = array();
            if (file_exists($configFile))
            {
                Application::logger()->low("Loading configuration file '" . $configFile . "'");
                $config = \yaml_parse_file($configFile);
                if ($config == null)
                {
                    $config = array();
                }
            }
            else
            {
                Application::logger()->warning("Cannot load configuration of addon '" . $info->getName() . "': file '" . $configFile . "' does not exist!");
            }
            $res = $addon->init($config);
            if ($res == false)
            {
                Application::logger()->error("Loading of addon '" . $info->getName() . "' failed!");
            }
            else
            {
                array_push($this->loadedClasses, $className);
                Application::logger()->success("Addon '" . $info->getName() . "' has been loaded (in " . DateUtils::elapsed($start, DateUtils::now()) . ")");
            }
        }
    }

    /**
     * Checks, whether given class implements interface.
     * @param string $className Name of class.
     * @param string $interfaceName Name of interface.
     * @return bool TRUE if class implements given interface,
     *             FALSE otherwise.
     */
    private function classImplementsInterface(string $className, string $interfaceName): bool
    {
        $reflectionClass = new \ReflectionClass($className);
        return $reflectionClass->implementsInterface($interfaceName);
    }

    
    /**
     * Gets classes from given file, which implements given interface.
     * @param string $filePath Path to file.
     * @param string $interfaceName Name of interface.
     * @return array Array of classes implementing given interface.
     */
    private function findClassesImplementingInterface(string $filePath, string $interfaceName): array
    {
        $classes = [];
        
        // Include the PHP file
        include_once $filePath;

        // Get all declared classes in the included file
        $declaredClasses = get_declared_classes();

        // Check each declared class if it implements the interface
        foreach ($declaredClasses as $className) {
            if ($this->classImplementsInterface($className, $interfaceName) && in_array($className, $this->classBuffer) == false)
            {
                array_push($classes, $className);
                array_push($this->classBuffer, $className);
            }
        }

        return $classes;
    }

    /**
     * Stops all loaded addons.
     */
    public function stopAll(): void
    {
        foreach($this->addons as $addon)
        {
            $name = $addon->getInfo()->getName();
            Application::logger()->base("Stopping addon '" . $name . "'");
            $res = $addon->stop();
            if ($res == true)
            {
                Application::logger()->success("Addon '" . $name . "' has been stopped");
            }
            else
            {
                Application::logger()->error("Addon '" . $name . "' cannot be stopped!");
            }
            
        }
    }

    /**
     * Checks, whether addon is loaded.
     * @param string $addonClass Name of addon class.
     * @return bool TRUE if addon is loaded,
     *             FALSE otherwise.
     */
    public function isAddonLoadded(string $addonClass): bool
    {
        return in_array($addonClass, $this->loadedClasses);
    }
}

?>
