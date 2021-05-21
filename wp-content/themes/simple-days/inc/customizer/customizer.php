<?php
defined( 'ABSPATH' ) || exit;

class Simple_Days_Customize {

	public static function register ( $wp_customize ) {
    //delete header textcolor control
		$wp_customize->remove_control("header_textcolor");
		$wp_customize->remove_control("background_color");
		$wp_customize->remove_control("display_header_text");

		$wp_customize->register_control_type( 'Simple_Days_Image_Select_Control' );

		$wp_customize->get_control( 'header_image' )->section = 'simple_days_header_image';
		$wp_customize->get_control( 'custom_logo' )->section = 'simple_days_header_logo_image';
		$wp_customize->get_section('title_tagline')->panel = 'simple_days_site_setting';
		$wp_customize->get_section('background_image')->panel = 'simple_days_site_setting';
		$wp_customize->get_section('static_front_page')->panel = 'simple_days_site_setting';


		$heading_border_style = array(
			'none' => esc_html__( 'none', 'simple-days' ),
			'solid' => esc_html__( 'Solid', 'simple-days' ),
			'double' => esc_html__( 'Double', 'simple-days' ),
			'groove' => esc_html__( 'Groove', 'simple-days' ),
			'ridge' => esc_html__( 'Ridge', 'simple-days' ),
			'inset' => esc_html__( 'Inset', 'simple-days' ),
			'outset' => esc_html__( 'Outset', 'simple-days' ),
			'dashed' => esc_html__( 'Dashed', 'simple-days' ),
			'dotted' => esc_html__( 'Dotted', 'simple-days' ),
		);
		$border_angle = array(
			'top' => esc_html_x('top','post_heading','simple-days') ,
			'right' => esc_html_x('right','post_heading','simple-days') ,
			'bottom' => esc_html_x('bottom','post_heading','simple-days') ,
			'left' => esc_html_x('left','post_heading','simple-days'),
		);

		require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/sanitize.php';

		require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/custom_font.php';

		require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/custom_gradient.php';
		
		require_once SIMPLE_DAYS_THEME_DIR . 'template-parts/post-sort_order.php';

		
		$wp_customize->add_panel( 'simple_days_site_setting', array(
			'priority'    => 0,
			'title'       => esc_html__('Site settings', 'simple-days'),
		));
		require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-site.php';
		require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-google_fonts.php';

		$wp_customize->add_panel('simple_days_custom_colors', array(
			'title'         => esc_html__('Colors', 'simple-days'),
			'priority'      => 0
		));
		require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-colors.php';

		$wp_customize->add_panel('simple_days_custom_color_gradient', array(
			'title'         => esc_html__('Color Gradient', 'simple-days'),
			'priority'      => 0
		));
		require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-color_gradient.php';

		
		$wp_customize->add_panel( 'simple_days_header_setting', array(
			'priority'    => 0,
			'title'       => esc_html__('Header', 'simple-days'),
		));
		require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-header.php';
		require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-alert_box.php';

		
		$wp_customize->add_panel( 'simple_days_footer_setting', array(
			'priority'    => 0,
			'title'       => esc_html__('Footer', 'simple-days'),
		));
		require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-footer.php';


		
		$wp_customize->add_section('simple_days_sidebar_setting',array(
			'title'       => esc_html__('Sidebar', 'simple-days'),
			'priority'   => 0,
		));
		require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-sidebar.php';



		
		$wp_customize->add_panel( 'simple_days_index_setting', array(
			'priority'    => 1,
			'title'       => esc_html__('Index', 'simple-days'),
		));
		require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-index.php';

		
		$wp_customize->add_panel( 'simple_days_posts_setting', array(
			'priority'    => 1,
			'title'       => esc_html__('Posts', 'simple-days'),
		));
		require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-posts.php';


		
		$wp_customize->add_panel( 'simple_days_pages_setting', array(
			'priority'    => 1,
			'title'       => esc_html__('Pages', 'simple-days'),
		));
		require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-pages.php';

		
		$wp_customize->add_panel( 'simple_days_yahman_add_ons_setting', array(
			'priority'    => 2,
			'title'       => esc_html__('YAHMAN Add-ons', 'simple-days'),
		));
		require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-add_ons.php';
		
		$wp_customize->add_panel( 'simple_days_yahman_plugin_setting', array(
			'priority'    => 3,
			'title'       => esc_html__('Plugin by YAHMAN', 'simple-days'),
		));




		require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-menu_icon.php';


		require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-widget_title.php';

















































  // Add Settings and Controls for Option.
		$wp_customize->add_section('simple_days_yahman_addons',array(
			'title' => esc_html__('YAHMAN Add-ons', 'simple-days'),
			'panel' => 'simple_days_yahman_plugin_setting',
		));


		$wp_customize->add_setting( 'simple_days_page_install_yahman_addons', array(
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control( new Simple_Days_plugin_install_Custom_Content( $wp_customize, 'simple_days_page_install_yahman_addons', array(
			'section' => 'simple_days_yahman_addons',
			
			'label' => sprintf(esc_html__('Install Plugin [ %s ]', 'simple-days'), esc_html__( 'YAHMAN Add-ons', 'simple-days')),
			'plugin' => array(
				'name' => esc_html__('YAHMAN Add-ons', 'simple-days'),
				'dir' => 'yahman-add-ons',
				'filename' => 'yahman-add-ons.php',
			),
		)));

		
  // Add Settings and Controls for Option.
		$wp_customize->add_section('simple_days_pwcat',array(
			'title' => esc_html__('Pages with category and tag', 'simple-days'),
			'panel' => 'simple_days_yahman_plugin_setting',
		));


		$wp_customize->add_setting( 'simple_days_page_install_pwcat_2', array(
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control( new Simple_Days_plugin_install_Custom_Content( $wp_customize, 'simple_days_page_install_pwcat_2', array(
			'section' => 'simple_days_pwcat',
			
			'label' => sprintf(esc_html__('Install Plugin [ %s ]', 'simple-days'), esc_html__( 'Pages with category and tag', 'simple-days')),
			'plugin' => array(
				'name' => esc_html__('Pages with category and tag', 'simple-days'),
				'dir' => 'pages-with-category-and-tag',
				'filename' => 'pages-with-category-and-tag.php',
			),
		)));




		
  // Add Settings and Controls for Option.
		$wp_customize->add_section('simple_days_word_balloon',array(
			'title' => esc_html__('Word Balloon', 'simple-days'),
			'panel' => 'simple_days_yahman_plugin_setting',
		));

/*
  $wp_customize->add_setting( 'simple_days_page_word_balloon_install', array(
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'simple_days_page_word_balloon_install', array(
    'section' => 'simple_days_word_balloon',
    'label' => esc_html__( 'Install Word Balloon Plugins', 'simple-days' ),
    'content' => '<a href="'. esc_url( admin_url( 'plugin-install.php?tab=search&type=author&s=yahman' ) ).'" class="button button-secondary">'.esc_html__( 'Install Plugins', 'simple-days' ).'</a>',
    //'description' => esc_html__( 'Optional: Example Description.', 'simple-days' ),
  )));
*/

  $wp_customize->add_setting( 'simple_days_page_word_balloon_install', array(
  	'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( new Simple_Days_plugin_install_Custom_Content( $wp_customize, 'simple_days_page_word_balloon_install', array(
  	'section' => 'simple_days_word_balloon',
  	
  	'label' => sprintf(esc_html__('Install Plugin [ %s ]', 'simple-days'), esc_html__( 'Word Balloon', 'simple-days')),
  	'plugin' => array(
  		'name' => esc_html__('Word Balloon', 'simple-days'),
  		'dir' => 'word-balloon',
  		'filename' => 'word-balloon.php',
  	),
  	
  		
  		
  		
  		
    //'description' => esc_html__( 'Optional: Example Description.', 'simple-days' ),
  	)));


		$wp_customize->add_section('simple_days_point_maker',array(
			'title' => esc_html__('Point Maker', 'simple-days'),
			'panel' => 'simple_days_yahman_plugin_setting',
		));

  $wp_customize->add_setting( 'simple_days_page_point_maker_install', array(
  	'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( new Simple_Days_plugin_install_Custom_Content( $wp_customize, 'simple_days_page_point_maker_install', array(
  	'section' => 'simple_days_point_maker',
  	
  	'label' => sprintf(esc_html__('Install Plugin [ %s ]', 'simple-days'), esc_html__( 'Point Maker', 'simple-days')),
  	'plugin' => array(
  		'name' => esc_html__('Point Maker', 'simple-days'),
  		'dir' => 'point-maker',
  		'filename' => 'point-maker.php',
  	),

  	)));





  $wp_customize->add_section( 'simple_days_rating', array(
  	'priority'    => 9999999999999999999,
  	'title'       => esc_html__('Rating', 'simple-days'),
  ));

  $wp_customize->add_setting( 'simple_days_rating_info', array(
  	'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'simple_days_rating_info', array(
  	'section' => 'simple_days_rating',
  	'label' => esc_html__( 'Please rating', 'simple-days' ),

  	'content' => '<p>'.esc_html__( 'Do you enjoy Simple Days?' , 'simple-days' ).'</p><p>'.esc_html__( 'If you like Simple Days please write a 5-star rating.' , 'simple-days' ).'</p><p>'.esc_html__( 'Thank you!' , 'simple-days' ).'</p><br />'.'<a class="button button-primary" href="https://wordpress.org/support/theme/simple-days/reviews/?filter=5#new-post" target="_blank">'.esc_html__( 'Click here to rate Simple Days', 'simple-days' ).'</a>',
  	'description' => '',
  )));










  
      /*if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'blogname', array(
        'selector' => '.site_title a',
        // PHP 5.2 or earlier 'render_callback' => function() { bloginfo( 'name' ); },
        'render_callback' => 'simple_days_customize_partial_blogname',
        ) );
    }*/


    
    $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';





    }// end of public static function register

    function simple_days_customize_partial_blogname() {
    	bloginfo( 'name' );
    }

    public static function live_preview() {
    	wp_enqueue_script(
              'simple_days_customizer_script', // Give the script a unique ID
              SIMPLE_DAYS_THEME_URI . 'assets/js/customizer/customizer.min.js', // Define the path to the JS file
              array( 'jquery', 'customize-preview' ), // Define dependencies
              null, // Define a version (optional)
              true // Specify whether to put in footer (leave this true)
          );



    }

    public static function Simple_Days_preview_style() {
    	get_template_part( 'inc/customizer/preview_style');
   }//end of public static function header_output



   public static function Simple_Days_build_css() {
   	get_template_part( 'inc/build_style');
   	simple_days_build_style();
   }

   public static function simple_days_customizer_print_scripts_styles() {
   	get_template_part('inc/customizer/customizer-script');
   }
}




add_action( 'customize_register' , array( 'Simple_Days_Customize' , 'register' ) );


if ( is_customize_preview() ) {
	add_action( 'wp_head' , array( 'Simple_Days_Customize' , 'Simple_Days_preview_style' ) );
	add_action( 'wp_footer', array( 'Simple_Days_Customize' , 'simple_days_customizer_print_scripts_styles' ) ,999999999999999 );
}


add_action( 'customize_preview_init' , array( 'Simple_Days_Customize' , 'live_preview' ) );


add_action( 'customize_save_after', array( 'Simple_Days_Customize' , 'Simple_Days_build_css' ) );

if ( class_exists( 'WP_Customize_Control' ) ) {

	require_once SIMPLE_DAYS_THEME_DIR . 'inc/customizer/control-sortable.php';


	require_once SIMPLE_DAYS_THEME_DIR . 'inc/customizer/control-html_text.php';


	require_once SIMPLE_DAYS_THEME_DIR . 'inc/customizer/control-plugin_install.php';


	require_once SIMPLE_DAYS_THEME_DIR . 'inc/customizer/control-image_select.php';

	require_once SIMPLE_DAYS_THEME_DIR . 'inc/customizer/control-color_alpha.php';

}


if ( ! function_exists( 'simple_days_customizer_css' ) ) :
	
	function simple_days_customizer_css() {

		get_template_part( 'inc/customizer/customizer_css' );

	}
endif;
add_action( 'customize_controls_print_styles', 'simple_days_customizer_css' );

if ( ! function_exists( 'simple_days_customizer_script' ) ) :
	
	function simple_days_customizer_script() {

	}
endif;
add_action( 'customize_register', 'simple_days_customizer_script' );

if ( ! function_exists( 'simple_days_customize_preview' ) ) :
	function simple_days_customize_preview() {

	}
endif;
add_action( 'customize_preview_init', 'simple_days_customize_preview' );
