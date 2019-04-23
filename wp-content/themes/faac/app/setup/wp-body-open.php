<?php
/**
 * Creates the wp_body_open() function, if it doesn't exist. This is required
 * for WordPress < v5.2
 */

if( !function_exists( 'wp_body_open') ):

  function wp_body_open() {
    do_action( 'wp_body_open' );
  }
endif;