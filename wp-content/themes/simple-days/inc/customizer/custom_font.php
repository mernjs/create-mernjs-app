<?php
defined( 'ABSPATH' ) || exit;
/**
 * Custom Font
 *
 * @package Simple Days
 */

function Simple_Days_custom_text_size($wp_customize,$name,$section,$default){
  $wp_customize->add_setting( $name.'text_size', array(
    'default' => $default,
    'sanitize_callback' => 'absint',
    'transport' => 'postMessage',
  ));
  $wp_customize->add_control( $name.'text_size', array(
    'label' => esc_html_x('font size', 'post_heading' ,'simple-days'),
    'section' => $section,
    'type' => 'number',
    'input_attrs' => array(
      'min' => 1, 'step' => 1, 'max' => 64,),
  ));
}

function Simple_Days_custom_font_weight($wp_customize,$name,$section,$default){
  $wp_customize->add_setting( $name.'font_weight', array(
    'default' => $default,
    'sanitize_callback' => 'absint',
    'transport' => 'postMessage',
  ));
  $wp_customize->add_control( $name.'font_weight', array(
    'label' => esc_html_x('font weight', 'post_heading' ,'simple-days'),
    //'description' => esc_html__('default&#58;', 'simple-days').esc_html('1'),
    'section' => $section,
    'type' => 'number',
    'input_attrs' => array(
      'min' => 100, 'step' => 100, 'max' => 900,),
  ));
}

function Simple_Days_custom_text_color($wp_customize,$name,$section,$default){
  $wp_customize->add_setting( $name.'text_color',array(
    'default'    => $default,
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $name.'text_color', array(
    'label' => esc_html_x('title color', 'post_heading' ,'simple-days'),
    'section'    => $section,
  )));
}

function Simple_Days_custom_text_hover_color($wp_customize,$name,$section,$default){
  $wp_customize->add_setting( $name.'text_hover_color',array(
    'default'    => $default,
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $name.'text_hover_color', array(
    'label' => esc_html_x('title hover color', 'post_heading' ,'simple-days'),
    'section'    => $section,
  )));
}

function Simple_Days_custom_text_position($wp_customize,$name,$section,$default){
  $wp_customize->add_setting( $name.'text_position', array(
    'default'           => $default,
    'sanitize_callback' => 'simple_days_sanitize_radio',
    'transport' => 'postMessage',
  ));
  $wp_customize->add_control( $name.'text_position', array(
    'label'    => esc_html__( 'title position', 'simple-days' ),
    'section'  => $section,
    'type'     => 'radio',
    'choices'  => array(
      'left' => esc_html__( 'Left', 'simple-days' ),
      'center' => esc_html__( 'Center', 'simple-days' ),
      'right' => esc_html__( 'Right', 'simple-days' ),
    ),
  ));
}

function Simple_Days_custom_padding_margin($wp_customize,$name,$section,$default,$border_angle){

  $padding_margin = array('padding' => esc_html_x( 'padding', 'post_heading' , 'simple-days'),'margin' => esc_html_x( 'margin', 'post_heading' , 'simple-days'));
  $default['padding_min'] = 0;

  foreach ($padding_margin as $pm_key => $pm_val) {

    $wp_customize->add_setting( $name.$pm_key.'_info', array(
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, $name.$pm_key.'_info', array(
      'section' => $section,
      'label' => $pm_val.esc_html_x( '(top,right,bottom,left)', 'post_heading' , 'simple-days'),
    )));

    foreach ($border_angle as $ba_key => $value) {
      $wp_customize->add_setting( $name.$pm_key.'_'.$ba_key, array(
        'default' => 0,
        'sanitize_callback' => 'simple_days_num_minus',
        'transport' => 'postMessage',
      ));
      $wp_customize->add_control( $name.$pm_key.'_'.$ba_key, array(
      //'label' => esc_html_x('font size', 'post_heading' ,'simple-days'),
        'section' => $section,
        'type' => 'number',
        'input_attrs' => array(
          'min' => $default[$pm_key.'_min'], 'step' => 1, 'max' => 100,),
      ));

    }

  }

}


