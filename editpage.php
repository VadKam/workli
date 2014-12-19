<?php
/**
 * Created by PhpStorm.
 * User: Vad Kaminskiy
 * Date: 10.12.2014
 * Time: 15:29
 */
require 'boot.php';

$controller = new NewsController();
$controller->action('edit');
