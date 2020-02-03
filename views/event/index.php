<a href="#" class="getEvent" rel="jazz">Jazz</a>
<a href="#" class="getEvent" rel="dance">Dance</a>
<a href="#" class="getEvent" rel="food">Food</a>
<a href="#" class="getEvent" rel="historic">Historic</a>

<br>
<br>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">type</th>
        <th scope="col">price</th>
        <th scope="col">stock</th>
        <th scope="col">start</th>
        <th scope="col">end</th>
        <th scope="col">artist</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody id="listInserts">
    </tbody>
</table>

<article id="buttons">

</article>


<article class="addPanel">
</article>

<form action="<?php echo URL; ?>event/create" method="post" class="addContainer">
    <span id="closePanel" class="float-right">&#10006;</span>
    <h1>Ticket</h1>

    <!--    ID input is hidden -->
    <label for="ticket_id" hidden></label>
    <input id="ticket_id" name="ticket_id" type="text" hidden/>
    <!--    End of hidden elements -->

    <article class="form-group">
        <label for="name">Name</label>
        <input name="name" class="form-control" type="text" placeholder="Name" required="required" value="a">
    </article>
    <article class="form-group">
        <label for="event">Event</label>
        <select id="event" name="event" class="form-control"></select>

    </article>
    <article class="form-group">
        <label for="type">Type</label>
        <input name="type" class="form-control" type="text" placeholder="Type" required="required" value="a">
    </article>
    <article class="form-group">
        <label for="price">Price in €</label>
        <input name="price" class="form-control" type="text" placeholder="0,00" required="required" value="1.00">
    </article>
    <article class="form-group">
        <label for="stock">Stock</label>
        <input name="stock" class="form-control" type="text" placeholder="0" required="required" value="2">
    </article>
    <article class="form-group">
        <label for="start_date_time">Start event</label>
        <input name="start_date_time" class="form-control" type="datetime-local" required="required"
               value="2018-06-07T00:00">
    </article>
    <article class="form-group">
        <label for="end_date_time">End event</label>
        <input name="end_date_time" class="form-control" type="datetime-local" required="required"
               value="2018-06-08T01:00">
    </article>

    <p>Artists</p>
    <!--        Artists are autoloaded in the default.js in function: addEvent();-->
    <article id="artists" class="form-group"></article>
    <article id="submit" class="form-group">
        <input type="submit" name="addEventBtn" class="btn btn-primary float-right" value="save">
    </article>
</form>

<script type="text/javascript">
    var CURL = '<?php echo URL; ?>';
</script>