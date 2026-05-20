<?php

class Database
{

    private static $conn;

    public static function conectar()
    {

        if (!self::$conn) {

            try {

                self::$conn = new PDO(

                    "mysql:host=" . HOST . ";dbname=" . DBNAME,

                    USER,

                    PASSWORD

                );

                self::$conn->setAttribute(
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION
                );
            } catch (PDOException $e) {

                die("Erro na conexão: "
                    . $e->getMessage());
            }
        }

        return self::$conn;
    }
}
