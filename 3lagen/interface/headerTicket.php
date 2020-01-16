<?php
require_once '../includes/ticketpageInc.php';
require_once '../logic/ticket.php';
require_once '../DAL/Ticket_DAL.php';
require_once '../models/Ticket_model.php';
session_start();
?>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav class="navigation">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="ticketpage.php">Tickets</a></li>
                <li><a href="cart.php">Shopping cart</a></li>
            </ul>
        </nav>
    </header>
