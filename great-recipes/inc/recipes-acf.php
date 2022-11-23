<?php
/**
 * @package Great Recipes
 * @Version 1.0
 * 
 * Création des groupes de champs ACF
 */

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_62b9598fc18d4',
        'title' => 'Champs sur les recettes',
        'fields' => array(
            array(
                'key' => 'field_62b959d5fb558',
                'label' => 'La recette nécessite une cuisson',
                'name' => 'cooking',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '25',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 1,
                'ui' => 0,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
            array(
                'key' => 'field_62b95a5cfb559',
                'label' => 'Temps de cuisson',
                'name' => 'cooking_time',
                'type' => 'number',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_62b959d5fb558',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '25',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '',
                'step' => 1,
            ),
            array(
                'key' => 'field_62b95c7aab6e6',
                'label' => 'Auteur de la recette',
                'name' => 'cooker',
                'type' => 'user',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '24',
                    'class' => '',
                    'id' => '',
                ),
                'role' => '',
                'allow_null' => 0,
                'multiple' => 0,
                'return_format' => 'array',
            ),
            array(
                'key' => 'field_62b95de5d9898',
                'label' => 'Nombre de personnes',
                'name' => 'persons',
                'type' => 'number',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '25',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '',
                'step' => 1,
            ),
            array(
                'key' => 'field_62b95e0f6520e',
                'label' => 'Niveau de difficulté',
                'name' => 'level',
                'type' => 'range',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'min' => '0',
                'max' => '100',
                'step' => 10,
                'prepend' => '',
                'append' => '',
            ),
            array(
                'key' => 'field_62b95e996dea0',
                'label' => 'Coût',
                'name' => 'cost',
                'type' => 'radio',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'low' => 'Bon marché',
                    'medium' => 'Pas trop cher',
                    'expansive' => 'Cher',
                ),
                'allow_null' => 0,
                'other_choice' => 0,
                'default_value' => 'low',
                'layout' => 'vertical',
                'return_format' => 'value',
                'save_other_choice' => 0,
            ),
            array(
                'key' => 'field_62b9603052a74',
                'label' => 'Ingrédients',
                'name' => 'ingredients',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'basic',
                'media_upload' => 1,
                'delay' => 0,
            ),
            array(
                'key' => 'field_62b9609fe981c',
                'label' => 'Astuces & conseils',
                'name' => 'advices',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'basic',
                'media_upload' => 1,
                'delay' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'recipe',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'acf_after_title',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));
    
endif;		