<?php
require 'headerTicket.php';
$ticket = new Ticket();
?>

    <main>
        <section class="headertickets">
            <img src="images/headertickets.png">
            <h1>Tickets</h1>
        </section>
        <section class="navigationTickets">
            <ul>
                <li><a href="ticketpage.php?pagetype=dance"><p>Dance</p><img src="images/dancetickets.png"/></a></li>
                <li><a href="ticketpage.php?pagetype=jazz"><p>Jazz</p><img src="images/jazztickets.png"></a></li>
                <li><a href="ticketpage.php?pagetype=food"><p>Food</p><img src="images/foodtickets.png"></a></li>
                <li><a href="ticketpage.php?pagetype=historic"><p>Historic</p><img src="images/historictickets.png"></a></li>
            </ul>
        </section>
        <section class="container">
            <?php
            $type = 'dance';
            if (!empty($_GET['pagetype'])){
                $type = $_GET[ 'pagetype'];
            }
            elseif (!empty($_POST['event']))
            {
                $type = $_POST['event'];
            }
            $day1 = new DateTime('2020-07-26 00:00:00') ;
            $day2 = new DateTime('2020-07-27 00:00:00') ;
            $day3 = new DateTime('2020-07-28 00:00:00') ;
            $day4 = new DateTime('2020-07-29 00:00:00') ;
            $days = array('Thursday','Friday', 'Saturday', 'Sunday');
            $counter = 0;
            $tickets = $ticket->loadTickets($type, $day1, $day2, $day3, $day4);
            ?>
            <section>
                <?php
                foreach ($tickets as $ticketsDay) {
                    if (!empty($ticketsDay)) {
                        ?>
                        <article class="day">
                            <h1><?php echo $days[$counter]; ?></h1>
                        </article>
                        <div>
                            <table class="tickets">
                                <tr>
                                    <?php
                                    foreach ($ticketsDay as $row) {
                                        if ($row['venue'] == 'All Access') {
                                            ?>
                                                <div class="ticketcontainer2">
                                                    <div class="block2"></div>
                                                    <img class="ticketImg" src="images/<?php echo $row['img'] ?>">
                                                    <form class="ticketForm"
                                                          action="../includes/ticketpageInc.php?addticket=<?php echo $row['ticket_id'] ?>&ticket=<?php echo $row['event'] ?>"
                                                          method="post">
                                                        <h3><?php echo $row['event'] ?></h3>
                                                        <h4>Price: €<?php echo $row['price'] ?></h4>
                                                        <input type="hidden" name="price"
                                                               value="<?php echo $row['price'] ?>">
                                                        <input type="text" name="amount" placeholder="Amount"></br>
                                                        <input type="submit" name="add" value="Add to cart">
                                                    </form>
                                                </div>

                                            <?php
                                        }
                                        else{

                                        ?>
                                        <th>
                                            <div class="ticketcontainer">
                                                <div class="block"></div>
                                                <img class="ticketImg" src="images/<?php echo $row['img'] ?>">
                                                <form class="ticketForm"
                                                      action="../includes/ticketpageInc.php?addticket=<?php echo $row['ticket_id'] ?>&ticket=<?php echo $row['event'] ?>"
                                                      method="post">
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
                                    }
                                    ?>
                                </tr>
                            </table>
                        </div>
                        <?php
                    }
                    $counter++;
                }
                    ?>
            </section>
        </section>
    </main>

<?php
include 'footerTickets.php';
