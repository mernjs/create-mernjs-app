<?php
defined( 'ABSPATH' ) || exit;
/**
 * Posts Settings
 *
 * @package Simple Days
 */




$wp_customize->add_section('simple_days_posts_thumbnail',array(
  'title' => esc_html__('Thumbnail','simple-days'),
  'panel' => 'simple_days_posts_setting',
));

$wp_customize->add_setting('posts_thumbnail',array('sanitize_callback' => 'absint',));
$wp_customize->add_control('posts_thumbnail',array(
  'section' => 'simple_days_posts_thumbnail',
  'type' => 'hidden'
));
$wp_customize->selective_refresh->add_partial( 'posts_thumbnail', array(
 'selector' => '.post_thum',
));

$wp_customize->add_setting( 'simple_days_posts_thumbnail',array(
  'default'    => true,
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( 'simple_days_posts_thumbnail',array(
  'label'   => esc_html__( 'Display', 'simple-days'),
  'description' => esc_html__('Thumbnail', 'simple-days'),
  'section' => 'simple_days_posts_thumbnail',
  'type' => 'checkbox',
));

$wp_customize->add_setting( 'simple_days_posts_title_over_thumbnail',array(
  'default'    => false,
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( 'simple_days_posts_title_over_thumbnail',array(
  'label'   => esc_html__( 'Post title over the thumbnail', 'simple-days'),
  'section' => 'simple_days_posts_thumbnail',
  'type' => 'checkbox',
));

$wp_customize->add_setting( 'simple_days_posts_full_width_thumbnail',array(
  'default'    => false,
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( 'simple_days_posts_full_width_thumbnail',array(
  'label'   => esc_html__( 'Full width thumbnail at under the header', 'simple-days'),
  'section' => 'simple_days_posts_thumbnail',
  'type' => 'checkbox',
));

$wp_customize->add_setting( 'simple_days_posts_thumbnail_size', array(
  'default'           => 'full',
  'sanitize_callback' => 'simple_days_sanitize_radio',
));
$wp_customize->add_control( 'simple_days_posts_thumbnail_size', array(
  'label'    => esc_html__( 'Original size of thumbnail', 'simple-days' ),
    //'description' => esc_html__('Date and category disappears when you select hide.', 'simple-days'),
  'section'  => 'simple_days_posts_thumbnail',
  'type'     => 'select',
  'choices'  => array(
    'thumbnail' => esc_html__( 'Thumbnail', 'simple-days' ),
    'medium' => esc_html__( 'Medium', 'simple-days' ),
    'large' => esc_html__( 'Large', 'simple-days' ),
    'full' => esc_html__( 'Full', 'simple-days' ),
  ),
));




$wp_customize->add_section('simple_days_posts_date_section',array(
  'title' => esc_html__('Date','simple-days'),
  'panel' => 'simple_days_posts_setting',
));


$wp_customize->add_setting('date_position',array('sanitize_callback' => 'absint',));
$wp_customize->add_control('date_position',array(
  'section' => 'simple_days_posts_date_section',
  'type' => 'hidden'
));
$wp_customize->selective_refresh->add_partial( 'date_position', array(
 'selector' => '.post_date',
));
$wp_customize->add_setting( 'simple_days_posts_date_position', array(
  'default'           => 'right',
  'sanitize_callback' => 'simple_days_sanitize_radio',
  //'transport'=>'postMessage',
));
$wp_customize->add_control( 'simple_days_posts_date_position', array(
  'label'    => esc_html__( 'Post date display position', 'simple-days' ),
  'section'  => 'simple_days_posts_date_section',
  'type'     => 'radio',
  'choices'  => array(
    'left' => esc_html__( 'Left', 'simple-days' ),
    'center' => esc_html__( 'Center', 'simple-days' ),
    'right' => esc_html__( 'Right', 'simple-days' ),
    //'none' => esc_html__( 'Hide', 'simple-days' ),
  ),
));

$wp_customize->add_setting( 'simple_days_posts_date_display', array(
  'default'           => 'both',
  'sanitize_callback' => 'simple_days_sanitize_radio',
));
$wp_customize->add_control( 'simple_days_posts_date_display', array(
  'label'    => esc_html__( 'Display method Post date', 'simple-days' ),
  'section'  => 'simple_days_posts_date_section',
  'type'     => 'radio',
  'choices'  => array(
    'date' => esc_html__( 'Only Date', 'simple-days' ),
    'update' => esc_html__( 'Date hide when post have update.', 'simple-days' ),
    'both' => esc_html__( 'Both', 'simple-days' ),
  ),
));

$wp_customize->add_setting( 'simple_days_posts_date_icon',array(
  'default'    => 'fa-calendar-check-o',
  'sanitize_callback' => 'wp_strip_all_tags',
));
$wp_customize->add_control( 'simple_days_posts_date_icon',array(
  'label'   => esc_html__( 'Date icon', 'simple-days'),
  'section' => 'simple_days_posts_date_section',
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

$wp_customize->add_setting( 'simple_days_posts_up_date_icon',array(
  'default'    => 'fa-history',
  'sanitize_callback' => 'wp_strip_all_tags',
));
$wp_customize->add_control( 'simple_days_posts_up_date_icon',array(
  'label'   => esc_html__( 'Update icon', 'simple-days'),
  'section' => 'simple_days_posts_date_section',
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

$wp_customize->add_setting( 'simple_days_posts_time_display',array(
  'default'    => false,
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('simple_days_posts_time_display',array(
  'label'   => esc_html__( 'Time', 'simple-days'),
  'section' => 'simple_days_posts_date_section',
  'type' => 'checkbox',
));


$wp_customize->add_section('simple_days_posts_author_section',array(
  'title' => esc_html__('Author','simple-days'),
  'panel' => 'simple_days_posts_setting',
));



$wp_customize->add_setting('author_position',array('sanitize_callback' => 'absint',));
$wp_customize->add_control('author_position',array(
  'section' => 'simple_days_posts_author_section',
  'type' => 'hidden'
));
$wp_customize->selective_refresh->add_partial( 'author_position', array(
 'selector' => '.post_author',
));
$wp_customize->add_setting( 'simple_days_posts_author_position', array(
  'default'           => 'right',
  'sanitize_callback' => 'simple_days_sanitize_radio',
  //'transport'=>'postMessage',
));
$wp_customize->add_control( 'simple_days_posts_author_position', array(
  'label'    => esc_html__( 'Author display position', 'simple-days' ),
  'section'  => 'simple_days_posts_author_section',
  'type'     => 'radio',
  'choices'  => array(
    'left' => esc_html__( 'Left', 'simple-days' ),
    'center' => esc_html__( 'Center', 'simple-days' ),
    'right' => esc_html__( 'Right', 'simple-days' ),
    //'none' => esc_html__( 'Hide', 'simple-days' ),
  ),
));

$wp_customize->add_setting( 'simple_days_posts_author_icon',array(
  'default'    => 'fa-user',
  'sanitize_callback' => 'wp_strip_all_tags',
));
$wp_customize->add_control( 'simple_days_posts_author_icon',array(
  'label'   => esc_html__( 'Author icon', 'simple-days'),
  'section' => 'simple_days_posts_author_section',
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

$wp_customize->add_setting( 'simple_days_posts_author_icon_avatar',array(
  'default'    => false,
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( 'simple_days_posts_author_icon_avatar',array(
  'label'   => esc_html__('Avatar in place of icon.', 'simple-days'),
  'section' => 'simple_days_posts_author_section',
  'type' => 'checkbox',
));


/*
$wp_customize->add_setting('author_profile',array('sanitize_callback' => 'absint',));
$wp_customize->add_control('author_profile',array(
  'section' => 'simple_days_posts_author_section',
  'type' => 'hidden'
));
$wp_customize->selective_refresh->add_partial( 'author_profile', array(
 'selector' => '#about_author',
));

$wp_customize->add_setting( 'simple_days_posts_author_profile',array(
  'default'    => true,
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('simple_days_posts_author_profile',array(
  'label'   => esc_html__( 'Display', 'simple-days'),
  'description' => esc_html__('About the author(Author profile)', 'simple-days'),
  'section' => 'simple_days_posts_author_section',
  'type' => 'checkbox',
));
*/












$wp_customize->add_section('simple_days_posts_category_tag',array(
  'title' => esc_html__('Category &amp; Tag','simple-days'),
  'panel' => 'simple_days_posts_setting',
));





$wp_customize->add_setting('post_category_icon',array('sanitize_callback' => 'absint',));
$wp_customize->add_control('post_category_icon',array(
  'section' => 'simple_days_posts_category_tag',
  'type' => 'hidden'
));
$wp_customize->selective_refresh->add_partial( 'post_category_icon', array(
 'selector' => '.post_category',
));

$wp_customize->add_setting( 'simple_days_posts_category_icon',array(
  'default'    => 'fa-folder-o',
  'sanitize_callback' => 'wp_strip_all_tags',
));
$wp_customize->add_control( 'simple_days_posts_category_icon',array(
  'label'   => esc_html__( 'Category icon', 'simple-days'),
  'section' => 'simple_days_posts_category_tag',
  'type' => 'select',
  'choices' => array(
   '&nbsp;' => esc_html('&nbsp;'),
   'fa-folder-o' => '&#xf114; fa-folder-o',
   'fa-folder-open-o' => '&#xf115; fa-folder-open-o',
   'fa-folder' => '&#xf07b; fa-folder',
   'fa-folder-open' => '&#xf07c; folder-open',
 ),
));

$wp_customize->add_setting('post_tag_icon',array('sanitize_callback' => 'absint',));
$wp_customize->add_control('post_tag_icon',array(
  'section' => 'simple_days_posts_category_tag',
  'type' => 'hidden'
));
$wp_customize->selective_refresh->add_partial( 'post_tag_icon', array(
 'selector' => '.post_tag',
));
$wp_customize->add_setting( 'simple_days_posts_tag_icon',array(
  'default'    => 'fa-tag',
  'sanitize_callback' => 'wp_strip_all_tags',
));
$wp_customize->add_control( 'simple_days_posts_tag_icon',array(
  'label'   => esc_html__( 'Tag icon', 'simple-days'),
  'section' => 'simple_days_posts_category_tag',
  'type' => 'select',
  'choices' => array(
   '&nbsp;' => esc_html('&nbsp;'),
   'fa-tag' => '&#xf02b; fa-tag',
   'fa-tags' => '&#xf02c; fa-tags',
 ),
));






$wp_customize->add_section('simple_days_posts_reorder_sections',array(
  'title' => esc_html__('Reorder Sections & Show / Hide','simple-days'),
  'panel' => 'simple_days_posts_setting',
));


/*
$sort_order_list =array(
 'breadcrumbs','title','date','author','pv','thumbnail','content','widget','page_link','cta','share','author_profile','related','category','tag','pagenation','comment',
);
*/




$wp_customize->add_setting( 'simple_days_posts_sortable',
 array(
  'default'   => simple_days_sort_order_base_post(),
  'sanitize_callback' => 'simple_days_array_sanitize',
)
);
$wp_customize->add_control( new Simple_Days_Posts_Sortable_Custom_Control( $wp_customize, 'simple_days_posts_sortable',
 array(
  'type' => 'posts_sortable',
  'label' => esc_html__( 'Reorder Sections & Show / Hide', 'simple-days' ),
  'description' => esc_html__( 'drag the columns to rearrange their order.', 'simple-days' ).esc_html__( 'Switch to show or hide when eye icon click or tap.', 'simple-days' ),
  'section' => 'simple_days_posts_reorder_sections',

  'choices'  => simple_days_sort_order_custom_post(),
)
) );








$wp_customize->add_section('simple_days_post_title_setting',array(
  'title' => esc_html__('Post Title','simple-days'),
  'panel' => 'simple_days_posts_setting',
));

$wp_customize->add_setting('post_title_setting',array('sanitize_callback' => 'absint',));
$wp_customize->add_control('post_title_setting',array('type' => 'hidden',
  'section' => 'simple_days_post_title_setting',
));
$wp_customize->selective_refresh->add_partial( 'post_title_setting', array(
 'selector' => '.post_title',
));

$custom_section = 'simple_days_post_title_setting';
$custom_name = 'simple_days_post_title_';

Simple_Days_custom_text_size($wp_customize,$custom_name,$custom_section,40);
Simple_Days_custom_font_weight($wp_customize,$custom_name,$custom_section,100);
Simple_Days_custom_text_color($wp_customize,$custom_name,$custom_section,'');
Simple_Days_custom_text_position($wp_customize,$custom_name,$custom_section,'left');


$custom_default['margin_min'] = -22;
Simple_Days_custom_padding_margin($wp_customize,$custom_name,$custom_section,$custom_default,$border_angle);

$custom_default = array();
Simple_Days_custom_border($wp_customize,$custom_name,$custom_section,$custom_default,$border_angle,$heading_border_style);

Simple_Days_custom_background_image($wp_customize,$custom_name,$custom_section,'');

Simple_Days_custom_background_color($wp_customize,$custom_name,$custom_section,'');

Simple_Days_custom_border_radius($wp_customize,$custom_name,$custom_section,'');

Simple_Days_custom_balloon($wp_customize,$custom_name,$custom_section,'');








$wp_customize->add_section('simple_days_post_heading_setting',array(
  'title' => esc_html__('Post Heading','simple-days'),
  'panel' => 'simple_days_posts_setting',
));

$wp_customize->add_setting('post_heading_setting',array('sanitize_callback' => 'absint',));
$wp_customize->add_control('post_heading_setting',array('type' => 'hidden',
  'section' => 'simple_days_post_heading_setting',
));
$wp_customize->selective_refresh->add_partial( 'post_heading_setting', array(
 'selector' => '.post_body>h2 , .post_body>h3 , .post_body>h4',
));

$i = 2;

$heading_font_size = array(0,36,30,24,18,14,12);
while ( $i < 5) {

  $wp_customize->add_setting( 'simple_days_post_heading_'.$i.'_info', array(
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'simple_days_post_heading_'.$i.'_info', array(
    'section' => 'simple_days_post_heading_setting',
    'label' => sprintf(esc_html_x( 'H%s', 'post_heading' , 'simple-days'),$i),
    
  )));

  $custom_section = 'simple_days_post_heading_setting';
  $custom_name = 'simple_days_post_heading_'.$i.'_';

  Simple_Days_custom_text_size($wp_customize,$custom_name,$custom_section,$heading_font_size[$i]);
  Simple_Days_custom_font_weight($wp_customize,$custom_name,$custom_section,400);
  Simple_Days_custom_text_color($wp_customize,$custom_name,$custom_section,'');
  Simple_Days_custom_text_position($wp_customize,$custom_name,$custom_section,'left');


  $custom_default['margin_min'] = -22;
  Simple_Days_custom_padding_margin($wp_customize,$custom_name,$custom_section,$custom_default,$border_angle);

  $custom_default = array();
  Simple_Days_custom_border($wp_customize,$custom_name,$custom_section,$custom_default,$border_angle,$heading_border_style);

  Simple_Days_custom_background_image($wp_customize,$custom_name,$custom_section,'');

  Simple_Days_custom_background_color($wp_customize,$custom_name,$custom_section,'');

  Simple_Days_custom_border_radius($wp_customize,$custom_name,$custom_section,'');

  Simple_Days_custom_balloon($wp_customize,$custom_name,$custom_section,'');

  ++$i;
}






$wp_customize->add_setting('breadcrumbs',array('sanitize_callback' => 'absint',));
$wp_customize->add_control('breadcrumbs',array(
  'section' => 'simple_days_breadcrumbs',
  'type' => 'hidden'
));
$wp_customize->selective_refresh->add_partial( 'breadcrumbs', array(
 'selector' => '#breadcrumb',
));

$wp_customize->add_section('simple_days_breadcrumbs',array(
  'title' => esc_html__('Breadcrumbs','simple-days'),
  'panel' => 'simple_days_posts_setting',
));

$wp_customize->add_setting( 'simple_days_breadcrumbs_display', array(
  'default'           => 'left',
  'sanitize_callback' => 'simple_days_sanitize_radio',
  //'transport'=>'postMessage',
));
$wp_customize->add_control( 'simple_days_breadcrumbs_display', array(
  'label'    => esc_html__( 'Breadcrumbs display position', 'simple-days' ),
  'section'  => 'simple_days_breadcrumbs',
  'type'     => 'radio',
  'choices'  => array(
    'left' => esc_html__( 'Left', 'simple-days' ),
    'center' => esc_html__( 'Center', 'simple-days' ),
    'right' => esc_html__( 'Right', 'simple-days' ),
    //'none' => esc_html__( 'Hide', 'simple-days' ),
  ),
));


$wp_customize->add_setting( 'simple_days_breadcrumbs_current',array(
  'default'    => true,
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( 'simple_days_breadcrumbs_current',array(
  'label'   => esc_html__( 'Display', 'simple-days'),
  'description' => esc_html__('Current name', 'simple-days'),
  'section' => 'simple_days_breadcrumbs',
  'type' => 'checkbox',
));



$delimiter = '&raquo;';
$wp_customize->add_setting( 'simple_days_breadcrumbs_delimiter',array(
  'default'    => $delimiter,
  'sanitize_callback' => 'wp_strip_all_tags',
));
$wp_customize->add_control( 'simple_days_breadcrumbs_delimiter',array(
  'label'   => esc_html__( 'Delimiter', 'simple-days'),
  'section' => 'simple_days_breadcrumbs',
  'type' => 'select',
  'choices' => array(
   '&nbsp;' => esc_html('&nbsp;'),
   '&raquo;' => esc_html('&raquo;'),
   '&gt;' => esc_html('&gt;'),
   '&middot;' => esc_html('&middot;'),
   '&#45;' => esc_html('&#45;'),
   '&rarr;' => esc_html('&rarr;'),
   '&rArr;' => esc_html('&rArr;'),
   '&sim;' => esc_html('&sim;'),
   '&#124;' => esc_html('&#124;'),
   '&hellip;' => esc_html('&hellip;'),
 ),
));


$wp_customize->add_setting( 'simple_days_breadcrumbs_homeicon',array(
  'default'    => 'fa-home',
  'sanitize_callback' => 'wp_strip_all_tags',
));
$wp_customize->add_control( 'simple_days_breadcrumbs_homeicon',array(
  'label'   => esc_html__( 'Home icon', 'simple-days'),
  'section' => 'simple_days_breadcrumbs',
  'type' => 'select',
  'choices' => array(
   '&nbsp;' => esc_html('&nbsp;'),
   'fa-home' => '&#xf015; fa-home',
   'fa-star-o' => '&#xf006; fa-star-o',
   'fa-star' => '&#xf005; fa-star',
   'fa-cube' => '&#xf1b2; fa-cube',
   'fa-tree' => '&#xf1bb; fa-tree',
   'fa-map-pin' => '&#xf276; fa-map-pin',
   'fa-map-marker' => '&#xf041; fa-map-marker',
   'fa-fort-awesome' => '&#xf286; fa-fort-awesome',
   'fa-rocket' => '&#xf135; fa-rocket',
 ),
));


$wp_customize->add_setting( 'simple_days_breadcrumbs_treeicon',array(
  'default'    => 'fa-folder-open-o',
  'sanitize_callback' => 'wp_strip_all_tags',
));
$wp_customize->add_control( 'simple_days_breadcrumbs_treeicon',array(
  'label'   => esc_html__( 'Tree icon', 'simple-days'),
  'section' => 'simple_days_breadcrumbs',
  'type' => 'select',
  'choices' => array(
   '&nbsp;' => esc_html('&nbsp;'),
   'fa-folder-open-o' => '&#xf115; fa-folder-open-o',
   'fa-folder-o' => '&#xf114; fa-folder-o',
   'fa-folder-open' => '&#xf07c; fa-folder-open',
   'fa-folder' => '&#xf07b; fa-folder',
   'fa-files-o' => '&#xf0c5; fa-files-o',
   'fa-book' => '&#xf02d; fa-book',
   'fa-check' => '&#xf00c; fa-check',
   'fa-check-square' => '&#xf14a; fa-check-square',
   'fa-cubes' => '&#xf1b3; fa-cubes',
 ),
));


$wp_customize->add_setting( 'simple_days_breadcrumbs_currenticon',array(
  'default'    => 'fa-file-text-o',
  'sanitize_callback' => 'wp_strip_all_tags',
));
$wp_customize->add_control( 'simple_days_breadcrumbs_currenticon',array(
  'label'   => esc_html__( 'Current icon', 'simple-days'),
  'section' => 'simple_days_breadcrumbs',
  'type' => 'select',
  'choices' => array(
   '&nbsp;' => esc_html('&nbsp;'),
   'fa-file-text-o' => '&#xf0f6; fa-file-text-o',
   'fa-file-o' => '&#xf016; fa-file-o',
   'fa-file-text' => '&#xf15c; fa-file-text',
   'fa-newspaper-o' => '&#xf1ea; fa-newspaper-o',
   'fa-sticky-note' => '&#xf249; fa-sticky-note',
   'fa-sticky-note-o' => '&#xf24a; fa-sticky-note-o',
   'fa-pencil' => '&#xf040; fa-pencil',
   'fa-smile-o' => '&#xf118; fa-smile-o',
   'fa-check' => '&#xf00c; fa-check',
   'fa-check-square' => '&#xf14a; fa-check-square',
   'fa-cube' => '&#xf1b2; fa-cube',
   'fa-paw' => '&#xf1b0; fa-paw',
   'fa-gamepad' => '&#xf11b; fa-gamepad',
 ),
));


$wp_customize->add_section('simple_days_post_comments',array(
  'title' => esc_html__('Comments','simple-days'),
  'panel' => 'simple_days_posts_setting',
));
$wp_customize->add_setting( 'simple_days_post_comments_bottom',array(
  'default'    => false,
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( 'simple_days_post_comments_bottom',array(
  'label'   => esc_html__( 'Comment Text Field to Bottom', 'simple-days'),
  'section' => 'simple_days_post_comments',
  'type' => 'checkbox',
));

$wp_customize->add_setting( 'simple_days_post_comments_website',array(
  'default'    => false,
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( 'simple_days_post_comments_website',array(
  'label'   => esc_html__( 'Website Field disappear', 'simple-days'),
  'section' => 'simple_days_post_comments',
  'type' => 'checkbox',
));


$wp_customize->add_section('simple_days_posts_anchor_section',array(
  'title' => esc_html__('Anchor','simple-days'),
  'panel' => 'simple_days_posts_setting',
));

$wp_customize->add_setting( 'simple_days_post_anchor_underline',array(
  'default'    => true,
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( 'simple_days_post_anchor_underline',array(
  'label'   => esc_html__( 'Underline', 'simple-days'),
  'section' => 'simple_days_posts_anchor_section',
  'type' => 'checkbox',
));
