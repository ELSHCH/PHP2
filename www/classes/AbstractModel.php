<?php
/**
 * Created by PhpStorm.
 * User: shcheki
 * Date: 05.03.2015
 * Time: 18:33
 */
namespace Application\Classes;
use Application\Classes\E404Exception as E404Exception;
use Application\Classes\DB as DB;

class AbstractModel implements IModel{

    static protected $table;
    protected $data = [];
    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }
    public function __get($k)
    {
        return $this->data[$k];
    }
    public function __isset($k)
    {
       return isset($this->data[$k]);
    }
    public static function findAll()
    {
        $class = get_called_class();
        $sql = 'SELECT * FROM '. static::$table . ' ORDER BY date DESC';
        $db = new DB();
        $db->setClassName($class);
        return $db->query($sql);
    }

    public static function findOneByPk($id)
    {
        $class = get_called_class();
        $sql = 'SELECT * FROM '. static::$table . ' WHERE id=:id';
        $db = new DB();
        $db->setClassName($class);
        $res= $db->query($sql, [':id' => $id])[0];
        if (!empty($res)) {
            return $res;
        }
        return false;
    }
    public static function findByColumn($column, $value)
    {
        $db = new DB();
        $db->setClassName(get_called_class());
        $sql = ' SELECT * FROM '. static::$table . ' WHERE '. $column .'=:value';
        $res= $db->query($sql, [':value' => $value])[0];
        if (!empty($res)) {
            return $res[0];
        }
        return false;
    }
    protected function insert()
    {
        $db = new DB();
        $cols = array_keys($this->data);
        $colsPrepare = array_map(function($col_name) { return ':' . $col_name;}, $cols);
        $dataExec = [];
        foreach ($this->data as $key => $value) {
            $dataExec[':' . $key] = $value;
        }
        $sql = 'INSERT INTO ' . static::$table . ' (' . implode(', ', $cols) . ') VALUES (' . implode(', ', $colsPrepare) . ') ';
        $res = $db->execute($sql, $dataExec);
        if (true == $res) {
            $this->id = $db->lastInsertId();
        }
        return $res;
    }
    protected function update()
    {
        $cols=[];
        $data=[];
        $dataEx=[];
        foreach ($this->data as $k => $v) {
            $dataEx[':'.$k] = $v;
            if ('id' == $k) {
                continue;
            }
            $data[] = $k. '=:' . $k;
        }
        $sql = ' UPDATE '. static::$table. ' SET ' .implode(', ', $cols) . 'WHERE id=:id';
        $db =new DB();
        return $db->execute($sql, $dataEx);

    }
    public function save()
    {
        $db = new DB();
        if (!isset($this->id)) {
            $this->update();
        } else {
            return $this->insert();
        }
    }
    public function delete($id)
    {
        $class = get_called_class();
        $sql = ' DELETE FROM ' . static::$table . ' WHERE id=:id';
        $db = new DB();
        $db->setClassName($class);
        return $db->execute($sql, [':id'=> $id]);
    }

    public static function findByPk($id)
    {
        // TODO: Implement findByPk() method.
    }
}