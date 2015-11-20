$(function() {


    $('.open-main-menu').click(function() {
        $('#main-menu .menu-items').toggleClass('opened');
    });

    $('#main-menu .menu-items > li').click(function() {
        if (window.innerWidth < 960) {
            $('.open-main-menu').trigger('click');
        }

        window.location = $(this).find('a').attr('href');
    });

});