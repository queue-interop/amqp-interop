<?php

namespace Interop\Amqp;

interface AmqpBind
{
    const FLAG_NOPARAM = 0;
    const FLAG_NOWAIT = 1;

    /**
     * @return AmqpTopic|AmqpQueue
     */
    public function getTarget();

    /**
     * @return AmqpTopic|AmqpQueue
     */
    public function getSource();

    /**
     * @return string
     */
    public function getRoutingKey();

    /**
     * @return int
     */
    public function getFlags();

    /**
     * @return array
     */
    public function getArguments();
}
