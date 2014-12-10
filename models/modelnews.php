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

// Отдельная страница. Создаём функцию, которая получает полученный id и сравнивает
function News_getOne($pagenews_id){
    // Отбираем id такое же как и полученное, обрабатываем общей функцией
    return DBQuery("
      SELECT title, text, datanews FROM news WHERE id = $pagenews_id
    ");
}


/* // Также только более понятно
function Get_Page($pagenews_id){
$query = "SELECT title, text, datanews FROM news WHERE id = $pagenews_id";
    $res = mysql_query($query);    // Посылает запрос MySQL /устарело
    $get_page = array();
    $get_page = mysql_fetch_assoc($res);  //Возвращает ассоциативный массив, соответсвующий полученному ряду и сдвигает вперед внутренний указатель результата. / устарело
    return $get_page;
}*/

// Передайм данные методом пост в БД
function Add_news()
{
    $title = $_POST["title"];
    $text = $_POST["text"];
    $date = date_create();
    $datanews = date_format($date, 'Y-m-d') . "\n";
    if(empty($title)) echo '<li>Введите текст статьи</li>';  // Не работает
    if(empty($text)) echo '<li>Введите текст статьи</li>'; // Не работает
    DBConnect();
    $query = "INSERT INTO news (title, text, datanews)
                        VALUES ('$title', '$text', '$datanews')";
    $res = mysql_query($query);
    return $res;
}

