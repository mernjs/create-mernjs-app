<?php
defined( 'ABSPATH' ) || exit;
/**
 * Color Settings
 *
 * @package Simple Days
 */

$wp_customize->add_section('simple_days_custom_color_skin', array(
  'title'    => esc_html__('Skin', 'simple-days'),
  'panel'    => 'simple_days_custom_colors',
));

$wp_customize->add_setting( 'simple_days_skin_style',array(
  'default'    => 'none',
  'sanitize_callback' => 'simple_days_sanitize_select',
));
$wp_customize->add_control( 'simple_days_skin_style',array(
  'label'   => esc_html__( 'Skins', 'simple-days'),
  'description' => esc_html__('You can easily change color', 'simple-days'),
  'section' => 'simple_days_custom_color_skin',
  'type' => 'select',
  'choices' => array(
   'none' => 'none',
   'red_orange' => esc_html__('Red Orange', 'simple-days'),
   'orange' => esc_html__('Orange', 'simple-days'),
   'rose_peche' => esc_html__('Rose Peche', 'simple-days'),
   'grape_juice' => esc_html__('Grape Juice', 'simple-days'),
   'blue_yellow' => esc_html__('Blue Yellow', 'simple-days'),
   'blue_ocean' => esc_html__('Blue Ocean', 'simple-days'),
   'petrole' => esc_html__('Petrole', 'simple-days'),
   'apple_green' => esc_html__('Apple Green', 'simple-days'),
   'moss_green' => esc_html__('Moss Green', 'simple-days'),
   'yellow_mustard' => esc_html__('Yellow Mustard', 'simple-days'),
   'cinnamon' => esc_html__('Cinnamon', 'simple-days'),
   'brown_bread' => esc_html__('Brown Bread', 'simple-days'),
   'gray_horse' => esc_html__('Gray Horse', 'simple-days'),
   'black_coffee' => esc_html__('Black Coffee', 'simple-days'),
 ),
));
$wp_customize->add_setting( 'simple_days_skin_style_random',array(
  'default'    => false,
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( 'simple_days_skin_style_random',array(
  'label'   => esc_html__( 'Selects skins randomly at access', 'simple-days'),
  'section' => 'simple_days_custom_color_skin',
  'type' => 'checkbox',
));








$customize_color_section = array();
$customize_color = array();


$customize_color_slug = 'simple_days_custom_color_whole_site';
  //サイト全体
$customize_color_section[] = array(
  'slug' => $customize_color_slug,
  'title' => esc_html__('Site', 'simple-days'),
);

  //font Color
$customize_color[$customize_color_slug][] = array(
  'slug' => 'simple_days_font_color',
  'default' => '',
  'label' => esc_html__( 'Font Color', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;555'),
);
  //background Color
$customize_color[$customize_color_slug][] = array(
  'slug' => 'simple_days_background_color',
  'default' => '',
  'label' => esc_html__( 'Background Color', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;fafafa'),
);
  //Link Color
$customize_color[$customize_color_slug][] = array(
  'slug' => 'link_textcolor',
  'default' => '',
  'label' => esc_html__( 'Link Color', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;07a'),
);
  //Link Hover Color
$customize_color[$customize_color_slug][] = array(
  'slug' => 'link_hover_color',
  'default' => '',
  'label' => esc_html__( 'Link Hover Color', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;222'),
);

  //search submit Color
$customize_color[$customize_color_slug][] = array(
  'slug' => 'search_submit_color',
  'default' => '',
  'label' => esc_html__( 'Search button Color', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;fff'),
);

  //search submit bg Color
$customize_color[$customize_color_slug][] = array(
  'slug' => 'search_submit_bg_color',
  'default' => '',
  'label' => esc_html__( 'Search button background color', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;333'),
);

  //search submit hover Color
$customize_color[$customize_color_slug][] = array(
  'slug' => 'search_submit_hover_color',
  'default' => '',
  'label' => esc_html__( 'Search button hover color', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;fff'),
);

  //search submit bg hover Color
$customize_color[$customize_color_slug][] = array(
  'slug' => 'search_submit_bg_hover_color',
  'default' => '',
  'label' => esc_html__( 'Search button background hover color', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;333'),
);

  //Submit Color
$customize_color[$customize_color_slug][] = array(
  'slug' => 'submit_color',
  'default' => '',
  'label' => esc_html__( 'Submit button Color', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;fff'),
);

  //Submit bg Color
$customize_color[$customize_color_slug][] = array(
  'slug' => 'submit_bg_color',
  'default' => '',
  'label' => esc_html__( 'Submit button background color', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;333'),
);

  //Submit hover Color
$customize_color[$customize_color_slug][] = array(
  'slug' => 'submit_hover_color',
  'default' => '',
  'label' => esc_html__( 'Submit button hover color', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;fff'),
);

  //Submit bg hover Color
$customize_color[$customize_color_slug][] = array(
  'slug' => 'submit_bg_hover_color',
  'default' => '',
  'label' => esc_html__( 'Submit button background hover color', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;333'),
);

$customize_color_slug = 'simple_days_custom_color_header';
  //ヘッダー
$customize_color_section[] = array(
  'slug' => $customize_color_slug,
  'title' => esc_html__('Header', 'simple-days'),
);
  //Blog Title Color
$customize_color[$customize_color_slug][] = array(
  'slug' => 'blog_name',
  'default' => '',
  'label' => esc_html__( 'Site Title', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;07a'),
);
  //tagline Color
$customize_color[$customize_color_slug][] = array(
  'slug' => 'tagline_color',
  'default' => '',
  'label' => esc_html__( 'Tagline color', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;555'),
);
  //Blog Header Color
$customize_color[$customize_color_slug][] = array(
  'slug' => 'header_color',
  'default' => '',
  'label' => esc_html__( 'Header background color', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;fff'),
);
  //Blog Sub Menu BG Color
$customize_color[$customize_color_slug][] = array(
  'slug' => 'sub_menu_bg_color',
  'default' => '',
  'label' => esc_html__( 'Sub Menu background color', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;f1f1f1'),
);
  //Blog Sub Menu Link Color
$customize_color[$customize_color_slug][] = array(
  'slug' => 'sub_menu_link_color',
  'default' => '',
  'label' => esc_html__( 'Sub Menu link color', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;07a'),
);
  //Blog Sub Menu Link hover Color
$customize_color[$customize_color_slug][] = array(
  'slug' => 'sub_menu_link_hover_color',
  'default' => '',
  'label' => esc_html__( 'Sub Menu link hover color', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;222'),
);
  //Blog Over Header Color
$customize_color[$customize_color_slug][] = array(
  'slug' => 'oh_wrap_bg_color',
  'default' => '',
  'label' => esc_html__( 'Over Header background color', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;33363b'),
);
  //Humberger Color
$customize_color[$customize_color_slug][] = array(
  'slug' => 'humberger_menu_color',
  'default' => '',
  'label' => esc_html__( 'Humberger menu color', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;555'),
);
  //Search Color
$customize_color[$customize_color_slug][] = array(
  'slug' => 'search_menu_color',
  'default' => '',
  'label' => esc_html__( 'Search color', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;555'),
);



$customize_color_slug = 'simple_days_custom_color_post';
  //ヘッダー
$customize_color_section[] = array(
  'slug' => $customize_color_slug,
  'title' => esc_html__('Post & Page', 'simple-days'),
);
  //Main page color
$customize_color[$customize_color_slug][] = array(
  'slug' => 'main_content_bg_color',
  'default' => '',
  'label' => esc_html__( 'Main content background color', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;fff'),
);








$customize_color_slug = 'simple_days_custom_color_footer';
  //フッター
$customize_color_section[] = array(
  'slug' => $customize_color_slug,
  'title' => esc_html__('Footer', 'simple-days'),
);
  //Blog Footer Widget Color
$customize_color[$customize_color_slug][] = array(
  'slug' => 'footer_widget_color',
  'default' => '',
  'label' => esc_html__( 'Footer Widget background area color', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;474747'),
);
  //Footer Widget text color
$customize_color[$customize_color_slug][] = array(
  'slug' => 'footer_widget_textcolor',
  'default' => '',
  'label' => esc_html__( 'Footer Widget text color', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;d4d4d4'),
);
  //Footer Widget Link color
$customize_color[$customize_color_slug][] = array(
  'slug' => 'footer_widget_linkcolor',
  'default' => '',
  'label' => esc_html__( 'Footer Widget link color', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;fff'),
);
  //Footer Menu background color
$customize_color[$customize_color_slug][] = array(
  'slug' => 'f_menu_wrap_bg_color',
  'default' => '',
  'label' => esc_html__( 'Footer Menu background color', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;f1f1f1'),
);

  //Footer Menu Link Color
$customize_color[$customize_color_slug][] = array(
  'slug' => 'footer_menu_link_color',
  'default' => '',
  'label' => esc_html__( 'Footer Menu link color', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;07a'),
);
  //Footer Menu Link hover Color
$customize_color[$customize_color_slug][] = array(
  'slug' => 'footer_menu_link_hover_color',
  'default' => '',
  'label' => esc_html__( 'Footer Menu link hover color', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;222'),
);



  //Credit bg Color
$customize_color[$customize_color_slug][] = array(
  'slug' => 'footer_color',
  'default' => '',
  'label' => esc_html__( 'Credit background color', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;33363b'),
);

  //Credit Color
$customize_color[$customize_color_slug][] = array(
  'slug' => 'credit_color',
  'default' => '',
  'label' => esc_html__( 'Credit color', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;777'),
);

  //Credit Color
$customize_color[$customize_color_slug][] = array(
  'slug' => 'credit_link_color',
  'default' => '',
  'label' => esc_html__( 'Credit link color', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;fff'),
);


  //to TOP Color
$customize_color[$customize_color_slug][] = array(
  'slug' => 'to_top_color',
  'default' => '',
  'label' => esc_html__( 'to TOP color', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;777'),
);
  //to TOP bg Color
$customize_color[$customize_color_slug][] = array(
  'slug' => 'to_top_bg_color',
  'default' => '',
  'label' => esc_html__( 'to TOP Background color', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;ccc'),
);
  //to TOP Hover Color
$customize_color[$customize_color_slug][] = array(
  'slug' => 'to_top_hover_color',
  'default' => '',
  'label' => esc_html__( 'to TOP Hover color', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;fff'),
);
  //to TOP bg Hover Color
$customize_color[$customize_color_slug][] = array(
  'slug' => 'to_top_bg_hover_color',
  'default' => '',
  'label' => esc_html__( 'to TOP Hover Background color', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;ccc'),
);



$customize_color_slug = 'simple_days_custom_color_index';
  //インデックス
$customize_color_section[] = array(
  'slug' => $customize_color_slug,
  'title' => esc_html__('Index', 'simple-days'),
);

$customize_color[$customize_color_slug][] = array(
  'slug' => 'simple_days_index_card_bg_color',
  'default' => '',
  'label' => esc_html__( 'Background', 'simple-days' ),
  'description' => '',
);

$customize_color[$customize_color_slug][] = array(
  'slug' => 'simple_days_index_date_text_color',
  'default' => '',
  'label' => esc_html__( 'Text Color of Date', 'simple-days' ),
  'description' => '',
);
$customize_color[$customize_color_slug][] = array(
  'slug' => 'simple_days_index_date_bg_color',
  'default' => '',
  'label' => esc_html__( 'Background Color of Date', 'simple-days' ),
  'description' => '',
);
$customize_color[$customize_color_slug][] = array(
  'slug' => 'simple_days_index_date_separator_color',
  'default' => '',
  'label' => esc_html__( 'Separator Color of Date', 'simple-days' ),
  'description' => '',
);
$customize_color[$customize_color_slug][] = array(
  'slug' => 'simple_days_index_category_text_color',
  'default' => '',
  'label' => esc_html__( 'Text Color of Category', 'simple-days' ),
  'description' => '',
);
$customize_color[$customize_color_slug][] = array(
  'slug' => 'simple_days_index_category_border_color',
  'default' => '',
  'label' => esc_html__( 'Border Color of Category', 'simple-days' ),
  'description' => '',
);
$customize_color[$customize_color_slug][] = array(
  'slug' => 'simple_days_index_category_bg_color',
  'default' => '',
  'label' => esc_html__( 'Background Color of Category', 'simple-days' ),
  'description' => '',
);
$customize_color[$customize_color_slug][] = array(
  'slug' => 'simple_days_index_category_text_hover_color',
  'default' => '',
  'label' => esc_html__( 'Text Hover Color of Category', 'simple-days' ),
  'description' => '',
);
$customize_color[$customize_color_slug][] = array(
  'slug' => 'simple_days_index_category_border_hover_color',
  'default' => '',
  'label' => esc_html__( 'Border Hover Color of Category', 'simple-days' ),
  'description' => '',
);
$customize_color[$customize_color_slug][] = array(
  'slug' => 'simple_days_index_category_bg_hover_color',
  'default' => '',
  'label' => esc_html__( 'Background Hover Color of Category', 'simple-days' ),
  'description' => '',
);
$customize_color[$customize_color_slug][] = array(
  'slug' => 'simple_days_index_read_more_text_color',
  'default' => '',
  'label' => esc_html__( 'Text Color of Read More', 'simple-days' ),
  'description' => '',
);
$customize_color[$customize_color_slug][] = array(
  'slug' => 'simple_days_index_read_more_border_color',
  'default' => '',
  'label' => esc_html__( 'Border Color of Read More', 'simple-days' ),
  'description' => '',
);
$customize_color[$customize_color_slug][] = array(
  'slug' => 'simple_days_index_read_more_bg_color',
  'default' => '',
  'label' => esc_html__( 'Background Color of Read More', 'simple-days' ),
  'description' => '',
);
$customize_color[$customize_color_slug][] = array(
  'slug' => 'simple_days_index_read_more_text_hover_color',
  'default' => '',
  'label' => esc_html__( 'Text Hover Color of Read More', 'simple-days' ),
  'description' => '',
);
$customize_color[$customize_color_slug][] = array(
  'slug' => 'simple_days_index_read_more_border_hover_color',
  'default' => '',
  'label' => esc_html__( 'Border Hover Color of Read More', 'simple-days' ),
  'description' => '',
);
$customize_color[$customize_color_slug][] = array(
  'slug' => 'simple_days_index_read_more_bg_hover_color',
  'default' => '',
  'label' => esc_html__( 'Background Hover Color of Read More', 'simple-days' ),
  'description' => '',
);

$customize_color_slug = 'simple_days_custom_color_header_menu';
  //インデックス
$customize_color_section[] = array(
  'slug' => $customize_color_slug,
  'title' => esc_html__('Header menu', 'simple-days'),
);

  //Blog Header Menu BG Color
$customize_color[$customize_color_slug][] = array(
  'slug' => 'header_nav_h2_bg_color',
  'default' => '',
  'label' => esc_html__( 'Header Menu background color ( when Two rows )', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;f1f1f1'),
);

$customize_color[$customize_color_slug][] = array(
  'slug' => 'header_menu_bg_color',
  'default' => '',
  'label' => esc_html__( 'Background color of header menu link', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;fff'),
);
$customize_color[$customize_color_slug][] = array(
  'slug' => 'header_menu_bg_color_hover',
  'default' => '',
  'label' => esc_html__( 'Background hover color of header menu link', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;fff'),
);

$customize_color[$customize_color_slug][] = array(
  'slug' => 'header_menu_font_color',
  'default' => '',
  'label' => esc_html__( 'Font color of header menu link', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;07a'),
);
$customize_color[$customize_color_slug][] = array(
  'slug' => 'header_menu_font_color_hover',
  'default' => '',
  'label' => esc_html__( 'Font hover color of header menu link', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;222'),
);

$customize_color[$customize_color_slug][] = array(
  'slug' => 'header_menu_children_bg_color',
  'default' => '',
  'label' => esc_html__( 'Background color of header children menu link', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;fff'),
);
$customize_color[$customize_color_slug][] = array(
  'slug' => 'header_menu_children_bg_color_hover',
  'default' => '',
  'label' => esc_html__( 'Background hover color of header children menu link', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;222'),
);

$customize_color[$customize_color_slug][] = array(
  'slug' => 'header_menu_children_font_color',
  'default' => '',
  'label' => esc_html__( 'Font color of header children menu link', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;07a'),
);
$customize_color[$customize_color_slug][] = array(
  'slug' => 'header_menu_children_font_color_hover',
  'default' => '',
  'label' => esc_html__( 'Font hover color of header children menu link', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;fff'),
);

/*
$customize_color[$customize_color_slug][] = array(
  'slug' => 'header_menu_children_triangle_color',
  'default' => '',
  'label' => esc_html__( 'Top of children menu triangle', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;ccc'),
);

$customize_color[$customize_color_slug][] = array(
  'slug' => 'header_menu_grandchild_triangle_color',
  'default' => '',
  'label' => esc_html__( 'To grandchild menu triangle', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;333'),
);
*/
$customize_color_slug = 'simple_days_custom_color_yahman_addons_pp_rank';
  //YAHMAN Add-ons
$customize_color_section[] = array(
  'slug' => $customize_color_slug,
  'title' => esc_html__('YAHMAN Add-ons for Ranking', 'simple-days'),
);

  //Popular posts #4
$customize_color[$customize_color_slug][] = array(
  'slug' => 'yahman_addons_pp_rank',
  'default' => '',
  'label' => esc_html__( 'Popular post ranking', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('rgba(0,0,0,0.6)'),
);

  //Popular posts #1
$customize_color[$customize_color_slug][] = array(
  'slug' => 'yahman_addons_pp_rank1',
  'default' => '',
  'label' => esc_html__( 'Popular post ranking #1', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('rgba(242,133,0,0.8)'),
);
  //Popular posts #2
$customize_color[$customize_color_slug][] = array(
  'slug' => 'yahman_addons_pp_rank2',
  'default' => '',
  'label' => esc_html__( 'Popular post ranking #2', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('rgba(115,134,120,0.8)'),
);
  //Popular posts #3
$customize_color[$customize_color_slug][] = array(
  'slug' => 'yahman_addons_pp_rank3',
  'default' => '',
  'label' => esc_html__( 'Popular post ranking #3', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('rgba(123,63,0,0.8)'),
);

$customize_color[$customize_color_slug][] = array(
  'slug' => 'yahman_addons_pp_rank_font_color',
  'default' => '',
  'label' => esc_html__( 'Popular post ranking font color', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('&#35;fff'),
);


foreach( $customize_color_section as $section_value ) {
  $wp_customize->add_section($section_value['slug'], array(
    'title'    => $section_value['title'],
    'panel'    => 'simple_days_custom_colors',
  ));

  foreach( $customize_color[$section_value['slug']] as $setting_value ) {
    $wp_customize->add_setting( $setting_value['slug'],array(
      'default'           => $setting_value['default'],
      'sanitize_callback' => 'simple_days_sanitize_rgba_color',
      'transport' => 'postMessage',
    ));

    $wp_customize->add_control( new Simple_Days_Color_Alpha_Custom_Control($wp_customize,
      $setting_value['slug'],array(
        'label'      => $setting_value['label'],
        'description' => $setting_value['description'],
        'section'    => $section_value['slug'],
      )));

  }
}
