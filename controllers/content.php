<?php

class Content extends Controller
{

    function __construct()
    {
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = array('public/js/cms.js', 'views/content/js/default.js');
        $this->view->css = array('public/css/cms.css', 'views/content/css/content.css');
    }

    function index()
    {
        $this->view->title = "Content Management";
        $this->view->user = $_SESSION['user']->name;
        $this->view->render('content/index', true);
    }


    function asyncGetListings()
    {
        $page = $_POST["page"];

        $table = "content";
        $where = "page = :page";
        $params = array(":page" => $page);

        $this->dal->asyncGetListings($table, $where, $params);
    }

    function asyncEdit()
    {
        $table = "content";
        $id = $_POST["id"];
        $text = array("text" => $_POST["value"]);
//        $data = new Content_Model($id, null, null, $text);

        $this->dal->asyncEdit($table, $id, $text);
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