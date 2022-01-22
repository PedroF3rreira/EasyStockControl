<?php
namespace core;

use \src\Config;

class Database {
    private static $_pdo;
    public static function getInstance() {
        if(!isset(self::$_pdo)) {
            try {
                self::$_pdo = new \PDO(Config::DB_DRIVER.":dbname=".Config::DB_DATABASE.";host=".Config::DB_HOST, Config::DB_USER, Config::DB_PASS);
                self::$_pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);    
            } catch (PDOException $e) {
                echo "Erro ".$e->getMessage();
            }
            
        }
        return self::$_pdo;
    }

    private function __construct() { }
    private function __clone() { }
    private function __wakeup() { }
}