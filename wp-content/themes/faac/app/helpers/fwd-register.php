<?php
/**
 * Script/style registration shorthand
 *
 * This function acts as shorthand to register scripts and styles for
 * individual page templates, primarily to simplify reading.
 *
 * @var string $slug      The name of the file to register
 */

function fwd_register( $slug ) {
  wp_register_script( $slug, get_stylesheet_directory_uri() . '/resources/scripts/dist/' . $slug . '.js', array('common'), null, true);
  wp_register_style( $slug, get_stylesheet_directory_uri() . '/resources/styles/dist/' . $slug . '.css', false, null);

}

/**
 * Script/style registration shorthand for arrays
 *
 * This function uses fwd_register() to cycle through an array of slugs and
 * register their associated scripts and styles
 *
 * @var array $slugs      An array of file names to register
 */
function fwd_register_all( $slugs = array() ) {
  foreach( $slugs as $slug ):
    fwd_register( $slug );
  endforeach;
}