<?php

/*
*
* Plugin Name: Car-Service
* Plugin URI: http://car-service.loc/
 * Description: Шорткод - хостинги:
* Version: 1.1.1
* Author: Березко Алексей
* Author URI: http://car-service.loc/
 * License: GPLv2 or later
*/
ini_set('display_errors', 0);

require_once(ABSPATH . 'wp-content/plugins/carservice/class/AutoServiceAPI.php');
require_once(ABSPATH . 'wp-content/plugins/carservice/class/CustomWidgetSearchService.php');

function register_taxonomy_widget() {
    register_widget( 'CustomWidgetSearchService' );
}
add_action( 'widgets_init', 'register_taxonomy_widget' );
wp_enqueue_script( 'themename', plugins_url( '/assets/js/FranchiseSearch.js', __FILE__ ), array('jquery'), null, true );
wp_register_style( 'custom-style-franchise-search', plugins_url( '/assets/css/FranchiseSearch.css', __FILE__ ), array(), '281202020', 'all' );
wp_enqueue_style( 'custom-style-franchise-search' );
