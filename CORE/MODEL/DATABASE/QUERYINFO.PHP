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

namespace PHPMovic\Model\Database;

/**
 * Class representing basic information about query.
 */
class QueryInfo
{
    /**
     * Flag, whether query has been successfull or not.
     */
    private readonly bool $success;

    /**
     * Number of rows affected by query.
     */
    private readonly int $affectedRows;

    /**
     * Identifier of last inserted enity to database.
     */
    private readonly ?int $lastId;

    /**
     * Creates new wrapper of informatino about query execution.
     * @param bool $success Flag, whether query has been successfull or not.
     * @param int $affectedRows Number of rows affected by query.
     * @param ?int $lastId Identifier of last inserted enity to database.
     */
    public function __construct(bool $success, int $affectedRows = 0, ?int $lastId = null)
    {
        $this->success = $success;
        $this->affectedRows = $affectedRows;
        $this->lastId = $lastId;
    }

    /**
     * Gets flag, whether query has been successfull or not.
     * @return bool TRUE if query has been successfull,
     *              FALSE otherwise.
     */
    public function isSuccess(): bool
    {
        return $this->success;
    }

    /**
     * Gets number of rows affected by query.
     * @return int Number of rows affected by query.
     */
    public function getAffectedRows(): int
    {
        return $this->affectedRows;
    }

    /**
     * Gets identifier of last inserted enity to database.
     * @return ?int Identifier of last inserted enity to database,
     *              or NULL if query has not been successfull.
     */
    public function getLastInsertId(): ?int
    {
        return $this->lastId;
    }
}

?>
