<?php
defined( 'ABSPATH' ) || exit;
/**
 * Sanitize Settings
 *
 * @package Simple Days
 */

function simple_days_sanitize_radio( $input, $setting ){
         //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
  $input = sanitize_key($input);
            //get the list of possible radio box options
  $choices = $setting->manager->get_control( $setting->id )->choices;
            //return input if valid or return default option
  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function simple_days_sanitize_select( $input, $setting ){
            //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
  $input = sanitize_key($input);
            //get the list of possible select options
  $choices = $setting->manager->get_control( $setting->id )->choices;
            //return input if valid or return default option
  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function simple_days_sanitize_image_file( $file, $setting ) {
            //allowed file types
  $mimes = array(
    'jpg|jpeg|jpe' => 'assets/images/jpeg',
    'gif'          => 'assets/images/gif',
    'png'          => 'assets/images/png'
  );
            //check file type from file name
  $file_ext = wp_check_filetype( $file, $mimes );
            //if file has a valid mime type return it, otherwise return default
  return ( $file_ext['ext'] ? $file : $setting->default );
}

    //select sanitization function
function simple_days_sns_name_sanitize($input){
          //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
  $input = sanitize_key($input);
          //get the list of possible select options
  $choices = array(
    'none'            => '-',
    'amazon'          => 'Amazon',
    'buffer'          => 'buffer',
    'codepen'         => 'CodePen',
    'digg'            => 'digg',
    'mail'            => 'Email',
    'evernote'        => 'Evernote',
    'facebook'        => 'Facebook',
    'feedly'          => 'Feedly',
    'flickr'          => 'Flickr',
    'github'          => 'Github',
    'googleplus'      => 'Google+',
    'hatenabookmark'  => 'Hatena Bookmark',
    'instagram'       => 'Instagram',
    'line'            => 'Line',
    'linkedin'        => 'LinkedIn',
    'meetup'          => 'Meetup',
    'messenger'       => 'Messenger',
    'pinterest'       => 'Pinterest',
    'pocket'          => 'Pocket',
    'reddit'          => 'Reddit',
    'rss'             => 'RSS',
    'soundcloud'      => 'SoundCloud',
    'tumblr'          => 'Tumblr',
    'twitter'         => 'Twitter',
    'whatsapp'        => 'WhatsApp',
    'vimeo'           => 'Vimeo',
    'youtube'         => 'Youtube',
  );
          //return input if valid or return default option
  return ( array_key_exists( $input, $choices ) ? $input : '' );
}

function simple_days_sanitize_intval($input){
  $input = intval($input);
  return $input;
}

function simple_days_sanitize_rgba_color( $color ) {
  if ( '' === $color )
    return '';

  if ( false === strpos( $color, 'rgba' )){
    $color = maybe_hash_hex_color( $color );
    return $color;
  }
  else {
    $color = str_replace( ' ', '', $color );
    sscanf( $color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
    return 'rgba('.$red.','.$green.','.$blue.','.$alpha.')';
  }
}

function simple_days_num_minus($input){
  if (preg_match("/^-?[0-9]+(,-?[0-9]+)*$/", $input)) {
    return $input;
  }
}


function simple_days_array_sanitize ( $input ) {

  $option = array();
  foreach ( $input as $key => $val ) {
    if ( is_array ( $val ) ){
      $key = sanitize_text_field ( $key );
      $option[$key] = simple_days_array_sanitize ( $val );
    } else {
      $key = sanitize_text_field ( $key );

      $option[$key] = sanitize_text_field ( $val );


    }
  }
  return $option;
}
