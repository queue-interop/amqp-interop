<?php

namespace Interop\Amqp;

use Interop\Queue\PsrConsumer;

/**
 * @method AmqpMessage|null receiveNoWait()
 * @method AmqpMessage|null receive(int $timeout = 0)
 * @method AmqpQueue getQueue()
 * @method void acknowledge(AmqpMessage $message)
 * @method void reject(AmqpMessage $message, bool $requeue)
 */
interface AmqpConsumer extends PsrConsumer
{
    const FLAG_NOPARAM = 0;
    const FLAG_NOLOCAL = 1;
    const FLAG_NOACK = 2;
    const FLAG_EXCLUSIVE = 4;
    const FLAG_NOWAIT = 8;

    /**
     * @param string $consumerTag
     */
    public function setConsumerTag($consumerTag);

    /**
     * @return string
     */
    public function getConsumerTag();

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
}
