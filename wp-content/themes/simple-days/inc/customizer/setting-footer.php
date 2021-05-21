<?php
defined( 'ABSPATH' ) || exit;
/**
 * Footer Settings
 *
 * @package Simple Days
 */


$wp_customize->add_section('simple_days_layout_footer',array(
  'title' => esc_html__('Layout', 'simple-days'),
  'panel' => 'simple_days_footer_setting',
));


$wp_customize->add_setting( 'simple_days_footer_menu_layout', array(
  'default'           => '2',
  'sanitize_callback' => 'sanitize_key',
  'transport'=>'postMessage',
) );
$wp_customize->add_control( new Simple_Days_Image_Select_Control( $wp_customize, 'simple_days_footer_menu_layout', array(
  'label'       => esc_html__( 'Footer Menu Layout', 'simple-days' ),
  'section'     => 'simple_days_layout_footer',
  'choices'     => array(
    '1' => array(
      'label' => esc_html__( 'First', 'simple-days' ),
      'url'   => '%sfooter_1.png'
    ),
    '2'    => array(
      'label' => esc_html__( 'Second', 'simple-days' ),
      'url'   => '%sfooter_2.png'
    ),
    '3'    => array(
      'label' => esc_html__( 'Third', 'simple-days' ),
      'url'   => '%sfooter_3.png'
    ),
  ),
)));


