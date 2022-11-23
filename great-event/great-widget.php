<?php
/**
 * @package Great Event
 * @Version 1.0
 * @link https://karac.ch/blog/creer-ses-widgets-wordpress
 *
 * Plugin Name: Great Event
 * Description: Des widgets pour les évènements
 * Author: TDWM - Groupe 9
 * Version: 1.0
 * Text Domain: greatevent
 */
if (!defined('ABSPATH')) {
    die('Invalid request.');
}

require_once plugin_dir_path(__FILE__).'/class/GreatEvent.php';