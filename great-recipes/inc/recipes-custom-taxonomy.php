<?php 

/**
 * @package Great Recipes
 * 
 * Création d'une nouvelle taxonomy associée aux recettes et aux articles
 * https://developer.wordpress.org/reference/functions/register_taxonomy/
 * 
 * Création d'un shortcode affichant la liste des termes existants 
 */

 function greatrecipes_register_taxonomy() {

    register_taxonomy(
        // Identifiant de la taxonomie
        'country',
         // A quel custom appliquer cette taxonomie
        array('recipe','page'),
        array(
            // Fonctionne comme les mots clés 
            'hierarchical' => false,
            // Description
            'description' => __('Classer les recettes par pays', 'greatrecipes'),
            'show_admin_column' => true,
            'labels'      => array(
                'name'          => __('Pays','greatrecipes'),
                'singular_name' => __('Pays','greatrecipes'),
                'all_items'     => __('Tous les pays','greatrecipes'),
                'edit_item'     => __('Modifier le pays','greatrecipes'),
                'new_item'      => __('Nouveau pays','greatrecipes'),
                'update_item'   => __('Modifier le pays','greatrecipes'),
                'search_items'  => __('Rechercher parmi les pays','greatrecipes'),
                'popular_items' => __('Pays les plus utilisés','greatrecipes'),
                'not_found'     => __('Aucun pays','greatrecipes'),
            ),
        )
        
    );
}
add_action('init','greatrecipes_register_taxonomy');