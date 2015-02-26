<?php

class View {
    public function display($newspage, $items)
    {
        if (!empty($newspage)){
               header('Location:/'.$newspage);
        }else{
            return false;
        }
     }
}