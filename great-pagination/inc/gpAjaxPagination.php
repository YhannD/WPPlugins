<?php
/**
 * @package WordPress
 * @subpackage GreatPagiantion
 * @version V.1.0
 *
 * Pagination AJAX
 */

//Les requêtes Ajax ne fonctionnent que pour les utilisateurs connectés
add_action('wp_ajax_gpAjaxPagination', 'gp_pagination');
//Les requêtes Ajax fonctionneront aussi avec les utilisateurs non connectés
add_action('wp_ajax_nopriv_gpAjaxPagination', 'gp_pagination');
function gp_pagination(){

}
