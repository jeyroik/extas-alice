<?php
namespace extas\components\yandex\calls\metas;

use extas\components\Item;
use extas\interfaces\yandex\calls\metas\IMeta;
use extas\interfaces\yandex\calls\metas\IMetaInterface;

/**
 * Class Meta
 *
 * @package extas\components\yandex\calls\metas
 * @author jeyroik@gmail.com
 */
class Meta extends Item implements IMeta
{
    /**
     * @return string
     */
    public function getLocale(): string
    {
        return $this->config[static::FIELD__LOCALE] ?? '';
    }

    /**
     * @return string
     */
    public function getTimezone(): string
    {
        return $this->config[static::FIELD__TIMEZONE] ?? '';
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->config[static::FIELD__CLIENT_ID] ?? '';
    }

    /**
     * @return IMetaInterface[]
     */
    public function getInterfaces(): array
    {
        $interfacesData = $this->config[static::FIELD__INTERFACES] ?? [];
        $interfaces = [];

        foreach ($interfacesData as $interfaceName => $interfaceOptions) {
            $interfaceOptions[IMetaInterface::FIELD__NAME] = $interfaceName;
            $interfaces[] = new MetaInterface($interfaceOptions);
        }

        return $interfaces;
    }

    /**
     * @param string $interfaceName
     *
     * @return IMetaInterface
     */
    public function getInterface(string $interfaceName): IMetaInterface
    {
        $interfaces = $this->config[static::FIELD__INTERFACES] ?? [];

        $interfaceData = $interfaces[$interfaceName] ?? [];
        $interfaceData[IMetaInterface::FIELD__NAME] = $interfaceName;

        return new MetaInterface($interfaceData);
    }

    /**
     * @param string $interfaceName
     *
     * @return bool
     */
    public function hasInterface(string $interfaceName): bool
    {
        $interfaces = $this->config[static::FIELD__INTERFACES] ?? [];

        return isset($interfaces[$interfaceName]);
    }

    /**
     * @param string $locale
     *
     * @return $this
     */
    public function setLocale(string $locale)
    {
        $this->config[static::FIELD__LOCALE] = $locale;

        return $this;
    }

    /**
     * @param string $timezone
     *
     * @return $this
     */
    public function setTimezone(string $timezone)
    {
        $this->config[static::FIELD__TIMEZONE] = $timezone;

        return $this;
    }

    /**
     * @param string $clientId
     *
     * @return $this
     */
    public function setClientId(string $clientId)
    {
        $this->config[static::FIELD__CLIENT_ID] = $clientId;

        return $this;
    }

    /**
     * @param array $interfaces
     *
     * @return $this
     */
    public function setInterfaces(array $interfaces)
    {
        $interfacesData = [];

        foreach ($interfaces as $interface) {
            $interfacesData[] = $interface instanceof IMetaInterface
                ? $interface->__toArray()
                : $interface;
        }

        $this->config[static::FIELD__INTERFACES] = $interfacesData;

        return $this;
    }

    /**
     * @param IMetaInterface $interface
     *
     * @return $this
     */
    public function addInterface(IMetaInterface $interface)
    {
        $interfaces = $this->getInterfaces();
        $interfaces[] = $interface->__toArray();
        $this->setInterfaces($interfaces);

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
