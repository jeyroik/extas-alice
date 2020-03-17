<?php
namespace extas\interfaces\yandex\responses\cards\lists;

use extas\interfaces\yandex\responses\cards\ICard;
use extas\interfaces\yandex\responses\cards\singles\ICardImageSingle;

/**
 * Interface ICardImageList
 *
 * @package extas\interfaces\yandex\responses\cards\lists
 * @author jeyroik@gmail.com
 */
interface ICardImageList extends ICard
{
    public const SUBJECT = 'alice.response.card.list';
    
    public const FIELD__HEADER = 'header';
    public const FIELD__ITEMS = 'items';
    public const FIELD__FOOTER = 'footer';

    /**
     * @return IListHeader
     */
    public function getHeader(): IListHeader;

    /**
     * @return ICardImageSingle[]
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
     * @param ICardImageSingle[] $items
     * 
     * @return $this
     */
    public function setItems(array $items);

    /**
     * @param ICardImageSingle $item
     *
     * @return $this
     */
    public function addItem(ICardImageSingle $item);

    /**
     * @param IListFooter $footer
     * 
     * @return $this
     */
    public function setFooter(IListFooter $footer);
}
