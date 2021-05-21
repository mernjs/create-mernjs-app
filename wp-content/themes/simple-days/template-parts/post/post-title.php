<?php
/**
 *
 * @package Simple Days
 */


function simple_days_title_post($post_title_effects){
  if(get_theme_mod( 'simple_days_posts_thumbnail',true) && has_post_thumbnail() && get_theme_mod( 'simple_days_posts_title_over_thumbnail',false)) return;

  simple_days_title_output($post_title_effects);
}

function simple_days_title_page($post_title_effects){
  if(get_theme_mod( 'simple_days_page_thumbnail',true) && has_post_thumbnail() && get_theme_mod( 'simple_days_page_title_over_thumbnail',false)) return;

  simple_days_title_output($post_title_effects);
}

function simple_days_title_output($post_title_effects){

  echo '<div class="post_item mb_L"><h1 class="post_title'.esc_attr($post_title_effects).'">'. get_the_title().'</h1></div>';

}


