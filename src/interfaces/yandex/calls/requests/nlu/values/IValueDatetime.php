<?php
namespace extas\interfaces\yandex\calls\requests\nlu\values;

use extas\interfaces\yandex\calls\requests\nlu\INLUValue;

/**
 * Interface IValueDatetime
 *
 * @package extas\interfaces\yandex\calls\requests\nlu\values
 * @author jeyroik@gmail.com
 */
interface IValueDatetime extends INLUValue
{
    public const SUBJECT = 'alice.call.request.nlu.value.datetime';

    public const FIELD__MINUTE = 'minute';
    public const FIELD__MINUTE_IS_RELATIVE = 'minute_is_relative';
    public const FIELD__HOUR = 'hour';
    public const FIELD__HOUR_IS_RELATIVE = 'hour_is_relative';
    public const FIELD__DAY = 'day';
    public const FIELD__DAY_IS_RELATIVE = 'day_is_relative';
    public const FIELD__MONTH = 'month';
    public const FIELD__MONTH_IS_RELATIVE = 'month_is_relative';
    public const FIELD__YEAR = 'year';
    public const FIELD__YEAR_IS_RELATIVE = 'year_is_relative';

    /**
     * @return int
     */
    public function getMinute(): int;

    /**
     * @return bool
     */
    public function isMinuteRelative(): bool;

    /**
     * @return int
     */
    public function getHour(): int;

    /**
     * @return bool
     */
    public function isHourRelative(): bool;

    /**
     * @return int
     */
    public function getDay(): int;

    /**
     * @return bool
     */
    public function isDayRelative(): bool;

    /**
     * @return int
     */
    public function getMonth(): int;

    /**
     * @return bool
     */
    public function isMonthRelative(): bool;

    /**
     * @return int
     */
    public function getYear(): int;

    /**
     * @return bool
     */
    public function isYearRelative(): bool;

    /**
     * @return string
     */
    public function getFullDatetime(): string;

    /**
     * @param int $minute
     *
     * @return $this
     */
    public function setMinute(int $minute);

    /**
     * @param bool $isMinuteRelative
     *
     * @return $this
     */
    public function setIsMinuteRelative(bool $isMinuteRelative);

    /**
     * @param int $hour
     *
     * @return $this
     */
    public function setHour(int $hour);

    /**
     * @param bool $isHourRelative
     *
     * @return $this
     */
    public function setIsHourRelative(bool $isHourRelative);
    
    /**
     * @param int $day
     *
     * @return $this
     */
    public function setDay(int $day);

    /**
     * @param bool $isDayRelative
     *
     * @return $this
     */
    public function setIsDayRelative(bool $isDayRelative);

    /**
     * @param int $month
     *
     * @return $this
     */
    public function setMonth(int $month);

    /**
     * @param bool $isMonthRelative
     *
     * @return $this
     */
    public function setIsMonthRelative(bool $isMonthRelative);

    /**
     * @param int $year
     * 
     * @return $this
     */
    public function setYear(int $year);

    /**
     * @param bool $isYearRelative
     * 
     * @return $this
     */
    public function setIsYearRelative(bool $isYearRelative);
}
