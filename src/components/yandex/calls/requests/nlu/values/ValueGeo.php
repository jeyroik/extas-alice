<?php
namespace extas\components\yandex\calls\requests\nlu\values;

use extas\components\yandex\calls\requests\nlu\NLUValue;
use extas\interfaces\yandex\calls\requests\nlu\values\IValueGeo;

/**
 * Class ValueGeo
 *
 * @package extas\components\yandex\calls\requests\nlu\values
 * @author jeyroik@gmail.com
 */
class ValueGeo extends NLUValue implements IValueGeo
{
    /**
     * @return string
     */
    public function getAirport(): string
    {
        return $this->config[static::FIELD__AIRPORT] ?? '';
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->config[static::FIELD__COUNTRY] ?? '';
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->config[static::FIELD__CITY] ?? '';
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->config[static::FIELD__STREET] ?? '';
    }

    /**
     * @return string
     */
    public function getHouseNumber(): string
    {
        return $this->config[static::FIELD__HOUSE_NUMBER] ?? '';
    }

    /**
     * @return string
     */
    public function getFlat(): string
    {
        return $this->config[static::FIELD__FLAT] ?? '';
    }

    /**
     * @return string
     */
    public function getLongitude(): string
    {
        return $this->config[static::FIELD__LONGITUDE] ?? '';
    }

    /**
     * @return string
     */
    public function getLatitude(): string
    {
        return $this->config[static::FIELD__LATITUDE] ?? '';
    }

    /**
     * @param string $airport
     *
     * @return $this
     */
    public function setAirport(string $airport)
    {
        $this->config[static::FIELD__AIRPORT] = $airport;

        return $this;
    }

    /**
     * @param string $country
     *
     * @return $this
     */
    public function setCountry(string $country)
    {
        $this->config[static::FIELD__COUNTRY] = $country;

        return $this;
    }

    /**
     * @param string $city
     *
     * @return $this
     */
    public function setCity(string $city)
    {
        $this->config[static::FIELD__CITY] = $city;

        return $this;
    }

    /**
     * @param string $street
     *
     * @return $this
     */
    public function setStreet(string $street)
    {
        $this->config[static::FIELD__STREET] = $street;

        return $this;
    }

    /**
     * @param string $houseNumber
     *
     * @return $this
     */
    public function setHouseNumber(string $houseNumber)
    {
        $this->config[static::FIELD__HOUSE_NUMBER] = $houseNumber;

        return $this;
    }

    /**
     * @param string $flat
     *
     * @return $this
     */
    public function setFlat(string $flat)
    {
        $this->config[static::FIELD__FLAT] = $flat;

        return $this;
    }

    /**
     * @param string $longitude
     *
     * @return $this
     */
    public function setLongitude(string $longitude)
    {
        $this->config[static::FIELD__LONGITUDE] = $longitude;

        return $this;
    }

    /**
     * @param string $latitude
     *
     * @return $this
     */
    public function setLatitude(string $latitude)
    {
        $this->config[static::FIELD__LATITUDE] = $latitude;

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
