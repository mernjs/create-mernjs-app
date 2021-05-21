<?php
defined( 'ABSPATH' ) || exit;
/**
 * Extra content
 *
 * @package Simple Days
 */

function simple_days_plugin_button($setting) {

	include_once ABSPATH . 'wp-admin/includes/plugin.php' ;
	$installed_plugins = get_plugins();

	$plugin_setting['name'] = $setting['name'];
	$plugin_setting['dir'] = $setting['dir'];
	$plugin_setting['filename'] = $setting['filename'];
	$plugin_setting['pass'] = $plugin_setting['dir'].'/'.$plugin_setting['filename'];

	$action = $url = $classes = $disabled = $activate_url = '';
	$classic_action = $classic_url = $classic_classes = '';

	if ( is_plugin_active( $plugin_setting['pass'] ) ) {
		$action = esc_html__( 'Already activated' , 'simple-days' );
		$classes = ' button-disabled';
		$disabled = ' disabled="disabled"';
            //$url = admin_url( 'admin.php?page='.$plugin_setting['dir'] );
		return 'activated';
	}

	if ( empty( $installed_plugins[$plugin_setting['pass']] ) ) {
		if ( get_filesystem_method( array(), WP_PLUGIN_DIR ) === 'direct' ) {
			
			$action =  sprintf(esc_html__('Install %s', 'simple-days'), $plugin_setting['name']);
			$url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin='.$plugin_setting['dir'] ), 'install-plugin_'.$plugin_setting['dir'] );
			$activate_url = wp_nonce_url( self_admin_url( 'plugins.php?action=activate&plugin='.$plugin_setting['pass'] ), 'activate-plugin_'.$plugin_setting['pass'] );
			$classes = ' install-now';
		}
	} else if ( is_plugin_inactive( $plugin_setting['pass'] ) ) {
		
		$action = sprintf(esc_html__('Activate %s', 'simple-days'), $plugin_setting['name']);
		$activate_url = wp_nonce_url( self_admin_url( 'plugins.php?action=activate&plugin='.$plugin_setting['pass'] ), 'activate-plugin_'.$plugin_setting['pass'] );
		$classes = ' activate-now';
	}

	wp_enqueue_style( 'plugin-install' );
	wp_enqueue_script( 'plugin-install' );
	wp_enqueue_script( 'updates' );
	wp_register_script(
		'simple_days_plugin_install',
		SIMPLE_DAYS_THEME_URI . 'assets/js/customizer/plugin_install.min.js',
		array( 'jquery', 'customize-base', 'jquery-ui-core', 'jquery-ui-sortable','plugin-install','updates' ),
		'',
		true
	);
	wp_enqueue_script( 'simple_days_plugin_install' );
	wp_enqueue_style( 'simple_days_admin_styles', SIMPLE_DAYS_THEME_URI . 'assets/css/admin.min.css',array() );


	if ( $action ) {
		

		return '<p><a class="button '. esc_attr( $classes ).' simple-days-install-plugin button-primary"'.$disabled.' data-install-url="'. esc_url( $url ) .'" data-activate-url="'. esc_url( $activate_url ) .'" data-name="' .esc_attr( $plugin_setting['name'] ).'" data-slug="'.esc_attr( $plugin_setting['dir'] ).'" data-activating="'.esc_attr__( 'Activating&hellip;' , 'simple-days' ).'" data-activated="'.esc_attr__( 'Activated' , 'simple-days' ).'">'. esc_html( $action ) .'</a></p>';

		/*if ( isset( $this->description ) ) {
			echo '<span class="description customize-control-description">' . esc_html($this->description) . '</span>';
		}*/
        // data-redirect="'. esc_url( admin_url( 'customize.php' ) ).'"
        //echo $this->plugin;
	}


}