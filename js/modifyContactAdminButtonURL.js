$('document').ready(function() {
    var buttons = [];
    buttons.push($('#help_panel .btn-contact-admin'));
    if (contactAdminButtonSettings.topLink) buttons.push($('div.hang:contains("Contact REDCap administrator") a'))
    for (button of buttons){
        if (contactAdminButtonSettings.url.length > 0) button.attr('href', contactAdminButtonSettings.url)
        if (!contactAdminButtonSettings.sameTab) button.attr('target', '_blank')
        if (contactAdminButtonSettings.label.length > 0) button.html(contactAdminButtonSettings.label)
        if (contactAdminButtonSettings.hide) button.parent().hide()
        if (contactAdminButtonSettings.removeSuggest) {
            let suggestLink = $('#help_panel a[href*="enduser_survey"]')
            if (suggestLink.length === 1) suggestLink.parent().hide()
        }
    }
})
