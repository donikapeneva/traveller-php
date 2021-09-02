<?php

class Database {

    private static $instance = null;

    private $connection;

    private function __construct(){
        $host = "localhost";
        $db   = "travelers";
        $user = "testuser";
        $pass = "testuser";

        $this->connection = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    }

    public static function getInstance(){
        if(Database::$instance == null) {
            Database::$instance = new Database();
        }
        return Database::$instance;
    }

    public function getConnection(){
        return $this->connection;
    }
}
?>