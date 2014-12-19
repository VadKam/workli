<?php
/**
 * Created by PhpStorm.
 * User: Vladislav
 * Date: 19.12.2014
 * Time: 19:25
 */
abstract class AController
{
    public function action($name)
    {
        $actionName = 'action'.ucfirst($name);
        if (method_exists($this, $actionName)){
            $this->$actionName();
        }
    }
}