<?php
namespace extas\components\yandex\skills\steps;

use extas\components\repositories\Repository;
use extas\interfaces\yandex\skills\steps\IStepRepository;

/**
 * Class StepRepository
 *
 * @package extas\components\yandex\skills\steps
 * @author jeyroik@gmail.com
 */
class StepRepository extends Repository implements IStepRepository
{
    protected string $itemClass = Step::class;
    protected string $idAs = '';
    protected string $pk = Step::FIELD__NAME;
    protected string $name = 'steps';
    protected string $scope = 'alice';
}
