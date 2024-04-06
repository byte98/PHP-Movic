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

/**
 * Class holding informatin about license.
 */
class LicenseInfo
{
    /**
     * Name of license.
     */
    private readonly string $name;

    /**
     * URL to the text of the license.
     */
    private readonly string $url;

    /**
     * Creates new information about license.
     * @param string $name Name of license.
     * @param string $url URL to the text of the license.
     */
    public function __construct(string $name, string $url)
    {
        $this->name = $name;
        $this->url = $url;
    }

    /**
     * Gets name of license.
     * @return string Name of license.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Gets URL to the text of the license.
     * @return string URL to the text of the license.
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * Create a new LicenseInfo object for Creative Commons CC0 1.0.
     * @return LicenseInfo Information about license.
     */
    public static function CC0_1_0(): LicenseInfo
    {
        return new LicenseInfo("Creative Commons CC0 1.0", "https://creativecommons.org/publicdomain/zero/1.0/");
    }

    /**
     * Create a new LicenseInfo object for Creative Commons CC BY 1.0.
     * @return LicenseInfo Information about license.
     */
    public static function CC_BY_1_0(): LicenseInfo
    {
        return new LicenseInfo("Creative Commons CC BY 1.0", "https://creativecommons.org/licenses/by/1.0/");
    }

    /**
     * Create a new LicenseInfo object for Creative Commons CC BY-SA 1.0.
     * @return LicenseInfo Information about license.
     */
    public static function CC_BY_SA_1_0(): LicenseInfo
    {
        return new LicenseInfo("Creative Commons CC BY-SA 1.0", "https://creativecommons.org/licenses/by-sa/1.0/");
    }

    /**
     * Create a new LicenseInfo object for Creative Commons CC BY-ND 1.0.
     * @return LicenseInfo Information about license.
     */
    public static function CC_BY_ND_1_0(): LicenseInfo
    {
        return new LicenseInfo("Creative Commons CC BY-ND 1.0", "https://creativecommons.org/licenses/by-nd/1.0/");
    }

    /**
     * Create a new LicenseInfo object for Creative Commons CC BY-NC 1.0.
     * @return LicenseInfo Information about license.
     */
    public static function CC_BY_NC_1_0(): LicenseInfo
    {
        return new LicenseInfo("Creative Commons CC BY-NC 1.0", "https://creativecommons.org/licenses/by-nc/1.0/");
    }

    /**
     * Create a new LicenseInfo object for Creative Commons CC BY-NC-SA 1.0.
     * @return LicenseInfo Information about license.
     */
    public static function CC_BY_NC_SA_1_0(): LicenseInfo
    {
        return new LicenseInfo("Creative Commons CC BY-NC-SA 1.0", "https://creativecommons.org/licenses/by-nc-sa/1.0/");
    }

    /**
     * Create a new LicenseInfo object for Creative Commons CC BY 2.0.
     * @return LicenseInfo Information about license.
     */
    public static function CC_BY_2_0(): LicenseInfo
    {
        return new LicenseInfo("Creative Commons CC BY 2.0", "https://creativecommons.org/licenses/by/2.0/");
    }

    /**
     * Create a new LicenseInfo object for Creative Commons CC BY-SA 2.0.
     * @return LicenseInfo Information about license.
     */
    public static function CC_BY_SA_2_0(): LicenseInfo
    {
        return new LicenseInfo("Creative Commons CC BY-SA 2.0", "https://creativecommons.org/licenses/by-sa/2.0/");
    }

    /**
     * Create a new LicenseInfo object for Creative Commons CC BY-ND 2.0.
     * @return LicenseInfo Information about license.
     */
    public static function CC_BY_ND_2_0(): LicenseInfo
    {
        return new LicenseInfo("Creative Commons CC BY-ND 2.0", "https://creativecommons.org/licenses/by-nd/2.0/");
    }

