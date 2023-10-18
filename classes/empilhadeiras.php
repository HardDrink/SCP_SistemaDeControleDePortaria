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
        $conn = self::getInstance();

        $sql = "SELECT * FROM empilhadeiras ORDER BY id_emp";

        $result = $conn->query($sql);

        return $result->fetchAll();
    }
}
?>