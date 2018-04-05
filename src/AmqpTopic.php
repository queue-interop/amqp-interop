<?php
declare(strict_types=1);

namespace Interop\Amqp;

use Interop\Queue\PsrTopic;

interface AmqpTopic extends PsrTopic, AmqpDestination
{
    const TYPE_DIRECT = 'direct';
    const TYPE_FANOUT = 'fanout';
    const TYPE_TOPIC = 'topic';
    const TYPE_HEADERS = 'headers';

    const FLAG_INTERNAL = 2048;

    /**
     * @return string
     */
    public function getType(): string;

    /**
     * @param string $type
     */
    public function setType(string $type): void;

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
    public function setArguments(array $arguments);

    /**
     * @param string $key
     * @param string|bool|int|float $value
     */
    public function setArgument(string $key, $value): void;

    /**
     * @param string $key
     *
     * @return string|bool|int|float
     */
    public function getArgument(string $key);
}
