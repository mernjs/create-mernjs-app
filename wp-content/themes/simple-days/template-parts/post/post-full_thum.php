<?php
/**
 *
 * @package Simple Days
 */

function simple_days_full_width_thumbnail_post($post_title_effects) {
	if(get_theme_mod('simple_days_posts_full_width_thumbnail',false) && get_theme_mod( 'simple_days_posts_thumbnail',true)){
		$title_over = false;
		if(get_theme_mod( 'simple_days_posts_title_over_thumbnail',false)){
			$title_over = true;
		}
		$thumurl = wp_get_attachment_image_src (get_post_thumbnail_id (), get_theme_mod( 'simple_days_posts_thumbnail_size','full'));
		simple_days_full_width_thumbnail_output($title_over,$post_title_effects,$thumurl);

	}
}


function simple_days_full_width_thumbnail_page($post_title_effects) {
	if(get_theme_mod('simple_days_page_full_width_thumbnail',false) && get_theme_mod( 'simple_days_page_thumbnail',true)){
		$title_over = false;
		if(get_theme_mod( 'simple_days_page_title_over_thumbnail',false)){
			$title_over = true;
		}
		$thumurl = wp_get_attachment_image_src (get_post_thumbnail_id (), get_theme_mod( 'simple_days_page_thumbnail_size','full'));
		simple_days_full_width_thumbnail_output($title_over,$post_title_effects,$thumurl);

	}
}

function simple_days_full_width_thumbnail_output($title_over,$post_title_effects,$thumurl) {
	?>
	<div class="relative" style="height:50vh;background:center / cover no-repeat url('<?php echo esc_url( $thumurl[0]); ?>');">
		<?php
		$format = get_post_format();
		if($title_over && ($format != 'aside' && $format != 'link' && $format != 'status')){
			echo '<div class="thum_on_title absolute"><div class="wrap_frame f_box jc_fs ai_c"><h1 class="full_thum_on_post_title'.esc_attr($post_title_effects).' fw8">'. esc_html(get_the_title()).'</h1></div></div>';
		}

		//echo '<figure class="full_thum_b on_thum fit_box_img_wrap" style="background:#ddd;"><img src="'.esc_url( $thumurl[0] ).'" width="'.esc_attr( $thumurl[1] ).'" height="'.esc_attr( $thumurl[2] ).'" /></figure>';
		?>
	</div>

	<?php
}

