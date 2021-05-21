<?php get_header(); ?>

<div class="wrap_frame m_con jc_c001">
	<main <?php post_class('contents post_content f_box f_col shadow_box'); ?>>
		<article id="post_body" class="post_body">
			<div class="post_item mb_L relative fit_content item_thum">
				<div class="thum_on_title absolute f_box jc_c ai_c">
					<h1 class="thum_on_post_title fw8 ta_c">
						404<br /><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'simple-days' ); ?>
					</h1>
				</div>
				<figure class="on_thum fit_box_img_wrap">
					<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail();
					}else{
						$url_404 = get_theme_mod( 'simple_days_404_img' , SIMPLE_DAYS_THEME_URI .'assets/images/404.jpg');

						if($url_404 === SIMPLE_DAYS_THEME_URI .'assets/images/404.jpg'){
							$width_404 = '960';
							$height_404 = '640';
						}else{
							$size_404 = attachment_url_to_postid($url_404);
							if($size_404 && ! is_wp_error($size_404)){
								$size_404 = wp_get_attachment_metadata($size_404);
								$width_404 = $size_404['width'];
								$height_404 = $size_404['height'];
							}

						}
						if(isset($width_404))
							echo '<img src="'.esc_url($url_404).'" width="'.esc_attr($width_404).'" height="'.esc_attr($height_404).'" />';
					}

					?>
				</figure>
			</div>

			<?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'simple-days' ); ?>
			<?php get_search_form(); ?>



		</article>

	</main>
	<?php
	if(SIMPLE_DAYS_LEFT_SIDEBAR) get_sidebar('left');
	if(SIMPLE_DAYS_RIGHT_SIDEBAR) get_sidebar('right');
	?>

</div>


<?php get_footer();

