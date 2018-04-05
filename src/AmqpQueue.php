<?php
declare(strict_types=1);

namespace Interop\Amqp;

use Interop\Queue\PsrQueue;

interface AmqpQueue extends PsrQueue, AmqpDestination
{
    const FLAG_EXCLUSIVE = 2097152;
    const FLAG_IFEMPTY = 4194304;

    /**
     * @param int $flags
     */
    public function setFlags(int $flags): void;

    /**
     * @return int
     */
    public function getFlags(): int;

    /**
     * @param int $flag
     */
    public function addFlag(int $flag): void;

    public function clearFlags(): void;

    /**
     * @return array
     */
    public function getArguments(): array;

    /**
     * @param array $arguments
     */
    public function setArguments(array $arguments): void;

    /**
     * @param string $key
     * @param string|bool|int|float|null|array $value
     */
    public function setArgument(string $key, $value): void;

    /**
     * @param string $key
     *
     * @return string|bool|int|float
     */
    public function getArgument(string $key);

    /**
     * @return string
     */
    public function getConsumerTag(): ?string;

    /**
     * @param string $consumerTag
     */
    public function setConsumerTag(string $consumerTag = null): void;
}
