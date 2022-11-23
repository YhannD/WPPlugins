<?php
/**
 * Gestion des coordonnées
 */
if (!defined('ABSPATH')) {
    die('Invalid request.');
}

class GreatCoordinates extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'GreatCoordinates',
            esc_html__('Great Coordonnées', 'greatwidgets'),
            array('description' => esc_html__('Affiche les coordonnées', 'greatwidgets'),)
        );
    }

    private array $widget_fields = array(
        array(
            'label' => 'Titre de bloc',
            'id' => 'title_text',
            'type' => 'text',
            'default' => 'Coordonnées'
        ),
        array(
            'label' => 'Adresse',
            'id' => 'adresse_text',
            'type' => 'text',
        ),
        array(
            'label' => 'Email',
            'id' => 'email_email',
            'type' => 'email',
        ),
        array(
            'label' => 'Téléphone',
            'id' => 'tlphone_tel',
            'type' => 'tel',
        ),
    );

    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        echo '<h2>' . $instance['title_text'] . '</h2>';
        echo '<h2>' . $instance['adresse_text'] . '</h2>';
        echo '<h2>' . $instance['email_email'] . '</h2>';
        echo '<h2>' . $instance['tlphone_tel'] . '</h2>';
        echo $args['after_widget'];
    }

    public function field_generator($instance)
    {
        $output = '';
        foreach ($this->widget_fields as $widget_field) {
            $default = '';
            if (isset($widget_field['default'])) {
                $default = $widget_field['default'];
            }
            $widget_value = !empty($instance[$widget_field['id']]) ? $instance[$widget_field['id']] : esc_html__($default, 'greatwidget');
            switch ($widget_field['type']) {
                default:
                    $output .= '<p>';
                    $output .= sprintf(
                        '<label for="%1$s">%2$s</label>',
                        esc_attr($this->get_field_id($widget_field['id'])),
                        esc_html__($widget_field['label'], 'greatwidget')
                    );
                    $output .= sprintf(
                        '<input class="widefat" id="%1$s" name="%2$s" type="%3$s" value="%4$s">',
                        esc_attr($this->get_field_id($widget_field['id'])),
                        esc_attr($this->get_field_name($widget_field['id'])),
                        $widget_field['type'],
                        esc_attr($widget_value)
                    );
                    $output .= '</p>';
            }
        }
        echo $output;
    }

    //Affichage du formulaire(méthode de classe)
    public function form($instance)
    {
        $this->field_generator($instance);
    }

    //Enregistrement des données (méthodes de classe
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        foreach ($this->widget_fields as $widget_field) {
            switch ($widget_field['type']) {
                default:
                    $instance[$widget_field['id']] = (!empty($new_instance[$widget_field['id']])) ? strip_tags($new_instance[$widget_field['id']]) : '';
            }
        }
        return $instance;
    }

}

add_action('widgets_init', 'register_GreatCoordinates');

function register_GreatCoordinates()
{
    register_widget('GreatCoordinates');
}

