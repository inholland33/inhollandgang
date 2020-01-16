<?php

class Err extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->view->css = array('public/css/default.css');
    }

    function index()
    {
        $this->view->title = '404 Error';
        $this->view->msg = 'This page doesnt exist';
        $this->view->render('err/index');

    }

}