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
use PHPMovic\Model\Database\QueryInfo;

/**
 * Class which represents result of query to the database.
 */
class QueryResult extends QueryInfo
{
    /**
     * Array with results of query.
     */
    private readonly array $results;

    /**
     * Creates new result of query.
     * @param bool $success Flag, whether query has been successfull or not.
     * @param array $results Array with results of query.
     */
    public function __construct(bool $success, array $results = array())
    {
        $rows = 0;
        if(count($results) > 0)
        {
            $rows = count($results);
        }
        parent::__construct($success, $rows);
        $this->results = $results;
    }

    /**
     * Gets array with results of query.
     * @return array Array with results of query.
     */
    public function getResults(): array
    {
        return $this->results;
    }
}

?>
