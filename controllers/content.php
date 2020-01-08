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
        $this->view->render('content/index', true);
    }

    function asyncGetListings()
    {
        $event = $_POST["event"];
        $table = "content";
        $where = "event = :event";
        $params = array(":event" => $event);

        $this->dal->asyncGetListings($table, $where, $params);
    }

    function asyncEdit()
    {
        $id = $_POST["id"];
        $data = array("text" => $_POST["value"]);
        $table = "content";

        $this->dal->asyncEdit($table, $data, $id);
    }

    function asyncInsert()
    {
        return $this->dal->asyncInsert();
    }


    function xhrGetListings()
    {
        $this->dal->asyncGetListings();
    }

    function xhrDeleteListing()
    {
        $this->dal->asyncDeleteListing();
    }

}