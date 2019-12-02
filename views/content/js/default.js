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
                switch (o[i].type) {
                    case "title":
                        rows = 1;
                        cols = 20;
                        font_size = 24;
                        font_weight = "bold";
                        break;
                    case "subtitle":
                        rows = 5;
                        cols = 100;
                        font_size = 12;
                        font_weight = "regular";
                        break;
                    case "header":
                        rows = 1;
                        cols = 20;
                        font_size = 20;
                        font_weight = "regular";
                        break;
                    case "content":
                        rows = 5;
                        cols = 100;
                        font_size = 12;
                        font_weight = "regular";
                        break;
                    case "image":
                        rows = 0;
                        cols = 0;
                        font_size = 0;
                        font_weight = "none";
                        break;
                }
                $('#listInserts').append('<textarea class="content" name="content' + o[i].content_id + '" rel="' + o[i].content_id + '" rows="' + rows + '" cols="' + cols + '" style="font-weight: ' + font_weight + '; font-size: ' + font_size + 'px">' + o[i].text + '</textarea>' +
                    '<button class="saved">Saved' +
                    '<div rel="' + o[i].content_id + '" class="lds-ring">' +
                    '<div></div><div></div><div></div><div></div></div>' +
                    '<div rel="' + o[i].content_id + '"  class="success">&#10003;</div>' +
                    '<div rel="' + o[i].content_id + '"  class="failed">&#10005;</div>' +
                    '</button></br>');
            }

        }, 'json');
    });

    $('.content').live('focusout', function () {
        var id = $(this).attr('rel');
        var value = $(this).attr('value');

        var loader = $('.lds-ring[rel="' + id + '"]');
        loader.css('display', 'inline-block');

        var success = $('.success[rel="' + id + '"]');
        var failed = $('.failed[rel="' + id + '"]');

        $.post('content/asyncEdit/', {'id': id, 'value': value}, function (o) {
            if (o > 0) {
                loader.css('display', 'none');
                success.css('display', 'inline-block');
                failed.css('display', 'none');

            } else {
                loader.css('display', 'none');
                failed.css('display', 'inline-block');
                success.css('display', 'none');
            }


        }, 'json');
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

