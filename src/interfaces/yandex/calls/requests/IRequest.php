<?php
namespace extas\interfaces\yandex\calls\requests;

use extas\interfaces\IItem;

/**
 * Interface IRequest
 *
 * @package extas\interfaces\yandex\calls\requests
 * @author jeyroik@gmail.com
 */
interface IRequest extends IItem
{
    public const SUBJECT = 'alice.call.request';

    public const FIELD__COMMAND = 'command';
    public const FIELD__ORIGINAL_UTTERANCE = 'original_utterance';
    public const FIELD__TYPE = 'type';
    public const FIELD__MARKUP = 'markup';
    public const FIELD__PAYLOAD = 'payload';
    public const FIELD__NLU = 'nlu';

    public const TYPE__VOICE = 'SimpleUtterance';
    public const TYPE__BUTTON = 'ButtonPressed';

    /**
     * @return string
     */
    public function getCommand(): string;

    /**
     * @return string
     */
    public function getOriginalUtterance(): string;

    /**
     * @return string
     */
    public function getType(): string;

    /**
     * @return IRequestMarkup
     */
    public function getMarkup(): IRequestMarkup;

    /**
     * @return IRequestPayload
     */
    public function getPayload(): IRequestPayload;

    /**
     * @return IRequestNLU
     */
    public function getNlu(): IRequestNLU;

    /**
     * @param string $command
     *
     * @return $this
     */
    public function setCommand(string $command);

    /**
     * @param string $utterance
     *
     * @return $this
     */
    public function setOriginalUtterance(string $utterance);

    /**
     * @param string $type
     *
     * @return $this
     */
    public function setType(string $type);

    /**
     * @param IRequestMarkup $markup
     *
     * @return $this
     */
    public function setMarkup(IRequestMarkup $markup);

    /**
     * @param IRequestPayload $payload
     *
     * @return $this
     */
    public function setPayload(IRequestPayload $payload);

    /**
     * @param IRequestNLU $nlu
     *
     * @return $this
     */
    public function setNLU(IRequestNLU $nlu);
}
