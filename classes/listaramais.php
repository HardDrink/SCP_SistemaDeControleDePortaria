<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'intranet');

class Listaramais 
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
        $conn = self::getInstance();

        $sql = "SELECT * FROM telefones ORDER BY nome";
        $result = $conn->query($sql);

        return $result->fetchALL();
    }
}



?>