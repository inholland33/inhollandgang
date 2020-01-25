<?php
require_once '../includes/ticketpageInc.php';
require_once '../logic/ticket.php';
require_once '../DAL/Ticket_DAL.php';
require_once '../models/Ticket_model.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styleTickets.css">
</head>
<body>
    <header>
        <nav class="navigation">
            <ul id="social">
                <li><a href="http://instagram.com"><img src="images/insta.png"></a></li>
                <li><a href="http://facebook.com"><img src="images/facebook.png"></a></li>
                <li><a href="http://twitter.com"><img src="images/twitter.png"></a></li>
            </ul>
                <a href="index.php" id="home">HAARLEM FESTIVAL</a>
            <ul id="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="ticketpage.php">Tickets</a></li>
                <li><a href="shoppingcartindex.php">Shoppingcart</a></li>
            </ul>
                <a href="index.php" id="logina">Login</a>

        </nav>
    </header>
