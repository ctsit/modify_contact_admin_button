# REDCap module: Modify Contact Admin Button

Modify the behavior of the 'Contact REDCap Administrator' button by redirecting the user to a configurable url. The url should be provided as part of the external module configuration. A series of parameters are added to the URL to make details about the current REDCap user and project available to the target form.

## Prerequisites
- REDCap >= 8.0.0 (for versions < 8.0.0, [REDCap Modules](https://github.com/vanderbilt/redcap-external-modules) is required).


## Installation
- Clone this repo into `<redcap-root>/modules/modify_contact_admin_button_v<version_number>`.
- Go to **Control Center > External Modules** and enable Modify Contact Admin Button.
- Still in **Control Center > External Modules** configure the module with a URL of a web form. For example, you could provide the URL of a REDCap survey used for service request intake. Then activate this module for all projects.


## Features included
These name-value pairs are appended to the URL:

    user_firstname: user_firstname
    user_lastname: user_lastname
    email: user_email
    project_id: project_id
    username: username
    gatorlink: username
    registered_in_redcap: 1

In use, the rewritten target URL might look like this if Jane Doe clicks the button while in Project ID 14:

    https://redcap.example.org/surveys/?s=DUPrXGmx3L&gatorlink=jdoe&project_id=14&redcap_username=jdoe&registered_in_redcap=1&first_name=Jane&last_name=Doe&email=jdoe@example.org

To use the appended parameters, name the fields in the target REDCap survey to match the names shown above.  The names are the left hand side of the above pairs, e.g. user\_firstname, user\_lastname, email, project\_id, username, gatorlink, and registered\_in\_redcap.

## ToDO

Allow names of parameters appended to the URL to be configurable at a system level.
