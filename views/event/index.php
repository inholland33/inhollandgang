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
        <th scope="col">venue</th>
        <th scope="col">event</th>
        <th scope="col">type</th>
        <th scope="col">price</th>
        <th scope="col">stock</th>
        <th scope="col">date</th>
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
        <label for="venue">Venue</label>
        <input name="venue" class="form-control" type="text" placeholder="Venue" required="required" value="">
    </article>
    <article class="form-group">
        <label for="type">Type</label>
        <select id="type" name="type" class="form-control"></select>

    </article>
    <article class="form-group">
        <label for="event">Event</label>
        <input name="event" class="form-control" type="text" placeholder="Event" required="required" value="">
    </article>
    <article class="form-group">
        <label for="price">Price in €</label>
        <input name="price" class="form-control" type="text" placeholder="0,00" required="required" value="">
    </article>
    <article class="form-group">
        <label for="stock">Stock</label>
        <input name="stock" class="form-control" type="text" placeholder="0" required="required" value="">
    </article>
    <article class="form-group">
        <label for="date_time">Date</label>
        <input name="date_time" class="form-control" type="datetime-local" required="required"
               value="">
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