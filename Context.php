<?php

namespace Interop\Amqp;

use Interop\Queue\PsrContext;

interface Context extends PsrContext
{
    /**
     * @param Exchange $exchange
     * @param bool     $noWait
     */
    public function declareExchange(Exchange $exchange, $noWait = false);

    /**
     * @param Exchange $exchange
     * @param bool     $ifUnused
     * @param bool     $noWait
     */
    public function deleteExchange(Exchange $exchange, $ifUnused = false, $noWait = false);

    /**
     * @param Queue $queue
     * @param bool  $noWait
     */
    public function declareQueue(Queue $queue, $noWait = false);

    /**
     * @param Queue $queue
     * @param bool  $ifUnused
     * @param bool  $ifEmpty
     * @param bool  $noWait
     */
    public function deleteQueue(Queue $queue, $ifUnused = false, $ifEmpty = false, $noWait = false);

    /**
     * @param Queue $queue
     * @param bool  $noWait
     */
    public function purgeQueue(Queue $queue, $noWait = false);

    /**
     * @param Destination $source
     * @param Destination $target
     * @param bool        $noWait
     */
    public function bind(Destination $source, Destination $target, $noWait = false);

    /**
     * @param Destination $source
     * @param Destination $target
     * @param bool        $noWait
     */
    public function unbind(Destination $source, Destination $target, $noWait = false);
}
