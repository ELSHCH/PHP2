<?php
class DB
{
    public function __construct()
    {
        mysql_connect($config['db']['db_host'], $config['db']['db_root'], '');
        mysql_select_db($config['db']['db_name']);
    }
    public function querySql($sql)
    {
        $res=mysql_query($sql);
        if (false == $res){
            return false;
        } else {
            return $res;}
    }
    public function queryAll($sql, $class = 'stdClass')
    {
        $res = querySql($sql);
        if (false === $res) {
            return false;
        } else {
            $ret = [];
            while ($row = mysql_fetch_object($res, $class)) {
                $ret[] = $row;
            }
            return $ret;
        }
    }
    public function queryOne($sql, $class = 'stdClass')
    {
        return $this->queryAll($sql, $class)[0];
    }
}