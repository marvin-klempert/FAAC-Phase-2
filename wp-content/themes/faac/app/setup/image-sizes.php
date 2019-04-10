<?php
function fwd_image_sizes() {
  // Enable post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  // Uses data from http://gs.statcounter.com/screen-resolution-stats/desktop-mobile-tablet/worldwide
  add_theme_support('post-thumbnails');
  add_image_size('preload', 64, 9999);
  add_image_size('128w', 128, 9999);
  add_image_size('240w', 240, 9999);
  add_image_size('320w', 320, 9999);
  add_image_size('375w', 375, 9999);
  add_image_size('480w', 480, 9999);
  add_image_size('540w', 540, 9999);
  add_image_size('640w', 640, 9999);
  add_image_size('720w', 720, 9999);
  add_image_size('768w', 768, 9999);
  add_image_size('800w', 800, 9999);
  add_image_size('960w', 960, 9999);
  add_image_size('1024w', 1024, 9999);
  add_image_size('1280w', 1280, 9999);
  add_image_size('1366w', 1366, 9999);
  add_image_size('1440w', 1440, 9999);
  add_image_size('1600w', 1600, 9999);
  add_image_size('1920w', 1920, 9999);
  add_image_size('2560w', 2560, 9999);
  add_image_size('3840w', 3840, 9999);
}
add_action( 'after_setup_theme', 'fwd_image_sizes' );
