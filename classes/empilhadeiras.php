<?php
include("/xampp/htdocs/Codigos/matrix-copia/config/config.php");

class Empilhadeiras 
{
    private static $conn;
    
    public static function getInstance()
    {
        if (empty(self::$conn))
        {

            self::$conn = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASS);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$conn;
    }

    public static function all()
    {

    }

    public static function edit($id)
    {


    }

    public static function save($id)
    {

    }

    public static function delete($id)
    {


    }

    public static function hist($id)
    {

    }
}



?>