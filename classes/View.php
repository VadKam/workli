<?php
/**
 * Created by PhpStorm.
 * User: Vladislav
 * Date: 17.12.2014
 * Time: 14:18
 */
//require_once __DIR__ . '/../models/modelnews.php';
require __DIR__ . '/Storage.php';
require __DIR__ . '/News.php';
class View
    extends Storage
{
    public function display($template)
    {
        ob_start();
        foreach ($this as $k => $v) {
            $$k = $v;
        }
        include __DIR__ . '/../' . 'views/' . $template;
        $ret = ob_get_contents();
        ob_get_clean();
        // $ret = str_replace("ё", "е", $ret);
        return $ret;
    }
}

$news = new News();
$view = new View();
