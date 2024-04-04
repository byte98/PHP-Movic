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

/**
 * Class which provides basic functionality to load classes.
 */
class BaseLoader
{
    /**
     * Determines path to file containing required class.
     * @param string $className Fully qualified name of class.
     * @return string Path to file with definition of class.
     */
    private function determineClassPath(string $className): string
    {
        $reti = "";
        $classPath = str_replace('\\', DIRECTORY_SEPARATOR, str_replace("PHPMovic\\", "", $className));
        $rootPath = $_SERVER["DOCUMENT_ROOT"];
        $reti = $rootPath . DIRECTORY_SEPARATOR . strtoupper($classPath) . ".PHP";
        $reti = str_replace("PHP-Movic/", "PHP-Movic/CORE/", $reti);
        return $reti;
    }

    /**
     * Loads class with given name.
     * @param string $className Fully qualified name of class.
     */
    public function load(string $className): void
    {
        $classPath = $this->determineClassPath($className);
        if (file_exists($classPath))
        {
            require_once $classPath;
        }
    }

    /**
     * Loads class with given name.
     * @param string $className Fully qualified name of class.
     */
    public function __invoke(string $className): void
    {
        $this->load($className);
    }
}

?>
