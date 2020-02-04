<?php

class Invoice extends Controller
{

    function __construct()
    {
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = array('public/js/cms.js', 'views/invoice/js/default.js');
        $this->view->css = array('public/css/cms.css', 'views/invoice/css/invoice.css');
        $this->view->user = $_SESSION['user']->name;
    }

    function index()
    {
        $this->view->title = "Invoices";
        $this->view->render('invoice/index', true);
    }


    function asyncGetListings()
    {

        $tables = ["`order`", "ticket_order", "ticket", "user"];

        $sql = "SELECT O.order_id, U.user_id, T.venue, SUM(T.price * TOR.amount) AS total_price, O.date_time, email, U.name 
          FROM $tables[0] O
          JOIN $tables[1] TOR ON TOR.order_id = O.order_id
          JOIN $tables[2] T   ON T.ticket_id  = TOR.ticket_id
          JOIN $tables[3] U   ON U.user_id    = O.user_id
          GROUP BY O.order_id";
        $this->dal->asyncGetListings($sql);
    }

    function generatePdf($order_id)
    {
//        $order_id = $_POST['order_id'];

        $tables = ["`order`", "ticket_order", "ticket", "user"];

        $where = "O.order_id = :order_id";
        $params = array(":order_id" => $order_id);

        $sql = "SELECT O.order_id, O.date_time, TOR.amount, T.venue, T.event, T.price, U.user_id, U.name AS user_name, email,  T.price * TOR.amount AS total_price
          FROM `order`      O
          JOIN ticket_order TOR ON TOR.order_id = O.order_id
          JOIN ticket       T   ON T.ticket_id  = TOR.ticket_id
          JOIN user         U   ON U.user_id    = O.user_id
          WHERE $where";

        $result = $this->dal->getListings($sql, $params);
        $_SESSION["data"] = $result;
        header("location: " . URL . "views/invoice/pdf.php");



    }
}