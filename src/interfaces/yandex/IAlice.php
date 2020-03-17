<?php
namespace extas\interfaces\yandex;

use extas\interfaces\IItem;

/**
 * Interface IAlice
 *
 * @package extas\interfaces\yandex
 * @author jeyroik@gmail.com
 */
interface IAlice extends IItem
{
    public const SUBJECT = 'yandex.alice';

    public const OPTION__THROW_ON_ERROR = 'throw_on_error';

    /**
     * @return mixed
     */
    public function run();
}
