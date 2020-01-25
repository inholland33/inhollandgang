<?php
require 'header.php';
require 'navbar.php';
require '../models/Ticket_model.php';
session_start();
?>

    <main>
        <div class="container">
            <div id = "shoppingcartcontainer">
                <h1 id="shoppingcarttitle">SHOPPINGCART</h1>
                <?php if(!empty($_SESSION['ticketsCart'])) { ?>
                    <table id="tickettable">
                        <?php
                        $itemList = $_SESSION['ticketsCart'];
                        $totalPrice = 0;
                        $admincosts = 5;
                        foreach ($itemList as $item) {
                            $price = $item->ticketPrice * $item->ticketAmount;
                            echo "<tr id='$item->ticketId' class='rows'>
                            <td id='$item->ticketName+name' class='name'>
                                $item->ticketName
                            </td>
                            <td >
                                <button  rel='changemin' onclick='ChangeMin($item->ticketId)'>-</button>
                                <output id='$item->ticketId+amount' class='amount'>$item->ticketAmount</output>
                                <button  rel='changeplus' onclick='ChangePlus($item->ticketId)'>+</button>
                            </td>
                            <td id='$item->ticketId+price' class='price'>
                                $price
                            </td>
                        </tr>";
                            $totalPrice = $totalPrice + ($item->ticketPrice * $item->ticketAmount);
                        }
                        ?>
                        <script type="text/javascript">
                            function ChangePlus(id) {
                                var amount = document.getElementById(id+'+amount').innerHTML;
                                var price = document.getElementById(id+'+price').innerHTML;
                                price = price / amount;
                                amount++;
                                price = price *amount;
                                document.getElementById(id+'+amount').innerHTML = amount;
                                document.getElementById(id+'+price').innerHTML = price;
                                var totalPrice = document.getElementById('totalprice').innerHTML;
                                totalPrice = parseInt(totalPrice);
                                totalPrice = totalPrice + (price/amount);
                                document.getElementById('totalprice').innerHTML= totalPrice;
                                var ad = document.getElementById('ad').innerHTML;
                                ad = parseInt(ad);
                                totalPrice = totalPrice + ad;
                                document.getElementById('totalpriceplusad').innerHTML = totalPrice;
                            }
                            function ChangeMin(id) {
                                var amount = document.getElementById(id+'+amount').innerHTML;
                                var price = document.getElementById(id+'+price').innerHTML;
                                var singlePrice = price/amount;
                                price = price / amount;
                                amount--;
                                price = price *amount;
                                document.getElementById(id+'+amount').innerHTML = amount;
                                document.getElementById(id+'+price').innerHTML = price;
                                var totalPrice = document.getElementById('totalprice').innerHTML;
                                totalPrice = parseInt(totalPrice);
                                totalPrice = totalPrice - singlePrice;
                                document.getElementById('totalprice').innerHTML= totalPrice;
                                var ad = document.getElementById('ad').innerHTML;
                                ad = parseInt(ad);
                                totalPrice = totalPrice + ad;
                                document.getElementById('totalpriceplusad').innerHTML = totalPrice;
                                if(amount <= 0){

                                    if (confirm("Are you sure you want to delete this item for the shoppingcart?")) {
                                        $("tr").remove("#" + id);
                                    }
                                }
                            }
                        </script>
                    </table>
                    <hr id="tabletable">
                    <div id="gotopayment">
                        <div id="giftcard">
                            <h2 id="giftcardtitle">GIFTCARD</h2>
                            <label>ENTER GIFTCARDNUMBER: </label>
                            <input type="text">
                        </div>
                        <div id="confirmform">
                            <h2 id="confirmform">Confirmation</h2>
                            <div id="top">
                                <div class="labels">
                                    <label>Total price products: </label>
                                    <label>Administrtive costs: </label>
                                </div>
                                <div class="outputs">
                                    <output id='totalprice' name="totalproducts"><?php echo $totalPrice; ?></output>
                                    <output id='ad' name="admincosts"><?php echo $admincosts; ?></output>
                                </div>
                            </div>
                            <hr id="topbottom">
                            <div id="bottom">
                                <div class="labels">
                                    <label>Total price: </label>
                                </div>
                                <div class="outputs">
                                    <output id='totalpriceplusad' name="totalprice" ><?php echo $admincosts + $totalPrice; ?></output>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button id="gottopayment-btn" onclick='GoToPayment()'>GO TO PAYMENT</button>
                    <script type="text/javascript">
                        function GoToPayment() {
                            var rows = document.getElementsByClassName('rows').innerHTML;
                            var array;
                            for(var i = 0; i < rows.length; ++i){
                                var name = $(rows[i]).find('.name');
                                console.log(name);
                            }
                        }
                    </script>
                <?php }else{
                    echo "<p>SESSION EXPIRED... EMPTY!!!</p>";
                } ?>
            </div>
        </div>
    </main>

<?php
require 'footer.php';
?>