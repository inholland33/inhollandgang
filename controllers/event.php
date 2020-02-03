<?php

class Event extends Controller
{

    function __construct()
    {
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = array('public/js/cms.js', 'views/event/js/default.js');
        $this->view->css = array('public/css/cms.css', 'views/event/css/invoice.css');
        $this->view->user = $_SESSION['user']->name;
    }

    function index()
    {
        $this->view->title = "Event Management";
        $this->view->render('event/index', true);
    }

    function asyncGetTicket()
    {

        $data = $this->setupGetTicket();

        $sql = $data[0];
        $params = $data[1];

        $this->dal->asyncGetListings($sql, $params);
    }

    function asyncReturnTicket()
    {

        $data = $this->setupGetTicket();

        $sql = $data[0];
        $params = $data[1];

        return $this->dal->asyncReturnListings($sql, $params);
    }

    function setupGetTicket()
    {
        $ticket_id = $_POST["ticket_id"];

        $tables = ["ticket", "ticket_artist", "artist"];
        $where = "t.ticket_id = :ticket_id";
        $params = array(":ticket_id" => $ticket_id);

        $sql = "SELECT T.ticket_id, T.name, T.type, T.event, T.price, T.stock, T.start_date_time, T.end_date_time, A.artist_id 
          FROM $tables[0] AS T 
          JOIN $tables[1] AS TA ON T.ticket_id = TA.ticket_id  
          JOIN $tables[2] AS A ON TA.artist_id = A.artist_id
          WHERE $where ORDER BY T.ticket_id";
        $data = [$sql, $params];

        return $data;
    }

    function asyncGetListings()
    {
        $event = $_POST["event"];

        $tables = ["ticket", "ticket_artist", "artist"];
        $where = "event = :event";
        $params = array(":event" => $event);

        $sql = "SELECT T.ticket_id, T.name AS ticketName, T.type, T.event, T.price, T.stock, T.start_date_time, T.end_date_time, A.name AS artistName 
          FROM $tables[0] AS T 
          JOIN $tables[1] AS TA ON T.ticket_id = TA.ticket_id  
          JOIN $tables[2] AS A ON TA.artist_id = A.artist_id
          WHERE $where ORDER BY T.ticket_id";
        $this->dal->asyncGetListings($sql, $params);
    }

    function asyncGetArtists()
    {
        $tables = ["artist"];
        $sql = "SELECT artist_id, name FROM $tables[0]";

        $this->dal->asyncGetListings($sql);
    }

    function create()
    {
        isset($_POST['artists']) ? $_POST['artists'] : header("Location: {$_SERVER['HTTP_REFERER']}");
        $data = array(
            array(
                'name' => $_POST['name'],
                'event' => $_POST['event'],
                'type' => $_POST['type'],
                'price' => $_POST['price'],
                'stock' => $_POST['stock'],
                'start_date_time' => $_POST['start_date_time'],
                'end_date_time' => $_POST['end_date_time']),
            array(
                'artists' => $_POST['artists']
            ));

        $this->dal->create($data);

        header("location: " . URL . "event");
    }

    function edit()
    {

        isset($_POST['artists']) ? $_POST['artists'] : header("Location: {$_SERVER['HTTP_REFERER']}");
        $data = array(
            array(
                'name' => $_POST['name'],
                'ticket_id' => $_POST['ticket_id'],
                'event' => $_POST['event'],
                'type' => $_POST['type'],
                'price' => $_POST['price'],
                'stock' => $_POST['stock'],
                'start_date_time' => $_POST['start_date_time'],
                'end_date_time' => $_POST['end_date_time']),
            array(
                'artists' => $_POST['artists']
            ));
        $tables = ["ticket", "ticket_artist"];

        $this->dal->edit($tables[0], $data);

        header("location: " . URL . "event");
    }

    function asyncDeleteTicket()
    {

        $ticket_id = $_POST['ticket_id'];

        $tables = ["ticket_artist", "ticket"];
        $where = "ticket_id = :ticket_id";
        $params = array(":ticket_id" => $ticket_id);
        $this->dal->asyncDeleteListing($tables, $where, $params);
    }

    function asyncSwapTickets()
    {

        $_POST['json'] = false;

        //$ticket1 = asyncGetTicket(ticketID1)
        $_POST['ticket_id'] = $_POST['ticket_id1'];
        $ticket1 = $this->asyncReturnTicket();

        //$ticket2 = asyncGetTicket(ticketID2)
        $_POST['ticket_id'] = $_POST['ticket_id2'];
        $ticket2 = $this->asyncReturnTicket();

        $ticket1 = $ticket1[0];
        $ticket2 = $ticket2[0];

        //Create temporary tickets
        $ticketTemp1 = $ticket1;
        $ticketTemp2 = $ticket2;

        $table = "ticket";

        //Edit Ticket2 with properties of Ticket1
        $data = array(
            array(
                'ticket_id' => $ticket1['ticket_id'],
                'start_date_time' => $ticket2['start_date_time'],
                'end_date_time' => $ticket2['end_date_time']
            )
        );
        $this->dal->edit($table, $data, false);

        //Edit Ticket1 with properties of Ticket2
        $data = array(
            array(
                'ticket_id' => $ticket2['ticket_id'],
                'start_date_time' => $ticket1['start_date_time'],
                'end_date_time' => $ticket1['end_date_time']
            )
        );
        $this->dal->edit($table, $data, false);

        if (($ticket1["start_date_time"] == $ticketTemp2["start_date_time"]) && ($ticket2["start_date_time"] == $ticketTemp1["start_date_time"])) {
            echo json_encode("result:true");
        } else {
            echo json_encode("result:false");

        }

    }

    function getEnum($table, $field)
    {
        $this->dal->getEnum('ticket', 'event');
    }
}