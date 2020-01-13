<?php
require 'header.php';
require 'navbar.php';
require '../logic/content.logic.php';
$contentLogic = new ContentLogic();
$contentLogic->GetContentDancePage();
?>
<main>
    <div class = "container">
        <section id="headerdance">
            <h1 class="titel"><?php echo $contentLogic->content->titel ?></h1>
            <h2 class="ondertitel"><?php echo $contentLogic->content->onderTitel ?></h2>
        </section>
        <section class="inleiding">
            <h2><?php echo $contentLogic->content->introTitle ?></h2>
            <p><?php echo $contentLogic->content->intro ?></p>
        </section>
        <article id="lineup">
            <h2><?php echo $contentLogic->content->article1Title ?></h2>
            <hr>
            <p><?php echo $contentLogic->content->article1 ?></p>
        </article>
        <article id="venues">
            <h2><?php echo $contentLogic->content->article2Title ?></h2>
            <hr>
            <p><?php echo $contentLogic->content->article2 ?></p>
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
