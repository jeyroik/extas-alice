<?php
namespace extas\interfaces\yandex\responses\buttons;

use extas\interfaces\IHasName;
use extas\interfaces\IItem;
use extas\interfaces\yandex\calls\requests\IRequestPayload;

/**
 * Interface IButton
 * 
 * @package extas\interfaces\yandex\responses\buttons
 * @author jeyroik@gmail.com
 */
interface IButton extends IItem, IHasName
{
    public const SUBJECT = 'alice.response.button';

    public const FIELD__TITLE = 'title';
    public const FIELD__PAYLOAD = 'payload';
    public const FIELD__URL = 'url';
    public const FIELD__IS_HIDE_AFTER_PRESSING = 'hide';

    /**
     * Max 64 symbols
     *
     * @return $this
     */
    public function getTitle(): string;

    /**
     * Max 4096 bytes
     *
     * @return IRequestPayload
     */
    public function getPayload();

    /**
     * Max 1024 bytes
     *
     * @return string
     */
    public function getUrl(): string;

    /**
     * @return bool
     */
    public function isHideAfterPressing(): bool;

    /**
     * @param string $title
     * 
     * @return $this
     */
    public function setTitle(string $title);

    /**
     * @param IRequestPayload $payload
     * 
     * @return $this
     */
    public function setPayload(IRequestPayload $payload);

    /**
     * @param string $url
     * 
     * @return $this
     */
    public function setUrl(string $url);

    /**
     * @param bool $isHidden
     * 
     * @return $this
     */
    public function setIsHideAfterPressing(bool $isHidden);
}
