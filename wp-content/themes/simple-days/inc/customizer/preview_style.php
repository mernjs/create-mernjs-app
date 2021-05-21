<?php
defined( 'ABSPATH' ) || exit;
/**
 * Preview Style
 *
 * @package Simple Days
 */
require_once SIMPLE_DAYS_THEME_DIR . 'inc/lib/get_gradient.php';














function generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
  $return = '';
  $mod = get_theme_mod($mod_name);
  if ( ! empty( $mod ) ) {
    $return = sprintf('%s { %s:%s; }',
      $selector,
      $style,
      $prefix.$mod.$postfix
    );
    if ( $echo ) {
      echo esc_attr($return);
    }
  }
  return $return;
}



function simple_days_custom_font_generate($class_name,$slug_name){
  generate_css($class_name, 'font-size', $slug_name.'text_size','','px');
  generate_css($class_name, 'font-weight', $slug_name.'font_weight');
  generate_css($class_name, 'color', $slug_name.'text_color');
  generate_css($class_name, 'background-color', $slug_name.'background_color');
  generate_css($class_name, 'border-top-style', $slug_name.'border_top_style');
  generate_css($class_name, 'border-top-width', $slug_name.'border_top_width','','px');
  generate_css($class_name, 'border-top-color', $slug_name.'border_top_color');
  generate_css($class_name, 'text-align', $slug_name.'text_position');
  generate_css($class_name, 'border-right-style', $slug_name.'border_right_style');
  generate_css($class_name, 'border-right-width', $slug_name.'border_right_width','','px');
  generate_css($class_name, 'border-right-color', $slug_name.'border_right_color');
  generate_css($class_name, 'border-bottom-style', $slug_name.'border_bottom_style');
  generate_css($class_name, 'border-bottom-width', $slug_name.'border_bottom_width','','px');
  generate_css($class_name, 'border-bottom-color', $slug_name.'border_bottom_color');
  generate_css($class_name, 'border-left-style', $slug_name.'border_left_style');
  generate_css($class_name, 'border-left-width', $slug_name.'border_left_width','','px');
  generate_css($class_name, 'border-left-color', $slug_name.'border_left_color');
  generate_css($class_name, 'border-top-left-radius', $slug_name.'border_radius_top_left','','px');
  generate_css($class_name, 'border-top-right-radius', $slug_name.'border_radius_top_right','','px');
  generate_css($class_name, 'border-bottom-left-radius', $slug_name.'border_radius_bottom_left','','px');
  generate_css($class_name, 'border-bottom-right-radius', $slug_name.'border_radius_bottom_right','','px');
  generate_css($class_name, 'padding-top', $slug_name.'padding_top','','px');
  generate_css($class_name, 'padding-right', $slug_name.'padding_right','','px');
  generate_css($class_name, 'padding-bottom', $slug_name.'padding_bottom','','px');
  generate_css($class_name, 'padding-left', $slug_name.'padding_left','','px');
  generate_css($class_name, 'margin-top', $slug_name.'margin_top','','px');
  generate_css($class_name, 'margin-right', $slug_name.'margin_right','','px');
  generate_css($class_name, 'margin-bottom', $slug_name.'margin_bottom','','px');
  generate_css($class_name, 'margin-left', $slug_name.'margin_left','','px');


  if($class_name != 'h1.post_title'){
    generate_css($class_name, 'background-image', $slug_name.'background_image','url(',')');
  }else{
    generate_css('.post_item > h1.post_title', 'background-image', $slug_name.'background_image','url(',')');
  }


  if(get_theme_mod( $slug_name.'balloon',false)){
    echo $class_name.'{position:relative}';
    echo $class_name.':after{position: absolute;content: "";top: 100%;left: 30px;border: 15px solid transparent;border-top: 15px solid ;width: 0;height: 0;}'."\n";
  }
  generate_css($class_name.':after', 'border-top-color', $slug_name.'balloon_color');
  generate_css($class_name.':after', 'left', $slug_name.'balloon_position','','px');
  generate_css($class_name.':after', 'border-width', $slug_name.'balloon_width','','px');
  generate_css($class_name.':after', 'border-top-width', $slug_name.'balloon_height','','px');

}

?>



