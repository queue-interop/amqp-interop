<?php
declare(strict_types=1);

namespace Interop\Amqp;

use Interop\Queue\PsrContext;

/**
 * @method AmqpQueue createQueue($queueName)
 * @method AmqpQueue createTemporaryQueue()
 * @method AmqpProducer createProducer
 * @method AmqpConsumer createConsumer(AmqpDestination $destination)
 * @method AmqpTopic createTopic($topicName)
 * @method AmqpMessage createMessage($body = '', array $properties = [], array $headers = [])
 */
interface AmqpContext extends PsrContext
{
    /**
     * @param AmqpTopic $topic
     */
    public function declareTopic(AmqpTopic $topic): void;

    /**
     * @param AmqpTopic $topic
     */
    public function deleteTopic(AmqpTopic $topic): void;

    /**
     * @param AmqpQueue $queue
     *
     * @return int
     */
    public function declareQueue(AmqpQueue $queue): int;

    /**
     * @param AmqpQueue $queue
     */
    public function deleteQueue(AmqpQueue $queue): void;

    /**
     * @param AmqpQueue $queue
     */
    public function purgeQueue(AmqpQueue $queue): void;

    /**
     * @param AmqpBind $bind
     */
    public function bind(AmqpBind $bind): void;

    /**
     * @param AmqpBind $bind
     */
    public function unbind(AmqpBind $bind): void;

    /**
     * @param int  $prefetchSize
     * @param int  $prefetchCount
     * @param bool $global
     */
    public function setQos(int $prefetchSize, int $prefetchCount, bool $global): void;

    /**
     * Notify broker that the channel is interested in consuming messages from this queue.
     *
     * A callback function to which the consumed message will be passed.
     * The function must accept at a minimum one parameter, an \Interop\Amqp\AmqpMessage object,
     * and an optional second parameter the \Interop\Amqp\AmqpConsumer from which the message was
     * consumed. The \Interop\Amqp\AmqpContext::basicConsume() will not return the processing thread back to
     * the PHP script until the callback function returns FALSE.
     *
     * @param AmqpConsumer $consumer
     * @param callable     $callback
     *
     * @return void
     */
    public function subscribe(AmqpConsumer $consumer, callable $callback): void;

    /**
     * @param AmqpConsumer $consumer
     *
     * @return void
     */
    public function unsubscribe(AmqpConsumer $consumer): void;

    /**
     * @param int $timeout milliseconds, consumes endlessly if zero set
     *
     * @return void
     */
    public function consume(int $timeout = 0): void;
}
