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

<article id="buttons"></article>


<article class="addPanel">
</article>

<form action="event/insert" class="addContainer">
    <span id="closePanel" class="float-right">&#10006;</span>
    <h1>Ticket</h1>
    <article class="form-group">
        <label for="name">Name</label>
        <input id="name" class="form-control" type="text" placeholder="Name">
    </article>
    <article class="form-group">
        <label for="event">Event</label>
        <input id="event" class="form-control" type="text" placeholder="Event">
    </article>
    <article class="form-group">
        <label for="type">Type</label>
        <input id="type" class="form-control" type="text" placeholder="Type">
    </article>
    <article class="form-group">
        <label for="price">Price in €</label>
        <input id="price" class="form-control" type="text" placeholder="0,00">
    </article>
    <article class="form-group">
        <label for="stock">Stock</label>
        <input id="stock" class="form-control" type="text" placeholder="0">
    </article>
    <article class="form-group">
        <label for="start_date_time">Start event</label>
        <input id="start_date_time" class="form-control" type="datetime-local">
    </article>
    <article class="form-group">
        <label for="end_date_time">End event</label>
        <input id="end_date_time" class="form-control" type="datetime-local">
    </article>

    <article id="artists" class="form-group">
        <p>Artists</p>
        <label class="checkbox">One
            <input type="checkbox" checked="checked">
            <span class="checkmark"></span>
        </label>
    </article>
</form>