<!--Customizer CSS-->
<style type="text/css">
  <?php
  generate_css('body', 'color', 'simple_days_font_color');
  generate_css('body', 'background-color', 'simple_days_background_color');
  generate_css('a', 'color', 'link_textcolor');
  generate_css('a:hover:not(.non_hover)', 'color', 'link_hover_color');
  generate_css('.title_text a', 'color', 'blog_name');
  generate_css('#h_wrap', 'background-color', 'header_color');
  generate_css('.f_widget_wrap', 'background-color', 'footer_widget_color');
  generate_css('.f_widget_wrap', 'color', 'footer_widget_textcolor');
  generate_css('.f_widget_wrap a:not(.icon_base):not(.to_top)', 'color', 'footer_widget_linkcolor');
  generate_css('.credit_wrap', 'background-color', 'footer_color');
  generate_css('.nav_h2', 'background-color', 'header_nav_h2_bg_color');
  generate_css('#menu_f', 'background-color', 'f_menu_wrap_bg_color');
  generate_css('#oh_wrap', 'background-color', 'oh_wrap_bg_color');
  generate_css('.to_top', 'color', 'to_top_color');
  generate_css('.to_top', 'background-color', 'to_top_bg_color');
  generate_css('.to_top:hover', 'color', 'to_top_hover_color');
  generate_css('.to_top:hover', 'background-color', 'to_top_bg_hover_color');

  generate_css('.ad_labeling', 'text-align', 'simple_days_google_ad_labeling_position');

  generate_css('.post_content', 'background-color', 'main_content_bg_color');

  generate_css('.post_card', 'background-color', 'simple_days_index_card_bg_color');
  generate_css('.post_card_category', 'color', 'simple_days_index_category_text_color');
  generate_css('.post_card_category', 'border-color', 'simple_days_index_category_border_color');
  generate_css('.post_card_category', 'background-color', 'simple_days_index_category_bg_color');
  generate_css('.post_card_category:hover', 'color', 'simple_days_index_category_text_hover_color');
  generate_css('.post_card_category:hover', 'border-color', 'simple_days_index_category_border_hover_color');
  generate_css('.post_card_category:hover', 'background-color', 'simple_days_index_category_bg_hover_color');

  generate_css('.more_read', 'color', 'simple_days_index_read_more_text_color');
  generate_css('.more_read', 'border-color', 'simple_days_index_read_more_border_color');
  generate_css('.more_read', 'background-color', 'simple_days_index_read_more_bg_color');
  generate_css('.more_read:hover', 'color', 'simple_days_index_read_more_text_hover_color');
  generate_css('.more_read:hover', 'border-color', 'simple_days_index_read_more_border_hover_color');
  generate_css('.more_read:hover', 'background-color', 'simple_days_index_read_more_bg_hover_color');

  generate_css('.pl_rank', 'background-color', 'yahman_addons_pp_rank');
  generate_css('li:nth-child(1) .pl_rank', 'background-color', 'yahman_addons_pp_rank1');
  generate_css('li:nth-child(2) .pl_rank', 'background-color', 'yahman_addons_pp_rank2');
  generate_css('li:nth-child(3) .pl_rank', 'background-color', 'yahman_addons_pp_rank3');
  generate_css('.pl_rank', 'color', 'yahman_addons_pp_rank_font_color');

  generate_css('.menu_h li', 'background-color', 'header_menu_bg_color');
  generate_css('.menu_h li:hover', 'background-color', 'header_menu_bg_color_hover');
  generate_css('.menu_h li a', 'color', 'header_menu_font_color');
  generate_css('.menu_h li:hover a', 'color', 'header_menu_font_color_hover');
