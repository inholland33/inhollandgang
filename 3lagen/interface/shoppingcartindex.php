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
            <h1>SHOPPINGCART</h1>
            <?php if(!empty($_SESSION['ticketsCart'])) { ?>
            <table>
                <?php
                $itemList = $_SESSION['ticketsCart'];
                $totalPrice = 0;
                $admincosts = 5;
                $name = $_POST['name'];
                foreach ($itemList as $item) {
//                    action='shoppingcartindex.php?name=$name' method='post'
                    echo "<p>
<tr>
    <td>
        <input type='text' readonly='readonly' name='name' rel='$item->ticketId' value='$item->ticketName'/>
    </td>
    <td>
        <button rel='$item->ticketid'class='change'>-</button>
        <input type='text' readonly='readonly' class='amount' rel='$item->ticketId' value='$item->ticketAmount'/>
        <button class='change' onclick='plusAmount($item->ticketId);' rel='$item->ticketId'>+</button>
    </td>
    <td>
        <input type='text' readonly='readonly' name='price'  value='$item->ticketPrice'/>
    </td>
</tr>
</p>";
                    $totalPrice = $totalPrice + ($item->ticketPrice * $item->ticketAmount);
                }


                ?>
                                <script type="text/javascript">
                                    function plusAmount(id) {
                                        var $input = $(".amount").attr('rel');
                                        var $change = $(this).attr('rel');
                                        if ($change === $input) {

                                            $input.val(parseInt($input.val()) + 1);
                                        }

                                        function minAmount(id) {
                                            var $input = $(".amount").attr('rel');
                                            var $change = $(this).attr('rel');
                                            if ($change === $input) {

                                                $input.val(parseInt($input.val()) - 1);

                                            }


                                        }

                                        $(function () {
                                            var $input = $(".amount");
                                            $input.val(0);
                                            console.log("testf");
                                            $(".change").click(function(){
                                                var $change = $(this).attr('rel');
                                                if ($change === $input.attr('rel')) {
                                                    console.log(1);
                                                }
                                                if ($(this).hasClass('plus'))
                                                    $input.val(parseInt($input.val())+1);
                                                else if ($input.val()>=1)
                                                    $input.val(parseInt($input.val())-1);
                                            });
                                        });
                                </script>
            </table>
            <hr>
            <table>
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
                            <button>GO TO PAYMENT</button>
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
<tr>
    <form action='shoppingcartindex.php?name=$name' method='post'>
        <td>
            <input type='text' readonly='readonly' name='name' value='$item->ticketName'/>
        </td>
        <td>

        </td>
        <td>
            <button type='submit' name='decrease'>-</button>
            <input type='text' readonly='readonly' name='amount' value='$item->ticketAmount'/>
            <button type='submit' name='increase'>+</button>
        </td>
        <td>
            <input type='text' readonly='readonly' name='price' value='$item->ticketPrice'/>
        </td>
    </form>
</tr>

<?php
require 'footer.php';
?>

