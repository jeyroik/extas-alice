<?php
namespace extas\components\yandex\skills\scenarios;

use extas\components\Item;
use extas\components\SystemContainer;
use extas\interfaces\yandex\calls\IAliceCall;
use extas\interfaces\yandex\skills\scenarios\IScenarioReaction;
use extas\interfaces\yandex\skills\steps\IStep;
use extas\interfaces\yandex\skills\steps\IStepRepository;

/**
 * Class ScenarioReaction
 *
 * @package extas\components\yandex\skills\scenarios
 * @author jeyroik@gmail.com
 */
class ScenarioReaction extends Item implements IScenarioReaction
{
    /**
     * @return callable|null
     */
    public function getCondition()
    {
        $conditionDraft = $this->config[static::FIELD__CONDITION] ?? null;

        return $conditionDraft ? new $conditionDraft() : null;
    }

    /**
     * @return string
     */
    public function getStepName(): string
    {
        return $this->config[static::FIELD__STEP_NAME] ?? '';
    }

    /**
     * @return IStep|null
     */
    public function getStep(): ?IStep
    {
        $stepName = $this->getStepName();
        /**
         * @var $stepRepo IStepRepository
         */
        $stepRepo = SystemContainer::getItem(IStepRepository::class);

        return $stepRepo->one([IStep::FIELD__NAME => $stepName]);
    }

    /**
     * @param callable|null $condition
     *
     * @return $this
     */
    public function setCondition($condition)
    {
        $this->config[static::FIELD__CONDITION] = $condition;

        return $this;
    }

    /**
     * @param string $stepName
     *
     * @return $this
     */
    public function setStepName(string $stepName)
    {
        $this->config[static::FIELD__STEP_NAME] = $stepName;

        return $this;
    }

    /**
     * @param IAliceCall $call
     *
     * @return bool
     */
    public function isApplicable(IAliceCall $call): bool
    {
        $condition = $this->getCondition();
        if (!$condition) {
            return true;
        }

        return $condition($call);
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
