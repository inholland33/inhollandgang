<?php
require 'header.php';
require 'navbar.php';
require '../logic/content.logic.php';
$contentLogic = new ContentLogic();
$contentLogic->GetContentJazzPage();
?>
<main>
    <div class = "container">
        <section id="headerjazz">
            <h1 class="titel"><?php echo $contentLogic->content->titel ?></h1>
            <h2 class="ondertitel"><?php echo $contentLogic->content->onderTitel ?></h2>
        </section>
        <section class="inleiding">
            <h2><?php echo $contentLogic->content->introTitle ?></h2>
            <p><?php echo $contentLogic->content->intro ?></p>
        </section>

        <article id="mainhall">
            <h2><?php echo $contentLogic->content->article1Title ?></h2>
            <hr>
            <p><?php echo $contentLogic->content->article1 ?></p>
        </article>
        <article id="secondhall">
            <h2><?php echo $contentLogic->content->article2Title ?></h2>
            <hr>
            <p><?php echo $contentLogic->content->article2 ?></p>
        </article>
        <article id="thirdhall">
            <h2><?php echo $contentLogic->content->article3Title ?></h2>
            <hr>
            <p><?php echo $contentLogic->content->article3 ?></p>
        </article>
        <article id="grotemarkt">
            <h2><?php echo $contentLogic->content->article4Title ?></h2>
            <hr>
            <p><?php echo $contentLogic->content->article4 ?></p>
        </article>
        <section class="navigationbuttons">
            <button type="button" class ="gototicketpage" id="gototicketpagejazz"action="">TICKETS</button>
            <button type="button" class = "gotoprogrammpage" id="gotoprogrammpagejazz"action="">PROGRAMM</button>
        </section>
    </div>
</main>
<?php
require 'footer.php';
?>

