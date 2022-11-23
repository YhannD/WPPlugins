<?php
/**
 * @package Great Recipes
 * 
 * Création d'un custom post recipe
 * https://developer.wordpress.org/reference/functions/register_post_type/
 */

function greatrecipes_register_custom_post() {

    register_post_type(
        'recipe', // Nom du custom post
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
                'name'          => __('Recettes','greatrecipes'),
                'singular_name' => __('Recette','greatrecipes'),
                'all_items'     => __('Toutes les recettes','greatrecipes'),
                'add_new_item'  => __('Ajouter une nouvelle recette','greatrecipes'),
                'new_item'      => __('Nouvelle recette','greatrecipes'),
                'edit_item'     => __('Modifier la recette','greatrecipes'),
                'search_items'  => __('Rechercher parmi les recettes','greatrecipes'),
                'not_found'     => __('Aucune recette','greatrecipes'),
                'not_found_in_trash'     => __('Aucune recette dans la corbeille','greatrecipes'),
            )
        )
    );

}
add_action('init', 'greatrecipes_register_custom_post');