<?php

namespace Interop\Amqp;

use Interop\Queue\PsrMessage;

interface AmqpMessage extends PsrMessage
{
    const FLAG_NOPARAM = 0;
    const FLAG_MANDATORY = 1;
    const FLAG_IMMEDIATE = 2;

    /**
     * @param int $priority
     */
    public function setPriority($priority);

    /**
     * @return int
     */
    public function getPriority();

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
}
