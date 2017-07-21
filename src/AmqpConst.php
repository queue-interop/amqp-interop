<?php

namespace Interop\Amqp;

interface AmqpConst
{
    const PASSIVE = 2;
    const DURABLE = 4;
    const AUTO_DELETE = 8;
    const INTERNAL = 16;
    const NO_WAIT = 32;
    const EXCLUSIVE = 64;
    const DELETE_IF_UNUSED = 128;
    const DELETE_IF_EMPTY = 256;

    const EXCHANGE_DIRECT = 'direct';
    const EXCHANGE_FANOUT = 'fanout';
    const EXCHANGE_TOPIC = 'topic';
    const EXCHANGE_HEADERS = 'headers';
}