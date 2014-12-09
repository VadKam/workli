<?php

// Подключаем фаил функции подключения к БД, 
require_once __DIR__ . '/../functions/db.php';

//Создаём Функцию, куда помещаем все данные из таблицы
function News_getAll()
{
    return DBQuery("
      SELECT * FROM news
    ");
}




// Передайм данные методом пост в БД
function Add_news()
{
    $title = $_POST["title"];
    $text = $_POST["text"];
    $date = date_create();
    $date1 = date_format($date, 'Y-m-d') . "\n";
    return DBQuery("
        INSERT INTO news(`title`, `text`, `datanews`)
            VALUES($title, $text, $date1)
    ");
}


