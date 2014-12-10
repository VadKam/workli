<?php
/**
 * Created by PhpStorm.
 * User: Vad Kaminskiy
 * Date: 09.12.2014
 * Time: 21:28
 */
//Функция редиректа на страницу запроса иначе на главную
function redirect($http = false){
    if($http) $redirect = $http;
    else    $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : __DIR__;
    header("Location: $redirect");
    exit;
}