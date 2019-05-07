$('document').ready(function() {
    var button = $('#help_panel .btn-contact-admin')
    if (button.length === 1) {
        if (contactAdminButtonSettings.url.length > 0) button.attr('href', contactAdminButtonSettings.url)
        if (!contactAdminButtonSettings.sameTab) button.attr('target', '_blank')
        if (contactAdminButtonSettings.label.length > 0) button.html(contactAdminButtonSettings.label)
        if (contactAdminButtonSettings.hide) button.parent().hide()
    }
})