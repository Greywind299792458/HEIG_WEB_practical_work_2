<?php
class Database
{
    private static $host = 'localhost:3306';
    private static $db_name = 'mariadb';
    private static $username = 'mariadb';
    private static $password = 'mariadb';
    private static $pdo;

    public static function connect()
    {
        if (!isset(self::$pdo)) {
            try {
                self::$pdo = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db_name, self::$username, self::$password);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erreur de connexion : " . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}
