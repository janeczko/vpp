function changeMenuActive() {
    var menu = $("#main-menu .menu-items");

    menu.find('li').removeClass('active');
    menu.find('li.contact-link').addClass('active');
}

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

    $('.right-menu-items .open-search-panel').click(function() {
        if (window.innerWidth >= 960) {
            $('#search-panel').toggleClass('opened');
            $('#search-input').focus();
        }
    });

});