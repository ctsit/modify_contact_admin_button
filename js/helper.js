$('document').ready(function() {
        var searchResults = document.querySelectorAll('#help_panel div div div div div a.btn-contact-admin.btn-primary.btn-xs');

        if(searchResults.length === 1) {
        var button = searchResults[0];
        var username = document.getElementById('username-reference').textContent

        button.href = 'https://redcap.ctsi.ufl.edu/redtracs/surveys/?s=J7T3LCRTDC&gatorlink='
            + username + '&project_id' + project_id
            + '&redcap_username=' + username
            + '&registered_in_redcap=1'
            + '&first_name=' + user_firstname
            + '&last_name=' + user_lastname
            + '&email=' + user_email;
        }
});
