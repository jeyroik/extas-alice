<?php
namespace extas\interfaces\yandex\responses\cards\singles;

use extas\interfaces\IHasDescription;
use extas\interfaces\yandex\responses\buttons\IHasButton;
use extas\interfaces\yandex\responses\cards\ICard;

/**
 * Interface ICardImageSingle
 * 
 * @package extas\interfaces\yandex\responses\cards\singles
 * @author jeyroik@gmail.com
 */
interface ICardImageSingle extends ICard, IHasButton, IHasDescription
{
    const SUBJECT = 'alice.response.card.single';
    
    const FIELD__IMAGE_ID = 'image_id';

    /**
     * @return string
     */
    public function getImageId(): string;

    /**
     * @param string $imageId
     * 
     * @return $this
     */
    public function setImageId(string $imageId);
}
