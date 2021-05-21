<?php
defined( 'ABSPATH' ) || exit;


wp_enqueue_style('font-awesome4', SIMPLE_DAYS_THEME_URI . 'assets/fonts/fontawesome/style.min.css', array(), null);


wp_enqueue_style( 'simple_days_customizer_css', SIMPLE_DAYS_THEME_URI . 'assets/css/customizer.min.css', array(), null );



wp_enqueue_script(
              'simple-fontawesome-iconpicker-js', // Give the script a unique ID
              SIMPLE_DAYS_THEME_URI . 'assets/js/customizer/simple-iconpicker.min.js', // Define the path to the JS file
              array( 'jquery', 'customize-preview' ), // Define dependencies
              null, // Define a version (optional)
              true // Specify whether to put in footer (leave this true)
            );



wp_register_script(
              'simple-fontawesome-iconpicker-simple_days', // Give the script a unique ID
              SIMPLE_DAYS_THEME_URI . 'assets/js/customizer/simple-iconpicker_simple_days.min.js', // Define the path to the JS file
              array( 'simple-fontawesome-iconpicker-js' ), // Define dependencies
              null, // Define a version (optional)
              true // Specify whether to put in footer (leave this true)
            );
$simple_days_localize = array(
  'localize_clear' => esc_html__('Clear', 'simple-days'),
);
wp_localize_script( 'simple-fontawesome-iconpicker-simple_days', 'simple_days_localize', $simple_days_localize );
wp_enqueue_script( 'simple-fontawesome-iconpicker-simple_days' );




wp_enqueue_style( 'simple-fontawesome-iconpicker-css', SIMPLE_DAYS_THEME_URI . 'assets/css/simple-iconpicker.min.css', array(), null );

wp_enqueue_style( 'simple_days_customizer_icon-css', SIMPLE_DAYS_THEME_URI . 'assets/fonts/customizer/style.min.css', array(), null );


add_action( 'enqueue_block_assets', 'simple_days_block_front_styles' );
