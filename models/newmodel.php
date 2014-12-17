<?php
require_once __DIR__ . '/modelnews.php';

// Проверка итератора
class Storage
    implements Iterator, Countable
{
    private $data;
    function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    function __get($k)
    {
        $this->data[$k];
    }

    public function count()
    {
        return count($this->data);
    }

    public function current()
    {
        return current($this->data);
    }

    public function key()
    {
        return key($this->data);
    }

    public function next()
    {
        next($this->data);
    }

    public function valid()
    {
        $key = key($this->data);
        $var = ($key !== NULL && $key !== FALSE);
        return $var;
    }

    public function rewind()
    {
        reset($this->data);
    }


}
/*
$values = ['foot', 'bike',  'plane'  => 'assoc', '', 'car'];

$views = new Storage($values);

echo count($views) . '<br>';

foreach ($views as $key => $value) {
    print "$key: $value" . '<br>';
}
*/

class View
    extends Storage
{
    public function display($template)
    {
        ob_start();
        foreach ($this as $k => $v) {
            $$k = $v;
        }
        include __DIR__ . '/../' . 'views/' . $template;
        $ret = ob_get_contents();
        ob_get_clean();
        // $ret = str_replace("ё", "е", $ret);
        return $ret;
    }
}

$news = new News();
$view = new View();
$view->articles = $news->AllNews();
var_dump($view->articles);
/*
$tem = new Template();
$news = new News();

//$tem->news = $news->AllNews();

$html = $tem->render('11.php');
$html2 = $tem->render('allnews.php');


//$html = $views->render('allnews.php');*/







/*
ob_start();
include __DIR__ . '/../' . 'views/' . $templates;
$ret = ob_get_contents();
ob_end_clean();
return $ret;
*/


/*

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
/*var_dump($html);*/



































// В качестве типа можно указать интерфейс, некий фильир
// function statAuthors(IHasAuthor $obj){}