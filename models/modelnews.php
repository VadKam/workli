<?php

require_once __DIR__ . '/../functions/db.php';

//Создаем абстракиный класс Article наследующий DBConnect
abstract class Article
    extends DBConnect
{
    abstract public function insertArticle($title, $text, $datanews);
    abstract public function selectArticle($id);
    abstract public function updateArticle($id, $new_title, $new_text);
}

//Создаем класс News наследующий абстракиный класс Article
class News
    extends Article
{
        // Все статьи
    public function AllNews() {
        return $this->DBQuery("
    SELECT * FROM news
    ");
    }
    // Одна статья
    public function selectArticle($id) {
        return $this->DBQueryOne("
          SELECT * FROM news where id=$id
        ");
    }
        // Вставить в  БД
    public function insertArticle($title,$text,$datanews) {
        return $this->DBExec("
          INSERT INTO news (title,text,datanews) VALUES ('$title','$text', '$datanews')
        ");
    }

        // Обновить статью
    public function updateArticle($id, $new_title, $new_text) {
        return $this->DBExec("
            UPDATE news SET title='$new_title',text='$new_text' WHERE id='$id'
        ");
    }

}























/* БЕЗ ООП
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
    return DBQueryOne("
      SELECT title, text, datanews FROM news WHERE id = $pagenews_id
    ");
}

// Передайм данные методом пост в БД
function Add_news()
{
    $title = $_POST["title"];
    $text = $_POST["text"];
    $date = date_create();
    $datanews = date_format($date, 'Y-m-d') . "\n";
    if(empty($title)) include_once __DIR__ . '/../views/editnews.php'; echo '<li>Введите текст статьи</li>';  // Не работает
    if(empty($text)) include_once __DIR__ . '/../views/editnews.php'; echo '<li>Введите текст статьи</li>'; // Не работает
    DBConnect();
    $query = "INSERT INTO news (title, text, datanews)
                        VALUES ('$title', '$text', '$datanews')";
    $res = mysql_query($query);
    return $res;
}




// Также только более понятно
function Get_Page($get_page){
$query = "SELECT title, text, datanews";
    $res = mysql_query($query);    // Посылает запрос MySQL /устарело
    $get_page = array();
    $get_page = mysql_fetch_assoc($res);  //Возвращает ассоциативный массив, соответсвующий полученному ряду и сдвигает вперед внутренний указатель результата. / устарело
    return $get_page;
}*/






