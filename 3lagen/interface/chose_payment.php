<?php
require 'header.php';
require 'navbar.php';
require '../Ticket_model.php';
session_start();
/*$contentLogic = new ContentLogic();
$contentLogic->GetContentJazzPage();*/
?>

<main>
    <div class="container">
        <div id = "shoppingcartcontainer">
            <h1>ORDER OVERVIEW</h1>
            <?php if(!empty($_SESSION['ticketsCart'])) { ?>
                <table>
                    <?php
                    $itemList = $_SESSION['ticketsCart'];
                    $totalPrice = 0;
                    $admincosts = 5;
                    foreach ($itemList as $item) {
                        echo "<tr><td>$item->ticketName</td><td></td><td><button type='submit' name='decrease'><td>$item->ticketAmount </td><td>$item->ticketPrice</td></form></tr>";
                        $totalPrice = $totalPrice + ($item->ticketPrice * $item->ticketAmount);

                    }


                    ?>

                    <!--                <script>-->
                    <!--                    var $input = $(".amount");-->
                    <!--                    // Aumenta ou diminui o valor sendo 0 o mais baixo possível-->
                    <!--                    $input.val(0);-->
                    <!---->
                    <!--                    $(".change").click(function(){-->
                    <!--                        if ($(this).hasClass('plus'))-->
                    <!--                            $input.val(parseInt($input.val())+1);-->
                    <!--                        else if ($input.val()>=1)-->
                    <!--                            $input.val(parseInt($input.val())-1);-->
                    <!--                    });-->
                    <!--                </script>-->
                </table>

                <hr>
                <table>
                    <select>
                        <option value="Select">Select</option>}
                        <option value="IDeal">IDeal</option>
                        <option value="Credit Card">Credit Card</option>
                        <option value="Paypal">Paypal</option>
                    </select>
                    <tr>
                        <th id="giftcard">GIFTCARD</th>
                        <th id="confirmform">
                            <form action="pay" method="post">
                                <div id="top">
                                    <div class="labels">
                                        <label>Total price products: </label>
                                        <label>Administrtive costs: </label>
                                    </div>
                                    <div class="outputs">
                                        <output name="totalproducts"><?php echo $totalPrice; ?></output>
                                        <output name="admincosts"><?php echo $admincosts; ?></output>
                                    </div>
                                </div>
                                <hr>
                                <div id="bottom">
                                    <div class="labels">
                                        <label>Total price: </label>
                                    </div>
                                    <div class="outputs">
                                        <output name="totalprice"><?php echo $admincosts + $totalPrice; ?></output>
                                    </div>
                                </div>
                                <button> GO TO BANK PAYMENT  </button>
                            </form>
                        </th>
                    </tr>
                </table>
            <?php }else{
                echo "<p>SESSION EXPIRED... EMPTY!!!</p>";
            } ?>
        </div>
    </div>
</main>

<?php
require 'footer.php';
?>

