<?php
/**
 * @file
 * Provides ExternalModule class for Modify Contact Admin Button Module.
 */

namespace Modify_Contact_Admin_Button\ExternalModule;

use ExternalModules\AbstractExternalModule;
use ExternalModules\ExternalModules;
use User;

/**
 * ExternalModule class for Modify Contact Admin Button.
 */
class ExternalModule extends AbstractExternalModule {

    /**
     * @inheritdoc
     */
    function redcap_every_page_top($project_id) {

        if($project_id) {

            global $user_firstname, $user_lastname, $user_email, $Proj;

            $length = sizeof($this->getSystemSetting('contact-admin-button-parameters-list-key'));
            $parameter_names = $this->getSystemSetting('contact-admin-button-parameter-name');
            $parameter_values = $this->getSystemSetting('contact-admin-button-parameter-value');
            $url = $this->getSystemSetting('contact-admin-button-url-key');

            $settings = [
                    "user_firstname"=> $user_firstname,
                    "user_lastname" => $user_lastname,
                    "user_email" => $user_email,
                    "project_id" => $project_id,
                    "username" => USERID,
            ];

            for($i = 0; $i < $length; $i++){
                if ($parameter_names[$i] and $parameter_values[$i]){
                    $url .= '&' . filter_var($parameter_names[$i],FILTER_SANITIZE_URL) . 
                    '=' . $settings[$parameter_values[$i]];
                }
            }

            $this->sendVarToJS('contactAdminButtonURL', $url);
            
            // If the user entered a url, change the 'Contact REDCap administrator' button href.
            if($url){
                $this->includeJs('js/modifyContactAdminButtonURL.js');
            }
        }
        
        return;
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
