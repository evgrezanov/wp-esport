<?php

/**
 * Plugin Name:         WP eSport magazine
 * Description:         Add custom post types and taxonomies, special taxonomies subjects
 * Plugin URI:          https://github.com/evgrezanov/wp-esport-mag
 * Author URI:          https://evgrezanov.github.io/
 * Author:              Evgeniy Rezanov
 * Version:             1.2.1
 * GitHub Plugin URI:   https://github.com/evgrezanov/wp-esport
 * Text Domain:         wp-esport
 * Domain Path:         /languages
 */

defined('ABSPATH') || exit;

class WP_ESPORT {
    
    public static function init(){
        // All active plugins loaded
        add_action('plugins_loaded', function() {
	        load_plugin_textdomain( 'wp-esport', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' ); 
        }, 999);

        //add_action('wp_enqueue_scripts', [__CLASS__, 'assets']);
        
        require_once('inc/SettingsPage.php');

        require_once('inc/SubjectsTaxonomy.php');

        require_once('inc/CustomPostTypes.php');

        require_once('inc/CustomTaxonomy.php');

    }
}
WP_ESPORT::init();
?>