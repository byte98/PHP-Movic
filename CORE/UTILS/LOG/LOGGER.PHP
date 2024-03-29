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

namespace PHPMovic\Utils\Log;

use PHPMovic\Model\Configuration\LogModel;
use PHPMovic\Utils\Format\DateTimeFormat;
use PHPMovic\Utils\Log\Log;
use PHPMovic\Utils\Log\LogLevel;

/**
 * Class which performs logging.
 */
class Logger
{
    /**
     * Model of logger defining behaviour of logger.
     */
    private readonly LogModel $logModel;

    /**
     * Date format of logger.
     */
    private readonly DateTimeFormat $dateFormat;

    /**
     * Flag, whether directory was checked.
     */
    private bool $dirChecked;

    /**
     * Creates new logger.
     * @param LogModel $logModel Model of logger.
     * @param DateTimeFormat $dateFormat Date format of logger.
     */
    public function __construct(LogModel $logModel, DateTimeFormat $dateFormat)
    {
        $this->logModel = $logModel;
        $this->dateFormat = $dateFormat;
        $this->dirChecked = false;
    }

    /**
     * Checks, whether logger can perform logging.
     * @param LogLevel $level Level of log.
     * @return bool TRUE if logger can perform logging,
     *              FALSE otherwise. 
     */
    private function canLog(LogLevel $level): bool
    {
        $enabled = $this->logModel->doLogs();
        $minLevel = $level->isGreaterOrEquals($this->logModel->getLevel());
        return $enabled && $minLevel;
    }

    /**
     * Gets path to file where log will be saved.
     * @param \DateTime $date Date of log.
     * @return string Path to file.
     */
    private function getFilePath(\DateTime $date): string
    {
        $reti = $this->logModel->getPath();
        if (str_starts_with($reti, DIRECTORY_SEPARATOR) == false && preg_match('/^[a-zA-Z]:/', $reti) == false)
        // Path does not start with / or C:/ (script assumes that path is relative)
        {
            $reti = $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . $reti;
        }
        $reti .= $date->format("Y-m-d") . ".log";
        return $reti;
    }

    /**
     * Checks, whether log directory exists. If not, it will be created.
     */
    private function checkLogDir(): void{
        if ($this->dirChecked == false){
            $this->dirChecked = true;
            if (is_dir($this->logModel->getPath()) == false){
                if (mkdir($this->logModel->getPath(), 0777, true)){
                    $this->info("Logger directory '" . $this->logModel->getPath() . "' was created.");
                }
                else{
                    $this->error("Logger directory '" . $this->logModel->getPath() . "' cannot be created!");
                }
            }
        }
        
    }


    /**
     * Writes log to file.
     * @param \DateTime $date Date of log.
     * @param string $text Text of log.
     */
    private function writeToFile(\DateTime $date, string $text): void
    {
        $this->checkLogDir();
        $path = $this->getFilePath($date);
        file_put_contents($path, $text, FILE_APPEND);
    }

    /**
     * Prints text to standard output.
     * @param string $text Text to be printed.
     */
    private function print(string $text): void
    {
        fwrite(\STDOUT, $text);
    }
    updating
    /**
     * Handles log and performs logging.
     * @param Log $log Log to be logged.
     */
    public function handleLog(Log $log): void
    {
        if ($this->canLog($log->getLevel()))
        {
            $useFormat = $this->logModel->getFileUseFormat();
            $fileText = $this->logModel->getFormat($log->getLevel())->format($log, $this->dateFormat, $useFormat);
            $this->writeToFile($log->getDate(), $fileText);
            if ($this->logModel->getStdout())
            {
                $consoleText = $this->logModel->getFormat($log->getLevel())->format($log, $this->dateFormat, true);
                $this->print($consoleText);
            }
        }
    }

    /**
     * Performs logging.
     * @param LogLevel $level Level of log.
     * @param string $message Message of log.
     */
    public function log(LogLevel $level, string $message): void
    {
        $this->handleLog(new Log($message, $level));
    }

    /**
     * Performs low level logging.
     * @param string $message Message of log.
     */
    public function low(string $message): void
    {updating
        $this->log(LogLevel::Low, $message);
    }

    /**
     * Performs base level logging.
     * @param string $message Message of log.
     */
    public function base(string $message): void
    {
        $this->log(LogLevel::Base, $message);
    }

    /**
     * Performs info level logging.
     * @param string $message Message of log.
     */
    public function info(string $message): void
    {
        $this->log(LogLevel::Info, $message);
    }

    /**
     * Performs success level logging.
     * @param string $message Message of log.
     */
    public function success(string $message): void
    {
        $this->log(LogLevel::Success, $message);
    }

    /**
     * Performs warning level logging.
     * @param string $message Message of log.
     */
    public function warning(string $message): void
    {
        $this->log(LogLevel::Warning, $message);
    }

    /**
     * Performs error level logging.
     * @param string $message Message of log.
     */
    public function error(string $message): void
    {
        $this->log(LogLevel::Error, $message);
    }

    /**
     * Performs critical level logging.
     * @param string $message Message of log.
     */
    public function critical(string $message): void
    {
        $this->log(LogLevel::Critical, $message);
    }
}

?>
