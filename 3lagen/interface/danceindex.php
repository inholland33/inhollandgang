<?php
// Een header en een navigatiebalk toevoegen aan de pagina.
// Ook de logicalaag aanroepen zodat er content ingeladen kan worden vanuit de DB.
require 'header.php';
require 'navbar.php';
require '../logic/content.logic.php';
$contentLogic = new ContentLogic();
$contentLogic->GetContentDancePage();
?>
<main>
    <!--    Hier roep ik variabele aan die in de logica laag uit de database worden gehaald, ik zet ze dan in de juiste elementen.-->
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
<!--        Hier maak ik twee knoppen die naar de programpage en ticketpage gaan. Ik geef een variabele event mee in de url zodat op de ticketpagina direct naar het dance event kan worden genavigeerd.-->
        <section class="navigationbuttons">
            <div id="forms">
                <form action="ticketpage.php?event=dance">
                    <button type="submit" class ="gototicketpage" id="gototicketpagejazz">TICKETS</button>
                </form>
                <form action="index.php">
                    <button type="submit" class = "gotoprogrammpage" id="gotoprogrammpagejazz">PROGRAMM</button>
                </form>
            </div>
        </section>
    </div>
</main>
<?php
require 'footer.php';
?>
