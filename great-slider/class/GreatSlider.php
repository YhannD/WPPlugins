<?php

if (!defined('ABSPATH')) {
    die('Invalid request.');
}

class GreatSlider
{
    private static $_instance = null;
    private static $version;
    private static $prefix;
    private static $pluginUrl;
    private static $pluginPath;

    private function __construct($p,$v,$dir){
        self::$prefix = $p;
        self::$version = $v;
        self::$pluginUrl = WP_PLUGIN_URL.'/'.$dir;
        self::$pluginPath = WP_PLUGIN_DIR.'/'.$dir;

        add_action('template_redirect', array($this,'enqueue_assets'));

        add_filter('post_gallery',array($this,'filter_shortcode_wp_gallery'),10,2);

    }

    public static function getInstance($p,$v,$dir){
        if(is_null(self::$_instance)){
            self::$_instance = new self($p,$v,$dir);
        }
        return self::$_instance;
    }

    public function enqueue_assets(){

        //Déclarer le script
        wp_enqueue_script(
            'gsutils-js',
            self::$pluginUrl . '/assets/js/utils.js',
            array(),
            self::$version,
            true
        );

        wp_enqueue_script(
            'gsSlider',
            self::$pluginUrl . '/assets/js/gsSlider.js',
            array('gsutils-js'),
            self::$version,
            true
        );



        //Déclarer le script
        wp_enqueue_style(
            'gsSlider',
            self::$pluginUrl . '/assets/css/gsSlider.css',
            array(),
            self::$version
        );

        // Icon bootstrap
        wp_enqueue_style(
            'Bootstrap-icons',
            '//cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css',
            array(),
            '1.9.11',
        'screen'
        );

    }

    public function filter_shortcode_wp_gallery($html='',$atts){

        /**
         *  Pas de slider sur les archives
         * ou en l'absence de l'attribut greatslider
         */
        if(!is_singular() || !isset($atts['greatslider'])){
            return $html;
        }

        ob_start();
        include self::$pluginPath.'/templates/gs-template.php';

        $html = ob_get_clean();

        return $html;

    }

}