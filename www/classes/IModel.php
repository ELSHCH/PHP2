<?php
/**
 * Created by PhpStorm.
 * User: shcheki
 * Date: 12.03.2015
 * Time: 10:39
 */

namespace Application\Classes;

interface IModel {
    public static function findAll();
    public static function findByPk($id);
    public static function findByColumn($column, $value);
    public function save();
    public function delete($id);
}
?>