function Simple_Days_custom_border($wp_customize,$name,$section,$default,$border_angle,$heading_border_style){

  foreach ($border_angle as $key => $value) {

    $wp_customize->add_setting( $name.'border_'.$key.'_info', array(
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, $name.'border_'.$key.'_info', array(
      'section' => $section,
      
      'label' => sprintf(esc_html_x( 'border %s', 'post_heading' , 'simple-days'),$value),
    )));
    $wp_customize->add_setting( $name.'border_'.$key.'_style', array(
      'default'           => 'none',
      'sanitize_callback' => 'simple_days_sanitize_radio',
      'transport' => 'postMessage',
    ));
    $wp_customize->add_control( $name.'border_'.$key.'_style', array(
      'section'  => $section,
      'type'     => 'select',
      'choices'  => $heading_border_style,
    ));
    $wp_customize->add_setting( $name.'border_'.$key.'_width', array(
      'default' => 1,
      'sanitize_callback' => 'absint',
      'transport' => 'postMessage',
    ));
    $wp_customize->add_control( $name.'border_'.$key.'_width', array(
      'section' => $section,
      'type' => 'number',
      'input_attrs' => array(
        'min' => 1, 'step' => 1, 'max' => 64,),
    ));
    $wp_customize->add_setting( $name.'border_'.$key.'_color',array(
      'default'    => '',
      'sanitize_callback' => 'sanitize_text_field',
      'transport' => 'postMessage',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $name.'border_'.$key.'_color', array(
      'section'    => $section,
    )));
  }
}


function Simple_Days_custom_background_image($wp_customize,$name,$section,$default){
  $wp_customize->add_setting( $name.'background_image',array(
    'default'    => '',
    'sanitize_callback' => 'simple_days_sanitize_image_file',
    'transport' => 'postMessage',
  ));
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $name.'background_image', array(
    'label' => esc_html_x('background image', 'post_heading' ,'simple-days'),
    'section'    => $section,
  )));
}

function Simple_Days_custom_background_color($wp_customize,$name,$section,$default){
  $wp_customize->add_setting( $name.'background_color',array(
    'default'    => $default,
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $name.'background_color', array(
    'label' => esc_html_x('background color', 'post_heading' ,'simple-days'),
    'section'    => $section,
  )));
}

function Simple_Days_custom_border_radius($wp_customize,$name,$section,$default){
  $wp_customize->add_setting( $name.'border_radius_info', array(
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, $name.'border_radius_info', array(
    'section' => $section,
    'label' => esc_html_x( 'border radius', 'post_heading' , 'simple-days').esc_html_x( '(top-left,top-right,bottom-right,bottom-left)', 'post_heading' , 'simple-days'),
  )));

  $border_radius_angle = array('top_left' , 'top_right' ,'bottom_right','bottom_left');

  foreach ($border_radius_angle as $value) {
    $wp_customize->add_setting( $name.'border_radius_'.$value, array(
      'default' => 0,
      'sanitize_callback' => 'absint',
      'transport' => 'postMessage',
    ));
    $wp_customize->add_control( $name.'border_radius_'.$value, array(
      'section' => $section,
      'type' => 'number',
      'input_attrs' => array(
        'min' => 0, 'step' => 1, 'max' => 100,),
    ));
  }
}

function Simple_Days_custom_balloon($wp_customize,$name,$section,$default){

  $wp_customize->add_setting( $name.'balloon',array(
    'default'    => false,
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
  ));
  $wp_customize->add_control( $name.'balloon',array(
    'label'   => esc_html_x( 'balloon', 'post_heading' , 'simple-days'),
    'section' => $section,
    'type' => 'checkbox',
  ));
  $wp_customize->add_setting( $name.'balloon_info', array(
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, $name.'balloon_info', array(
    'section' => $section,
    'label' => esc_html_x( 'balloon', 'post_heading' , 'simple-days').esc_html_x( '(position,width,height)', 'post_heading' , 'simple-days'),
  )));
  $wp_customize->add_setting( $name.'balloon_position', array(
    'default' => 30,
    'sanitize_callback' => 'absint',
    'transport' => 'postMessage',
  ));
  $wp_customize->add_control( $name.'balloon_position', array(
    'section' => $section,
    'type' => 'number',
    'input_attrs' => array(
      'min' => -14, 'step' => 1, 'max' => 857,),
  ));
  $wp_customize->add_setting( $name.'balloon_width', array(
    'default' => 15,
    'sanitize_callback' => 'absint',
    'transport' => 'postMessage',
  ));
  $wp_customize->add_control( $name.'balloon_width', array(
    'section' => $section,
    'type' => 'number',
    'input_attrs' => array(
      'min' => 1, 'step' => 1, 'max' => 100,),
  ));
  $wp_customize->add_setting( $name.'balloon_height', array(
    'default' => 15,
    'sanitize_callback' => 'absint',
    'transport' => 'postMessage',
  ));
  $wp_customize->add_control( $name.'balloon_height', array(
    'section' => $section,
    'type' => 'number',
    'input_attrs' => array(
      'min' => 1, 'step' => 1, 'max' => 100,),
  ));
  $wp_customize->add_setting( $name.'balloon_color',array(
    'default'    => '',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $name.'balloon_color', array(
    'label' => esc_html_x('balloon color', 'post_heading' ,'simple-days'),
    'section'    => $section,
  )));
}