<?php
$dbhost = 'localhost';
$dbuser = 'hfa3';
$dbpass = 'vlbEv6Vs';
$db = 'hfa3_db';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);

if( !$conn ) {
    echo'Could not connect: ' . mysqli_connect_error();
}
//fetch
$spl = "SELECT 'user_id', 'name' from 'user'";

$result = mysqli_query($conn, $spl);

$book= mysqli_fetch_all($result, MYSQLI_ASSOC);
print_r($book);
?>
