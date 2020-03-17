<?php
namespace extas\components\yandex\calls\requests;

use extas\components\Item;
use extas\interfaces\yandex\calls\requests\IRequestPayload;

/**
 * Class RequestPayload
 *
 * @package extas\components\yandex\calls\requests
 * @author jeyroik@gmail.com
 */
class RequestPayload extends Item implements IRequestPayload
{
    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
