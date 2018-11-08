$('document').ready(function() {
    var $button = $('#help_panel .btn-contact-admin');

    if ($button.length === 1) {
        $button.attr('href', contactAdminButtonURL);
    }
});
