<?php
/**
 * Created by PhpStorm.
 * User: Vladislav
 * Date: 14.12.2014
 * Time: 15:26
 */
require_once __DIR__ . '/modelnews.php';


// Класс, который будет хранить в себе все, что угодно
class Storage
    implements Countable, Iterator
{
    private $__data = [];
    // Магия, котороя вызывается каждый раз когда есть значение, которое не описанно в классе. Что делать с ним определяем сами
    public function __set($key, $value)
    {
        $this->__data[$key] = $value;
    }
    // Вызывается необъявленное недоступное свойство
    public function __get($key)
    {
        return $this->__data[$key];
    }
    // Countable
    public function count()
    {
        return count($this->__data);
    }

    // Иттератор - Интерфейс для внешних итераторов или объектов, которые могут повторять себя изнутри. Методы иттератор
    public function rewind()
    {

    }
    // Возвращает текущий элемент массива
    public function current()
    {
        return current($this->__data);
    }
    // Переходит к следующему элементу
    public function next()
    {
        return next($this->__data);
    }
    // Возвращает ключ текущего элемента
    public function key()
    {
        return  key($this->__data);
    }
    // Проверка корректности позиции
    public function valid()
    {
        return !empty($this->__data);
    }
    // Возвращает итератор на первый элемент
}



$st = new Storage();
$st->foo =  'foo1';
$st->bar = 'bar11';
echo count($st) . '<br>';
echo $st->foo . '<br>';
echo $st->bar . '<br>' . '<br>';

$st->massiv1 = ['foot', 'bike', 'car', 'plane'  => 'assoc'];
echo($st->current()) . '<br>'; // Первый элемент
echo($st->current()) . '<br>'; // Первый элемент
echo($st->next()) . '<br>'; // Второй элемент
var_dump($st->next()) . '<br>'; // Третий элемент ($st->massiv1)
var_dump($st->key()); // string 'massiv1' (length=7)

$st ->massiv2 = [
    'fruit1' => 'apple',
    'fruit2' => 'orange',
    'fruit3' => 'grape',
    'fruit4' => 'apple',
    'fruit5' => 'apple',
    'fruit6' => 'orange'
];

$st->next();
var_dump($st->key()); // string 'massiv2' (length=7)
var_dump($st->valid()); // true
$st->next();
echo count($st) . '<br>';
var_dump($st->valid()); // true

$st->rewind();
echo($st->next());






class Views
    implements Iterator
{
    public function render($templates)
    {
        ob_start();
        include __DIR__ . '/../' . 'views/' . $templates;
        $ret = ob_get_contents();
        ob_end_clean();
        return $ret;
    }
    private $__all = [];
    public function __set($key, $value)
    {
        $this->__all[$key] = $value;
    }
    // Вызывается необъявленное недоступное свойство
    public function __get($key)
    {
        return $this->__all[$key];
    }
    public function current()
    {
        return current($this->__all);
    }
    public function next()
    {
        next($this->__all);
    }
    public function key()
    {
        return key($this->__all);
    }
    public function valid()
    {
        return isset($this->__all[$this->key()]);
    }
    public function rewind()
    {
        reset($this->__all);
    }
}

$news = new News();
$views = new Views;
$views->articles = $news->AllNews(); // Передаем во view данные
$html = $views->render('allnews.php'); // Записываем в переменную и вызываем отображение шаблона с ранее переданными данными
var_dump($html);








/*github/workli/views/allnews.php*/
//$html; // Ошибка  Invalid argument supplied for foreach()
    /*var_dump($views->articles); // Выводит массив новостей*/
    //echo($views->current()) . '<br>'; // Первый элемент
/*foreach ($views->articles as $key => $value) {
    echo($value['title']) . '<br>'; //Работает
}*/

//echo($html); // шаблон



/*
var_dump($view->render('allnews.php')); // шаблон
$html = $view->render('allnews.php');
*/






















// В качестве типа можно указать интерфейс, некий фильир
// function statAuthors(IHasAuthor $obj){}