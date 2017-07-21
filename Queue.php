<?php

namespace Interop\Amqp;

use Interop\Queue\PsrQueue;

interface Queue extends PsrQueue, Destination
{
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
    public function isExclusive();

    /**
     * @param bool $exclusive
     */
    public function setExclusive($exclusive);

    /**
     * @return bool
     */
    public function isAutoDelete();

    /**
     * @param bool $autoDelete
     */
    public function setAutoDelete($autoDelete);

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

    /**
     * @return bool
     */
    public function isDeleteIfEmpty();

    /**
     * @param bool $delete
     */
    public function setDeleteIfEmpty($delete);

    /**
     * @return string
     */
    public function getConsumerTag();

    /**
     * @param string $consumerTag
     */
    public function setConsumerTag($consumerTag);
}
