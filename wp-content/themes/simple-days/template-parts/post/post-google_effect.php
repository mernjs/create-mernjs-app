<?php
/**
 *
 * @package Simple Days
 */

function simple_days_google_post_title_effects() {
  if((get_theme_mod( 'simple_days_font_body_google_jp', 'none' ) != 'none' || get_theme_mod( 'simple_days_font_post_title_google_jp', 'none' ) != 'none' || get_theme_mod( 'simple_days_font_headings_google_jp', 'none' ) != 'none') && get_theme_mod( 'simple_days_font_site_title_google_jp_effects_2', 'none' ) != 'none'){

    $post_title_effects = ' font-effect-'.get_theme_mod( 'simple_days_font_site_title_google_jp_effects_2');

  }elseif((get_theme_mod( 'simple_days_font_body_google', 'none' ) != 'none' || get_theme_mod( 'simple_days_font_post_title_google', 'none' ) != 'none' || get_theme_mod( 'simple_days_font_headings_google', 'none' ) != 'none') && get_theme_mod( 'simple_days_font_site_title_google_effects_2', 'none' ) != 'none'){

    $post_title_effects = ' font-effect-'.get_theme_mod( 'simple_days_font_site_title_google_effects_2');

  }else{

    $post_title_effects = '';

  }

  return $post_title_effects;
}


