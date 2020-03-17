<?php
namespace extas\components\yandex\calls\requests\nlu;

use extas\components\Item;
use extas\interfaces\yandex\calls\requests\nlu\INLUValue;

/**
 * Class NLUValue
 *
 * @package extas\components\yandex\calls\requests\nlu
 * @author jeyroik@gmail.com
 */
class NLUValue extends Item implements INLUValue
{
    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return 'alice.call.request.nlu.value';
    }
}
