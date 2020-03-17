<?php
namespace extas\components\yandex\responses\cards\singles;

use extas\components\yandex\responses\buttons\Button;

/**
 * Class SingleButton
 *
 * Яндекс не смог сделать кнопки единообразными и зачем-то по-разному назвал одно и то же поле
 * для просто кнопок и для картинок-кнопок.
 *
 * Из-за этого нужен целый отдельный класс:
 * только для того, чтобы заголовок кнопки послать не в поле title, а в поле text.
 *
 * И ещё, на самом деле, кнопку-картинку нельзя скрыть после нажатия.
 *
 * @package extas\components\yandex\responses\cards\singles
 * @author jeyroik@gmail.com
 */
class SingleButton extends Button
{
    public function getTitle(): string
    {
        return $this->config['text'] ?? '';
    }

    public function setTitle(string $title)
    {
        $this->config['text'] = $title;

        return $this;
    }
}
