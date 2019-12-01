<?php

class Manonthemoon_Dal extends Dal
{

    function __construct()
    {
        $this->db = parent::getInstance()->getConnection();
    }

}