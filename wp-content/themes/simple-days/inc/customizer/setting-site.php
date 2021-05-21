<?php
defined( 'ABSPATH' ) || exit;
/**
 * Site Settings
 *
 * @package Simple Days
 */

$delimiter = '&#124;';
$wp_customize->add_setting( 'simple_days_title_separator',array(
  'default'    => $delimiter,
  'sanitize_callback' => 'wp_strip_all_tags',
));
$wp_customize->add_control( 'simple_days_title_separator',array(
  'label'   => esc_html__( 'the separator for the document title.', 'simple-days'),
  'section' => 'title_tagline',
  'type' => 'select',
  'choices' => array(
   '&nbsp;' => esc_html('&nbsp;'),
   '&#124;' => esc_html('&#124;'),
   '&mdash;' => esc_html('&mdash;'),
   '&minus;' => esc_html('&minus;'),
   '&amp;' => esc_html('&amp;'),
   '&middot;' => esc_html('&middot;'),
   '&bull;' => esc_html('&bull;'),
   '&#58;' => esc_html('&#58;'),
   '&#166;' => esc_html('&#166;'),
   '&#43;' => esc_html('&#43;'),
   '&#47;' => esc_html('&#47;'),
   '&spades;' => esc_html('&spades;'),
   '&hearts;' => esc_html('&hearts;'),
   '&diams;' => esc_html('&diams;'),
   '&clubs;' => esc_html('&clubs;'),
   '&loz;' => esc_html('&loz;'),
   '&#8984;' => esc_html('&#8984;'),
   '&raquo;' => esc_html('&raquo;'),
   '&gt;' => esc_html('&gt;'),
   '&rarr;' => esc_html('&rarr;'),
   '&rArr;' => esc_html('&rArr;'),
   '&sim;' => esc_html('&sim;'),
   '&hellip;' => esc_html('&hellip;'),
 ),
));



$wp_customize->add_section('simple_days_box_size_setting',array(
  'title' => esc_html__('Box Size', 'simple-days'),
  'panel' => 'simple_days_site_setting',
));
$wp_customize->add_setting( 'simple_days_wrap_flame_maxwidth', array(
  'default' => 1296,
  'sanitize_callback' => 'absint',
  'transport'=>'postMessage',
));
$wp_customize->add_control( 'simple_days_wrap_flame_maxwidth', array(
  'label' => esc_html__( 'Flame max width(px)', 'simple-days' ),
  'description' => esc_html__('Recommend', 'simple-days').'<br>'.esc_html__('Two columns', 'simple-days').esc_html(' : 1296px').'<br>'.esc_html__('Three columns', 'simple-days').esc_html(' : 1580px'),
  'section' => 'simple_days_box_size_setting',
  'type' => 'number',
  'input_attrs' => array(
    'min' => 1, 'step' => 1, 'max' => 4800,),
));

$wp_customize->add_setting( 'simple_days_main_content_maxwidth', array(
  'default' => 856,
  'sanitize_callback' => 'absint',
  'transport'=>'postMessage',
));
$wp_customize->add_control( 'simple_days_main_content_maxwidth', array(
  'label' => esc_html__( 'Content max width(px)', 'simple-days' ),
  'description' => esc_html__('Recommend', 'simple-days').esc_html(' : 856px'),
  'section' => 'simple_days_box_size_setting',
  'type' => 'number',
  'input_attrs' => array(
    'min' => 1, 'step' => 1, 'max' => 4800,),
));

$wp_customize->add_setting( 'simple_days_sidebar_maxwidth', array(
  'default' => 358,
  'sanitize_callback' => 'absint',
  'transport'=>'postMessage',
));
$wp_customize->add_control( 'simple_days_sidebar_maxwidth', array(
  'label' => esc_html__( 'Sidebar max width(px)', 'simple-days' ),
  'description' => esc_html__('Recommend', 'simple-days').esc_html(' : 358px'),
  'section' => 'simple_days_box_size_setting',
  'type' => 'number',
  'input_attrs' => array(
    'min' => 1, 'step' => 1, 'max' => 4800,),
));

