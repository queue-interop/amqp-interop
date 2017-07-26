<?php

namespace Interop\Amqp\Tests;

use Interop\Amqp\AmqpMessage as InteropAmqpMessage;
use Interop\Amqp\Impl\AmqpMessage;
use Interop\Queue\PsrMessage;
use PHPUnit\Framework\TestCase;

class AmqpMessageTest extends TestCase
{
    public function testShouldImplementPsrQueueInterface()
    {
        $this->assertInstanceOf(PsrMessage::class, new AmqpMessage());
    }

    public function testShouldImplementAmqpQueueInterface()
    {
        $this->assertInstanceOf(InteropAmqpMessage::class, new AmqpMessage());
    }

    public function testShouldSetNoParamFlagInConstructor()
    {
        $message = new AmqpMessage();

        $this->assertSame(AmqpMessage::FLAG_NOPARAM, $message->getFlags());
    }

    public function testShouldReturnPreviouslySetContentType()
    {
        $message = new AmqpMessage();

        $message->setContentType('theContentType');

        $this->assertSame('theContentType', $message->getContentType());
        $this->assertSame(['content_type' => 'theContentType'], $message->getHeaders());
    }

    public function testShouldReturnPreviouslySetContentEncoding()
    {
        $message = new AmqpMessage();

        $message->setContentEncoding('theContentEncoding');

        $this->assertSame('theContentEncoding', $message->getContentEncoding());
        $this->assertSame(['content_encoding' => 'theContentEncoding'], $message->getHeaders());
    }

    public function testShouldReturnPreviouslySetDeliveryMode()
    {
        $message = new AmqpMessage();

        $message->setDeliveryMode('theDeliveryMode');

        $this->assertSame('theDeliveryMode', $message->getDeliveryMode());
        $this->assertSame(['delivery_mode' => 'theDeliveryMode'], $message->getHeaders());
    }

    public function testShouldReturnPreviouslySetExpiration()
    {
        $message = new AmqpMessage();

        $message->setExpiration('theExpiration');

        $this->assertSame('theExpiration', $message->getExpiration());
        $this->assertSame(['expiration' => 'theExpiration'], $message->getHeaders());
    }

    public function testShouldReturnPreviouslySetPriority()
    {
        $message = new AmqpMessage();

        $message->setPriority('thePriority');

        $this->assertSame('thePriority', $message->getPriority());
        $this->assertSame(['priority' => 'thePriority'], $message->getHeaders());
    }

    public function testShouldReturnPreviouslySetDeliveryTag()
    {
        $message = new AmqpMessage();

        $message->setDeliveryTag('theDeliveryTag');

        $this->assertSame('theDeliveryTag', $message->getDeliveryTag());
    }

    public function testShouldReturnPreviouslySetConsumerTag()
    {
        $message = new AmqpMessage();

        $message->setConsumerTag('theConsumerTag');

        $this->assertSame('theConsumerTag', $message->getConsumerTag());
    }

    public function testShouldAllowSetFlags()
    {
        $message = new AmqpMessage();

        $message->setFlags(12345);

        $this->assertSame(12345, $message->getFlags());
    }

    public function testShouldAllowAddFlags()
    {
        $message = new AmqpMessage();

        $message->addFlag(AmqpMessage::FLAG_MANDATORY);
        $message->addFlag(AmqpMessage::FLAG_IMMEDIATE);

        $this->assertSame(AmqpMessage::FLAG_IMMEDIATE | AmqpMessage::FLAG_MANDATORY, $message->getFlags());
    }

    public function testShouldClearPreviouslySetFlags()
    {
        $message = new AmqpMessage();

        $message->addFlag(AmqpMessage::FLAG_MANDATORY);
        $message->addFlag(AmqpMessage::FLAG_IMMEDIATE);

        //guard
        $this->assertSame(AmqpMessage::FLAG_IMMEDIATE | AmqpMessage::FLAG_MANDATORY, $message->getFlags());

        $message->clearFlags();

        $this->assertSame(AMQP_NOPARAM, $message->getFlags());
    }

    public function testShouldReturnPreviouslySetRoutingKey()
    {
        $message = new AmqpMessage();

        $message->setRoutingKey('theRoutingKey');

        $this->assertSame('theRoutingKey', $message->getRoutingKey());
    }
}
