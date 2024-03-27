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

use PHPMovic\Utils\Log\LogLevel;
use PHPMovic\Utils\Format\LogFormat;

/**
 * Class representing model of logs.
 */
class LogModel
{

    /**
     * Minimal level of logs to be saved.
     */
    private readonly LogLevel $level;

    /**
     * Formats of logs depending on level.
     */
    private readonly array $formats;

    /**
     * Flag, whether application should make logs.
     */
    private readonly bool $doLogs;

    /**
     * Path to directory with logs.
     */
    private readonly string $path;

    /**
     * Flag, whether logs should be also printed to standard output.
     */
    private readonly bool $stdout;

    /**
     * Flag, whether styling should be used also for
     * logs saved into file.
     */
    private readonly bool $fileUseFormat;

    /**
     * Creates new model of logs and its formats.
     * @param LogLevel $level Minimal level of logs to be saved.
     * @param bool $doLogs Flag, whether application should make logs.
     * @param string $path Path to directory with logs.
     * @param bool $stdout Flag, whether logs should be also printed to standard output.
     * @param bool $fileUseFormat Flag, whether styling should be used also for
     *                            logs saved into file.
     * @param LogFormat $format Format of logs.
     * @param LogFormat $formatLow Format of logs at level Low.
     * @param LogFormat $formatBase Format of logs at level Base.
     * @param LogFormat $formatSuccess Format of logs at level Success.
     * @param LogFormat $formatInfo Format of logs at level Info.
     * @param LogFormat $formatWarning Format of logs at level Warning.
     * @param LogFormat $formatError Format of logs at level Error.
     * @param LogFormat $formatCritical Format of logs at level Critical.
     */
    public function __construct(
        LogLevel $level,
        bool $doLogs,
        string $path,
        bool $stdout,
        bool $fileUseFormat,
        LogFormat $format,
        ?LogFormat $formatLow = null,
        ?LogFormat $formatBase = null,
        ?LogFormat $formatSuccess = null,
        ?LogFormat $formatInfo = null,
        ?LogFormat $formatWarning = null,
        ?LogFormat $formatError = null,
        ?LogFormat $formatCritical = null)
    {
        if ($formatLow == null) $formatLow = $format;
        if ($formatBase == null) $formatBase = $format;
        if ($formatSuccess == null) $formatSuccess = $format;
        if ($formatInfo == null) $formatInfo = $format;
        if ($formatWarning == null) $formatWarning = $format;
        if ($formatError == null) $formatError = $format;
        if ($formatCritical == null) $formatCritical = $format;
        $this->formats = array(
            LogLevel::Low->toString() => $formatLow,
            LogLevel::Base->toString() => $formatBase,
            LogLevel::Success->toString() => $formatSuccess,
            LogLevel::Info->toString() => $formatInfo,
            LogLevel::Warning->toString() => $formatWarning,
            LogLevel::Error->toString() => $formatError,
            LogLevel::Critical->toString() => $formatCritical
        );
        $this->level = $level;
        $this->doLogs = $doLogs;
        $this->path = $path;
        $this->stdout = $stdout;
        $this->fileUseFormat = $fileUseFormat;
    }

    /**
     * Gets minimal level of logs to be saved.
     * @return LogLevel Minimal level of logs to be saved.
     */
    public function getLevel(): LogLevel
    {
        return $this->level;
    }

    /**
     * Gets flag, whether application should make logs.
     * @return bool Flag, whether application should make logs.
     */
    public function doLogs(): bool
    {
        return $this->doLogs;
    }

    /**
     * Gets path to directory with logs.
     * @return string Path to directory with logs.
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * Gets flag, whether logs should be also printed to standard output.
     * @return bool Flag, whether logs should be also printed to standard output.
     */
    public function getStdout(): bool
    {
        return $this->stdout;
    }

    /**
     * Gets flag, whether styling should be used also for
     * logs saved into file.
     * @return bool Flag, whether styling should be used also for
     *              logs saved into file.
     */
    public function getFileUseFormat(): bool
    {
        return $this->fileUseFormat;
    }

    /**
     * Gets format of logs depending on level.
     * @param LogLevel $level Level of logs.
     * @return LogFormat Format of logs.
     */
    public function getFormat(LogLevel $level): LogFormat
    {
        return $this->formats[$level->toString()];
    }
}

?>
