<?php
namespace extas\components\yandex\calls\requests\nlu\values;

use extas\components\yandex\calls\requests\nlu\NLUValue;
use extas\interfaces\yandex\calls\requests\nlu\values\IValueNumber;

/**
 * Class ValueNumber
 *
 * @package extas\components\yandex\calls\requests\nlu\values
 * @author jeyroik@gmail.com
 */
class ValueNumber extends NLUValue implements IValueNumber
{
    /**
     * ValueNumber constructor.
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        parent::__construct([static::FIELD__VALUE => array_shift($config)]);
    }

    /**
     * @return int
     */
    public function __toInt(): int
    {
        return (int) $this->getValue();
    }

    /**
     * @return float
     */
    public function __toFloat(): float
    {
        return (float) $this->getValue();
    }

    /**
     * @param string $condition
     * @param int $compareTo
     *
     * @return bool
     */
    public function is($condition, $compareTo = null): bool
    {
        $cons = [
            static::CON__EQUAL => function ($cur, $compareTo) {
                return $cur == $compareTo;
            },
            static::CON__NOT_EQUAL => function ($cur, $compareTo) {
                return $cur != $compareTo;
            },
            static::CON__GREATER => function ($cur, $compareTo) {
                return $cur > $compareTo;
            },
            static::CON__LOWER => function ($cur, $compareTo) {
                return $cur < $compareTo;
            },
            static::CON__GREATER_OR_EQUAL => function ($cur, $compareTo) {
                return $cur >= $compareTo;
            },
            static::CON__LOWER_OR_EQUAL => function ($cur, $compareTo) {
                return $cur <= $compareTo;
            },
            static::CON__IS_EMPTY => function ($cur) {
                return empty($cur);
            },
            static::CON__LIKE => function ($cur, $compareTo) {
                return strpos($cur, $compareTo) !== false;
            }
        ];

        return isset($cons[$condition])
            ? $cons[$condition]($this->getValue(), $compareTo)
            : false;
    }

    /**
     * @return int|double
     */
    protected function getValue()
    {
        return $this->config[static::FIELD__VALUE] ?? 0;
    }

    /**
     * @param $value
     *
     * @return $this
     */
    protected function setValue($value)
    {
        $this->config[static::FIELD__VALUE] = $value;

        return $this;
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}