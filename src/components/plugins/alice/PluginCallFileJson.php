<?php
namespace extas\components\plugins\alice;

use extas\components\plugins\Plugin;

/**
 * Class PluginCallFileJson
 *
 * @package extas\components\plugins\alice
 * @author jeyroik@gmail.com
 */
class PluginCallFileJson extends Plugin
{
    /**
     * @param $yandexCall
     */
    public function __invoke(&$yandexCall)
    {
        $filePath = getenv('ALISA__CALL_JSON_PATH')
            ?: getenv('EXTAS__BASE_PATH') . '/configs/yandex.call.json';

        if (empty($yandexCall) && is_file($filePath)) {
            $post = json_decode(file_get_contents($filePath), true);
            $post && $yandexCall = $post;
        }
    }
}
