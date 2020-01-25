<?php

class Help extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->view->css = array('public/css/default.css');

    }

    public function other($arg = false)
    {

        $this->dal->sayhola();
        $this->index();

    }

    function index()
    {
        $this->view->title = 'Help';
        $this->view->render('help/index');
    }

}