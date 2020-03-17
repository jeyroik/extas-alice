<?php
namespace extas\components\yandex\skills\steps;

use extas\components\Item;
use extas\components\THasDescription;
use extas\components\THasName;
use extas\interfaces\yandex\skills\steps\IStep;

/**
 * Class Step
 *
 * @package extas\components\yandex\skills\steps
 * @author jeyroik@gmail.com
 */
class Step extends Item implements IStep
{
    use THasName;
    use THasDescription;

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
