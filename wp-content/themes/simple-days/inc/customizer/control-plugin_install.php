<?php
  defined( 'ABSPATH' ) || exit;
/**
 * Plugin install Control
 *
 * @package Simple Days
 */

  class Simple_Days_plugin_install_Custom_Content extends WP_Customize_Control {
    public $plugin = '';

    public function enqueue() {
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
    }

    public function render_content() {


      if ( isset( $this->plugin ) ) {
        $plugin_setting = array();

        $plugin_setting['name'] = $this->plugin['name'];
        $plugin_setting['dir'] = $this->plugin['dir'];
        $plugin_setting['filename'] = $this->plugin['filename'];
        $plugin_setting['pass'] = $plugin_setting['dir'].'/'.$plugin_setting['filename'];

        include_once ABSPATH . 'wp-admin/includes/plugin.php';
        $plugins = get_plugins();
        $action = $url = $classes = $disabled = $activate_url = '';
        $classic_action = $classic_url = $classic_classes = '';
        if ( current_user_can( 'install_plugins' ) ) {

          if ( empty( $plugins[$plugin_setting['pass']] ) ) {
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
        }

        if ( current_user_can( 'edit_posts' ) && is_plugin_active( $plugin_setting['pass'] ) ) {
          $action = esc_html__( 'Already activated' , 'simple-days' );
          $classes = ' button-disabled';
          $disabled = ' disabled="disabled"';
            //$url = admin_url( 'admin.php?page='.$plugin_setting['dir'] );
        }

        if ( $action ) {

          if ( isset( $this->label ) ) {
            echo '<span class="customize-control-title">' . esc_html($this->label) . '</span>';
          }


          echo '<p><a class="button '. esc_attr( $classes ).' simple-days-install-plugin"'.$disabled.' data-install-url="'. esc_url( $url ) .'" data-activate-url="'. esc_url( $activate_url ) .'" data-name="' .esc_attr( $plugin_setting['name'] ).'" data-slug="'.esc_attr( $plugin_setting['dir'] ).'" data-activating="'.esc_attr__( 'Activating&hellip;' , 'simple-days' ).'" data-activated="'.esc_attr__( 'Activated' , 'simple-days' ).'">'. esc_html( $action ) .'</a></p>';

          if ( isset( $this->description ) ) {
            echo '<span class="description customize-control-description">' . esc_html($this->description) . '</span>';
          }
        // data-redirect="'. esc_url( admin_url( 'customize.php' ) ).'"
        //echo $this->plugin;
        }

      }// end isset( $this->plugin

    }// end render_content
  }// end Simple_Days_plugin_install_Custom_Content


