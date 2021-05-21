<?php
defined( 'ABSPATH' ) || exit;
/**
 * Index Settings
 *
 * @package Simple Days
 */



$wp_customize->add_section('simple_days_layout_index',array(
  'title' => esc_html__('Layout', 'simple-days'),
  'panel' => 'simple_days_index_setting',
));



$wp_customize->add_setting( 'simple_days_index_layout_list', array(
  'default'           => 'list',
  'sanitize_callback' => 'sanitize_key',
) );
$wp_customize->add_control( new Simple_Days_Image_Select_Control( $wp_customize, 'simple_days_index_layout_list', array(
  'label'       => esc_html__( 'Layout', 'simple-days' ),
  'description' => __( 'Choose a layout for the blog posts.', 'simple-days' ),
  'section'     => 'simple_days_layout_index',
  'choices'     => array(
    'list' => array(
      'label' => esc_html__( 'List layout', 'simple-days' ),
      'url'   => '%slayout_list.png'
    ),
    'grid1'    => array(
      'label' => esc_html__( 'One grid layout', 'simple-days' ),
      'url'   => '%slayout_grid1.png'
    ),
    'grid2'    => array(
      'label' => esc_html__( 'Two grid layout', 'simple-days' ),
      'url'   => '%slayout_grid2.png'
    ),
    'grid3'    => array(
      'label' => esc_html__( 'Three grid layout', 'simple-days' ),
      'url'   => '%slayout_grid3.png'
    ),
    'grid1_2'    => array(
      'label' => esc_html__( 'Two grid layout after one grid layout', 'simple-days' ),
      'url'   => '%slayout_grid1_2.png'
    ),
    'grid1_3'    => array(
      'label' => esc_html__( 'Three grid layout after one grid layout', 'simple-days' ),
      'url'   => '%slayout_grid1_3.png'
    ),


  ),
)));


$wp_customize->add_setting( 'simple_days_index_typical', array(
  'default'           => 'original',
  'sanitize_callback' => 'simple_days_sanitize_radio',
));
$wp_customize->add_control( 'simple_days_index_typical', array(
  'label'    => esc_html__( 'Category and date display style', 'simple-days' ),
    //'description' => esc_html__('Date and category disappears when you select hide.', 'simple-days'),
  'section'  => 'simple_days_layout_index',
  'type'     => 'radio',
  'choices'  => array(
    'original' => esc_html__( 'Simple Days style', 'simple-days' ),
    'typical' => esc_html__( 'Typical style', 'simple-days' ),
  ),
));




$wp_customize->add_setting('index_thumbnail',array('sanitize_callback' => 'absint',));
$wp_customize->add_control('index_thumbnail',array(
  'section' => 'simple_days_layout_index',
  'type' => 'hidden'
));
$wp_customize->selective_refresh->add_partial( 'index_thumbnail', array(
 'selector' => '.post_card_thum',
));
$wp_customize->add_setting( 'simple_days_index_thumbnail', array(
  'default'           => 'left',
  'sanitize_callback' => 'simple_days_sanitize_radio',
));
$wp_customize->add_control( 'simple_days_index_thumbnail', array(
  'label'    => esc_html__( 'Thumbnail display position', 'simple-days' ),
    //'description' => esc_html__('Date and category disappears when you select hide.', 'simple-days'),
  'section'  => 'simple_days_layout_index',
  'type'     => 'radio',
  'choices'  => array(
    'left' => esc_html__( 'Left', 'simple-days' ).esc_html__( '(Up)', 'simple-days' ),
    'right' => esc_html__( 'Right', 'simple-days' ).esc_html__( '(Down)', 'simple-days' ),
    'none' => esc_html__( 'Hide', 'simple-days' ),
  ),
));

$wp_customize->add_setting( 'simple_days_index_thumbnail_size', array(
  'default'           => 'medium',
  'sanitize_callback' => 'simple_days_sanitize_radio',
));
$wp_customize->add_control( 'simple_days_index_thumbnail_size', array(
  'label'    => esc_html__( 'Original size of thumbnail', 'simple-days' ),
    //'description' => esc_html__('Date and category disappears when you select hide.', 'simple-days'),
  'section'  => 'simple_days_layout_index',
  'type'     => 'select',
  'choices'  => array(
    'thumbnail' => esc_html__( 'Thumbnail', 'simple-days' ),
    'medium' => esc_html__( 'Medium', 'simple-days' ),
    'large' => esc_html__( 'Large', 'simple-days' ),
    'full' => esc_html__( 'Full', 'simple-days' ),
  ),
));






