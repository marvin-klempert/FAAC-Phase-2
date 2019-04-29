<?php
// Theme assets to load
function fwd_asset_loader()
{
  wp_register_style('common', get_stylesheet_directory_uri() . '/resources/styles/dist/common.css', false, null);
  wp_enqueue_style( 'common' );

  wp_register_script('common', get_stylesheet_directory_uri() . '/resources/scripts/dist/common.js', array('jquery'), null, true);
  wp_enqueue_script( 'common' );

  $templates = array(
    '404',
    'category',
    'divisionIndex',
    'homepage',
    'general',
    'news',
    'single'
  );
  fwd_register_all( $templates );
}
add_action('wp_enqueue_scripts', 'fwd_asset_loader', 100);