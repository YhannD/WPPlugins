<?php
/**
 * @package Agenda Event
 * @version 1.0
 *
 * Widget Event
 */

if (!defined('ABSPATH')) {
    die('Invalid request.');
}

class GreatEvent extends WP_Widget
{
    public function __construct() {
        parent::__construct(
            'GreatEvent',
            esc_html__( 'GreatEvent', 'greatevent' ),
            array( 'description' => esc_html__( 'Affiche les évènements passés', 'greatevent' ), )
        );
    }

    private array $widget_fields = [
        [
            'label' => 'Titre',
            'id' => 'titre',
            'type' => 'text',
        ],
        [
            'label' => 'Nombre d\'événements',
            'id' => 'nb_events',
            'type' => 'number',
        ],
        [
            'label' => 'Choix des évènements',
            'id' => 'choice_events',
            'data' => array("Évènements passés" => 'passed',"Évènements futurs" => 'future'),
            'type' => 'radio',
        ],

    ];

    public function widget( $args, $instance ) {


        $order = ($instance['choice_events']== "future") ? 'ASC' : 'DESC';
        $date = ($instance['choice_events']== "future") ? "date_start" : "date_end";
        $compare = ($instance['choice_events']== "future") ? ">" : "<=";

        $criteria = [

            'post_type' 		=> "event",
            'posts_per_page' 	=> $instance['nb_events'],
            'meta_query' =>array(
                [
                    'key'     => $date,
                    'value' => date('Ymd'),
                    'compare' => $compare,

                ],
            ),
            'orderby'           => 'meta_value_num',
            'order'             => $order,
        ];

        $query = new WP_Query( $criteria );

        // Démarrer la temporisation de sortie
        ob_start();

        echo '<section>';
        echo '<h2>' . $instance['titre'] . '</h2>';


        while( $query->have_posts() ) :

            $query->the_post();
            // Affichage du code html : appel à un template part
            $event_template_loader = new Event_Template_Loader();
            $event_template_loader->get_template_part('content', 'event');

        endwhile;

        echo '</div>';
        echo '</section>';

        // Récupérer et vider le tampon
        $html = ob_get_clean();

        // Ré-initialiser le curseur mySql ( correspondant à ->closeCursor())
        wp_reset_postdata();

        // // Renvoie le tampon sans l'afficher
        echo $args['before_widget'];

        // Output generated fields
        echo '<p>'.$html.'</p>';

        echo $args['after_widget'];

    }

    public function field_generator( $instance ) {
        $output = '';
        foreach ( $this->widget_fields as $widget_field ) {
            $default = '';
            if ( isset($widget_field['default']) ) {
                $default = $widget_field['default'];
            }
            $widget_value = ! empty( $instance[$widget_field['id']] ) ? $instance[$widget_field['id']] : esc_html__( $default, 'textdomain' );
            switch ( $widget_field['type'] ) {
                case 'radio':
                    $output.= '<fieldset>';
                    $output.= '<legend>'.esc_html( $widget_field['label'] ).'</legend>';
                    foreach ($widget_field['data'] as $name => $label){
                        $output .= '<p>';
                        $output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $name, 'textdomain' ).':</label> ';
                        $output .= '<input class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" type="'.$widget_field['type'].'" value="'.esc_attr( $label ).'">';
                        $output .= '</p>';}
                    break;
                default:
                    $output .= '<p>';
                    $output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'textdomain' ).':</label> ';
                    $output .= '<input class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" type="'.$widget_field['type'].'" value="'.esc_attr( $widget_value ).'">';
                    $output .= '</p>';
            }
        }
        echo $output;
    }

    //Affichage du formulaire
    public function form( $instance ) {
        $this->field_generator( $instance );
    }

    //enregistrement des donnees (methode de classe)
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        foreach ( $this->widget_fields as $widget_field ) {
            switch ( $widget_field['type'] ) {
                case 'radio':
                    $instance[$widget_field['id']] = ( ! empty( $new_instance[$widget_field['id']] ) ) ? strip_tags( $new_instance[$widget_field['id']] ) : '';
                default:
                    $instance[$widget_field['id']] = ( ! empty( $new_instance[$widget_field['id']] ) ) ? strip_tags( $new_instance[$widget_field['id']] ) : '';
            }
        }
        return $instance;
    }

}
add_action( 'widgets_init', 'register_great_event' );
function register_great_event(): void
{
    register_widget( 'GreatEvent' );
}
