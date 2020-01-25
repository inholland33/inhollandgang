<?php
require 'header.php';
require 'navbar.php';
?>

<main>

    <div id="indextop">
        <section id="logohaarlem"></section>
        <h1 class="titel">HAARLEM FESTIVAL</h1>
        <h2 class="ondertitel">25TH - 30TH JULY</h2>
        <section>
            <button class="gototicketpage">TICKETS</button><button class="gotoprogrammpage">PROGRAMM</button>
        </section>
        <section>
            <button id="moreinfo">MORE INFO</button>
            <img src="#" alt="arrowdown">
        </section>
    </div>
    <div id="indexbottom">
        <section>
            <h2></h2>
            <hr>
            <p></p>
        </section>
        <section id="indexnav">
            <button class="gototicketpage">TICKETS</button><button class="gotoprogrammpage">PROGRAMM</button>
        </section>
        <section>
            <h3></h3>
            <hr>
            <div id="rollingmenu">
                <button id="scrollleft"></button>
                <div id="clickables">
                    <button id="jazzclick"></button>
                    <button id="danceclick"></button>
                    <button id="foodclick"></button>
                    <button id="historicclick"></button>
                    <button id="scrollright"></button>
                </div>
            </div>
        </section>
    </div>

</main>

<?php
require 'footer.php';
?>
