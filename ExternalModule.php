<?php
/**
 * @file
 * Provides ExternalModule class for Modify Contact Admin Button Module.
 */

namespace Modify_Contact_Admin_Button\ExternalModule;

use ExternalModules\AbstractExternalModule;

/**
 * ExternalModule class for Modify Contact Admin Button.
 */
class ExternalModule extends AbstractExternalModule {

    function redcap_module_configure_button_display($project_id = null) {
        // Only super users may configure on the project level.
        return defined("SUPER_USER") && SUPER_USER == 1 ? true : null;
    }

    /**
     * @inheritdoc
     */
    function redcap_every_page_top($project_id) {

        if($project_id) {

            global $user_firstname, $user_lastname, $user_email;
            
            $url = "";
            $label = "";
            $same_tab = false;
            $remove_suggest_link = $this->getProjectSetting('contact-admin-button-remove-suggest-new-feature-project');
            $hide = $this->getProjectSetting('contact-admin-button-hide-project');
            $topLink = $this->getProjectSetting('contact-admin-button-modify-toplink');

            if($this->getProjectSetting('contact-admin-button-override-project')) {
                // Use project overrides.
                $url = $this->getProjectSetting('contact-admin-button-url-key-project');
                $length = sizeof($this->getProjectSetting('contact-admin-button-parameters-list-key-project'));
                $parameter_names = $this->getProjectSetting('contact-admin-button-parameter-name-project');
                $parameter_values = $this->getProjectSetting('contact-admin-button-parameter-value-project');
                $label = $this->getProjectSetting('contact-admin-button-label-project');
                $same_tab = $this->getProjectSetting('contact-admin-button-sametab-project');
                $topLink = $this->getProjectSetting('contact-admin-button-modify-toplink-project');
            }
            if (!strlen($url)) {
                $url = $this->getSystemSetting('contact-admin-button-url-key');
                $length = sizeof($this->getSystemSetting('contact-admin-button-parameters-list-key'));
                $parameter_names = $this->getSystemSetting('contact-admin-button-parameter-name');
                $parameter_values = $this->getSystemSetting('contact-admin-button-parameter-value');
            }
            if (!strlen($label)) {
                $label = $this->getSystemSetting('contact-admin-button-label');
            }

            $settings = [
                    "user_firstname"=> $user_firstname,
                    "user_lastname" => $user_lastname,
                    "user_email" => $user_email,
                    "project_id" => $project_id,
                    "USERID" => defined("USERID") ? USERID: "",
            ];

            // Build URL.
            for($i = 0; $i < $length; $i++){
                if ($parameter_names[$i] and $parameter_values[$i]){
                    $query = parse_url($url, PHP_URL_QUERY);
                    if ($query) {
                        $url .= '&' . filter_var($parameter_names[$i], FILTER_SANITIZE_URL) . '=' . $settings[$parameter_values[$i]];
                    } else {
                        $url .= '?' . filter_var($parameter_names[$i], FILTER_SANITIZE_URL) . '=' . $settings[$parameter_values[$i]];
                    }
                }
            }

            // Send data to JavaScript.
            $contactAdminButtonSettings = array (
                "url" => strlen($url) ? $url : "",
                "label" => strlen($label) ? str_ireplace("<script", "&lt;script", $label) : "",
                "sameTab" => $same_tab,
                "hide" => $hide,
                "removeSuggest" => $remove_suggest_link,
                "topLink" => $topLink,
            );
            $this->sendVarToJS('contactAdminButtonSettings', $contactAdminButtonSettings);
            $this->includeJs('js/modifyContactAdminButtonURL.js');
        }
    }

    /**
     * Includes a local JS file.
     *
     * @param string $path
     *   The relative path to the js file.
     */
    protected function includeJs($path) {
        echo '<script src="' . $this->getUrl($path) . '"></script>';
    }

    /**
     * Sends PHP variables over to JS.
     *
     * @param string $name
     *   Variable name
     * @param var $value
     *   Variable value
     */
    protected function sendVarToJS($name, $value) {
        echo '<script>var '. $name .' = ' . json_encode($value) . ';</script>';
    }
}
