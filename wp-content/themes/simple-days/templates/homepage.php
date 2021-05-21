<?php defined( 'ABSPATH' ) || exit;
/**
 * Template Name: Custom Homepage
 *
 * @package Simple Days
 *
 */
__( 'Custom Homepage', 'simple-days' );
get_header();

?>


<div class="wrap_frame hp_wrap m_con f_box f_col110 jc_c001">
  <main id="post-<?php the_ID(); ?>" <?php post_class('contents hp_contents f_box f_col shadow_box'); ?>>

    <?php
    dynamic_sidebar( 'custom_homepage' );

    if ( have_posts() ) :

      while ( have_posts() ) : the_post();
        the_content();
      endwhile;

    endif; ?>

  </main>
  <?php
  if(SIMPLE_DAYS_LEFT_SIDEBAR) get_sidebar('left');
  if(SIMPLE_DAYS_RIGHT_SIDEBAR) get_sidebar('right');
  ?>

</div>

<?php get_footer();
