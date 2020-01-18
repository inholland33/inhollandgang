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

        $sql = "SELECT T.ticket_id, T.name AS ticketName, T.type, T.price, T.stock, T.start_date_time, T.end_date_time, A.name AS artistName 
          FROM $tables[0] AS T 
          JOIN $tables[1] AS TA ON T.ticket_id = TA.ticket_id  
          JOIN $tables[2] AS A ON TA.artist_id = A.artist_id
          WHERE $where ORDER BY T.ticket_id";
        $this->dal->asyncGetListings($sql, $params);
    }

    function asyncGetArtists()
    {
        $tables = ["artist"];
        $where = "";
        $sql = "SELECT artist_id, name FROM $tables[0]";

        $this->dal->asyncGetListings($sql, $where);
    }

    function asyncEdit()
    {
        $id = $_POST["id"];
        $data = array("text" => $_POST["value"]);
        $table = "content";

        $this->dal->asyncEdit($table, $data, $id);
    }

    function insert()
    {
        $name = $_POST['name'];
        $event = $_POST['event'];
        $type = $_POST['type'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $start_date_time = $_POST['start_date_time'];
        $end_date_time = $_POST['end_date_time'];

        $artist = $_POST['artist'];
        return $this->dal->asyncInsert();
    }

    function asyncDeleteListing()
    {
        $id = $_POST['ticket_id'];

        $tables = ["ticket"];
        $where = "ticket_id = :ticket_id";
        $params = array(":ticket_id" => $id);
        $this->dal->asyncDeleteListing($tables, $where, $params);
    }

}