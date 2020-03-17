<?php
namespace extas\interfaces\yandex\responses\cards\lists;

use extas\interfaces\IItem;
use extas\interfaces\yandex\responses\buttons\IHasButton;

/**
 * Interface IListFooter
 * @package extas\interfaces\yandex\responses\cards\lists
 * @author jeyroik@gmail.com
 */
interface IListFooter extends IItem, IHasText, IHasButton
{
    public const SUBJECT = 'alice.response.card.list.footer';
}