/*
  generate_css('.menu_h .children li', 'background-color', 'header_menu_children_bg_color');
  generate_css('.menu_h .children li:hover', 'background-color', 'header_menu_children_bg_color_hover');
  generate_css('.menu_h .children li a', 'color', 'header_menu_children_font_color');
  generate_css('.menu_h .children li:hover a', 'color', 'header_menu_children_font_color_hover');
  */
  generate_css('.menu_h .sub-menu li', 'background-color', 'header_menu_children_bg_color');
  generate_css('.menu_h .sub-menu li:hover', 'background-color', 'header_menu_children_bg_color_hover');
  generate_css('.menu_h .sub-menu li a', 'color', 'header_menu_children_font_color');
  generate_css('.menu_h .sub-menu li:hover a', 'color', 'header_menu_children_font_color_hover');

  //generate_css('.menu_h > li[class*="children"] > ul:after', 'border-bottom-color', 'header_menu_children_triangle_color');
  //generate_css('.menu_h > li:last-child ul li[class*="children"] > a:after', 'border-right-color', 'header_menu_grandchild_triangle_color');
  //generate_css('.menu_h .sub-menu > li[class*="children"] > a:after', 'border-left-color', 'header_menu_grandchild_triangle_color');
  //generate_css('.menu_h .children > li[class*="children"] > a:after', 'border-left-color', 'header_menu_grandchild_triangle_color');

  generate_css('.credit_wrap', 'color', 'credit_color');
  generate_css('.credit_wrap a', 'color', 'credit_link_color');

  generate_css('#nav_s a', 'color', 'sub_menu_link_color');
  generate_css('#nav_f a', 'color', 'footer_menu_link_color');
  generate_css('#nav_s a:hover', 'color', 'sub_menu_link_hover_color');
  generate_css('#nav_f a:hover', 'color', 'footer_menu_link_hover_color');

  generate_css('.search_submit', 'color', 'search_submit_color');
  generate_css('.search_submit', 'background', 'search_submit_bg_color');
  generate_css('.search_submit:hover', 'color', 'search_submit_hover_color');
  generate_css('.search_submit:hover', 'background', 'search_submit_bg_hover_color');


  generate_css('button, input[type="button"], input[type="submit"]', 'color', 'submit_color');
  generate_css('button, input[type="button"], input[type="submit"]', 'background', 'submit_bg_color');
  generate_css('button, input[type="button"]:hover, input[type="submit"]', 'color', 'submi_hovert_color');
  generate_css('button, input[type="button"]:hover, input[type="submit"]', 'background', 'submit_bg_hover_color');

  $i = 2;
  while ( $i < 5) {
    $class_name = '#post_body > h'.$i;
    $slug_name = 'simple_days_post_heading_'.$i.'_';
    simple_days_custom_font_generate($class_name,$slug_name);
    ++$i;
  }

  $side_footer = array('sidebar' => '.sw_title','footer' => '.fw_title');
  foreach ($side_footer as $s_f_name => $s_f_c_name) {
    $class_name = $s_f_c_name;
    $slug_name = 'simple_days_widget_title_'.$s_f_name.'_';
    simple_days_custom_font_generate($class_name,$slug_name);
  }

  $class_name = '.post_card_title';
  $slug_name = 'simple_days_index_title_';
  simple_days_custom_font_generate($class_name,$slug_name);
  generate_css('.entry_title', 'color', 'simple_days_index_title_text_color');
  generate_css('.entry_title:hover', 'color', 'simple_days_index_title_text_hover_color');

  $class_name = 'h1.post_title';
  $slug_name = 'simple_days_post_title_';
  simple_days_custom_font_generate($class_name,$slug_name);

  
  $class_name = '#toc.toc';
  $slug_name = 'yahman_add_ons_toc_';
  simple_days_custom_font_generate($class_name,$slug_name);
  generate_css('#toc.toc a,.toc_ctrl > label', 'color', 'yahman_add_ons_toc_link_color');
  generate_css('#toc.toc', 'color', 'yahman_add_ons_toc_font_color');
  generate_css('#toc.toc a:hover,.toc_ctrl > label:hover', 'color', 'yahman_add_ons_toc_link_hover_color');


  $font_body = $font_headings = $font_site_title = $font_post_title = '';

  $google_font_body_jp = get_theme_mod( 'simple_days_font_body_google_jp','none');
  $font_body_jp = get_theme_mod( 'simple_days_font_body_jp','none');
  $google_font_body = get_theme_mod( 'simple_days_font_body_google','none');
  if( $google_font_body_jp != 'none'){
   $font_body = '"'.$google_font_body_jp.'"';
 }else if($font_body_jp != 'none'){
   $font_body = $font_body_jp;
 }else if($google_font_body != 'none'){
   $font_body = $google_font_body;
 }else if(get_theme_mod( 'simple_days_font_body','none') != 'none'){
   $font_body = get_theme_mod( 'simple_days_font_body');
 }

 $google_font_headings_jp = get_theme_mod( 'simple_days_font_headings_google_jp','none');
 $font_headings_jp = get_theme_mod( 'simple_days_font_headings_jp','none');
 $google_font_headings = get_theme_mod( 'simple_days_font_headings_google','none');
 if( $google_font_headings_jp != 'none'){
   $font_headings = '"'.$google_font_headings_jp.'"';
 }else if($font_headings_jp != 'none'){
   $font_headings = $font_headings_jp;
 }else if($google_font_headings != 'none'){
   $font_headings = $google_font_headings;
 }else if(get_theme_mod( 'simple_days_font_headings','none') != 'none'){
   $font_headings = get_theme_mod( 'simple_days_font_headings');
 }

 $google_font_site_title_jp = get_theme_mod( 'simple_days_font_site_title_google_jp','none');
 $font_site_title_jp = get_theme_mod( 'simple_days_font_site_title_jp','none');
 $google_font_site_title = get_theme_mod( 'simple_days_font_site_title_google','none');
 if( $google_font_site_title_jp != 'none'){
   $font_site_title = '"'.$google_font_site_title_jp.'"';
 }else if($font_site_title_jp != 'none'){
   $font_site_title = $font_site_title_jp;
 }else if($google_font_site_title != 'none'){
   $font_site_title = $google_font_site_title;
 }else if(get_theme_mod( 'simple_days_font_site_title','none') != 'none'){
   $font_site_title = get_theme_mod( 'simple_days_font_site_title');
 }

 $google_font_post_title_jp = get_theme_mod( 'simple_days_font_post_title_google_jp','none');
 $font_post_title_jp = get_theme_mod( 'simple_days_font_post_title_jp','none');
 $google_font_post_title = get_theme_mod( 'simple_days_font_post_title_google','none');
 if( $google_font_post_title_jp != 'none'){
   $font_post_title = '"'.$google_font_post_title_jp.'"';
 }else if($font_post_title_jp != 'none'){
   $font_post_title = $font_post_title_jp;
 }else if($google_font_post_title != 'none'){
   $font_post_title = $google_font_post_title;
 }else if(get_theme_mod( 'simple_days_font_post_title','none') != 'none'){
   $font_post_title = get_theme_mod( 'simple_days_font_post_title');
 }

 if($font_body != ''){
  echo 'body{font-family:'.$font_body.';}';
}
if($font_headings != ''){
  echo 'h1,h2,h3,h4,h5,h6{font-family:'.$font_headings.';}';
}
if($font_site_title != ''){
  echo '.title_text{font-family:'.$font_site_title.';}';
}

