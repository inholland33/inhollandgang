<?php
$ticketList = $_POST['ticketList'];

$_SESSION['ticketsCart'] = $ticketList;

echo "<p>$ticketList</p>";
//header("Location: ../interface/chose_payment.php");
