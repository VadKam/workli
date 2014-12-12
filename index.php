<?php
/**
 * Created by PhpStorm.
 * User: Vad Kaminskiy
 * Date: 09.12.2014
 * Time: 15:57
 */
require_once __DIR__ . '/models/modelnews.php';
$news = $News_getAll->ret;
include __DIR__ . '/views/allnews.php';



