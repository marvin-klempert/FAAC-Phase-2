<?php
// Changes the save location for ACF fields
add_filter('acf/settings/save_json', 'fwd_acf_json_save_point');
function fwd_acf_json_save_point( $path ) {
  $path = get_stylesheet_directory() . '/resources/acf';
  return $path;
}

// Changes the load location for ACF fields
add_filter('acf/settings/load_json', 'fwd_acf_json_load_point');
function fwd_acf_json_load_point( $paths ) {
  unset($paths[0]);
  $paths[] = get_stylesheet_directory() . '/resources/acf';
  return $paths;
}