<?php
/**
 * Template loader for Agenda.
 */

if ( ! class_exists( 'Gamajo_Template_Loader' ) ) {
    require plugin_dir_path( __FILE__ ) . '/class-gamajo-template-loader.php';
}

class Event_template_Loader extends Gamajo_Template_Loader {

    /**
     * Reference to the root directory path of this plugin.
     * Can either be a defined constant, or a relative reference from where the subclass lives.
     * @var string
     */
    protected $plugin_directory = AGENDA_PLUGIN_DIR;

    /**
     * Directory name where templates are found in this plugin.
     * @var string
     */
    protected $plugin_template_directory = 'template-parts';
}