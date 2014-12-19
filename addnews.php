<?php
/**
 * Created by PhpStorm.
 * User: Vad Kaminskiy
 * Date: 10.12.2014
 * Time: 15:34
 */
require 'boot.php';

$route = $_GET['r'];
$routeParts = explode('/', $route);

$controllerClassName = ucfirst($routeParts[0]).'Controller';

$controller = new $controllerClassName;
$controller->action($routeParts[1]);

//$controller = new NewsController();
//$controller->action('add');