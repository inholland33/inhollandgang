<?php

class Event extends Controller
{

    function __construct()
    {
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = array('public/js/cms.js', 'views/event/js/default.js');
        $this->view->css = array('public/css/cms.css', 'views/event/css/event.css');
        $this->view->user = $_SESSION['user']->name;
    }

    function index()
    {
        $this->view->title = "Event Management";
        $this->view->render('event/index', true);
    }


    function asyncGetListings()
    {
        $event = $_POST["event"];

        $tables = ["ticket", "ticket_artist", "artist"];
        $where = "event = :event";
        $params = array(":event" => $event);

        $this->dal->asyncGetListings($tables, $where, $params);
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