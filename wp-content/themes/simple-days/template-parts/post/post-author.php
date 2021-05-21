<?php
/**
 *
 * @package Simple Days
 */


function simple_days_author_post(){
  //if(get_theme_mod( 'simple_days_posts_author_position','right') == 'none') return;
  $display_data['avatar'] = get_theme_mod( 'simple_days_posts_author_icon_avatar',false);
  $display_data['icon'] = get_theme_mod( 'simple_days_posts_author_icon','fa-user');
  $display_data['position'] = get_theme_mod( 'simple_days_posts_author_position','right');
  $display_data['type'] = 'post';
  simple_days_author_output($display_data);
}

function simple_days_author_page(){
  //if(get_theme_mod( 'simple_days_page_author_position','none') == 'none') return;
  $display_data['avatar'] = get_theme_mod( 'simple_days_page_author_icon_avatar',false);
  $display_data['icon'] = get_theme_mod( 'simple_days_page_author_icon','fa-user');
  $display_data['position'] = get_theme_mod( 'simple_days_page_author_position','right');
  $display_data['type'] = 'page';
  simple_days_author_output($display_data);
}

function simple_days_author_output($display_data){
  $display_data['nickname'] = apply_filters( 'yahman_themes_author_nickname', get_the_author_meta('nickname') );
  $display_data['ID'] = get_the_author_meta( 'ID' );

  $position = '';
  if( $display_data['position'] === 'right' ){
    $position = ' ta_r';
  }elseif( $display_data['position'] === 'center' ){
    $position = ' ta_c';
  }

  echo '<div class="'.$display_data['type'].'_author post_item mb_L'.$position.'">';
  if($display_data['avatar']){
    echo '<div class="dib"><img src="' . esc_url( get_avatar_url( $display_data['ID'] , array("size"=>32 )) ) . '" width="32" height="32" class="vam br50" alt="'.esc_attr($display_data['nickname']).'" /></div>';
  }else{
    echo '<i class="fa '.esc_attr($display_data['icon']).'" aria-hidden="true"></i>';
  }
  echo'&nbsp;<a href="'.esc_url(get_author_posts_url( $display_data['ID'] )).'">'. esc_html($display_data['nickname']) .'</a></div>';
}


