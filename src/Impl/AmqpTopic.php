<?php

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
    public function __construct($name)
    {
        $this->name = $name;

        $this->type = self::TYPE_DIRECT;
        $this->flags = self::FLAG_NOPARAM;
        $this->arguments = [];
    }

    /**
     * {@inheritdoc}
     */
    public function getTopicName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @param int $flag
     */
    public function addFlag($flag)
    {
        $this->flags |= $flag;
    }

    public function clearFlags()
    {
        $this->flags = self::FLAG_NOPARAM;
    }

    /**
     * {@inheritdoc}
     */
    public function setFlags($flags)
    {
        $this->flags = $flags;
    }

    /**
     * @return int
     */
    public function getFlags()
    {
        return $this->flags;
    }

    /**
     * @return array
     */
    public function getArguments()
    {
        return $this->arguments;
    }

    /**
     * @param array $arguments
     */
    public function setArguments(array $arguments)
    {
        $this->arguments = $arguments;
    }

    /**
     * {@inheritdoc}
     */
    public function setArgument($key, $value)
    {
        $this->arguments[$key] = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function getArgument($key, $default = null)
    {
        return array_key_exists($key, $this->arguments) ? $this->arguments[$key] : $default;
    }
}
