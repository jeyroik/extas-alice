<?php
namespace extas\interfaces\yandex\calls\requests\nlu;

use extas\interfaces\IItem;

/**
 * Interface INLUEntity
 *
 * @package extas\interfaces\yandex\calls\requests\nlu
 * @author jeyroik@gmail.com
 */
interface INLUEntity extends IItem
{
    public const SUBJECT = 'alice.call.request.nlu.entity';

    public const FIELD__TOKENS = 'tokens';
    public const FIELD__TOKENS_START = 'start';
    public const FIELD__TOKENS_END = 'end';
    public const FIELD__TYPE = 'type';
    public const FIELD__VALUE = 'value';
    public const FIELD__NLU = 'nlu';

    public const TYPE__GEO = 'YANDEX.GEO';
    public const TYPE__FIO = 'YANDEX.FIO';
    public const TYPE__NUMBER = 'YANDEX.NUMBER';
    public const TYPE__DATETIME = 'YANDEX.DATETIME';

    /**
     * @return string
     */
    public function getStartToken(): string;

    /**
     * @return string
     */
    public function getEndToken(): string;

    /**
     * @return string
     */
    public function getType(): string;

    /**
     * @param string $type
     *
     * @return bool
     */
    public function isType(string $type): bool;

    /**
     * @return INLUValue
     */
    public function getValue(): INLUValue;

    /**
     * @param string $token
     *
     * @return $this
     */
    public function setStartToken(string $token);

    /**
     * @param string $token
     *
     * @return $this
     */
    public function setEndToken(string $token);

    /**
     * @param string $type
     *
     * @return $this
     */
    public function setType(string $type);

    /**
     * @param INLUValue $value
     *
     * @return $this
     */
    public function setValue(INLUValue $value);
}