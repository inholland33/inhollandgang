<?php
require 'headerTicket.php';
$ticket = new Ticket();
?>

    <main>
        <section class="navigationTickets">
            <ul>
                <li><a href="ticketpage.php?pagetype=dance"><img src="images/dancetickets.png"></a></li>
                <li><a href="ticketpage.php?pagetype=jazz"><img src="images/jazztickets.png"></a></li>
            </ul>
        </section>
        
<!--        <h1>Tickets</h1>-->

<!--        <table>-->
<!--            <tr>-->
<!--                <th class="ticketBtnContainer"><a href="cart.php"><img src="images/b2bnickyafro.png"><h2 class="centeredBtnText">Afrojack & Nicky Romero</br></br>Lichtfabriek</br>20:00</br>$75</br></br>Add to cart</br></br></h2></a></th>-->
<!--                <th><a href="cart.php"><img src="images/tiesto.png"></a></th>-->
<!--                <th><a href="cart.php"><img src="images/hardwell.png"</a></th>-->
<!--                <th><a href="cart.php"><img src="images/armin.png"></a></th>-->
<!--                <th><a href="cart.php"><img src="images/martin.png"></a></th>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <th><a href="cart.php"><img src="images/tiesto.png"</a></th>-->
<!--                <th><a href="cart.php"><img src="images/afro.png"></a></th>-->
<!--                <th><a href="cart.php"><img src="images/tiesto.png"</a></th>-->
<!--                <th><a href="cart.php"><img src="images/nicky.png"></a></th>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <th><a href="cart.php"><img src="images/b2b%20afro%20nicky.png"</a></th>-->
<!--                <th><a href="cart.php"><img src="images/armin.png"></a></th>-->
<!--                <th><a href="cart.php"><img src="images/hardwell.png"</a></th>-->
<!--                <th><a href="cart.php"><img src="images/martin.png"></a></th>-->
<!--            </tr>-->
<!--        </table>-->
        <section class="container">
            <?php
            $type = 'dance';
            if (!empty($_GET['pagetype'])){
                $type = $_GET[ 'pagetype'];
            }
            $day1 = new DateTime('2020-07-26 00:00:00') ;
            $day2 = new DateTime('2020-07-27 00:00:00') ;
            $day3 = new DateTime('2020-07-28 00:00:00') ;
            $day4 = new DateTime('2020-07-29 00:00:00') ;
            $tickets = $ticket->loadTickets($type, $day1, $day2, $day3, $day4);
            ?>
            <section>
                <article>
                    <h1>Friday 27th</h1>
                </article>
                <article>
                    <table>
                        <tr>
                            <?php
                            print_r($_SESSION['ticketsCart']);
                            foreach ($tickets[1] as $row) {
                                ?>
                                <th>
                                    <div class="ticketcontainer">
                                        <div class="block"></div>
                                        <img class="ticketImg" src="images/<?php echo $row['img']?>">
                                        <form class="ticketForm" action="../includes/ticketpageInc.php?addticket=<?php echo $row['ticket_id']?>&ticket=<?php echo $row['event'] ?>" method="post">
                                            <h3><?php echo $row['event'] ?></h3>
                                            <h4>At: <?php echo $row['venue'] ?></h4>
                                            <h4>From: <?php echo $row['date_time'] ?></h4>
                                            <h4>Price: €<?php echo $row['price'] ?></h4>
                                            <h4>Tickets left: <?php echo $row['stock'] ?></h4>
                                            <input type="hidden" name="price" value="<?php echo $row['price'] ?>">
                                            <input type="text" name="amount" placeholder="Amount"></br>
                                            <input type="submit" name="add" value="Add to cart">
                                        </form>
                                    </div>
                                </th>
                                <?php
                            }
                            ?>
                </article>
                <article>
                    <h1>Saturday 28th</h1>
                </article>
                <article>
                    <table>
                        <tr>
                            <?php
                            foreach ($tickets[2] as $row) {
                                ?>
                                <th>
                                    <div class="ticketcontainer">
                                        <div class="block"></div>
                                        <img class="ticketImg" src="images/<?php echo $row['img']?>">
                                        <form class="ticketForm" action="../includes/ticketpageInc.php?addticket=<?php echo $row['ticket_id']?>&ticket=<?php echo $row['event'] ?>" method="post">
                                            <h3><?php echo $row['event'] ?></h3>
                                            <h4>At: <?php echo $row['venue'] ?></h4>
                                            <h4>From: <?php echo $row['date_time'] ?></h4>
                                            <h4>Price: €<?php echo $row['price'] ?></h4>
                                            <h4>Tickets left: <?php echo $row['stock'] ?></h4>
                                            <input type="hidden" name="price" value="<?php echo $row['price'] ?>">
                                            <input type="text" name="amount" placeholder="Amount"></br>
                                            <input type="submit" name="add" value="Add to cart">
                                        </form>
                                    </div>
                                </th>
                                <?php
                            }
                            ?>
                </article>
            </section>
        </section>
    </main>

<?php
include 'footer.php';
