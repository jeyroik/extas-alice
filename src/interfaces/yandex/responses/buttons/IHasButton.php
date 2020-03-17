<?php
namespace extas\interfaces\yandex\responses\buttons;

/**
 * Interface IHasButton
 *
 * @package extas\interfaces\yandex\responses\buttons
 * @author jeyroik@gmail.com
 */
interface IHasButton
{
    public const FIELD__BUTTON = 'button';

    /**
     * @return IButton
     */
    public function getButton(): IButton;

    /**
     * @param IButton $button
     *
     * @return $this
     */
    public function setButton(IButton $button);
}
