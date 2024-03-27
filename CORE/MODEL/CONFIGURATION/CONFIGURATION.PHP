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
     * Creates new configuration of application.
     * @param DateTimeFormat $dateTimeFormat Format of date and time used in application.
     * @param bool $phpErrors Flag, whether PHP errors should be displayed or not.
     * @param ConnectionModel $connectionModel Model of connection to database.
     * @param LogModel $logModel Model of logs and logger.
     */
    public function __construct(
        DateTimeFormat $dateTimeFormat,
        bool $phpErrors,
        ConnectionModel $connectionModel,
        LogModel $logModel)
    {
        $this->dateTimeFormat = $dateTimeFormat;
        $this->phpErrors = $phpErrors;
        $this->connectionModel = $connectionModel;
        $this->logModel = $logModel;
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
}

?>
