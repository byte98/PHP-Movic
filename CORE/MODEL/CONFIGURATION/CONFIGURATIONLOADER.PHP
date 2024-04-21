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

use PHPMovic\Model\Configuration\Configuration;
use PHPMovic\Utils\Format\DateTimeFormat;
use PHPMovic\Utils\Format\DateTimeFormatParser;
use PHPMovic\Utils\Format\LogFormatParser;
use PHPMovic\Utils\Format\LogFormat;
use PHPMovic\Utils\Log\LogLevel;
use PHPMovic\Model\Configuration\ConnectionModel;
use PHPMovic\Model\Configuration\LogModel;
use PHPMovic\Model\Configuration\SourcesModel;
use PHPMovic\Model\Configuration\RouterModel;
use PHPMovic\Model\Configuration\CountersModel;
use PHPMovic\Main;

/**
 * Class which provides functionality to load configuration.
 */
class ConfigurationLoader
{
    /**
     * Path to file with configuration.
     */
    private readonly string $path;

    /**
     * Loaded configuration.
     */
    private ?Configuration $configuration;

    /**
     * Creates new loader of configuration.
     * @param string $path Path to file with configuration.
     */
    public function __construct(string $path)
    {
        $this->path = $path;
        $this->configuration = null;
    }

    /**
     * Loads configuration from file.
     */
    private function load(): void
    {
        $data = yaml_parse_file($this->path);
        $this->configuration = new Configuration(
            $this->getDateTimeFormat($data),
            $this->getPHPErrors($data),
            $this->getConnectionModel($data),
            $this->getLogModel($data),
            $this->getSourcesModel($data),
            $this->getRouterModel($data),
            $this->getTimeZone($data),
            $this->getCountersModel($data),
            $this->getFavicon($data),
            $this->getSessionModel($data)
        );
    }

    /**
     * Gets life time of session (in seconds).
     * @param array $data Parsed configuration data.
     * @return int Life time of session (in seconds).
     */
    private function getSessionLifetime(array $data): int
    {
        $reti = 60;
        if ($this->checkValue($data, "SessionLifetime", "integer"))
        {
            $reti = $data["SessionLifetime"];
        }
        return $reti;
    }

    /**
     * Parses a session configurtion from configuration data.
     * @param array $data Parsed configuration data.
     * @return SessionModel Configuration of session parsed from data.
     */
    private function getSessionModel(array $data): SessionModel
    {
        $timeout = 60;
        $matchIP = true;
        $reqTime = 5;
        $reqCount = 10;
    
        if ($this->checkValue($data, "SessionLifetime", "integer")) {
            $timeout = $data["SessionLifetime"];
        }
        if ($this->checkValue($data, "SessionIP", "boolean")) {
            $matchIP = $data["SessionIP"];
        }
        if ($this->checkValue($data, "SessionTimeframe", "integer")) {
            $reqTime = $data["SessionTimeframe"];
        }
        if ($this->checkValue($data, "SessionRequests", "integer")) {
            $reqCount = $data["SessionRequests"];
        }
    
        return new SessionModel($timeout, $matchIP, $reqTime, $reqCount);
    }

    /**
     * Gets path to favicon from parsed configuration file.
     * @param array $data Parsed configuration data.
     * @return string Path to favicon.
     */
    private function getFavicon(array $data): string
    {
        $reti = "";
        if ($this->checkValue($data, "Favicon", "string"))
        {
            $reti = $data["Favicon"];
        }
        return $reti;
    }

    /**
     * Gets flag, whether PHP errors should be displayed or not from
     * parsed configuration file.
     * @param array $data Parsed configuration data.
     * @return bool Flag, whether PHP errors should be displayed or not.
     */
    private function getPHPErrors(array $data): bool
    {
        $reti = false;
        if ($this->checkValue($data, "PHPErrors", "boolean"))
        {
            $reti = $data["PHPErrors"];
        }
        return $reti;
    }

