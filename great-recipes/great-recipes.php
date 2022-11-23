<?php
/**
 * @package Great Recipes
 * @Version 1.0
 * 
 * Plugin Name: Great Recipes
 * Description: Custom Post pour des recettes de cuisine
 * Author: TDWM - Groupe 9
 * Version: 1.0
 * Text Domain: greatrecipes
 */

// Sécurité : on doit passer par le contrôleur général 
if ( !defined( 'ABSPATH' ) ) {
	die( 'Invalid request.' );
}

// Répartitions des fonctionnalités dans des fichiers 
require_once plugin_dir_path( __FILE__ ) . '/inc/recipes-custom-post.php';
require_once plugin_dir_path( __FILE__ ) . '/inc/recipes-custom-taxonomy.php';
require_once plugin_dir_path( __FILE__ ) . '/inc/recipes-acf.php';