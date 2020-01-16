<?php
$amount = $_POST['amount'];
$name = $_POST['name'];
if(isset($_POST['increase'])){
    $amount++;
    foreach ($_SESSION['ticketsCart'] as $item){
        if($item->ticketName == $name){
            $key = key($_SESSION['ticketsCart']);
        }
    }
    $_SESSION['ticketsCart'][$key]->ticketAmount = $amount;
    header("Location: /inhollandgang/3lagen/interface/shoppingcartindex.php");
}
elseif(isset($_POST['decrease'])){
    $amount--;
    foreach ($_SESSION['ticketsCart'] as $item){
        if($item->ticketName == $name){
            $key = key($_SESSION['ticketsCart']);
        }
    }
    $_SESSION['ticketsCart'][$key]->ticketAmount = $amount;
    header("Location: /inhollandgang/3lagen/interface/shoppingcartindex.php");
}
else{
    header("Location: error");
}