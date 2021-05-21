<?php defined( 'ABSPATH' ) || exit;
/**
 * Template Name: Title and content only
 * Template Post Type: post,page
 *
 * @package Simple Days
 *
 */
__( 'Title and content only', 'simple-days' );
get_header();


get_template_part( 'template-parts/post/post','google_effect' );
$post_title_effects = simple_days_google_post_title_effects();

if(has_post_thumbnail()){
	get_template_part( 'template-parts/post/post','full_thum' );
	simple_days_full_width_thumbnail_page($post_title_effects);
}

?>


<div class="wrap_frame m_con f_box f_col110 jc_c001">
	<main id="post-<?php the_ID(); ?>" <?php post_class('contents shadow_box'); ?> itemprop="mainContentOfPage" itemscope="itemscope" itemtype="https://schema.org/Article">

		<?php
		while ( have_posts() ) : the_post();
			$type = 'post';
			if(is_page()) $type = 'page';
			$format = get_post_format();
			if($format != 'aside' && $format != 'link' && $format != 'status'){
				echo '<div class="post_item mb_L"><h1 class="post_title'.esc_attr($post_title_effects).'">'. esc_html(get_the_title()).'</h1></div>';
			}

			echo '<article id="post_body" class="post_body clearfix post_item mb_L" itemprop="articleBody">';

			the_content();


			echo '</article>';
		endwhile;
		?>
	</main>
	<?php
	if(SIMPLE_DAYS_LEFT_SIDEBAR) get_sidebar('left');
	if(SIMPLE_DAYS_RIGHT_SIDEBAR) get_sidebar('right');
	?>

</div>


<?php get_footer();
