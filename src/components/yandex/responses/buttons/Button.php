<?php
namespace extas\components\yandex\responses\buttons;

use extas\components\Item;
use extas\components\THasName;
use extas\components\yandex\calls\requests\RequestPayload;
use extas\interfaces\yandex\calls\requests\IRequestPayload;
use extas\interfaces\yandex\responses\buttons\IButton;

/**
 * Class Button
 *
 * @package extas\components\yandex\responses\buttons
 * @author jeyroik@gmail.com
 */
class Button extends Item implements IButton
{
    use THasName;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->config[static::FIELD__TITLE] ?? '';
    }

    /**
     * @return RequestPayload
     */
    public function getPayload()
    {
        $payload = $this->config[static::FIELD__PAYLOAD] ?? [];

        return new RequestPayload($payload);
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->config[static::FIELD__URL] ?? '';
    }

    /**
     * @return bool
     */
    public function isHideAfterPressing(): bool
    {
        return $this->config[static::FIELD__IS_HIDE_AFTER_PRESSING] ?? false;
    }

    /**
     * @param string $title
     *
     * @return $this
     */
    public function setTitle(string $title)
    {
        $this->config[static::FIELD__TITLE] = $title;

        return $this;
    }

    /**
     * @param IRequestPayload $payload
     *
     * @return $this
     */
    public function setPayload(IRequestPayload $payload)
    {
        $this->config[static::FIELD__PAYLOAD] = $payload->__toArray();

        return $this;
    }

    /**
     * @param string $url
     *
     * @return $this
     */
    public function setUrl(string $url)
    {
        $this->config[static::FIELD__URL] = $url;

        return $this;
    }

    /**
     * @param bool $isHidden
     *
     * @return $this
     */
    public function setIsHideAfterPressing(bool $isHidden)
    {
        $this->config[static::FIELD__IS_HIDE_AFTER_PRESSING] = $isHidden;

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