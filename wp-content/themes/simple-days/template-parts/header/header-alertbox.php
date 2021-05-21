<?php
/**
 * The template part for displaying a alert box
 *
 * @package Simple Days

 */
?>
<div id="h_alert">
  <div class="wrap_frame">
    <p id="h_alert_box"><i class="fa <?php echo esc_attr(get_theme_mod( 'simple_days_alert_box_start_icon','fa-info-circle')); ?>" aria-hidden="true"></i> <span><?php echo esc_html( get_theme_mod( 'simple_days_alert_box_text','') ); ?></span> <i class="fa <?php echo esc_attr(get_theme_mod( 'simple_days_alert_box_end_icon','')); ?>" aria-hidden="true"></i></p>
  </div>
</div>
