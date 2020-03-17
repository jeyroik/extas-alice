<?php
namespace extas\components\yandex\responses\cards\lists;

use extas\components\Item;
use extas\interfaces\yandex\responses\cards\lists\IListHeader;

/**
 * Class ListHeader
 *
 * @package extas\components\yandex\responses\cards\lists
 * @author jeyroik@gmail.com
 */
class ListHeader extends Item implements IListHeader
{
    use THasText;

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
