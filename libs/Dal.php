<?php

class Dal
{
    private static $instance = null;
    public $db;
    private $con;


    private function __construct()
    {
        $this->con = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Dal();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->con;
    }
}

