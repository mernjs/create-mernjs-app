<?php
/**
 *
 * @package Simple Days
 */


if ( ! function_exists( 'simple_days_sort_order_base_post' ) ) :
  function simple_days_sort_order_base_post() {
    if(function_exists('yahman_addons_plugins_loaded')){
      return array(
       'breadcrumbs','title','date','author','pv','thumbnail','content','page_link','cta','share','author_profile','related','category','tag','pagenation','comment','widget_1','widget_2','widget_3','widget_4','widget_5',
     );
    }else{
      return array(
       'breadcrumbs','title','date','author','thumbnail','content','page_link','author_profile','category','tag','pagenation','comment','widget_1','widget_2','widget_3','widget_4','widget_5',
     );
    }

  }
endif;

if ( ! function_exists( 'simple_days_sort_order_base_page' ) ) :
  function simple_days_sort_order_base_page() {

    if(function_exists('yahman_addons_plugins_loaded')){
      return array(
       'breadcrumbs','title','date','author','pv','thumbnail','content','page_link','cta','share','author_profile','related','category','tag','comment','widget_1','widget_2','widget_3','widget_4','widget_5',
     );
    }else{
      return array(
       'breadcrumbs','title','date','author','thumbnail','content','page_link','author_profile','category','tag','comment','widget_1','widget_2','widget_3','widget_4','widget_5',
     );
    }

  }
endif;

if ( ! function_exists( 'simple_days_sort_order_diff_post' ) ) :

  function simple_days_sort_order_diff_post() {

    return array_diff( simple_days_sort_order_base_post() , get_theme_mod( 'simple_days_posts_sortable', simple_days_sort_order_base_post() ) );

  }

endif;

if ( ! function_exists( 'simple_days_sort_order_diff_page' ) ) :

  function simple_days_sort_order_diff_page() {

    return array_diff( simple_days_sort_order_base_page() , get_theme_mod( 'simple_days_pages_sortable' , simple_days_sort_order_default_base_page() ) );

  }

endif;


if ( ! function_exists( 'simple_days_sort_order_custom_post' ) ) :

  function simple_days_sort_order_custom_post() {

   return array_diff( get_theme_mod( 'simple_days_posts_sortable', simple_days_sort_order_base_post() ) , simple_days_sort_order_diff_post() );

 }

endif;

if ( ! function_exists( 'simple_days_sort_order_custom_page' ) ) :

  function simple_days_sort_order_custom_page() {

   return array_diff( get_theme_mod( 'simple_days_pages_sortable' , simple_days_sort_order_default_base_page() ) , simple_days_sort_order_diff_page() );

 }

endif;

if ( ! function_exists( 'simple_days_sort_order_default_base_page' ) ) :
  function simple_days_sort_order_default_base_page() {

    $base = array();

    foreach ( simple_days_sort_order_base_page() as $key => $value ){
      if($value !== 'author' && $value !== 'date' && $value !== 'author_profile' && $value !== 'comment'){
        $base[$key] = $value;
      }
    }

    return $base;

  }
endif;
