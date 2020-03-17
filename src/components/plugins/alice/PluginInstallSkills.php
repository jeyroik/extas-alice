<?php
namespace extas\components\plugins\alice;

use extas\components\plugins\PluginInstallDefault;
use extas\components\yandex\skills\AliceSkill;
use extas\interfaces\yandex\skills\IAliceSkillRepository;

/**
 * Class PluginInstallSkills
 *
 * @package extas\components\plugins\alice
 * @author jeyroik@gmail.com
 */
class PluginInstallSkills extends PluginInstallDefault
{
    protected string $selfName = 'skill';
    protected string $selfSection = 'skills';
    protected string $selfUID = AliceSkill::FIELD__ID;
    protected string $selfItemClass = AliceSkill::class;
    protected string $selfRepositoryClass = IAliceSkillRepository::class;
}