if($font_post_title != ''){
  echo 'h1.post_title{font-family:'.$font_post_title.';}';
}

if(get_theme_mod( 'simple_days_box_style','flat') == 'shadow'){
  echo ' .shadow_box{-webkit-box-shadow:0 2px 2px 0 rgba(0,0,0,0.14),0 3px 1px -2px rgba(0,0,0,0.12),0 1px 5px 0 rgba(0,0,0,0.2);box-shadow:0 2px 2px 0 rgba(0,0,0,0.14),0 3px 1px -2px rgba(0,0,0,0.12),0 1px 5px 0 rgba(0,0,0,0.2);-webkit-border-radius:2px;border-radius:2px}.to_top{box-shadow: 0px 4px 16px rgba(0, 0, 0, 1)}';
}elseif (get_theme_mod( 'simple_days_header_shadow',true)) {
  echo ' #h_wrap{-webkit-box-shadow:0 2px 2px 0 rgba(0,0,0,0.14),0 3px 1px -2px rgba(0,0,0,0.12),0 1px 5px 0 rgba(0,0,0,0.2);box-shadow:0 2px 2px 0 rgba(0,0,0,0.14),0 3px 1px -2px rgba(0,0,0,0.12),0 1px 5px 0 rgba(0,0,0,0.2);-webkit-border-radius:2px;border-radius:2px}.to_top{box-shadow: 0px 4px 16px rgba(0, 0, 0, 1)}';
}
?>
<?php
$read_more_position = get_theme_mod( 'simple_days_read_more_position','right');
if( $read_more_position != 'right' && $read_more_position != 'none'){
 echo '.read_more_box{text-align:'.($read_more_position == 'center' ? 'center' : 'left').'}';
}
if( get_theme_mod( 'simple_days_index_thumbnail','left' ) === 'right'){
 echo '.post_card_thum{-webkit-box-ordinal-group:3;-ms-flex-order:3;-webkit-order:3;order:3;}';
}
if(get_theme_mod( 'simple_days_index_date_position','left') == 'right'){
 echo '.post_card_date{left:auto;right:0;}';
}
if(get_theme_mod( 'simple_days_index_category_position','right') == 'left'){
 echo '.post_card_category{right:auto;left:0;}';
}

