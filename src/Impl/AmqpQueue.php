<?php
declare(strict_types=1);

namespace Interop\Amqp\Impl;

use Interop\Amqp\AmqpQueue as InteropAmqpQueue;

final class AmqpQueue implements InteropAmqpQueue
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $flags;

    /**
     * @var array
     */
    private $arguments;

    /**
     * @var string
     */
    private $consumerTag;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;

        $this->arguments = [];
        $this->flags = self::FLAG_NOPARAM;
    }

    /**
     * {@inheritdoc}
     */
    public function getQueueName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getConsumerTag(): ?string
    {
        return $this->consumerTag;
    }

    /**
     * @param string $consumerTag
     */
    public function setConsumerTag(string $consumerTag = null): void
    {
        $this->consumerTag = $consumerTag;
    }

    /**
     * @param int $flag
     */
    public function addFlag(int $flag): void
    {
        $this->flags |= $flag;
    }

    public function clearFlags(): void
    {
        $this->flags = self::FLAG_NOPARAM;
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
     * @return array
     */
    public function getArguments(): array
    {
        return $this->arguments;
    }

    /**
     * @param array $arguments
     */
    public function setArguments(array $arguments): void
    {
        $this->arguments = $arguments;
    }

    /**
     * {@inheritdoc}
     */
    public function setArgument(string $key, $value): void
    {
        $this->arguments[$key] = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function getArgument(string $key, $default = null)
    {
        return array_key_exists($key, $this->arguments) ? $this->arguments[$key] : $default;
    }
}
