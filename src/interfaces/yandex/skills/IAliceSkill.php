<?php
namespace extas\interfaces\yandex\skills;

use extas\interfaces\IHasDescription;
use extas\interfaces\IHasName;
use extas\interfaces\IItem;

/**
 * Interface IAliceSkill
 *
 * @package extas\interfaces\yandex\skills
 * @author jeyroik@gmail.com
 */
interface IAliceSkill extends IItem, IHasName, IHasDescription
{
    public const SUBJECT = 'alice.skill';
    public const FIELD__ID = 'id';

    /**
     * @return string
     */
    public function getId(): string;

    /**
     * @param string $id
     *
     * @return $this
     */
    public function setId(string $id);
}
