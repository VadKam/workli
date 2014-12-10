<?php
/**
 * Created by PhpStorm.
 * User: Vad Kaminskiy
 * Date: 09.12.2014
 * Time: 16:00
 */
    // подключение модель
require_once __DIR__ . '/../models/modelnews.php';
require_once __DIR__ . '/../functions/functions.php';

    // Добавление статьи


/*if($_POST['title'] || $_POST['text']){
    Add_news();
    redirect();
    var_dump($_POST['title']);
}*/

if(!empty($_POST['title']) && !empty($_POST['text'])){
    add_news();
    redirect();
}//redirect(); Работает сразу, еще до отправки    is S

    // Записываем в переменную полученную id страницу <a href=controllers/controllernews.php?pagenews=<id> target="_blank">Читать далее...</a>
$pagenews_id  = (int)$_GET['pagenews'];
    // Помещаем в $get_page функцию, которая получает полученную id страницу
$get_page = Get_Page($pagenews_id);
if (false === $get_page)
    redirect('404.php');
include __DIR__ . '/../views/news.php';

    // Контроллер изменить статью
$editnews_id  = (int)$_GET['editnews'];
// Помещаем в $get_page функцию, которая получает полученную id страницу
$edit_page = Edit_Page($editnews_id );
if (false === $edit_page)
    redirect('404.php');
include __DIR__ . '/../views/editnews.php';


