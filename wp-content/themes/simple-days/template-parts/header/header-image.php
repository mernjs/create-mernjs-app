<?php
/**
 * The template part for displaying a header image
 *
 * @package Simple Days

 */
?>
<div class="header_img relative">
	<?php

	$text = get_theme_mod( 'simple_days_header_image_text','');

	if($text !== ''){
		echo '<div class="thum_on_title h30 absolute"><div class="wrap_frame f_box jc_c ai_c fs44 fw8 fc_fff hi_text">'.esc_html($text).'</div></div>';
	}

	echo '<figure class="on_thum fit_box_img_wrap"><img src="'.esc_url( get_header_image() ).'" width="'.esc_attr( get_custom_header()->width ).'" height="'.esc_attr( get_custom_header()->height ).'" /></figure>';

	?>
</div>
