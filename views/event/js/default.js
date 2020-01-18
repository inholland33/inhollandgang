function deleteEvent(ticket_id) {
    $.post('event/asyncDeleteListing', {'ticket_id': ticket_id}, function (result) {

    });
}

function addEvent() {

    $('.addPanel').css('visibility', 'visible');

    $('#artists').empty();

    $.post('event/asyncGetArtists/', function (artist) {
        for (var i = 0; i < artist.length; i++) {
            //apend artist name to the panel...
            $('#artists').append('<label class="checkbox">' + artist[i].name +
                '<input type="checkbox" name="artist" value="' + artist[i].artist_id + '">' +
                '<span class="checkmark"></span>' +
                '</label>');
        }
    }, 'json');

    $('.addContainer').css('visibility', 'visible');
}


$(function () {


    $('.getEvent').live('click', function () {
        $('#listInserts').empty();
        $('#buttons').empty();
        var event = $(this).attr('rel');
        $.post('event/asyncGetListings/', {'event': event}, function (ticket) {
            for (var i = 0; i < ticket.length; i++) {
                //If this IS the LAST LOOP OR the NEXT ticket_id IS NOT the same as the CURRENT ticket_id
                if (((i + 1) >= ticket.length) || (ticket[i].ticket_id !== ticket[i + 1].ticket_id)) {
                    //ADD new ROW to the table with the tickets of the query
                    $('#listInserts').append('<tr> ' +
                        '<th scope="row">' + ticket[i].ticket_id + '</th>' +
                        '<td>' + ticket[i].ticketName + '</td>' +
                        '<td>' + ticket[i].type + '</td>' +
                        '<td>' + ticket[i].price + '</td>' +
                        '<td>' + ticket[i].stock + '</td>' +
                        '<td>' + ticket[i].start_date_time + '</td>' +
                        '<td>' + ticket[i].end_date_time + '</td>' +
                        '<td>' + ticket[i].artistName + '</td>' +
                        '<td>' +
                        '<a href="./event/edit/' + ticket[i].ticket_id + '">edit </a>' +
                        '<a href="#" onclick="deleteEvent(' + ticket[i].ticket_id + ');" >delete </a>' +
                        '<a href="./event/switch/' + ticket[i].ticket_id + '">swap</a>' +
                        '</td>');
                } else {
                    //The NEXT artist name is CURRENT artistName + NEXT artistName together
                    ticket[i + 1].artistName = ticket[i].artistName + ', ' + ticket[i + 1].artistName
                }
            }
            //ADD button
            $('#buttons').append('</br> <button id="addEvent" class="btn btn-success float-right" onclick="addEvent();">New</button>');

        }, 'json');
    });

    $('.addPanel').click(function () {
        $('.addPanel').css('visibility', 'hidden');
        $('.addContainer').css('visibility', 'hidden');
    });
    $('#closePanel').click(function () {
        $('.addPanel').css('visibility', 'hidden');
        $('.addContainer').css('visibility', 'hidden');
    });


    $('#updateContent').live('click', function () {
        if ($('.notUpdated').length === 0) {
            alert("all data is saved!");
        }
    });

    $('#randomInsert').submit(function () {
        var url = $(this).attr('action');
        var data = $(this).serialize();

        $.post(url, data, function (o) {
            $('#listInserts').append('<div>' + o.id + " " + o.text + ' <a class="del" rel="' + o.id + '" href="#">X</a></div>');
        }, 'json');

        return false;
    });

}, 'json');



