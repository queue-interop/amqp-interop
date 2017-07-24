<?php

namespace Interop\Amqp;

use Interop\Queue\PsrContext;

/**
 * @method AmqpQueue createQueue($queueName)
 * @method AmqpQueue createTemporaryQueue()
 * @method AmqpProducer createProducer
 * @method AmqpConsumer createConsumer(AmqpDestination $destination)
 * @method AmqpExchange createTopic($topicName)
 * @method AmqpMessage createMessage($body = '', array $properties = [], array $headers = [])
 */
interface AmqpContext extends PsrContext
{
    /**
     * @param AmqpExchange $exchange
     */
    public function declareExchange(AmqpExchange $exchange);

    /**
     * @param AmqpExchange $exchange
     */
    public function deleteExchange(AmqpExchange $exchange);

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
