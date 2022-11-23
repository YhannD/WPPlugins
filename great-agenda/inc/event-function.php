<?php
/**
 * @package Great Agenda
 *
 * Fonctions utiles
 *
 */


/**
 *
 *  Formater la date enregistrée en base au format Ymd
 *  Sans passer par une fonction ACF :
 *  (les données saisies via ACF sont stockées dans la table wp_postmeta (fonctionnalité native))
 *
 *  Récupérer la valeur d'une métadonnée stockée dans la table postmeta
 *      https://developer.wordpress.org/reference/functions/get_post_meta/
 *      Retrieves a post meta field for the given post ID.
 *
 *
 *  Exploiter la fonction Wordpress date_i18n()
 *  afin de récupérer la date dans un format souhaité
 *  correspondant au timezone (avoir jour, mois en français, par exemple)
 *
 *      https://developer.wordpress.org/reference/functions/date_i18n/
 *      Retrieves the date in localized format,
 *      based on a sum of Unix timestamp and timezone offset in seconds.
 *
 *      Fonction php utile :
 *      La fonction strtotime() essaye de lire une date au format anglais
 *      pour la transformer en timestamp Unix
 *      https://www.php.net/manual/fr/function.strtotime.php
 *
 */

/**
 * get_date_format(string $key , string $format, int $post_id)
 *
 * @param  string $key      -> meta_key dans wp_postmeta
 * @param  string $format   -> format de date souhaité
 * @param  int $post_id     -> id dans wp_posts (par défault id du post dans la boucle)
 *
 * @return string           -> Date au format souhaité
 */

if( !function_exists('get_date_format') ) {

    function get_date_format($key, $format='Y-m-d', $post_id = null){

        // Récupérer l'id du post si on est dans la boucle
        if ( $post_id == null ) {
            global $post;
            $post_id = $post->ID;
        }

        // Récupération de la valeur de la meta_key sans passer par ACF
        $value = get_post_meta($post_id,$key,true);

        // Si valeur vide ou format date non compatible
        if(
            empty($value)
            || !($timestamp = strtotime($value) )
        ) {
            return false;
        }

        return date_i18n($format, $timestamp);

    }
}