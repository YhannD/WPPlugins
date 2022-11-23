<?php
/**
 * @package Great Slider
 *
 * Création d'un custom post slider
 * https://developer.wordpress.org/reference/functions/register_post_type/
 */
function greatslider_register_custom_post(){

    register_post_type(
        'slider', // Nom du custom post
        array(
            // Un custom post peut ne pas être visible au public (exemple : les groupes de champs ACF)
            'public' => true,
            // Se comporte comme un article
            'capability_type' => 'post',
            // Zones de saisie activées
            'supports' => array('title','editor','excerpt','thumbnail'),
            // Gestion des archives
            'has_archive' => true,
            // Taxonomies associées
            'taxonomies' => array('category','post_tag'),
            'labels' => array(
                'name'          => __('Slider','greatslider'),
                'singular_name' => __('Slider','greatslider'),
                'all_items'     => __('Toutes les recettes','greatslider'),
                'add_new_item'  => __('Créer un nouveau slider','greatslider'),
                'new_item'      => __('Nouveau slider','greatslider'),
                'edit_item'     => __('Modifier le slider','greatslider'),
                'search_items'  => __('Rechercher parmi les slider','greatslider'),
                'not_found'     => __('Aucune slider','greatslider'),
                'not_found_in_trash'     => __('Aucune slider dans la corbeille','greatslider'),
            )
        )
    );
}
add_action('init','greatslider_register_custom_post');