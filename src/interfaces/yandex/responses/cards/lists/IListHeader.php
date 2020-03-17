<?php
namespace extas\interfaces\yandex\responses\cards\lists;

use extas\interfaces\IItem;

/**
 * Interface IListHeader
 *
 * @package extas\interfaces\yandex\responses\cards\lists
 * @author jeyroik@gmail.com
 */
interface IListHeader extends IItem, IHasText
{
    public const SUBJECT = 'alice.response.card.list.header';
}
