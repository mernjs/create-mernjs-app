<?php
defined( 'ABSPATH' ) || exit;
/**
 * Build Style
 *
 * @package Simple Days
 */

function simple_days_build_style(){
	require_once ABSPATH . 'wp-admin/includes/file.php';
	WP_Filesystem();
	global $wp_filesystem;

	$main_background_color = '#fafafa';
	$main_border_color = '#eee';
	$header_bg_color = '#fff';
	$footer_widget_wrap_bg_color = '#474747';
	$footer_widget_wrap_font_color = '#d4d4d4';
	$credit_wrap_bg_color = '#33363b';
	$credit_wrap_font_color = '#777';
	$widget_background_color = '#f2f2f2';
	$button_background_color = '#333';
	$button_background_hover_color = '#666';
	$main_font_color = '#555';
	$link_color = '#07a';
	$hover_color = '#222';
	$sub_color = '#2e7d32';
	$reverse_color = '#fff';

	$side_padding = '10';
	$side_padding_margin = '-10';
	$top_padding = '22';
	$top_padding_margin = '-22';

	$menu_layout = get_theme_mod( 'simple_days_menu_layout','1');

	require_once SIMPLE_DAYS_THEME_DIR . 'inc/lib/get_gradient.php';


	
	$css = $skin_color = array();

	
	$skin = get_theme_mod('simple_days_skin_style','none');
	if(get_theme_mod('simple_days_skin_style_random',false)) $skin = 'none';
	if($skin != 'none') $skin_color = simple_days_get_skin_color($skin);
	
	$content_file_dir = SIMPLE_DAYS_THEME_DIR .'assets/css/core/';


	
	$css[0] =  simple_days_get_css_file( '000_base.min.css' );

	if ($css[0] == ''){
		return;
	}


	
	$css[10] = simple_days_get_css_file( '010_body.min.css' );


	
	$mod = get_theme_mod('simple_days_font_color');
	if ( ! empty( $mod ) ) {
		$css[10] = str_replace( $main_font_color,$mod,$css[10]);
	}

	

	$mod = simple_days_get_gradient('site_bg');
	if( empty( $mod )  )
		$mod = get_theme_mod('simple_days_background_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[4];
	if ( ! empty( $mod ) ) {
		$css[10] = str_replace( $main_background_color,$mod,$css[10]);
	}

	
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
		$css[10] = str_replace( 'body{','body{font-family:'.$font_body.';',$css[10]);
	}

	if($font_headings != ''){
		$css[10] = $css[10].'h1,h2,h3,h4,h5,h6{font-family:'.$font_headings.';}';
	}



	
	$css[15] = simple_days_get_css_file( '015_wp_base.min.css' );


	$border_angle = array('top' , 'right' , 'bottom' , 'left');
	$side_footer = array('sidebar' => '.sw_title','footer' => '.fw_title');
	$gradient_side_footer['sidebar'] = 'sidebar_widget_title';
	$gradient_side_footer['footer'] = 'footer_widget_title';
	foreach ($side_footer as $s_f_name => $s_f_c_name) {

		$mod = get_theme_mod( 'simple_days_widget_title_'.$s_f_name.'_text_size',18);
		if( ! empty( $mod ) ) $css[15] =  str_replace( $s_f_c_name.'{font-size:18',$s_f_c_name.'{font-size:'.$mod,$css[15]);

		$mod = get_theme_mod( 'simple_days_widget_title_'.$s_f_name.'_font_weight');
		if( ! empty( $mod ) ) $css[15] =  str_replace( $s_f_c_name.'{',$s_f_c_name.'{font-weight:'.$mod.';',$css[15]);

		$mod = get_theme_mod('simple_days_widget_title_'.$s_f_name.'_text_color');
		if ( ! empty( $mod ) ) $css[15] =  str_replace( $s_f_c_name.'{',$s_f_c_name.'{color:'.$mod.';',$css[15]);

		$mod = get_theme_mod('simple_days_widget_title_'.$s_f_name.'_text_position','left');
		if ( $mod != 'left' ) $css[15] =  str_replace( $s_f_c_name.'{',$s_f_c_name.'{text-align:'.$mod.';',$css[15]);


		$mod = simple_days_get_gradient($gradient_side_footer[$s_f_name],get_theme_mod('simple_days_widget_title_'.$s_f_name.'_background_image'));
		if( empty( $mod )  ) $mod = get_theme_mod('simple_days_widget_title_'.$s_f_name.'_background_color');
		$mod2 = get_theme_mod('simple_days_widget_title_'.$s_f_name.'_background_image');

		if ( ! empty( $mod ) && ! empty( $mod2 ) ){

			if(strpos($mod,'-gradient') === false){
				$css[15] =  str_replace( $s_f_c_name.'{',$s_f_c_name.'{background:'.$mod.' url('.$mod2.');',$css[15]);
			}else{
				$css[15] =  str_replace( $s_f_c_name.'{',$s_f_c_name.'{background:'.$mod.';',$css[15]);
			}
		}else{
			if ( ! empty( $mod ) ) $css[15] =  str_replace( $s_f_c_name.'{',$s_f_c_name.'{background:'.$mod.';',$css[15]);
			if ( ! empty( $mod2 ) ) $css[15] =  str_replace( $s_f_c_name.'{',$s_f_c_name.'{background:url('.$mod2.');',$css[15]);
		}


		$border = '';
		$border_style = $border_width = $border_color = array();
		$judge = false;
		$j = 1;

		while($j < 5){
			$border_style['all_'.$j] = '';
			$border_width['all_'.$j] = '';
			$border_color['all_'.$j] = '';
			++$j;
		}

		foreach ($border_angle as $value) {
			$border_style[$value] = get_theme_mod('simple_days_widget_title_'.$s_f_name.'_border_'.$value.'_style','none');
			$border_width[$value] = get_theme_mod('simple_days_widget_title_'.$s_f_name.'_border_'.$value.'_width',1);
			$border_color[$value] = get_theme_mod('simple_days_widget_title_'.$s_f_name.'_border_'.$value.'_color');
			if($border_color[$value] === '')$border_color[$value] = 'transparent';
			if($border_style[$value] != 'none')$judge = true;
		}

		if($judge){
			$border_style = simple_days_create_border_style($border_style);
			$border_width = simple_days_create_border_width($border_width);
			$border_color = simple_days_create_border_color($border_color);

			$border = simple_days_create_border($border_style,$border_width,$border_color);

			$css[15] =  str_replace( $s_f_c_name.'{',$s_f_c_name.'{'.$border,$css[15]);

		}


		
		$p_m = array('padding','margin');
		foreach ($p_m as $value) {
			$mod = get_theme_mod('simple_days_widget_title_'.$s_f_name.'_'.$value.'_top',0);
			$mod2 = get_theme_mod('simple_days_widget_title_'.$s_f_name.'_'.$value.'_right',0);
			$mod3 = get_theme_mod('simple_days_widget_title_'.$s_f_name.'_'.$value.'_bottom',0);
			$mod4 = get_theme_mod('simple_days_widget_title_'.$s_f_name.'_'.$value.'_left',0);

			if($mod + $mod2 + $mod3 + $mod4 != 0){
				if($mod != 0)$mod = $mod.'px';
				if($mod2 != 0)$mod2 = $mod2.'px';
				if($mod3 != 0)$mod3 = $mod3.'px';
				if($mod4 != 0)$mod4 = $mod4.'px';
				if($value == 'margin')$css[15] = str_replace( 'margin-bottom:10px}','}',$css[15]);
				if($mod == $mod2 && $mod2 == $mod3 && $mod3 == $mod4){
					$css[15] =  str_replace( $s_f_c_name.'{',$s_f_c_name.'{'.$value.':'.$mod.';',$css[15]);
				}elseif($mod == $mod3 && $mod2 == $mod4){
					$css[15] =  str_replace( $s_f_c_name.'{',$s_f_c_name.'{'.$value.':'.$mod.' '.$mod2.';',$css[15]);
				}elseif($mod != $mod3 && $mod2 == $mod4){
					$css[15] =  str_replace( $s_f_c_name.'{',$s_f_c_name.'{'.$value.':'.$mod.' '.$mod2.' '.$mod3.';',$css[15]);
				}else{
					$css[15] =  str_replace( $s_f_c_name.'{',$s_f_c_name.'{'.$value.':'.$mod.' '.$mod2.' '.$mod3.' '.$mod4.';',$css[15]);
				}
			}

		}


		
		$mod = get_theme_mod('simple_days_widget_title_'.$s_f_name.'_border_radius_top_left',0);
		$mod2 = get_theme_mod('simple_days_widget_title_'.$s_f_name.'_border_radius_top_right',0);
		$mod3 = get_theme_mod('simple_days_widget_title_'.$s_f_name.'_border_radius_bottom_left',0);
		$mod4 = get_theme_mod('simple_days_widget_title_'.$s_f_name.'_border_radius_bottom_right',0);

		if($mod + $mod2 + $mod3 + $mod4 != 0){
			if($mod != 0)$mod = $mod.'px';
			if($mod2 != 0)$mod2 = $mod2.'px';
			if($mod3 != 0)$mod3 = $mod3.'px';
			if($mod4 != 0)$mod4 = $mod4.'px';
			if($mod == $mod2 && $mod2 == $mod3 && $mod3 == $mod4){
				$css[15] =  str_replace( $s_f_c_name.'{',$s_f_c_name.'{border-radius:'.$mod.';',$css[15]);
			}elseif($mod == $mod3 && $mod2 == $mod4){
				$css[15] =  str_replace( $s_f_c_name.'{',$s_f_c_name.'{border-radius:'.$mod.' '.$mod2.';',$css[15]);
			}elseif($mod != $mod3 && $mod2 == $mod4){
				$css[15] =  str_replace( $s_f_c_name.'{',$s_f_c_name.'{border-radius:'.$mod.' '.$mod2.' '.$mod3.';',$css[15]);
			}else{
				$css[15] =  str_replace( $s_f_c_name.'{',$s_f_c_name.'{border-radius:'.$mod.' '.$mod2.' '.$mod3.' '.$mod4.';',$css[15]);
			}
		}

		if(get_theme_mod( 'simple_days_widget_title_'.$s_f_name.'_balloon',false)){
			$css[15] =  str_replace( $s_f_c_name.'{',$s_f_c_name.'{position:relative;',$css[15]);
			$css[15] =  $css[15].$s_f_c_name.':after{position:absolute;content:\'\';top:100%;left:'.get_theme_mod( 'simple_days_widget_title_'.$s_f_name.'_balloon_position',30).'px;border:'.get_theme_mod( 'simple_days_widget_title_'.$s_f_name.'_balloon_width',15).'px solid transparent;border-top:'.get_theme_mod( 'simple_days_widget_title_'.$s_f_name.'_balloon_height',15).'px solid '.get_theme_mod( 'simple_days_widget_title_'.$s_f_name.'_balloon_color').';width:0;height:0;}';


		}



	}



	
	$mod = get_theme_mod('search_submit_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[11];
	if ( ! empty( $mod ) ) {
		$css[15] = str_replace( '.search_submit{background:'.$button_background_color.';color:#fff','.search_submit{background:'.$button_background_color.';color:'.$mod,$css[15]);
	}

	$mod = get_theme_mod('search_submit_bg_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[1];
	if ( ! empty( $mod ) ) {
		$css[15] = str_replace( '.search_submit{background:'.$button_background_color,'.search_submit{background:'.$mod,$css[15]);
	}

	$mod = get_theme_mod('search_submit_hover_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[11];
	if ( ! empty( $mod ) ) {
		$css[15] = str_replace( '.search_submit:hover{background:'.$button_background_hover_color.';color:#fff','.search_submit:hover{background:'.$button_background_hover_color.';color:'.$mod,$css[15]);
	}
	$mod = get_theme_mod('search_submit_hover_bg_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[3];
	if ( ! empty( $mod ) ) {
		$css[15] = str_replace( '.search_submit:hover{background:'.$button_background_hover_color,'.search_submit:hover{background:'.$mod,$css[15]);
	}


	
	$mod = get_theme_mod('submit_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[11];
	if ( ! empty( $mod ) ) {
		$css[15] = str_replace( 'button,input[type="button"],input[type="submit"]{background:'.$button_background_color.';color:#fff','button,input[type="button"],input[type="submit"]{background:'.$button_background_color.';color:'.$mod,$css[15]);
	}

	$mod = get_theme_mod('submit_bg_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[1];
	if ( ! empty( $mod ) ) {
		$css[15] = str_replace( 'button,input[type="button"],input[type="submit"]{background:'.$button_background_color,'button,input[type="button"],input[type="submit"]{background:'.$mod,$css[15]);
	}

	$mod = get_theme_mod('submit_hover_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[11];
	if ( ! empty( $mod ) ) {
		$css[15] = str_replace( 'button:hover,input[type="button"]:hover,input[type="submit"]:hover{background:'.$button_background_hover_color.';color:#fff','button:hover,input[type="button"]:hover,input[type="submit"]:hover{background:'.$button_background_hover_color.';color:'.$mod,$css[15]);
	}

	$mod = get_theme_mod('submit_bg_hover_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[3];
	if ( ! empty( $mod ) ) {
		$css[15] = str_replace( 'button:hover,input[type="button"]:hover,input[type="submit"]:hover{background:'.$button_background_hover_color,'button:hover,input[type="button"]:hover,input[type="submit"]:hover{background:'.$mod,$css[15]);
	}

	if($skin != 'none'){
		//$css[15] = str_replace( 'blockquote{background:'.$main_background_color.';border:1px solid '.$main_border_color,'blockquote{background:'.$main_background_color.';border:1px solid '.$skin_color[1],$css[15]);
		$css[15] = str_replace( 'blockquote{background:'.$main_background_color,'blockquote{background:'.$skin_color[5],$css[15]);
		$css[15] = str_replace( 'blockquote:before,blockquote:after{color:'.$main_border_color,'blockquote:before,blockquote:after{color:'.$skin_color[1],$css[15]);

		$css[15] = str_replace( 'table,th,td{border:1px solid '.$main_border_color,'table,th,td{border:1px solid '.$skin_color[1],$css[15]);
		$css[15] = str_replace( 'tbody tr:nth-child(odd){background:'.$main_border_color,'tbody tr:nth-child(odd){background:'.$skin_color[5],$css[15]);
		$css[15] = str_replace( 'input[type="text"],input[type="email"],input[type="url"],input[type="password"],input[type="number"],input[type="tel"],input[type="range"],input[type="date"],input[type="month"],input[type="week"],input[type="time"],input[type="datetime"],input[type="datetime-local"],input[type="color"],textarea{color:#555;background:#fff;border:1px solid '.$main_border_color,'input[type="text"],input[type="email"],input[type="url"],input[type="password"],input[type="number"],input[type="tel"],input[type="range"],input[type="date"],input[type="month"],input[type="week"],input[type="time"],input[type="datetime"],input[type="datetime-local"],input[type="color"],textarea{color:#555;background:#fff;border:1px solid '.$skin_color[1],$css[15]);





		$css[15] = str_replace( '.widget_calendar tbody a{background:'.$link_color.';color:#fff','.widget_calendar tbody a{background:'.$link_color.';color:'.$skin_color[11],$css[15]);

		$css[15] = str_replace( '.widget_calendar tbody a{background:'.$link_color,'.widget_calendar tbody a{background:'.$skin_color[1],$css[15]);
		$css[15] = str_replace( '.widget_calendar tbody a:hover,.widget_calendar tbody a:focus{background:'.$hover_color,'.widget_calendar tbody a:hover,.widget_calendar tbody a:focus{background:'.$skin_color[2],$css[15]);
		$css[15] = str_replace( '.search_field{border:solid 1px '.$main_border_color,'.search_field{border:solid 1px '.$skin_color[1],$css[15]);






		$css[15] = str_replace( '.page-links>span,.nav-links .current{background:'.$button_background_color.';color:#fff','.page-links>span,.nav-links .current{background:'.$button_background_color.';color:'.$skin_color[11],$css[15]);
		$css[15] = str_replace( '.page-links>span,.nav-links .current{background:'.$button_background_color,'.page-links>span,.nav-links .current{background:'.$skin_color[1],$css[15]);
		$css[15] = str_replace( '.page-links a,.page-links>span,.page-numbers{border:1px solid '.$main_border_color,'.page-links a,.page-links>span,.page-numbers{border:1px solid '.$skin_color[1],$css[15]);



	}



	if($skin != 'none'){
		$css[15] = str_replace( '.wp-caption{border:1px solid '.$main_border_color.';background:'.$main_background_color,'.wp-caption{border:1px solid '.$main_border_color.';background:'.$skin_color[4],$css[15]);
		$css[15] = str_replace( '.wp-caption{border:1px solid '.$main_border_color,'.wp-caption{border:1px solid '.$skin_color[1],$css[15]);
	}


	
	$css[16] = simple_days_get_css_file( '016_link.min.css' );


	
	$mod = get_theme_mod('link_textcolor');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[1];
	if ( ! empty( $mod ) ) {
		$css[16] = str_replace( $link_color,$mod,$css[16]);
	}

	
	$mod = get_theme_mod('link_hover_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[2];
	if ( ! empty( $mod ) ) {
		$css[16] = str_replace( $hover_color,$mod,$css[16]);
	}



	
	$css[20] = simple_days_get_css_file( '020_font.min.css' );







	
	//$css[25] = simple_days_get_css_file( '025_heading.min.css' );




	
	$css[30] = simple_days_get_css_file( '030_sd_base.min.css' );


	
	if ( get_theme_mod( 'simple_days_header_shadow',false) ) {
		$css[30] = str_replace( '#h_wrap{','#h_wrap{-webkit-box-shadow:0 2px 2px 0 rgba(0,0,0,0.14),0 3px 1px -2px rgba(0,0,0,0.12),0 1px 5px 0 rgba(0,0,0,0.2);box-shadow:0 2px 2px 0 rgba(0,0,0,0.14),0 3px 1px -2px rgba(0,0,0,0.12),0 1px 5px 0 rgba(0,0,0,0.2);-webkit-border-radius:2px;border-radius:2px;',$css[30]);
	}

	
	$mod = get_theme_mod('simple_days_wrap_flame_maxwidth');
	if ( ! empty( $mod ) ) {
		$css[30] = str_replace( '.wrap_frame{max-width:1296','.wrap_frame{max-width:'.$mod,$css[30]);
	}

	
	$mod = get_theme_mod('simple_days_logo_image_height');
	if ( ! empty( $mod ) ) {
		$css[30] = str_replace( '.header_logo{max-width:300px;max-height:60','.header_logo{max-width:300px;max-height:'.$mod,$css[30]);
	}
	$mod = get_theme_mod('simple_days_logo_image_width');
	if ( ! empty( $mod ) ) {
		$css[30] = str_replace( '.header_logo{max-width:300','.header_logo{max-width:'.$mod,$css[30]);
	}

	$mod = get_theme_mod('simple_days_footer_logo_image_height');
	if ( ! empty( $mod ) ) {
		$css[30] = str_replace( '.footer_logo{max-width:300px;max-height:60','.footer_logo{max-width:300px;max-height:'.$mod,$css[30]);
	}
	$mod = get_theme_mod('simple_days_footer_logo_image_width');
	if ( ! empty( $mod ) ) {
		$css[30] = str_replace( '.footer_logo{max-width:300','.footer_logo{max-width:'.$mod,$css[30]);
	}


	
	$mod = get_theme_mod('blog_name');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[11];

	if( !empty( $mod ) ){
		$css[30] = str_replace( '.title_text{','.title_text a{color:'.$mod.'}.title_text{',$css[30]);
  //$css[30] = $css[30].'.site_title a{font-family:'.$font_site_title.';color:'.$mod.'}';
	}
	if( $font_site_title !== ''){
		$css[30] = str_replace( '.title_text{','.title_text{font-family:'.$font_site_title.';',$css[30]);
  //$css[30] = $css[30].'.site_title a{font-family:'.$font_site_title.';color:'.$mod.'}';
	}


  //if ( !is_active_sidebar( 'footer-1' ) && !is_active_sidebar( 'footer-2' ) && !is_active_sidebar( 'footer-3' )){
    //$css[30] = str_replace( '.f_widget_wrap{background:#474747;','.f_widget_wrap{background:transparent;',$css[30]);
  //}else{
	$mod = get_theme_mod('footer_widget_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[1];
	if ( ! empty( $mod ) ) {
		$css[30] = str_replace( '.f_widget_wrap{background:#474747;','.f_widget_wrap{background:'.$mod.';',$css[30]);
	}
	$mod = get_theme_mod('footer_widget_textcolor');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[11];
	if ( ! empty( $mod ) ) {
		$css[30] = str_replace( '#d4d4d4',$mod,$css[30]);
	}
	$mod = get_theme_mod('footer_widget_linkcolor');
	if ( ! empty( $mod ) ) {
		$css[30] = str_replace( '#222',$mod,$css[30]);
	}
	if($skin != 'none'){
		$css[30] = str_replace( '.f_widget_wrap a:not(.icon_base):not(.to_top):hover:not(.non_hover){color:'.$hover_color,'.f_widget_wrap a:not(.icon_base):not(.to_top):hover:not(.non_hover){color:'.$skin_color[2],$css[30]);
		$css[30] = str_replace( '.f_widget_wrap a:not(.icon_base):not(.to_top){color:#fff','.f_widget_wrap a:not(.icon_base):not(.to_top){color:'.$skin_color[11],$css[30]);
	}

	$mod = get_theme_mod('tagline_color');
	if ( empty( $mod ) && $skin != 'none' ) $mod = $skin_color[11];
	if ( ! empty( $mod ) ) {
		$css[30] = str_replace( '.tagline{','.tagline{color:'.$mod.';',$css[30]);
	}

	$mod = get_theme_mod('header_menu_bg_color');
    //if ( empty( $mod ) && $skin != 'none' && ($menu_layout === '1' || $menu_layout === '2' )  ) $mod = $skin_color[11];
	if ( ! empty( $mod ) ) {
		$css[30] .= '.menu_h li{background:'.$mod.'}';
	}
	$mod = get_theme_mod('header_menu_bg_color_hover');
	if ( empty( $mod ) && $skin != 'none' && ($menu_layout === '3' || $menu_layout === '4' )  ) $mod = $skin_color[3];
	if ( ! empty( $mod ) ) {
		$css[30] .= '.menu_h li:hover{background:'.$mod.'}';
	}

	$mod = get_theme_mod('header_menu_font_color');
	if ( empty( $mod ) && $skin != 'none' && ($menu_layout === '1' || $menu_layout === '2' )  ) $mod = $skin_color[11];
	if ( ! empty( $mod ) ) {
		$css[30] = str_replace( '.menu_h li a{','.menu_h li a{color:'.$mod.';',$css[30]);
	}

	$mod = get_theme_mod('header_menu_font_color_hover');
	if ( empty( $mod ) && $skin != 'none' && ($menu_layout === '1' || $menu_layout === '2' )  ) $mod = $skin_color[11];
	if ( empty( $mod ) && $skin != 'none' && ($menu_layout === '3' || $menu_layout === '4' )  ) $mod = $skin_color[11];
	if ( ! empty( $mod ) ) {
		$css[30] .= '.menu_h li:hover a{color:'.$mod.'}';
	}


	$mod = get_theme_mod('header_menu_children_bg_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[3];
	if ( ! empty( $mod ) ) {
		$css[30] = str_replace( '.menu_h .sub-menu li{background:#fff','.menu_h .sub-menu li{background:'.$mod,$css[30]);
	}

	$mod = get_theme_mod('header_menu_children_font_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[11];
	if ( ! empty( $mod ) ) {
		$css[30] .= '.menu_h .sub-menu li a{color:'.$mod.'}';
	}

	$mod = get_theme_mod('header_menu_children_bg_color_hover');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[5];
	if ( ! empty( $mod ) ) {
		$css[30] = str_replace( '.menu_h .sub-menu li:hover{background:'.$main_font_color,'.menu_h .sub-menu li:hover{background:'.$mod,$css[30]);
	}

	$mod = get_theme_mod('header_menu_children_font_color_hover');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[3];
	if ( ! empty( $mod ) ) {
		$css[30] = str_replace( '.menu_h .sub-menu li:hover>a,.menu_h .sub-menu li:hover>div a{color:'.$reverse_color,'.menu_h .sub-menu li:hover>a,.menu_h .sub-menu li:hover>div a{color:'.$mod,$css[30]);
	}







  //}

	$mod = get_theme_mod('credit_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[4];
	if ( ! empty( $mod ) ) {
		$css[30] = str_replace( '.credit_wrap{background:#33363b;color:#777','.credit_wrap{background:#33363b;color:'.$mod,$css[30]);
	}

	$mod = simple_days_get_gradient('footer_credit');
	if( empty( $mod )  )
		$mod = get_theme_mod('footer_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[3];
	if ( ! empty( $mod ) ) {
		$css[30] = str_replace( '.credit_wrap{background:#33363b','.credit_wrap{background:'.$mod,$css[30]);
	}

	$mod = get_theme_mod('credit_link_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[11];
	if ( ! empty( $mod ) ) {
		$css[30] = str_replace( '.credit_wrap a{color:#fff','.credit_wrap a{color:'.$mod,$css[30]);
	}

	$mod = simple_days_get_gradient('header_over');
	if( empty( $mod )  )
		$mod = get_theme_mod('oh_wrap_bg_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[3];
	if ( ! empty( $mod ) ) {
		$css[30] = str_replace( '#oh_wrap{background:#33363b','#oh_wrap{background:'.$mod,$css[30]);
	}




	$mod = simple_days_get_gradient('header_header');
	if( empty( $mod )  )
		$mod = get_theme_mod('header_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[1];
	if ( ! empty( $mod ) ) {
		$css[30] .= '#h_wrap{background:'.$mod.'}';
	}


	$mod = get_theme_mod('header_nav_h2_bg_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[5];
	if ( ! empty( $mod ) ) {
		$css[30] = str_replace( '.nav_h2{background:#fff','.nav_h2{background:'.$mod,$css[30]);
	}

	$mod = get_theme_mod('f_menu_wrap_bg_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[5];
	if ( ! empty( $mod ) ) {
		$css[30] = str_replace( '#menu_f{background:#f1f1f1','#menu_f{background:'.$mod,$css[30]);
	}

	$mod = get_theme_mod('sub_menu_bg_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[5];
	if ( ! empty( $mod ) ) {
		$css[30] = str_replace( '#menu_sub{background:#f1f1f1','#menu_sub{background:'.$mod,$css[30]);
	}






	$mod = get_theme_mod('humberger_menu_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[11];
	if ( ! empty( $mod ) ) {
		$css[30] = str_replace( '.humberger:before,.humberger:after{background:'.$main_font_color,'.humberger:before,.humberger:after{background:'.$mod,$css[30]);

		$css[30] = str_replace( '.humberger:before{-webkit-box-shadow:'.$main_font_color.' 0 6px 0;box-shadow:'.$main_font_color,'.humberger:before{-webkit-box-shadow:'.$mod.' 0 6px 0;box-shadow:'.$mod,$css[30]);

  //$css[30] = str_replace( '.humberger:before{-webkit-box-shadow:#555','.humberger:before{-webkit-box-shadow:'.$mod,$css[30]);
	}

	$mod = get_theme_mod('search_menu_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[11];
	if ( ! empty( $mod ) ) {
		$css[30] .= '.serach_box{color:'.$mod.'}';

	}


	if($skin != 'none'){

		$css[30] = str_replace( '.o_s_t::-webkit-scrollbar-thumb{background:'.$link_color,'.o_s_t::-webkit-scrollbar-thumb{background:'.$skin_color[1],$css[30]);

		$css[30] = str_replace( '.drop_icon{background:'.$main_border_color,'.drop_icon{background:'.$skin_color[4].';color:'.$skin_color[2],$css[30]);


    //$css[30] = $css[30] . '.credit_wrap a{color:'.$skin_color[2].'}';
		//$css[30] = $css[30] . '.menu_h a{color:'.$skin_color[11].'}';
		//$css[30] = $css[30] . '#menu_f>li>a,.nav_h2 #menu_h>li>a{color:'.$skin_color[3].'}';

	}


	$awsome_b = $awsome_a = '';
	$icon_before_after = 'before';
	$header_footer = array('h','f');

	foreach ($header_footer as $value) {
		$i = 1;
		while($i <= 10){
			$icon_color = get_theme_mod( 'simple_days_menu_bar_'.$value.'_icon_color_'.$i,'');
			$icon_content = get_theme_mod( 'simple_days_menu_bar_'.$value.'_icon_'.$i,'none');
			if($icon_content != 'none'){
				if($icon_color != '')$icon_color = 'color:'.$icon_color.';';
				
				if(get_theme_mod( 'simple_days_menu_bar_'.$value.'_icon_after_'.$i,false)){
					$icon_before_after = 'after';
					$awsome_a = '1';
				}else{
					$awsome_b = '1';
				}

				$css[30] = $css[30]. '#menu_'.$value.'>li:nth-child('.$i.')>a:'.$icon_before_after.',#menu_'.$value.'>li:nth-child('.$i.')>div>a:'.$icon_before_after.'{'.$icon_color.'content:"\\'.$icon_content.'"}';
			}
			$icon_before_after = 'before';
			$icon_color = '';
			$i++;
		}
	}


	if($awsome_b == '1'){
		$css[30] = $css[30]. '.menu_i>li>a:before,.menu_i>li>div>a:before{font-family:FontAwesome;margin-right:4px}';
	}
	if($awsome_a == '1'){
		$css[30] = $css[30]. '.menu_i>li>a:after,.menu_i>li>div>a:after{font-family:FontAwesome;margin-left:4px}';
	}

	if( get_theme_mod( 'simple_days_sticky_header',false)){
		$css[30] = $css[30]. '.h_sticky{position:-webkit-sticky;position:sticky;top:0;z-index:9}';
	}

	$mod = get_theme_mod( 'simple_days_humberger_menu_spin','1125');
	if( $mod != '1125'){
		$css[30] = str_replace( '1125deg',$mod.'deg',$css[30]);
	}
	$mod = get_theme_mod( 'simple_days_humberger_menu_spin_speed',0.8);
	if( $mod != 0.8){
		$css[30] = str_replace( '.8s',$mod.'s',$css[30]);
	}


	$mod = get_theme_mod( 'simple_days_humberger_menu_right',false);
	if( $mod != false){
		$css[30] = str_replace( '.bar_box{left:0','.bar_box{right:0',$css[30]);
		$css[30] = str_replace( '.serach_box{right:0','.serach_box{left:0',$css[30]);
	}

	if( get_theme_mod( 'simple_days_alert_box',false)){
		$css[30] = $css[30]. '#h_alert{';
		if( get_theme_mod( 'simple_days_alert_box_bg_color','')){
			$css[30] = $css[30]. 'background:'.get_theme_mod( 'simple_days_alert_box_bg_color','').';';
		}
		if( get_theme_mod( 'simple_days_alert_box_color','')){
			$css[30] = $css[30]. 'color:'.get_theme_mod( 'simple_days_alert_box_color','').';';
		}
		if( get_theme_mod( 'simple_days_alert_box_text_position','center') != 'left'){
			$css[30] = $css[30]. 'text-align:'.get_theme_mod( 'simple_days_alert_box_text_position','center').';';
		}
		if( get_theme_mod( 'simple_days_alert_box_text_size',16) != 16){
			$css[30] = $css[30]. 'font-size:'.get_theme_mod( 'simple_days_alert_box_text_size',16).'px;';
		}
		$alert_box_border['type'] = get_theme_mod( 'simple_days_alert_box_border_type','none');
		if( $alert_box_border['type'] != 'none' && !get_theme_mod( 'simple_days_alert_box_border_inside',false)){
			$alert_box_border['width'] = get_theme_mod( 'simple_days_alert_box_border_width',1);
			$css[30] = $css[30]. 'border:'.$alert_box_border['type'].' '.$alert_box_border['width'].'px '.get_theme_mod( 'simple_days_alert_box_border_color','');
		}
		$css[30] = $css[30]. '}';
		if( $alert_box_border['type'] != 'none' && get_theme_mod( 'simple_days_alert_box_border_inside',false)){
			$alert_box_border['width'] = get_theme_mod( 'simple_days_alert_box_border_width',1);
			$css[30] = $css[30]. '#h_alert_box{padding:0 10px;display:inline-block;border:'.$alert_box_border['type'].' '.$alert_box_border['width'].'px '.get_theme_mod( 'simple_days_alert_box_border_color','').'}';
		}
	}


	$mod = get_theme_mod('sub_menu_link_color');
	if ( ! empty( $mod ) ) {
		$css[30] = $css[30].'#nav_s a{color:'.$mod.'}';
	}

	$mod = get_theme_mod('sub_menu_link_hover_color');
	if ( ! empty( $mod ) ) {
		$css[30] = $css[30].'#nav_s a:hover{color:'.$mod.'}';
	}

	$mod = get_theme_mod('footer_menu_link_color');
	if ( ! empty( $mod ) ) {
		$css[30] = $css[30].'#nav_f a{color:'.$mod.'}';
	}
	$mod = get_theme_mod('footer_menu_link_hover_color');
	if ( ! empty( $mod ) ) {
		$css[30] = $css[30].'#nav_f a:hover{color:'.$mod.'}';
	}




	
	if(get_theme_mod('simple_days_back_to_top_button',true)){
		$css[35] = simple_days_get_css_file( '035_sd_to_top.min.css' );


		if (get_theme_mod( 'simple_days_header_shadow',true) or get_theme_mod( 'simple_days_box_style','flat') == 'shadow') {
			$css[35] = str_replace( 'border-radius:50px 50px 0 0}','border-radius:50px 50px 0 0;box-shadow:0 4px 16px black}',$css[35]);
		}

		$mod = get_theme_mod('to_top_color');
		if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[3];
		if ( ! empty( $mod ) ) {
			$css[35] = str_replace( '.to_top{background:#ccc;color:#777','.to_top{background:#ccc;color:'.$mod,$css[35]);
		}
		$mod = get_theme_mod('to_top_bg_color');
		if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[5];
		if ( ! empty( $mod ) ) {
			$css[35] = str_replace( '.to_top{background:#ccc','.to_top{background:'.$mod,$css[35]);
		}
		$mod = get_theme_mod('to_top_hover_color');
		if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[11];
		if ( ! empty( $mod ) ) {
			$css[35] = str_replace( '.to_top:hover{color:#fff','.to_top:hover{color:'.$mod,$css[35]);
		}
		$mod = get_theme_mod('to_top_bg_hover_color');
		if ( ! empty( $mod ) ) {
			$css[35] = str_replace( '.to_top:hover{','.to_top:hover{background:'.$mod.';',$css[35]);
		}

	}

	
	$css[50] = simple_days_get_css_file( '050_sd_index.min.css' );


	if(get_theme_mod( 'simple_days_index_thumbnail','left') == 'right'){
		$css[50] = str_replace( '.post_card_thum{','.post_card_thum{-webkit-box-ordinal-group:3;-ms-flex-order:3;-webkit-order:3;order:3;',$css[50]);
	}


	$border_angle = array('top' , 'right' , 'bottom' , 'left');

	$mod = get_theme_mod( 'simple_days_index_card_bg_color');
	if( ! empty( $mod ) ) $css[50] =  str_replace( '.post_card{background:#fff','.post_card{background:'.$mod,$css[50]);

	$mod = get_theme_mod( 'simple_days_index_title_text_size');
	if( ! empty( $mod ) ) $css[50] =  str_replace( '.post_card_title{font-size:21','.post_card_title{font-size:'.$mod,$css[50]);

	$mod = get_theme_mod( 'simple_days_index_title_font_weight');
	if( ! empty( $mod ) ) $css[50] =  str_replace( '.post_card_title{','.post_card_title{font-weight:'.$mod.';',$css[50]);

	$mod = get_theme_mod('simple_days_index_title_text_color');
	if ( ! empty( $mod ) ) $css[50] =  $css[50].'.entry_title{color:'.$mod.'}';
	$mod = get_theme_mod('simple_days_index_title_text_hover_color');
	if ( ! empty( $mod ) ) $css[50] =  $css[50].'.entry_title:hover{color:'.$mod.'}';

	$mod = get_theme_mod('simple_days_index_title_text_position','left');
	if ( $mod != 'left' ) $css[50] =  str_replace( '.post_card_title{','.post_card_title{text-align:'.$mod.';',$css[50]);


	$mod = simple_days_get_gradient('index_title',get_theme_mod('simple_days_index_title_background_image'));
	if( empty( $mod )  )
		$mod = get_theme_mod('simple_days_index_title_background_color');
	$mod2 = get_theme_mod('simple_days_index_title_background_image');







	if ( ! empty( $mod ) && ! empty( $mod2 ) ){

		if(strpos($mod,'-gradient') === false){
			$css[50] =  str_replace( '.post_card_title{','.post_card_title{background:'.$mod.' url('.$mod2.');',$css[50]);
		}else{
			$css[50] =  str_replace( '.post_card_title{','.post_card_title{background:'.$mod.';',$css[50]);
		}


	}else{
		if ( ! empty( $mod ) ) $css[50] =  str_replace( '.post_card_title{','.post_card_title{background:'.$mod.';',$css[50]);


		if ( ! empty( $mod2 ) ) $css[50] =  str_replace( '.post_card_title{','.post_card_title{background-image:url('.$mod2.');',$css[50]);
	}


	$border = '';
	$border_style = $border_width = $border_color = array();
	$judge = false;
	$j = 1;

	while($j < 5){
		$border_style['all_'.$j] = '';
		$border_width['all_'.$j] = '';
		$border_color['all_'.$j] = '';
		++$j;
	}

	foreach ($border_angle as $value) {
		$border_style[$value] = get_theme_mod('simple_days_index_title_border_'.$value.'_style','none');
		$border_width[$value] = get_theme_mod('simple_days_index_title_border_'.$value.'_width',1);
		$border_color[$value] = get_theme_mod('simple_days_index_title_border_'.$value.'_color');
		if($border_color[$value] === '')$border_color[$value] = 'transparent';
		if($border_style[$value] != 'none')$judge = true;
	}

	if($judge){
		$border_style = simple_days_create_border_style($border_style);
		$border_width = simple_days_create_border_width($border_width);
		$border_color = simple_days_create_border_color($border_color);

		$border = simple_days_create_border($border_style,$border_width,$border_color);

		$css[50] =  str_replace( '.post_card_title{','.post_card_title{'.$border,$css[50]);

	}


	
	$p_m = array('padding','margin');
	foreach ($p_m as $value) {
		$mod = get_theme_mod('simple_days_index_title_'.$value.'_top',0);
		$mod2 = get_theme_mod('simple_days_index_title_'.$value.'_right',0);
		$mod3 = get_theme_mod('simple_days_index_title_'.$value.'_bottom',0);
		$mod4 = get_theme_mod('simple_days_index_title_'.$value.'_left',0);

		if($mod + $mod2 + $mod3 + $mod4 != 0){
			if($mod != 0)$mod = $mod.'px';
			if($mod2 != 0)$mod2 = $mod2.'px';
			if($mod3 != 0)$mod3 = $mod3.'px';
			if($mod4 != 0)$mod4 = $mod4.'px';
			if($value == 'margin')$css[50] = str_replace( 'margin-bottom:10px}','}',$css[50]);
			if($mod == $mod2 && $mod2 == $mod3 && $mod3 == $mod4){
				$css[50] =  str_replace( '.post_card_title{','.post_card_title{'.$value.':'.$mod.';',$css[50]);
			}elseif($mod == $mod3 && $mod2 == $mod4){
				$css[50] =  str_replace( '.post_card_title{','.post_card_title{'.$value.':'.$mod.' '.$mod2.';',$css[50]);
			}elseif($mod != $mod3 && $mod2 == $mod4){
				$css[50] =  str_replace( '.post_card_title{','.post_card_title{'.$value.':'.$mod.' '.$mod2.' '.$mod3.';',$css[50]);
			}else{
				$css[50] =  str_replace( '.post_card_title{','.post_card_title{'.$value.':'.$mod.' '.$mod2.' '.$mod3.' '.$mod4.';',$css[50]);
			}
		}

	}


	
	$mod = get_theme_mod('simple_days_index_title_border_radius_top_left',0);
	$mod2 = get_theme_mod('simple_days_index_title_border_radius_top_right',0);
	$mod3 = get_theme_mod('simple_days_index_title_border_radius_bottom_left',0);
	$mod4 = get_theme_mod('simple_days_index_title_border_radius_bottom_right',0);

	if($mod + $mod2 + $mod3 + $mod4 != 0){
		if($mod != 0)$mod = $mod.'px';
		if($mod2 != 0)$mod2 = $mod2.'px';
		if($mod3 != 0)$mod3 = $mod3.'px';
		if($mod4 != 0)$mod4 = $mod4.'px';
		if($mod == $mod2 && $mod2 == $mod3 && $mod3 == $mod4){
			$css[50] =  str_replace( '.post_card_title{','.post_card_title{border-radius:'.$mod.';',$css[50]);
		}elseif($mod == $mod3 && $mod2 == $mod4){
			$css[50] =  str_replace( '.post_card_title{','.post_card_title{border-radius:'.$mod.' '.$mod2.';',$css[50]);
		}elseif($mod != $mod3 && $mod2 == $mod4){
			$css[50] =  str_replace( '.post_card_title{','.post_card_title{border-radius:'.$mod.' '.$mod2.' '.$mod3.';',$css[50]);
		}else{
			$css[50] =  str_replace( '.post_card_title{','.post_card_title{border-radius:'.$mod.' '.$mod2.' '.$mod3.' '.$mod4.';',$css[50]);
		}
	}

	if(get_theme_mod( 'simple_days_index_title_balloon',false)){
		$css[50] =  str_replace( '.post_card_title{','.post_card_title{position:relative;',$css[50]);
		$css[50] =  $css[50].'.post_card_title:after{position:absolute;content:\'\';top:100%;left:'.get_theme_mod( 'simple_days_index_title_balloon_position',30).'px;border:'.get_theme_mod( 'simple_days_index_title_balloon_width',15).'px solid transparent;border-top:'.get_theme_mod( 'simple_days_index_title_balloon_height',15).'px solid '.get_theme_mod( 'simple_days_index_title_balloon_color').';width:0;height:0;}';


	}












	
	$css[51] = simple_days_get_css_file( '051_sd_index_category.min.css' );


	$mod = get_theme_mod('simple_days_index_category_bg_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[1];
	if ( ! empty( $mod ) ) {
		$css[51] = str_replace( 'background:'.$button_background_color,'background:'.$mod,$css[51]);
	}

	$mod = get_theme_mod('simple_days_index_category_text_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[11];
	if ( ! empty( $mod ) ) {
		$css[51] = str_replace( 'color:#fff','color:'.$mod,$css[51]);
	}

	$mod = get_theme_mod('simple_days_index_category_border_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[1];
	if ( ! empty( $mod ) ) {
		$css[51] = str_replace( 'border:1px solid #333','border:1px solid '.$mod,$css[51]);
	}




	$mod = get_theme_mod('simple_days_index_category_bg_hover_color');
	if ( ! empty( $mod ) ) {
		$css[51] = str_replace( 'background:#707070','background:'.$mod,$css[51]);
	}

	$mod = get_theme_mod('simple_days_index_category_text_hover_color');
	if ( ! empty( $mod ) ) {
		$css[51] = str_replace( '.post_card_category:hover{','.post_card_category:hover{color:'.$mod.';',$css[51]);
	}

	$mod = get_theme_mod('simple_days_index_category_border_hover_color');
	if ( ! empty( $mod ) ) {
		$css[51] = str_replace( 'border-color:#707070','border-color:'.$mod,$css[51]);
	}

	if(get_theme_mod( 'simple_days_index_category_position','right') === 'left'){
		$css[51] = str_replace( 'right:0;','left:0;',$css[51]);
	}

	

	$css[52] = simple_days_get_css_file( '052_sd_index_date.min.css' );


	if(get_theme_mod( 'simple_days_top_date_wrap','1') == '2'){
		$css[52] = str_replace( 'border-radius:50%','border-radius:2px',$css[52]);
	}

	$mod = get_theme_mod('simple_days_index_date_bg_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[1];
	if ( ! empty( $mod ) ) {
		$css[52] = str_replace( '#333',$mod,$css[52]);
	}

	$mod = get_theme_mod('simple_days_index_date_text_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[11];
	if ( ! empty( $mod ) ) {
		$css[52] = str_replace( 'color:#fff','color:'.$mod,$css[52]);
	}

	$mod = get_theme_mod('simple_days_index_date_separator_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[11];
	if ( ! empty( $mod ) ) {
		$css[52] = str_replace( 'solid #fff','solid '.$mod,$css[52]);
	}

	if(get_theme_mod( 'simple_days_index_date_position','left') === 'right'){
		$css[52] = str_replace( 'left:0','right:0',$css[52]);
		$css[52] = str_replace( '.index_time{right:0;','.index_time{left:0;',$css[52]);
	}

	
	$css[53] = simple_days_get_css_file( '053_sd_index_more.min.css' );


	
	$mod = get_theme_mod( 'simple_days_read_more_position','right');
	if( $mod != 'right' && $mod != 'none'){
		$css[53] = str_replace( 'text-align:right','text-align:'.$mod,$css[53]);
	}

	$mod = get_theme_mod('simple_days_index_read_more_text_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[1];
	if ( ! empty( $mod ) ) {
		$css[53] = str_replace( '.more_read{','.more_read{color:'.$mod.';',$css[53]);
	}
	$mod = get_theme_mod('simple_days_index_read_more_bg_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[11];
	if ( ! empty( $mod ) ) {
		$css[53] = str_replace( '.more_read{','.more_read{background:'.$mod.';',$css[53]);
	}
	$mod = get_theme_mod('simple_days_index_read_more_border_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[1];
	if ( ! empty( $mod ) ) {
		$css[53] = str_replace( 'border:1px solid #eee','border:1px solid '.$mod,$css[53]);
	}


	$mod = get_theme_mod('simple_days_index_read_more_border_hover_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[1];
	if ( ! empty( $mod ) ) {
		$css[53] = str_replace( '.more_read:hover{background:#222;color:#fff;border-color:#222','.more_read:hover{background:#222;color:#fff;border-color:'.$mod,$css[53]);
	}
	$mod = get_theme_mod('simple_days_index_read_more_text_hover_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[12];
	if ( ! empty( $mod ) ) {
		$css[53] = str_replace( '.more_read:hover{background:#222;color:#fff','.more_read:hover{background:#222;color:'.$mod.';',$css[53]);
	}
	$mod = get_theme_mod('simple_days_index_read_more_bg_hover_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[1];
	if ( ! empty( $mod ) ) {
		$css[53] = str_replace( '.more_read:hover{background:#222','.more_read:hover{background:'.$mod.';',$css[53]);
	}

	
	$css[60] = simple_days_get_css_file( '060_sd_post.min.css' );


	
	if($font_post_title != ''){
		$css[60] = str_replace( 'h1.post_title{','h1.post_title{font-family:'.$font_post_title.';',$css[60]);
	}

	$mod = get_theme_mod('simple_days_post_title_text_position','left');
	if ( $mod != 'left' ) $css[60] =  str_replace( 'h1.post_title{','h1.post_title{text-align:'.$mod.';',$css[60]);

	$mod = get_theme_mod( 'main_content_bg_color');
	if( ! empty( $mod ) ) $css[60] =  str_replace( '.post_content{background:#fff','.post_content{background:'.$mod,$css[60]);

	$mod = get_theme_mod( 'simple_days_post_title_text_color');
	if( ! empty( $mod ) ) $css[60] =  str_replace( 'h1.post_title{','h1.post_title{color:'.$mod.';',$css[60]);


	
	$mod = get_theme_mod('simple_days_post_anchor_underline' , true);
	if ( !$mod ) {
		$css[60] =  str_replace( '.post_body a{text-decoration:underline;text-decoration-thickness:1px;text-underline-offset:3px;text-decoration-skip-ink:all}.post_body a:hover{text-decoration-style:dotted;text-decoration-skip-ink:none}','',$css[60]);
	}





	$mod = get_theme_mod( 'simple_days_post_title_background_color');
	$mod2 = get_theme_mod('simple_days_post_title_background_image');

	if( ! empty( $mod ) && ! empty( $mod2 ) ){
		$css[60] .= '.post_item>h1.post_title{background:'.$mod.' url('.$mod2.')}';
	}else{
		if( ! empty( $mod ) ) $css[60] .= '.post_item>h1.post_title{background:'.$mod.'}';
		if ( ! empty( $mod2 ) ) $css[60] .= '.post_item>h1.post_title{background:url('.$mod2.')}';
	}

	$border = '';
	$border_style = $border_width = $border_color = array();
	$judge = false;
	$i = 1;

	while($i < 5){
		$border_style['all_'.$i] = '';
		$border_width['all_'.$i] = '';
		$border_color['all_'.$i] = '';
		++$i;
	}

	foreach ($border_angle as $value) {
		$border_style[$value] = get_theme_mod('simple_days_post_title_border_'.$value.'_style','none');
		$border_width[$value] = get_theme_mod('simple_days_post_title_border_'.$value.'_width',1);
		$border_color[$value] = get_theme_mod('simple_days_post_title_border_'.$value.'_color');
		if($border_color[$value] === '')$border_color[$value] = 'transparent';
		if($border_style[$value] != 'none')$judge = true;
	}

	if($judge){
		$border_style = simple_days_create_border_style($border_style);
		$border_width = simple_days_create_border_width($border_width);
		$border_color = simple_days_create_border_color($border_color);

		$border = simple_days_create_border($border_style,$border_width,$border_color);

		$css[60] =  str_replace( 'h1.post_title{','h1.post_title{'.$border,$css[60]);

	}





	
	$p_m = array('padding','margin');
	foreach ($p_m as $value) {
		$mod = get_theme_mod('simple_days_post_title_'.$value.'_top',0);
		$mod2 = get_theme_mod('simple_days_post_title_'.$value.'_right',0);
		$mod3 = get_theme_mod('simple_days_post_title_'.$value.'_bottom',0);
		$mod4 = get_theme_mod('simple_days_post_title_'.$value.'_left',0);

		if($mod + $mod2 + $mod3 + $mod4 != 0){
			if($mod != 0)$mod = $mod.'px';
			if($mod2 != 0)$mod2 = $mod2.'px';
			if($mod3 != 0)$mod3 = $mod3.'px';
			if($mod4 != 0)$mod4 = $mod4.'px';
			if($mod == $mod2 && $mod2 == $mod3 && $mod3 == $mod4){
				$css[60] =  str_replace( 'h1.post_title{','h1.post_title{'.$value.':'.$mod.';',$css[60]);
			}elseif($mod == $mod3 && $mod2 == $mod4){
				$css[60] =  str_replace( 'h1.post_title{','h1.post_title{'.$value.':'.$mod.' '.$mod2.';',$css[60]);
			}elseif($mod != $mod3 && $mod2 == $mod4){
				$css[60] =  str_replace( 'h1.post_title{','h1.post_title{'.$value.':'.$mod.' '.$mod2.' '.$mod3.';',$css[60]);
			}else{
				$css[60] =  str_replace( 'h1.post_title{','h1.post_title{'.$value.':'.$mod.' '.$mod2.' '.$mod3.' '.$mod4.';',$css[60]);
			}
		}

	}


	
	$mod = get_theme_mod('simple_days_post_title_border_radius_top_left',0);
	$mod2 = get_theme_mod('simple_days_post_title_border_radius_top_right',0);
	$mod3 = get_theme_mod('simple_days_post_title_border_radius_bottom_left',0);
	$mod4 = get_theme_mod('simple_days_post_title_border_radius_bottom_right',0);

	if($mod + $mod2 + $mod3 + $mod4 != 0){
		if($mod != 0)$mod = $mod.'px';
		if($mod2 != 0)$mod2 = $mod2.'px';
		if($mod3 != 0)$mod3 = $mod3.'px';
		if($mod4 != 0)$mod4 = $mod4.'px';
		if($mod == $mod2 && $mod2 == $mod3 && $mod3 == $mod4){
			$css[60] =  str_replace( 'h1.post_title{','h1.post_title{border-radius:'.$mod.';',$css[60]);
		}elseif($mod == $mod3 && $mod2 == $mod4){
			$css[60] =  str_replace( 'h1.post_title{','h1.post_title{border-radius:'.$mod.' '.$mod2.';',$css[60]);
		}elseif($mod != $mod3 && $mod2 == $mod4){
			$css[60] =  str_replace( 'h1.post_title{','h1.post_title{border-radius:'.$mod.' '.$mod2.' '.$mod3.';',$css[60]);
		}else{
			$css[60] =  str_replace( 'h1.post_title{','h1.post_title{border-radius:'.$mod.' '.$mod2.' '.$mod3.' '.$mod4.';',$css[60]);
		}
	}

	if(get_theme_mod( 'simple_days_post_title_balloon',false)){
		$css[60] =  str_replace( 'h1.post_title{','h1.post_title{position:relative;',$css[60]);
		$css[60] =  $css[60].'h1.post_title:after{position:absolute;content:\'\';top:100%;left:'.get_theme_mod( 'simple_days_post_title_balloon_position',30).'px;border:'.get_theme_mod( 'simple_days_post_title_balloon_width',15).'px solid transparent;border-top:'.get_theme_mod( 'simple_days_post_title_balloon_height',15).'px solid '.get_theme_mod( 'simple_days_post_title_balloon_color').';width:0;height:0;}';


	}











/*
	if(get_theme_mod( 'simple_days_breadcrumbs_display','left') == 'right'){
		$css[60] = str_replace( '.breadcrumb{','.breadcrumb{text-align:right;',$css[60]);
	}

	if(get_theme_mod( 'simple_days_pageview_position','right') != 'right'){
		$css[60] =  $css[60].'.page_view{text-align:'.get_theme_mod( 'simple_days_pageview_position','right').'}';
	}

	if(get_theme_mod( 'simple_days_posts_author_position','right') == 'left'){
		$css[60] =  $css[60].'.post_author{text-align:left}';
	}
	if(get_theme_mod( 'simple_days_posts_date_position','right') == 'left'){
		$css[60] =  $css[60].'.post_date{text-align:left}';
	}
	if(get_theme_mod( 'simple_days_page_author_position','none') == 'left'){
		$css[60] =  $css[60].'.page_author{text-align:left}';
	}
	if(get_theme_mod( 'simple_days_page_date_position','none') == 'left'){
		$css[60] =  $css[60].'.page_date{text-align:left}';
	}
*/


	$i = 2;
	$border_angle = array('top' , 'right' , 'bottom' , 'left');
	$heading_font_size = array(0,36,30,24,18,14,12);
	while ( $i < 7) {

		$mod = get_theme_mod( 'simple_days_post_heading_'.$i.'_text_size',$heading_font_size[$i]);
		if($mod != $heading_font_size[$i]) $css[60] =  str_replace( 'post_body>h'.$i.'{','post_body>h'.$i.'{font-size:'.$mod.'px;',$css[60]);

		$mod = get_theme_mod('simple_days_post_heading_'.$i.'_font_weight');
		if ( ! empty( $mod ) ) $css[60] =  str_replace( 'post_body>h'.$i.'{','post_body>h'.$i.'{font-weight:'.$mod.';',$css[60]);

		$mod = get_theme_mod('simple_days_post_heading_'.$i.'_text_color');
		if ( ! empty( $mod ) ) $css[60] =  str_replace( 'post_body>h'.$i.'{','post_body>h'.$i.'{color:'.$mod.';',$css[60]);

		$mod = get_theme_mod('simple_days_post_heading_'.$i.'_text_position','left');
		if ( $mod != 'left' ) $css[60] =  str_replace( 'post_body>h'.$i.'{','post_body>h'.$i.'{text-align:'.$mod.';',$css[60]);



		$mod = simple_days_get_gradient('post_heading_h'.$i , get_theme_mod('simple_days_post_heading_'.$i.'_background_image'));
		if( empty( $mod )  )$mod = get_theme_mod('simple_days_post_heading_'.$i.'_background_color');
		$mod2 = get_theme_mod('simple_days_post_heading_'.$i.'_background_image');

		if ( ! empty( $mod ) && ! empty( $mod2 ) ){

			if(strpos($mod,'-gradient') === false){
				$css[60] =  str_replace( 'post_body>h'.$i.'{','post_body>h'.$i.'{background:'.$mod.' url('.$mod2.');',$css[60]);
			}else{
				$css[60] =  str_replace( 'post_body>h'.$i.'{','post_body>h'.$i.'{background:'.$mod.';',$css[60]);
			}


		}else{
			if ( ! empty( $mod ) ) $css[60] =  str_replace( 'post_body>h'.$i.'{','post_body>h'.$i.'{background:'.$mod.';',$css[60]);
			if ( ! empty( $mod2 ) ) $css[60] =  str_replace( 'post_body>h'.$i.'{','post_body>h'.$i.'{background:url('.$mod2.');',$css[60]);
		}



		$border = '';
		$border_style = $border_width = $border_color = array();
		$judge = false;
		$j = 1;

		while($j < 5){
			$border_style['all_'.$j] = '';
			$border_width['all_'.$j] = '';
			$border_color['all_'.$j] = '';
			++$j;
		}

		foreach ($border_angle as $value) {
			$border_style[$value] = get_theme_mod('simple_days_post_heading_'.$i.'_border_'.$value.'_style','none');
			$border_width[$value] = get_theme_mod('simple_days_post_heading_'.$i.'_border_'.$value.'_width',1);
			$border_color[$value] = get_theme_mod('simple_days_post_heading_'.$i.'_border_'.$value.'_color');
			if($border_color[$value] === '')$border_color[$value] = 'transparent';
			if($border_style[$value] != 'none')$judge = true;
		}

		if($judge){
			$border_style = simple_days_create_border_style($border_style);
			$border_width = simple_days_create_border_width($border_width);
			$border_color = simple_days_create_border_color($border_color);

			$border = simple_days_create_border($border_style,$border_width,$border_color);

			$css[60] =  str_replace( 'post_body>h'.$i.'{','post_body>h'.$i.'{'.$border,$css[60]);

		}


		
		$p_m = array('padding','margin');
		foreach ($p_m as $value) {
			$mod = get_theme_mod('simple_days_post_heading_'.$i.'_'.$value.'_top',0);
			$mod2 = get_theme_mod('simple_days_post_heading_'.$i.'_'.$value.'_right',0);
			$mod3 = get_theme_mod('simple_days_post_heading_'.$i.'_'.$value.'_bottom',0);
			$mod4 = get_theme_mod('simple_days_post_heading_'.$i.'_'.$value.'_left',0);

			if($mod + $mod2 + $mod3 + $mod4 != 0){
				if($mod != 0)$mod = $mod.'px';
				if($mod2 != 0)$mod2 = $mod2.'px';
				if($mod3 != 0)$mod3 = $mod3.'px';
				if($mod4 != 0)$mod4 = $mod4.'px';
				if($value == 'margin' && $i == 2)$css[60] = str_replace( 'margin-top:30px}','}',$css[60]);
				if($value == 'margin' && $i == 3)$css[60] = str_replace( 'margin-top:28px}','}',$css[60]);
				if($value == 'margin' && $i == 4)$css[60] = str_replace( 'margin-top:26px}','}',$css[60]);
				if($mod == $mod2 && $mod2 == $mod3 && $mod3 == $mod4){
					$css[60] =  str_replace( 'post_body>h'.$i.'{','post_body>h'.$i.'{'.$value.':'.$mod.';',$css[60]);
				}elseif($mod == $mod3 && $mod2 == $mod4){
					$css[60] =  str_replace( 'post_body>h'.$i.'{','post_body>h'.$i.'{'.$value.':'.$mod.' '.$mod2.';',$css[60]);
				}elseif($mod != $mod3 && $mod2 == $mod4){
					$css[60] =  str_replace( 'post_body>h'.$i.'{','post_body>h'.$i.'{'.$value.':'.$mod.' '.$mod2.' '.$mod3.';',$css[60]);
				}else{
					$css[60] =  str_replace( 'post_body>h'.$i.'{','post_body>h'.$i.'{'.$value.':'.$mod.' '.$mod2.' '.$mod3.' '.$mod4.';',$css[60]);
				}
			}

		}


		
		$mod = get_theme_mod('simple_days_post_heading_'.$i.'_border_radius_top_left',0);
		$mod2 = get_theme_mod('simple_days_post_heading_'.$i.'_border_radius_top_right',0);
		$mod3 = get_theme_mod('simple_days_post_heading_'.$i.'_border_radius_bottom_left',0);
		$mod4 = get_theme_mod('simple_days_post_heading_'.$i.'_border_radius_bottom_right',0);

		if($mod + $mod2 + $mod3 + $mod4 != 0){
			if($mod != 0)$mod = $mod.'px';
			if($mod2 != 0)$mod2 = $mod2.'px';
			if($mod3 != 0)$mod3 = $mod3.'px';
			if($mod4 != 0)$mod4 = $mod4.'px';
			if($mod == $mod2 && $mod2 == $mod3 && $mod3 == $mod4){
				$css[60] =  str_replace( 'post_body>h'.$i.'{','post_body>h'.$i.'{border-radius:'.$mod.';',$css[60]);
			}elseif($mod == $mod3 && $mod2 == $mod4){
				$css[60] =  str_replace( 'post_body>h'.$i.'{','post_body>h'.$i.'{border-radius:'.$mod.' '.$mod2.';',$css[60]);
			}elseif($mod != $mod3 && $mod2 == $mod4){
				$css[60] =  str_replace( 'post_body>h'.$i.'{','post_body>h'.$i.'{border-radius:'.$mod.' '.$mod2.' '.$mod3.';',$css[60]);
			}else{
				$css[60] =  str_replace( 'post_body>h'.$i.'{','post_body>h'.$i.'{border-radius:'.$mod.' '.$mod2.' '.$mod3.' '.$mod4.';',$css[60]);
			}
		}

		if(get_theme_mod( 'simple_days_post_heading_'.$i.'_balloon',false)){
			$css[60] =  str_replace( 'post_body>h'.$i.'{','post_body>h'.$i.'{position:relative;',$css[60]);
			$css[60] =  $css[60].'.post_body h'.$i.':after{position:absolute;content:\'\';top:100%;left:'.get_theme_mod( 'simple_days_post_heading_'.$i.'_balloon_position',30).'px;border:'.get_theme_mod( 'simple_days_post_heading_'.$i.'_balloon_width',15).'px solid transparent;border-top:'.get_theme_mod( 'simple_days_post_heading_'.$i.'_balloon_height',15).'px solid '.get_theme_mod( 'simple_days_post_heading_'.$i.'_balloon_color').';width:0;height:0;}';


		}


		++$i;
	}


	if($skin != 'none'){
		$css[60] = str_replace( '.cat_tag_wrap:hover{border-color:#222','.cat_tag_wrap:hover{border-color:'.$skin_color[1],$css[60]);

		$css[60] = str_replace( '.nav_link{border-top:#eee 1px solid;border-bottom:#eee','.nav_link{border-top:#eee 1px solid;border-bottom:'.$skin_color[1],$css[60]);
		$css[60] = str_replace( '.nav_link{border-top:#eee','.nav_link{border-top:'.$skin_color[1],$css[60]);
		$css[60] = str_replace( '.nav_link:hover{background:#f2f2f2','.nav_link:hover{background:'.$skin_color[5],$css[60]);

		$css[60] = str_replace( '.nav_link_l{border-right:#eee','.nav_link_l{border-right:'.$skin_color[1],$css[60]);

		$css[60] = str_replace( '.page_link_next{border:1px solid #eee','.page_link_next{border:1px solid '.$skin_color[1],$css[60]);

		$css[60] = str_replace( '.page_link_next:hover{background:#333','.page_link_next:hover{background:'.$skin_color[1],$css[60]);

		$css[60] = str_replace( '.page_link_next:hover>div{color:#fff','.page_link_next:hover>div{color:'.$skin_color[11],$css[60]);

	}




	
	$css[65] = simple_days_get_css_file( '065_sd_author_profile.min.css' );


	if($skin != 'none'){


		$css[65] = str_replace( '.tab_item{border-bottom:2px solid #fafafa;background:#fafafa','.tab_item{border-bottom:2px solid #fafafa;background:'.$skin_color[4],$css[65]);
		$css[65] = str_replace( '.tab_item{border-bottom:2px solid #fafafa','.tab_item{border-bottom:2px solid '.$skin_color[4],$css[65]);

		$css[65] = str_replace( '.aa_wrap{background:#f2f2f2','.aa_wrap{background:'.$skin_color[5],$css[65]);

		$css[65] = str_replace( 'input.tabs:checked+.tab_item{background:#f2f2f2;border-bottom:2px solid #555','input.tabs:checked+.tab_item{background:#f2f2f2;border-bottom:2px solid '.$skin_color[1],$css[65]);

		$css[65] = str_replace( 'input.tabs:checked+.tab_item{background:#f2f2f2','input.tabs:checked+.tab_item{background:'.$skin_color[5],$css[65]);

  //$css[65] = str_replace( '.author_lp li a{','.author_lp li a{color:'.$skin_color[3].';',$css[65]);

	}


	
	//$css[70] = simple_days_get_css_file( '070_ya_notice.min.css' );


	
	//$css[80] = simple_days_get_css_file( '080_sd_sns.min.css' );


	
	//$css[90] = simple_days_get_css_file( '090_sd_sitemap.min.css' );


	$css[100] = simple_days_get_css_file( '100_yahman_add_on.min.css' );

	
	$css[110] = simple_days_get_css_file( '110_sd_toc.min.css' );



	$mod = get_theme_mod('yahman_add_ons_toc_background_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[5];
	$mod2 = get_theme_mod('yahman_add_ons_toc_background_image');

	if ( ! empty( $mod ) && ! empty( $mod2 ) ){

		if(strpos($mod,'-gradient') === false){
			$css[110] =  str_replace( '.toc{background:'.$widget_background_color,'.toc{background:'.$mod.' url('.$mod2.')',$css[110]);
		}else{
			$css[110] =  str_replace( '.toc{background:'.$widget_background_color,'.toc{background:'.$mod.' ,url('.$mod2.')',$css[110]);
		}


	}else{
		if ( ! empty( $mod ) ) $css[110] =  str_replace( '.toc{background:'.$widget_background_color,'.toc{background-color:'.$mod,$css[110]);
		if ( ! empty( $mod2 ) ) $css[110] =  str_replace( '.toc{','.toc{background-image:url('.$mod2.');',$css[110]);
	}











	$mod = get_theme_mod('yahman_add_ons_toc_font_color','');
	if ( ! empty( $mod ) ) $css[110] =  str_replace( '.toc{','.toc{color:'.$mod.';',$css[110]);

	$mod = get_theme_mod('yahman_add_ons_toc_link_color','');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[1];
	if ( ! empty( $mod ) ){
		//$css[110] =  str_replace( '.toc_ctrl>label{color:#07a','.toc_ctrl>label{color:'.$mod,$css[110]);
		$css[110] =  $css[110].'.toc a{color:'.$mod.'}';
	}





	$border = '';
	$border_style = $border_width = $border_color = array();
	$judge = false;
	$j = 1;

	while($j < 5){
		$border_style['all_'.$j] = '';
		$border_width['all_'.$j] = '';
		$border_color['all_'.$j] = '';
		++$j;
	}

	foreach ($border_angle as $value) {
		$border_style[$value] = get_theme_mod('yahman_add_ons_toc_border_'.$value.'_style','none');
		$border_width[$value] = get_theme_mod('yahman_add_ons_toc_border_'.$value.'_width',1);
		$border_color[$value] = get_theme_mod('yahman_add_ons_toc_border_'.$value.'_color');
		if($border_color[$value] === '')$border_color[$value] = 'transparent';
		if($border_style[$value] != 'none')$judge = true;
	}

	if($judge){
		$border_style = simple_days_create_border_style($border_style);
		$border_width = simple_days_create_border_width($border_width);
		$border_color = simple_days_create_border_color($border_color);

		$border = simple_days_create_border($border_style,$border_width,$border_color);

		$css[110] =  str_replace( '.toc{','.toc{'.$border,$css[110]);

	}


	
	$p_m = array('padding','margin');
	foreach ($p_m as $value) {
		$mod = get_theme_mod('yahman_add_ons_toc_'.$value.'_top',0);
		$mod2 = get_theme_mod('yahman_add_ons_toc_'.$value.'_right',0);
		$mod3 = get_theme_mod('yahman_add_ons_toc_'.$value.'_bottom',0);
		$mod4 = get_theme_mod('yahman_add_ons_toc_'.$value.'_left',0);

		if($mod + $mod2 + $mod3 + $mod4 != 0){
			if($mod != 0)$mod = $mod.'px';
			if($mod2 != 0)$mod2 = $mod2.'px';
			if($mod3 != 0)$mod3 = $mod3.'px';
			if($mod4 != 0)$mod4 = $mod4.'px';

			if($mod == $mod2 && $mod2 == $mod3 && $mod3 == $mod4){
				$css[110] =  str_replace( '.toc{','.toc{'.$value.':'.$mod.';',$css[110]);
			}elseif($mod == $mod3 && $mod2 == $mod4){
				$css[110] =  str_replace( '.toc{','.toc{'.$value.':'.$mod.' '.$mod2.';',$css[110]);
			}elseif($mod != $mod3 && $mod2 == $mod4){
				$css[110] =  str_replace( '.toc{','.toc{'.$value.':'.$mod.' '.$mod2.' '.$mod3.';',$css[110]);
			}else{
				$css[110] =  str_replace( '.toc{','.toc{'.$value.':'.$mod.' '.$mod2.' '.$mod3.' '.$mod4.';',$css[110]);
			}
		}

	}


	
	$mod = get_theme_mod('yahman_add_ons_toc_border_radius_top_left',0);
	$mod2 = get_theme_mod('yahman_add_ons_toc_border_radius_top_right',0);
	$mod3 = get_theme_mod('yahman_add_ons_toc_border_radius_bottom_left',0);
	$mod4 = get_theme_mod('yahman_add_ons_toc_border_radius_bottom_right',0);

	if($mod + $mod2 + $mod3 + $mod4 != 0){
		if($mod != 0)$mod = $mod.'px';
		if($mod2 != 0)$mod2 = $mod2.'px';
		if($mod3 != 0)$mod3 = $mod3.'px';
		if($mod4 != 0)$mod4 = $mod4.'px';
		if($mod == $mod2 && $mod2 == $mod3 && $mod3 == $mod4){
			$css[110] =  str_replace( '.toc{','.toc{border-radius:'.$mod.';',$css[110]);
		}elseif($mod == $mod3 && $mod2 == $mod4){
			$css[110] =  str_replace( '.toc{','.toc{border-radius:'.$mod.' '.$mod2.';',$css[110]);
		}elseif($mod != $mod3 && $mod2 == $mod4){
			$css[110] =  str_replace( '.toc{','.toc{border-radius:'.$mod.' '.$mod2.' '.$mod3.';',$css[110]);
		}else{
			$css[110] =  str_replace( '.toc{','.toc{border-radius:'.$mod.' '.$mod2.' '.$mod3.' '.$mod4.';',$css[110]);
		}
	}
























	
	$css[120] = simple_days_get_css_file( '120_sd_blog_card.min.css' );


	if($skin != 'none'){
		$css[120] = str_replace( '.blog_card{','.blog_card{background:'.$skin_color[5].';',$css[120]);
	}

	$mod = get_theme_mod('simple_days_index_read_more_border_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[1];
	if ( ! empty( $mod ) ) {
		$css[120] = str_replace( '.bc_read_more{border:1px solid','.bc_read_more{border:1px solid '.$mod,$css[120]);
	}




	$mod = get_theme_mod('simple_days_index_read_more_text_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[1];
	if ( ! empty( $mod ) ) {
		$css[120] = str_replace( '.bc_read_more{','.bc_read_more{color:'.$mod.';',$css[120]);
	}

	$mod = get_theme_mod('simple_days_index_read_more_bg_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[11];
	if ( ! empty( $mod ) ) {
		$css[120] = str_replace( '.bc_read_more{','.bc_read_more{background:'.$mod.';',$css[120]);
	}

	$mod = get_theme_mod('simple_days_font_color');
	if ( ! empty( $mod ) ) {
		$css[120] = str_replace( '.bc_summary{color:'.$main_font_color,'.bc_summary{color:'.$mod,$css[120]);
	}
	
	//$css[120] = simple_days_get_css_file( '120_sd_cta.min.css' );


	
	//$css[130] = simple_days_get_css_file( '130_sd_profile.min.css' );


	
	//$css[140] = simple_days_get_css_file( '140_sd_dd_widget.min.css' );


	
	$css[150] = simple_days_get_css_file( '150_sd_post_list.min.css' );


	$mod = get_theme_mod('yahman_addons_pp_rank_font_color');
	if ( ! empty( $mod ) ) $css[150] =  str_replace( '.pl_rank{background:rgba(0,0,0,0.6);','.pl_rank{background:rgba(0,0,0,0.6);color:'.$mod.';',$css[150]);
	$mod = get_theme_mod('yahman_addons_pp_rank');
	if ( ! empty( $mod ) ) $css[150] =  str_replace( '.pl_rank{background:rgba(0,0,0,0.6)','.pl_rank{background:'.$mod,$css[150]);
	$mod = get_theme_mod('yahman_addons_pp_rank1');
	if ( ! empty( $mod ) ) $css[150] =  str_replace( 'li:nth-child(1) .pl_rank{background:rgba(242,133,0,0.8)','li:nth-child(1) .pl_rank{background:'.$mod,$css[150]);
	$mod = get_theme_mod('yahman_addons_pp_rank2');
	if ( ! empty( $mod ) ) $css[150] =  str_replace( 'li:nth-child(2) .pl_rank{background:rgba(115,134,120,0.8)','li:nth-child(2) .pl_rank{background:'.$mod,$css[150]);
	$mod = get_theme_mod('yahman_addons_pp_rank3');
	if ( ! empty( $mod ) ) $css[150] =  str_replace( 'li:nth-child(3) .pl_rank{background:rgba(123,63,0,0.8)','li:nth-child(3) .pl_rank{background:'.$mod,$css[150]);

	
	//$css[160] = simple_days_get_css_file( '160_sd_google_ad.min.css' );





	
	$css[200] = simple_days_get_css_file( '200_sd_flex.min.css' );







	
	$css[300] = simple_days_get_css_file( '300_sd_mobile.min.css' );



	
	$css[400] = simple_days_get_css_file( '400_sd_tablet.min.css' );


	$mod = get_theme_mod('simple_days_site_title_size',24);
	if ( $mod != 24 ) {
		$css[400] = str_replace( '.title_text{font-size:24','.title_text{font-size:'.$mod,$css[400]);
	}

	$mod = get_theme_mod('simple_days_site_title_font_weight');
	if ( $mod != '' ) {
		$css[400] = str_replace( '.title_text{','.title_text{font-weight:'.$mod.';',$css[400]);
	}



	
	$css[500] = simple_days_get_css_file( '500_sd_tablet_only.min.css' );

	
	$css[550] = simple_days_get_css_file( '550_sd_under_tablet.min.css' );

	
	$css[600] = simple_days_get_css_file( '600_sd_pc.min.css' );

	$mod = get_theme_mod( 'simple_days_post_title_font_weight');
	if( ! empty( $mod ) ) $css[600] =  str_replace( 'h1.post_title{font-size:40px;font-weight:100','h1.post_title{font-size:40px;font-weight:'.$mod,$css[600]);

	$mod = get_theme_mod( 'simple_days_post_title_text_size');
	if( ! empty( $mod ) ) $css[600] =  str_replace( 'h1.post_title{font-size:40','h1.post_title{font-size:'.$mod,$css[600]);


	
	/*
	if(get_theme_mod( 'simple_days_sidebar_layout','3') == '1'){
		$css[600] = str_replace( '#sidebar{-ms-flex-order:3;-webkit-order:3;order:3;margin:20px 0 20px 22px','#sidebar{-webkit-box-ordinal-group:1;-ms-flex-order:1;-webkit-order:1;order:1;margin:20px 22px 20px 0',$css[600]);
	}
    */
	
	$mod = get_theme_mod( 'simple_days_main_content_maxwidth');
	if( ! empty( $mod ) ) $css[600] =  str_replace( '.contents{max-width:856','.contents{max-width:'.$mod,$css[600]);

	
	$mod = get_theme_mod( 'simple_days_sidebar_minwidth');
	if( ! empty( $mod ) ) $css[600] =  str_replace( '.sidebar{max-width:358px;min-width:320','.sidebar{max-width:358px;min-width:'.$mod,$css[600]);

	$mod = get_theme_mod( 'simple_days_sidebar_maxwidth');
	if( ! empty( $mod ) ){
		$css[600] =  str_replace( '.sidebar{max-width:358','.sidebar{max-width:'.$mod,$css[600]);
		$css[600] =  str_replace( '.s_widget{max-width:358','.s_widget{max-width:'.$mod,$css[600]);
	}


	$mod = get_theme_mod( 'simple_days_over_header_widget_position','space-between');
	if( $mod == 'space-around' ){

		$css[600] =  str_replace( '.oh_con{padding:0 '.$side_padding.'px','.oh_con{padding:0 '.$side_padding.'px;-webkit-justify-content:space-around;justify-content:space-around',$css[600]);
		$css[600] =  str_replace( ',.oh_con{-webkit-box-pack:justify','{-webkit-box-pack:justify',$css[600]);

	}else if( $mod == 'flex-start' ){

		$css[600] =  str_replace( '{-webkit-box-pack:start;-ms-flex-pack:start;-webkit-justify-content:flex-start;justify-content:flex-start',',.oh_con{-webkit-box-pack:start;-ms-flex-pack:start;-webkit-justify-content:flex-start;justify-content:flex-start',$css[600]);
		$css[600] =  str_replace( ',.oh_con{-webkit-box-pack:justify','{-webkit-box-pack:justify',$css[600]);
		$css[600] =  str_replace( '.oh_widget{padding:10px 0','.oh_widget{padding:10px 20px 10px 0',$css[600]);

	}else if( $mod == 'flex-end' ){

		$css[600] =  str_replace( '{-webkit-box-pack:end;-ms-flex-pack:end;-webkit-justify-content:flex-end;justify-content:flex-end',',.oh_con{-webkit-box-pack:end;-ms-flex-pack:end;-webkit-justify-content:flex-end;justify-content:flex-end',$css[600]);
		$css[600] =  str_replace( ',.oh_con{-webkit-box-pack:justify','{-webkit-box-pack:justify',$css[600]);
		$css[600] =  str_replace( '.oh_widget{padding:10px 0','.oh_widget{padding:10px 0 10px 20px',$css[600]);

	}else if( $mod == 'center' ){

		$css[600] =  str_replace( '{-webkit-box-pack:center;-ms-flex-pack:center;-webkit-justify-content:center;justify-content:center',',.oh_con{-webkit-box-pack:center;-ms-flex-pack:center;-webkit-justify-content:center;justify-content:center',$css[600]);
		$css[600] =  str_replace( ',.oh_con{-webkit-box-pack:justify','{-webkit-box-pack:justify',$css[600]);
		$css[600] =  str_replace( '.oh_widget{padding:10px 0','.oh_widget{padding:10px',$css[600]);

	}




	$mod = get_theme_mod( 'simple_days_menu_layout','1');
	$mod2 = get_theme_mod( 'simple_days_menu_layout_title_position','center');
	$mod3 = get_theme_mod( 'simple_days_menu_layout_menu_position','right');
	$mod4 = get_theme_mod( 'simple_days_tagline_position','none');



	if( $mod4 == 'left' || $mod4 == 'right'){

		if( $mod4 == 'right'){
			$css[600] =  str_replace( '.tagline{padding:0','.tagline{padding:0 0 0 10px',$css[600]);
		}
		if( $mod4 == 'left'){
			$css[600] =  str_replace( '.tagline{padding:0','.tagline{padding:0 10px 0 0',$css[600]);
		}
	}




	if($mod == '1' || $mod == '2'){
		$css[600] = str_replace( '}}','}.hw_con{flex:0 0 auto}}',$css[600]);
	}
	if($mod == '1'){

		if( $mod4 == 'top' || $mod4 == 'bottom'){

			$css[600] = str_replace( '.site_title{margin:0','.site_title{margin:0 auto 0 0',$css[600]);
			$css[600] = str_replace( '.tagline{','.tagline{margin:0 auto 0 0;',$css[600]);
		}
	}
	if($mod == '2'){
		//$css[600] = str_replace( '.title_tag{padding:5px 20px 5px 0','.title_tag{padding:5px 0 5px 20px',$css[600]);

		//$css[600] = str_replace( '#nav_h{padding:0 0 0 20px','#nav_h{padding:0 20px 0 0',$css[600]);

		$css[600] = str_replace( '}}','}.title_wrap,#h_flex{-webkit-flex-direction:row-reverse;flex-direction:row-reverse}}',$css[600]);
  //$css[600] =  str_replace( '.flat_list .post_card,.hw_con,.title_wrap,#h_flex','.flat_list .post_card,.hw_con',$css[600]);

		$css[600] = str_replace( '.site_title{margin:0','.site_title{margin:0 0 0 auto',$css[600]);
		$css[600] = str_replace( '.header_logo{margin:0','.header_logo{margin:0 0 0 auto',$css[600]);
		$css[600] = str_replace( '.tagline{','.tagline{margin:0 0 0 auto;',$css[600]);
  //$css[600] = str_replace( '.title_tag{','.title_tag{margin:0 0 0 auto;',$css[600]);

	}
	if($mod == '3'){
		$css[600] =  str_replace( '#h_flex{margin:0 auto','#h_flex{',$css[600]);

		//$css[600] =  str_replace( '{-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;-webkit-flex-direction:column;flex-direction:column',',#h_flex{-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;-webkit-flex-direction:column;flex-direction:column',$css[600]);

	}
	if($mod == '4'){
		$css[600] =  str_replace( '#h_flex{margin:0 auto','#h_flex{-webkit-flex-direction:column-reverse;flex-direction:column-reverse;',$css[600]);
		$css[600] = str_replace( '}}','}#nav_h{-ms-flex-order:-1;-webkit-order:-1;order:-1}}',$css[600]);

	}


	if($mod == '3' || $mod == '4'){
		//$css[600] =  str_replace( '.flat_list .post_card,.hw_con,.title_wrap,#h_flex','.flat_list .post_card,.hw_con,.title_wrap',$css[600]);
		$css[600] = str_replace( '-webkit-align-self:center;-ms-align-self:center;align-self:center','',$css[600]);
		//$css[600] = str_replace( '#nav_h{padding:0 0 0 20px','#nav_h{padding:0',$css[600]);
		$css[600] = str_replace( '.title_wrap{padding:5px 0','.title_wrap{padding:5px '.$side_padding.'px',$css[600]);
		$css[600] = str_replace( ',#h_flex{-webkit-box-align:center;','{-webkit-box-align:center;',$css[600]);

		$css[600] = str_replace( '}}','}#menu_h{padding:0 '.$side_padding.'px}}',$css[600]);

		if($mod2 == 'left'){
			$css[600] = str_replace( '.site_title{margin:0','.site_title{margin:0 auto 0 0',$css[600]);
			if( $mod4 == 'top' || $mod4 == 'bottom'){
				$css[600] = str_replace( '.tagline{','.tagline{margin:0 auto 0 0;',$css[600]);
			}
			$css[600] = str_replace( '}}','}.h_ws{margin-left:auto;}}',$css[600]);
			$css[600] = str_replace( '.title_wrap{padding','.title_wrap{margin-right:auto;padding',$css[600]);
		}
		if($mod2 == 'center'){
			//$css[600] = str_replace( '.title_tag{padding:5px 20px 5px 0','.title_tag{padding:5px 0',$css[600]);
            //$css[600] = str_replace( '.title_tag{','.title_tag{margin:0 auto;',$css[600]);
		    //$css[600] = str_replace( '}}','}.title_tag{margin-left:calc(100%/2.42)}}',$css[600]);
			//$css[600] = str_replace( '{-webkit-box-pack:center;-ms-flex-pack:center;-webkit-justify-content:center;justify-content:center',',.title_wrap{-webkit-box-pack:center;-ms-flex-pack:center;-webkit-justify-content:center;justify-content:center',$css[600]);

			//$css[600] = str_replace( '}}','}.hw_con{position:absolute;right:-25px;top:0;bottom:0}}',$css[600]);
			$css[600] = str_replace( '.title_wrap{padding','.title_wrap{margin:0 auto;padding',$css[600]);
			$css[600] = str_replace( '}}','}.h_ws{position:absolute;right:0;top:0;bottom:0;padding-right:25px}}',$css[600]);
			if( $mod4 == 'top' || $mod4 == 'bottom'){


               //$css[600] =  str_replace( '{-webkit-box-pack:center;-ms-flex-pack:center;-webkit-justify-content:center;justify-content:center',',.site_title,.tagline{-webkit-box-pack:center;-ms-flex-pack:center;-webkit-justify-content:center;justify-content:center',$css[600]);

			}


		}
		if($mod2 == 'right'){
			//$css[600] = str_replace( '.title_tag{padding:5px 20px 5px 0','.title_tag{padding:5px 0 5px 20px',$css[600]);
			$css[600] = str_replace( '}}','}.title_wrap{-webkit-flex-direction:row-reverse;flex-direction:row-reverse}}',$css[600]);
    //$css[600] =  str_replace( '{-webkit-box-pack:end;-ms-flex-pack:end;-webkit-justify-content:flex-end;justify-content:flex-end',',.title_tag{-webkit-box-pack:end;-ms-flex-pack:end;-webkit-justify-content:flex-end;justify-content:flex-end',$css[600]);
			if( $mod4 == 'none'){
				$css[600] = str_replace( '.site_title{margin:0','.site_title{margin:0 0 0 auto',$css[600]);
			}elseif( $mod4 == 'top' || $mod4 == 'bottom'){
				$css[600] = str_replace( '.site_title{margin:0','.site_title{margin:0 0 0 auto',$css[600]);
				$css[600] = str_replace( '.tagline{','.tagline{margin:0 0 0 auto;',$css[600]);

			}else{

			}
			$css[600] = str_replace( '}}','}.h_ws{margin-right:auto;}}',$css[600]);
			$css[600] = str_replace( '.title_wrap{padding','.title_wrap{margin-left:auto;padding',$css[600]);
		}

	}
	if($mod3 != 'right'){
		$css[600] = str_replace( '#menu_h,.oh_con{-webkit-box-pack:end;-ms-flex-pack:end;-webkit-justify-content:flex-end;justify-content:flex-end','.oh_con{-webkit-box-pack:end;-ms-flex-pack:end;-webkit-justify-content:flex-end;justify-content:flex-end',$css[600]);
		$css[600] = str_replace( '#menu_h{-webkit-box-pack:end;-ms-flex-pack:end;-webkit-justify-content:flex-end;justify-content:flex-end','{-webkit-box-pack:end;-ms-flex-pack:end;-webkit-justify-content:flex-end;justify-content:flex-end',$css[600]);
	}

	if($mod3 == 'left'){
		$css[600] = str_replace( '{-webkit-box-pack:start;-ms-flex-pack:start;-webkit-justify-content:flex-start;justify-content:flex-start',',#menu_h{-webkit-box-pack:start;-ms-flex-pack:start;-webkit-justify-content:flex-start;justify-content:flex-start',$css[600]);
	}

	if($mod3 == 'center'){
		$css[600] = str_replace( '{-webkit-box-pack:center;-ms-flex-pack:center;-webkit-justify-content:center;justify-content:center',',#menu_h{-webkit-box-pack:center;-ms-flex-pack:center;-webkit-justify-content:center;justify-content:center',$css[600]);
	}

	if($mod3 == 'space-between'){
		$css[600] = str_replace( '{-webkit-box-pack:justify;-ms-flex-pack:justify;-webkit-justify-content:space-between;justify-content:space-between',',#menu_h{-webkit-box-pack:justify;-ms-flex-pack:justify;-webkit-justify-content:space-between;justify-content:space-between',$css[600]);
	}

	if($mod3 == 'space-around'){
		$css[600] = str_replace( '{-webkit-justify-content:space-around;-ms-flex-pack:distribute;justify-content:space-around',',#menu_h{-webkit-justify-content:space-around;-ms-flex-pack:distribute;justify-content:space-around',$css[600]);
	}

	if( $mod4 == 'left' || $mod4 == 'right'){
		$css[600] = str_replace( '{-webkit-box-orient:horizontal;-webkit-box-direction:normal;-ms-flex-direction:row;-webkit-flex-direction:row;flex-direction:row}',',.title_tag{-webkit-box-orient:horizontal;-webkit-box-direction:normal;-ms-flex-direction:row;-webkit-flex-direction:row;flex-direction:row}',$css[600]);
	}











	
	$mod = get_theme_mod('simple_days_layout_header_height',54);
	if ( $mod != 54 ) {
		$css[600] = str_replace( '#site_h{','#site_h{height:'.$mod.'px;',$css[600]);
	}

	
	$mod = get_theme_mod('simple_days_header_image_percentage_laptop',33);
	if ( $mod != 33 ) {
		$css[600] = str_replace( '.on_thum:before{padding-top:33','.on_thum:before{padding-top:'.$mod,$css[600]);
	}

/*
	$mod = get_theme_mod('header_menu_grandchild_triangle_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[4];
	if ( ! empty( $mod ) ) {
		$css[600] = str_replace( 'a:after{border-right-color:'.$button_background_color,'a:after{border-right-color:'.$mod,$css[600]);
		$css[600] = str_replace( 'border-left-color:'.$button_background_color,'border-left-color:'.$mod,$css[600]);
	}

	$mod = get_theme_mod('header_menu_children_triangle_color');
	if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[4];
	if ( ! empty( $mod ) ) {
		$css[600] = str_replace( 'border-bottom:10px solid #ccc','border-bottom:10px solid '.$mod,$css[600]);
	}
*/

	if($skin != 'none'){

  //$css[600] =  $css[600].'.nav_base>ul>li>a:hover{color:'.$skin_color[2].'}';
  //$css[600] = str_replace( '}}','}.menu_h>ul>li>a:hover{color:'.$skin_color[2].'}}',$css[600]);


		$css[600] = str_replace( '10px solid #ccc','10px solid '.$skin_color[4],$css[600]);

		$css[600] = str_replace( 'border-left-color:#333','border-left-color:'.$skin_color[4],$css[600]);


		$css[600] = str_replace( 'border-right-color:#333','border-right-color:'.$skin_color[4],$css[600]);

	}



	
	//$css[900] = simple_days_get_css_file( '900_sd_retina.min.css' );


	
	//$css[950] = simple_days_get_css_file( '950_sd_common.min.css' );


	
	if(get_theme_mod( 'simple_days_box_style','flat') == 'shadow'){
		$css[951] = simple_days_get_css_file( '951_sd_shadow_box.min.css' );
	}

	
	$output_css = '';
	foreach($css as $key => $value){
		$output_css .= $value;
	}
//$output_css = str_replace(array("\r\n", "\r", "\n"), '', $output_css);


	$upload_dir = wp_upload_dir();
	$dir = $upload_dir['basedir'].'/simple_days_cache/';
	if ( !$wp_filesystem->is_dir($dir) ) {
	$wp_filesystem->mkdir($dir, 0777);
	$wp_filesystem->chmod($dir, 0777);
}



$maintenance_string = '<?php $upgrading = ' . time() . '; ?>';
$maintenance_file = $wp_filesystem->abspath() . '.maintenance';
$wp_filesystem->put_contents($maintenance_file,$maintenance_string, FS_CHMOD_FILE);

$wp_filesystem->put_contents($upload_dir['basedir'].'/simple_days_cache/style.min.css', $output_css, FS_CHMOD_FILE);

    //メンテナンスモード解除
$wp_filesystem->delete($maintenance_file);

}

function simple_days_get_css_file($file_name){
	require_once ABSPATH . 'wp-admin/includes/file.php';
	WP_Filesystem();
	global $wp_filesystem;
	$content_file_dir = SIMPLE_DAYS_THEME_DIR .'assets/css/core/';
	$css_file = '';

	$css_file =  $wp_filesystem->get_contents( $content_file_dir.$file_name );
	if ($css_file === ''){
		$content_file_dir = SIMPLE_DAYS_THEME_URI .'assets/css/core/';
		//require_once ABSPATH . 'wp-load.php';
		$css_remote = wp_remote_get( $content_file_dir.$file_name );
		$css_file = $css_remote['body'];
	}
	$css_file = str_replace(array("\r\n", "\r", "\n"), '', $css_file);

	
	$css_file = str_replace('@charset "UTF-8";','',$css_file);

	return $css_file;
}

function simple_days_get_skin_color($skin){
	$skin_color = array();
	$skin_color[11] = '#fff';
	$skin_color[12] = '#fff';
	switch ($skin){
		case 'apple_green':
		$skin_color[1] = '#8fc186';
		$skin_color[2] = '#2d3e4b';
		$skin_color[3] = '#4f9044';
		$skin_color[4] = '#f3f7f3';
		$skin_color[5] = '#d1e2bd';
		break;
		case 'black_coffee':
		$skin_color[1] = '#272822';
		$skin_color[2] = '#999';
		$skin_color[3] = '#0A0A0A';
		$skin_color[4] = '#eee';
		$skin_color[5] = '#d8d8d8';
		break;
		case 'blue_ocean':
		$skin_color[1] = '#09c';
		$skin_color[2] = '#2d3e4b';
		$skin_color[3] = '#157eac';
		$skin_color[4] = '#f1f4f8';
		$skin_color[5] = '#cae5ef';
		break;
		case 'blue_yellow':
		$skin_color[1] = '#06609e';
		$skin_color[2] = '#f2df09';
		$skin_color[3] = '#9a8033';
		$skin_color[4] = '#dedede';
		$skin_color[5] = '#eee';
		$skin_color[12] = $skin_color[2];
		break;
		case 'brown_bread':
		$skin_color[1] = '#ab5533';
		$skin_color[2] = '#ffb777';
		$skin_color[3] = '#5d2e1c';
		$skin_color[4] = '#845b3e';
		$skin_color[5] = '#bf7c5c';
		$skin_color[12] = $skin_color[2];
		break;
		case 'cinnamon':
		$skin_color[1] = '#be8f68';
		$skin_color[2] = '#281404';
		$skin_color[3] = '#8E745F';
		$skin_color[4] = '#C99F80';
		$skin_color[5] = '#ffe9df';
		break;
		case 'grape_juice':
		$skin_color[1] = '#7e6f9a';
		$skin_color[2] = '#533560';
		$skin_color[3] = '#3b2246';
		$skin_color[4] = '#e4e4e4';
		$skin_color[5] = '#d5cbff';
		break;
		case 'gray_horse':
		$skin_color[1] = '#717171';
		$skin_color[2] = '#67daf9';
		$skin_color[3] = '#484848';
		$skin_color[4] = '#828282';
		$skin_color[5] = '#d8d8d8';
		$skin_color[12] = $skin_color[2];
		break;
		case 'moss_green':
		$skin_color[1] = '#777e41';
		$skin_color[2] = '#A9BA18';
		$skin_color[3] = '#373D01';
		$skin_color[4] = '#E4EAAB';
		$skin_color[5] = '#E2ED87';
		break;
		case 'orange':
		$skin_color[1] = '#ef810f';
		$skin_color[2] = '#D35400';
		$skin_color[3] = '#F96509';
		$skin_color[4] = '#FDF2E7';
		$skin_color[5] = '#F8CD9F';
		break;
		case 'petrole':
		$skin_color[1] = '#007d7f';
		$skin_color[2] = '#004949';
		$skin_color[3] = '#006363';
		$skin_color[4] = '#7A9B9B';
		$skin_color[5] = '#75AFAF';
		break;
		case 'red_orange':
		$skin_color[1] = '#e53b2b';
		$skin_color[2] = '#5a2222';
		$skin_color[3] = '#960d00';
		$skin_color[4] = '#f7f7f7';
		$skin_color[5] = '#e8e8e8';
		break;
		case 'rose_peche':
		$skin_color[1] = '#e75685';
		$skin_color[2] = '#820A32';
		$skin_color[3] = '#66263B';
		$skin_color[4] = '#E5C9D3';
		$skin_color[5] = '#FFA0A2';
		break;
		case 'yellow_mustard':
		$skin_color[1] = '#ffd700';
		$skin_color[2] = '#2d3e4b';
		$skin_color[3] = '#ffa400';
		$skin_color[4] = '#ffe876';
		$skin_color[5] = '#fff9d7';
		$skin_color[11] = '#000';
		break;
		default:
	}
	return $skin_color;
  }//end of simple_days_get_skin_color

  function simple_days_create_border_style($border_style){

  	if($border_style['top'] === $border_style['right'] && $border_style['right'] === $border_style['bottom'] && $border_style['bottom'] === $border_style['left']){
  		$border_style['all_1'] = $border_style['top'];
  	}elseif($border_style['top'] === $border_style['bottom'] && $border_style['left'] === $border_style['right']){
  		$border_style['all_2'] = $border_style['top'].' '.$border_style['right'];
  	}elseif($border_style['left'] === $border_style['right']){
  		$border_style['all_3'] = $border_style['top'].' '.$border_style['right'].' '.$border_style['bottom'];
  	}else{
  		$border_style['all_4'] = $border_style['top'].' '.$border_style['right'].' '.$border_style['bottom'].' '.$border_style['left'];
  	}

  	return $border_style;

  }

  function simple_days_create_border_color($border_color){

  	if($border_color['top'] === $border_color['right'] && $border_color['right'] === $border_color['bottom'] && $border_color['bottom'] === $border_color['left']){
  		$border_color['all_1'] = $border_color['top'];
  	}elseif($border_color['top'] === $border_color['bottom'] && $border_color['left'] === $border_color['right']){
  		$border_color['all_2'] = $border_color['top'].' '.$border_color['right'];
  	}elseif($border_color['left'] === $border_color['right']){
  		$border_color['all_3'] = $border_color['top'].' '.$border_color['right'].' '.$border_color['bottom'];
  	}else{
  		$border_color['all_4'] = $border_color['top'].' '.$border_color['right'].' '.$border_color['bottom'].' '.$border_color['left'];
  	}

  	return $border_color;

  }

  function simple_days_create_border_width($border_width){

  	if($border_width['top'] === $border_width['right'] && $border_width['right'] === $border_width['bottom'] && $border_width['bottom'] === $border_width['left']){
  		$border_width['all_1'] = $border_width['top'].'px';
  	}elseif($border_width['top'] === $border_width['bottom'] && $border_width['left'] === $border_width['right']){
  		$border_width['all_2'] = $border_width['top'].'px '.$border_width['right'].'px';
  	}elseif($border_width['left'] === $border_width['right']){
  		$border_width['all_3'] = $border_width['top'].'px '.$border_width['right'].'px '.$border_width['bottom'].'px';
  	}else{
  		$border_width['all_4'] = $border_width['top'].'px '.$border_width['right'].'px '.$border_width['bottom'].'px '.$border_width['left'].'px';
  	}

  	return $border_width;

  }

  function simple_days_create_border($border_style,$border_width,$border_color){

  	if($border_style['all_1'] != '' && $border_width['all_1'] != '' && $border_color['all_1'] != ''){
  		$border = 'border:'.$border_style['all_1'].' '.$border_width['all_1'].' '.$border_color['all_1'].';';
  	}else{
  		$style = 'border-style:';
  		$width = 'border-width:';
  		$color = 'border-color:';
  		$i = 1;
  		while($i < 5){
  			$style .= $border_style['all_'.$i];
  			$width .= $border_width['all_'.$i];
  			$color .= $border_color['all_'.$i];
  			++$i;
  		}
  		$border = $style.';'.$width.';'.$color.';';
  	}

  	return $border;

  }
