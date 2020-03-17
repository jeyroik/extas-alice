<?php
namespace extas\components\yandex\calls\metas;

use extas\components\Item;
use extas\components\THasName;
use extas\interfaces\yandex\calls\metas\IMetaInterface;

/**
 * Class MetaInterface
 *
 * @package extas\components\yandex\calls\metas
 * @author jeyroik@gmail.com
 */
class MetaInterface extends Item implements IMetaInterface
{
    use THasName;

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
