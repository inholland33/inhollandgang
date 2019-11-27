$(function () {

    $.get('dashboard/xhrGetListings', function (o) {
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

    }, 'json');


    $('#randomInsert').submit(function () {
        var url = $(this).attr('action');
        var data = $(this).serialize();

        $.post(url, data, function (o) {
            $('#listInserts').append('<div>' + o.id + " " + o.text + ' <a class="del" rel="' + o.id + '" href="#">X</a></div>');
        }, 'json');


        return false;
    });

});