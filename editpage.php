<?php
/**
 * Created by PhpStorm.
 * User: Vad Kaminskiy
 * Date: 10.12.2014
 * Time: 15:29
 */
require_once __DIR__ . '/models/modelnews.php';

$editnews_id  = (int)$_GET['editnews'];
// Помещаем в $get_page функцию, которая получает полученную id страницу
$edit_page = News_getOne($editnews_id );
if (false === $edit_page)
    redirect('404.php');

include_once __DIR__ . '/views/editnews.php';