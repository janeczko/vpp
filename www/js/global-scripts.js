$(function() {

    $('#main-menu .menu-items > li').click(function() {
        window.location = $(this).find('a').attr('href');
    });

});