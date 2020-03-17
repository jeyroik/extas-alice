<?php
namespace extas\components\yandex\responses\buttons;

use extas\components\repositories\Repository;
use extas\interfaces\yandex\responses\buttons\IButtonRepository;

/**
 * Class ButtonRepository
 *
 * @package extas\components\yandex\responses\buttons
 * @author jeyroik@gmail.com
 */
class ButtonRepository extends Repository implements IButtonRepository
{
    protected string $scope = 'alice';
    protected string $name = 'buttons';
    protected string $pk = Button::FIELD__NAME;
    protected string $idAs = '';
    protected string $itemClass = Button::class;
}
