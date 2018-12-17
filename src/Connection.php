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

use Doctrine\DBAL\Driver;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Google\Cloud\Spanner\SpannerClient;

/**
 * Represents a connection to Cloud Spanner
 */
class Connection implements
    Driver\Connection,

    // Do we need these interfaces?
    Driver\PingableConnection,
    Driver\ServerInfoAwareConnection
{
    /**
     * @var SpannerClient
     */
    private $spanner;

    /**
     * @var AbstractPlatform
     */
    private $platform;

    public function __construct(
        array $params,
        $username,
        $password,
        AbstractPlatform $platform
    ) {
        $this->spanner = isset($params['client'])
            ? $params['client']
            : new SpannerClient($params);

        $this->platform = $platform;
    }

    public function prepare($prepareString)
    {}

    public function query()
    {}

    public function quote($input, $type = ParameterType::STRING)
    {}

    public function exec($statement)
    {}

    public function lastInsertId($name = null)
    {}

    public function beginTransaction()
    {}

    public function commit()
    {}

    public function rollBack()
    {}

    public function errorCode()
    {}

    public function errorInfo()
    {}

    // maybe don't need these.
    public function ping()
    {}

    public function getServerVersion()
    {}

    public function requiresQueryForServerVersion()
    {}

}
