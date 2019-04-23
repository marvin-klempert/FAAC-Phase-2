<?php
// Theme assets to load
function fwd_asset_loader()
{
  // Styles
  wp_register_style('common', get_stylesheet_directory_uri() . '/resources/styles/dist/common.css', false, null);
  wp_register_style('404', get_stylesheet_directory_uri() . '/resources/styles/dist/404.css', false, null);
  wp_register_style('attachment', get_stylesheet_directory_uri() . '/resources/styles/dist/attachment.css', false, null);

  wp_enqueue_style( 'common' );


  // Scripts
  wp_register_script('common', get_stylesheet_directory_uri() . '/resources/scripts/dist/common.js', array('jquery'), null, true);
  wp_register_script('404', get_stylesheet_directory_uri() . '/resources/scripts/dist/404.js', array('common'), null, true);
  wp_register_script('attachment', get_stylesheet_directory_uri() . '/resources/scripts/dist/attachment.js', array('common'), null, true);

  wp_enqueue_script( 'common' );
}
add_action('wp_enqueue_scripts', 'fwd_asset_loader', 100);