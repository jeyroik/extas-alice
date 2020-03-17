<?php
namespace extas\components\plugins\alice\responses;

use extas\components\plugins\Plugin;
use extas\interfaces\extensions\alice\responses\cards\ICardExtensionImageList;
use extas\interfaces\yandex\responses\cards\ICard;

/**
 * Class PluginResponseCardBuildList
 * 
 * @package extas\components\plugins\alice\responses
 * @author jeyroik@gmail.com
 */
class PluginResponseCardBuildList extends Plugin
{
    /**
     * @param $built
     * @param ICard|ICardExtensionImageList $card
     */
    public function __invoke(&$built, ICard $card)
    {
        $items = $card->getItems();
        $builtCards = [];
        foreach ($items as $item) {
            $item->build();
            $builtCards[] = $item->__toArray();
        }
        $card->setItems($builtCards);
        
        $built = $card->__toArray();
    }
}
