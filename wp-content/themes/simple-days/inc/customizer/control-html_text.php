<?php
  defined( 'ABSPATH' ) || exit;
/**
 * Html Text Control
 *
 * @package Simple Days
 */

  class Simple_Days_html_text_Custom_Content extends WP_Customize_Control {
    public $content = '';
    public function render_content() {

      if ( isset( $this->label ) ) {
        echo '<span class="customize-control-title">' . esc_html($this->label) . '</span>';
      }
      if ( isset( $this->content ) ) {
        echo $this->content;
      }
      if ( isset( $this->description ) ) {
        echo '<span class="description customize-control-description">' . esc_html($this->description) . '</span>';
      }
    }
  }


