$(function () {
    $('.toggleSubmenu').click(function () {
        var submenu = $(this).parent().children(".submenu");

        var children = submenu.children().length;
        var maxheight = children * 50;
        var maxheightStr = maxheight.toString();

        if (submenu.css('overflow') === 'hidden') {
            submenu.css('overflow', 'visible');
            submenu.css("max-height", maxheightStr + "px");
            $(this).addClass("submenuIsFocused")
        } else {
            submenu.css('overflow', 'hidden');
            submenu.css("max-height", '');
            $(this).removeClass("submenuIsFocused")

        }

    });
});