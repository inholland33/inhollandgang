<?php

class AboutUs_Dal extends Dal
{

    function __construct()
    {
        $this->db = parent::getInstance()->getConnection();
        //echo 'Help model';
    }

    public function Index()
    {

    }

}