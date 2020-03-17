<?php
namespace extas\components\plugins\alice;

use extas\components\plugins\PluginInstallDefault;
use extas\components\yandex\skills\steps\Step;
use extas\interfaces\yandex\skills\steps\IStepRepository;

/**
 * Class PluginInstallSteps
 *
 * @package extas\components\plugins\alice
 * @author jeyroik@gmail.com
 */
class PluginInstallSteps extends PluginInstallDefault
{
    protected string $selfRepositoryClass = IStepRepository::class;
    protected string $selfItemClass = Step::class;
    protected string $selfUID = Step::FIELD__TITLE;
    protected string $selfSection = 'steps';
    protected string $selfName = 'step';
}
