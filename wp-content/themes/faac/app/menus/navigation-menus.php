<?php
// Sets menu locations
function fwd_menus() {
  register_nav_menus(
    [
      'primary_nav' => __('Primary Navigation', 'fwd'),
    ]
  );
}
add_action( 'after_setup_theme', 'fwd_menus');