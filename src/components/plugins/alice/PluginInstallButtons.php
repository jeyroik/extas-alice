<?php
namespace extas\components\plugins\alice;

use extas\components\plugins\PluginInstallDefault;
use extas\components\yandex\responses\buttons\Button;
use extas\interfaces\yandex\responses\buttons\IButtonRepository;

/**
 * Class PluginInstallButtons
 *
 * @package extas\components\plugins\alice
 * @author jeyroik@gmail.com
 */
class PluginInstallButtons extends PluginInstallDefault
{
    protected string $selfItemClass = Button::class;
    protected string $selfName = 'button';
    protected string $selfSection = 'buttons';
    protected string $selfUID = Button::FIELD__TITLE;
    protected string $selfRepositoryClass = IButtonRepository::class;
}
