<?php
/**
 * Created by PhpStorm.
 * User: shcheki
 * Date: 02.03.2015
 * Time: 12:56
 */

interface IModel {
   public static function getAll();
    public static function getOne($id);
    public static function addNew($id, $title, $text);
}