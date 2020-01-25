<?php

class Dashboard extends Controller
{

    function __construct()
    {
        parent::__construct();
        Auth::handleLogin();
//        $this->view->js = array('views/dashboard/js/default.js');
        $this->view->css = array('public/css/cms.css', 'views/dashboard/css/dashboard.css');
        $this->view->js = array('public/js/cms.js', '/views/dashboard/js/script.js');

    }

    function index()
    {
        $this->view->title = "Dashboard";
        $this->view->user = $_SESSION["user"]->name;
        $this->view->render('dashboard/index', true);
    }

    function logout()
    {
        Session::destroy();
        header('location: ' . URL . 'login');
        exit;
    }
}