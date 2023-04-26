<?php
class Database{
    static public $DB;


    static public function connect($database){
        $db = mysqli_connect("database","root","password",$database);
        return $db; 
    }

    static public function rawSql($sql){
        $result =  mysqli_query(self::$DB, $sql);
        $arr = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $arr[] = $row;
        }

        return $arr;
    }
}