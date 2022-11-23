<?php
/**
 * @package Great Pagination
 * @Version 1.0
 *
 * Plugin Name: Great Pagination
 * Description: Pagination Ajax
 * Author: TDWM - Groupe 9
 * Version: 1.0
 * Text Domain: greatPagination
 */

//Sécurité : on doit passer par le contrôler général
if ( ! defined( 'ABSPATH' ) ) {
    die( 'Invalid request.' );
}

define ('GP_PLUGIN_DIR', plugin_dir_path(__FILE__));
define ('GP_PLUGIN_URL', plugins_url('/',__FILE__));

require_once plugin_dir_path(__FILE__).'/inc/gpAjaxPagination.php';

add_action('template_redirect', 'gp_wp_enqueue_scripts');
function gp_wp_enqueue_scripts() {
    //Déclarer le script
    wp_enqueue_script(
        'ajaxPagination',
        GP_PLUGIN_URL. '/js/ajaxPagination.js',
        [],
        '1.0',
        true
    );
    wp_localize_script(
        'ajaxPagination',
        'gpAjaxPagination',
        ['ajax_url'=>admin_url('admin-ajax.php')]
    );
}