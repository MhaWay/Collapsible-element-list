<?php
/*
Plugin Name: CELs-Collapsible Element Lists
Description: A plugin to create pop-up lists with customization options.
Version: 0.01
Author: GG-Ally
Text Domain: https://ggally.net
*/ 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register oEmbed Widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
 
 function register_collapsible_element_lists_widget( $widgets_manager ) {

    require_once( __DIR__ . '/widgets/collapsible-element-lists-widget.php' );

    $widgets_manager->register_widget_type( new \Collapsible_Elements_Widget() );
}
add_action( 'elementor/widgets/widgets_registered', 'register_collapsible_element_lists_widget' );

// Aggiungi il file css
function collapsible_element_lists_add_styles() {
    wp_enqueue_style( 'collapsible-element-lists-styles', plugin_dir_url( __FILE__ ) . 'collapsible-element-lists.css' );
}
add_action( 'wp_enqueue_scripts', 'collapsible_element_lists_add_styles' );

// Aggiungi il file js
function collapsible_element_lists_add_scripts() {
    wp_enqueue_script( 'collapsible-element-lists-scripts', plugin_dir_url( __FILE__ ) . 'collapsible-element-lists.js', array( 'jquery' ), '', true );
}
add_action( 'wp_enqueue_scripts', 'collapsible_element_lists_add_scripts' );
