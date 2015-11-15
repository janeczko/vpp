$(function() {

    $(document).on('click', '.admin-logout', function(e) {
        if (!confirm('Opravdu se chcete odhlásit?')) {
            e.preventDefault();
        }
    });

});