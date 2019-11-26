<?php

class Model
{
    /**
     * Model constructor.
     *
     * :export hfa3.infhaarlem.nl database to localhost.haarlemfestival
     */

    function __construct()
    {
        $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
    }

}