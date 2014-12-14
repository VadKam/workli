<?php
/**
 * Created by PhpStorm.
 * User: Vad Kaminskiy
 * Date: 10.12.2014
 * Time: 15:34
 */
require_once __DIR__ . '/models/modelnews.php';
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
