<?php
namespace extas\components\plugins\alice;

use extas\components\plugins\PluginInstallDefault;
use extas\components\yandex\skills\scenarios\Scenario;
use extas\interfaces\yandex\skills\scenarios\IScenarioRepository;

/**
 * Class PluginInstallScenarios
 *
 * @package extas\components\plugins\alice
 * @author jeyroik@gmail.com
 */
class PluginInstallScenarios extends PluginInstallDefault
{
    protected string $selfRepositoryClass = IScenarioRepository::class;
    protected string $selfItemClass = Scenario::class;
    protected string $selfUID = Scenario::FIELD__NAME;
    protected string $selfSection = 'scenarios';
    protected string $selfName = 'scenario';
}
