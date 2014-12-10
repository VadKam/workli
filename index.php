<?php
/**
 * Created by PhpStorm.
 * User: Vad Kaminskiy
 * Date: 09.12.2014
 * Time: 15:57
 */
header("Content-Type: text/html; charset=utf-8");
require_once __DIR__ . '/models/modelnews.php';
require_once __DIR__ . '/controllers/controllernews.php';

$news = News_getAll();
include __DIR__ . '/views/cssjs.php';
include __DIR__ . '/views/allnews.php';



