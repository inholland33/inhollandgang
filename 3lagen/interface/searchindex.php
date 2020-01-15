<?php
require 'headerSearch.php';
require 'navbar.php';
require '../logic/content.logic.php';

$contentLogic = new ContentLogic();
$contentLogic->GetContentSearchPage();

?>
<main>

    <div class = "container">
        <section id="headerSearch">
            <h1 class="titel"><?php echo $contentLogic->content->titel ?></h1>
            <h2 class="ondertitel"><?php echo $contentLogic->content->onderTitel ?></h2>
        </section>
        <section class="inleiding">
            <h2><?php echo $contentLogic->content->introTitle ?></h2>
            <p><?php echo $contentLogic->content->intro ?></p>
        </section>
        <article id="search">
            <select onchange="return cuisines">
                <option value="All cuisine">All cuisine</option>}
                <option value="Dutch">Dutch</option>}
                <option value="fish and seafood">fish and seafood</option>
                <option value="European">European</option>
                <option value="French">French</option>
                <option value="Internationaal">Internationaal</option>
                <option value="Modern">Modern</option>
                <option value="Steakhouse">Steakhouse</option>
                <option value="Argentinian">Argentinian</option>
                <option value="Aziatisch">Aziatisch</option>
            </select>
        </article>

        <article id="mrmrs">
            <h2><?php echo $contentLogic->content->article1Title ?></h2>
            <hr>
            <p><?php echo $contentLogic->content->article1 ?></p>
        </article>
        <article id="goldenbull">
            <h2><?php echo $contentLogic->content->article6Title ?></h2>
            <hr>
            <p><?php echo $contentLogic->content->article6 ?></p>
        </article>
        <article id="ratatouille">
            <h2><?php echo $contentLogic->content->article2Title ?></h2>
            <hr>
            <p><?php echo $contentLogic->content->article2 ?></p>
        </article>
        <article id="fris">
            <h2><?php echo $contentLogic->content->article4Title ?></h2>
            <hr>
            <p><?php echo $contentLogic->content->article4 ?></p>
        </article>
        <article id="ML">
            <h2><?php echo $contentLogic->content->article3Title ?></h2>
            <hr>
            <p><?php echo $contentLogic->content->article3 ?></p>
        </article>
        <article id="brinkman">
            <h2><?php echo $contentLogic->content->article8Title ?></h2>
            <hr>
            <p><?php echo $contentLogic->content->article8 ?></p>
        </article>
        <article id="urban">
            <h2><?php echo $contentLogic->content->article7Title ?></h2>
            <hr>
            <p><?php echo $contentLogic->content->article7 ?></p>
        </article>
        <article id="specktakel">
            <h2><?php echo $contentLogic->content->article5Title ?></h2>
            <hr>
            <p><?php echo $contentLogic->content->article5 ?></p>
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
