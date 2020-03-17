<?php
namespace extas\components\yandex\responses\buttons;

use extas\interfaces\yandex\responses\buttons\IButton;
use extas\interfaces\yandex\responses\buttons\IHasButton;

/**
 * Trait THasButton
 *
 * @property $buttonClass
 * @property $config
 *
 * @package extas\components\yandex\responses\buttons
 * @author jeyroik@gmail.com
 */
trait THasButton
{
    /**
     * @return IButton
     */
    public function getButton(): IButton
    {
        $button = $this->config[IHasButton::FIELD__BUTTON] ?? [];
        $buttonClass = $this->buttonClass;

        return new $buttonClass($button);
    }

    /**
     * @param IButton $button
     *
     * @return $this
     */
    public function setButton(IButton $button)
    {
        $this->config[IHasButton::FIELD__BUTTON] = $button->__toArray();

        return $this;
    }
}
