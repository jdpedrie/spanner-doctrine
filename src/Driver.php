<?php
/**
 * Copyright 2018 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Google\Cloud\Spanner\Doctrine;

use Doctrine\DBAL;
use Doctrine\DBAL\Connection;

/**
 * Cloud Spanner Doctrine DBAL Driver
 */
class Driver implements DBAL\Driver
{
    const DRIVER_NAME = 'spanner';

    /**
     * {@inheritDoc}
     */
    public function connect(
        array $params,
        $username = null,
        $password = null,
        array $driverOptions = []
    ) {

    }

    /**
     * {@inheritDoc}
     */
    public function getDatabasePlatform()
    {}

    /**
     * {@inheritDoc}
     */
    public function getSchemaManager(Connection $conn)
    {}

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return self::DRIVER_NAME;
    }

    /**
     * {@inheritDoc}
     */
    public function getDatabase(Connection $conn)
    {
        $params = $conn->getParams();

        if (isset($params['dbname'])) {
            return $params['dbname'];
        }

        return $conn->getDatabase()->name();
    }
}
