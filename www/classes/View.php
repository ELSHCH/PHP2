<?php
/**
 * Created by PhpStorm.
 * User: shcheki
 * Date: 09.03.2015
 * Time: 10:21
 */

namespace Application\Classes;

class View  {

    protected $data = [];

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
        // foreach ($this->data as $key =>$val){
        //      $$key = $val;
        //  }
        foreach ($this->data as $key => $value){
            $$key=$value;
        }
         ob_start();
        include __DIR__ . '/../views/ . $template';
         $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

}