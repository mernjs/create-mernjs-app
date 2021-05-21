<?php
defined( 'ABSPATH' ) || exit;
/**
 * Pages Settings
 *
 * @package Simple Days
 */


$wp_customize->add_section('simple_days_pages_thumbnail',array(
  'title' => esc_html__('Thumbnail','simple-days'),
  'panel' => 'simple_days_pages_setting',
));


$wp_customize->add_setting('page_thumbnail',array('sanitize_callback' => 'absint',));
$wp_customize->add_control('page_thumbnail',array(
  'section' => 'simple_days_pages_thumbnail',
  'type' => 'hidden'
));
$wp_customize->selective_refresh->add_partial( 'page_thumbnail', array(
 'selector' => '.page_thum',
));

$wp_customize->add_setting( 'simple_days_page_thumbnail',array(
  'default'    => true,
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( 'simple_days_page_thumbnail',array(
  'label'   => esc_html__( 'Display', 'simple-days'),
  'description' => esc_html__('Thumbnail', 'simple-days'),
  'section' => 'simple_days_pages_thumbnail',
  'type' => 'checkbox',
));

$wp_customize->add_setting( 'simple_days_page_title_over_thumbnail',array(
  'default'    => false,
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( 'simple_days_page_title_over_thumbnail',array(
  'label'   => esc_html__( 'Page title over the thumbnail', 'simple-days'),
  'section' => 'simple_days_pages_thumbnail',
  'type' => 'checkbox',
));

$wp_customize->add_setting( 'simple_days_page_full_width_thumbnail',array(
  'default'    => false,
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( 'simple_days_page_full_width_thumbnail',array(
  'label'   => esc_html__( 'Full width thumbnail at under the header', 'simple-days'),
  'section' => 'simple_days_pages_thumbnail',
  'type' => 'checkbox',
));

$wp_customize->add_setting( 'simple_days_page_thumbnail_size', array(
  'default'           => 'full',
  'sanitize_callback' => 'simple_days_sanitize_radio',
));
$wp_customize->add_control( 'simple_days_page_thumbnail_size', array(
  'label'    => esc_html__( 'Original size of thumbnail', 'simple-days' ),
    //'description' => esc_html__('Date and category disappears when you select hide.', 'simple-days'),
  'section'  => 'simple_days_pages_thumbnail',
  'type'     => 'select',
  'choices'  => array(
    'thumbnail' => esc_html__( 'Thumbnail', 'simple-days' ),
    'medium' => esc_html__( 'Medium', 'simple-days' ),
    'large' => esc_html__( 'Large', 'simple-days' ),
    'full' => esc_html__( 'Full', 'simple-days' ),
  ),
));



$wp_customize->add_section('simple_days_pages_date_section',array(
  'title' => esc_html__('Date','simple-days'),
  'panel' => 'simple_days_pages_setting',
));


$wp_customize->add_setting('page_date_position',array('sanitize_callback' => 'absint',));
$wp_customize->add_control('page_date_position',array(
  'section' => 'simple_days_pages_date_section',
  'type' => 'hidden'
));
$wp_customize->selective_refresh->add_partial( 'page_date_position', array(
 'selector' => '.page_date',
));
$wp_customize->add_setting( 'simple_days_page_date_position', array(
  'default'           => 'right',
  'sanitize_callback' => 'simple_days_sanitize_radio',
  //'transport'=>'postMessage',
));
$wp_customize->add_control( 'simple_days_page_date_position', array(
  'label'    => esc_html__( 'Post date display position', 'simple-days' ),
  'section'  => 'simple_days_pages_date_section',
  'type'     => 'radio',
  'choices'  => array(
    'left' => esc_html__( 'Left', 'simple-days' ),
    'center' => esc_html__( 'Center', 'simple-days' ),
    'right' => esc_html__( 'Right', 'simple-days' ),
    //'none' => esc_html__( 'Hide', 'simple-days' ),
  ),
));

$wp_customize->add_setting( 'simple_days_page_date_display', array(
  'default'           => 'both',
  'sanitize_callback' => 'simple_days_sanitize_radio',
));
$wp_customize->add_control( 'simple_days_page_date_display', array(
  'label'    => esc_html__( 'Display method Post date', 'simple-days' ),
  'section'  => 'simple_days_pages_date_section',
  'type'     => 'radio',
  'choices'  => array(
    'date' => esc_html__( 'Only Date', 'simple-days' ),
    'update' => esc_html__( 'Date hide when post have update.', 'simple-days' ),
    'both' => esc_html__( 'Both', 'simple-days' ),
  ),
));

$wp_customize->add_setting( 'simple_days_page_date_icon',array(
  'default'    => 'fa-calendar-check-o',
  'sanitize_callback' => 'wp_strip_all_tags',
));
$wp_customize->add_control( 'simple_days_page_date_icon',array(
  'label'   => esc_html__( 'Date icon', 'simple-days'),
  'section' => 'simple_days_pages_date_section',
  'type' => 'select',
  'choices' => array(
   '&nbsp;' => esc_html('&nbsp;'),
   'fa-calendar-check-o' => '&#xf274; fa-calendar-check-o',
   'fa-clock-o' => '&#xf017; fa-clock-o',
   'fa-calendar-o' => '&#xf133; fa-calendar-o',
   'fa-calendar' => '&#xf073; fa-calendar',
   'fa-history' => '&#xf1da; fa-history',
   'fa-refresh' => '&#xf021; fa-refresh',
 ),
));

$wp_customize->add_setting( 'simple_days_page_up_date_icon',array(
  'default'    => 'fa-history',
  'sanitize_callback' => 'wp_strip_all_tags',
));
$wp_customize->add_control( 'simple_days_page_up_date_icon',array(
  'label'   => esc_html__( 'Update icon', 'simple-days'),
  'section' => 'simple_days_pages_date_section',
  'type' => 'select',
  'choices' => array(
   '&nbsp;' => esc_html('&nbsp;'),
   'fa-history' => '&#xf1da; fa-history',
   'fa-refresh' => '&#xf021; fa-refresh',
   'fa-calendar-o' => '&#xf133; fa-calendar-o',
   'fa-calendar' => '&#xf073; fa-calendar',
   'fa-calendar-check-o' => '&#xf274; fa-calendar-check-o',
   'fa-clock-o' => '&#xf017; fa-clock-o',
 ),
));

$wp_customize->add_setting( 'simple_days_page_time_display',array(
  'default'    => false,
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('simple_days_page_time_display',array(
  'label'   => esc_html__( 'Time', 'simple-days'),
  'section' => 'simple_days_pages_date_section',
  'type' => 'checkbox',
));


$wp_customize->add_section('simple_days_pages_author_section',array(
  'title' => esc_html__('Author','simple-days'),
  'panel' => 'simple_days_pages_setting',
));


$wp_customize->add_setting('page_author_position',array('sanitize_callback' => 'absint',));
$wp_customize->add_control('page_author_position',array(
  'section' => 'simple_days_pages_author_section',
  'type' => 'hidden'
));
$wp_customize->selective_refresh->add_partial( 'page_author_position', array(
 'selector' => '.page_author',
));
$wp_customize->add_setting( 'simple_days_page_author_position', array(
  'default'           => 'right',
  'sanitize_callback' => 'simple_days_sanitize_radio',
  //'transport'=>'postMessage',
));
$wp_customize->add_control( 'simple_days_page_author_position', array(
  'label'    => esc_html__( 'Author display position', 'simple-days' ),
  'section'  => 'simple_days_pages_author_section',
  'type'     => 'radio',
  'choices'  => array(
    'left' => esc_html__( 'Left', 'simple-days' ),
    'center' => esc_html__( 'Center', 'simple-days' ),
    'right' => esc_html__( 'Right', 'simple-days' ),
    //'none' => esc_html__( 'Hide', 'simple-days' ),
  ),
));

$wp_customize->add_setting( 'simple_days_page_author_icon',array(
  'default'    => 'fa-user',
  'sanitize_callback' => 'wp_strip_all_tags',
));
$wp_customize->add_control( 'simple_days_page_author_icon',array(
  'label'   => esc_html__( 'Author icon', 'simple-days'),
  'section' => 'simple_days_pages_author_section',
  'type' => 'select',
  'choices' => array(
   '&nbsp;' => esc_html('&nbsp;'),
   'fa-user' => '&#xf007; fa-user',
   'fa-user-o' => '&#xf2c0; fa-user-o',
   'fa-user-circle' => '&#xf2bd; fa-user-circle',
   'fa-user-circle-o' => '&#xf2be; fa-user-circle-o',
   'fa-users' => '&#xf0c0; fa-users',
   'fa-user-secret' => '&#xf21b; fa-user-secret',
   'fa-female' => '&#xf182; fa-female',
   'fa-male' => '&#xf183; fa-male',
   'fa-child' => '&#xf1ae; fa-child',
   'fa-id-badge' => '&#xf2c1; fa-id-badge',
   'fa-smile-o' => '&#xf118; fa-smile-o',
   'fa-star-o' => '&#xf006; fa-star-o',
   'fa-star' => '&#xf005; fa-star',
   'fa-heart' => '&#xf004; fa-heart',
   'fa-heart-o' => '&#xf08a; fa-heart-o',
 ),
));

$wp_customize->add_setting( 'simple_days_page_author_icon_avatar',array(
  'default'    => false,
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( 'simple_days_page_author_icon_avatar',array(
  'label'   => esc_html__('Avatar in place of icon.', 'simple-days'),
  'section' => 'simple_days_pages_author_section',
  'type' => 'checkbox',
));
/*
$wp_customize->add_setting( 'simple_days_page_author_profile',array(
  'default'    => false,
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( 'simple_days_page_author_profile',array(
  'label'   => esc_html__( 'Display', 'simple-days'),
  'description' => esc_html__('About the author(Author profile)', 'simple-days'),
  'section' => 'simple_days_pages_author_section',
  'type' => 'checkbox',
));
*/


$wp_customize->add_section('simple_days_pages_category_tag',array(
  'title' => esc_html__('Category &amp; Tag','simple-days'),
  'panel' => 'simple_days_pages_setting',
));


$wp_customize->add_setting('page_folder_icon',array('sanitize_callback' => 'absint',));
$wp_customize->add_control('page_folder_icon',array(
  'section' => 'simple_days_pages_category_tag',
  'type' => 'hidden'
));
$wp_customize->selective_refresh->add_partial( 'page_folder_icon', array(
 'selector' => '.page_folder',
));
$wp_customize->add_setting( 'simple_days_page_category_icon',array(
  'default'    => 'fa-folder-o',
  'sanitize_callback' => 'wp_strip_all_tags',
));
$wp_customize->add_control( 'simple_days_page_category_icon',array(
  'label'   => esc_html__( 'Category icon', 'simple-days'),
  'section' => 'simple_days_pages_category_tag',
  'type' => 'select',
  'choices' => array(
   '&nbsp;' => esc_html('&nbsp;'),
   'fa-folder-o' => '&#xf114; fa-folder-o',
   'fa-folder-open-o' => '&#xf115; fa-folder-open-o',
   'fa-folder' => '&#xf07b; fa-folder',
   'fa-folder-open' => '&#xf07c; folder-open',
 ),
));

$wp_customize->add_setting('page_tag_icon',array('sanitize_callback' => 'absint',));
$wp_customize->add_control('page_tag_icon',array(
  'section' => 'simple_days_pages_category_tag',
  'type' => 'hidden'
));
$wp_customize->selective_refresh->add_partial( 'page_tag_icon', array(
 'selector' => '.page_tag',
));
$wp_customize->add_setting( 'simple_days_page_tag_icon',array(
  'default'    => 'fa-tag',
  'sanitize_callback' => 'wp_strip_all_tags',
));
$wp_customize->add_control( 'simple_days_page_tag_icon',array(
  'label'   => esc_html__( 'Tag icon', 'simple-days'),
  'section' => 'simple_days_pages_category_tag',
  'type' => 'select',
  'choices' => array(
   '&nbsp;' => esc_html('&nbsp;'),
   'fa-tag' => '&#xf02b; fa-tag',
   'fa-tags' => '&#xf02c; fa-tags',
 ),
));








$wp_customize->add_section('simple_days_pages_reorder_sections',array(
  'title' => esc_html__('Reorder Sections & Show / Hide','simple-days'),
  'panel' => 'simple_days_pages_setting',
));



$wp_customize->add_setting( 'simple_days_pages_sortable',
 array(
  'default'   => simple_days_sort_order_default_base_page(),
  'sanitize_callback' => 'simple_days_array_sanitize',
)
);
$wp_customize->add_control( new Simple_Days_Posts_Sortable_Custom_Control( $wp_customize, 'simple_days_pages_sortable',
 array(
  'type' => 'posts_sortable',
  'label' => esc_html__( 'Reorder Sections & Show / Hide', 'simple-days' ),
  'description' => esc_html__( 'drag the columns to rearrange their order.', 'simple-days' ).esc_html__( 'Switch to show or hide when eye icon click or tap.', 'simple-days' ),
  'section' => 'simple_days_pages_reorder_sections',

  'choices'  => simple_days_sort_order_custom_page(),
)
) );



