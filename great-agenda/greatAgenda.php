<?php

/**
 * @package Great Agenda
 * @Version 1.0
 *
 * Plugin Name: Great Agenda
 * Description: Custom Post pour des recettes de cuisine
 * Author: TDWM - Groupe 9
 * Version: 1.0
 * Text Domain: greatagenda
 */

if ( ! defined( 'ABSPATH' ) ) {
    die( 'Invalid request.' );
}

define ('AGENDA_PLUGIN_DIR', plugin_dir_path(__FILE__));

require_once plugin_dir_path(__FILE__).'/inc/event-custom-post.php';
require_once plugin_dir_path(__FILE__).'/inc/event-shortcode.php';
require_once plugin_dir_path(__FILE__).'/inc/event-acf.php';
require_once plugin_dir_path(__FILE__).'/inc/event-template-loader.php';
require_once plugin_dir_path(__FILE__).'/inc/event-function.php';
require_once plugin_dir_path(__FILE__).'/inc/event-admin-colonne.php';