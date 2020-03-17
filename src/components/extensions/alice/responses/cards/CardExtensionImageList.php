<?php
namespace extas\components\extensions\alice\responses\cards;

use extas\components\extensions\Extension;
use extas\components\SystemContainer;
use extas\components\yandex\responses\cards\Card;
use extas\components\yandex\responses\cards\lists\ListFooter;
use extas\components\yandex\responses\cards\lists\ListHeader;
use extas\interfaces\extensions\alice\responses\cards\ICardExtensionImageList;
use extas\interfaces\yandex\responses\cards\ICard;
use extas\interfaces\yandex\responses\cards\ICardRepository;
use extas\interfaces\yandex\responses\cards\lists\IListFooter;
use extas\interfaces\yandex\responses\cards\lists\IListHeader;

/**
 * Class CardExtensionImageList
 *
 * @package extas\components\extensions\alice\responses\cards
 * @author jeyroik@gmail.com
 */
class CardExtensionImageList extends Extension implements ICardExtensionImageList
{
    /**
     * @param ICard $card
     *
     * @return IListFooter
     */
    public function getFooter(ICard $card = null): IListFooter
    {
        $footer = isset($card[static::FIELD__FOOTER])
            ? $card[static::FIELD__FOOTER]
            : [];

        return new ListFooter($footer);
    }

    /**
     * @param ICard $card
     *
     * @return IListHeader
     */
    public function getHeader(ICard $card = null): IListHeader
    {
        $header = isset($card[static::FIELD__HEADER])
            ? $card[static::FIELD__HEADER]
            : [];

        return new ListHeader($header);
    }

    /**
     * @param ICard $card
     *
     * @return ICard[]
     */
    public function getItems(ICard $card = null): array
    {
        $itemsData = isset($card[static::FIELD__ITEMS])
            ? $card[static::FIELD__ITEMS]
            : [];
        $items = [];

        /**
         * @var $cardRepo ICardRepository
         */
        $cardRepo = SystemContainer::getItem(ICardRepository::class);

        foreach ($itemsData as $item) {
            if (is_string($item)) {
                $subCard = $cardRepo->one([ICard::FIELD__NAME => $item]);
                if ($subCard) {
                    $item = $subCard;
                } else {
                    $item = [];
                }
            } else {
                $item = new Card($item);
            }
            $items[] = $item;
        }

        return $items;
    }

    /**
     * @param IListFooter $footer
     * @param ICard $card
     *
     * @return $this|ICard
     */
    public function setFooter(IListFooter $footer, ICard &$card = null)
    {
        $card[static::FIELD__FOOTER] = $footer->__toArray();

        return $card;
    }

    /**
     * @param IListHeader $header
     * @param ICard $card
     *
     * @return $this|ICard
     */
    public function setHeader(IListHeader $header, ICard &$card = null)
    {
        $card[static::FIELD__HEADER] = $header->__toArray();

        return $card;
    }

    /**
     * @param array|ICard[] $items
     * @param ICard $card
     *
     * @return $this|ICard
     */
    public function setItems(array $items, ICard &$card = null)
    {
        $itemsData = [];

        foreach ($items as $item) {
            $itemsData[] = $item instanceof ICard ? $item->__toArray() : $item;
        }

        $card[static::FIELD__ITEMS] = $itemsData;

        return $card;
    }

    /**
     * @param ICard $item
     * @param ICard $card
     *
     * @return $this|ICard
     */
    public function addItem(ICard $item, ICard $card = null)
    {
        $card[static::FIELD__ITEMS] = isset($card[static::FIELD__ITEMS])
            ? $card[static::FIELD__ITEMS]
            : [];
        $card[static::FIELD__ITEMS][] = $item->__toArray();

        return $card;
    }
}
