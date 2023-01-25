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
    wp_enqueue_style( 'collapsible-element-lists-style', plugin_dir_url( __FILE__ ) . 'css/collapsible-element-lists.css', array(), '1.0.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'collapsible_element_lists_add_styles' );

// Aggiungi il file js
function enqueue_collapsible_element_lists_scripts() {
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'collapsible-element-lists', plugin_dir_url( __FILE__ ) . 'js/collapsible-element-lists.js', array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_collapsible_element_lists_scripts' );




 
 // Crea un shortcode per il plugin
 function collapsible_element_lists_shortcode( $atts ) {
     // Recupera le opzioni di personalizzazione
     $options = get_option( 'collapsible-element-lists-options' );
     $number_of_parents = get_option('collapsible-element-lists-number-of-parents', '1');
     $number_of_children = get_option('collapsible-element-lists-number-of-children', '2');
     $parent_name = get_option('collapsible-element-lists-parent-name', 'Genitore');
     $child_name = get_option('collapsible-element-lists-child-name', 'Sottoelemento');
     $content_type = get_option('collapsible-element-lists-content-type', 'text');
     $content = get_option('collapsible-element-lists-content', 'Contenuto Sottoelemento');
     $html = '<h2>Lista di elementi a scomparsa</h2>';
     for ($i = 1; $i <= $number_of_parents; $i++) {
         $html .= '<div class="my-content">
                       <button class="my-collapsible my-collapsible-parent">' . $parent_name . ' ' . $i . '</button>
                       <div class="my-content closed">';
         for ($j = 1; $j <= $number_of_children; $j++) {
             $html .= '<button class="my-collapsible">' . $child_name . ' ' . $j . '</button>
                       <div class="my-content closed">';
             if ($content_type == 'text') {
                 $html .= '<p>' . $content . ' ' . $j . '</p>';
             } else if ($content_type == 'template') {
                 $html .= Elementor::instance()->frontend->get_builder_content_for_display( $content );
             }
             $html .= '</div>';
         }
         $html .= '</div>
                 </div>';
     }
     $html .= '<script>
                 $(document).ready(function(){
                   $(".my-collapsible").click(function() {
                     $(this).closest(".my-content").siblings(".my-content").find(".my-content.closed").slideUp();
                     $(this).siblings(".my-content.closed").slideUp();
                     $(this).next(".my-content.closed").slideToggle();
                   });
                   $(".closed").hide();
                 });
               </script>';
     return $html;
 }
 add_shortcode( 'collapsible_element_lists', 'collapsible_element_lists_shortcode' );
 
 // Crea una sezione di opzioni per il plugin
 function collapsible_element_lists_settings_init() {
     register_setting( 'collapsible-element-lists-options', 'collapsible-element-lists-number-of-parents' );
     register_setting( 'collapsible-element-lists-options', 'collapsible-element-lists-number-of-children' );
     register_setting( 'collapsible-element-lists-options', 'collapsible-element-lists-parent-name' );
     register_setting( 'collapsible-element-lists-options', 'collapsible-element-lists-child-name' );
     register_setting( 'collapsible-element-lists-options', 'collapsible-element-lists-content-type' );
     register_setting( 'collapsible-element-lists-options', 'collapsible-element-lists-content' );
     add_settings_section(
         'collapsible-element-lists-section',
         __( 'Impostazioni Collapsible Element Lists', 'collapsible-element-lists' ),
         'collapsible_element_lists_settings_section_callback',
         'collapsible-element-lists-options'
     );
     add_settings_field(
         'collapsible-element-lists-number-of-parents',
         __( 'Numero di Genitori', 'collapsible-element-lists' ),
         'collapsible_element_lists_number_of_parents_render',
         'collapsible-element-lists-options',
         'collapsible-element-lists-section'
     );
     add_settings_field(
         'collapsible-element-lists-number-of-children',
         __( 'Numero di Sottoelementi', 'collapsible-element-lists' ),
         'collapsible_element_lists_number_of_children_render',
         'collapsible-element-lists-options',
         'collapsible-element-lists-section'
     );
     add_settings_field(
         'collapsible-element-lists-parent-name',
         __( 'Nome Genitore', 'collapsible-element-lists' ),
         'collapsible_element_lists_parent_name_render',
         'collapsible-element-lists-options',
         'collapsible-element-lists-section'
     );
     add_settings_field(
         'collapsible-element-lists-child-name',
         __( 'Nome Sottoelementi', 'collapsible-element-lists' ),
         'collapsible_element_lists_child_name_render',
         'collapsible-element-lists-options',
         'collapsible-element-lists-section'
     );
     add_settings_field(
         'collapsible-element-lists-content-type',
         __( 'Tipo di Contenuto', 'collapsible-element-lists' ),
         'collapsible_element_lists_content_type_render',
         'collapsible-element-lists-options',
         'collapsible-element-lists-section'
     );
     add_settings_field(
         'collapsible-element-lists-content',
         __( 'Contenuto Sottoelementi', 'collapsible-element-lists' ),
         'collapsible_element_lists_content_render',
         'collapsible-element-lists-options',
         'collapsible-element-lists-section'
     );
     add_settings_field(
     'collapsible-element-lists-content-template',
     __( 'Modello per il contenuto dei sottoelementi', 'collapsible-element-lists' ),
     'collapsible_element_lists_content_template_render',
     'collapsible-element-lists-options',
     'collapsible-element-lists-section'
     );
 
 }
 add_action( 'admin_init', 'collapsible_element_lists_settings_init' );
 
 // Renderizzazione delle opzioni del plugin
 function collapsible_element_lists_number_of_parents_render() {
     $number_of_parents = get_option( 'collapsible-element-lists-number-of-parents', '1' );
     echo '<input type="number" name="collapsible-element-lists-number-of-parents" value="' . $number_of_parents . '" min="1">';
 }
 function collapsible_element_lists_number_of_children_render() { 
     $options = get_option( 'collapsible-element-lists-options' );
     ?>
     <input type='number' min="1" name='collapsible-element-lists-options[number_of_children]' value='<?php echo $options['number_of_children']; ?>'>
     <?php

 }
 function collapsible_element_lists_parent_name_render() {
     $parent_name = get_option( 'collapsible-element-lists-parent-name', 'Genitore' );
     echo '<input type="text" name="collapsible-element-lists-parent-name" value="' . $parent_name . '">';
 }
 function collapsible_element_lists_child_name_render() {
     $child_name = get_option( 'collapsible-element-lists-child-name', 'Sottoelemento' );
     echo '<input type="text" name="collapsible-element-lists-child-name" value="' . $child_name . '">';
 }
 function collapsible_element_lists_content_type_render() {
     $content_type = get_option( 'collapsible-element-lists-content-type', 'text' );
     echo '<select name="collapsible-element-lists-content-type">
             <option value="text"' . selected( $content_type, 'text', false) . '>Testo</option>
             <option value="template"' . selected( $content_type, 'template', false) . '>Template</option>
           </select>';
 }
 function collapsible_element_lists_content_render() {
     $content = get_option( 'collapsible-element-lists-content', 'Contenuto Sottoelemento' );
     echo '<textarea name="collapsible-element-lists-content" rows="4" cols="50">' . $content . '</textarea>';
 }
 
 // Renderizzazione del front-end del plugin
 function collapsible_element_lists_shortcode_callback( $atts ) {
     $options = get_option( 'collapsible-element-lists-options' );
     $template_id = $options['collapsible-element-lists-content-template'];
     $html = '<div class="my-content">
         <button class="my-collapsible my-collapsible-parent">' . $options['collapsible-element-lists-parent-name'] . '</button>
         <div class="my-content closed">';
     for ( $i = 0; $i < $options['collapsible-element-lists-number-of-children']; $i++ ) {
         $html .= '<button class="my-collapsible">' . $options['collapsible-element-lists-child-name'] . ' ' . ( $i + 1 ) . '</button>
         <div class="my-content closed">';
         
         //Inizio del codice per il contenuto del modello
         $template_content = \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $template_id );
         $html .= $template_content;
         //Fine del codice per il contenuto del modello
         
         $html .= '</div>';
     }
     $html .= '</div>
     </div>';
     return $html;
 }
 add_shortcode( 'collapsible_element_lists', 'collapsible_element_lists_shortcode_callback' );
 
