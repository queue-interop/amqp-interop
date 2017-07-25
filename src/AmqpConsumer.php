<?php

namespace Interop\Amqp;

use Interop\Queue\PsrConsumer;

/**
 * @method AmqpMessage|null receiveNoWait()
 * @method AmqpMessage|null receive(int $timeout)
 * @method AmqpQueue getQueue()
 * @method void acknowledge(AmqpMessage $message)
 * @method void reject(AmqpMessage $message, bool $requeue)
 */
interface AmqpConsumer extends PsrConsumer
{
}
