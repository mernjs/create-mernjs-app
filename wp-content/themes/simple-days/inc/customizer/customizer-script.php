<?php
defined( 'ABSPATH' ) || exit;




?>
<script type="text/javascript">
  ( function( $ ) {
    <?php

    $h_f = array('h','f');
    $wp_value ='wp.customize.settings.values.simple_days_menu_bar_';
    foreach ($h_f as $value) {

      $i = 1;
      while($i<=10) {
        ?>
        wp.customize( 'simple_days_menu_bar_<?php echo $value; ?>_icon_after_<?php echo $i; ?>', function( value ) {
          value.bind( function( newval ) {
            var content = <?php echo $wp_value.$value; ?>_icon_<?php echo $i; ?>;
            var color = <?php echo $wp_value.$value; ?>_icon_color_<?php echo $i; ?>;
            if(newval == true){
              <?php echo $wp_value.$value; ?>_icon_after_<?php echo $i; ?> = true;
              var b_a = 'after';
              var a_b = 'before';
            }else{
              <?php echo $wp_value.$value; ?>_icon_after_<?php echo $i; ?> = false;
              var b_a = 'before';
              var a_b = 'after';
            }

            if(content != 'none'){
              var temp = '#menu_<?php echo $value; ?> > li:nth-child(<?php echo $i; ?>) > a:'+ b_a +',#menu_<?php echo $value; ?> > li:nth-child(<?php echo $i; ?>) > div > a:'+ b_a +'{content:"\\' + content + '";color:' + color + '}#menu_<?php echo $value; ?> > li:nth-child(<?php echo $i; ?>) > a:'+ a_b +',#menu_<?php echo $value; ?> > li:nth-child(<?php echo $i; ?>) > div > a:'+ a_b +'{content:"";}';
              $( '#simple_days_menu_bar_<?php echo $value; ?>_icon_<?php echo $i; ?>' ).html( temp );
            }
          } );
        } );

        wp.customize( 'simple_days_menu_bar_<?php echo $value; ?>_icon_<?php echo $i; ?>', function( value ) {
          value.bind( function( newval ) {
            var b_a = <?php echo $wp_value.$value; ?>_icon_after_<?php echo $i; ?>;
            var color = <?php echo $wp_value.$value; ?>_icon_color_<?php echo $i; ?>;
            if(b_a == true){
              b_a = 'after';
              var a_b = 'before';
            }else{
              b_a = 'before';
              var a_b = 'after';
            }
            if(newval != 'none'){
              var temp = '#menu_<?php echo $value; ?> > li:nth-child(<?php echo $i; ?>) > a:'+ b_a +',#menu_<?php echo $value; ?> > li:nth-child(<?php echo $i; ?>) > div > a:'+ b_a +'{content:"\\' + newval + '";color:' + color + '}#menu_<?php echo $value; ?> > li:nth-child(<?php echo $i; ?>) > a:'+ a_b +',#menu_<?php echo $value; ?> > li:nth-child(<?php echo $i; ?>) > div > a:'+ a_b +'{content:"";}';
            }else{
              var temp = '#menu_<?php echo $value; ?> > li:nth-child(<?php echo $i; ?>) > a:'+ b_a +',#menu_<?php echo $value; ?> > li:nth-child(<?php echo $i; ?>) > div > a:'+ b_a +'{content:""}#menu_<?php echo $value; ?> > li:nth-child(<?php echo $i; ?>) > a:'+ a_b +',#menu_<?php echo $value; ?> > li:nth-child(<?php echo $i; ?>) > div > a:'+ a_b +'{content:"";}';
            }
            $( '#simple_days_menu_bar_<?php echo $value; ?>_icon_<?php echo $i; ?>' ).html( temp );
            <?php echo $wp_value.$value; ?>_icon_<?php echo $i; ?> = newval;
          } );
        } );

        wp.customize( 'simple_days_menu_bar_<?php echo $value; ?>_icon_color_<?php echo $i; ?>', function( value ) {
          value.bind( function( newval ) {
            if(newval == ''){newval = 'inherit';}
            var temp = '#menu_<?php echo $value; ?> > li:nth-child(<?php echo $i; ?>) > a:before,#menu_<?php echo $value; ?> > li:nth-child(<?php echo $i; ?>) > div > a:before{color:' + newval + '}#menu_<?php echo $value; ?> > li:nth-child(<?php echo $i; ?>) > a:after,#menu_<?php echo $value; ?> > li:nth-child(<?php echo $i; ?>) > div > a:after{color:' + newval + '}';
            $( '#simple_days_menu_bar_<?php echo $value; ?>_icon_<?php echo $i; ?>' ).append( temp );
            <?php echo $wp_value.$value; ?>_icon_color_<?php echo $i; ?> = newval;
          } );
        } );


        <?php
        ++$i;
      }
    }

    $angle = array('top','right','bottom','left');
    $p_m = array('padding','margin');
    $i = 2;
    $wp_value ='wp.customize.settings.values.simple_days_post_heading_';
    while($i<=4) {
      ?>

      wp.customize( 'simple_days_post_heading_<?php echo $i; ?>_text_size', function( value ) {
        value.bind( function( newval ) {
          jQuery('#post_body > h<?php echo $i; ?>').css('font-size', newval + 'px' );
        } );
      } );
      wp.customize( 'simple_days_post_heading_<?php echo $i; ?>_font_weight', function( value ) {
        value.bind( function( newval ) {
          jQuery('#post_body > h<?php echo $i; ?>').css('font-weight', newval );
        } );
      } );
      wp.customize( 'simple_days_post_heading_<?php echo $i; ?>_text_color', function( value ) {
        value.bind( function( newval ) {
          if(newval == ''){newval = 'inherit';}
          jQuery('#post_body > h<?php echo $i; ?>').css('color', newval );
        } );
      } );
      wp.customize( 'simple_days_post_heading_<?php echo $i; ?>_text_position', function( value ) {
        value.bind( function( newval ) {
          jQuery('#post_body > h<?php echo $i; ?>').css('text-align', newval );
        } );
      } );
      wp.customize( 'simple_days_post_heading_<?php echo $i; ?>_background_color', function( value ) {
        value.bind( function( newval ) {
          jQuery('#post_body > h<?php echo $i; ?>').css('background', newval );
        } );
      } );
      wp.customize( 'simple_days_post_heading_<?php echo $i; ?>_background_image', function( value ) {
        value.bind( function( newval ) {
          jQuery('#post_body > h<?php echo $i; ?>').css('background-image', 'url('+newval+')' );
        } );
      } );



      <?php
      foreach ($angle as $value) { ?>
        wp.customize( 'simple_days_post_heading_<?php echo $i; ?>_border_<?php echo $value; ?>_style', function( value ) {
          value.bind( function( newval ) {
            jQuery('#post_body > h<?php echo $i; ?>').css('border-<?php echo $value; ?>-style', newval );
          } );
        } );
        wp.customize( 'simple_days_post_heading_<?php echo $i; ?>_border_<?php echo $value; ?>_width', function( value ) {
          value.bind( function( newval ) {
            jQuery('#post_body > h<?php echo $i; ?>').css('border-<?php echo $value; ?>-width', newval + 'px' );
          } );
        } );
        wp.customize( 'simple_days_post_heading_<?php echo $i; ?>_border_<?php echo $value; ?>_color', function( value ) {
          value.bind( function( newval ) {
            jQuery('#post_body > h<?php echo $i; ?>').css('border-<?php echo $value; ?>-color', newval );
          } );
        } );
        <?php
      }
      ?>

      wp.customize( 'simple_days_post_heading_<?php echo $i; ?>_border_radius_top_left', function( value ) {
        value.bind( function( newval ) {
          jQuery('#post_body > h<?php echo $i; ?>').css('border-top-left-radius', newval + 'px' );
        } );
      } );
      wp.customize( 'simple_days_post_heading_<?php echo $i; ?>_border_radius_top_right', function( value ) {
        value.bind( function( newval ) {
          jQuery('#post_body > h<?php echo $i; ?>').css('border-top-right-radius', newval + 'px' );
        } );
      } );
      wp.customize( 'simple_days_post_heading_<?php echo $i; ?>_border_radius_bottom_left', function( value ) {
        value.bind( function( newval ) {
          jQuery('#post_body > h<?php echo $i; ?>').css('border-bottom-left-radius', newval + 'px' );
        } );
      } );
      wp.customize( 'simple_days_post_heading_<?php echo $i; ?>_border_radius_bottom_right', function( value ) {
        value.bind( function( newval ) {
          jQuery('#post_body > h<?php echo $i; ?>').css('border-bottom-right-radius', newval + 'px' );
        } );
      } );
      <?php

      foreach ($p_m as $value) {
        foreach ($angle as $value2) { ?>
          wp.customize( 'simple_days_post_heading_<?php echo $i; ?>_<?php echo $value; ?>_<?php echo $value2; ?>', function( value ) {
            value.bind( function( newval ) {
              jQuery('#post_body > h<?php echo $i; ?>').css('<?php echo $value; ?>-<?php echo $value2; ?>', newval + 'px' );
            } );
          } );
        <?php }
      }
      ?>

      wp.customize( 'simple_days_post_heading_<?php echo $i; ?>_balloon', function( value ) {
        value.bind( function( newval ) {
          if(newval == true){
            var temp = '#post_body > h<?php echo $i; ?>{position: relative;}#post_body > h<?php echo $i; ?>:after{position: absolute;content: "";top: 100%;left: '+ <?php echo $wp_value.$i; ?>_balloon_position +'px;border: '+ <?php echo $wp_value.$i; ?>_balloon_width +'px solid transparent;border-top: '+ <?php echo $wp_value.$i; ?>_balloon_height +'px solid '+ <?php echo $wp_value.$i; ?>_balloon_color +';width: 0;height: 0;}';
          }else{
            var temp = '#post_body > h<?php echo $i; ?>:after{border:none}';
          }
          $( '#heading_balloon_css' ).append( temp );
        } );
      } );

      wp.customize( 'simple_days_post_heading_<?php echo $i; ?>_balloon_color', function( value ) {
        value.bind( function( newval ) {
          var temp = '#post_body > h<?php echo $i; ?>:after{border-top-color:' + newval + '}';
          $( '#heading_balloon_css' ).append( temp );
          <?php echo $wp_value.$i; ?>_balloon_color = newval;
        } );
      } );
      wp.customize( 'simple_days_post_heading_<?php echo $i; ?>_balloon_position', function( value ) {
        value.bind( function( newval ) {
          var temp = '#post_body > h<?php echo $i; ?>:after{left:' + newval + 'px}';
          $( '#heading_balloon_css' ).append( temp );
          <?php echo $wp_value.$i; ?>_balloon_position = newval;
        } );
      } );
      wp.customize( 'simple_days_post_heading_<?php echo $i; ?>_balloon_width', function( value ) {
        value.bind( function( newval ) {
          var temp = '#post_body > h<?php echo $i; ?>:after{border-right-width:' + newval + 'px;border-bottom-width:' + newval + 'px;border-left-width:' + newval + 'px;}';
          $( '#heading_balloon_css' ).append( temp );
          <?php echo $wp_value.$i; ?>_balloon_width = newval;
        } );
      } );
      wp.customize( 'simple_days_post_heading_<?php echo $i; ?>_balloon_height', function( value ) {
        value.bind( function( newval ) {
          var temp = '#post_body > h<?php echo $i; ?>:after{border-top-width:' + newval + 'px}';
          $( '#heading_balloon_css' ).append( temp );
          <?php echo $wp_value.$i; ?>_balloon_height = newval;
        } );
      } );

      <?php
      ++$i;
    }



    $wp_value ='wp.customize.settings.values.simple_days_widget_title_';
    $side_footer = array('sidebar' => '.sw_title','footer' => '.fw_title');
    foreach ($side_footer as $s_f_name => $s_f_c_name) {
      ?>

      wp.customize( 'simple_days_widget_title_<?php echo $s_f_name; ?>_text_size', function( value ) {
        value.bind( function( newval ) {
          jQuery('<?php echo $s_f_c_name; ?>').css('font-size', newval + 'px' );
        } );
      } );
      wp.customize( 'simple_days_widget_title_<?php echo $s_f_name; ?>_font_weight', function( value ) {
        value.bind( function( newval ) {
          jQuery('<?php echo $s_f_c_name; ?>').css('font-weight', newval);
        } );
      } );
      wp.customize( 'simple_days_widget_title_<?php echo $s_f_name; ?>_text_color', function( value ) {
        value.bind( function( newval ) {
          if(newval == ''){newval = 'inherit';}
          jQuery('<?php echo $s_f_c_name; ?>').css('color', newval );
        } );
      } );
      wp.customize( 'simple_days_widget_title_<?php echo $s_f_name; ?>_text_position', function( value ) {
        value.bind( function( newval ) {
          jQuery('<?php echo $s_f_c_name; ?>').css('text-align', newval );
        } );
      } );
      wp.customize( 'simple_days_widget_title_<?php echo $s_f_name; ?>_background_color', function( value ) {
        value.bind( function( newval ) {
          jQuery('<?php echo $s_f_c_name; ?>').css('background', newval );
        } );
      } );
      wp.customize( 'simple_days_widget_title_<?php echo $s_f_name; ?>_background_image', function( value ) {
        value.bind( function( newval ) {
          jQuery('<?php echo $s_f_c_name; ?>').css('background-image', 'url('+newval+')' );
        } );
      } );

      <?php
      foreach ($angle as $value) { ?>
        wp.customize( 'simple_days_widget_title_<?php echo $s_f_name; ?>_border_<?php echo $value; ?>_style', function( value ) {
          value.bind( function( newval ) {
            jQuery('<?php echo $s_f_c_name; ?>').css('border-<?php echo $value; ?>-style', newval );
          } );
        } );
        wp.customize( 'simple_days_widget_title_<?php echo $s_f_name; ?>_border_<?php echo $value; ?>_width', function( value ) {
          value.bind( function( newval ) {
            jQuery('<?php echo $s_f_c_name; ?>').css('border-<?php echo $value; ?>-width', newval + 'px' );
          } );
        } );
        wp.customize( 'simple_days_widget_title_<?php echo $s_f_name; ?>_border_<?php echo $value; ?>_color', function( value ) {
          value.bind( function( newval ) {
            jQuery('<?php echo $s_f_c_name; ?>').css('border-<?php echo $value; ?>-color', newval );
          } );
        } );
        <?php
      }
      ?>

      wp.customize( 'simple_days_widget_title_<?php echo $s_f_name; ?>_border_radius_top_left', function( value ) {
        value.bind( function( newval ) {
          jQuery('<?php echo $s_f_c_name; ?>').css('border-top-left-radius', newval + 'px' );
        } );
      } );
      wp.customize( 'simple_days_widget_title_<?php echo $s_f_name; ?>_border_radius_top_right', function( value ) {
        value.bind( function( newval ) {
          jQuery('<?php echo $s_f_c_name; ?>').css('border-top-right-radius', newval + 'px' );
        } );
      } );
      wp.customize( 'simple_days_widget_title_<?php echo $s_f_name; ?>_border_radius_bottom_left', function( value ) {
        value.bind( function( newval ) {
          jQuery('<?php echo $s_f_c_name; ?>').css('border-bottom-left-radius', newval + 'px' );
        } );
      } );
      wp.customize( 'simple_days_widget_title_<?php echo $s_f_name; ?>_border_radius_bottom_right', function( value ) {
        value.bind( function( newval ) {
          jQuery('<?php echo $s_f_c_name; ?>').css('border-bottom-right-radius', newval + 'px' );
        } );
      } );
      <?php
      $p_m = array('padding','margin');
      foreach ($p_m as $value) {
        foreach ($angle as $value2) { ?>
          wp.customize( 'simple_days_widget_title_<?php echo $s_f_name; ?>_<?php echo $value; ?>_<?php echo $value2; ?>', function( value ) {
            value.bind( function( newval ) {
              jQuery('<?php echo $s_f_c_name; ?>').css('<?php echo $value; ?>-<?php echo $value2; ?>', newval + 'px' );
            } );
          } );
        <?php }
      }
      ?>


      wp.customize( 'simple_days_widget_title_<?php echo $s_f_name; ?>_balloon', function( value ) {
        value.bind( function( newval ) {
          if(newval == true){
            var temp = '<?php echo $s_f_c_name; ?>{position: relative;}<?php echo $s_f_c_name; ?>:after{position: absolute;content: "";top: 100%;left: '+ <?php echo $wp_value.$s_f_name; ?>_balloon_position +'px;border: '+ <?php echo $wp_value.$s_f_name; ?>_balloon_width +'px solid transparent;border-top: '+ <?php echo $wp_value.$s_f_name; ?>_balloon_height +'px solid '+ <?php echo $wp_value.$s_f_name; ?>_balloon_color +';width: 0;height: 0;}';
          }else{
            var temp = '<?php echo $s_f_c_name; ?>:after{border:none}';
          }

          $( '#widget_title_css' ).append( temp );

        } );
      } );

      wp.customize( 'simple_days_widget_title_<?php echo $s_f_name; ?>_balloon_color', function( value ) {
        value.bind( function( newval ) {
          var temp = '<?php echo $s_f_c_name; ?>:after{border-top-color:' + newval + '}';
          $( '#widget_title_css' ).append( temp );
          <?php echo $wp_value.$s_f_name; ?>_balloon_color = newval;
        } );
      } );
      wp.customize( 'simple_days_widget_title_<?php echo $s_f_name; ?>_balloon_position', function( value ) {
        value.bind( function( newval ) {
          var temp = '<?php echo $s_f_c_name; ?>:after{left:' + newval + 'px}';
          $( '#widget_title_css' ).append( temp );
          <?php echo $wp_value.$s_f_name; ?>_balloon_position = newval;
        } );
      } );
      wp.customize( 'simple_days_widget_title_<?php echo $s_f_name; ?>_balloon_width', function( value ) {
        value.bind( function( newval ) {
          var temp = '<?php echo $s_f_c_name; ?>:after{border-right-width:' + newval + 'px;border-bottom-width:' + newval + 'px;border-left-width:' + newval + 'px;}';
          $( '#widget_title_css' ).append( temp );
          <?php echo $wp_value.$s_f_name; ?>_balloon_width = newval;
        } );
      } );
      wp.customize( 'simple_days_widget_title_<?php echo $s_f_name; ?>_balloon_height', function( value ) {
        value.bind( function( newval ) {
          var temp = '<?php echo $s_f_c_name; ?>:after{border-top-width:' + newval + 'px}';
          $( '#widget_title_css' ).append( temp );
          <?php echo $wp_value.$s_f_name; ?>_balloon_height = newval;
        } );
      } );

      <?php
      ++$i;
    }
    ?>


    wp.customize( 'simple_days_index_title_text_size', function( value ) {
      value.bind( function( newval ) {
        jQuery('.post_card_title').css('font-size', newval + 'px' );
      } );
    } );
    wp.customize( 'simple_days_index_title_font_weight', function( value ) {
      value.bind( function( newval ) {
        jQuery('.post_card_title').css('font-weight', newval );
      } );
    } );
    wp.customize( 'simple_days_index_title_text_color', function( value ) {
      value.bind( function( newval ) {
        var temp = 'a.entry_title{color:' + newval + '}';
        $( '#heading_balloon_css' ).append( temp );
      } );
    } );
    wp.customize( 'simple_days_index_title_text_hover_color', function( value ) {
      value.bind( function( newval ) {
        var temp = 'a.entry_title:hover{color:' + newval + '}';
        $( '#heading_balloon_css' ).append( temp );
      } );
    } );
    wp.customize( 'simple_days_index_title_text_position', function( value ) {
      value.bind( function( newval ) {
        jQuery('.post_card_title').css('text-align', newval );
      } );
    } );
    wp.customize( 'simple_days_index_title_background_color', function( value ) {
      value.bind( function( newval ) {
        jQuery('.post_card_title').css('background', newval );
      } );
    } );
    wp.customize( 'simple_days_index_title_background_image', function( value ) {
      value.bind( function( newval ) {
        jQuery('.post_card_title').css('background-image', 'url('+newval+')' );
      } );
    } );

    <?php
    foreach ($angle as $value) { ?>
      wp.customize( 'simple_days_index_title_border_<?php echo $value; ?>_style', function( value ) {
        value.bind( function( newval ) {
          jQuery('.post_card_title').css('border-<?php echo $value; ?>-style', newval );
        } );
      } );
      wp.customize( 'simple_days_index_title_border_<?php echo $value; ?>_width', function( value ) {
        value.bind( function( newval ) {
          jQuery('.post_card_title').css('border-<?php echo $value; ?>-width', newval + 'px' );
        } );
      } );
      wp.customize( 'simple_days_index_title_border_<?php echo $value; ?>_color', function( value ) {
        value.bind( function( newval ) {
          jQuery('.post_card_title').css('border-<?php echo $value; ?>-color', newval );
        } );
      } );
      <?php
    }
    ?>

    wp.customize( 'simple_days_index_title_border_radius_top_left', function( value ) {
      value.bind( function( newval ) {
        jQuery('.post_card_title').css('border-top-left-radius', newval + 'px' );
      } );
    } );
    wp.customize( 'simple_days_index_title_border_radius_top_right', function( value ) {
      value.bind( function( newval ) {
        jQuery('.post_card_title').css('border-top-right-radius', newval + 'px' );
      } );
    } );
    wp.customize( 'simple_days_index_title_border_radius_bottom_left', function( value ) {
      value.bind( function( newval ) {
        jQuery('.post_card_title').css('border-bottom-left-radius', newval + 'px' );
      } );
    } );
    wp.customize( 'simple_days_index_title_border_radius_bottom_right', function( value ) {
      value.bind( function( newval ) {
        jQuery('.post_card_title').css('border-bottom-right-radius', newval + 'px' );
      } );
    } );
    <?php


    $wp_value ='wp.customize.settings.values.simple_days_index_title_balloon_';
    foreach ($p_m as $value) {
      foreach ($angle as $value2) { ?>
        wp.customize( 'simple_days_index_title_<?php echo $value; ?>_<?php echo $value2; ?>', function( value ) {
          value.bind( function( newval ) {
            jQuery('.post_card_title').css('<?php echo $value; ?>-<?php echo $value2; ?>', newval + 'px' );
          } );
        } );
      <?php }
    }
    ?>

    wp.customize( 'simple_days_index_title_balloon', function( value ) {
      value.bind( function( newval ) {
        if(newval == true){
          var temp = '.post_card_title{position: relative;}.post_card_title:after{position: absolute;content: "";top: 100%;left: '+ <?php echo $wp_value; ?>position +'px;border: '+ <?php echo $wp_value; ?>width +'px solid transparent;border-top: '+ <?php echo $wp_value; ?>height +'px solid '+ <?php echo $wp_value; ?>color +';width: 0;height: 0;}';
        }else{
          var temp = '.post_card_title:after{border:none}';
        }
        $( '#heading_balloon_css' ).append( temp );
      } );
    } );

    wp.customize( 'simple_days_index_title_balloon_color', function( value ) {
      value.bind( function( newval ) {
        var temp = '.post_card_title:after{border-top-color:' + newval + '}';
        $( '#heading_balloon_css' ).append( temp );
        <?php echo $wp_value; ?>color = newval;
      } );
    } );
    wp.customize( 'simple_days_index_title_balloon_position', function( value ) {
      value.bind( function( newval ) {
        var temp = '.post_card_title:after{left:' + newval + 'px}';
        $( '#heading_balloon_css' ).append( temp );
        <?php echo $wp_value; ?>position = newval;
      } );
    } );
    wp.customize( 'simple_days_index_title_balloon_width', function( value ) {
      value.bind( function( newval ) {
        var temp = '.post_card_title:after{border-right-width:' + newval + 'px;border-bottom-width:' + newval + 'px;border-left-width:' + newval + 'px;}';
        $( '#heading_balloon_css' ).append( temp );
        <?php echo $wp_value; ?>width = newval;
      } );
    } );
    wp.customize( 'simple_days_index_title_balloon_height', function( value ) {
      value.bind( function( newval ) {
        var temp = '.post_card_title:after{border-top-width:' + newval + 'px}';
        $( '#heading_balloon_css' ).append( temp );
        <?php echo $wp_value; ?>height = newval;
      } );
    } );







    wp.customize( 'simple_days_post_title_text_size', function( value ) {
      value.bind( function( newval ) {
        jQuery('h1.post_title').css('font-size', newval + 'px' );
      } );
    } );
    wp.customize( 'simple_days_post_title_font_weight', function( value ) {
      value.bind( function( newval ) {
        jQuery('h1.post_title').css('font-weight', newval );
      } );
    } );
    wp.customize( 'simple_days_post_title_text_color', function( value ) {
      value.bind( function( newval ) {
        jQuery('h1.post_title').css('color', newval );
      } );
    } );

    wp.customize( 'simple_days_post_title_text_position', function( value ) {
      value.bind( function( newval ) {
        jQuery('h1.post_title').css('text-align', newval );
      } );
    } );
    wp.customize( 'simple_days_post_title_background_color', function( value ) {
      value.bind( function( newval ) {
        jQuery('.post_item > h1.post_title').css('background', newval );
      } );
    } );
    wp.customize( 'simple_days_post_title_background_image', function( value ) {
      value.bind( function( newval ) {
        jQuery('.post_item > h1.post_title').css('background-image', 'url('+newval+')' );
      } );
    } );

    <?php
    foreach ($angle as $value) { ?>
      wp.customize( 'simple_days_post_title_border_<?php echo $value; ?>_style', function( value ) {
        value.bind( function( newval ) {
          jQuery('h1.post_title').css('border-<?php echo $value; ?>-style', newval );
        } );
      } );
      wp.customize( 'simple_days_post_title_border_<?php echo $value; ?>_width', function( value ) {
        value.bind( function( newval ) {
          jQuery('h1.post_title').css('border-<?php echo $value; ?>-width', newval + 'px' );
        } );
      } );
      wp.customize( 'simple_days_post_title_border_<?php echo $value; ?>_color', function( value ) {
        value.bind( function( newval ) {
          jQuery('h1.post_title').css('border-<?php echo $value; ?>-color', newval );
        } );
      } );
      <?php
    }
    ?>

    wp.customize( 'simple_days_post_title_border_radius_top_left', function( value ) {
      value.bind( function( newval ) {
        jQuery('h1.post_title').css('border-top-left-radius', newval + 'px' );
      } );
    } );
    wp.customize( 'simple_days_post_title_border_radius_top_right', function( value ) {
      value.bind( function( newval ) {
        jQuery('h1.post_title').css('border-top-right-radius', newval + 'px' );
      } );
    } );
    wp.customize( 'simple_days_post_title_border_radius_bottom_left', function( value ) {
      value.bind( function( newval ) {
        jQuery('h1.post_title').css('border-bottom-left-radius', newval + 'px' );
      } );
    } );
    wp.customize( 'simple_days_post_title_border_radius_bottom_right', function( value ) {
      value.bind( function( newval ) {
        jQuery('h1.post_title').css('border-bottom-right-radius', newval + 'px' );
      } );
    } );
    <?php


    $wp_value ='wp.customize.settings.values.simple_days_post_title_balloon_';
    foreach ($p_m as $value) {
      foreach ($angle as $value2) { ?>
        wp.customize( 'simple_days_post_title_<?php echo $value; ?>_<?php echo $value2; ?>', function( value ) {
          value.bind( function( newval ) {
            jQuery('h1.post_title').css('<?php echo $value; ?>-<?php echo $value2; ?>', newval + 'px' );
          } );
        } );
      <?php }
    }
    ?>

    wp.customize( 'simple_days_post_title_balloon', function( value ) {
      value.bind( function( newval ) {
        if(newval == true){
          var temp = 'h1.post_title{position: relative;}h1.post_title:after{position: absolute;content: "";top: 100%;left: '+ <?php echo $wp_value; ?>position +'px;border: '+ <?php echo $wp_value; ?>width +'px solid transparent;border-top: '+ <?php echo $wp_value; ?>height +'px solid '+ <?php echo $wp_value; ?>color +';width: 0;height: 0;}';
        }else{
          var temp = 'h1.post_title:after{border:none}';
        }
        $( '#heading_balloon_css' ).append( temp );
      } );
    } );

    wp.customize( 'simple_days_post_title_balloon_color', function( value ) {
      value.bind( function( newval ) {
        var temp = 'h1.post_title:after{border-top-color:' + newval + '}';
        $( '#heading_balloon_css' ).append( temp );
        <?php echo $wp_value; ?>color = newval;
      } );
    } );
    wp.customize( 'simple_days_post_title_balloon_position', function( value ) {
      value.bind( function( newval ) {
        var temp = 'h1.post_title:after{left:' + newval + 'px}';
        $( '#heading_balloon_css' ).append( temp );
        <?php echo $wp_value; ?>position = newval;
      } );
    } );
    wp.customize( 'simple_days_post_title_balloon_width', function( value ) {
      value.bind( function( newval ) {
        var temp = 'h1.post_title:after{border-right-width:' + newval + 'px;border-bottom-width:' + newval + 'px;border-left-width:' + newval + 'px;}';
        $( '#heading_balloon_css' ).append( temp );
        <?php echo $wp_value; ?>width = newval;
      } );
    } );
    wp.customize( 'simple_days_post_title_balloon_height', function( value ) {
      value.bind( function( newval ) {
        var temp = 'h1.post_title:after{border-top-width:' + newval + 'px}';
        $( '#heading_balloon_css' ).append( temp );
        <?php echo $wp_value; ?>height = newval;
      } );
    } );





    <?php
    
    foreach ($p_m as $value) {
      foreach ($angle as $value2) { ?>
        wp.customize( 'yahman_add_ons_toc_<?php echo $value; ?>_<?php echo $value2; ?>', function( value ) {
          value.bind( function( newval ) {
            jQuery('#toc.toc').css('<?php echo $value; ?>-<?php echo $value2; ?>', newval + 'px' );
          } );
        } );
      <?php }
    }

    foreach ($angle as $value) { ?>
      wp.customize( 'yahman_add_ons_toc_border_<?php echo $value; ?>_style', function( value ) {
        value.bind( function( newval ) {
          jQuery('#toc.toc').css('border-<?php echo $value; ?>-style', newval );
        } );
      } );
      wp.customize( 'yahman_add_ons_toc_border_<?php echo $value; ?>_width', function( value ) {
        value.bind( function( newval ) {
          jQuery('#toc.toc').css('border-<?php echo $value; ?>-width', newval + 'px' );
        } );
      } );
      wp.customize( 'yahman_add_ons_toc_border_<?php echo $value; ?>_color', function( value ) {
        value.bind( function( newval ) {
          jQuery('#toc.toc').css('border-<?php echo $value; ?>-color', newval );
        } );
      } );
      <?php
    }
    ?>

    wp.customize( 'yahman_add_ons_toc_border_radius_top_left', function( value ) {
      value.bind( function( newval ) {
        jQuery('#toc.toc').css('border-top-left-radius', newval + 'px' );
      } );
    } );
    wp.customize( 'yahman_add_ons_toc_border_radius_top_right', function( value ) {
      value.bind( function( newval ) {
        jQuery('#toc.toc').css('border-top-right-radius', newval + 'px' );
      } );
    } );
    wp.customize( 'yahman_add_ons_toc_border_radius_bottom_left', function( value ) {
      value.bind( function( newval ) {
        jQuery('#toc.toc').css('border-bottom-left-radius', newval + 'px' );
      } );
    } );
    wp.customize( 'yahman_add_ons_toc_border_radius_bottom_right', function( value ) {
      value.bind( function( newval ) {
        jQuery('#toc.toc').css('border-bottom-right-radius', newval + 'px' );
      } );
    } );
    wp.customize( 'yahman_add_ons_toc_background_image', function( value ) {
      value.bind( function( newval ) {
        jQuery('#toc.toc').css('background-image', 'url('+newval+')' );
      } );
    } );
    <?php
    

    $color_setteing = array(
      'simple_days_font_color' => 'body',
      'blog_name' => '.title_text a',
      'footer_widget_textcolor' => '.f_widget_wrap',
      'footer_widget_linkcolor' => '.f_widget_wrap a:not(.icon_base):not(.to_top)',
      'simple_days_alert_box_color' => '#h_alert',
      'simple_days_index_date_text_color' => '.post_date_circle,.index_time',
      'link_textcolor' => 'a',
      'to_top_color' => '.to_top',
      'simple_days_index_category_text_color' => '.post_card_category',
      'simple_days_index_read_more_text_color' => '.more_read',
      'yahman_addons_pp_rank_font_color' => '.pl_rank',
      'header_menu_font_color' => '.menu_h li a',
      'header_menu_children_font_color' => '.menu_h .children li a',
      'header_menu_children_font_color' => '.menu_h .sub-menu li a',
      'credit_color' => '.credit_wrap',
      'credit_link_color' => '.credit_wrap a',
      'tagline_color' => '.tagline',
      'search_menu_color' => '.serach_box',
      'yahman_add_ons_toc_link_color' => '#toc.toc a,.toc_ctrl > label',
      'yahman_add_ons_toc_font_color' => '#toc.toc',
      'sub_menu_link_color' => '#nav_s a',
      'footer_menu_link_color' => '#nav_f a',
      'search_submit_color' => '.search_submit',
      'submit_color' => 'button, input[type="button"], input[type="submit"]',
      '' => '',
      '' => '',
    );
    $background_setteing = array(
      'simple_days_background_color' => 'body',
      'header_color' => '#h_wrap',
      'footer_widget_color' => '.f_widget_wrap',
      'footer_color' => '.credit_wrap',
      'header_nav_h2_bg_color' => '.nav_h2',
      'f_menu_wrap_bg_color' => '#menu_f',
      'oh_wrap_bg_color' => '#oh_wrap',
      'simple_days_alert_box_bg_color' => '#h_alert',
      'simple_days_index_date_bg_color' => '.post_date_circle,.index_time',
      'to_top_bg_color' => '.to_top',
      'simple_days_index_category_bg_color' => '.post_card_category',  
      'simple_days_index_read_more_bg_color' => '.more_read',
      'sub_menu_bg_color' => '#menu_sub',
      'main_content_bg_color' => '.post_content',
      'yahman_addons_pp_rank1' => 'li:nth-child(1) .pl_rank',
      'yahman_addons_pp_rank2' => 'li:nth-child(2) .pl_rank',
      'yahman_addons_pp_rank3' => 'li:nth-child(3) .pl_rank',
      'yahman_addons_pp_rank' => '.pl_rank',
      'header_menu_bg_color' => '.menu_h li',
      'header_menu_children_bg_color' => '.menu_h .children li',
      'header_menu_children_bg_color' => '.menu_h .sub-menu li',
      'yahman_add_ons_toc_background_color' => '#toc.toc',
      'simple_days_index_card_bg_color' => '.post_card',
      'search_submit_bg_color' => '.search_submit',
      'submit_bg_color' => 'button, input[type="button"], input[type="submit"]',
      '' => '',
    );
    $text_align_setteing = array(
      'simple_days_alert_box_text_position' => '#h_alert',
      'simple_days_google_ad_labeling_position' => '.ad_labeling',
    );



    foreach ($color_setteing as $key => $value) { ?>
      wp.customize( '<?php echo $key; ?>', function( value ) {
        value.bind( function( newval ) {
          if(newval == ''){newval = '';}
          jQuery('<?php echo $value; ?>').css('color', newval );
        } );
      } );
    <?php }

    foreach ($background_setteing as $key => $value) { ?>
      wp.customize( '<?php echo $key; ?>', function( value ) {
        value.bind( function( newval ) {
          if(newval == ''){newval = '';}
          jQuery('<?php echo $value; ?>').css('background-color', newval );
        } );
      } );
    <?php }

    foreach ($text_align_setteing as $key => $value) { ?>
      wp.customize( '<?php echo $key; ?>', function( value ) {
        value.bind( function( newval ) {
          if(newval == ''){newval = '';}
          jQuery('<?php echo $value; ?>').css('$text-align', newval );
        } );
      } );
    <?php }
    $gradient_name = array(
      'site_bg',
      'header_header',
      'footer_credit',
      'sidebar_widget_title',
      'footer_widget_title',
      'index_title',
      'header_over',
      'post_heading_h2',
      'post_heading_h3',
      'post_heading_h4',
    );
    foreach ($gradient_name as $key => $value) {
      ?>

      wp.customize( 'gradient_<?php echo $value; ?>_style', function( value ) {
        value.bind( function( newval ) {
          wp.customize.settings.values.gradient_<?php echo $value; ?>_style = newval;
          <?php echo $value; ?>_gradient ();
        } );
      } );

      wp.customize( 'gradient_<?php echo $value; ?>_degree', function( value ) {
        value.bind( function( newval ) {
          wp.customize.settings.values.gradient_<?php echo $value; ?>_degree = newval;
          <?php echo $value; ?>_gradient ();
        } );
      } );



      <?php
      $i = 1;
      while($i < 6){ ?>
        wp.customize( 'gradient_<?php echo $value; ?>_color_<?php echo $i; ?>', function( value ) {
          value.bind( function( newval ) {
            wp.customize.settings.values.gradient_<?php echo $value; ?>_color_<?php echo $i; ?> = newval;
            <?php echo $value; ?>_gradient ();
          } );
        } );
        wp.customize( 'gradient_<?php echo $value; ?>_position_<?php echo $i; ?>', function( value ) {
          value.bind( function( newval ) {
            wp.customize.settings.values.gradient_<?php echo $value; ?>_position_<?php echo $i; ?> = newval;
            <?php echo $value; ?>_gradient ();
          } );
        } );
        <?php
        ++$i;
      }
      ?>

      function <?php echo $value; ?>_gradient () {
        custom_gradient ('<?php echo $value; ?>')
      }
      <?php
    }

    $js_property = 'eval';
    ?>



    function custom_gradient (box) {

      function isset( data ){
        return ( typeof( data ) != 'undefined' );
      }

      var style = <?php echo $js_property; ?>("wp.customize.settings.values.gradient_"+ box +"_style");
      var degree = <?php echo $js_property; ?>("wp.customize.settings.values.gradient_"+ box +"_degree");
      var color1 = <?php echo $js_property; ?>("wp.customize.settings.values.gradient_"+ box +"_color_1");
      var color2 = <?php echo $js_property; ?>("wp.customize.settings.values.gradient_"+ box +"_color_2");
      var color3 = <?php echo $js_property; ?>("wp.customize.settings.values.gradient_"+ box +"_color_3");
      var color4 = <?php echo $js_property; ?>("wp.customize.settings.values.gradient_"+ box +"_color_4");
      var color5 = <?php echo $js_property; ?>("wp.customize.settings.values.gradient_"+ box +"_color_5");
      var position1 = <?php echo $js_property; ?>("wp.customize.settings.values.gradient_"+ box +"_position_1");
      var position2 = <?php echo $js_property; ?>("wp.customize.settings.values.gradient_"+ box +"_position_2");
      var position3 = <?php echo $js_property; ?>("wp.customize.settings.values.gradient_"+ box +"_position_3");
      var position4 = <?php echo $js_property; ?>("wp.customize.settings.values.gradient_"+ box +"_position_4");
      var position5 = <?php echo $js_property; ?>("wp.customize.settings.values.gradient_"+ box +"_position_5");

      var unit = comp = property = '';

      if(style === 'linear' || style === 'radial'){
        unit = '%';
      }else{
        unit = 'px';
      }


      if ('' != color1){
        if (0 != position1){
          color1 = color1 + ' ' + position1 + unit;
        }
        color1 = color1 + ',';
      }else{
        color1 = '';
      }
      if ('' != color2){
        if (0 != position2){
          color2 = color2 + ' ' + position2 + unit;
        }
        color2 = color2 + ',';
      }else{
        color2 = '';
      }
      if ('' != color3){
        if (0 != position3){
          color3 = color3 + ' ' + position3 + unit;
        }
        color3 = color3 + ',';
      }else{
        color3 = '';
      }
      if ('' != color4){
        if (0 != position4){
          color4 = color4 + ' ' + position4 + unit;
        }
        color4 = color4 + ',';
      }else{
        color4 = '';
      }
      if ('' != color5){
        if (0 != position5){
          color5 = color5 + ' ' + position5 + unit;
        }
        color5 = color5 + ',';
      }else{
        color5 = '';
      }

      if(degree != 0 ){
        degree = degree+'deg,';
      }else{
        degree = '';
      }
      comp = color1 + color2 + color3 + color4 + color5;
      var temp = comp.slice(-1);

      if( temp === ','){
        comp = comp.slice(0, -1);
      }
      comp = style + '-gradient(' + degree + comp + ');';



      switch(box){

        case 'header_header': property = '#h_wrap'; break;
        case 'site_bg': property = 'body'; break;
        case 'footer_credit': property = '.credit_wrap'; break;
        case 'sidebar_widget_title': property = '.sw_title'; break;
        case 'footer_widget_title': property = '.fw_title'; break;
        case 'index_title': property = '.post_card_title'; break;
        case 'header_over': property = '#oh_wrap'; break;
        case 'post_heading_h2': property = '.post_body>h2'; break;
        case 'post_heading_h3': property = '.post_body>h3'; break;
        case 'post_heading_h4': property = '.post_body>h4'; break;

        default : break;
      }

      $( '#etc_css' ).append( property + '{background:' + comp + '}' );

      //console.log(comp);

    }














  } )( jQuery );
</script>

