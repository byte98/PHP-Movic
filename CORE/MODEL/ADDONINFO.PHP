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

namespace PHPMovic\Model;

use PHPMovic\Model\LicenseInfo;
/**
 * Class which holds information about addon.
 */
class AddonInfo
{
    /**
     * Name of addon.
     */
    private readonly string $name;

    /**
     * Description of addon.
     */
    private readonly string $description;

    /**
     * URL of homepage of addon.
     */
    private readonly string $url;

    /**
     * Author of addon.
     */
    public readonly string $author;

    /**
     * Version of addon.
     */
    private readonly string $version;

    /**
     * Name of file with configuration.
     */
    private readonly string $configFile;

    /**
     * License of addon.
     */
    private readonly LicenseInfo $license;

    /**
     * Creates new information about addon.
     * @param string $name Name of addon.
     * @param string $description Description of addon.
     * @param string $url URL of homepage of addon.
     * @param string $version Version of addon.
     * @param string $configFile Name of file with configuration.
     * @param LicenseInfo $license License of addon.
     * @param string $author Author of addon.
     */
    public function __construct(
        string $name,
        string $description,
        string $url,
        string $version,
        string $configFile,
        LicenseInfo $license,
        string $author)
    {
        $this->name = $name;
        $this->description = $description;
        $this->url = $url;
        $this->version = $version;
        $this->configFile = $configFile;
        $this->license = $license;
        $this->author = $author;
    }


    /**
     * Get name of addon.
     * @return string String representing name of addon.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get description of addon.
     * @return string String representing description of addon.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Get URL of homepage of addon.
     * @return string String representing URL of homepage of addon.
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * Get version of addon.
     * @return string String representing version of addon.
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * Get name of file with configuration.
     * @return string String representing name of file with configuration.
     */
    public function getConfigFile(): string
    {
        return $this->configFile;
    }

    /**
     * Get license of addon.
     * @return LicenseInfo Information abouit license of addon.
     */
    public function getLicense(): LicenseInfo
    {
        return $this->license;
    }

    /**
     * Get author of addon.
     * @return string String representing author of addon.
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

}

?>
