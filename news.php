<?
require_once __DIR__ . '/models/modelnews.php';

    // Записываем в переменную полученную id страницу <a href=controllers/controllernews.php?pagenews=<id> target="_blank">Читать далее...</a>
$pagenews_id  = (int)$_GET['pagenews'];
    // Помещаем в $get_page функцию, которая получает полученную id страницу
$get_page = News_getOne($pagenews_id);
if (false === $get_page)
redirect('404.php');
include_once __DIR__ . '/views/news.php';
?>



