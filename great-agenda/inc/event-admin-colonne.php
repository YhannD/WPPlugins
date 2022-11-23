<?php
/**
 * @package Great Agenda
 *
 * Rajout de colonnes type, start_date, end_date sur la liste des événements en admin
 * Passe par le hook manage_[custom]_posts_columns
 *
 *  https://wordpress.bbxdesign.com/astuces/ajouter-des-colonnes-dans-ladmin-wordpress
 */

// Titre de colonnes : hook -> manage_[custompost]_posts_columns
add_action('manage_event_posts_columns', 'show_event_columns');
function show_event_columns($columns)
{

    $columns['date_start'] = __('Date de début', 'greatAgenda');
    $columns['date_end'] = __('Date de fin', 'greatAgenda');
    $columns['time_start'] = __('Horaire', 'greatAgenda');

    return $columns;

}

// Afficher les valeurs pour chaque ligne : hook -> manage_[custompost]_posts_custom_column
add_action('manage_event_posts_custom_column', 'display_event_rows', 10, 2);
function display_event_rows($column, $id_event)
{
    /**
     * Le hook manage_event_posts_custom_column est exécuté dans une boucle
     * pour chaque ligne de données affichées pour un post
     *
     */
    switch ($column) {
        case 'date_start' :
            echo get_date_format('date_start', 'd F Y', $id_event);
            break;
        case 'date_end' :
            echo get_date_format('date_end', 'd F Y', $id_event);
            break;
        case 'time_start' :
            if (get_post_meta($id_event, 'all_day', true) ==='0') {
                echo sprintf(
                    'De %1$s à %2$s',
                    get_date_format('time_start', 'H:i'),
                    get_date_format('time_end', 'H:i'),

                );
            }else {
                echo  __('Toute la journée', 'greatAgenda');
                }
            break;

    }
}