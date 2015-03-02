<?php

class View
    implements Iterator
{    protected $data = [];
    public function assign($name, $value)
    {
        $this->data[$name] = $value;
    }
    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }
    public function __get($k)
    {
        return $this->data[$k];
    }
    public function display($template)
    {
       foreach ($this->data as $key =>$val){
           $$key = $val;
       }
        include __DIR__ . '/../views/ . $template';

     }

    public function current()
    {
    }
    public function next()
    {
    }
    public function key()
    {
    }
    public function valid()
    {
    }
    public function rewind()
    {
    }
}