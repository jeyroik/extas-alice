<?php
namespace extas\interfaces\yandex\calls\requests\nlu\values;

use extas\interfaces\yandex\calls\requests\nlu\INLUValue;

/**
 * Interface IValueFio
 *
 * @package extas\interfaces\yandex\calls\requests\nlu\values
 * @author jeyroik@gmail.com
 */
interface IValueFio extends INLUValue
{
    public const SUBJECT = 'alice.call.request.nlu.value.fio';

    public const FIELD__FIRST_NAME = 'first_name';
    public const FIELD__LAST_NAME = 'last_name';
    public const FIELD__PATRONYMIC_NAME = 'patronymic_name';

    /**
     * @return string
     */
    public function getFirstName(): string;

    /**
     * @return string
     */
    public function getLastName(): string;

    /**
     * @return string
     */
    public function getPatronymicName(): string;

    /**
     * @param string $firstName
     *
     * @return $this
     */
    public function setFirstName(string $firstName);

    /**
     * @param string $lastName
     *
     * @return $this
     */
    public function setLastName(string $lastName);

    /**
     * @param string $patronymicName
     *
     * @return $this
     */
    public function setPatronymicName(string $patronymicName);

    /**
     * @param string $first
     * @param string $second
     * @param string $third
     * @param string $delimiter
     *
     * @return string
     */
    public function getCombined(
        string $first,
        string $second,
        string $third,
        string $delimiter = ''
    ): string;
}
