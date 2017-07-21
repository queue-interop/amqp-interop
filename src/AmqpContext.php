<?php

namespace Interop\Amqp;

use Interop\Queue\PsrContext;

interface AmqpContext extends PsrContext
{
    /**
     * @param AmqpExchange $exchange
     * @param bool     $noWait
     */
    public function declareExchange(AmqpExchange $exchange, $noWait = false);

    /**
     * @param AmqpExchange $exchange
     * @param bool     $ifUnused
     * @param bool     $noWait
     */
    public function deleteExchange(AmqpExchange $exchange, $ifUnused = false, $noWait = false);

    /**
     * @param AmqpQueue $queue
     * @param bool  $noWait
     */
    public function declareQueue(AmqpQueue $queue, $noWait = false);

    /**
     * @param AmqpQueue $queue
     * @param bool  $ifUnused
     * @param bool  $ifEmpty
     * @param bool  $noWait
     */
    public function deleteQueue(AmqpQueue $queue, $ifUnused = false, $ifEmpty = false, $noWait = false);

    /**
     * @param AmqpQueue $queue
     * @param bool  $noWait
     */
    public function purgeQueue(AmqpQueue $queue, $noWait = false);

    /**
     * @param AmqpDestination $source
     * @param AmqpDestination $target
     * @param bool        $noWait
     */
    public function bind(AmqpDestination $source, AmqpDestination $target, $noWait = false);

    /**
     * @param AmqpDestination $source
     * @param AmqpDestination $target
     * @param bool        $noWait
     */
    public function unbind(AmqpDestination $source, AmqpDestination $target, $noWait = false);
}
