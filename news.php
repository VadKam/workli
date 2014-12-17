<?
require 'boot.php';
$news = new News();
$view = new View();
    // Записываем в переменную полученную id страницу <a href=controllers/controllernews.php?pagenews=<id> target="_blank">Читать далее...</a>
$pagenews_id  = (int)$_GET['pagenews'];
    // Помещаем в $get_page функцию, которая получает полученную id страницу
$view->get_page = $news->selectArticle($pagenews_id );
if (false === $view->get_page)
{
    redirect('404.php');
}
echo ($view->display('news.php'));



