<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * @package Simple Days
 * @since 0.0.1
 * @version 0.0.3
 */

?>
      <div>

    <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

      <p><?php esc_html_e( 'Ready to publish your first post?', 'simple-days'); ?>
      <a href="<?php echo esc_url( admin_url( 'post-new.php' ) ); ?>">
      <?php esc_html_e( 'Get started here.', 'simple-days' ); ?></a></p>

    <?php elseif ( is_search() ) : ?>

      <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'simple-days' ); ?></p>
      <?php get_search_form(); ?>

    <?php else : ?>

      <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'simple-days' ); ?></p>
      <?php get_search_form(); ?>

    <?php endif; ?>


      </div>
