$(function () {

    /*$.get('dashboard/xhrGetListings', function (o) {
        for (var i = 0; i < o.length; i++) {
            $('#listInserts').append('<div>' + o[i].content_id + " " + o[i].text + ' <a class="del" rel="' + o[i].content_id + '" href="#">X</a></div>');
        }

        $('.del').live('click', function () {
            delItem = $(this);
            var id = $(this).attr('rel');

            $.post('dashboard/xhrDeleteListing', {'id': id}, function (o) {
                delItem.parent().remove();
            }, 'json');

            return false;
        });

    }, 'json');*/

    //<div class="lds-ring"><div></div><div></div><div></div><div></div></div>


    $('.getEvent').live('click', function () {
        $('#listInserts').empty();
        var event = $(this).attr('rel');
        $.post('content/asyncGetListings/', {'event': event}, function (o) {
            for (var i = 0; i < o.length; i++) {
                $('#listInserts').append('<label for="content">' + o[i].type + ': </label>' +
                    '</br> ' +
                    '<textarea class="content" name="content' + o[i].content_id + '" rel="' + o[i].content_id + '" rows="4" cols="100">' + o[i].text + '</textarea>' +
                    '</br> ' +
                    '<p class="status" rel="' + o[i].content_id + '"></p>');
            }

        }, 'json');
    });

    $('.content').live('focusout', function () {
        var rel = $(this).attr('rel');
        $('.status[rel="' + rel + '"]').text("loading..");


        var id = $(this).attr('rel');
        var value = $(this).attr('value');
        $.post('content/asyncEdit/', {'id': id, 'value': value}, function (o) {
            if (o > 0) {
                $('.status[rel="' + rel + '"]').text("Succes!");

            } else {
                $('.status[rel="' + rel + '"]').text("failed...");

            }


        }, 'json');
    });

    $('#randomInsert').submit(function () {
        var url = $(this).attr('action');
        var data = $(this).serialize();

        $.post(url, data, function (o) {
            $('#listInserts').append('<div>' + o.id + " " + o.text + ' <a class="del" rel="' + o.id + '" href="#">X</a></div>');
        }, 'json');


        return false;
    });

});