    /**
     * Create a new LicenseInfo object for Creative Commons CC BY-NC 2.0.
     * @return LicenseInfo Information about license.
     */
    public static function CC_BY_NC_2_0(): LicenseInfo
    {
        return new LicenseInfo("Creative Commons CC BY-NC 2.0", "https://creativecommons.org/licenses/by-nc/2.0/");
    }

    /**
     * Create a new LicenseInfo object for Creative Commons CC BY-NC-SA 2.0.
     * @return LicenseInfo Information about license.
     */
    public static function CC_BY_NC_SA_2_0(): LicenseInfo
    {
        return new LicenseInfo("Creative Commons CC BY-NC-SA 2.0", "https://creativecommons.org/licenses/by-nc-sa/2.0/");
    }

    /**
     * Create a new LicenseInfo object for Creative Commons CC BY-NC-ND 2.0.
     * @return LicenseInfo Information about license.
     */
    public static function CC_BY_NC_ND_2_0(): LicenseInfo
    {
        return new LicenseInfo("Creative Commons CC BY-NC-ND 2.0", "https://creativecommons.org/licenses/by-nc-nd/2.0/");
    }

    /**
     * Create a new LicenseInfo object for Creative Commons CC BY 2.5.
     * @return LicenseInfo Information about license.
     */
    public static function CC_BY_2_5(): LicenseInfo
    {
        return new LicenseInfo("Creative Commons CC BY 2.5", "https://creativecommons.org/licenses/by/2.5/");
    }

    /**
     * Create a new LicenseInfo object for Creative Commons CC BY-SA 2.5.
     * @return LicenseInfo Information about license.
     */
    public static function CC_BY_SA_2_5(): LicenseInfo
    {
        return new LicenseInfo("Creative Commons CC BY-SA 2.5", "https://creativecommons.org/licenses/by-sa/2.5/");
    }

    /**
     * Create a new LicenseInfo object for Creative Commons CC BY-ND 2.5.
     * @return LicenseInfo Information about license.
     */
    public static function CC_BY_ND_2_5(): LicenseInfo
    {
        return new LicenseInfo("Creative Commons CC BY-ND 2.5", "https://creativecommons.org/licenses/by-nd/2.5/");
    }

    /**
     * Create a new LicenseInfo object for Creative Commons CC BY-NC 2.5.
     * @return LicenseInfo Information about license.
     */
    public static function CC_BY_NC_2_5(): LicenseInfo
    {
        return new LicenseInfo("Creative Commons CC BY-NC 2.5", "https://creativecommons.org/licenses/by-nc/2.5/");
    }

    /**
     * Create a new LicenseInfo object for Creative Commons CC BY-NC-SA 2.5.
     * @return LicenseInfo Information about license.
     */
    public static function CC_BY_NC_SA_2_5(): LicenseInfo
    {
        return new LicenseInfo("Creative Commons CC BY-NC-SA 2.5", "https://creativecommons.org/licenses/by-nc-sa/2.5/");
    }

    /**
     * Create a new LicenseInfo object for Creative Commons CC BY-NC-ND 2.5.
     * @return LicenseInfo Information about license.
     */
    public static function CC_BY_NC_ND_2_5(): LicenseInfo
    {
        return new LicenseInfo("Creative Commons CC BY-NC-ND 2.5", "https://creativecommons.org/licenses/by-nc-nd/2.5/");
    }

    /**
     * Create a new LicenseInfo object for Creative Commons CC BY 3.0.
     * @return LicenseInfo Information about license.
     */
    public static function CC_BY_3_0(): LicenseInfo
    {
        return new LicenseInfo("Creative Commons CC BY 3.0", "https://creativecommons.org/licenses/by/3.0/");
    }

    /**
     * Create a new LicenseInfo object for Creative Commons CC BY-SA 3.0.
     * @return LicenseInfo Information about license.
     */
    public static function CC_BY_SA_3_0(): LicenseInfo
    {
        return new LicenseInfo("Creative Commons CC BY-SA 3.0", "https://creativecommons.org/licenses/by-sa/3.0/");
    }

