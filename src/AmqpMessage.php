<?php

namespace Interop\Amqp;

use Interop\Queue\PsrMessage;

interface AmqpMessage extends PsrMessage
{
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
}
