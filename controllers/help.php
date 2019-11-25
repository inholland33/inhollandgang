<?php

class Help extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function other($arg = false)
    {

        $this->model->sayhola();
        $this->index();

    }

    function index()
    {
        $this->view->title = 'Help';
        $this->view->render('help/index');
    }

}