<?php
namespace extas\components\yandex;

use extas\interfaces\yandex\IHasVersion;

/**
 * Trait THasVersion
 *
 * @property $config
 *
 * @package extas\components\yandex
 * @author jeyroik@gmail.com
 */
trait THasVersion
{
    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->config[IHasVersion::FIELD__VERSION] ?? '';
    }

    /**
     * @param string $version
     *
     * @return $this
     */
    public function setVersion(string $version)
    {
        $this->config[IHasVersion::FIELD__VERSION] = $version;

        return $this;
    }
}
