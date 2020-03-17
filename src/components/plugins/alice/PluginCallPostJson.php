<?php
namespace extas\components\plugins\alice;

use extas\components\plugins\Plugin;

/**
 * Class PluginCallPostJson
 *
 * @package extas\components\plugins\alice
 * @author jeyroik@gmail.com
 */
class PluginCallPostJson extends Plugin
{
    /**
     * @param $yandexCall
     */
    public function __invoke(&$yandexCall)
    {
        $post = json_decode(file_get_contents('php://input'), true);
        $post && $yandexCall = $post;
    }
}
