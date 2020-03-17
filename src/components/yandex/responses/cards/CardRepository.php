<?php
namespace extas\components\yandex\responses\cards;

use extas\components\repositories\Repository;

/**
 * Class CardRepository
 *
 * @package extas\components\yandex\responses\cards
 * @author jeyroik@gmail.com
 */
class CardRepository extends Repository
{
    protected string $itemClass = Card::class;
    protected string $idAs = '';
    protected string $pk = Card::FIELD__NAME;
    protected string $name = 'cards';
    protected string $scope = 'alice';
}
