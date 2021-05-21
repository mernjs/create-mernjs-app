<?php
defined( 'ABSPATH' ) || exit;

define( 'SIMPLE_DAYS_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'SIMPLE_DAYS_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );
define( 'SIMPLE_DAYS_VERSION', wp_get_theme(get_template())->Version );

require_once SIMPLE_DAYS_THEME_DIR . 'inc/template-tags.php';

if ( ! function_exists( 'simple_days_setup' ) ) :
  function simple_days_setup() {
    
    require_once SIMPLE_DAYS_THEME_DIR . 'inc/lib/after_setup_theme.php';
  }
endif;
add_action( 'after_setup_theme', 'simple_days_setup' );


if ( ! function_exists( 'simple_days_widgets_init' ) ) :
  
  function simple_days_widgets_init() {
    require_once SIMPLE_DAYS_THEME_DIR . 'inc/widgets.php';
  }
endif;
add_action( 'widgets_init', 'simple_days_widgets_init' );



if ( ! function_exists( 'simple_days_menus' ) ) :
  function simple_days_menus() {
    register_nav_menus( array(
      'primary'  => __( 'Header Menu', 'simple-days' ),
      'secondary' => __( 'Footer Menu', 'simple-days' ),
      'sub'   => __( 'Header Sub Menu', 'simple-days' ),
    ) );
  }
endif;
add_action( 'init', 'simple_days_menus' );

add_action( 'wp', 'simple_days_decision_sidebar');


if ( ! function_exists( 'simple_days_decision_sidebar' ) ) :
  
  function simple_days_decision_sidebar() {

    
    $sidebar['right'] = false;
    $sidebar['left'] = false;


    if( is_archive() ){
      if( is_author() ){
        if( get_theme_mod( 'simple_days_is_author_no_sidebar' , false ) )
          return simple_days_define_sidebar($sidebar);
      }else if( is_category() ){
        if( get_theme_mod( 'simple_days_is_category_no_sidebar' , false ) )
          return simple_days_define_sidebar($sidebar);
      }else if( is_tag() ){
        if( get_theme_mod( 'simple_days_is_tag_no_sidebar' , false ) )
          return simple_days_define_sidebar($sidebar);
      }else if( is_date() ){
        if( get_theme_mod( 'simple_days_is_date_no_sidebar' , false ) )
          return simple_days_define_sidebar($sidebar);
      }else if( is_search() ){
        if( get_theme_mod( 'simple_days_is_search_no_sidebar' , false ) )
          return simple_days_define_sidebar($sidebar);
      }else if( is_404() ){
        if( get_theme_mod( 'simple_days_is_404_no_sidebar' , false ) )
          return simple_days_define_sidebar($sidebar);
      }
    }

    $one_column_post = explode(',', get_theme_mod( 'simple_days_one_column_post',''));
    if( isset($GLOBALS['post']->ID) && in_array($GLOBALS['post']->ID, $one_column_post) ) {
      return simple_days_define_sidebar($sidebar);
    }


    if( is_active_sidebar( 'sidebar-1' ) || is_active_sidebar( 'sidebar-right-fixed' ) ){
      $sidebar['right']  = true;
    }
    if( is_active_sidebar( 'sidebar-2' ) || is_active_sidebar( 'sidebar-left-fixed' ) ){
      $sidebar['left'] = true;
    }


    return simple_days_define_sidebar($sidebar);

  }
endif;

function simple_days_define_sidebar($sidebar) {
  define( 'SIMPLE_DAYS_RIGHT_SIDEBAR', $sidebar['right'] );
  define( 'SIMPLE_DAYS_LEFT_SIDEBAR', $sidebar['left'] );
}

if ( ! function_exists( 'simple_days_content_width' ) ) :
  function simple_days_content_width() {
    //if(SIMPLE_DAYS_SIDEBAR){
      //$GLOBALS['content_width'] = apply_filters( 'simple_days_content_width', 678 );
   // }else{
    $GLOBALS['content_width'] = apply_filters( 'simple_days_content_width', 856 );
    //}
  }
endif;
add_action( 'template_redirect', 'simple_days_content_width', 0 );

if ( ! function_exists( 'simple_days_load_stylesheets' ) ) :
  function simple_days_load_stylesheets(){
    if (!function_exists('yahman_addons_amp_head')){
      require_once SIMPLE_DAYS_THEME_DIR . 'inc/lib/required_stylesheets.php' ;
      simple_days_required_stylesheets();
    }
  }
endif;

add_action('wp_enqueue_scripts','simple_days_load_stylesheets');



if ( ! function_exists( 'simple_days_block_front_styles' ) ) :
  function simple_days_block_front_styles() {

    if ( function_exists( 'has_block' ) ){

      if( has_blocks() ){

        if ( !defined("SIMPLE_DAYS_RIGHT_SIDEBAR") ) define( 'SIMPLE_DAYS_RIGHT_SIDEBAR', false );
        if ( !defined("SIMPLE_DAYS_LEFT_SIDEBAR") ) define( 'SIMPLE_DAYS_LEFT_SIDEBAR', false );


        $one_column_post = explode(',', get_theme_mod( 'simple_days_one_column_post',''));

        wp_enqueue_style( 'simple_days_block', SIMPLE_DAYS_THEME_URI . 'assets/css/block.min.css',array( 'simple_days_style' ) );

        if( (!SIMPLE_DAYS_RIGHT_SIDEBAR && !SIMPLE_DAYS_LEFT_SIDEBAR) || is_page_template( 'templates/fullwidth.php' ) || is_page_template( 'templates/without_sidebar.php' ) ){
          wp_enqueue_style( 'simple_days_block_one_column', SIMPLE_DAYS_THEME_URI . 'assets/css/block_one_column.min.css',array( 'simple_days_block' ) );
        }

        //if (  has_block( 'core-embed/vimeo' ) || has_block( 'core-embed/youtube') || has_block( 'video' ) ) {
        
          //wp_enqueue_script( 'fitvids',SIMPLE_DAYS_THEME_URI . 'assets/js/gutenberg/jquery.fitvids.js', array('jquery'), null, true);
          //wp_add_inline_script( 'fitvids',  'jQuery(document).ready(function(){jQuery(".wp-block-embed-vimeo").fitVids();});');
        //}
      }
    }
  }
endif;

add_action( 'enqueue_block_assets', 'simple_days_block_front_styles' );




if ( ! function_exists( 'simple_days_footer_stylesheets' ) ) :
  function simple_days_footer_stylesheets() {
    if (!function_exists('yahman_addons_amp_head')){
      get_template_part( 'inc/lib/footer_stylesheets' );
      
      get_template_part( 'inc/lib/customize_fonts' );
      simple_days_customize_fonts_enqueue();


    }
  }
endif;

add_action( 'wp_footer', 'simple_days_footer_stylesheets' );


if ( is_admin() ){

  require_once SIMPLE_DAYS_THEME_DIR . 'inc/lib/admin_page.php' ;

}else{

  require_once SIMPLE_DAYS_THEME_DIR . 'inc/extra-content.php';

}



if( is_customize_preview() ) {

    // Setup the Theme Customizer settings and controls...
  require_once SIMPLE_DAYS_THEME_DIR . 'inc/customizer/customizer.php';

  require_once SIMPLE_DAYS_THEME_DIR . 'inc/customizer/starter_content.php';
  add_theme_support( 'starter-content', simple_days_get_starter_content() );
}







