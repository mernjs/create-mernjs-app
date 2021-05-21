<?php
defined( 'ABSPATH' ) || exit;
/**
 * Extra content
 *
 * @package Simple Days
 */

add_filter('the_content','simple_days_replace_content');

function simple_days_replace_content($the_content) {

  if(get_post_format() === 'chat'){
    require_once SIMPLE_DAYS_THEME_DIR .  'inc/extra-chat.php';
    $the_content = simple_days_extra_content_chat($the_content);
  }

  return $the_content;

}
