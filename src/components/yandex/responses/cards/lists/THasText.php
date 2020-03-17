<?php
namespace extas\components\yandex\responses\cards\lists;
use extas\interfaces\yandex\responses\cards\lists\IHasText;

/**
 * Trait THasText
 *
 * @property $config
 *
 * @package extas\components\yandex\responses\cards\lists
 * @author jeyroik@gmail.com
 */
trait THasText
{
    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->config[IHasText::FIELD__TEXT] ?? '';
    }

    /**
     * @param string $text
     *
     * @return $this
     */
    public function setText(string $text)
    {
        $this->config[IHasText::FIELD__TEXT] = $text;

        return $this;
    }
}
