<?php

/**
 * @package Great Agenda
 *
 * Création d'un custom post agenda
 * https://developer.wordpress.org/reference/functions/register_post_type/
 */

function event_register_custom_post(){
    register_post_type(
        'event', // Nom du custom post
        array(
            'labels' => array(
                'name'          => __('Agenda','greatagenda'),
                'singular_name' => __('Event','greatagenda'),
                'all_items'     => __('Toutes les events','greatagenda'),
                'add_new_item'  => __('Ajouter une nouvelle event','greatagenda'),
                'new_item'      => __('Nouvelle event','greatagenda'),
                'edit_item'     => __('Modifier l event','greatagenda'),
                'search_items'  => __('Rechercher parmi les events','greatagenda'),
                'not_found'     => __('Aucune event','greatagenda'),
                'not_found_in_trash'     => __('Aucune event dans la corbeille','greatagenda'),
            ),
            // Un custom post peut ne pas être visible au public (exemple : les groupes de champs ACF)
            'public' => true,
            // Se comporte comme un article
            'capability_type' => 'post',
            // Zones de saisie activées
            'supports' => array('title','editor','excerpt','thumbnail'),
            // Gestion des archives
            'has_archive' => true,
            // Taxonomies associées
            'taxonomies' => array('category','post_tag')
        )
    );
}
add_action('init', 'event_register_custom_post' );