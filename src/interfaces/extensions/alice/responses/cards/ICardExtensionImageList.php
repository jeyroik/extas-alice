<?php
namespace extas\interfaces\extensions\alice\responses\cards;

use extas\interfaces\yandex\responses\cards\ICard;
use extas\interfaces\yandex\responses\cards\lists\IListFooter;
use extas\interfaces\yandex\responses\cards\lists\IListHeader;

/**
 * Interface ICardExtensionImageList
 *
 * @package extas\interfaces\extensions\alice\responses\cards
 * @author jeyroik@gmail.com
 */
interface ICardExtensionImageList
{
    public const FIELD__HEADER = 'header';
    public const FIELD__ITEMS = 'items';
    public const FIELD__FOOTER = 'footer';

    /**
     * @return IListHeader
     */
    public function getHeader(): IListHeader;

    /**
     * @return ICard[]|ICardExtensionImageSingle[]
     */
    public function getItems(): array;

    /**
     * @return IListFooter
     */
    public function getFooter(): IListFooter;

    /**
     * @param IListHeader $header
     *
     * @return $this
     */
    public function setHeader(IListHeader $header);

    /**
     * @param ICard[]|ICardExtensionImageSingle[] $items
     *
     * @return $this
     */
    public function setItems(array $items);

    /**
     * @param ICard|ICardExtensionImageSingle $item
     *
     * @return $this
     */
    public function addItem(ICard $item);

    /**
     * @param IListFooter $footer
     *
     * @return $this
     */
    public function setFooter(IListFooter $footer);
}
