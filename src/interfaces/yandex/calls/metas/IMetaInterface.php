<?php
namespace extas\interfaces\yandex\calls\metas;

use extas\interfaces\IHasName;
use extas\interfaces\IItem;

/**
 * Interface IMetaInterface
 *
 * @package extas\interfaces\yandex\calls\metas
 * @author jeyroik@gmail.com
 */
interface IMetaInterface extends IItem, IHasName
{
    public const SUBJECT = 'alice.call.meta.interface';

    public const INTERFACE__SCREEN = 'screen';
}
