<?php


class DBClass {
    public $db_local;
    public $db_name;
    public $db_password;
    public $name_of_db;

    public function __construct($db_local,$db_name,$db_password,$name_of_db){
        $this->db_local = $db_local;
        $this->$db_name = $db_name;
        $this->$db_password = $db_password;
        $this->$name_of_db = $name_of_db;
    }

    public function db_connect($db_local,$db_name,$db_password){
        mysql_connect($db_local,$db_name,$db_password);
    }

    public function select_db($name_of_db){
        mysql_select_db($name_of_db);
    }

}