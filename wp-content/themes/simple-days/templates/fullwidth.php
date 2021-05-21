<?php defined( 'ABSPATH' ) || exit;
/**
 * Template Name: Full width
 * Template Post Type: post,page
 *
 * @package Simple Days
 *
 */
__( 'Full width', 'simple-days' );
get_header();
while ( have_posts() ) : the_post();


	get_template_part( 'template-parts/post/post','google_effect' );
	$post_title_effects = simple_days_google_post_title_effects();

	if(has_post_thumbnail()){
		get_template_part( 'template-parts/post/post','full_thum' );
		simple_days_full_width_thumbnail_page($post_title_effects);
	}

	?>


	<div class="wrap_frame m_con jc_c001">
		<main id="post-<?php the_ID(); ?>" <?php post_class('contents post_content page_content full_content shadow_box single_post_content'); ?> style="max-width:1580px;">

			<?php
			get_template_part( 'template-parts/post','sort_order' );
			get_template_part( 'template-parts/post','order' );

			$type = 'post';
			if(is_page()) $type = 'page';

			$sortable_function = 'simple_days_sort_order_custom_'.$type;

			simple_days_post_order( $type , $sortable_function() , $post_title_effects , $post);

			?>
		</main>


	</div>

<?php endwhile; ?>
<?php get_footer();
