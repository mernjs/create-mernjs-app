<?php
defined( 'ABSPATH' ) || exit;
/**
 * Menu Icon Settings
 *
 * @package Simple Days
 */



$wp_customize->add_section('simple_days_header_menu_icon',array(
  'title' => esc_html__('Menu Icon','simple-days'),
  'panel' => 'simple_days_header_setting',
));




$wp_customize->add_setting( 'simple_days_menu_bar_h_icon_info', array(
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'simple_days_menu_bar_h_icon_info', array(
  'section' => 'simple_days_header_menu_icon',
  'label' => esc_html__( 'Header Menu Icon', 'simple-days' ),
  
    //'content' => '<a href="'.esc_url('https://fontawesome.com/v4.7.0/icons/').'" target="_blank">'.__( 'Icon List' , 'simple-days').'</a>',
    //'description' => esc_html__( 'Optional: Example Description.', 'simple-days' ),
)));




$i = 1;
while($i <= 10){

  $wp_customize->add_setting( 'simple_days_menu_bar_h_icon_'.$i.'_info', array(
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'simple_days_menu_bar_h_icon_'.$i.'_info', array(
    'section' => 'simple_days_header_menu_icon',
    
    'label'   => sprintf(esc_html__( 'Icon #%s', 'simple-days'),$i),
  )));

  $wp_customize->add_setting( 'simple_days_menu_bar_h_icon_'.$i,array(
    'default'       => '',
    'sanitize_callback' => 'wp_strip_all_tags',
    'transport' => 'postMessage',
  ));
  $wp_customize->add_control('simple_days_menu_bar_h_icon_'.$i,array(
    
    'label'   => esc_html__( 'Select', 'simple-days'),
    'section' => 'simple_days_header_menu_icon',
    'type'    => 'text',
  ));

  $wp_customize->add_setting( 'simple_days_menu_bar_h_icon_after_'.$i,array(
    'default'    => false,
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
  ));
  $wp_customize->add_control( 'simple_days_menu_bar_h_icon_after_'.$i,array(
    'label'   => esc_html__( 'after icon', 'simple-days'),
        //'description' => esc_html__('Current name', 'simple-days'),
    'section' => 'simple_days_header_menu_icon',
    'type' => 'checkbox',
  ));

  $wp_customize->add_setting( 'simple_days_menu_bar_h_icon_color_'.$i,array(
    'default'    => '',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'simple_days_menu_bar_h_icon_color_'.$i, array(
    
        //'label'      => sprintf(esc_html__( 'Icon color #%s', 'simple-days'),$i),
    'section'    => 'simple_days_header_menu_icon',
  )));



  $i++;
}






$wp_customize->add_section('simple_days_footer_menu_icon',array(
  'title' => esc_html__('Menu Icon','simple-days'),
  'panel' => 'simple_days_footer_setting',
));


$wp_customize->add_setting( 'simple_days_menu_bar_fontawsome_icon_info', array(
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'simple_days_menu_bar_fontawsome_icon_info', array(
  'section' => 'simple_days_footer_menu_icon',
    //'label' => esc_html__( 'Footer Menu Icon', 'simple-days' ),
  
  'content' => '<a href="'.esc_url('https://fontawesome.com/v4.7.0/icons/').'" target="_blank">'.__( 'FontAwesome 4 Icon List' , 'simple-days').'</a><br /><br />'.'<a href="'.esc_js('javascript:wp.customize.section(\"simple_days_option\").focus();' ).'">'.esc_html__( 'You need full icons?', 'simple-days' ).'</a>',
    //'description' => esc_html__( 'Optional: Example Description.', 'simple-days' ),
)));




$wp_customize->add_setting( 'simple_days_menu_bar_f_icon_info', array(
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'simple_days_menu_bar_f_icon_info', array(
  'section' => 'simple_days_footer_menu_icon',
  'label' => esc_html__( 'Footer Menu Icon', 'simple-days' ),
  
    //'content' => sprintf(esc_html__('This selection overrides %s.', 'simple-days'),esc_html__( 'Local Fonts Japanese', 'simple-days')),
    //'description' => esc_html__( 'Optional: Example Description.', 'simple-days' ),
)));

$i = 1;
while($i <= 10){
  $wp_customize->add_setting( 'simple_days_menu_bar_f_icon_'.$i.'_info', array(
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'simple_days_menu_bar_f_icon_'.$i.'_info', array(
    'section' => 'simple_days_footer_menu_icon',
    
    'label'   => sprintf(esc_html__( 'Icon #%s', 'simple-days'),$i),
  )));

  $wp_customize->add_setting( 'simple_days_menu_bar_f_icon_'.$i,array(
    'default'       => 'none',
    'sanitize_callback' => 'wp_strip_all_tags',
    'transport' => 'postMessage',
  ));
  $wp_customize->add_control('simple_days_menu_bar_f_icon_'.$i,array(
    
    'label'   => esc_html__( 'Select', 'simple-days'),
    'section' => 'simple_days_footer_menu_icon',
    'type'    => 'text',
  ));
  $wp_customize->add_setting( 'simple_days_menu_bar_f_icon_after_'.$i,array(
    'default'    => false,
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
  ));
  $wp_customize->add_control( 'simple_days_menu_bar_f_icon_after_'.$i,array(
    'label'   => esc_html__( 'after icon', 'simple-days'),
        //'description' => esc_html__('Current name', 'simple-days'),
    'section' => 'simple_days_footer_menu_icon',
    'type' => 'checkbox',
  ));
  $wp_customize->add_setting( 'simple_days_menu_bar_f_icon_color_'.$i,array(
    'default'    => '',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'simple_days_menu_bar_f_icon_color_'.$i, array(
    
        //'label'      => sprintf(esc_html__( 'Icon color #%s', 'simple-days'),$i),
    'section'    => 'simple_days_footer_menu_icon',
  )));



  $i++;
}