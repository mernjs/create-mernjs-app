<?php
defined( 'ABSPATH' ) || exit;
/**
 * TOC Settings
 *
 * @package Simple Days
 */


$wp_customize->add_section('simple_days_yahman_add_ons_toc',array(
  'title' => esc_html__('TOC', 'simple-days'),
  'panel' => 'simple_days_yahman_add_ons_setting',
));
$wp_customize->add_setting('simple_days_yahman_add_ons_toc_partial',array('sanitize_callback' => 'absint',));
$wp_customize->add_control('simple_days_yahman_add_ons_toc_partial',array('type' => 'hidden',
  'section' => 'simple_days_yahman_add_ons_toc',
));
$wp_customize->selective_refresh->add_partial( 'simple_days_yahman_add_ons_toc_partial', array(
  'selector' => '#toc.toc',
));


$wp_customize->add_setting( 'yahman_add_ons_toc_font_color',array(
  'default'           => '',
  'sanitize_callback' => 'simple_days_sanitize_rgba_color',
  'transport' => 'postMessage',
));

$wp_customize->add_control( new Simple_Days_Color_Alpha_Custom_Control($wp_customize,
  'yahman_add_ons_toc_font_color',array(
    'label' => esc_html__( 'Font color', 'simple-days' ),
    'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;000'),
    'section'    => 'simple_days_yahman_add_ons_toc',
  )));
$wp_customize->add_setting( 'yahman_add_ons_toc_link_color',array(
  'default'           => '',
  'sanitize_callback' => 'simple_days_sanitize_rgba_color',
  'transport' => 'postMessage',
));

$wp_customize->add_control( new Simple_Days_Color_Alpha_Custom_Control($wp_customize,
  'yahman_add_ons_toc_link_color',array(
    'label' => esc_html__( 'Link color', 'simple-days' ),
    'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;000'),
    'section'    => 'simple_days_yahman_add_ons_toc',
  )));

$wp_customize->add_setting( 'yahman_add_ons_toc_link_hover_color',array(
  'default'           => '',
  'sanitize_callback' => 'simple_days_sanitize_rgba_color',
  'transport' => 'postMessage',
));

$wp_customize->add_control( new Simple_Days_Color_Alpha_Custom_Control($wp_customize,
  'yahman_add_ons_toc_link_hover_color',array(
    'label' => esc_html__( 'Link hover color', 'simple-days' ),
    'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;07a'),
    'section'    => 'simple_days_yahman_add_ons_toc',
  )));

$custom_section = 'simple_days_yahman_add_ons_toc';
$custom_name = 'yahman_add_ons_toc_';

$custom_default['margin_min'] = 0;
Simple_Days_custom_padding_margin($wp_customize,$custom_name,$custom_section,$custom_default,$border_angle);

$custom_default = array();
Simple_Days_custom_border($wp_customize,$custom_name,$custom_section,$custom_default,$border_angle,$heading_border_style);

Simple_Days_custom_background_image($wp_customize,$custom_name,$custom_section,'');

Simple_Days_custom_background_color($wp_customize,$custom_name,$custom_section,'');

Simple_Days_custom_border_radius($wp_customize,$custom_name,$custom_section,'');





    
    $wp_customize->add_section('simple_days_pageview_setting',array(
      'title' => esc_html__('Pageview', 'simple-days'),
      'panel' => 'simple_days_yahman_add_ons_setting',
    ));


    $wp_customize->add_setting('pageview',array('sanitize_callback' => 'absint',));
    $wp_customize->add_control('pageview',array(
      'section' => 'simple_days_pageview_setting',
      'type' => 'hidden'
    ));
    $wp_customize->selective_refresh->add_partial( 'pageview', array(
      'selector' => '.page_view',
    ));


    $wp_customize->add_setting( 'simple_days_pageview',array(
      'default'    => 'all',
      'sanitize_callback' => 'simple_days_sanitize_select',
    ));
    $wp_customize->add_control( 'simple_days_pageview',array(
      'label'   => esc_html__( 'Display page view at the each post.', 'simple-days'),
      'section' => 'simple_days_pageview_setting',
      'type' => 'select',
      'choices' => array(
        //'none' =>  esc_html__( 'Hide', 'simple-days' ),
        'all' => esc_html__('Page View', 'simple-days'),
        'yearly' => esc_html__('Yearly Page View', 'simple-days'),
        'monthly' => esc_html__('Monthly Page View', 'simple-days'),
        'weekly' => esc_html__('Weekly Page View', 'simple-days'),
        'daily' => esc_html__('Daily Page View', 'simple-days'),
      ),
    ));

    $wp_customize->add_setting( 'simple_days_pageview_icon',array(
      'default'    => 'fa-signal',
      'sanitize_callback' => 'wp_strip_all_tags',
    ));
    $wp_customize->add_control( 'simple_days_pageview_icon',array(
      'label'   => esc_html__( 'Page view icon', 'simple-days'),
      'section' => 'simple_days_pageview_setting',
      'type' => 'select',
      'choices' => array(
        '&nbsp;' => esc_html('&nbsp;'),
        'fa-signal' => '&#xf012; fa-signal',
        'fa-area-chart' => '&#xf1fe; fa-area-chart',
        'fa-line-chart' => '&#xf201; fa-line-chart',
        'fa-heart-o' => '&#xf08a; fa-heart-o',
        'fa-heart' => '&#xf004; fa-heart',
        'fa-star-o' => '&#xf006; fa-star-o',
        'fa-star' => '&#xf005; fa-star',
        'fa-history' => '&#xf1da; fa-history',
        'fa-history' => '&#xf1da; fa-history',
        'fa-home' => '&#xf015; fa-home',
        'fa-bolt' => '&#xf0e7; fa-bolt',
        'fa-lightbulb-o' => '&#xf0eb; fa-lightbulb-o',
        'fa-smile-o' => '&#xf118; fa-smile-o',
        'fa-rocket' => '&#xf135; fa-rocket',
        'fa-location-arrow' => '&#xf124; fa-location-arrow',
        'fa-info-circle' => '&#xf05a; fa-info-circle',
        'fa-info' => '&#xf129; fa-info',
        'fa-paw' => '&#xf1b0; fa-paw',
        'fa-bomb' => '&#xf1e2; fa-bomb',
        'fa-birthday-cake' => '&#xf1fd; fa-birthday-cake',
        'fa-fort-awesome' => '&#xf286; fa-fort-awesome',
        'fa-gamepad' => '&#xf11b; fa-gamepad',
      ),
    ));

    $wp_customize->add_setting( 'simple_days_pageview_position', array(
      'default'           => 'right',
      'sanitize_callback' => 'simple_days_sanitize_radio',
      //'transport'=>'postMessage',
    ));
    $wp_customize->add_control( 'simple_days_pageview_position', array(
      'label'    => esc_html__( 'Post view display position', 'simple-days' ),
      'section'  => 'simple_days_pageview_setting',
      'type'     => 'radio',
      'choices'  => array(
        'left' => esc_html__( 'Left', 'simple-days' ),
        'center' => esc_html__( 'Center', 'simple-days' ),
        'right' => esc_html__( 'Right', 'simple-days' ),
      ),
    ));


    $wp_customize->add_setting( 'simple_days_pageview_logout',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_pageview_logout',array(
      'label'   => esc_html__('Display page view to logout user.', 'simple-days'),
      'section' => 'simple_days_pageview_setting',
      'type' => 'checkbox',
    ));




