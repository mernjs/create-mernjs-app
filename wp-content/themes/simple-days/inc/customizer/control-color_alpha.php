<?php
defined( 'ABSPATH' ) || exit;
/**
 * Color Alpha
 *
 * @package Simple Days
 */

class Simple_Days_Color_Alpha_Custom_Control extends WP_Customize_Control {


    /**
     * Type.
     *
     * @var string
     */
    public $type = 'color_alpha';



    /**
     * Enqueue scripts/styles for the color picker.
     *
     * @since 3.4.0
     */
    public function enqueue() {
      wp_enqueue_script( 'wp-color-picker' );
      wp_enqueue_style( 'wp-color-picker' );



      wp_register_script(
        'wp-color-picker-alpha',
        SIMPLE_DAYS_THEME_URI . 'assets/js/customizer/wp-color-picker-alpha.min.js',
        array( 'wp-color-picker' ),
        '',
        true
      );

      wp_add_inline_script(
        'wp-color-picker-alpha',
        'jQuery( function() { jQuery( ".color-picker" ).wpColorPicker(); } );'
      );

      wp_enqueue_script( 'wp-color-picker-alpha' );

      wp_enqueue_script( 'wp-color-picker-alpha_support', SIMPLE_DAYS_THEME_URI . 'assets/js/customizer/color_alpha.min.js', array( 'wp-color-picker-alpha' ), null, true );
    }

    /**
     * Refresh the parameters passed to the JavaScript via JSON.
     *
     * @since 3.4.0
     * @uses WP_Customize_Control::to_json()
     */
    public function to_json() {
      parent::to_json();

      $this->json['defaultValue'] = $this->setting->default;


      $this->json['value'] = $this->value();


    }


    /**
     * Don't render the control content from PHP, as it's rendered via JS on load.
     *
     * @since 3.4.0
     */

    public function render_content() {

      //var_dump($this->value());

      $defaultValue = '#RRGGBB';
      $defaultValueAttr = '';


      if( '' != $this->value()){
        if(is_string( $this->value() )){
          if('#' !== substr($this->value(), 0,1)){
            $defaultValue = '#' . $this->value();
          }else{
            $defaultValue = $this->value();
          }
          $defaultValueAttr = ' value=' . $defaultValue;
        }
      }else if( '' != $this->setting->default){
        $defaultValue = $this->setting->default;
        $defaultValueAttr = ' data-default-color=' . $defaultValue;
      }




      if(!empty($this->label)){
        echo '<span class="customize-control-title">'.$this->label.'</span>';
      }
      if(!empty($this->description)){
        echo '<span class="customize-control-title">'.$this->description.'</span>';
      }

      echo '<div class="customize-control-content">';
      echo '<label><span class="screen-reader-text">'.$this->label.'</span>';

      echo '<input class="color-picker-customize color-picker" type="text" maxlength="7" placeholder="#RRGGBB"  data-alpha-enabled="true"' .$defaultValueAttr. ' />';

      echo '</label>';
      echo '</div>';


    }


  }//end Simple_Days_Color_Alpha_Custom_Control


