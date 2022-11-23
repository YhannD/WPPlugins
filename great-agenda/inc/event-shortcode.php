<?php

add_shortcode( 'events', 'event_shortcode' );
function event_shortcode($attributes) {

    extract(
        shortcode_atts(
            array(

                'nb'       => 3,
                'titre'    =>  __('Derniers events', 'greatagenda')
            ),
            // Paramètres passés au shortcode (exemple : [portait type=recipe])
            $attributes
        )
    );



    $criteria = [
        'post_type' 		=> "event",
        'meta_key'          => 'date_start',
        'meta_value'        => date('d/m/Y'),
        'meta_compare'      => '>',
        'posts_per_page' 	=> $nb,
        'orderby'           => 'meta_value_num',
        'order'             => 'ASC',
    ];




    $query = new WP_Query( $criteria );

    // Démarrer la temporisation de sortie
    ob_start();

//    echo '<section>';
//    echo '<h2>' . $titre . '</h2>';


    while( $query->have_posts() ) :

        $query->the_post();
        // Affichage du code html : appel à un template part
//        the_title();
//        the_content();
//
//        the_field("date_start");
    $event_template_loader = new Event_template_Loader();
    $event_template_loader ->get_template_part('content','event');



    endwhile;

    echo '</div>';
    echo '</section>';

    // Récupérer et vider le tampon
    $html = ob_get_clean();

    // Ré-initialiser le curseur mySql ( correspondant à ->closeCursor())
    wp_reset_postdata();

    // Renvoie le tampon sans l'afficher
    return $html;
}