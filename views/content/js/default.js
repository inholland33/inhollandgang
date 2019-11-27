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
                    '<div rel="' + o[i].content_id + '" class="lds-ring">' +
                    '<div></div><div></div><div></div><div></div></div>');
            }

        }, 'json');
    });

    $('.content').live('focusout', function () {
        var id = $(this).attr('rel');
        var value = $(this).attr('value');

        var loader = $('.lds-ring[rel="' + id + '"]');
        loader.css('visibility', 'visible');

        $.post('content/asyncEdit/', {'id': id, 'value': value}, function (o) {
            if (o > 0) {
                loader.css('visibility', 'hidden');

            } else {
                loader.css('visibility', 'hidden');

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