$wp_customize->add_setting( 'simple_days_index_list_widget_position', array(
  'default'           => 'after',
  'sanitize_callback' => 'simple_days_sanitize_radio',
));
$wp_customize->add_control( 'simple_days_index_list_widget_position', array(
  'label'    => esc_html__( 'How to Insert Index list widget area', 'simple-days' ),
  'section'  => 'simple_days_layout_index',
  'type'     => 'radio',
  'choices'  => array(
    'after' => esc_html__( 'Just after post', 'simple-days' ),
    'every' => esc_html__( 'Every post', 'simple-days' ),
  ),
));


$wp_customize->add_setting( 'simple_days_index_list_widget_number', array(
  'default' => 3,
  'sanitize_callback' => 'absint',
));
$wp_customize->add_control( 'simple_days_index_list_widget_number', array(
  'label' => esc_html__( 'Count of post for above configuring', 'simple-days' ),
        //'description' => esc_html__( 'Count of post for above configuring', 'simple-days' ),
        'section' => 'simple_days_layout_index', // Add a default or your own section
        'type' => 'number',
        'input_attrs' => array(
          'min' => 1, 'step' => 1, 'max' => 10,
        ),
      ));







$wp_customize->add_section('simple_days_index_simple_days_style',array(
  'title' => esc_html__('Simple Days style', 'simple-days'),
  'panel' => 'simple_days_index_setting',
));


$wp_customize->add_setting('post_date_wrap',array('sanitize_callback' => 'absint',));
$wp_customize->add_control('post_date_wrap',array(
  'section' => 'simple_days_index_simple_days_style',
  'type' => 'hidden'
));
$wp_customize->selective_refresh->add_partial( 'post_date_wrap', array(
 'selector' => '.post_date_wrap',
));
$wp_customize->add_setting( 'simple_days_top_date_format', array(
  'default'           => '1',
  'sanitize_callback' => 'simple_days_sanitize_radio',
  'transport' => 'postMessage',
)
);
$wp_customize->add_control( 'simple_days_top_date_format', array(
  'label'    => esc_html__( 'post date display format', 'simple-days' ),
  'section'  => 'simple_days_index_simple_days_style',
  'type'     => 'radio',
  'choices'  => array(
    '1' => esc_html__( 'day-month-year', 'simple-days' ),
    '2' => esc_html__( 'month-day-year', 'simple-days' ),
  ),
));
$wp_customize->add_setting( 'simple_days_top_date_wrap', array(
  'default'           => '1',
  'sanitize_callback' => 'simple_days_sanitize_radio',
  'transport' => 'postMessage',
)
);
$wp_customize->add_control( 'simple_days_top_date_wrap', array(
  'label'    => esc_html__( 'post date display shape', 'simple-days' ),
  'description' => esc_html__('around of a line appear rounded or squared', 'simple-days'),
  'section'  => 'simple_days_index_simple_days_style',
  'type'     => 'radio',
  'choices'  => array(
    '1' => esc_html__( 'Circle', 'simple-days' ),
    '2' => esc_html__( 'Square', 'simple-days' ),
  ),
));

$wp_customize->add_setting( 'simple_days_index_date_position', array(
  'default'           => 'left',
  'sanitize_callback' => 'simple_days_sanitize_radio',
  'transport' => 'postMessage',
));
$wp_customize->add_control( 'simple_days_index_date_position', array(
  'label'    => esc_html__( 'Post date display position', 'simple-days' ),
  'section'  => 'simple_days_index_simple_days_style',
  'type'     => 'radio',
  'choices'  => array(
    'left' => esc_html__( 'Left', 'simple-days' ),
    'right' => esc_html__( 'Right', 'simple-days' ),
    'none' => esc_html__( 'Hide', 'simple-days' ),
  ),
));

