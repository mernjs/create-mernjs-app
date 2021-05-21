<?php
/**
 *
 * @package Simple Days
 */

function beliefmedia_mb_strimwidth($string, $start = 0, $width = 120, $trimmarker = '...') {
  $len = strlen(trim($string));
  $newstring = ( ($len > 120) && ($len != 0) ) ? rtrim(mb_strimwidth($string, $start, $width - strlen($trimmarker))) . $trimmarker : $string;
 return $newstring;
}

echo '<nav class="nav_link_box post_item mb_L f_box jc_sb fit_content">';

$prevpost = get_adjacent_post('', '', true); 
$nextpost = get_adjacent_post('', '', false); 

if ($prevpost) { 
  $thumurl = simple_days_get_thumbnail( $prevpost->ID , 'thumbnail' , $prevpost);
        //wp_get_attachment_image_src (get_post_thumbnail_id ($prevpost->ID,  true));

  echo '<a href="' . esc_url(get_permalink($prevpost->ID)) . '" title="' . get_the_title($prevpost->ID) . '" class="nav_link nav_link_l f_box f_col100 ai_c mb_L relative"><div class="nav_link_info absolute left0 t_15 m_s"><span class="p10 fs12"><i class="fa fa-angle-double-left" aria-hidden="true"></i> '.esc_html__( 'Previous Post', 'simple-days' ).'</span></div>';
  if ($thumurl['has_image']){
    echo '<div class="nav_link_thum">';
    echo '<img src="'.esc_url( $thumurl[0] ).'" width="100" height="100" />';
    echo '</div>';
  }
  echo '<div><p class="nav_link_title p10">' . esc_html(beliefmedia_mb_strimwidth(get_the_title($prevpost->ID), 0, 80, "...", 'UTF-8')) . '</p></div></a>';
}


if ( $nextpost ) { 
  $thumurl = simple_days_get_thumbnail( $nextpost->ID , 'thumbnail' , $nextpost);
        //$thumurl = wp_get_attachment_image_src (get_post_thumbnail_id ($nextpost->ID,  true));


  echo '<a href="' . esc_url(get_permalink($nextpost->ID)) . '" title="'. get_the_title($nextpost->ID) . '" class="nav_link f_box f_col100 ai_c f_row_r mb_L mla relative"><div class="nav_link_info absolute right0 t_15 m_s"><span class="p10 fs12">'.esc_html__( 'Next Post', 'simple-days' ).' <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></div>';
  if ($thumurl['has_image']){
    echo '<div class="nav_link_thum">';
    echo '<img src="'.esc_url( $thumurl[0] ).'" width="100" height="100" />';
    echo '</div>';
  }
  echo '<div class="ta_r"><p class="nav_link_title p10">' . esc_html(beliefmedia_mb_strimwidth(get_the_title($nextpost->ID), 0, 80, "...", 'UTF-8')) . '</p></div></a>';
}
echo '</nav>';


