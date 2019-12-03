<?php

class Content extends Controller
{

    function __construct()
    {
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = array('content/js/default.js');
    }

    function index()
    {
        $this->view->render('content/index');
        $this->view->title = "Content";
    }

    function logout()
    {
        Session::destroy();
        header('location: ' . URL . 'login');
        exit;
    }

    function xhrInsert()
    {
        $this->dal->xhrInsert();
    }

    function xhrGetListings()
    {
        $this->dal->xhrGetListings();
    }

    function xhrDeleteListing()
    {
        $this->dal->xhrDeleteListing();
    }

}