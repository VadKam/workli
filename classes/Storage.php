<?php

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