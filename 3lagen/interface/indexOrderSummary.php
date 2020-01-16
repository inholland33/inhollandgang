<?php
require 'headerSearch.php';
//require 'navbar.php';
require '../logic/content.logic.php';

$contentLogic = new ContentLogic();
$contentLogic->GetOrderSummary($orders);

?>
<main>

    <div class = "container">
        <section id="headerOrdersList">
            <h1 class="titel"><?php echo $contentLogic->content->titel ?></h1>
            <h2 class="ondertitel"><?php echo $contentLogic->content->onderTitel ?></h2>
        </section>
        <section class="inleiding">
            <h2><?php echo $contentLogic->content->introTitle ?></h2>
            <p><?php echo $contentLogic->content->intro ?></p>
        </section>
        <article>


        </article>

        <section class="navigationbuttons">
            <button type="button" class ="gototicketpage" id="gototicketpagedance" action="">TICKETS</button>
            <button type="button" class = "gotoprogrammpage" id="gotoprogrammpagedance"action="">PROGRAMM</button>
        </section>
    </div>
</main>
<?php
require 'footer.php';
?>
