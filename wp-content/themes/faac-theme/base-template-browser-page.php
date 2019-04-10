<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

// Defines a division class to add to sections
$division = get_the_terms( get_the_ID(), 'division' );

$divisionName = $division[0]->name;
if( $divisionName == 'FAAC Commercial' ){
  $divisionClass = 'faac-commercial';
  $divisionPrefix = 'faacCommercial';
} elseif( $divisionName == 'FAAC Military' ){
  $divisionClass = 'faac-military';
  $divisionPrefix = 'faacMilitary';
} elseif( $divisionName == 'MILO Range' ){
  $divisionClass = 'milo-range';
  $divisionPrefix = 'miloRange';
} elseif( $divisionName == 'Realtime Technologies' ){
  $divisionClass = 'rti';
  $divisionPrefix = 'rti';
} else {
  $divisionClass = '';
  $divisionPrefix = '';
}

?>

<!doctype html>
<html <?php language_attributes(); ?>>

<?php get_template_part('templates/head'); ?>

<body <?php body_class( array( 'browser-' . $divisionClass, $divisionClass)); ?>>

  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TB9D8MJ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

<div id="page-wrapper">
  <?php
  do_action('get_header');
  if( $divisionClass != '' ):
    get_template_part( 'templates/header', 'division' );
  else:
    get_template_part( 'templates/header' );
  endif;

  include Wrapper\template_path();

  do_action('get_footer');
  if( $divisionClass != '' ):
    get_template_part( 'templates/footer', 'division' );
  else:
    get_template_part('templates/footer');
  endif;
  wp_footer();
  ?>
</div>

<?php // Login modal
include( locate_template( 'templates/70-plugins/705-login-modal.php', false, false ) );
?>

</body>

</html>