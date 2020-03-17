<?php
namespace extas\components\yandex\calls\requests;

use extas\components\Item;
use extas\interfaces\yandex\calls\requests\IRequest;
use extas\interfaces\yandex\calls\requests\IRequestMarkup;
use extas\interfaces\yandex\calls\requests\IRequestNLU;
use extas\interfaces\yandex\calls\requests\IRequestPayload;

/**
 * Class Request
 *
 * @package extas\components\yandex\calls\requests
 * @author jeyroik@gmail.com
 */
class Request extends Item implements IRequest
{
    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->config[static::FIELD__TYPE] ?? '';
    }

    /**
     * @return string
     */
    public function getCommand(): string
    {
        return $this->config[static::FIELD__COMMAND] ?? '';
    }

    /**
     * @return string
     */
    public function getOriginalUtterance(): string
    {
        return $this->config[static::FIELD__ORIGINAL_UTTERANCE] ?? '';
    }

    /**
     * @return IRequestMarkup
     */
    public function getMarkup(): IRequestMarkup
    {
        $markup = $this->config[static::FIELD__MARKUP] ?? [];

        return new RequestMarkup($markup);
    }

    /**
     * @return IRequestPayload
     */
    public function getPayload(): IRequestPayload
    {
        $payload = $this->config[static::FIELD__PAYLOAD] ?? [];

        return new RequestPayload($payload);
    }

    /**
     * @return IRequestNLU
     */
    public function getNlu(): IRequestNLU
    {
        $nlu = $this->config[static::FIELD__NLU] ?? [];

        return new RequestNLU($nlu);
    }

    /**
     * @param string $type
     *
     * @return $this
     */
    public function setType(string $type)
    {
        $this->config[static::FIELD__TYPE] = $type;

        return $this;
    }

    /**
     * @param string $utterance
     *
     * @return $this
     */
    public function setOriginalUtterance(string $utterance)
    {
        $this->config[static::FIELD__ORIGINAL_UTTERANCE] = $utterance;

        return $this;
    }

    /**
     * @param string $command
     *
     * @return $this
     */
    public function setCommand(string $command)
    {
        $this->config[static::FIELD__COMMAND] = $command;

        return $this;
    }

    /**
     * @param IRequestMarkup $markup
     *
     * @return $this
     */
    public function setMarkup(IRequestMarkup $markup)
    {
        $this->config[static::FIELD__MARKUP] = $markup->__toArray();

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
     * @param IRequestNLU $nlu
     *
     * @return $this
     */
    public function setNLU(IRequestNLU $nlu)
    {
        $this->config[static::FIELD__NLU] = $nlu->__toArray();

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
