<?php
require 'headerSearch.php';
require 'navbar.php';
require '../models/search_model.php';
session_start();
/*$contentLogic = new ContentLogic();
$contentLogic->GetContentJazzPage();*/

?>

<main>
    <div class="container">
        <div id = "shoppingcartcontainer">
            <h1>Search </h1>
            <form action=" search.php" method="get">
                <TEXTAREA   name="search"  ROWS="2" /></TEXTAREA>
                <input type="submit" value="button1" name="button1"/>
            </form>
        </div>
    </div>
</main>

<?php
require 'footer.php';
?>

