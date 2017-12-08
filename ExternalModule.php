<?php
/**
 * @file
 * Provides ExternalModule class for Pain Map.
 */

namespace Modify_Contact_Admin_Button\ExternalModule;

use ExternalModules\AbstractExternalModule;
use ExternalModules\ExternalModules;
use Form;

/**
 * ExternalModule class for Pain Map.
 */
class ExternalModule extends AbstractExternalModule {

    /**
     * @inheritdoc
     */
    function redcap_every_page_top($project_id) {
        global $user_firstname, $user_lastname, $user_email;
        echo '<script>var user_firstname = ' . json_encode($user_firstname) . ';</script>';
        echo '<script>var user_lastname = ' . json_encode($user_lastname) . ';</script>';
        echo '<script>var user_email = ' . json_encode($user_email) . ';</script>';
        echo '<script>var project_id = ' . json_encode($project_id) . ';</script>';
        
        $this->includeJs('js/helper.js');
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
}
