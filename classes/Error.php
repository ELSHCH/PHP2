<?php
/**
 * Created by PhpStorm.
 * User: shcheki
 * Date: 26.02.2015
 * Time: 09:52
 */

class Error {
     public function set_error($message) {
        $_SESSION['error'] = (string)$message;
    }
     public function get_error() {
        if(!empty($_SESSION['error'])) {
            $msg = $_SESSION['error'];
            unset($_SESSION['error']);
            return $msg;
        }
        return false;
    }
}
?>
}