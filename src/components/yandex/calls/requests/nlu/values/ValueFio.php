<?php
namespace extas\components\yandex\calls\requests\nlu\values;

use extas\components\yandex\calls\requests\nlu\NLUValue;
use extas\interfaces\yandex\calls\requests\nlu\values\IValueFio;

/**
 * Class ValueFio
 *
 * @package extas\components\yandex\calls\requests\nlu\values
 * @author jeyroik@gmail.com
 */
class ValueFio extends NLUValue implements IValueFio
{
    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->config[static::FIELD__FIRST_NAME] ?? '';
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->config[static::FIELD__LAST_NAME] ?? '';
    }

    /**
     * @return string
     */
    public function getPatronymicName(): string
    {
        return $this->config[static::FIELD__PATRONYMIC_NAME] ?? '';
    }

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
    ): string
    {
        return trim(($this->config[$first] ?? '')
            . $delimiter
            . ($this->config[$second] ?? '')
            . $delimiter
            . ($this->config[$third] ?? ''));
    }

    /**
     * @param string $firstName
     *
     * @return $this
     */
    public function setFirstName(string $firstName)
    {
        $this->config[static::FIELD__FIRST_NAME] = $firstName;

        return $this;
    }

    /**
     * @param string $lastName
     *
     * @return $this
     */
    public function setLastName(string $lastName)
    {
        $this->config[static::FIELD__LAST_NAME] = $lastName;

        return $this;
    }

    /**
     * @param string $patronymicName
     *
     * @return $this
     */
    public function setPatronymicName(string $patronymicName)
    {
        $this->config[static::FIELD__PATRONYMIC_NAME] = $patronymicName;

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
