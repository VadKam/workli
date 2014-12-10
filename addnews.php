<?php
/**
 * Created by PhpStorm.
 * User: Vad Kaminskiy
 * Date: 10.12.2014
 * Time: 15:34
 */
require_once __DIR__ . '/models/modelnews.php';

if(!empty($_POST['title']) && !empty($_POST['text'])){
    add_news();
    include_once __DIR__ . '/views/addnews.php';
}

/*if($_POST['title'] || $_POST['text']){
    Add_news();
    redirect();
    var_dump($_POST['title']);
}*/