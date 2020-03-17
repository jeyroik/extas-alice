<?php
namespace extas\components\plugins\alice\skills;

use extas\components\plugins\Plugin;
use extas\components\SystemContainer;
use extas\interfaces\yandex\calls\IAliceCall;
use extas\interfaces\yandex\responses\IAliceResponse;
use extas\interfaces\yandex\skills\IAliceSkill;
use extas\interfaces\yandex\skills\scenarios\IScenario;
use extas\interfaces\yandex\skills\scenarios\IScenarioRepository;

/**
 * Class PluginSkillScenario
 *
 * @package extas\components\plugins\alice\skills
 * @author jeyroik@gmail.com
 */
class PluginSkillScenario extends Plugin
{
    /**
     * @param IAliceCall $aliceCall
     * @param IAliceSkill $skill
     * @param IAliceResponse $response
     */
    public function __invoke($aliceCall, $skill, &$response)
    {
        /**
         * @var $scenarioRepo IScenarioRepository
         * @var $scenario IScenario
         */
        $scenarioRepo = SystemContainer::getItem(IScenarioRepository::class);
        $scenario = $scenarioRepo->one([IScenario::FIELD__SKILL_NAME => $skill->getName()]);

        if ($scenario) {
            $scenario->play($aliceCall->getSession()->getMessageId(), $aliceCall, $response);
        }
    }
}
