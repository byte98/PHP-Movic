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

namespace PHPMovic\Model\Configuration;

use PHPMovic\Utils\StringUtils;

/**
 * Class whihc holds information about sources of code.
 */
class SourcesModel
{
    /**
     * Namespace of core sources.
     */
    private readonly string $coreNS;

    /**
     * Namespace of user content sources.
     */
    private readonly string $contentNS;

    /**
     * Creates new model of sources.
     * @param string $coreNS Namespace of core sources.
     * @param string $contentNS Namespace of user content sources.
     */
    public function __construct(string $coreNS, string $contentNS)
    {
        $this->coreNS = $coreNS;
        $this->contentNS = $contentNS;
    }

    /**
     * Checks, whether given class is in given namespace.
     * @param string $className Fully qualified name of class.
     * @param string $namespace Namespace to check.
     * @return bool TRUE if class is in given namespace,
     *              FALSE otherwise.
     */
    private function isInNamespace(string $className, string $namespace): bool
    {
        $reti = false;
        if (str_ends_with($namespace, "\\") == false)
        {
            $namespace .= "\\";
        }
        $str1 = strtoupper(StringUtils::trim($className));
        $str2 = strtoupper(StringUtils::trim($namespace));
        if (substr($str1, 0, strlen($str2)) == $str2)
        {
            $reti = true;
        }
        return $reti;
    }

    /**
     * Checks, whether given class name belongs to core namespace.
     * @param string $className Fully qualified name of class.
     * @return bool TRUE if class belongs to core namespace,
     *              FALSE otherwise.
     */
    public function isCoreNamespace(string $className): bool
    {
        return $this->isInNamespace($className, $this->coreNS);
    }

    /**
     * Checks, whether given class name belongs to user content namespace.
     * @param string $className Fully qualified name of class.
     * @return bool TRUE if class belongs to user content namespace,
     *              FALSE otherwise.
     */
    public function isUserNamespace(string $className): bool
    {
        return $this->isInNamespace($className, $this->contentNS);
    }

    /**
     * Gets name space of users content classes.
     * @return string Name space of users content classes.
     */
    public function getUserNamespace(): string{
        return $this->contentNS;
    }
}

?>
