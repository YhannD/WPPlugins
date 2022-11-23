<?php

/**
 * @package Great Slider
 * @Version 1.0
 *
 * Plugin Name: Great slider
 * Description: Custom Post pour des sliders
 *
 * Author: TDWM - Groupe 9
 * Version: 1.0
 * Text Domain: greatslider
 */

if (!defined('ABSPATH')) {
    die('Invalid request.');
}

require_once (dirname(__FILE__).'/class/GreatSlider.php');

function greatSlider()
{
    $prefix = 'gs';
    $version = '1.0.0';
    $dir="great-slider";

    return GreatSlider::getInstance($prefix,$version,$dir);
}
add_action('plugins_loaded','greatSlider');

////chemin systeme
//define('GS_PLUGIN_DIR', plugin_dir_path(__FILE__));
//
//// chemin http acces au bibliotheques js et css
//define('GS_PLUGIN_URL', plugins_url("/", __FILE__));
//define('GS_URL_CSS', GS_PLUGIN_URL . 'assets/css');
//define('GS_URL_JS', GS_PLUGIN_URL . 'assets/js');

//add_action('template_redirect', 'gs_wp_enqueue_scripts');
//function gs_wp_enqueue_scripts()
//{
//    //Déclarer le script
//    wp_enqueue_script(
//        'gsSlider',
//        GS_URL_JS . '/gsSlider.js',
//        array(),
//        '1.0',
//        true
//
//    );

//    wp_localize_script(
//        'gsSlider',
//        'gs-enqueue-scripts',
//        ['ajax_url'=>admin_url('admin-ajax.php')]
//    );
//}
//
//add_action('template_redirect', 'gs_wp_enqueue_css');
//function gs_wp_enqueue_css()
//{
//    //Déclarer le script
//    wp_enqueue_style(
//        'gsSlider',
//        GS_URL_CSS . '/gsSlider.css',
//        array(),
//        '1.0'
//
//    );

//    wp_localize_style(
//        'gsSlider',
//        'gs-enqueue-css',
//        ['ajax_url'=>admin_url('admin-ajax.php')]
//    );
//}

//require_once GS_PLUGIN_DIR . '/inc/gs-enqueue-scripts.php';
//require_once GS_PLUGIN_DIR . '/inc/gs-enqueue-css.php';
//require_once plugin_dir_path(__FILE__).'/inc/slider-custom-post.php';