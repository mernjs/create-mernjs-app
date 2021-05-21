<?php
/**
 *
 * @package Simple Days
 */


function simple_days_thumbnail_post($format,$post_title_effects){
  if(!get_theme_mod( 'simple_days_posts_thumbnail',true)) return;
  if(get_theme_mod('simple_days_posts_full_width_thumbnail',false)) return;
  $title_over = get_theme_mod( 'simple_days_posts_title_over_thumbnail',false);
  $thumurl = wp_get_attachment_image_src (get_post_thumbnail_id (), get_theme_mod( 'simple_days_posts_thumbnail_size','full'));

  simple_days_thumbnail_output($format,$post_title_effects,$title_over,$thumurl);
}

function simple_days_thumbnail_page($format,$post_title_effects){
  if(!get_theme_mod( 'simple_days_page_thumbnail',true)) return;
  if(get_theme_mod('simple_days_page_full_width_thumbnail',false)) return;
  $title_over = get_theme_mod( 'simple_days_page_title_over_thumbnail',false);
  $thumurl = wp_get_attachment_image_src (get_post_thumbnail_id (), get_theme_mod( 'simple_days_page_thumbnail_size','full'));

  simple_days_thumbnail_output($format,$post_title_effects,$title_over,$thumurl);
}

function simple_days_thumbnail_output($format,$post_title_effects,$title_over,$thumurl){

  if($format == 'aside' || $format == 'link' || $format == 'status')$title_over = false;

  if($title_over){
    echo '<div class="post_item mb_L relative fit_content item_thum">';
    echo '<div class="thum_on_title absolute p10 f_box jc_c ai_c"><h1 class="thum_on_post_title'.esc_attr($post_title_effects).' fw8">'. get_the_title().'</h1></div>';
    echo '<figure class="on_thum fit_box_img_wrap">';
    echo '<img src="'.esc_url( $thumurl[0] ).'" width="'.esc_attr( $thumurl[1] ).'" height="'.esc_attr( $thumurl[2] ).'" />';
    echo '</figure>';


    echo '</div>';
  }else{
    echo '<figure class="post_thum fit_content item_thum post_item mb_L">';
    echo '<img src="'.esc_url( $thumurl[0] ).'" width="'.esc_attr( $thumurl[1] ).'" height="'.esc_attr( $thumurl[2] ).'" /></figure>';
  }
}


