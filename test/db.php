<?php
require "../libs/Dal.php";


class db extends Dal
{


    function __construct()
    {
        $this->db = parent::getInstance()->getConnection();
    }
}

$db = new db();
