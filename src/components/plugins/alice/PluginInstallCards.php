<?php
namespace extas\components\plugins\alice;

use extas\components\plugins\PluginInstallDefault;
use extas\components\yandex\responses\cards\Card;
use extas\interfaces\yandex\responses\cards\ICardRepository;

/**
 * Class PluginInstallCards
 *
 * @package extas\components\plugins\alice
 * @author jeyroik@gmail.com
 */
class PluginInstallCards extends PluginInstallDefault
{
    protected string $selfRepositoryClass = ICardRepository::class;
    protected string $selfItemClass = Card::class;
    protected string $selfUID = Card::FIELD__NAME;
    protected string $selfSection = 'cards';
    protected string $selfName = 'card';
}