$wp_customize->add_setting('back_to_top_button',array('sanitize_callback' => 'absint',));
$wp_customize->add_control('back_to_top_button',array(
  'section' => 'simple_days_layout_footer',
  'type' => 'hidden'
));
$wp_customize->selective_refresh->add_partial( 'back_to_top_button', array(
  'selector' => '.to_top',
));
$wp_customize->add_setting( 'simple_days_back_to_top_button',array(
  'default'    => true,
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( 'simple_days_back_to_top_button',array(
  'label'   => esc_html__( 'Back to top button', 'simple-days'),
  'section' => 'simple_days_layout_footer',
  'type' => 'checkbox',
));

$wp_customize->add_setting( 'simple_days_footer_credit_reverse',array(
  'default'    => false,
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( 'simple_days_footer_credit_reverse',array(
  'label'   => esc_html__( 'Reverse the order of credit area', 'simple-days'),
  'section' => 'simple_days_layout_footer',
  'type' => 'checkbox',
));

$wp_customize->add_setting( 'simple_days_footer_credit_column',array(
  'default'    => false,
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( 'simple_days_footer_credit_column',array(
  'label'   => esc_html__( 'Credit area to one column', 'simple-days'),
  'section' => 'simple_days_layout_footer',
  'type' => 'checkbox',
));




$wp_customize->add_section('simple_days_footer_credit_setting',array(
  'title' => esc_html__('Credits','simple-days'),
  'panel' => 'simple_days_footer_setting',
));

$wp_customize->add_setting('copyright_description',array('sanitize_callback' => 'absint',));
$wp_customize->add_control('copyright_description',array(
  'section' => 'simple_days_footer_credit_setting',
  'type' => 'hidden'
));
$wp_customize->selective_refresh->add_partial( 'copyright_description', array(
  'selector' => '.description',
));
$wp_customize->add_setting( 'simple_days_copyright_description',array(
  'default'    => false,
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( 'simple_days_copyright_description',array(
  'label'   => esc_html__( 'Hide', 'simple-days'),
  'description' => esc_html__('Tagline', 'simple-days'),
  'section' => 'simple_days_footer_credit_setting',
  'type' => 'checkbox',
));

$wp_customize->add_setting( 'simple_days_footer_privacy_policy',array(
  'default'    => false,
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( 'simple_days_footer_privacy_policy',array(
  'label'   => esc_html__( 'Hide', 'simple-days'),
  'description' => esc_html__('Privacy policy', 'simple-days'),
  'section' => 'simple_days_footer_credit_setting',
  'type' => 'checkbox',
));

$wp_customize->add_setting('copyright_wordpress',array('sanitize_callback' => 'absint',));
$wp_customize->add_control('copyright_wordpress',array(
  'section' => 'simple_days_footer_credit_setting',
  'type' => 'hidden'
));
$wp_customize->selective_refresh->add_partial( 'copyright_wordpress', array(
  'selector' => '.copyright_wordpress',
));
$wp_customize->add_setting( 'simple_days_copyright_wordpress',array(
  'default'    => false,
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( 'simple_days_copyright_wordpress',array(
  'label'   => esc_html__( 'Hide', 'simple-days'),
  'description' => esc_html__('Powered by WordPress', 'simple-days'),
  'section' => 'simple_days_footer_credit_setting',
  'type' => 'checkbox',
));
$wp_customize->add_setting( 'simple_days_copyright_simple_days',array(
  'default'    => false,
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( 'simple_days_copyright_simple_days',array(
  'label'   => esc_html__( 'Hide', 'simple-days'),
  'description' => esc_html__('Theme by Simple Days', 'simple-days'),
  'section' => 'simple_days_footer_credit_setting',
  'type' => 'checkbox',
));



$wp_customize->add_setting('copyright',array('sanitize_callback' => 'absint',));
$wp_customize->add_control('copyright',array(
  'section' => 'simple_days_footer_credit_setting',
  'type' => 'hidden'
));
$wp_customize->selective_refresh->add_partial( 'copyright', array(
 'selector' => '.copyright',
));


$copyright_year = 1994;
$copyright_year_list = array();
while($copyright_year <= date('Y')){
  $copyright_year_list[$copyright_year] = (string) $copyright_year;
  ++$copyright_year;
}

$copyright_year_list = $copyright_year_list + array('none' => '');

$wp_customize->add_setting( 'simple_days_copyright_year',array(
  'default'    => 'none',
  'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control( 'simple_days_copyright_year',array(
  'label'   => esc_html__( 'Year of Publication', 'simple-days'),
  'section' => 'simple_days_footer_credit_setting',
  'type' => 'select',
  'choices' => $copyright_year_list,
));

$wp_customize->add_setting( 'simple_days_sitemap_footer',array(
  'default'    => false,
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( 'simple_days_sitemap_footer',array(
  'label'   => esc_html__( 'Display the site map link at footer area', 'simple-days'),
  'section' => 'simple_days_footer_credit_setting',
  'type' => 'checkbox',
));

$wp_customize->add_setting( 'simple_days_sitemap_page_post_name',array(
  'default'           => '',
  'sanitize_callback' => 'wp_strip_all_tags',
));
$wp_customize->add_control('simple_days_sitemap_page_post_name',array(
  'label'   => esc_html__( 'Page slug to be display at the page.', 'simple-days'),
  'description' => esc_html__('e.g.&nbsp;', 'simple-days').esc_html('sitemap'),
  'section' => 'simple_days_footer_credit_setting',
  'type'    => 'text',
));





$wp_customize->add_section('simple_days_footer_logo_setting',array(
  'title' => esc_html__('Logo','simple-days'),
  'panel' => 'simple_days_footer_setting',
));


$wp_customize->add_setting( 'simple_days_footer_logo_img',array(
  'default'    => '',
  'sanitize_callback' => 'simple_days_sanitize_image_file',
));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'simple_days_footer_logo_img', array(
  'label' => esc_html__( 'Logo', 'simple-days'),
  'section' => 'simple_days_footer_logo_setting',
)));

$wp_customize->add_setting( 'simple_days_footer_logo_image_width', array(
  'default' => 300,
  'sanitize_callback' => 'absint',
  'transport'=>'postMessage',
));
$wp_customize->add_control( 'simple_days_footer_logo_image_width', array(
  'label' => esc_html__( 'Max width(px)', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('300'),
  'section' => 'simple_days_footer_logo_setting',
  'type' => 'number',
  'input_attrs' => array(
    'min' => 1, 'step' => 1, 'max' => 600,),
));
$wp_customize->add_setting( 'simple_days_footer_logo_image_height', array(
  'default' => 60,
  'sanitize_callback' => 'absint',
  'transport'=>'postMessage',
));
$wp_customize->add_control( 'simple_days_footer_logo_image_height', array(
  'label' => esc_html__( 'Max height(px)', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('60'),
  'section' => 'simple_days_footer_logo_setting',
  'type' => 'number',
  'input_attrs' => array(
    'min' => 1, 'step' => 1, 'max' => 600,),
));



$wp_customize->add_section('simple_days_widget_title_setting',array(
  'title' => esc_html__('Widget Title','simple-days'),
  'panel' => 'simple_days_footer_setting',
));

