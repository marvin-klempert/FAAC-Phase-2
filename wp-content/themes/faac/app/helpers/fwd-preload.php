<?php
/**
 * Emits a 'preload' link tag for the source provided
 *
 * @var string $handle      The script or style handle to preload
 * @var string $type        The file type to use in the file reference
 *
 * @return string $result   A <link> tag with the script/style to preload
 */

function fwd_preload( $handle, $type ) {

  // If the file is CSS, echo this
  if(
    strtolower($type) == 'css' ||
    strtolower($type) == 'style'
  ):
    $result = "<link rel='preload' href='" . get_stylesheet_directory_uri() . "/resources/styles/dist/" . $handle . ".css' as='style' />\n";
  // If the file is JS, echo this
  elseif(
    strtolower($type) == 'js' ||
    strtolower($type) == 'script'
  ):
    $result = "<link rel='preload' href='" . get_stylesheet_directory_uri() . "/resources/scripts/dist/" . $handle . ".js' as='script' />\n";
  endif;

  echo $result;
}
