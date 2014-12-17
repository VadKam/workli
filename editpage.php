<?php
/**
 * Created by PhpStorm.
 * User: Vad Kaminskiy
 * Date: 10.12.2014
 * Time: 15:29
 */
require 'boot.php';
$news = new News();
$view = new View();

$editnews_id  = (int)$_GET['editnews'];
// Помещаем в $get_page функцию, которая получает полученную id страницу
$view->edit_page = $news->selectArticle($editnews_id);
if (false === $view->edit_page)
    redirect('404.php');

echo ($view->display('editnews.php'));
