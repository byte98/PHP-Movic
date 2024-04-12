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
use PHPMovic\Model\Configuration\SourcesModel;

/**
 * Class with ability to load source files.
 */
class SourceLoader
{
    /**
     * Cache of loaded sources.
     */
    private array $cache;

    /**
     * Model of all sources of application.
     */
    private readonly SourcesModel $sourcesModel;

    /**
     * Flag, whether source loader should produce logs.
     */
    private readonly bool $log;

    /**
     * Creates new loader of source files.
     * @param SourcesModel $sourcesModel Model of all sources of application.
     * @param bool $log Flag, whether source loader should produce logs.
     */
    public function __construct(SourcesModel $sourcesModel, bool $log)
    {
        $this->cache = array();
        $this->sourcesModel = $sourcesModel;
        $this->log = $log;
    }

    /**
     * Includes file with requested source.
     * @param string $className Fully qualified name of class.
     */
    public function includeSource(string $className): void
    {
        $path = $this->getSourcePath($className);
        if ($this->loggerAvailable() && $this->log == true)
        {
            Application::logger()->debug("Loading class '" . $className . "' from '" . $path . "'");
        }
        if (file_exists($path))
        {
            require($path);
            if ($this->loggerAvailable() && $this->log == true)
            {
                Application::logger()->debug("Class '" . $className . "' (path: '" . $path . "') loaded");
            }
        }
        else
        {
            Application::logger()->warning("Cannot load class '" . $className . "' (path: '" . $path . "'): file not found!");
        }
    }

    /**
     * Checks, whether logger is available.
     * @return bool TRUE if logger is available, FALSE otherwise.
     */
    private function loggerAvailable(): bool
    {
        return (
            class_exists(\PHPMovic\Application::class) == true &&
            class_exists(\PHPMovic\Utils\Log\Logger::class) == true &&
            class_exists(\PHPMovic\Utils\Log\Log::class) == true &&
            class_exists(\PHPMovic\Utils\Log\LogLevel::class) == true
        );
    }

    /**
     * Gets path to file with required source.
     * @param string $className Fully qualified name of class.
     * @return string Path to file with required source.
     */
    private function getSourcePath(string $className): string
    {
        $reti = "";
        if (array_key_exists($className, $this->cache) == false)
        {
            $reti = $this->determineSourcePath($className);
            $this->cache[$className] = $reti;
        }
        else
        {
            $reti = $this->cache[$className];
        }
        return $reti;
    }

    /**
     * Determines path to file with required source.
     * @param string $className Fully qualified name of class.
     * @return string Path to file with required source.
     */
    private function determineSourcePath(string $className): string
    {
        //Application::logger()->low("Looking for class '" . $className . "'...");
        $prefix = $_SERVER["DOCUMENT_ROOT"];
        $prefix .= DIRECTORY_SEPARATOR;
        $filePart = "";
        $nameParts = explode("\\", $className);
        if ($this->sourcesModel->isCoreNamespace($className))
        {   // Class is part of PHP-Movic core namespace.
            $prefix .= "CORE";
            $filePart = substr($className, strlen($nameParts[0]));
        }
        else if ($this->sourcesModel->isUserNamespace($className)) 
        {   // Class is part of user namespace.
            $prefix .= "CONTENT";
            $filePart = substr($className, strlen($nameParts[0]));
        }
        else
        {   
            // It could be a driver
            $prefix .= "DRIVERS";
            $filePart = $className;
            if (str_starts_with($filePart, "\\") == false)
            {
                $filePart = "\\" . $filePart;
            }
            $reti = $this->getFilePath($prefix, $filePart);
            if (file_exists($reti) == false)
            {
                // Class is part of addon.
                $prefix = $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . "ADDONS" . DIRECTORY_SEPARATOR;
                $prefixes = array();
                $filePart = $className;
                array_push($prefixes, $prefix . $nameParts[0]);
                array_push($prefixes, $prefix . strtolower($nameParts[0]));
                array_push($prefixes, $prefix . strtoupper($nameParts[0]));
                foreach($prefixes as $p)
                {
                    $reti = $this->getFilePath($p, $filePart);
                    if (file_exists($reti))
                    {
                        break;
                    }
                }
            }
        }
        $reti = $this->getFilePath($prefix, $filePart);
        return $reti;
    }

    /**
     * Gets path to file.
     * @param string $parentDirectory Path to parent directory.
     * @param string $fileName Name of file.
     * @return string Path to file.
     */
    private function getFilePath(string $parentDirectory, string $fileName): string
    {
        $check = array();
        $parts = explode("\\", $fileName);
        $p1 = $parentDirectory;
        $p2 = $parentDirectory;
        $p3 = $parentDirectory;
        for ($i = 0; $i < count($parts); $i++)
        {
            $p1 .= $parts[$i];
            $p2 .= strtolower($parts[$i]);
            $p3 .= strtoupper($parts[$i]);
            if ($i < count($parts) - 1)
            {
                $p1 .= DIRECTORY_SEPARATOR;
                $p2 .= DIRECTORY_SEPARATOR;
                $p3 .= DIRECTORY_SEPARATOR;
            }
        }
        if (str_ends_with($fileName, ".php") == false && str_ends_with($fileName, ".PHP") == false && str_ends_with($fileName, ".phtml") == false && str_ends_with($fileName, ".PHTML") == false)
        {
            $p1a = $p1 . ".phtml";
            $p1b = $p1 . ".PHTML";
            $p1c = $p1 . ".php";
            $p1d = $p1 . ".PHP";
            $p2a = $p2 . ".phtml";
            $p2b = $p2 . ".PHTML";
            $p2c = $p2 . ".php";
            $p2d = $p2 . ".PHP";
            $p3a = $p3 . ".phtml";
            $p3b = $p3 . ".PHTML";
            $p3c = $p3 . ".php";
            $p3d = $p3 . ".PHP";
            array_push($check, $p1a, $p1b, $p1c, $p1d, $p2a, $p2b, $p2c, $p2d, $p3a, $p3b, $p3c, $p3d);
        }
        else
        {
            array_push($check, $p1, $p2, $p3);
        }
        return $this->getExistingOrLast($check);
    }

    /**
     * Gets path to existing or last file path.
     * @param array $paths Paths to files which will be checked.
     * @return string Path to existing or last file path.
     */
    private function getExistingOrLast(array $paths): string
    {
        $reti = $paths[count($paths) - 1];
        foreach ($paths as $path)
        {
            if (file_exists($path))
            {
                $reti = $path;
            }
        }
        return $reti;
    }

    /**
     * Invokes class loader.
     * @param string $className Fully qualified name of class.
     */
    public function __invoke(string $className): void
    {
        $this->includeSource($className);
    }

}

?>
