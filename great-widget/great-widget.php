<?php
/**
 * @package Great Widgets
 * @Version 1.0
 * @link https://karac.ch/blog/creer-ses-widgets-wordpress
 *
 * Plugin Name: Great Widgets
 * Description: Des widgets sympas
 * Author: TDWM - Groupe 9
 * Version: 1.0
 * Text Domain: greatwidgets
 */
if (!defined('ABSPATH')) {
    die('Invalid request.');
}

require_once plugin_dir_path(__FILE__).'/class/GreatCoordinates.php';