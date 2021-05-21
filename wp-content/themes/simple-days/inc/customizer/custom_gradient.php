<?php
defined( 'ABSPATH' ) || exit;
/**
 * Custom Gradient
 *
 * @package Simple Days
 */

function Simple_Days_custom_gradient_color($wp_customize,$name,$section){

  $wp_customize->add_setting( 'gradient_'.$name.'_style', array(
    'default'           => 'linear',
    'sanitize_callback' => 'simple_days_sanitize_radio',
    'transport' => 'postMessage',
  ));
  $wp_customize->add_control( 'gradient_'.$name.'_style', array(
    'label'    => esc_html__( 'Style', 'simple-days' ),
    'section'  => $section,
    'type'     => 'select',
    'choices'  => array(
      'linear' => esc_html__( 'linear', 'simple-days' ),
      'radial' => esc_html__( 'radial', 'simple-days' ),
      'repeating-linear' => esc_html__( 'repeating linear', 'simple-days' ),
      'repeating-radial' => esc_html__( 'repeating radial', 'simple-days' ),
    ),
  ));

  $wp_customize->add_setting( 'gradient_'.$name.'_degree', array(
    'default' => 0,
    'sanitize_callback' => 'absint',
    'transport' => 'postMessage',
  ));
  $wp_customize->add_control( 'gradient_'.$name.'_degree', array(
    'label' => esc_html_x('Degree', 'gradient_color' ,'simple-days'),
    //'description' => esc_html__('default&#58;', 'simple-days').esc_html('1'),
    'section' => $section,
    'type' => 'number',
    'input_attrs' => array(
      'min' => 0, 'step' => 1, 'max' => 360),
  ));


  $i=1;
  while($i < 6){

  $wp_customize->add_setting( 'gradient_'.$name.'_info_'.$i, array(
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'gradient_'.$name.'_info_'.$i, array(
    'section' => $section,
    
    'label' => esc_html_x('Color', 'gradient_color' ,'simple-days').' #'.$i,

  )));


    $wp_customize->add_setting( 'gradient_'.$name.'_color_'.$i,array(
      'default'           => '',
      'sanitize_callback' => 'simple_days_sanitize_rgba_color',
      'transport' => 'postMessage',
    ));

    $wp_customize->add_control( new Simple_Days_Color_Alpha_Custom_Control($wp_customize,
      'gradient_'.$name.'_color_'.$i,array(
        //'label'      => esc_html_x('Color', 'gradient_color' ,'simple-days').' #'.$i,
        'section'    => $section,
      )));

    $wp_customize->add_setting( 'gradient_'.$name.'_position_'.$i, array(
      'default' => 0,
      'sanitize_callback' => 'absint',
      'transport' => 'postMessage',
    ));
    $wp_customize->add_control( 'gradient_'.$name.'_position_'.$i, array(
    //'label' => esc_html_x('font weight', 'post_heading' ,'simple-days'),
    //'description' => esc_html__('default&#58;', 'simple-days').esc_html('1'),
      'section' => $section,
      'type' => 'number',
      'input_attrs' => array(
        'min' => 0, 'step' => 1, 'max' => 99,),
    ));

    ++$i;
  }

}