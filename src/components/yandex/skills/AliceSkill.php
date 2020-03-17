<?php
namespace extas\components\yandex\skills;

use extas\components\Item;
use extas\components\THasDescription;
use extas\components\THasName;
use extas\interfaces\yandex\skills\IAliceSkill;

/**
 * Class AliceSkill
 *
 * @package extas\components\yandex\skills
 * @author jeyroik@gmail.com
 */
class AliceSkill extends Item implements IAliceSkill
{
    use THasName;
    use THasDescription;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->config[static::FIELD__ID] ?? '';
    }

    /**
     * @param string $id
     *
     * @return $this
     */
    public function setId(string $id)
    {
        $this->config[static::FIELD__ID] = $id;

        return $this;
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
