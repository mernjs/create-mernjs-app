<?php
defined( 'ABSPATH' ) || exit;

function simple_days_get_gradient($box,$bg_image=''){

	$gc1 = get_theme_mod('gradient_header_color_1');
	$gc2 = get_theme_mod('gradient_header_color_2');
	$style = get_theme_mod('gradient_'.$box.'_style','linear');
	$degree = get_theme_mod('gradient_'.$box.'_degree');
	$color1 = get_theme_mod('gradient_'.$box.'_color_1');
	$color2 = get_theme_mod('gradient_'.$box.'_color_2');
	$color3 = get_theme_mod('gradient_'.$box.'_color_3');
	$color4 = get_theme_mod('gradient_'.$box.'_color_4');
	$color5 = get_theme_mod('gradient_'.$box.'_color_5');
	$position1 = get_theme_mod('gradient_'.$box.'_position_1');
	$position2 = get_theme_mod('gradient_'.$box.'_position_2');
	$position3 = get_theme_mod('gradient_'.$box.'_position_3');
	$position4 = get_theme_mod('gradient_'.$box.'_position_4');
	$position5 = get_theme_mod('gradient_'.$box.'_position_5');

	$unit = $comp = $property = '';

	if($style === 'linear' || $style === 'radial'){
		$unit = '%';
	}else{
		$unit = 'px';
	}

	if ('' != $color1){
		if (0 != $position1){
			$color1 = $color1 . ' ' . $position1 . $unit;
		}
		$color1 = $color1 . ',';
	}else{
		$color1 = '';
	}
	if ('' != $color2){
		if (0 != $position2){
			$color2 = $color2 . ' ' . $position2 . $unit;
		}
		$color2 = $color2 . ',';
	}else{
		$color2 = '';
	}
	if ('' != $color3){
		if (0 != $position3){
			$color3 = $color3 . ' ' . $position3 . $unit;
		}
		$color3 = $color3 . ',';
	}else{
		$color3 = '';
	}
	if ('' != $color4){
		if (0 != $position4){
			$color4 = $color4 . ' ' . $position4 . $unit;
		}
		$color4 = $color4 . ',';
	}else{
		$color4 = '';
	}
	if ('' != $color5){
		if (0 != $position5){
			$color5 = $color5 . ' ' . $position5 . $unit;
		}
		$color5 = $color5 . ',';
	}else{
		$color5 = '';
	}

	if($degree != 0 ){
		$webkit_deg = 90 - $degree;
		$webkit_deg = $webkit_deg.'deg,';
		$degree = $degree.'deg,';
	}else{
		$degree = '';
		$webkit_deg = "";
	}

	if($bg_image!=''){
		$bg_image = ',url('.$bg_image.')';
	}

	$comp = $color1 . $color2 . $color3 . $color4 . $color5;
	if($comp === '')return;

	$comp = rtrim( $comp , ',');

	return '-webkit-'.$style . '-gradient(' . $webkit_deg . $comp . ')'.$bg_image.';background:'.$style . '-gradient(' . $degree . $comp . ')'.$bg_image.';';

}

function simple_days_get_gradient_pattern(){

	return array(
		'site_bg',
		'header_header',
		'footer_credit',
		'sidebar_widget_title',
		'footer_widget_title',
		'index_title',
		'header_over',
		'post_heading_h2',
		'post_heading_h3',
		'post_heading_h4',
	);

}

function simple_days_get_gradient_property($name){

	switch($name){
		case 'header_header': $property = '#h_wrap'; break;
		case 'site_bg': $property = 'body'; break;
		case 'footer_credit': $property = '.credit_wrap'; break;
		case 'sidebar_widget_title': $property = '.sw_title'; break;
		case 'footer_widget_title': $property = '.fw_title'; break;
		case 'index_title': $property = '.post_card_title'; break;
		case 'header_over': $property = '#oh_wrap'; break;
		case 'post_heading_h2': $property = '.post_body>h2'; break;
		case 'post_heading_h3': $property = '.post_body>h3'; break;
		case 'post_heading_h4': $property = '.post_body>h4'; break;
		default : break;
	}
	return $property;

}