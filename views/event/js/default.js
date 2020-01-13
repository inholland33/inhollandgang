$(function () {


    $('.getEvent').live('click', function () {
        $('#listInserts').empty();
        $('#buttons').empty();
        var event = $(this).attr('rel');
        $.post('event/asyncGetListings/', {'event': event}, function (result) {
            console.log(result);

            for (var i = 0; i < result.length; i++) {

                //If this IS the LAST LOOP OR the NEXT ticket_id IS NOT the same as the CURRENT ticket_id
                if (((i + 1) >= result.length) || (result[i].ticket_id !== result[i + 1].ticket_id)) {
                    //ADD new ROW to the table with the results of the query
                    $('#listInserts').append('<tr> ' +
                        '<th scope="row">' + result[i].ticket_id + '</th>' +
                        '<td>' + result[i].ticketName + '</td>' +
                        '<td>' + result[i].type + '</td>' +
                        '<td>' + result[i].price + '</td>' +
                        '<td>' + result[i].stock + '</td>' +
                        '<td>' + result[i].start_date_time + '</td>' +
                        '<td>' + result[i].end_date_time + '</td>' +
                        '<td>' + result[i].artistName + '</td>' +
                        '<td>' +
                        '<a href="./event/edit/' + result[i].ticket_id + '">edit </a>' +
                        '<a href="./event/delete/' + result[i].ticket_id + '">delete</a>' +
                        '<a href="./event/delete/' + result[i].ticket_id + '">delete</a>' +
                        '</td>');
                } else {
                    //The NEXT artist name is CURRENT artistName + NEXT artistName together
                    result[i + 1].artistName = result[i].artistName + ', ' + result[i + 1].artistName
                }
            }
            //ADD button
            $('#buttons').append('</br> <button id="addEvent" class="btn btn-success btn-lg">Add</button>');

        }, 'json');
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



