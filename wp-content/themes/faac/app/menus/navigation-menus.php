<?php
// Sets menu locations
function fwd_menus() {
  register_nav_menus(
    [
      'primary_nav' => __('Primary Navigation', 'fwd'),
      'faacCommercial_navigation' => __('FAAC Commercial Navigation', 'fwd'),
      'faacMilitary_navigation' => __('FAAC Military Navigation', 'fwd'),
      'miloRange_navigation' => __('MILO Range Navigation', 'fwd'),
      'rti_navigation' => __('Realtime Technologies Navigation', 'fwd')
    ]
  );
}
add_action( 'after_setup_theme', 'fwd_menus');