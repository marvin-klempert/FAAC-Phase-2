<?php
function fwd_supports() {
  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Enable HTML5 markup support
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5');

  // Add support for 5.0+ editor styles
  add_theme_support('align-wide');
  add_theme_support('wp-block-styles');
}
add_action( 'after_setup_theme', 'fwd_supports' );
