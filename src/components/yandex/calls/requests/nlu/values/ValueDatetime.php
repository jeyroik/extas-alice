<?php
namespace extas\components\yandex\calls\requests\nlu\values;

use extas\components\yandex\calls\requests\nlu\NLUValue;
use extas\interfaces\yandex\calls\requests\nlu\values\IValueDatetime;

/**
 * Class ValueDatetime
 *
 * @package extas\components\yandex\calls\requests\nlu\values
 * @author jeyroik@gmail.com
 */
class ValueDatetime extends NLUValue implements IValueDatetime
{
    /**
     * @return int
     */
    public function getMinute(): int
    {
        return $this->config[static::FIELD__MINUTE] ?? 0;
    }

    /**
     * @return bool
     */
    public function isMinuteRelative(): bool
    {
        return $this->config[static::FIELD__MINUTE_IS_RELATIVE] ?? false;
    }

    /**
     * @return int
     */
    public function getHour(): int
    {
        return $this->config[static::FIELD__HOUR] ?? 0;
    }

    /**
     * @return bool
     */
    public function isHourRelative(): bool
    {
        return $this->config[static::FIELD__HOUR_IS_RELATIVE] ?? false;
    }

    /**
     * @return int
     */
    public function getDay(): int
    {
        return $this->config[static::FIELD__DAY] ?? 0;
    }

    /**
     * @return bool
     */
    public function isDayRelative(): bool
    {
        return $this->config[static::FIELD__DAY_IS_RELATIVE] ?? false;
    }

    /**
     * @return int
     */
    public function getMonth(): int
    {
        return $this->config[static::FIELD__MONTH] ?? '';
    }

    /**
     * @return bool
     */
    public function isMonthRelative(): bool
    {
        return $this->config[static::FIELD__MONTH_IS_RELATIVE] ?? false;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->config[static::FIELD__YEAR] ?? '';
    }

    /**
     * @return bool
     */
    public function isYearRelative(): bool
    {
        return $this->config[static::FIELD__YEAR_IS_RELATIVE] ?? false;
    }

    /**
     * @return string
     */
    public function getFullDatetime(): string
    {
        $fullDatetime = '';

        $datetime = [
            'i' => 'getMinute',
            'h' => 'getHour',
            'd' => 'getDay',
            'm' => 'getMonth',
            'y' => 'getYear'
        ];

        foreach ($datetime as $suffix => $method) {
            $value = $this->$method();
            if ($value) {
                $fullDatetime .= $value . $suffix . ' ';
            }
        }

        return trim($fullDatetime);
    }

    /**
     * @param int $minute
     *
     * @return $this
     */
    public function setMinute(int $minute)
    {
        $this->config[static::FIELD__MINUTE] = $minute;

        return $this;
    }

    /**
     * @param bool $isMinuteRelative
     *
     * @return $this
     */
    public function setIsMinuteRelative(bool $isMinuteRelative)
    {
        $this->config[static::FIELD__MINUTE_IS_RELATIVE] = $isMinuteRelative;

        return $this;
    }

    /**
     * @param int $hour
     *
     * @return $this
     */
    public function setHour(int $hour)
    {
        $this->config[static::FIELD__HOUR] = $hour;

        return $this;
    }

    /**
     * @param bool $isHourRelative
     *
     * @return $this
     */
    public function setIsHourRelative(bool $isHourRelative)
    {
        $this->config[static::FIELD__HOUR_IS_RELATIVE] = $isHourRelative;

        return $this;
    }

    /**
     * @param int $day
     *
     * @return $this
     */
    public function setDay(int $day)
    {
        $this->config[static::FIELD__DAY] = $day;

        return $this;
    }

    /**
     * @param bool $isDayRelative
     *
     * @return $this
     */
    public function setIsDayRelative(bool $isDayRelative)
    {
        $this->config[static::FIELD__DAY_IS_RELATIVE] = $isDayRelative;

        return $this;
    }

    /**
     * @param int $month
     *
     * @return $this
     */
    public function setMonth(int $month)
    {
        $this->config[static::FIELD__MONTH] = $month;

        return $this;
    }

    /**
     * @param bool $isMonthRelative
     *
     * @return $this
     */
    public function setIsMonthRelative(bool $isMonthRelative)
    {
        $this->config[static::FIELD__MONTH_IS_RELATIVE] = $isMonthRelative;

        return $this;
    }

    /**
     * @param int $year
     *
     * @return $this
     */
    public function setYear(int $year)
    {
        $this->config[static::FIELD__YEAR] = $year;

        return $this;
    }

    /**
     * @param bool $isYearRelative
     *
     * @return $this
     */
    public function setIsYearRelative(bool $isYearRelative)
    {
        $this->config[static::FIELD__YEAR_IS_RELATIVE] = $isYearRelative;

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