    /**
     * Create a new LicenseInfo object for Creative Commons CC BY-ND 3.0.
     * @return LicenseInfo Information about license.
     */
    public static function CC_BY_ND_3_0(): LicenseInfo
    {
        return new LicenseInfo("Creative Commons CC BY-ND 3.0", "https://creativecommons.org/licenses/by-nd/3.0/");
    }

    /**
     * Create a new LicenseInfo object for Creative Commons CC BY-NC 3.0.
     * @return LicenseInfo Information about license.
     */
    public static function CC_BY_NC_3_0(): LicenseInfo
    {
        return new LicenseInfo("Creative Commons CC BY-NC 3.0", "https://creativecommons.org/licenses/by-nc/3.0/");
    }

    /**
     * Create a new LicenseInfo object for Creative Commons CC BY-NC-SA 3.0.
     * @return LicenseInfo Information about license.
     */
    public static function CC_BY_NC_SA_3_0(): LicenseInfo
    {
        return new LicenseInfo("Creative Commons CC BY-NC-SA 3.0", "https://creativecommons.org/licenses/by-nc-sa/3.0/");
    }

    /**
     * Create a new LicenseInfo object for Creative Commons CC BY-NC-ND 3.0.
     * @return LicenseInfo Information about license.
     */
    public static function CC_BY_NC_ND_3_0(): LicenseInfo
    {
        return new LicenseInfo("Creative Commons CC BY-NC-ND 3.0", "https://creativecommons.org/licenses/by-nc-nd/3.0/");
    }

    /**
     * Create a new LicenseInfo object for Creative Commons CC BY 4.0.
     * @return LicenseInfo Information about license.
     */
    public static function CC_BY_4_0(): LicenseInfo
    {
        return new LicenseInfo("Creative Commons CC BY 4.0", "https://creativecommons.org/licenses/by/4.0/");
    }

    /**
     * Create a new LicenseInfo object for Creative Commons CC BY-SA 4.0.
     * @return LicenseInfo Information about license.
     */
    public static function CC_BY_SA_4_0(): LicenseInfo
    {
        return new LicenseInfo("Creative Commons CC BY-SA 4.0", "https://creativecommons.org/licenses/by-sa/4.0/");
    }

    /**
     * Create a new LicenseInfo object for Creative Commons CC BY-ND 4.0.
     * @return LicenseInfo Information about license.
     */
    public static function CC_BY_ND_4_0(): LicenseInfo
    {
        return new LicenseInfo("Creative Commons CC BY-ND 4.0", "https://creativecommons.org/licenses/by-nd/4.0/");
    }

    /**
     * Create a new LicenseInfo object for Creative Commons CC BY-NC 4.0.
     * @return LicenseInfo Information about license.
     */
    public static function CC_BY_NC_4_0(): LicenseInfo
    {
        return new LicenseInfo("Creative Commons CC BY-NC 4.0", "https://creativecommons.org/licenses/by-nc/4.0/");
    }

    /**
     * Create a new LicenseInfo object for Creative Commons CC BY-NC-SA 4.0.
     * @return LicenseInfo Information about license.
     */
    public static function CC_BY_NC_SA_4_0(): LicenseInfo
    {
        return new LicenseInfo("Creative Commons CC BY-NC-SA 4.0", "https://creativecommons.org/licenses/by-nc-sa/4.0/");
    }

    /**
     * Create a new LicenseInfo object for Creative Commons CC BY-NC-ND 4.0.
     * @return LicenseInfo Information about license.
     */
    public static function CC_BY_NC_ND_4_0(): LicenseInfo
    {
        return new LicenseInfo("Creative Commons CC BY-NC-ND 4.0", "https://creativecommons.org/licenses/by-nc-nd/4.0/");
    }

    /**
     * Create a new LicenseInfo object for Apache License 1.0.
     * @return LicenseInfo Information about license.
     */
    public static function Apache_1_0(): LicenseInfo
    {
        return new LicenseInfo("Apache License 1.0", "https://www.apache.org/licenses/LICENSE-1.0");
    }

