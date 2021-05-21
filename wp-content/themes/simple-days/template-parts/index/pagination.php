<?php
/**
 *
 * @package Simple Days
 */


if ( is_active_sidebar( 'on_pagination' ) ) : ?>
  <div class="on_pagi w100 f_box f_col100 jc_sa">

      <?php dynamic_sidebar( 'on_pagination' ); ?>

  </div>
<?php endif;

the_posts_pagination( array(
 'mid_size' => 2,
 'prev_text' => '&lt;',
 'next_text' => '&gt;',
) );
