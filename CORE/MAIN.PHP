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
 * Main class of whole application.
 */
class Main
{
    /**
     * Main function of whole application.
     * This function will be run at start of application.
     */
    public static function main(): void
    {
        // Define configuration file.
        $file = $_SERVER["DOCUMENT_ROOT"] . "/CONFIG.YAML";

        // Include bootloader.
        require_once($_SERVER['DOCUMENT_ROOT'] . "/CORE/BOOTLOADER.PHP");

        // Create bootloader.
        $bootloader = new \PHPMovic\Bootloader($file);

        // Initialize application.
        // (from this point, there is no need for including files directly,
        //  because bootloader enables files auto-loading)
        $application = $bootloader->load();

        // Create request.
        $request = new \PHPMovic\Model\Server\Request();

        // Handle request.
        $application->run($request);
    }
}

?>

