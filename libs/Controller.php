<?php

class Controller
{

    function __construct()
    {
        //echo 'Main controller<br />';
        $this->view = new View();
    }

    public function loadDal($name)
    {

        $path = 'dal/' . $name . '_dal.php';

        if (file_exists($path)) {
            require $path;

            $dbName = $name . '_Dal';
            $this->dal = new $dbName();
        }
    }
}