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
        //Load in the DAL with the same name as the controller
        $pathDal = 'dal/' . $name . '_dal.php';

        if (file_exists($pathDal)) {
            require $pathDal;

            $dalName = $name . '_Dal';
            $this->dal = new $dalName();
        }
    }

    public function loadModel($name)
    {
        //Load in the MODEL with the same name as the controller
        $pathModel = 'models/' . $name . '_model.php';

        if (file_exists($pathModel)) {
            require $pathModel;
        }
    }
}