$(function () {
    $('#listInserts').empty();
    $('#buttons').empty();
    $.post('invoice/asyncGetListings/', function (order) {
        console.log(order);
        for (var i = 0; i < order.length; i++) {
            $('#listInserts').append('<tr rel="' + order[i].order_id + '"> ' +
                '<th scope="row">' + order[i].order_id + '</th>' +
                '<td>' + order[i].user_id + '</td>' +
                '<td>' + order[i].name + '</td>' +
                '<td>' + order[i].email + '</td>' +
                '<td>' + order[i].total_price + '</td>' +
                '<td>' + order[i].date_time + '</td>' +
                '<td>' +
                '<a class="pdf" href="' + CURL + 'invoice/generatePdf/' + order[i].order_id + '">pdf</a>' +
                '</td>');
        }
    }, 'json');


    $('.pdf').live("click", function () {
        var order_id = $(this).attr('rel');

        $.post('invoice/generatePdf/', {"order_id": order_id});
    });
}, 'json');