/*
if(get_theme_mod( 'simple_days_breadcrumbs_display','left') == 'right'){
 echo '.breadcrumb{text-align:right}';
}
if(get_theme_mod( 'simple_days_posts_author_position','right') == 'left'){
 echo '.post_author{text-align:left}';
}
if(get_theme_mod( 'simple_days_posts_date_position','right') == 'left'){
 echo '.post_date{text-align:left}';
}
if(get_theme_mod( 'simple_days_page_author_position','none') == 'left'){
 echo '.page_author{text-align:left}';
}
if(get_theme_mod( 'simple_days_page_date_position','none') == 'left'){
 echo '.page_date{text-align:left}';
}
if(get_theme_mod( 'simple_days_pageview_position','right') != 'right'){
 echo '.page_view{text-align:'.get_theme_mod( 'simple_days_pageview_position','right').'}';
}
*/



$mod = get_theme_mod('simple_days_post_anchor_underline' , true);
if ( !$mod ) {
  echo '.post_body a {text-decoration:none;}';
}


$mod = get_theme_mod('simple_days_wrap_flame_maxwidth');
if ( ! empty( $mod ) ) {
  echo '.wrap_frame{max-width:'.$mod.'px;}';
}

$i = 1;
$j = 0;
//if(is_customize_preview())$j = 1;       
$awsome_b = $awsome_a = '';
$icon_before_after = 'before';
while($i <= 10){
 $icon_color = '';
 $icon_content = get_theme_mod( 'simple_days_menu_bar_h_icon_'.$i,'none');
 if($icon_content != 'none'){

   if(get_theme_mod( 'simple_days_menu_bar_h_icon_color_'.$i,'') != '')$icon_color = 'color:'.get_theme_mod( 'simple_days_menu_bar_h_icon_color_'.$i,'').';';
   
   if(get_theme_mod( 'simple_days_menu_bar_h_icon_after_'.$i,false))$icon_before_after = 'after';
   echo '#menu_h > li:nth-child('.($i+$j).') > a:'.$icon_before_after.'{'.$icon_color.'content:"\\'.get_theme_mod( 'simple_days_menu_bar_h_icon_'.$i).'"}';
   echo '#menu_h > li:nth-child('.($i+$j).') > div > a:'.$icon_before_after.'{'.$icon_color.'content:"\\'.get_theme_mod( 'simple_days_menu_bar_h_icon_'.$i).'"}';
 }
 $icon_before_after = 'before';
 $i++;
}

$i = 1;



while($i <= 10){
 $icon_color = '';
 $icon_content = get_theme_mod( 'simple_days_menu_bar_f_icon_'.$i,'none');
 if($icon_content != 'none'){




   if(get_theme_mod( 'simple_days_menu_bar_f_icon_color_'.$i,'') != '')$icon_color = 'color:'.get_theme_mod( 'simple_days_menu_bar_f_icon_color_'.$i,'').';';
   
   if(get_theme_mod( 'simple_days_menu_bar_f_icon_after_'.$i,false))$icon_before_after = 'after';

   echo '#menu_f > li:nth-child('.($i+$j).') > a:'.$icon_before_after.'{'.$icon_color.'content:"\\'.get_theme_mod( 'simple_days_menu_bar_f_icon_'.$i).'"}';

 }
 $icon_before_after = 'before';
 $i++;
}

   //if($awsome_b == '1'){
echo '.menu_i > li > a:before {font-family:FontAwesome;margin-right:4px}';
echo '.menu_i > li > div > a:before {font-family:FontAwesome;margin-right:4px}';
   //}
   //if($awsome_a == '1'){
echo '.menu_i > li > a:after {font-family:FontAwesome;margin-left:4px}';
echo '.menu_i > li > div > a:after {font-family:FontAwesome;margin-left:4px}';
   //}

