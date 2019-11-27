<?php

class Help_Dal extends Dal
{

    function __construct()
    {
        $this->db = parent::getInstance()->getConnection();
    }

    function sayhola()
    {
        echo "¡Hola!";
    }

}