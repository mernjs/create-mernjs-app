<?php
defined( 'ABSPATH' ) || exit;
/**
 * Color Settings
 *
 * @package Simple Days
 */


$wp_customize->add_section('simple_days_custom_color_gradient_site', array(
  'title'    => esc_html__('Site', 'simple-days'),
  'panel'    => 'simple_days_custom_color_gradient',
));

$wp_customize->add_setting( 'gradient_title_site_background', array(
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'gradient_title_site_background', array(
  'section' => 'simple_days_custom_color_gradient_site',
  'label' => esc_html__( 'Background color', 'simple-days' ),
)));

Simple_Days_custom_gradient_color($wp_customize,'site_bg','simple_days_custom_color_gradient_site');



$wp_customize->add_section('simple_days_custom_color_gradient_header', array(
  'title'    => esc_html__('Header', 'simple-days'),
  'panel'    => 'simple_days_custom_color_gradient',
));

$wp_customize->add_setting( 'gradient_title_header_bg', array(
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'gradient_title_header_bg', array(
  'section' => 'simple_days_custom_color_gradient_header',
  'label' => esc_html__( 'Header background color', 'simple-days' ),
)));

Simple_Days_custom_gradient_color($wp_customize,'header_header','simple_days_custom_color_gradient_header');


$wp_customize->add_setting( 'gradient_title_header_over', array(
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'gradient_title_header_over', array(
  'section' => 'simple_days_custom_color_gradient_header',
  'label' => esc_html__( 'Over Header background color', 'simple-days' ),
)));

Simple_Days_custom_gradient_color($wp_customize,'header_over','simple_days_custom_color_gradient_header');



$wp_customize->add_section('simple_days_custom_color_gradient_footer', array(
  'title'    => esc_html__('Footer', 'simple-days'),
  'panel'    => 'simple_days_custom_color_gradient',
));

$wp_customize->add_setting( 'gradient_title_footer_credit', array(
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'gradient_title_footer_credit', array(
  'section' => 'simple_days_custom_color_gradient_footer',
  'label' => esc_html__( 'Credit background color', 'simple-days' ),
)));

Simple_Days_custom_gradient_color($wp_customize,'footer_credit','simple_days_custom_color_gradient_footer');

$wp_customize->add_setting( 'gradient_title_footer_widget_title', array(
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'gradient_title_footer_widget_title', array(
  'section' => 'simple_days_custom_color_gradient_footer',
  'label' => esc_html__( 'Widget Title', 'simple-days' ),
)));

Simple_Days_custom_gradient_color($wp_customize,'footer_widget_title','simple_days_custom_color_gradient_footer');


$wp_customize->add_section('simple_days_custom_color_gradient_sidebar', array(
  'title'    => esc_html__('Sidebar', 'simple-days'),
  'panel'    => 'simple_days_custom_color_gradient',
));

$wp_customize->add_setting( 'gradient_title_sidebar_widget_title', array(
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'gradient_title_sidebar_widget_title', array(
  'section' => 'simple_days_custom_color_gradient_sidebar',
  'label' => esc_html__( 'Widget Title', 'simple-days' ),
)));

Simple_Days_custom_gradient_color($wp_customize,'sidebar_widget_title','simple_days_custom_color_gradient_sidebar');

$wp_customize->add_section('simple_days_custom_color_gradient_index', array(
  'title'    => esc_html__('Index', 'simple-days'),
  'panel'    => 'simple_days_custom_color_gradient',
));

$wp_customize->add_setting( 'gradient_title_index_title', array(
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'gradient_title_index_title', array(
  'section' => 'simple_days_custom_color_gradient_index',
  'label' => esc_html__( 'Index title', 'simple-days' ),
)));
Simple_Days_custom_gradient_color($wp_customize,'index_title','simple_days_custom_color_gradient_index');

$wp_customize->add_section('simple_days_custom_color_gradient_post_heading', array(
  'title'    => esc_html__('Post Heading', 'simple-days'),
  'panel'    => 'simple_days_custom_color_gradient',
));

$i = 2;
while($i < 5){
  $wp_customize->add_setting( 'gradient_title_post_heading_h'.$i, array(
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'gradient_title_post_heading_h'.$i, array(
    'section' => 'simple_days_custom_color_gradient_post_heading',
    'label' => sprintf(esc_html_x( 'H%s', 'post_heading' , 'simple-days'),$i),
  )));
  Simple_Days_custom_gradient_color($wp_customize,'post_heading_h'.$i,'simple_days_custom_color_gradient_post_heading');
  ++$i;
}