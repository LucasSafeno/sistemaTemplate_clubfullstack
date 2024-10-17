<?php

namespace app\framework\database;

use PDO;

class Connection
{
    private static $connection = null;

    public static function getconnection()
    {
        if(empty(self::$connection))
        {
            self::$connection = new PDO("mysql:host=localhost;dbname=sistema_templates","root", "root",[
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            ]);
        }

        return self::$connection;
    }

}
