<?php
namespace Avaliacao\Lib\Enum;

use Psr\Log\InvalidArgumentException;

/**
 * Class AbstractEnum
 * @package Avaliacao\Lib\Enum
 */
abstract class AbstractEnum
{

    /**
     * AbstractEnum constructor.
     * @param $value
     */
    final public function __construct($value)
    {
        $c = new \ReflectionClass($this);
        if (!in_array($value, $c->getConstants())) {
            throw InvalidArgumentException();
        }
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    final public function __toString()
    {
        return $this->value;
    }
}
