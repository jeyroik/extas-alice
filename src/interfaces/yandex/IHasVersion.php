<?php
namespace extas\interfaces\yandex;

/**
 * Interface IHasVersion
 *
 * @package extas\interfaces\yandex
 * @author jeyroik@gmail.com
 */
interface IHasVersion
{
    public const FIELD__VERSION = 'version';

    /**
     * @return string
     */
    public function getVersion(): string;

    /**
     * @param string $version
     *
     * @return $this
     */
    public function setVersion(string $version);
}
