<?php
namespace extas\interfaces\yandex\responses;

use extas\interfaces\IItem;
use extas\interfaces\yandex\IHasVersion;
use extas\interfaces\yandex\responses\buttons\IButton;
use extas\interfaces\yandex\responses\cards\ICard;
use extas\interfaces\yandex\responses\sessions\ISession;

/**
 * Interface IAliceResponse
 *
 * @package extas\interfaces\yandex\responses
 * @author jeyroik@gmail.com
 */
interface IAliceResponse extends IItem, IHasVersion
{
    public const SUBJECT = 'alice.response';

    public const FIELD__TEXT = 'text';
    public const FIELD__TTS = 'tts';
    public const FIELD__BUTTONS = 'buttons';
    public const FIELD__CARD = 'card';
    public const FIELD__IS_END_OF_TALKING = 'end_session';
    public const FIELD__SESSION = 'session';

    /**
     * Max 1024 symbols
     * @return string
     */
    public function getText(): string;

    /**
     * @return string
     */
    public function getTts(): string;

    /**
     * @return array
     */
    public function getButtons(): array;

    /**
     * @return ICard
     */
    public function getCard(): ICard;

    /**
     * @return bool
     */
    public function isEndOfTalking(): bool;

    /**
     * @return ISession
     */
    public function getSession(): ISession;

    /**
     * @param string $text
     * 
     * @return $this
     */
    public function setText(string $text);

    /**
     * @param string $tts
     * 
     * @return $this
     */
    public function setTts(string $tts): IAliceResponse;

    /**
     * @param array $buttons
     * 
     * @return $this
     */
    public function setButtons(array $buttons): IAliceResponse;

    /**
     * @param IButton $button
     * 
     * @return $this
     */
    public function addButton(IButton $button): IAliceResponse;

    /**
     * @param ICard $card
     * 
     * @return $this
     */
    public function setCard(ICard $card): IAliceResponse;

    /**
     * @param bool $isEndOfTalking
     * 
     * @return $this
     */
    public function setIsEndOfTalking(bool $isEndOfTalking): IAliceResponse;

    /**
     * @param ISession $session
     * 
     * @return $this
     */
    public function setSession(ISession $session): IAliceResponse;
}
