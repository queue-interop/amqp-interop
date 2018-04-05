<?php
declare(strict_types=1);

namespace Interop\Amqp;

use Interop\Queue\PsrMessage;

interface AmqpMessage extends PsrMessage
{
    const DELIVERY_MODE_NON_PERSISTENT = 1;
    const DELIVERY_MODE_PERSISTENT = 2;

    const FLAG_NOPARAM = 0;
    const FLAG_MANDATORY = 1;
    const FLAG_IMMEDIATE = 2;

    /**
     * @param string $type
     */
    public function setContentType(string $type = null): void;

    /**
     * @return string
     */
    public function getContentType(): ?string;

    /**
     * @param string $encoding
     */
    public function setContentEncoding(string $encoding = null): void;

    /**
     * @return string
     */
    public function getContentEncoding(): ?string;

    /**
     * @param int $deliveryMode
     */
    public function setDeliveryMode(int $deliveryMode = null): void;

    /**
     * @return int
     */
    public function getDeliveryMode(): ?int;

    /**
     * @param int $priority
     */
    public function setPriority(int $priority = null): void;

    /**
     * @return int
     */
    public function getPriority(): ?int;

    /**
     * @param int $expiration
     */
    public function setExpiration(int $expiration): void;

    /**
     * @return int
     */
    public function getExpiration(): ?int;

    /**
     * @param string $deliveryTag
     */
    public function setDeliveryTag(string $deliveryTag = null): void;

    /**
     * @return string
     */
    public function getDeliveryTag(): ?string;

    /**
     * @return string|null
     */
    public function getConsumerTag(): ?string;

    /**
     * @param string|null $consumerTag
     */
    public function setConsumerTag(string $consumerTag = null): void;

    public function clearFlags(): void;

    /**
     * @param int $flag
     */
    public function addFlag(int $flag): void;

    /**
     * @return int
     */
    public function getFlags(): int;

    /**
     * @param int $flags
     */
    public function setFlags(int $flags): void;

    /**
     * @return string
     */
    public function getRoutingKey(): ?string ;

    /**
     * @param string $routingKey
     */
    public function setRoutingKey(string $routingKey = null): void;
}
