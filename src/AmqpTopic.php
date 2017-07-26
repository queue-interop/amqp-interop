<?php

namespace Interop\Amqp;

use Interop\Queue\PsrTopic;

interface AmqpTopic extends PsrTopic, AmqpDestination
{
    const TYPE_DIRECT = 'direct';
    const TYPE_FANOUT = 'fanout';
    const TYPE_TOPIC = 'topic';
    const TYPE_HEADERS = 'headers';

    const FLAG_INTERNAL = 2048;

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
}
