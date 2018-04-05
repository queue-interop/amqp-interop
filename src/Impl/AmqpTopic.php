<?php
declare(strict_types=1);

namespace Interop\Amqp\Impl;

use Interop\Amqp\AmqpTopic as InteropAmqpTopic;

final class AmqpTopic implements InteropAmqpTopic
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $type;

    /**
     * @var int
     */
    private $flags;

    /**
     * @var array
     */
    private $arguments;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;

        $this->type = self::TYPE_DIRECT;
        $this->flags = self::FLAG_NOPARAM;
        $this->arguments = [];
    }

    /**
     * {@inheritdoc}
     */
    public function getTopicName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
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
     * {@inheritdoc}
     */
    public function setFlags(int $flags): void
    {
        $this->flags = $flags;
    }

    /**
     * @return int
     */
    public function getFlags(): int
    {
        return $this->flags;
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
