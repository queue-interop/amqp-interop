<?php

namespace Interop\Amqp;

use Interop\Queue\PsrTopic;

interface AmqpExchange extends PsrTopic, AmqpDestination
{
    /**
     * @return string
     */
    public function getType();

    /**
     * @param string $type
     */
    public function setType($type);

    /**
     * @param int $flags
     */
    public function setFlags($flags);

    /**
     * @return int
     */
    public function getFlags();

    /**
     * @param int $flag
     */
    public function addFlag($flag);

    public function clearFlags();

    /**
     * @return array
     */
    public function getArguments();

    /**
     * @param array $arguments
     */
    public function setArguments(array $arguments);

    /**
     * @param string $key
     * @param string|bool|int|float $value
     */
    public function setArgument($key, $value);

    /**
     * @param string $key
     *
     * @return string|bool|int|float
     */
    public function getArgument($key);

    /**
     * @return string
     */
    public function getRoutingKey();

    /**
     * @param string $routingKey
     */
    public function setRoutingKey($routingKey);
}
