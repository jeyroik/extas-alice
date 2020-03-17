<?php
namespace extas\components\yandex\responses;

use extas\components\Item;
use extas\components\yandex\responses\buttons\Button;
use extas\components\yandex\responses\cards\Card;
use extas\components\yandex\responses\sessions\Session;
use extas\components\yandex\THasVersion;
use extas\interfaces\yandex\responses\buttons\IButton;
use extas\interfaces\yandex\responses\cards\ICard;
use extas\interfaces\yandex\responses\IAliceResponse;
use extas\interfaces\yandex\responses\sessions\ISession;

/**
 * Class AliceResponse
 *
 * @package extas\components\yandex\responses
 * @author jeyroik@gmail.com
 */
class AliceResponse extends Item implements IAliceResponse
{
    use THasVersion;

    /**
     * @return array
     */
    public function __toArray(): array
    {
        $response = [
            'response' => [
                static::FIELD__TEXT => $this->config[static::FIELD__TEXT] ?? '',
                static::FIELD__TTS => $this->config[static::FIELD__TTS] ?? '',
                static::FIELD__IS_END_OF_TALKING => $this->config[static::FIELD__IS_END_OF_TALKING] ?? false
            ],
            static::FIELD__SESSION => $this->config[static::FIELD__SESSION] ?? [],
            static::FIELD__VERSION => $this->config[static::FIELD__VERSION] ?? ''
        ];

        $buttons = $this->config[static::FIELD__BUTTONS] ?? [];
        $card = $this->config[static::FIELD__CARD] ?? [];

        if (!empty($buttons)) {
            $response['response'][static::FIELD__BUTTONS] = $buttons;
        }

        if (!empty($card)) {
            $response['response'][static::FIELD__CARD] = $card;
        }

        return $response;
    }

    /**
     * @return ISession
     */
    public function getSession(): ISession
    {
        $session = $this->config[static::FIELD__SESSION] ?? [];

        return new Session($session);
    }

    /**
     * @return IButton[]
     */
    public function getButtons(): array
    {
        $buttonsData = $this->config[static::FIELD__BUTTONS] ?? [];
        $buttons = [];

        foreach ($buttonsData as $button) {
            $buttons[] = new Button($button);
        }

        return $buttons;
    }

    /**
     * @return ICard
     */
    public function getCard(): ICard
    {
        $card = $this->config[static::FIELD__CARD] ?? [];

        return new Card($card);
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->config[static::FIELD__TEXT] ?? '';
    }

    public function getTts(): string
    {
        return $this->config[static::FIELD__TTS] ?? '';
    }

    /**
     * @return bool
     */
    public function isEndOfTalking(): bool
    {
        return $this->config[static::FIELD__IS_END_OF_TALKING] ?? '';
    }

    /**
     * @param ISession $session
     *
     * @return $this
     */
    public function setSession(ISession $session): IAliceResponse
    {
        $this->config[static::FIELD__SESSION] = $session->__toArray();

        return $this;
    }

    /**
     * @param array $buttons
     *
     * @return $this
     */
    public function setButtons(array $buttons): IAliceResponse
    {
        $buttonsData = [];

        foreach ($buttons as $button) {
            $buttonsData[] = $button instanceof IButton
                ? $button->__toArray()
                : $button;
        }

        $this->config[static::FIELD__BUTTONS] = $buttonsData;

        return $this;
    }

    /**
     * @param IButton $button
     *
     * @return $this
     */
    public function addButton(IButton $button): IAliceResponse
    {
        $this->config[static::FIELD__BUTTONS] = $this->config[static::FIELD__BUTTONS] ?? [];
        $this->config[static::FIELD__BUTTONS][] = $button->__toArray();

        return $this;
    }

    /**
     * @param ICard $card
     *
     * @return $this
     */
    public function setCard(ICard $card): IAliceResponse
    {
        $this->config[static::FIELD__CARD] = $card->__toArray();

        return $this;
    }

    /**
     * @param string $text
     *
     * @return $this
     */
    public function setText(string $text): IAliceResponse
    {
        $this->config[static::FIELD__TEXT] = $text;

        return $this;
    }

    /**
     * @param string $tts
     *
     * @return $this
     */
    public function setTts(string $tts): IAliceResponse
    {
        $this->config[static::FIELD__TTS] = $tts;

        return $this;
    }

    /**
     * @param bool $isEndOfTalking
     *
     * @return $this
     */
    public function setIsEndOfTalking(bool $isEndOfTalking): IAliceResponse
    {
        $this->config[static::FIELD__IS_END_OF_TALKING] = $isEndOfTalking;

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
