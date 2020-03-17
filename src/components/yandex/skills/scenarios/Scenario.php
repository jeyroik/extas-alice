<?php
namespace extas\components\yandex\skills\scenarios;

use extas\components\Item;
use extas\components\SystemContainer;
use extas\components\THasDescription;
use extas\components\THasName;
use extas\interfaces\yandex\calls\IAliceCall;
use extas\interfaces\yandex\responses\IAliceResponse;
use extas\interfaces\yandex\skills\IAliceSkill;
use extas\interfaces\yandex\skills\IAliceSkillRepository;
use extas\interfaces\yandex\skills\scenarios\IScenario;
use extas\interfaces\yandex\skills\scenarios\IScenarioReaction;

/**
 * Class Scenario
 *
 * @package extas\components\yandex\skills\scenarios
 * @author jeyroik@gmail.com
 */
class Scenario extends Item implements IScenario
{
    use THasName;
    use THasDescription;

    /**
     * @param $messageId
     * @param IAliceCall $call
     * @param IAliceResponse $response
     */
    public function play($messageId, IAliceCall $call, IAliceResponse &$response): void
    {
        $schema = $this->getSchema();

        if (isset($schema['message_' . $messageId])) {
            $this->playByMessageId('message_' . $messageId, $schema, $call, $response);
        } else {
            $this->playByMessageId(static::REACTION_X, $schema, $call, $response);
        }
    }

    /**
     * @param $messageId
     * @param $schema
     * @param $call
     * @param $response
     */
    protected function playByMessageId($messageId, $schema, $call, &$response)
    {
        /**
         * @var $reactions IScenarioReaction[]
         */
        $reactions = $schema[$messageId];
        foreach ($reactions as $reaction) {
            if ($reaction->isApplicable($call)) {
                $step = $reaction->getStep();
                $stage = 'step.' . $step->getName();
                foreach ($this->getPluginsByStage($stage) as $plugin) {
                    $plugin($call, $response, $step);
                }

                $stage = $this->getName() . '.' . $stage;
                foreach ($this->getPluginsByStage($stage) as $plugin) {
                    $plugin($call, $response, $step);
                }

                $stage = $this->getSkill()->getName() . '.' . $stage;
                foreach ($this->getPluginsByStage($stage) as $plugin) {
                    $plugin($call, $response, $step);
                }
            }
        }
    }

    /**
     * @return array
     */
    public function getSchema(): array
    {
        $schema = $this->config[static::FIELD__SCHEMA] ?? [];
        $reactions = [];

        foreach ($schema as $messageId => $reactionsData) {
            if (!isset($reactions[$messageId])) {
                $reactions[$messageId] = [];
            }
            foreach ($reactionsData as $reaction) {
                $reactions[$messageId][] = new ScenarioReaction($reaction);
            }
        }

        return $reactions;
    }

    /**
     * @return string
     */
    public function getSkillName(): string
    {
        return $this->config[static::FIELD__SKILL_NAME] ?? '';
    }

    /**
     * @return IAliceSkill|null
     */
    public function getSkill(): ?IAliceSkill
    {
        /**
         * @var $skillRepo IAliceSkillRepository
         */
        $skillRepo = SystemContainer::getItem(IAliceSkillRepository::class);

        return $skillRepo->one([IAliceSkill::FIELD__NAME => $this->getSkillName()]);
    }

    /**
     * @param array $schema
     *
     * @return $this
     */
    public function setSchema(array $schema): IScenario
    {
        $this->config[static::FIELD__SCHEMA] = $schema;

        return $this;
    }

    /**
     * @param string $skillName
     *
     * @return $this
     */
    public function setSkillName(string $skillName): IScenario
    {
        $this->config[static::FIELD__SKILL_NAME] = $skillName;

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