    /**
     * Gets format of date and time from configuration.
     * @param array $data Parsed configuration data.
     * @return DateTimeFormat Format of date and time from configuration.
     */
    private function getDateTimeFormat(array $data): DateTimeFormat
    {
        $reti = new DateTimeFormat();
        if ($this->checkValue($data, "DateFormat", "string"))
        {
            $parser = new DateTimeFormatParser($data["DateFormat"]);
            $reti = $parser->getFormat();
        }
        return $reti;
    }

    /**
     * Gets time zone from configuration.
     * @param array $data Parsed configuration data.
     * @return string Time zone from configuration.
     */
    private function getTimeZone(array $data): string
    {
        $reti = "UTC";
        if ($this->checkValue($data, "Timezone", "string"))
        {
            $reti = $data["Timezone"];
        }
        return $reti;
    }

    /**
     * Gets connection model from configuration.
     * @param array $data Parsed configuration data.
     * @return ConnectionModel Model of connection from configuration.
     */
    private function getConnectionModel(array $data): ConnectionModel
    {
        $hostname = "";
        $database = "";
        $username = "";
        $password = "";
        $driver = "";
        if ($this->checkValue($data, "DatabaseHost", "string")) $hostname = $data["DatabaseHost"];
        if ($this->checkValue($data, "DatabaseName", "string")) $database = $data["DatabaseName"];
        if ($this->checkValue($data, "DatabaseUser", "string")) $username = $data["DatabaseUser"];
        if ($this->checkValue($data, "DatabasePassword", "string")) $password = $data["DatabasePassword"];
        if ($this->checkValue($data, "DatabaseDriver", "string")) $driver = $data["DatabaseDriver"];

        return new ConnectionModel(
            $hostname,
            $database,
            $username,
            $password,
            $driver
        );
    }

    /**
     * Gets model of logs and logger from configuration data.
     * @param array $data Parsed configuration data.
     * @return LogModel Model of logs and logger from configuration.
     */
    private function getLogModel(array $data): LogModel
    {
        $level = LogLevel::Warning;
        $doLogs = true;
        $path = "LOGS";
        $stdout = false;
        $formatString = "";
        $useFormat = false;
        $console = false;
        $sourceLoader = false;
        if ($this->checkValue($data, "LogLevel", "string"))
        {
            $level = LogLevel::fromStringOrDefined($data["LogLevel"], $level);
        }
        if ($this->checkValue($data, "LogsAllowed", "boolean")) $doLogs = $data["LogsAllowed"];
        if ($this->checkValue($data, "LogDir", "string")) $path = $data["LogDir"];
        if ($this->checkValue($data, "LogStdout", "boolean")) $stdout = $data["LogStdout"];
        if ($this->checkValue($data, "LogUseFormat", "boolean")) $useFormat = $data["LogUseFormat"];
        if ($this->checkValue($data, "LogFormat", "string")) $formatString = $data["LogFormat"];
        if ($this->checkValue($data, "LogConsole", "boolean")) $console = $data["LogConsole"];
        if ($this->checkValue($data, "LogSourceLoader", "boolean")) $sourceLoader = $data["LogSourceLoader"];
        $debugFormatString = $formatString;
        $lowFormatString = $formatString;
        $baseFormatString = $formatString;
        $infoFormatString = $formatString;
        $successFormatString = $formatString;
        $errorFormatString = $formatString;
        $warningFormatString = $formatString;
        $criticalFormatString = $formatString;

        if ($this->checkValue($data, "LogLevelFormat", "array"))
        {
            foreach($data["LogLevelFormat"] as $key => $value)
            {
                $formatLevel = LogLevel::fromString($key);
                if ($formatLevel != null)
                {
                    switch($formatLevel)
                    {
                        case LogLevel::Debug: $debugFormatString = $value; break;
                        case LogLevel::Low: $lowFormatString = $value; break;
                        case LogLevel::Base: $baseFormatString = $value; break;
                        case LogLevel::Info: $infoFormatString = $value; break;
                        case LogLevel::Success: $successFormatString = $value; break;
                        case LogLevel::Error: $errorFormatString = $value; break;
                        case LogLevel::Warning: $warningFormatString = $value; break;
                        case LogLevel::Critical: $criticalFormatString = $value; break;
                    }
                }
            }
        }

        return new LogModel(
            $level,
            $doLogs,
            $path,
            $stdout,
            $useFormat,
            $console,
            $sourceLoader,
            $this->parseLogFormat($formatString),
            $this->parseLogFormat($debugFormatString),
            $this->parseLogFormat($lowFormatString),
            $this->parseLogFormat($baseFormatString),
            $this->parseLogFormat($successFormatString),
            $this->parseLogFormat($infoFormatString),
            $this->parseLogFormat($warningFormatString),
            $this->parseLogFormat($errorFormatString),
            $this->parseLogFormat($criticalFormatString)
        );
    }

