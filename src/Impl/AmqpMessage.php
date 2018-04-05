<?php
declare(strict_types=1);

namespace Interop\Amqp\Impl;

use Interop\Amqp\AmqpMessage as InteropAmqpMessage;

final class AmqpMessage implements InteropAmqpMessage
{
    /**
     * @var string
     */
    private $body;

    /**
     * @var array
     */
    private $properties;

    /**
     * @var array
     */
    private $headers;

    /**
     * @var string|null
     */
    private $deliveryTag;

    /**
     * @var string|null
     */
    private $consumerTag;

    /**
     * @var bool
     */
    private $redelivered;

    /**
     * @var int
     */
    private $flags;

    /**
     * @var string
     */
    private $routingKey;

    /**
     * @param string $body
     * @param array  $properties
     * @param array  $headers
     */
    public function __construct(string $body = '', array $properties = [], array $headers = [])
    {
        $this->body = $body;
        $this->properties = $properties;
        $this->headers = $headers;

        $this->redelivered = false;
        $this->flags = self::FLAG_NOPARAM;
    }

    /**
     * {@inheritdoc}
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * {@inheritdoc}
     */
    public function setBody(string $body): void
    {
        $this->body = $body;
    }

    /**
     * {@inheritdoc}
     */
    public function setProperties(array $properties): void
    {
        $this->properties = $properties;
    }

    /**
     * {@inheritdoc}
     */
    public function getProperties(): array
    {
        return $this->properties;
    }

    /**
     * {@inheritdoc}
     */
    public function setProperty(string $name, $value): void
    {
        $this->properties[$name] = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function getProperty(string $name, $default = null)
    {
        return array_key_exists($name, $this->properties) ? $this->properties[$name] : $default;
    }

    /**
     * {@inheritdoc}
     */
    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }

    /**
     * {@inheritdoc}
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * {@inheritdoc}
     */
    public function setHeader(string $name, $value): void
    {
        $this->headers[$name] = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function getHeader(string $name, $default = null)
    {
        return array_key_exists($name, $this->headers) ? $this->headers[$name] : $default;
    }

    /**
     * {@inheritdoc}
     */
    public function setRedelivered(bool $redelivered): void
    {
        $this->redelivered = (bool) $redelivered;
    }

    /**
     * {@inheritdoc}
     */
    public function isRedelivered(): bool
    {
        return $this->redelivered;
    }

    /**
     * {@inheritdoc}
     */
    public function setCorrelationId(string $correlationId = null): void
    {
        $this->setHeader('correlation_id', $correlationId);
    }

    /**
     * {@inheritdoc}
     */
    public function getCorrelationId(): ?string
    {
        return $this->getHeader('correlation_id');
    }

    /**
     * {@inheritdoc}
     */
    public function setMessageId(string $messageId): void
    {
        $this->setHeader('message_id', $messageId);
    }

    /**
     * {@inheritdoc}
     */
    public function getMessageId(): ?string
    {
        return $this->getHeader('message_id');
    }

    /**
     * {@inheritdoc}
     */
    public function getTimestamp(): ?int
    {
        $value = $this->getHeader('timestamp');

        return $value === null ? null : (int) $value;
    }

    /**
     * {@inheritdoc}
     */
    public function setTimestamp(int $timestamp = null): void
    {
        $this->setHeader('timestamp', $timestamp);
    }

    /**
     * {@inheritdoc}
     */
    public function setReplyTo(string $replyTo = null): void
    {
        $this->setHeader('reply_to', $replyTo);
    }

    /**
     * {@inheritdoc}
     */
    public function getReplyTo(): ?string
    {
        return $this->getHeader('reply_to');
    }

    /**
     * {@inheritdoc}
     */
    public function setContentType(string $type = null): void
    {
        $this->setHeader('content_type', $type);
    }

    /**
     * {@inheritdoc}
     */
    public function getContentType(): ?string
    {
        return $this->getHeader('content_type');
    }

    /**
     * {@inheritdoc}
     */
    public function setContentEncoding(string $encoding = null): void
    {
        $this->setHeader('content_encoding', $encoding);
    }

    /**
     * {@inheritdoc}
     */
    public function getContentEncoding(): ?string
    {
        return $this->getHeader('content_encoding');
    }

    /**
     * {@inheritdoc}
     */
    public function getPriority(): ?int
    {
        return $this->getHeader('priority');
    }

    /**
     * {@inheritdoc}
     */
    public function setPriority(int $priority = null): void
    {
        $this->setHeader('priority', $priority);
    }

    /**
     * {@inheritdoc}
     */
    public function setDeliveryMode(int $deliveryMode = null): void
    {
        $this->setHeader('delivery_mode', $deliveryMode);
    }

    /**
     * {@inheritdoc}
     */
    public function getDeliveryMode(): ?int
    {
        return $this->getHeader('delivery_mode');
    }

    /**
     * {@inheritdoc}
     */
    public function setExpiration(int $expiration = null): void
    {
        $this->setHeader('expiration', $expiration);
    }

    /**
     * {@inheritdoc}
     */
    public function getExpiration(): ?int
    {
        return $this->getHeader('expiration');
    }

    /**
     * @return null|string
     */
    public function getDeliveryTag(): ?string
    {
        return $this->deliveryTag;
    }

    /**
     * @param null|string $deliveryTag
     */
    public function setDeliveryTag(string $deliveryTag = null): void
    {
        $this->deliveryTag = $deliveryTag;
    }

    /**
     * @return string|null
     */
    public function getConsumerTag(): ?string
    {
        return $this->consumerTag;
    }

    /**
     * @param string|null $consumerTag
     */
    public function setConsumerTag(string $consumerTag = null): void
    {
        $this->consumerTag = $consumerTag;
    }

    public function clearFlags(): void
    {
        $this->flags = self::FLAG_NOPARAM;
    }

    /**
     * @param int $flag
     */
    public function addFlag(int $flag): void
    {
        $this->flags |= $flag;
    }

    /**
     * @return int
     */
    public function getFlags(): int
    {
        return $this->flags;
    }

    /**
     * {@inheritdoc}
     */
    public function setFlags(int $flags): void
    {
        $this->flags = $flags;
    }

    /**
     * {@inheritdoc}
     */
    public function getRoutingKey(): ?string
    {
        return $this->routingKey;
    }

    /**
     * {@inheritdoc}
     */
    public function setRoutingKey(string $routingKey = null): void
    {
        $this->routingKey = $routingKey;
    }
}
