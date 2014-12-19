<?php
require 'boot.php';

$route = $_GET['r'];
$routeParts = explode('/', $route);

$controllerClassName = ucfirst($routeParts[0]).'Controller';

$controller = new $controllerClassName;
$controller->action($routeParts[1]);

/*
$controller = new NewsController();
$controller->action('all');
*/
























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