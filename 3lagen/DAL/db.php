<?php


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

}