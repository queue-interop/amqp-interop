<?php

namespace Interop\Amqp\Impl;

use Interop\Amqp\AmqpBind as InteropAmqpBind;
use Interop\Amqp\AmqpDestination;

final class AmqpBind implements InteropAmqpBind
{
    /**
     * @var AmqpDestination
     */
    private $target;

    /**
     * @var AmqpDestination
     */
    private $source;

    /**
     * @var null
     */
    private $routingKey;

    /**
     * @var int
     */
    private $flags;

    /**
     * @var array
     */
    private $arguments;

    /**
     * @param AmqpDestination $target
     * @param AmqpDestination $source
     * @param string|null     $routingKey
     * @param int             $flags
     * @param array           $arguments
     */
    public function __construct(AmqpDestination $target, AmqpDestination $source, $routingKey = null, $flags = self::FLAG_NOPARAM, $arguments = [])
    {
        $this->target = $target;
        $this->source = $source;
        $this->routingKey = $routingKey;
        $this->flags = $flags;
        $this->arguments = $arguments;
    }

    /**
     * {@inheritdoc}
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * {@inheritdoc}
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * {@inheritdoc}
     */
    public function getRoutingKey()
    {
        return $this->routingKey;
    }

    /**
     * {@inheritdoc}
     */
    public function getFlags()
    {
        return $this->flags;
    }

    /**
     * {@inheritdoc}
     */
    public function getArguments()
    {
        return $this->arguments;
    }
}
