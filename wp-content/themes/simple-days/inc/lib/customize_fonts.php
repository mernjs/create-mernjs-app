<?php
defined( 'ABSPATH' ) || exit;


function simple_days_customize_fonts_enqueue() {

  $return_font = array();
  $return_font[0] = $return_font[1] = $return_font[2] = $return_font[3] = 'none';

  $google_font_body_jp = get_theme_mod( 'simple_days_font_body_google_jp','none');
  $font_body_jp = get_theme_mod( 'simple_days_font_body_jp','none');
  $google_font_body = get_theme_mod( 'simple_days_font_body_google','none');

  $google_font_headings_jp = get_theme_mod( 'simple_days_font_headings_google_jp','none');
  $font_headings_jp = get_theme_mod( 'simple_days_font_headings_jp','none');
  $google_font_headings = get_theme_mod( 'simple_days_font_headings_google','none');


  $google_font_site_title_jp = get_theme_mod( 'simple_days_font_site_title_google_jp','none');
  $font_site_title_jp = get_theme_mod( 'simple_days_font_site_title_jp','none');
  $google_font_site_title = get_theme_mod( 'simple_days_font_site_title_google','none');


  $google_font_post_title_jp = get_theme_mod( 'simple_days_font_post_title_google_jp','none');
  $font_post_title_jp = get_theme_mod( 'simple_days_font_post_title_jp','none');
  $google_font_post_title = get_theme_mod( 'simple_days_font_post_title_google','none');


  $google_font_effect[1] = get_theme_mod( 'simple_days_font_site_title_google_effects_1','none');
  $google_font_jp_effect[1] = get_theme_mod( 'simple_days_font_site_title_google_jp_effects_1','none');
  $google_font_effect[2] = get_theme_mod( 'simple_days_font_site_title_google_effects_2','none');
  $google_font_jp_effect[2] = get_theme_mod( 'simple_days_font_site_title_google_jp_effects_2','none');

  $google_font_effect = array_filter(str_replace('none', '' , $google_font_effect),"strlen" );
  $google_font_jp_effect = array_filter(str_replace('none', '' , $google_font_jp_effect),"strlen" );
  if(empty($google_font_effect)){
    $google_font_effect = '';
  }else{
    $google_font_effect = '&effect='.implode('|', array_values($google_font_effect));
  }
  if(empty($google_font_jp_effect)){
    $google_font_jp_effect = '';
  }else{
    $google_font_jp_effect = '&effect='.implode('|', array_values($google_font_jp_effect));
  }


  $earlyaccess = array('Hannari','Kokoro','Nikukyu','Nico Moji','Noto Sans Japanese','Noto Sans JP');





  if( $google_font_body_jp != 'none'){
    if(in_array($google_font_body_jp, $earlyaccess)){
      wp_enqueue_style( 'google_webfont_'.str_replace( " ", "_", $google_font_body_jp ), 'https://fonts.googleapis.com/earlyaccess/'.strtolower(str_replace( " ", "", $google_font_body_jp )).'.css',array(),null );
    }else{
      wp_enqueue_style( 'google_webfont_'.str_replace( " ", "_", $google_font_body_jp ), 'https://fonts.googleapis.com/css?family='.str_replace( " ", "+", $google_font_body_jp ).$google_font_jp_effect,array(),null );
    }
    $return_font[0] = '"'.$google_font_body_jp.'"';
  }else if($font_body_jp != 'none'){
    $return_font[0] = $font_body_jp;
  }else if($google_font_body != 'none'){
    wp_enqueue_style( 'google_webfont_'.str_replace( " ", "_", $google_font_body), 'https://fonts.googleapis.com/css?family='.str_replace( " ", "+", $google_font_body).$google_font_effect,array(),null);
    $return_font[0] = '"'.$google_font_body.'"';
  }else if(get_theme_mod( 'simple_days_font_body','none') != 'none'){
    $return_font[0] = get_theme_mod( 'simple_days_font_body');
  }

  if( $google_font_headings_jp != 'none'){
    if(in_array($google_font_headings_jp, $earlyaccess)){
     wp_enqueue_style( 'google_webfont_'.str_replace( " ", "_", $google_font_headings_jp ), 'https://fonts.googleapis.com/earlyaccess/'.strtolower(str_replace( " ", "", $google_font_headings_jp )).'.css',array(),null );
   }else{
    wp_enqueue_style( 'google_webfont_'.str_replace( " ", "_", $google_font_headings_jp ), 'https://fonts.googleapis.com/css?family='.str_replace( " ", "+", $google_font_headings_jp ).$google_font_jp_effect,array(),null );
  }
  $return_font[1] = '"'.$google_font_headings_jp.'"';
}else if($font_headings_jp != 'none'){
  $return_font[1] = $font_headings_jp;
}else if($google_font_headings != 'none'){
 wp_enqueue_style( 'google_webfont_'.str_replace( " ", "_", $google_font_headings), 'https://fonts.googleapis.com/css?family='.str_replace( " ", "+", $google_font_headings).$google_font_headings_effect,array(),null);
 $return_font[1] = '"'.$google_font_headings.'"';
}else if(get_theme_mod( 'simple_days_font_headings','none') != 'none'){
  $return_font[1] = get_theme_mod( 'simple_days_font_headings');
}

if( $google_font_site_title_jp != 'none'){
  if(in_array($google_font_site_title_jp, $earlyaccess)){
    wp_enqueue_style( 'google_webfont_'.str_replace( " ", "_", $google_font_site_title_jp ), 'https://fonts.googleapis.com/earlyaccess/'.strtolower(str_replace( " ", "", $google_font_site_title_jp )).'.css',array(),null );
  }else{
    wp_enqueue_style( 'google_webfont_'.str_replace( " ", "_", $google_font_site_title_jp ), 'https://fonts.googleapis.com/css?family='.str_replace( " ", "+", $google_font_site_title_jp ).$google_font_jp_effect,array(),null );
  }
  $return_font[2] = '"'.$google_font_site_title_jp.'"';
}else if($font_site_title_jp != 'none'){
  $return_font[2] = $font_site_title_jp;
}else if($google_font_site_title != 'none'){
  wp_enqueue_style( 'google_webfont_'.str_replace( " ", "_", $google_font_site_title), 'https://fonts.googleapis.com/css?family='.str_replace( " ", "+", $google_font_site_title).$google_font_effect,array(),null);
  $return_font[2] = '"'.$google_font_site_title.'"';
}else if(get_theme_mod( 'simple_days_font_site_title','none') != 'none'){
  $return_font[2] = get_theme_mod( 'simple_days_font_site_title');
}

if( $google_font_post_title_jp != 'none'){
  if(in_array($google_font_post_title_jp, $earlyaccess)){
    wp_enqueue_style( 'google_webfont_'.str_replace( " ", "_", $google_font_post_title_jp ), 'https://fonts.googleapis.com/earlyaccess/'.strtolower(str_replace( " ", "", $google_font_post_title_jp )).'.css',array(),null );
  }else{
    wp_enqueue_style( 'google_webfont_'.str_replace( " ", "_", $google_font_post_title_jp ), 'https://fonts.googleapis.com/css?family='.str_replace( " ", "+", $google_font_post_title_jp ).$google_font_jp_effect,array(),null );
  }
  $return_font[3] = '"'.$google_font_post_title_jp.'"';
}else if($font_post_title_jp != 'none'){
  $return_font[3] = $font_post_title_jp;
}else if($google_font_post_title != 'none'){
  wp_enqueue_style( 'google_webfont_'.str_replace( " ", "_", $google_font_post_title), 'https://fonts.googleapis.com/css?family='.str_replace( " ", "+", $google_font_post_title).$google_font_effect,array(),null);
  $return_font[3] = '"'.$google_font_post_title.'"';
}else if(get_theme_mod( 'simple_days_font_post_title','none') != 'none'){
  $return_font[3] = get_theme_mod( 'simple_days_font_post_title');
}

return $return_font;

}
