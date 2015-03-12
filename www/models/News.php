<?php

/**
 * Class NewsModel
 * @property $id
 * @property $title
 * @property $text
 */
namespace Application\Models;
class News
    extends \Application\Classes\AbstractModel
{
    protected static $table = 'news';

}