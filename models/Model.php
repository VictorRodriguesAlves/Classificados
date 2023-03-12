<?php
class Model{
    private static $instance;

    public static function getConn(){


        if(!isset(self::$instance)){
            self::$instance = new \PDO ('mysql:host='.DBHOST.';dbname='.DBNAME, DBUSER, DBPASS);
        }

        return self::$instance;

    }
    
}