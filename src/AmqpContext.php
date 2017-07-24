<?php

namespace Interop\Amqp;

use Interop\Queue\PsrContext;

interface AmqpContext extends PsrContext
{
    /**
     * @param AmqpTopic $topic
     */
    public function declareTopic(AmqpTopic $topic);

    /**
     * @param AmqpTopic $topic
     */
    public function deleteTopic(AmqpTopic $topic);

    /**
     * @param AmqpQueue $queue
     */
    public function declareQueue(AmqpQueue $queue);

    /**
     * @param AmqpQueue $queue
     */
    public function deleteQueue(AmqpQueue $queue);

    /**
     * @param AmqpQueue $queue
     */
    public function purgeQueue(AmqpQueue $queue);

    /**
     * @param AmqpDestination $source
     * @param AmqpDestination $target
     */
    public function bind(AmqpDestination $source, AmqpDestination $target);

    /**
     * @param AmqpDestination $source
     * @param AmqpDestination $target
     */
    public function unbind(AmqpDestination $source, AmqpDestination $target);
}
