<?php
defined( 'ABSPATH' ) || exit;
/**
 *
 * @package Simple Days
 */


function simple_days_date_post(){
  //if(get_theme_mod( 'simple_days_posts_date_position','right') == 'none') return;
  $display_data['date'] = get_theme_mod( 'simple_days_posts_date_display','both');
  $display_data['position'] = get_theme_mod( 'simple_days_posts_date_position','right');
  $display_data['time'] = get_theme_mod( 'simple_days_posts_time_display' , false );
  $display_data['date_icon'] = get_theme_mod( 'simple_days_posts_date_icon' , 'fa-calendar-check-o' );
  $display_data['up_date_icon'] = get_theme_mod( 'simple_days_posts_up_date_icon' , 'fa-history' );
  $display_data['type'] = 'post';
  simple_days_date_output($display_data);
}

function simple_days_date_page(){
  //if(get_theme_mod( 'simple_days_page_date_position','none') == 'none') return;
  $display_data['date'] = get_theme_mod( 'simple_days_page_date_display','both');
  $display_data['position'] = get_theme_mod( 'simple_days_page_date_position','right');
  $display_data['time'] = get_theme_mod( 'simple_days_page_time_display' , false );
  $display_data['date_icon'] = get_theme_mod( 'simple_days_page_date_icon' , 'fa-calendar-check-o' );
  $display_data['up_date_icon'] = get_theme_mod( 'simple_days_page_up_date_icon' , 'fa-history' );
  $display_data['type'] = 'page';
  simple_days_date_output($display_data);
}

function simple_days_date_output($display_data){

  $position = '';
  if( $display_data['position'] === 'right' ){
    $position = ' jc_fe';
  }elseif( $display_data['position'] === 'center' ){
    $position = ' jc_c';
  }

  echo '<div class="'.$display_data['type'].'_dates post_item f_box ai_c f_wrap mb_L fs14'.$position.'">';

  $date_display = true;
  $modified_display = false;

  if($display_data['date'] !== 'date' && get_the_modified_date('Ymd') > get_the_date('Ymd'))
    $modified_display = true;

  if ($display_data['date'] === 'update' && $modified_display )
    $date_display = false;

  if ($date_display){
    echo '<div>';
    echo '<span class="'.$display_data['type'].'_date"><i class="fa '.esc_attr($display_data['date_icon']).'" aria-hidden="true"></i> '.get_the_date().'</span>';
    if($display_data['time']){
      echo '<span class="'.$display_data['type'].'_time ml5">'.get_the_time().'</span>';
    }
    echo '</div>';
  }

  if ($modified_display){
    echo '<div class="ml10">';
    echo '<span class="'.$display_data['type'].'_updated"><i class="fa '.esc_attr($display_data['up_date_icon']).'" aria-hidden="true"></i> '.get_the_modified_date().'</span>';
    if($display_data['time']){
      echo '<span class="'.$display_data['type'].'_modified_time ml5">'.get_the_modified_time().'</span>';
    }
    echo '</div>';
  }

  echo '</div>';

}


