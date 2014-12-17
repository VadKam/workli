<?php
/**
 * Created by PhpStorm.
 * User: Vladislav
 * Date: 17.12.2014
 * Time: 14:20
 */
require __DIR__ . '/../functions/db.php';
//Создаем абстракиный класс Article наследующий DBConnect
abstract class Article
    extends DBConnect
{
    abstract public function insertArticle($title, $text, $datanews);
    abstract public function selectArticle($id);
    abstract public function updateArticle($id, $new_title, $new_text);
}