$wp_customize->add_setting( 'simple_days_sidebar_minwidth', array(
  'default' => 320,
  'sanitize_callback' => 'absint',
  'transport'=>'postMessage',
));
$wp_customize->add_control( 'simple_days_sidebar_minwidth', array(
  'label' => esc_html__( 'Sidebar min width(px)', 'simple-days' ),
  'description' => esc_html__('Recommend', 'simple-days').esc_html(' : 320px'),
  'section' => 'simple_days_box_size_setting',
  'type' => 'number',
  'input_attrs' => array(
    'min' => 1, 'step' => 1, 'max' => 4800,),
));



$wp_customize->add_section('simple_days_box_style_setting',array(
  'title' => esc_html__('Box Style', 'simple-days'),
  'panel' => 'simple_days_site_setting',
));
  // Add Settings and Controls for Box Style.
$wp_customize->add_setting( 'simple_days_box_style', array(
  'default'           => 'flat',
  'sanitize_callback' => 'simple_days_sanitize_radio',
  'transport'=>'postMessage',
));
$wp_customize->add_control( 'simple_days_box_style', array(
  'label'    => esc_html__( 'Box Style', 'simple-days' ),
  'section'  => 'simple_days_box_style_setting',
  'type'     => 'radio',
  'choices'  => array(
    'flat' => esc_html__( 'Flat', 'simple-days' ),
    'shadow' => esc_html__( 'Shadow', 'simple-days' ),
  ),
));




  // Add Settings and Controls for Option.
$wp_customize->add_section('simple_days_option',array(
  'title' => esc_html__('Option', 'simple-days'),
  'panel' => 'simple_days_site_setting',
  'priority'    => 1000000,
));


$wp_customize->add_setting( 'simple_days_no_img',array(
  'default'    => esc_url(SIMPLE_DAYS_THEME_URI .'assets/images/no_image.png'),
  'sanitize_callback' => 'simple_days_sanitize_image_file',
));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'simple_days_no_img', array(
  'label' => esc_html__( 'No Image', 'simple-days'),
  'description' => esc_html__( 'No thumbnail page use this image.', 'simple-days'),
  'section' => 'simple_days_option',
)));


$wp_customize->add_setting( 'simple_days_404_img',array(
  'default'    => esc_url(SIMPLE_DAYS_THEME_URI .'assets/images/404.jpg'),
  'sanitize_callback' => 'simple_days_sanitize_image_file',
));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'simple_days_404_img', array(
  'label' => esc_html__( '404 Image', 'simple-days'),
  'description' => esc_html__( '404 page use this image.', 'simple-days'),
  'section' => 'simple_days_option',
)));

$wp_customize->add_setting( 'simple_days_css_info', array(
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'simple_days_css_info', array(
  'section' => 'simple_days_option',
  'label' => esc_html__('CSS', 'simple-days'),
)));



$wp_customize->add_setting( 'simple_days_inline_style_css',array(
  'default'    => false,
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( 'simple_days_inline_style_css',array(
  'label'   => esc_html__( 'Style Css inline mode', 'simple-days'),
  'section' => 'simple_days_option',
  'type' => 'checkbox',
));

$wp_customize->add_setting( 'simple_days_plus_inline_style_css',array(
  'default'       => 'none',
  'sanitize_callback' => 'simple_days_sanitize_select',
));
$wp_customize->add_control('simple_days_plus_inline_style_css',array(
  'label'   => esc_html__( 'Style Css inline mode of Simple Days Plus', 'simple-days'),
  'section' => 'simple_days_option',
  'type'    => 'select',
  'choices'  => array(
    'none' => esc_html__( 'Disable', 'simple-days' ),
    'min' => esc_html( 'style.min.css', 'simple-days' ),
    'css' => esc_html( 'style.css', 'simple-days' ),
  ),
));