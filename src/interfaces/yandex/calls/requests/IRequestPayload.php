<?php
namespace extas\interfaces\yandex\calls\requests;

use extas\interfaces\IItem;

/**
 * Interface IRequestPayload
 *
 * @package extas\interfaces\yandex\calls\requests
 * @author jeyroik@gmail.com
 */
interface IRequestPayload extends IItem
{
    public const SUBJECT = 'alice.call.request.payload';
}
