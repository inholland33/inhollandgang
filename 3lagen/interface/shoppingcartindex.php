<?php
// Een header en een navigatiebalk toevoegen aan de pagina.
// Ook de logicalaag aanroepen zodat er tickets ingeladen kunnen worden vanuit de DB.
require 'header.php';
require 'navbar.php';
require '../models/Ticket_model.php';
session_start();
?>

    <main>
        <div class="container">
            <div id = "shoppingcartcontainer">
                <h1 id="shoppingcarttitle">SHOPPINGCART</h1>
<!--                De tickets staan in de session die gestart is bij de ticketpage.
                    Eerst check ik of de session gevuld is, zo niet dan geef ik een bericht dat de session verlopen is.
                    Hier laad ik de tickets in de elementen doormiddel van een forloop.-->
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
<!--                        Omdat het overbodig leek de pagina te verversen elke keer dat de hoeveelheid aangepast werd heb ik gekozen om javascript hiervoor te gebruiken.
                            Eerst haal ik de elementen op die eerder gevuld waren met waardes uit de session.
                            Dan verhoog of verlaag ik het aantal en daarmee ook de prijzen.
                            Daarna vul ik de elementen weer met de nieuwe waardes.
                            Op het laatst check ik nog of het aantal niet 0 is of kleiner.
                            Als dat wel het geval is geef ik een melding die vraagt of de gebruiker het item wil verwijderen.-->
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
                    <form action="chose_payment.php" method="post">
                        <button id="gottopayment-btn" type="submit">GO TO PAYMENT</button>
                    </form>
<!--                    Hier vraag ik alle nieuwe waardes weer op en roep ik een ajax call aan om de session te vernieuwen met deze nieuwe waardes.-->
<!--                    <button id="gottopayment-btn" onclick='GoToPayment()'>GO TO PAYMENT</button>-->
<!--                    <script type="text/javascript">-->
<!--                        function GoToPayment() {-->
<!--                            var tickets = new Array();-->
<!--                            var names = document.getElementsByClassName('name').innerHTML;-->
<!--                            var amounts = document.getElementsByClassName('amount').innerHTML;-->
<!--                            var prices = document.getElementsByClassName('price').innerHTML;-->
<!--                            console.log(names);-->
<!--                            for(var i = 0; i < 5; ++i){-->
<!--                                var ticket = new Object(),-->
<!--                                    ticketName = "",-->
<!--                                    ticketAmount = 0,-->
<!--                                    ticketPrice = 0;-->
<!--                                ticket[ticketName] = names[i];-->
<!--                                ticket[ticketAmount] = amounts[i];-->
<!--                                ticket[ticketPrice] = prices[i];-->
<!--                                tickets.push(ticket);-->
<!--                            }-->
<!--                            $.ajax({-->
<!--                                url: '../logic/goToPayment.php',-->
<!--                                method: 'POST',-->
<!--                                data: tickets-->
<!--                            });-->
<!--                        }-->
<!--                    </script>-->
                <?php }else{
                    echo "<p>SESSION EXPIRED... EMPTY!!!</p>";
                } ?>
            </div>
        </div>
    </main>

<?php
require 'footer.php';
?>