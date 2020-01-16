<?php
require 'headerFood.php';
require 'navbar.php';
require '../logic/content.logic.php';

$contentLogic = new ContentLogic();
$contentLogic->GetContentFoodPage();

?>
<style><?php include '../general/foodindex.css'; ?></style>
<main>

    <div class = "container">
        <section id="headerFood">
            <h1 class="titel"><?php echo $contentLogic->content->titel ?></h1>
            <h2 class="ondertitel"><?php echo $contentLogic->content->onderTitel ?></h2>
        </section>
        <section class="">
            <h2><?php echo $contentLogic->content->introTitle ?></h2>
            <p ><?php echo $contentLogic->content->intro ?></p>
        </section>

        <div id="myBtnContainer">
            <h1 id="choises">Cuisine:</h1>
            <button class="btn active" onclick="filterSelection('all')"> Show all</button>
            <button class="btn" onclick="filterSelection('Dutch')"> Dutch</button>
            <button class="btn" onclick="filterSelection('fish and seafood')"> fish and seafood</button>
            <button class="btn" onclick="filterSelection('European')"> European</button>
            <button class="btn" onclick="filterSelection('French')"> French</button>
            <button class="btn" onclick="filterSelection('Internationaal')"> Internationaal</button>
            <button class="btn" onclick="filterSelection('Modern')"> Modern</button>
            <button class="btn" onclick="filterSelection('Steakhouse')"> Steakhouse</button>
            <button class="btn" onclick="filterSelection('Argentinian')"> Argentinian</button>
            <button class="btn" onclick="filterSelection('Aziatisch')"> Aziatisch</button>
        </div>

        <article class="filterDiv Dutch, fish and seafood, European " id="mrmrs">
            <h2><?php echo $contentLogic->content->article1Title ?></h2>
            <hr>
            <p><?php echo $contentLogic->content->article1 ?></p>
        </article>
        <article class="filterDiv Steakhouse, Argentinian, European" id="goldenbull">
            <h2><?php echo $contentLogic->content->article6Title ?></h2>
            <hr>
            <p><?php echo $contentLogic->content->article6 ?></p>
        </article>
        <article class="filterDiv French, fish and seafood, European" id="ratatouille">
            <h2><?php echo $contentLogic->content->article2Title ?></h2>
            <hr>
            <p><?php echo $contentLogic->content->article2 ?></p>
        </article>
        <article class="filterDiv Dutch, French, European"   id="fris">
            <h2><?php echo $contentLogic->content->article4Title ?></h2>
            <hr>
            <p><?php echo $contentLogic->content->article4 ?></p>
        </article>
        <article class="filterDiv Dutch, fish and seafood, European" id="ML">
            <h2><?php echo $contentLogic->content->article3Title ?></h2>
            <hr>
            <p><?php echo $contentLogic->content->article3 ?></p>
        </article>
        <article class="filterDiv Dutch, European, Modern" id="brinkman">
            <h2><?php echo $contentLogic->content->article8Title ?></h2>
            <hr>
            <p><?php echo $contentLogic->content->article8 ?></p>
        </article>
        <article class="filterDiv Dutch, fish and seafood, European" id="urban">
            <h2><?php echo $contentLogic->content->article7Title ?></h2>
            <hr>
            <p><?php echo $contentLogic->content->article7 ?></p>
        </article>
        <article class="filterDiv Europees, Internationaal,Aziatisch" id="specktakel">
            <h2><?php echo $contentLogic->content->article5Title ?></h2>
            <hr>
            <p><?php echo $contentLogic->content->article5 ?></p>
        </article>
        <section class="navigationbuttons">
            <button type="button" class ="gototicketpage" id="gototicketpagedance" action="">TICKETS</button>
            <button type="button" class = "gotoprogrammpage" id="gotoprogrammpagedance"action="">PROGRAMM</button>
        </section>
    </div>
    <script>
        filterSelection("all")
        function filterSelection(c) {
            var x, i;
            x = document.getElementsByClassName("filterDiv");
            if (c == "all") c = "";
            for (i = 0; i < x.length; i++) {
                w3RemoveClass(x[i], "show");
                if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
            }
        }

        function w3AddClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
            }
        }

        function w3RemoveClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                while (arr1.indexOf(arr2[i]) > -1) {
                    arr1.splice(arr1.indexOf(arr2[i]), 1);
                }
            }
            element.className = arr1.join(" ");
        }

        // Add active class to the current button (highlight it)
        var btnContainer = document.getElementById("myBtnContainer");
        var btns = btnContainer.getElementsByClassName("btn");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function(){
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }
    </script>
</main>
<?php
require 'footer.php';
?>
