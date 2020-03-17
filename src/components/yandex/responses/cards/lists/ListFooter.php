<?php
namespace extas\components\yandex\responses\cards\lists;

use extas\components\Item;
use extas\components\yandex\responses\buttons\THasButton;
use extas\components\yandex\responses\cards\singles\SingleButton;
use extas\interfaces\yandex\responses\cards\lists\IListFooter;

/**
 * Class ListFooter
 * 
 * @package extas\components\yandex\responses\cards\lists
 * @author jeyroik@gmail.com
 */
class ListFooter extends Item implements IListFooter
{
    use THasText;
    use THasButton;

    /**
     * Используется в THasButton
     * 
     * @var string 
     */
    protected string $buttonClass = SingleButton::class;

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
