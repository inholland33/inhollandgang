function togglePanels() {
    $('.addPanel').toggle();
    $('.addContainer').toggle();
    $('input[type=checkbox]').prop('checked', false);
}

$(function () {

    if ($('#event').is(':empty')) {
        $.post('event/getEnum/ticket/event', function (event) {
            for (var i = 0; i < event.length; i++) {

                $('#event').append('<option value="' + event[i] + '">' + event[i] + '</option>');
            }

        }, 'json');
    }
    if ($('#artists').is(':empty')) {
        $.post('event/asyncGetArtists/', function (artist) {
            for (var i = 0; i < artist.length; i++) {
                //apend artist name to the panel...
                $('#artists').append('<label class="checkbox">' + artist[i].name +
                    '<input type="checkbox" name="artists[]" value="' + artist[i].artist_id + '">' +
                    '<span rel="' + artist[i].artist_id + '" class="checkmark"></span>' +
                    '</label>');
            }
        }, 'json');
    }

    $('.getEvent').live('click', function () {

        $('#listInserts').empty();
        $('#buttons').empty();
        var event = $(this).attr('rel');
        $.post('event/asyncGetListings/', {'event': event}, function (ticket) {
            for (var i = 0; i < ticket.length; i++) {
                //If this IS the LAST LOOP OR the NEXT ticket_id IS NOT the same as the CURRENT ticket_id
                if (((i + 1) >= ticket.length) || (ticket[i].ticket_id !== ticket[i + 1].ticket_id)) {
                    //ADD new ROW to the table with the tickets of the query
                    $('#listInserts').append('<tr rel="' + ticket[i].ticket_id + '"> ' +
                        '<th scope="row">' + ticket[i].ticket_id + '</th>' +
                        '<td>' + ticket[i].ticketName + '</td>' +
                        '<td>' + ticket[i].type + '</td>' +
                        '<td>' + ticket[i].price + '</td>' +
                        '<td>' + ticket[i].stock + '</td>' +
                        '<td>' + ticket[i].start_date_time + '</td>' +
                        '<td>' + ticket[i].end_date_time + '</td>' +
                        '<td>' + ticket[i].artistName + '</td>' +
                        '<td>' +
                        '<a class="edit" href="#" rel="' + ticket[i].ticket_id + '">edit </a>' +
                        '<a class="delete" href="#" rel="' + ticket[i].ticket_id + '">delete </a>' +
                        '<a class="swap" href="#" rel="' + ticket[i].ticket_id + '">swap </a>' +
                        '</td>');
                } else {
                    //The NEXT artist name is CURRENT artistName + NEXT artistName together
                    ticket[i + 1].artistName = ticket[i].artistName + ', ' + ticket[i + 1].artistName
                }
            }
            //ADD button
            $('#buttons').append('</br> <button id="create" class="btn btn-success float-right" rel="' + event + '">New</button>');

        }, 'json');
    });

    $('#create').live('click', function () {

        var event = $(this).attr('rel');

        $('.addContainer').attr('action', CURL + 'event/create');

        togglePanels();
    });

    $('.edit').live('click', function () {

        var ticket_id = $(this).attr('rel');
        $.post('event/asyncGetTicket/', {'ticket_id': ticket_id}, function (ticket) {
            console.log(ticket[0].event);

            $('input[name=ticket_id]').val(ticket[0].ticket_id);
            $('option[value=' + ticket[0].event + ']').prop('selected', true);
            $('input[name=event]').val(ticket[0].event);
            $('input[name=type]').val(ticket[0].type);
            $('input[name=price]').val(ticket[0].price);
            $('input[name=stock]').val(ticket[0].stock);
            $('input[name=start_date_time]').valueAsNumber = ticket[0].start_date_time;
            $('input[name=end_date_time]').valueAsNumber = ticket[0].end_date_time;

            for (var i = 0; i < ticket.length; i++) {
                $('input[value=' + ticket[i].artist_id + ']').prop('checked', 'checked');
            }
        }, 'json');

        $('.addContainer').attr('action', CURL + 'event/edit');
        togglePanels();


    });

    $('.delete').live('click', function () {

        if (confirm("Are you sure you want to delete the selected row?")) {
            try {
                var ticket_id = $(this).attr('rel');
                $.post('event/asyncDeleteTicket/', {'ticket_id': ticket_id}, function () {

                }, "json");
            } catch (e) {

            } finally {
                $('tr[rel=' + ticket_id + ']').remove();
            }
        }
    });

    $('.swap').live('click', function (e) {

        var ticket_id1 = $(this).attr('rel');

        $('tbody > tr').mouseenter(function () {
            $(this).addClass('highlight');
        });
        $('tbody > tr').mouseleave(function () {
            $(this).removeClass('highlight');
        });
        $('tbody').mouseleave(function () {
            e.stopPropagation();
        });

        $('tbody > tr').live('click', function () {
            var ticket_id2 = $(this).attr('rel');

            $.post('event/asyncSwapTickets/', {'ticket_id1': ticket_id1, 'ticket_id2': ticket_id2}, function (tickets) {
                alert("Swapped successfully! refresh to see the results.");
            });
        });
    });

    $('.addPanel').click(function () {
        togglePanels();
    });

    $('#closePanel').click(function () {
        togglePanels();
    });

    $('#submit').click(function () {
        checked = $("input[type=checkbox]:checked").length;

        if (!checked) {
            alert("You must check at least one checkbox.");
            return false;
        }
    });
}, 'json');



