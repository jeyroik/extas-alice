<?php
namespace extas\interfaces\yandex\skills\scenarios;

use extas\interfaces\IItem;
use extas\interfaces\yandex\calls\IAliceCall;
use extas\interfaces\yandex\skills\steps\IStep;

/**
 * Interface IScenarioReaction
 *
 * @package extas\interfaces\yandex\skills\scenarios
 * @author jeyroik@gmail.com
 */
interface IScenarioReaction extends IItem
{
    const SUBJECT = 'alice.skill.scenario.reaction';

    const FIELD__CONDITION = 'condition';
    const FIELD__STEP_NAME = 'step';

    /**
     * @return null|callable
     */
    public function getCondition();

    /**
     * @return string
     */
    public function getStepName(): string;

    /**
     * @return IStep|null
     */
    public function getStep(): ?IStep;

    /**
     * @param IAliceCall $call
     *
     * @return bool
     */
    public function isApplicable(IAliceCall $call): bool;

    /**
     * @param null|callable $condition
     * @return $this
     */
    public function setCondition($condition);

    /**
     * @param string $stepName
     *
     * @return $this
     */
    public function setStepName(string $stepName);
}
