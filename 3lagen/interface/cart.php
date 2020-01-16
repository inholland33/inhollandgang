<?php
require_once 'headerTicket.php';
$ticket = new Ticket;
?>

    <main>
        <table>

            <?php
            if (!empty($_SESSION['ticketsCart'])) {
                ?>
            <tr>
                <th>item</th><th>event</th><th>amount</th><th>price</th>
            </tr>
            <?php
                foreach ($_SESSION['ticketsCart'] as $row) {

                    ?>
                    <tr>
                        <th><?php echo $row->ticketId?></th>
                        <th><?php echo $row->ticketName?></th>
                        <th><?php echo $row->ticketAmount?></th>
                        <th>€<?php echo $row->ticketPrice?></th>
                    </tr>
                    <?php
                }
                ?>
        </table>
        <form action="payment.php" method="post">
            <input type="submit" name="pay" value="Go to payment">
        </form>
                <?php
            }
            else{
                ?>
                <p>Shoppingcart is empty.</p>
                <?php
            }

            ?>

    </main>

<?php
require 'footer.php';