    /**
     * Create a new LicenseInfo object for Apache License 1.1.
     * @return LicenseInfo Information about license.
     */
    public static function Apache_1_1(): LicenseInfo
    {
        return new LicenseInfo("Apache License 1.1", "https://www.apache.org/licenses/LICENSE-1.1");
    }

    /**
     * Create a new LicenseInfo object for Apache License 2.0.
     * @return LicenseInfo Information about license.
     */
    public static function Apache_2_0(): LicenseInfo
    {
        return new LicenseInfo("Apache License 2.0", "https://www.apache.org/licenses/LICENSE-2.0");
    }

    /**
     * Create a new LicenseInfo object for GNU General Public License 1.0.
     * @return LicenseInfo Information about license.
     */
    public static function GPL_1_0(): LicenseInfo
    {
        return new LicenseInfo("GNU General Public License 1.0", "https://www.gnu.org/licenses/old-licenses/gpl-1.0.html");
    }

    /**
     * Create a new LicenseInfo object for GNU General Public License 2.0.
     * @return LicenseInfo Information about license.
     */
    public static function GPL_2_0(): LicenseInfo
    {
        return new LicenseInfo("GNU General Public License 2.0", "https://www.gnu.org/licenses/old-licenses/gpl-2.0.html");
    }

    /**
     * Create a new LicenseInfo object for GNU General Public License 3.0.
     * @return LicenseInfo Information about license.
     */
    public static function GPL_3_0(): LicenseInfo
    {
        return new LicenseInfo("GNU General Public License 3.0", "https://www.gnu.org/licenses/gpl-3.0.html");
    }

    /**
     * Create a new LicenseInfo object for GNU Library General Public License 2.0.
     * @return LicenseInfo Information about license.
     */
    public static function LGPL_2_0(): LicenseInfo
    {
        return new LicenseInfo("GNU Library General Public License 2.0", "https://www.gnu.org/licenses/old-licenses/lgpl-2.0.html");
    }

    /**
     * Create a new LicenseInfo object for GNU Lesser General Public License 2.1.
     * @return LicenseInfo Information about license.
     */
    public static function LGPL_2_1(): LicenseInfo
    {
        return new LicenseInfo("GNU Lesser General Public License 2.1", "https://www.gnu.org/licenses/old-licenses/lgpl-2.1.html");
    }

    /**
     * Create a new LicenseInfo object for GNU Lesser General Public License 3.0.
     * @return LicenseInfo Information about license.
     */
    public static function LGPL_3_0(): LicenseInfo
    {
        return new LicenseInfo("GNU Lesser General Public License 3.0", "https://www.gnu.org/licenses/lgpl-3.0.html");
    }

    /**
     * Create a new LicenseInfo object for MIT License.
     * @return LicenseInfo Information about license.
     */
    public static function MIT(): LicenseInfo
    {
        return new LicenseInfo("MIT License", "https://opensource.org/licenses/MIT");
    }

    /**
     * Create a new LicenseInfo object for Mozilla Public License 1.0.
     * @return LicenseInfo Information about license.
     */
    public static function Mozilla_1_0(): LicenseInfo
    {
        return new LicenseInfo("Mozilla Public License 1.0", "https://website-archive.mozilla.org/www.mozilla.org/mpl/mpl/1.0/");
    }

    /**
     * Create a new LicenseInfo object for Mozilla Public License 1.1.
     * @return LicenseInfo Information about license.
     */
    public static function Mozilla_1_1(): LicenseInfo
    {
        return new LicenseInfo("Mozilla Public License 1.1", "https://www.mozilla.org/en-US/MPL/1.1/");
    }

    /**
     * Create a new LicenseInfo object for Mozilla Public License 2.0.
     * @return LicenseInfo Information about license.
     */
    public static function Mozilla_2_0(): LicenseInfo
    {
        return new LicenseInfo("Mozilla Public License 2.0", "https://www.mozilla.org/en-US/MPL/2.0/");
    }
}

?>
