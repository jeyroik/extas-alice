<?php
namespace extas\components\yandex\skills\scenarios;

use extas\components\repositories\Repository;

/**
 * Class ScenarioRepository
 *
 * @package extas\components\yandex\skills\scenarios
 * @author jeyroik@gmail.com
 */
class ScenarioRepository extends Repository
{
    protected string $scope = 'alice';
    protected string $name = 'scenarios';
    protected string $pk = Scenario::FIELD__NAME;
    protected string $idAs = '';
    protected string $itemClass = Scenario::class;
}
