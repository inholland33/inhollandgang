<?php


// Create connection
function sendImage( $Name, $Source) {

    $dbhost = 'localhost';
    $dbuser = 'hfa3';
    $dbpass = 'vlbEv6Vs';
    $db = 'hfa3_db';
$conn  = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO images ( name, source)
VALUES ('$Name', '$Source')";

    if(mysqli_query($conn, $sql)){
        echo "Records inserted successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

// Close connection
    mysqli_close($conn);

$conn->close();
}
?>