$wp_customize->add_setting( 'simple_days_index_time',array(
  'default'    => false,
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( 'simple_days_index_time',array(
  'label'   => esc_html__( 'Time', 'simple-days'),
  'section' => 'simple_days_index_simple_days_style',
  'type' => 'checkbox',
));



$wp_customize->add_setting('index_category',array('sanitize_callback' => 'absint',));
$wp_customize->add_control('index_category',array(
  'section' => 'simple_days_index_simple_days_style',
  'type' => 'hidden'
));
$wp_customize->selective_refresh->add_partial( 'index_category', array(
  'selector' => '.post_card_category',
));


$wp_customize->add_setting( 'simple_days_index_category_position', array(
  'default'           => 'right',
  'sanitize_callback' => 'simple_days_sanitize_radio',
  'transport' => 'postMessage',
));
$wp_customize->add_control( 'simple_days_index_category_position', array(
  'label'    => esc_html__( 'Post category display position', 'simple-days' ),
  'section'  => 'simple_days_index_simple_days_style',
  'type'     => 'radio',
  'choices'  => array(
    'left' => esc_html__( 'Left', 'simple-days' ),
    'right' => esc_html__( 'Right', 'simple-days' ),
    'none' => esc_html__( 'Hide', 'simple-days' ),
  ),
));

$wp_customize->add_setting( 'simple_days_index_date_after_day',array(
  'default'           => '',
  'sanitize_callback' => 'wp_strip_all_tags',
  'transport' => 'postMessage',
));
$wp_customize->add_control('simple_days_index_date_after_day',array(
  'label'   => esc_html__( 'Add after day', 'simple-days'),
  'section' => 'simple_days_index_simple_days_style',
  'type'    => 'text',
));









$wp_customize->add_section('simple_days_index_typical_style',array(
  'title' => esc_html__('Typical style', 'simple-days'),
  'panel' => 'simple_days_index_setting',
));

$wp_customize->add_setting( 'simple_days_index_typical_style_date',array(
  'default'    => true,
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( 'simple_days_index_typical_style_date',array(
  'label'   => esc_html__( 'Date', 'simple-days'),
  'section' => 'simple_days_index_typical_style',
  'type' => 'checkbox',
));
$wp_customize->add_setting( 'simple_days_index_typical_style_time',array(
  'default'    => false,
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( 'simple_days_index_typical_style_time',array(
  'label'   => esc_html__( 'Time', 'simple-days'),
  'section' => 'simple_days_index_typical_style',
  'type' => 'checkbox',
));

$wp_customize->add_setting( 'simple_days_index_typical_style_category',array(
  'default'    => true,
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( 'simple_days_index_typical_style_category',array(
  'label'   => esc_html__( 'Category', 'simple-days'),
  'section' => 'simple_days_index_typical_style',
  'type' => 'checkbox',
));













$wp_customize->add_section('simple_days_index_excerpt_setting',array(
  'title' => esc_html__('Excerpt', 'simple-days'),
  'panel' => 'simple_days_index_setting',
));











$wp_customize->add_setting('excerpt_length',array('sanitize_callback' => 'absint',));
$wp_customize->add_control('excerpt_length',array(
  'section' => 'simple_days_index_excerpt_setting',
  'type' => 'hidden'
));
$wp_customize->selective_refresh->add_partial( 'excerpt_length', array(
 'selector' => '.post_card .summary',
));
$wp_customize->add_setting( 'simple_days_excerpt_length_customize', array(
  'default' => 150,
  'sanitize_callback' => 'absint',
));
$wp_customize->add_control( 'simple_days_excerpt_length_customize', array(
  'label' => esc_html__( 'Excerpt length', 'simple-days' ),
  'section' => 'simple_days_index_excerpt_setting',
  'type' => 'number',
  'input_attrs' => array(
    'min' => 0, 'step' => 1, 'max' => 5000,),
));

$wp_customize->add_setting( 'simple_days_excerpt_type', array(
  'default'           => 'characters',
  'sanitize_callback' => 'simple_days_sanitize_radio',
));
$wp_customize->add_control( 'simple_days_excerpt_type', array(
  'label'    => esc_html__( 'Excerpt type', 'simple-days' ),
  'section'  => 'simple_days_index_excerpt_setting',
  'type'     => 'radio',
  'choices'  => array(
    'words' => esc_html__( 'Words', 'simple-days' ),
    'characters' => esc_html__( 'Characters', 'simple-days' ),
  ),
));

$delimiter = '&hellip;';
$wp_customize->add_setting( 'simple_days_excerpt_ellipsis',array(
  'default'    => $delimiter,
  'sanitize_callback' => 'wp_strip_all_tags',
));
$wp_customize->add_control( 'simple_days_excerpt_ellipsis',array(
  'label'   => esc_html__( 'Ellipsis', 'simple-days'),
  'section' => 'simple_days_index_excerpt_setting',
  'type' => 'select',
  'choices' => array(
   '&nbsp;' => esc_html('&nbsp;'),
   '&hellip;' => esc_html('&hellip;'),
   '[&hellip;]' => esc_html('[&hellip;]'),
   '&#8229;' => esc_html('&#8229;'),
 ),
));




$wp_customize->add_setting('more_read',array('sanitize_callback' => 'absint',));
$wp_customize->add_control('more_read',array(
  'section' => 'simple_days_index_excerpt_setting',
  'type' => 'hidden'
));
$wp_customize->selective_refresh->add_partial( 'more_read', array(
  'selector' => '.more_read',
));
$wp_customize->add_setting( 'simple_days_read_more_position', array(
  'default'           => 'right',
  'sanitize_callback' => 'simple_days_sanitize_radio',
  'transport' => 'postMessage',
));
$wp_customize->add_control( 'simple_days_read_more_position', array(
  'label'    => esc_html__( 'Read More display position', 'simple-days' ),
  'section'  => 'simple_days_index_excerpt_setting',
  'type'     => 'radio',
  'choices'  => array(
    'left' => esc_html__( 'Left', 'simple-days' ),
    'center' => esc_html__( 'Center', 'simple-days' ),
    'right' => esc_html__( 'Right', 'simple-days' ),
    'none' => esc_html__( 'Hide', 'simple-days' ),
  ),
));



$wp_customize->add_section('simple_days_index_author_setting',array(
  'title' => esc_html__('Author', 'simple-days'),
  'panel' => 'simple_days_index_setting',
));

$wp_customize->add_setting('index_author',array('sanitize_callback' => 'absint',));
$wp_customize->add_control('index_author',array(
  'section' => 'simple_days_index_author_setting',
  'type' => 'hidden'
));
$wp_customize->selective_refresh->add_partial( 'index_author', array(
  'selector' => '.index_author',
));

$wp_customize->add_setting( 'simple_days_index_author_position', array(
  'default'           => 'none',
  'sanitize_callback' => 'simple_days_sanitize_radio',
  //'transport' => 'postMessage',
));
$wp_customize->add_control( 'simple_days_index_author_position', array(
  'label'    => esc_html__( 'Author display position', 'simple-days' ),
  'section'  => 'simple_days_index_author_setting',
  'type'     => 'radio',
  'choices'  => array(
    'left' => esc_html__( 'Left', 'simple-days' ),
    'center' => esc_html__( 'Center', 'simple-days' ),
    'right' => esc_html__( 'Right', 'simple-days' ),
    'none' => esc_html__( 'Hide', 'simple-days' ),
  ),
));

$wp_customize->add_setting( 'simple_days_index_author_icon',array(
  'default'    => 'fa-user',
  'sanitize_callback' => 'wp_strip_all_tags',
));
$wp_customize->add_control( 'simple_days_index_author_icon',array(
  'label'   => esc_html__( 'Author icon', 'simple-days'),
  'section' => 'simple_days_index_author_setting',
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

$wp_customize->add_setting( 'simple_days_index_author_icon_avatar',array(
  'default'    => false,
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( 'simple_days_index_author_icon_avatar',array(
  'label'   => esc_html__( 'Avatar in place of icon', 'simple-days'),
  'section' => 'simple_days_index_author_setting',
  'type' => 'checkbox',
));




$wp_customize->add_section('simple_days_index_title_setting',array(
  'title' => esc_html__('Title', 'simple-days'),
  'panel' => 'simple_days_index_setting',
));

$wp_customize->add_setting('simple_days_index_title_partial',array('sanitize_callback' => 'absint',));
$wp_customize->add_control('simple_days_index_title_partial',array('type' => 'hidden',
  'section' => 'simple_days_index_title_setting',
));
$wp_customize->selective_refresh->add_partial( 'simple_days_index_title_partial', array(
  'selector' => '.entry_title',
));

$wp_customize->add_setting( 'simple_days_index_title_info', array(
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'simple_days_index_title_info', array(
  'section' => 'simple_days_index_title_setting',
  
  'label' => esc_html__( 'Index title',  'simple-days'),

)));

$custom_section = 'simple_days_index_title_setting';
$custom_name = 'simple_days_index_title_';

Simple_Days_custom_text_size($wp_customize,$custom_name,$custom_section,21);

Simple_Days_custom_font_weight($wp_customize,$custom_name,$custom_section,700);

Simple_Days_custom_text_color($wp_customize,$custom_name,$custom_section,'');

Simple_Days_custom_text_hover_color($wp_customize,$custom_name,$custom_section,'');

Simple_Days_custom_text_position($wp_customize,$custom_name,$custom_section,'left');


$custom_default['margin_min'] = -12;
Simple_Days_custom_padding_margin($wp_customize,$custom_name,$custom_section,$custom_default,$border_angle);

$custom_default = array();
Simple_Days_custom_border($wp_customize,$custom_name,$custom_section,$custom_default,$border_angle,$heading_border_style);

Simple_Days_custom_background_image($wp_customize,$custom_name,$custom_section,'');

Simple_Days_custom_background_color($wp_customize,$custom_name,$custom_section,'');

Simple_Days_custom_border_radius($wp_customize,$custom_name,$custom_section,'');

Simple_Days_custom_balloon($wp_customize,$custom_name,$custom_section,'');
