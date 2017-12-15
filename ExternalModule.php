<?php
/**
 * @file
 * Provides ExternalModule class for Pain Map.
 */

namespace Modify_Contact_Admin_Button\ExternalModule;

use ExternalModules\AbstractExternalModule;
use ExternalModules\ExternalModules;
use User;

/**
 * ExternalModule class for Pain Map.
 */
class ExternalModule extends AbstractExternalModule {

    /**
     * @inheritdoc
     */
    function redcap_every_page_top($project_id) {
        
        if($project_id) {
            
            global $user_firstname, $user_lastname, $user_email, $username, $Proj;
            
            $url = $this->getProjectSetting('contact-admin-button-url-key');
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