if( get_theme_mod( 'simple_days_alert_box',false)){
  echo '#h_alert{';
  if( get_theme_mod( 'simple_days_alert_box_bg_color','')){
    echo 'background:'.get_theme_mod( 'simple_days_alert_box_bg_color','').';';
  }
  if( get_theme_mod( 'simple_days_alert_box_color','')){
    echo 'color:'.get_theme_mod( 'simple_days_alert_box_color','').';';
  }
  if( get_theme_mod( 'simple_days_alert_box_text_position','center') != 'left'){
    echo 'text-align:'.get_theme_mod( 'simple_days_alert_box_text_position','center').';';
  }
  if( get_theme_mod( 'simple_days_alert_box_text_size',16) != 16){
    echo 'font-size:'.get_theme_mod( 'simple_days_alert_box_text_size',16).'px;';
  }
  $alert_box_border['type'] = get_theme_mod( 'simple_days_alert_box_border_type','none');
  if( $alert_box_border['type'] != 'none' && !get_theme_mod( 'simple_days_alert_box_border_inside',false)){
    $alert_box_border['width'] = get_theme_mod( 'simple_days_alert_box_border_width',1);
    echo 'border:'.$alert_box_border['type'].' '.$alert_box_border['width'].'px '.get_theme_mod( 'simple_days_alert_box_border_color','');
  }
  echo '}';
  if( $alert_box_border['type'] != 'none' && get_theme_mod( 'simple_days_alert_box_border_inside',false)){
    $alert_box_border['width'] = get_theme_mod( 'simple_days_alert_box_border_width',1);
    echo '#h_alert_box{display:inline-block;border:'.$alert_box_border['type'].' '.$alert_box_border['width'].'px '.get_theme_mod( 'simple_days_alert_box_border_color','').'}';
  }
}else{
  echo '#h_alert{display:none;}';
}


$mod = get_theme_mod( 'simple_days_humberger_menu_spin','1125');
if( $mod != '1125'){
  echo '#t_menu:checked ~ div header div div .humberger:before{-webkit-transform:rotate('.$mod.'deg);transform:rotate('.$mod.'deg);}#t_menu:checked ~ div header div div .humberger:after{-webkit-transform:rotate(-'.$mod.'deg);transform:rotate(-'.$mod.'deg)}';
}
$mod = get_theme_mod( 'simple_days_humberger_menu_spin_speed',0.8);
if( $mod != 0.8){
 echo '.humberger:before,.humberger:after{-webkit-transition:-webkit-box-shadow .1s linear,-webkit-transform '.$mod.'s;transition:box-shadow .1s linear,transform '.$mod.'s}';
}

$mod = get_theme_mod( 'simple_days_humberger_menu_right',false);
if( $mod != false){
 echo '.bar_box{right:0;left:auto;}.serach_box{right:auto;left:0;}';
}else{
 echo '.serach_box{right:0;left:auto;}.bar_box{right:auto;left:0;}';
}

$mod = get_theme_mod('search_menu_color','');
if ( ! empty( $mod ) ) {
  echo '.serach_box{color:'.$mod.'}';
}

$mod = get_theme_mod( 'simple_days_logo_image_height',60);
if( $mod != 60){
 echo '.header_logo{max-height:'.$mod.'px}';
}

$mod = get_theme_mod( 'simple_days_footer_logo_image_height',60);
if( $mod != 60){
 echo '.footer_logo{max-height:'.$mod.'px}';
}
$mod = get_theme_mod( 'simple_days_footer_logo_image_width',300);
if( $mod != 300){
 echo '.footer_logo{max-width:'.$mod.'px}';
}

echo '@media screen and (min-width: 768px) {';
$mod = get_theme_mod( 'simple_days_site_title_size');
if ( ! empty( $mod ) ) {
  echo'.title_text{font-size:'.$mod.'px;}';
}
$mod = get_theme_mod( 'simple_days_logo_image_width',300);
if( $mod != 300){
 echo '.header_logo{max-width:'.$mod.'px}';
}



echo '}';


echo '@media screen and (min-width: 980px) {';

/*サイドバー左
if(get_theme_mod( 'simple_days_sidebar_layout','3') == '1'){
  echo '#sidebar{-webkit-box-ordinal-group:1;-ms-flex-order:1;-webkit-order:1;order:1;padding-left:0}';
}
*/

