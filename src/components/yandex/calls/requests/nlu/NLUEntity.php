<?php
namespace extas\components\yandex\calls\requests\nlu;

use extas\components\Item;
use extas\components\yandex\calls\requests\nlu\values\ValueDatetime;
use extas\components\yandex\calls\requests\nlu\values\ValueFio;
use extas\components\yandex\calls\requests\nlu\values\ValueGeo;
use extas\components\yandex\calls\requests\nlu\values\ValueNumber;
use extas\interfaces\yandex\calls\requests\IRequestNLU;
use extas\interfaces\yandex\calls\requests\nlu\INLUEntity;
use extas\interfaces\yandex\calls\requests\nlu\INLUValue;

/**
 * Class NLUEntity
 *
 * @package extas\components\yandex\calls\requests\nlu
 * @author jeyroik@gmail.com
 */
class NLUEntity extends Item implements INLUEntity
{
    /**
     * NLUEntity constructor.
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        parent::__construct($config);

        /**
         * Заменяем в токенах их индексы на сами токены.
         *
         * @var $nlu IRequestNLU
         */
        $nlu = $this->config[static::FIELD__NLU];
        $tokens = $nlu->getTokens();

        $startIndex = $this->getStartToken();
        $endIndex = $this->getEndToken();

        $this->setStartToken($tokens[$startIndex] ?? $startIndex)
            ->setEndToken($tokens[$endIndex] ?? $endIndex);
    }

    /**
     * @return string
     */
    public function getStartToken(): string
    {
        $tokens = $this->config[static::FIELD__TOKENS] ?? [];

        return $tokens[static::FIELD__TOKENS_START] ?? '';
    }

    /**
     * @return string
     */
    public function getEndToken(): string
    {
        $tokens = $this->config[static::FIELD__TOKENS] ?? [];

        return $tokens[static::FIELD__TOKENS_END] ?? '';
    }

    public function getType(): string
    {
        return $this->config[static::FIELD__TYPE] ?? '';
    }

    /**
     * @param string $type
     *
     * @return bool
     */
    public function isType(string $type): bool
    {
        return $this->getType() == $type;
    }

    /**
     * @return INLUValue
     */
    public function getValue(): INLUValue
    {
        $value = $this->config[static::FIELD__VALUE] ?? [];
        if (!is_array($value)) {
            $value = [$value];
        }

        $typeToValue = [
            static::TYPE__DATETIME => ValueDatetime::class,
            static::TYPE__FIO => ValueFio::class,
            static::TYPE__GEO => ValueGeo::class,
            static::TYPE__NUMBER => ValueNumber::class,
            'default' => NLUValue::class
        ];

        $valueClass = isset($typeToValue[$this->getType()])
            ? $typeToValue[$this->getType()]
            : $typeToValue['default'];

        return new $valueClass($value);
    }

    /**
     * @param string $token
     *
     * @return $this
     */
    public function setStartToken(string $token)
    {
        $tokens = $this->config[static::FIELD__TOKENS] ?? [];
        $tokens[static::FIELD__TOKENS_START] = $token;
        $this->config[static::FIELD__TOKENS] = $tokens;

        return $this;
    }

    /**
     * @param string $token
     *
     * @return $this
     */
    public function setEndToken(string $token)
    {
        $tokens = $this->config[static::FIELD__TOKENS] ?? [];
        $tokens[static::FIELD__TOKENS_END] = $token;
        $this->config[static::FIELD__TOKENS] = $tokens;

        return $this;
    }

    /**
     * @param string $type
     *
     * @return $this
     */
    public function setType(string $type)
    {
        $this->config[static::FIELD__TYPE] = $type;

        return $this;
    }

    /**
     * @param INLUValue $value
     *
     * @return $this
     */
    public function setValue(INLUValue $value)
    {
        $this->config[static::FIELD__VALUE] = $value->__toArray();

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
