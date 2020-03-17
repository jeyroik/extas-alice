<?php
namespace extas\interfaces\yandex\skills\steps;

use extas\interfaces\IHasDescription;
use extas\interfaces\IHasName;
use extas\interfaces\IItem;

/**
 * Interface IStep
 *
 * @package extas\interfaces\yandex\skills\steps
 * @author jeyroik@gmail.com
 */
interface IStep extends IItem, IHasName, IHasDescription
{
    public const SUBJECT = 'alice.skill.step';
}
