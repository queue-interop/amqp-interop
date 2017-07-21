<?php

namespace Interop\Amqp;

use Interop\Queue\PsrTopic;

interface Exchange extends PsrTopic, Destination
{
    /* exchange type */
    const DIRECT = 'direct';
    const FANOUT = 'fanout';
    const TOPIC = 'topic';
    const HEADERS = 'headers';

    /**
     * @return string
     */
    public function getType();

    /**
     * @param string $type
     */
    public function setType($type);

    /**
     * @return bool
     */
    public function isPassive();

    /**
     * @param bool $passive
     */
    public function setPassive($passive);

    /**
     * @return bool
     */
    public function isDurable();

    /**
     * @param bool $durable
     */
    public function setDurable($durable);

    /**
     * @return bool
     */
    public function isAutoDelete();

    /**
     * @param bool $autoDelete
     */
    public function setAutoDelete($autoDelete);

    /**
     * @return bool
     */
    public function isInternal();

    /**
     * @param bool $internal
     */
    public function setInternal($internal);

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

    /**
     * @return bool
     */
    public function isNoWait();

    /**
     * @param bool $noWait
     */
    public function setNoWait($noWait);

    /**
     * @return bool
     */
    public function isDeleteIfUnused();

    /**
     * @param bool $delete
     */
    public function setDeleteIfUnused($delete);
}
