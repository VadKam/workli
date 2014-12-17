<?php
/**
 * Created by PhpStorm.
 * User: Vladislav
 * Date: 17.12.2014
 * Time: 14:24
 */
function __autoload($class)
{
    require 'classes/' . $class . '.php';
}