$mod = get_theme_mod('simple_days_layout_header_height',54);
if ( $mod != 54 ) {
  echo '#site_h{height:'.$mod.'px;}';
}

$mod = get_theme_mod('simple_days_header_image_percentage_laptop',33);
if ( $mod != 33 ) {
  echo '.on_thum:before{padding-top:'.$mod.'%;}';
}


$mod = get_theme_mod( 'simple_days_main_content_maxwidth');
if( ! empty( $mod ) ) echo '.contents{max-width:'.$mod.'px;}';


$mod = get_theme_mod( 'simple_days_sidebar_minwidth');
if( ! empty( $mod ) ) echo  '.sidebar{min-width:'.$mod.'px;}';

$mod = get_theme_mod( 'simple_days_sidebar_maxwidth');
if( ! empty( $mod ) ){
  echo  '.sidebar{max-width:'.$mod.'px;}';
  echo  '.s_widget{max-width:'.$mod.'px;}';
}





$mod = get_theme_mod( 'simple_days_over_header_widget_position','space-between');
if ( $mod == 'space-between' ) {
  echo'.oh_con{-webkit-justify-content:space-between;justify-content:space-between;}.oh_widget{padding:10px 0;}';
}else if( $mod == 'space-around' ){
  echo '.oh_con{-webkit-justify-content:space-around;justify-content:space-around}.oh_widget{padding:10px 0;}';
}else if( $mod == 'flex-start' ){
  echo '.oh_con{-webkit-justify-content:flex-start;justify-content:flex-start;}.oh_widget{padding:10px 20px 10px 0;}';
}else if( $mod == 'flex-end' ){
  echo '.oh_con{-webkit-justify-content:flex-end;justify-content:flex-end}.oh_widget{padding:10px 0 10px 20px;}';
}else if( $mod == 'center' ){
  echo '.oh_con{-webkit-justify-content:center;justify-content:center}.oh_widget{padding:10px;}';
}


$mod = get_theme_mod( 'simple_days_menu_layout','1');
$mod2 = get_theme_mod( 'simple_days_menu_layout_title_position','center');
$mod3 = get_theme_mod( 'simple_days_menu_layout_menu_position','left');

$mod4 = get_theme_mod( 'simple_days_tagline_position','none');



if( $mod4 == 'left' || $mod4 == 'right'){
  echo'.title_tag{-webkit-box-orient:horizontal;-webkit-box-direction:normal;-ms-flex-direction:row;-webkit-flex-direction:row;flex-direction:row}';
}else{
  echo'.title_tag{-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;-webkit-flex-direction:column;flex-direction:column;}';
  echo '.tagline{padding:0;}';
}
if( $mod4 == 'right'){
  echo '.tagline{padding:0 0 0 10px;}';
}
if( $mod4 == 'left'){
  echo '.tagline{padding:0 10px 0 0;}';

}

if($mod == '1' || $mod == '2'){
 echo '.title_tag{-webkit-box-ordinal-group:0;-ms-flex-order:0;-webkit-order:0;order:0;}#site_h{align-self:center;}.hw_con{position:relative}.title_wrap{justify-content: space-between;}';
}

echo '#h_flex{-webkit-box-align:center;-ms-flex-align:center;-webkit-align-items:center;align-items:center}';

if($mod == '1'){
 echo '.title_wrap,#h_flex{flex-direction: row;}.hw_con{flex:0 0 auto}.title_tag{-webkit-box-ordinal-group:0;-ms-flex-order:0;-webkit-order:0;order:0}#h_flex{width:100%;}#nav_h{padding:0 0 0 40px}.site_title{margin:0 auto 0 0}';
 if( $mod4 == 'top' || $mod4 == 'bottom'){
  echo '.site_title{margin:0 auto 0 0}';
}
}elseif($mod == '2'){
 echo '.title_wrap,#h_flex{flex-direction: row-reverse;}.hw_con{flex:0 0 auto}.title_tag{-webkit-box-ordinal-group:0;-ms-flex-order:0;-webkit-order:0;order:0;}#h_flex{width:100%;}#nav_h{padding:0 40px 0 0}.site_title{margin:0 0 0 auto}';
}elseif($mod == '3'){
 echo '.title_wrap{flex-direction: row;}#h_flex{-webkit-flex-direction:column;flex-direction:column;width:100%;max-width:none;}';
}elseif($mod == '4'){
 echo '.title_wrap{flex-direction: row;}#h_flex{-webkit-flex-direction:column-reverse;flex-direction:column-reverse;width:100%;max-width:none;}#nav_h{-ms-flex-order:-1;-webkit-order:-1;order:-1}';
}

