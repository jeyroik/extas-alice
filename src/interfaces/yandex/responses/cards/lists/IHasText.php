<?php
namespace extas\interfaces\yandex\responses\cards\lists;

/**
 * Interface IHasText
 *
 * @package extas\interfaces\yandex\responses\cards\lists
 * @author jeyroik@gmail.com
 */
interface IHasText
{
    public const FIELD__TEXT = 'text';

    /**
     * @return string
     */
    public function getText(): string;

    /**
     * @param string $text
     *
     * @return $this
     */
    public function setText(string $text);
}
