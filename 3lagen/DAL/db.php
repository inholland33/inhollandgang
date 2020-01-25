<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'haarlemfestival');
class DB
{

    private $serverName;
    private $userName;
    private $dbpwd;
    private $dbName;

    protected function connect(){
        // the connection to the db
        $this->serverName = "localhost";
        $this->userName = "root";
        $this->dbpwd = "";
        $this->dbName = "haarlemfestival";

        $conn = new mysqli($this->serverName, $this->userName, $this->dbpwd, $this->dbName);

        return $conn;
    }

    protected function dbconnenct()
    {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
            $pdo = new PDO($dsn, DB_USER, DB_PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }


}