<?php
/**
 * Created by PhpStorm.
 * User: Vad Kaminskiy
 * Date: 09.12.2014
 * Time: 16:00
 */
// подключение модель
require_once __DIR__ . '/../models/modelnews.php';

if($_POST['title'] && $_POST['text']){
    add_news();
    //redirect();
}


/*

//add_news();

var_dump($title);*/