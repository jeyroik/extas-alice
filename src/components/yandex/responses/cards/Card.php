<?php
namespace extas\components\yandex\responses\cards;

use extas\components\Item;
use extas\components\THasName;
use extas\components\THasType;
use extas\interfaces\yandex\responses\cards\ICard;

/**
 * Class Card
 *
 * @package extas\components\yandex\responses\cards
 * @author jeyroik@gmail.com
 */
class Card extends Item implements ICard
{
    use THasName;
    use THasType;

    /**
     * @return $this
     */
    public function build()
    {
        $built = $this->__toArray();

        $stage = static::STAGE__CARD_BUILD . '.' . $this->getType();
        foreach ($this->getPluginsByStage($stage) as $plugin) {
            $plugin($built, $this);
        }

        $this->config = $built;

        return $this;
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