if($mod == '3' || $mod == '4'){
  echo'#site_h{align-self: auto;}#nav_h{padding:0}';
  echo '#h_flex{-webkit-box-align:normal;-ms-flex-align:normal;-webkit-align-items:normal;align-items:normal}';

  if($mod2 == 'left'){
   echo '.title_tag{-webkit-box-ordinal-group:0;-ms-flex-order:0;-webkit-order:0;order:0;}.site_title{margin:0 auto 0 0}.hw_con{position:relative}.site_title{margin:0 auto 0 0}#site_h{align-self: auto;}.title_wrap{justify-content: space-between;margin:0 auto 0 0;}.h_ws{margin:0 0 0 auto;}';
 }
 if($mod2 == 'center'){
  
  $mod = get_theme_mod('simple_days_logo_image_height');
  if ( ! empty( $mod ) ) {
    echo '.header_logo{max-height:'.$mod.'px}';
  }
  echo '.title_tag{-webkit-box-ordinal-group:0;-ms-flex-order:0;-webkit-order:0;order:0;}.site_title{margin:0 auto}.title_wrap{margin:0 auto}.h_ws{margin:0;position:absolute;right:0;top:0;bottom:0;padding-right:25px;}';

  if( is_active_sidebar( 'header_widget' )){
      //echo '.site_title{height:40px}';
  }else{
      //echo '.site_title{height:40px;margin:0 auto}';
      //echo '.site_title{margin:0 auto}';
  }
}
if($mod2 == 'right'){
  echo '.title_tag{-webkit-box-ordinal-group:2;-ms-flex-order:2;-webkit-order:2;order:2;}.site_title{margin:0 0 0 auto}.hw_con{position:relative}.title_wrap{justify-content: space-between;margin:0 0 0 auto;}.h_ws{margin:0 auto 0 0;}';
    //.site_title{margin:0 0 0 auto}';
}

}

if($mod3 == 'left'){
  echo '#menu_h{-webkit-justify-content:flex-start;justify-content:flex-start;}';
}
if($mod3 == 'center'){
  echo '#menu_h{-webkit-justify-content:center;justify-content:center}';
}
if($mod3 == 'right'){
 echo '#menu_h{-webkit-justify-content:flex-end;justify-content:flex-end}';
}
if($mod3 == 'space-between'){
  echo '#menu_h{-webkit-justify-content:space-between;justify-content:space-between}';
}
if($mod3 == 'space-around'){
 echo '#menu_h{-webkit-justify-content:space-around;justify-content:space-around}';
}







echo '}';



if ( !is_active_sidebar( 'footer-1' ) && !is_active_sidebar( 'footer-2' ) && !is_active_sidebar( 'footer-3' )){
 echo '.f_widget_wrap{background:transparent}';
}



$gradient_name = simple_days_get_gradient_pattern();
foreach ($gradient_name as $key => $value) {
  $property = '';
  $comp = simple_days_get_gradient($value);
  if($comp){
    $property = simple_days_get_gradient_property($value);
    echo $property .'{background:' . $comp . '}';
  }
}



?>
</style>


<?php
global $wp_customize;
if ( isset( $wp_customize ) ){ ?>

  <style type="text/css" id="body_hover_css"></style>
  <style type="text/css" id="more_read_hover_css"></style>
  <style type="text/css" id="post_card_category_hover_css"></style>
  <style type="text/css" id="heading_balloon_css"></style>
  <style type="text/css" id="header_hover_css"></style>
  <style type="text/css" id="footer_hover_css"></style>
  <style type="text/css" id="widget_title_css"></style>
  <style type="text/css" id="menu_layout_position"></style>


  <style type="text/css" id="etc_css"></style>
  <?php
  for ($i=1; $i <= 11; $i++) { ?>
    <style type="text/css" id="simple_days_menu_bar_h_icon_<?php echo $i; ?>"></style>
    <style type="text/css" id="simple_days_menu_bar_f_icon_<?php echo $i; ?>"></style>
    <?php
  }

}
?>

<!--/Customizer CSS-->