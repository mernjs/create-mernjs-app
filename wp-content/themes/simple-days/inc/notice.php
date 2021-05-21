<?php
defined( 'ABSPATH' ) || exit;
/**
 * Admin Notice
 *
 * @package Simple Days
 */



add_action( 'admin_notices', 'simple_days_yahman_addons_notice' );
function simple_days_yahman_addons_notice() {
	if (  ! current_user_can( 'manage_options' ) || ! current_user_can( 'install_plugins' ) ) return;


	$meta = get_user_meta( get_current_user_id(), 'simple_days_yahman_addons_notice_dismiss', true );
	if ( $meta ) {
		return;
	}
	$setting['name'] = esc_html__('YAHMAN Add-ons', 'simple-days');
	$setting['dir'] = 'yahman-add-ons';
	$setting['filename'] = 'yahman-add-ons.php';
	require_once SIMPLE_DAYS_THEME_DIR . 'inc/plugin_button.php';
	$button = simple_days_plugin_button($setting);
	if($button == 'activated' ) return;
	?>
	<div id="" class="updated simple_days_plugin_wrap">
		<h3 class="simple_days_notice_title"><?php esc_html_e('Welcome! Thank you for choosing the theme Simple Days.' , 'simple-days'); ?></h3>
		<p class="simple_days_notice_description">
			<?php echo sprintf( esc_html__( 'If you want to take full advantage of the options this theme has to offer, please install and activate %s.', 'simple-days' ), sprintf( '<strong>%s</strong>', 'YAHMAN Add-ons' ) ); ?>
		</p>
		<p class="simple_days_notice_description">
			<?php echo esc_html__( 'This plugin optimize for Simple Days.', 'simple-days' ); ?>
		</p>
		<p class="simple_days_notice_description">
			<?php echo esc_html__( 'Google Adsense,Analytics,Pageviews,Social,Profile,Table of contents,sitemap,OGP,Blog card,Twitter timeline,Facebook timeline,Accelerated Mobile Pages(AMP), etc.', 'simple-days' ); ?>
		</p>
		<p class="simple_days_notice_description">
			<?php echo esc_html__( 'Of course, it\'s free.', 'simple-days' ); ?>
		</p>


		<?php

		echo $button;
		?>
		<a href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'simple_days-yahman_addons-notice_dismiss', 'notice_nonce' ), 'simple_days-notice_dismiss-' . get_current_user_id() ) ); ?>" class="notice-dismiss"><span class="screen-reader-text">Skip</span></a>
	</div>

	<?php
}



function simple_days_yahman_addons_notice_dismiss() {
	if ( isset( $_GET['simple_days-yahman_addons-notice_dismiss'] ) && check_admin_referer( 'simple_days-notice_dismiss-' . get_current_user_id() ) ) {
		update_user_meta( get_current_user_id(), 'simple_days_yahman_addons_notice_dismiss', true );
	}

}
add_action( 'wp_loaded', 'simple_days_yahman_addons_notice_dismiss' );
