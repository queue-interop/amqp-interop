<?php

namespace Interop\Amqp;

use Interop\Queue\PsrQueue;

interface AmqpQueue extends PsrQueue, AmqpDestination
{
    const FLAG_EXCLUSIVE = 2097152;
    const FLAG_IFEMPTY = 4194304;

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
     * @param string|bool|int|float|null|array $value
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
    public function getConsumerTag();

    /**
     * @param string $consumerTag
     */
    public function setConsumerTag($consumerTag);
}
