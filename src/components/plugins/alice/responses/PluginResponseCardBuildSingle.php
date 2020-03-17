<?php
namespace extas\components\plugins\alice\responses;

use extas\components\plugins\Plugin;
use extas\interfaces\extensions\alice\responses\cards\ICardExtensionImageSingle;
use extas\interfaces\yandex\responses\cards\ICard;

/**
 * Class PluginResponseCardBuildSingle
 * 
 * @package extas\components\plugins\alice\responses
 * @author jeyroik@gmail.com
 */
class PluginResponseCardBuildSingle extends Plugin
{
    /**
     * @param $built
     * @param ICard|ICardExtensionImageSingle $card
     */
    public function __invoke(&$built, ICard $card)
    {
        $button = $card->getButton();
        $card->setButton($button);
        $built = $card->__toArray();
        unset($built[ICard::FIELD__NAME]);
    }
}