    /**
     * Parses log format string.
     * @param string $formatString String with log format.
     * @return LogFormat Log format parsed from string.
     */
    private function parseLogFormat(string $formatString): LogFormat
    {
        $parser = new LogFormatParser($formatString);
        return $parser->getFormat();
    }

    /**
     * Gets model of sources from configuration data.
     * @param array $data Parsed configuration data.
     * @return SourcesModel Model of sources from configuration.
     */
    private function getSourcesModel(array $config): SourcesModel
    {
        $contentNS = "";
        $mainName = Main::class;
        $coreNS = substr($mainName, 0, strrpos($mainName, '\\'));
        if ($this->checkValue($config, "ContentNamespace", "string")) $contentNS = $config["ContentNamespace"];
        return new SourcesModel($coreNS, $contentNS);
    }

    /**
     * Gets model of router from configuration data.
     * @param array $data Parsed configuration data.
     * @return RouterModel Model of router from configuration.
     */
    private function getRouterModel(array $config): RouterModel
    {
        $routes = array();
        $static = array();
        $aliases = array();
        if ($this->checkValue($config, "Routes", "array"))
        {
            foreach($config["Routes"] as $key => $value)
            {
                $routes[$key] = $value;
            }
        }
        if ($this->checkValue($config, "StaticRoutes", "array"))
        {
            foreach($config["StaticRoutes"] as $key => $value)
            {
                $static[$key] = $value;
            }
        }
        if ($this->checkValue($config, "Aliases", "array"))
        {
            foreach($config["Aliases"] as $key => $value)
            {
                $aliases[$key] = $value;
            }
        }
        return new RouterModel($routes, $static, $aliases);
    }

    /**
     * Gets model of counters from parsed configuration data.
     * @param array $data Parsed configuration data.
     * @return CountersModel Model of counters from configuration.
     */
    public function getCountersModel(array $config): CountersModel
    {
        $file = "";
        if ($this->checkValue($config, "Counters", "string")) $file = $config["Counters"];
        return new CountersModel($file);
    }

    /**
     * Checks value in configuration for existence and data type.
     * @param array $data Parsed configuration data.
     * @param string $key Key expected in configuration data.
     * @param string $type Expected type of value.
     * @return bool TRUE if value exists and has expected type,
     *              FALSE otherwise.
     */
    private function checkValue(array $data, string $key, string $type): bool
    {
        $reti = false;
        if (array_key_exists($key, $data))
        {
            $dt = gettype($data[$key]);
            if ($dt == $type)
            {
                $reti = true;
            }
        }
        return $reti;
    }

    /**
     * Gets loaded configuration.
     * @return Configuration Configuration loaded form provided file.
     */
    public function getConfiguration(): Configuration
    {
        if ($this->configuration == null)
        {
            $this->load();
        }
        return $this->configuration;
    }


}

?>
