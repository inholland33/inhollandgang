<?php


class DB
{
     function connect(){
        $conn = new mysqli('localhost', 'root', '', 'haarlemfestival');
        return $conn;
    }
}