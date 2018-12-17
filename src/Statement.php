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
use Doctrine\DBAL\ParameterType;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Google\Cloud\Spanner\Database;

/**
 * Cloud Spanner Statement
 */
class Statement implements \IteratorAggregate, Driver\Statement
{
    /**
     * @var Database
     */
    private $database;

    /**
     * @var string
     */
    private $statement;

    /**
     * @var AbstractPlatform
     */
    private $platform;

    /**
     * @var mixed[]
     */
    private $rows = [];

    /**
     * @var mixed[]
     */
    private $values = [];

    /**
     * @var mixed[]
     */
    private $types = [];

    /**
     * @var \ArrayIterator|null
     */
    private $iterator;

    public function __construct(Database $database, $statement, AbstractPlatform $platform)
    {
        $this->database = $database;
        $this->statement = $statement;
        $this->platform = $platform;
    }

    public function getIterator()
    {
        if (!$this->iterator) {
            $this->iterator = new \ArrayIterator($this->rows);
        }

        return $this->iterator;
    }

    /**
     * {@inheritDoc}
     */
    public function bindValue($param, $value, $type = ParameterType::STRING)
    {}

    /**
     * {@inheritDoc}
     */
    public function bindParam($column, &$variable, $type = ParameterType::STRING, $length = null)
    {}

    /**
     * {@inheritDoc}
     */
    public function errorCode()
    {}

    /**
     * {@inheritDoc}
     */
    public function errorInfo()
    {}

    /**
     * {@inheritDoc}
     */
    public function execute($params = null)
    {}

    /**
     * {@inheritDoc}
     */
    public function rowCount()
    {}

}
