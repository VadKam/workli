<?php
/**
 * Created by PhpStorm.
 * User: Vladislav
 * Date: 19.12.2014
 * Time: 19:36
 */
class NewsController
    extends AController
{
    protected function actionAll()
    {
        $news = new News();
        $view = new View();

        $view->articles = $news->AllNews();
        echo ($view->display('allnews.php'));
    }
    protected function actionOne()
    {
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
    }
    protected function actionEdit()
    {
        $news = new News();
        $view = new View();

        $editnews_id  = (int)$_GET['editnews'];
            // Помещаем в $get_page функцию, которая получает полученную id страницу
        $view->edit_page = $news->selectArticle($editnews_id);

        if (false === $view->edit_page)
            redirect('404.php');
        echo ($view->display('editnews.php'));
    }
    protected function actionAdd()
    {
        if(!empty($_POST['title']) && !empty($_POST['text'])){
            $title =  $_POST['title'];
            $text =  $_POST['text'];
            $date = date_create();
            $datanews = date_format($date, 'Y-m-d') . "\n";
            $status_add_article = '';
            $Cont_insertArticle = new News();
            if ($Cont_insertArticle->insertArticle($title,$text, $datanews))  {
                $status_add_article = 'Новость добавлена';
            }
            else {
                $status_add_article = '!!!Новость не добавлена!!!';
            }
            include_once __DIR__ . '/views/addnews.php';
        }elseif(empty($_POST['title']) || empty($_POST['text'])) {
            include __DIR__. '/views/addnews.php';
        }
    }

}