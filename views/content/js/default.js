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


    $('.getPage').live('click', function () {
        $('#listInserts').empty();
        $('#buttons').empty();
        $('.getPage').removeClass('active');
        $('.getPage').prop('disabled', false);
        $('.getPage').css('text-decoration', 'none');

        $(this).addClass('active');
        $(this).prop('disabled', true);
        $(this).css('text-decoration', 'underline');
        var page = $(this).attr('rel');
        $.post('content/asyncGetListings/', {'page': page}, function (result) {
            for (var i = 0; i < result.length; i++) {
                switch (result[i].type) {
                    case "title":
                        result[i].rows = 2;
                        result[i].cols = 40;
                        result[i].font_size = 24;
                        result[i].font_weight = "bold";
                        break;
                    case "subtitle":
                    case "content":
                        result[i].rows = 7;
                        result[i].cols = 92;
                        result[i].font_size = 14;
                        result[i].font_weight = "regular";
                        break;
                    case "header":
                        result[i].rows = 2;
                        result[i].cols = 50;
                        result[i].font_size = 24;
                        result[i].font_weight = "regular";
                        break;
                    case "image":
                        result.splice(i, 1);
                        break;
                    default:
                        error("something went wrong!");
                        break;
                }
            }

            for (i = 0; i < result.length; i += 2) {
                $('#listInserts').append('<section class="contentContainer"><p class="status" rel="' + result[i].content_id + '"></p></br>' +
                    '<textarea ' +
                    'class="content" ' +
                    'id="content' + result[i].content_id + '" ' +
                    'rel="' + result[i].content_id + '" ' +
                    'rows="' + result[i].rows + '" ' +
                    'cols="' + result[i].cols + '" ' +
                    'style="font-weight: ' + result[i].font_weight + '; font-size: ' + result[i].font_size + 'px">' + result[i].text +
                    '</textarea>' +

                    '<p class="status" rel="' + result[i + 1].content_id + '"></p></br>' +
                    '<textarea ' +
                    'class="content" ' +
                    'id="content' + result[i + 1].content_id + '" ' +
                    'rel="' + result[i + 1].content_id + '" ' +
                    'rows="' + result[i + 1].rows + '" ' +
                    'cols="' + result[i + 1].cols + '" ' +
                    'style="font-weight: ' + result[i + 1].font_weight + '; font-size: ' + result[i + 1].font_size + 'px">' + result[i + 1].text +
                    '</textarea>' +
                    '</section');
            }

            $('#buttons').append('</br>' +
                '<a href="' + page + '" id="viewSite" class="btn btn-outline-secondary btn-lg">View Site</a>' +
                '<button id="updateContent" class="btn btn-success btn-lg">Save All</button>');

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

