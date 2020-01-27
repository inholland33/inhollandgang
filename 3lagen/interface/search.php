<?php
require 'headerSearchResult.php';
require 'navbar.php';
require '../models/search_model.php';
session_start();
/*$contentLogic = new ContentLogic();
$contentLogic->GetContentJazzPage();*/

?>

<main>
    <div class="container">
        <div id = "shoppingcartcontainer">

            <h1>Search results</h1>

            <?php

            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $db = 'haarlemfestival';
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
            $input = $_GET["search"];
            if ($conn) {
                echo '';
            } else {
                echo 'Could not connect: ' . mysqli_connect_error();
            }
            //fetch

            $spl = "SELECT `text` from `content` WHERE (`text` LIKE '%".$input."%')";

            $result = mysqli_query($conn, $spl);

            $book = mysqli_fetch_all($result, MYSQLI_ASSOC);



            foreach ($book as $item) {
                echo implode($item);
                echo "<br>";
                echo "<br>";


            }

            ?>





        </div>
    </div>
</main>

<?php
require 'footer.php';
?>

