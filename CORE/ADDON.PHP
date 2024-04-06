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
use PHPMovic\Model\AddonInfo;

/**
 * Interface for all addons which could be added to platform.
 */
interface Addon
{
    /**
     * Gets information about addon.
     * @return AddonInfo Information about addon.
     */
    public function getInfo(): AddonInfo;

    /**
     * Initializes addon.
     * @param array $config Configuration of addon parsed from
     *                      its configuration file.
     * @return bool TRUE if initialization was successful,
     *              FALSE otherwise.
     */
    public function init(array $config): bool;

    /**
     * Stops addon. Addon may save all data in this step,
     * if it needs to do so.
     * @return bool TRUE if stop was successful, FALSE otherwise.
     */
    public function stop(): bool;

}

?>
