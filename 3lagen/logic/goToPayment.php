<?php
$ticketList = $_POST['ticketList'];

foreach ($ticketList as $item){
    foreach ($_SESSION['ticketsCart'] as $sesItem) {
        if ($item->ticketId == $sesItem->ticketId){
            $_SESSION['ticketsCart'][key($sesItem)]->ticketAmount =$item->ticketAmount;
        }
    }
}

header("Location: ../interface/chose_payment.php");
