<?php
namespace extas\interfaces\yandex\calls\metas;

use extas\interfaces\IItem;

/**
 * Interface IMeta
 *
 * @package extas\interfaces\yandex\calls\metas
 * @author jeyroik@gmail.com
 */
interface IMeta extends IItem
{
    public const SUBJECT = 'alice.call.meta';

    public const FIELD__LOCALE = 'locale';
    public const FIELD__TIMEZONE = 'timezone';
    public const FIELD__CLIENT_ID = 'client_id';
    public const FIELD__INTERFACES = 'interfaces';

    /**
     * @return string
     */
    public function getLocale(): string;

    /**
     * @return string
     */
    public function getTimezone(): string;

    /**
     * @return string
     */
    public function getClientId(): string;

    /**
     * @return IMetaInterface[]
     */
    public function getInterfaces(): array;

    /**
     * @param string $interfaceName
     *
     * @return IMetaInterface
     */
    public function getInterface(string $interfaceName): IMetaInterface;

    /**
     * @param string $interfaceName
     *
     * @return bool
     */
    public function hasInterface(string $interfaceName): bool;

    /**
     * @param string $locale
     *
     * @return $this
     */
    public function setLocale(string $locale);

    /**
     * @param string $timezone
     *
     * @return $this
     */
    public function setTimezone(string $timezone);

    /**
     * @param string $clientId
     *
     * @return $this
     */
    public function setClientId(string $clientId);

    /**
     * @param array $interfaces
     *
     * @return $this
     */
    public function setInterfaces(array $interfaces);

    /**
     * @param IMetaInterface $interface
     *
     * @return $this
     */
    public function addInterface(IMetaInterface $interface);
}
