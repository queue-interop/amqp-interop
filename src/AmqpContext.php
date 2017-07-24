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
     *
     * @return int
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
     * @param AmqpBind $bind
     */
    public function bind(AmqpBind $bind);

    /**
     * @param AmqpBind $bind
     */
    public function unbind(AmqpBind $bind);
}
