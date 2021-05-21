<?php
defined( 'ABSPATH' ) || exit;

remove_theme_mod('simple_days_theme_version');

$dir = WP_CONTENT_DIR.'/uploads/simple_days_cache/';
if ( file_exists($dir) ) {
  require_once ABSPATH . 'wp-admin/includes/file.php';
  global $wp_filesystem;
  if ( WP_Filesystem() ) {
    if ( $wp_filesystem->is_dir($dir) ) {
      $wp_filesystem->delete($dir,true);
    }
  }
}
