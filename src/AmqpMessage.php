<?php

namespace Interop\Amqp;

use Interop\Queue\PsrMessage;

interface AmqpMessage extends PsrMessage
{
    const DELIVERY_MODE_NON_PERSISTENT = 1;
    const DELIVERY_MODE_PERSISTENT = 2;

    const FLAG_NOPARAM = 0;
    const FLAG_MANDATORY = 1;
    const FLAG_IMMEDIATE = 2;

    /**
     * @param string $type
     */
    public function setContentType($type);

    /**
     * @return string
     */
    public function getContentType();

    /**
     * @param string $encoding
     */
    public function setContentEncoding($encoding);

    /**
     * @return string
     */
    public function getContentEncoding();

    /**
     * @param int $deliveryMode
     */
    public function setDeliveryMode($deliveryMode);

    /**
     * @return int
     */
    public function getDeliveryMode();

    /**
     * @param int $priority
     */
    public function setPriority($priority);

    /**
     * @return int
     */
    public function getPriority();

    /**
     * @param int $expiration
     */
    public function setExpiration($expiration);

    /**
     * @return int
     */
    public function getExpiration();

    /**
     * @param string $deliveryTag
     */
    public function setDeliveryTag($deliveryTag);

    /**
     * @return string
     */
    public function getDeliveryTag();

    /**
     * @return string|null
     */
    public function getConsumerTag();

    /**
     * @param string|null $consumerTag
     */
    public function setConsumerTag($consumerTag);

    public function clearFlags();

    /**
     * @param int $flag
     */
    public function addFlag($flag);

    /**
     * @return int
     */
    public function getFlags();

    /**
     * @param int $flags
     */
    public function setFlags($flags);

    /**
     * @return string
     */
    public function getRoutingKey();

    /**
     * @param string $routingKey
     */
    public function setRoutingKey($routingKey);
}
