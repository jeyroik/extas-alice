<?php
namespace extas\components\yandex\skills;

use extas\components\repositories\Repository;
use extas\interfaces\yandex\skills\IAliceSkillRepository;

/**
 * Class AliceSkillRepository
 *
 * @package extas\components\yandex\skills
 * @author jeyroik@gmail.com
 */
class AliceSkillRepository extends Repository implements IAliceSkillRepository
{
    protected string $itemClass = AliceSkill::class;
    protected string $pk = AliceSkill::FIELD__ID;
    protected string $name = 'skills';
    protected string $scope = 'alice';
    protected string $idAs = '';
}
