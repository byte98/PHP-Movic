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

use PHPMovic\Utils\Format\DateTimeFormat;
use PHPMovic\Model\Configuration\ConnectionModel;
use PHPMovic\Model\Configuration\LogModel;
use PHPMovic\Model\Configuration\SourcesModel;
use PHPMovic\Model\Configuration\RouterModel;
use PHPMovic\Model\Configuration\CountersModel;

/**
 * Class which holds whole configuration of the application.
 */
class Configuration
{
    /**
     * Format of date and time used in application.
     */
    private readonly DateTimeFormat $dateTimeFormat;

    /**
     * Flag, whether PHP errors should be displayed or not.
     */
    private readonly bool $phpErrors;

    /**
     * Model of connection to database.
     */
    private readonly ConnectionModel $connectionModel;

    /**
     * Model of logs and logger.
     */
    private readonly LogModel $logModel;

    /**
     * Model of all sources of application.
     */
    private readonly SourcesModel $sourcesModel;

    /**
     * Model of router of application.
     */
    private readonly RouterModel $routes;

    /**
     * Model of counters of application.
     */
    private readonly CountersModel $countersModel;


    /**
     * Default time zone of application.
     */
    private readonly string $timezone;

    /**
     * Path to favicon of application.
     */
    private readonly string $favicon;

    /**
     * Life time of session (in seconds)
     */
    private readonly int $sessionLifetime;

    /**
     * Creates new configuration of application.
     * @param DateTimeFormat $dateTimeFormat Format of date and time used in application.
     * @param bool $phpErrors Flag, whether PHP errors should be displayed or not.
     * @param ConnectionModel $connectionModel Model of connection to database.
     * @param LogModel $logModel Model of logs and logger.
     * @param SourcesModel $sourcesModel Model of all sources of application.
     * @param RouterModel $routes Model of router of application.
     * @param string $timezone Default time zone of application.
     * @param CountersModel $countersModel Model of counters of application.
     * @param string $favicon Path to favicon of application.
     * @param int $sessionLifetime Life time of session (in seconds).
     */
    public function __construct(
        DateTimeFormat $dateTimeFormat,
        bool $phpErrors,
        ConnectionModel $connectionModel,
        LogModel $logModel,
        SourcesModel $sourcesModel,
        RouterModel $routes,
        string $timezone,
        CountersModel $countersModel,
        string $favicon,
        int $sessionLifetime)
    {
        $this->dateTimeFormat = $dateTimeFormat;
        $this->phpErrors = $phpErrors;
        $this->connectionModel = $connectionModel;
        $this->logModel = $logModel;
        $this->sourcesModel = $sourcesModel;
        $this->routes = $routes;
        $this->timezone = $timezone;
        $this->countersModel = $countersModel;
        $this->favicon = $favicon;
        $this->sessionLifetime = $sessionLifetime;
    }

    /**
     * Gets format of date and time used in application.
     * @return DateTimeFormat Format of date and time used in application.
     */
    public function getDateTimeFormat(): DateTimeFormat
    {
        return $this->dateTimeFormat;
    }

    /**
     * Gets flag, whether PHP errors should be displayed or not.
     * @return bool Flag, whether PHP errors should be displayed or not.
     */
    public function getPhpErrors(): bool
    {
        return $this->phpErrors;
    }

    /**
     * Gets model of connection to database.
     * @return ConnectionModel Model of connection to database.
     */
    public function getConnectionModel(): ConnectionModel
    {
        return $this->connectionModel;
    }

    /**
     * Gets model of logs and logger.
     * @return LogModel Model of logs and logger.
     */
    public function getLogModel(): LogModel
    {
        return $this->logModel;
    }

    /**
     * Gets model of all sources of application.
     * @return SourcesModel Model of all sources of application.
     */
    public function getSourcesModel(): SourcesModel
    {
        return $this->sourcesModel;
    }

    /**
     * Gets model of router of application.
     * @return RouterModel Router model.
     */
    public function getRoutes(): RouterModel
    {
        return $this->routes;
    }

    /**
     * Gets default time zone of application.
     * @return string Default time zone of application.
     * @see https://www.php.net/manual/en/timezones.php
     */
    public function getTimezone(): string
    {
        return $this->timezone;
    }

    /**
     * Gets model of counters of application.
     * @return CountersModel Counters model.
     */
    public function getCountersModel(): CountersModel
    {
        return $this->countersModel;
    }

    /**
     * Gets path to favicon of application.
     * @return string Path to favicon of application.
     */
    public function getFavicon(): string
    {
        return $this->favicon;
    }

    /**
     * Gets life time of session (in seconds).
     * @return int Life time of session (in seconds).
     */
    public function getSessionLifetime(): int
    {
        return $this->sessionLifetime;
    }
}

?>
