<?php
/**
 * Created by PhpStorm.
 * User: Vad Kaminskiy
 * Date: 09.12.2014
 * Time: 15:57
 */
require 'boot.php';


/*
require_once __DIR__ . '/models/newmodel.php';
require_once __DIR__ . '/models/modelnews.php';
*/
$news = new News();
$view = new View();

$view->articles = $news->AllNews();
echo ($view->display('allnews.php'));


























/* Из массива в объект: *//*
function array2object($massiv) {

    if (is_array($massiv)) :
        $obiect = new StdClass();

        foreach ($massiv as $kluch => $znachenie) :
            $obiect->$kluch = $znachenie;
        endforeach;

    else :
        $obiect = $massiv;
    endif;

    return $obiect;
}

/* Из объекта в массив: *//*
function object2array($obiect) {
    if (is_object($obiect)) :
        foreach ($obiect as $kluch => $znachenie) :
            $massiv[$kluch] = $znachenie;
        endforeach;
    else :
        $massiv = $obiect;
    endif;
    return $massiv;
}

/* Пример использования: */
/*
$massiv = array('foo' => 'bar', 'one' => 'two', 'three' => 'four');

$obiect = array2object($massiv);


print $obiect->three; // - выведет "four".

$mas = object2array($obiect);

print $mas['foo']; // - выведет "bar".*/