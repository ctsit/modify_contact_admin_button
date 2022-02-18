# Change Log

All notable changes to the Modify Contact Admin Button project will be documented in this file.
This project adheres to [Semantic Versioning](http://semver.org/).

## [2.1.1] - 2022-02-21
### Changed
- PHP8 compatibility fix (GR)

## [2.1.0] - 2020-02-24
### Changed
- Remove old authors from config.json and update description (Philip Chase)
- Update description in README and fix min RC version (Philip Chase)

### Added
- Add AUTHORS file (Philip Chase)
- Possiblity to override settings on the project level. (GR)
- Choice to open link in a new tab or not. (GR)
- Option to change the label of the contact button. (GR)


## [2.0.3] - 2019-04-10
### Changed
- Open url in a new tab. (Marly Cormar)


## [2.0.2] - 2018-11-08
### Changed
- Fix button selector to support newer REDCap versions. (Tiago)


## [2.0.1] - 2018-03-08
### Changed
- Update minimum redcap version number (Marly)
- Replace broken username field with USERID (Marly)

### Added
- Add Taryn as an author (Marly)


## [2.0.0] - 2018-01-04
### Removed
- Remove registered_in_redcap from example url (Marly)
- Remove steps to create url as it is already done in ExternalModule.php (Marly)
- Remove the parameter registered_in_redcap from the final url (Marly)
- Remove unnecessary variables (Marly)

### Changed
- Update module instructions (Marly)
- Rename email parameter name and value to user_email (Marly)
- Rename email parameter name to user_email (Marly)
- Replace the name of the field 'Target URL' in the system-wide settings to 'Base URL' (Marly)
- Update documentation (Marly)
- Rename text field to provide clarity (Marly)
- Append parameter name-value pairs to final url (Marly)

### Added
- Construct url in ExternalModule.php (Marly)
- Include reference to the documentation in github (Marly)
- Include module configuration example (Marly)
- Include documentation on how to configure parameter name-value pairs added to the URL (Marly)
- Include registered_in_redcap variable in the final url (Marly)
- Add new configurable parameter name-value pairs what will be appended to the url (Marly)
- Send sanitized parameter value/name pairs to js to later add to URL (Marly)


## [1.0.0] - 2017-12-15
### Changed
- Converted REDCap hook to a module (Marly)
- Provided the ability to configure the base URL referenced by the button at the system level (Marly)
- Preserved all parameters appended to base URL (Marly)

### Added
- Added README (Philip Chase)
- Added LICENSE (Marly)
