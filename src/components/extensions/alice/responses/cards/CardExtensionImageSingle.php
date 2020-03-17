<?php
namespace extas\components\extensions\alice\responses\cards;

use extas\components\extensions\Extension;
use extas\components\SystemContainer;
use extas\components\yandex\responses\cards\singles\SingleButton;
use extas\interfaces\extensions\alice\responses\cards\ICardExtensionImageSingle;
use extas\interfaces\yandex\responses\buttons\IButton;
use extas\interfaces\yandex\responses\buttons\IButtonRepository;
use extas\interfaces\yandex\responses\cards\ICard;

/**
 * Class CardExtensionImageSingle
 *
 * @package extas\interfaces\extensions\alice\responses\cards
 * @author jeyroik@gmail.com
 */
class CardExtensionImageSingle extends Extension implements ICardExtensionImageSingle
{
    /**
     * @param ICard $card
     *
     * @return string
     */
    public function getTitle(ICard $card = null): string
    {
        return isset($card[static::FIELD__TITLE])
            ? $card[static::FIELD__TITLE]
            : '';
    }

    /**
     * @param string $title
     * @param ICard $card
     *
     * @return $this|ICard
     */
    public function setTitle(string $title, ICard &$card = null)
    {
        $card[static::FIELD__TITLE] = $title;

        return $card;
    }

    /**
     * @param ICard $card
     *
     * @return string
     */
    public function getDescription(ICard $card = null): string
    {
        return isset($card[static::FIELD__DESCRIPTION])
            ? $card[static::FIELD__DESCRIPTION]
            : '';
    }

    /**
     * @param string $description
     * @param ICard $card
     *
     * @return $this|ICard
     */
    public function setDescription(string $description, ICard &$card = null)
    {
        $card[static::FIELD__DESCRIPTION] = $description;

        return $card;
    }

    /**
     * @param ICard $card
     *
     * @return IButton
     */
    public function getButton(ICard $card = null): IButton
    {
        $button = isset($card[static::FIELD__BUTTON])
            ? $card[static::FIELD__BUTTON]
            : [];

        if (is_string($button)) {
            /**
             * @var $btnRepo IButtonRepository
             * @var $btnData IButton
             */
            $btnRepo = SystemContainer::getItem(IButtonRepository::class);
            $btnData = $btnRepo->one([IButton::FIELD__NAME => $button]);
            if ($btnData) {
                $button = $btnData->__toArray();
            }
        }

        return new SingleButton($button);
    }

    /**
     * @param IButton $button
     * @param ICard $card
     *
     * @return $this|ICard
     */
    public function setButton(IButton $button, ICard &$card = null)
    {
        $card[static::FIELD__BUTTON] = $button->__toArray();

        return $card;
    }

    /**
     * @param ICard $card
     *
     * @return string
     */
    public function getImageId(ICard $card = null): string
    {
        return isset($card[static::FIELD__IMAGE_ID])
            ? $card[static::FIELD__IMAGE_ID]
            : '';
    }

    /**
     * @param string $imageId
     * @param ICard $card
     *
     * @return $this|ICard
     */
    public function setImageId(string $imageId, ICard &$card = null)
    {
        $card[static::FIELD__IMAGE_ID] = $imageId;

        return $card;
    }
}
