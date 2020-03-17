<?php
namespace extas\interfaces\extensions\alice\responses\cards;

use extas\interfaces\IHasDescription;
use extas\interfaces\yandex\responses\buttons\IHasButton;

/**
 * Interface ICardExtensionImageSingle
 *
 * @package extas\interfaces\extensions\alice\responses\cards
 * @author jeyroik@gmail.com
 */
interface ICardExtensionImageSingle extends IHasButton, IHasDescription
{
    public const FIELD__IMAGE_ID = 'image_id';

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
