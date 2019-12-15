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
        $('#buttons').empty();
        var event = $(this).attr('rel');

        $.post('content/asyncGetListings/', {'event': event}, function (o) {
            for (var i = 0; i < o.length; i++) {
                switch (o[i].type) {
                    case "title":
                        rows = 1;
                        cols = 40;
                        font_size = 24;
                        font_weight = "bold";
                        break;
                    case "subtitle":
                    case "content":
                        rows = 7;
                        cols = 92;
                        font_size = 14;
                        font_weight = "regular";
                        break;
                    case "header":
                        rows = 2;
                        cols = 50;
                        font_size = 24;
                        font_weight = "regular";
                        break;
                    case "image":
                        rows = 0;
                        cols = 0;
                        font_size = 0;
                        font_weight = "none";
                        break;
                }
                $('#listInserts').append('<p class="status" rel="' + o[i].content_id + '"></p></br>' +
                    '<textarea ' +
                    'class="content" ' +
                    'id="content' + o[i].content_id + '" ' +
                    'rel="' + o[i].content_id + '" ' +
                    'rows="' + rows + '" ' +
                    'cols="' + cols + '" ' +
                    'style="font-weight: ' + font_weight + '; font-size: ' + font_size + 'px">' + o[i].text +
                    '</textarea>');
            }
            $('#buttons').append('</br>' +
                '<button id="updateContent" class="btn btn-outline-success">Save All</button> ' +
                '<a href="dashboard/logout" id="viewSite" rel="' + event + '" class="btn btn-outline-secondary">View Site</a>  ');

        }, 'json');
    });

    $('.content').live('focusout', function () {
        var id = $(this).attr('rel');

        var value = $(this).attr('value');
        var status = $('.status[rel="' + id + '"]');
        var content = $(this);

        try {
            $.post('content/asyncEdit/', {'id': id, 'value': value}, function (o) {

            }, 'json');
        } catch (e) {
            content.css("border", "red");
            content.css("display", "block");
            status.html("* " + e);
            content.addClass("notUpdated");
            }

    });
}, 'json');


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

