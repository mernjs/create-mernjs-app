<?php
defined( 'ABSPATH' ) || exit;
/**
 * Widget title Settings
 *
 * @package Simple Days
 */


$section_name['sidebar'] = 'simple_days_sidebar_setting';
$section_name['footer'] = 'simple_days_widget_title_setting';
$side_footer = array('sidebar' => esc_html_x( 'Sidebar', 'widget_title' , 'simple-days'),'footer' => esc_html_x( 'Footer', 'widget_title' , 'simple-days'));
foreach ($side_footer as $s_f_name => $s_f_t_name) {

  $wp_customize->add_setting( 'simple_days_widget_title_'.$s_f_name.'_info', array(
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'simple_days_widget_title_'.$s_f_name.'_info', array(
    'section' => $section_name[$s_f_name],
    
    'label' => esc_html_x( 'Widget title', 'widget_title' , 'simple-days'),

  )));

  $custom_section = $section_name[$s_f_name];
  $custom_name = 'simple_days_widget_title_'.$s_f_name.'_';

  Simple_Days_custom_text_size($wp_customize,$custom_name,$custom_section,18);
  Simple_Days_custom_font_weight($wp_customize,$custom_name,$custom_section,700);
  Simple_Days_custom_text_color($wp_customize,$custom_name,$custom_section,'');
  Simple_Days_custom_text_position($wp_customize,$custom_name,$custom_section,'left');
  $custom_default['margin_min'] = -10;
  Simple_Days_custom_padding_margin($wp_customize,$custom_name,$custom_section,$custom_default,$border_angle);

  $custom_default = array();

  Simple_Days_custom_border($wp_customize,$custom_name,$custom_section,$custom_default,$border_angle,$heading_border_style);

  Simple_Days_custom_background_image($wp_customize,$custom_name,$custom_section,'');

  Simple_Days_custom_background_color($wp_customize,$custom_name,$custom_section,'');

  Simple_Days_custom_border_radius($wp_customize,$custom_name,$custom_section,'');

  Simple_Days_custom_balloon($wp_customize,$custom_name,$custom_section,'');


}
