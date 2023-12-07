<?php

namespace Classes;

//require 'config.php';

class DbConfig extends Database
{

    private static $db;

    /**
     * @return mixed
     */
    public static function getDb(): mixed
    {
        if (self::$db === null){
            self::$db = new Database();
        }
        return self::$db;
    }

    /**
     * @return void
     * 404 Error
     */
    public static function notFound(){
        header("HTTP/1.0 404 Not Found");
        //$p = 'deconnexion';
        echo "<script></script><meta http-equiv='Refresh' CONTENT='0;URL=index.php'>";
    }

    /**
     * @return string
     * display when entity haven't data
     */
    public static function noRecordFound(): string
    {
        return "<p class='text-muted'>no record found</p>";
    }

    /**
     * @return mixed
     * get last insertion ID
     */
    public static function LastInsert(): mixed
    {
        return self::getDb()->LastInsertId();
    }

}
