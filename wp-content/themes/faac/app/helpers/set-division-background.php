<?php
/**
 * Sets the division background image array
 *
 * @var string $prefix      (optional) The division prefix to use as a reference
 *
 * @return array $result
 */

function set_division_background( $prefix = '' ) {

  // If no prefix is passed, set it
  if( !isset($prefix) ):
    $prefix = get_query_var( 'division-prefix' );
  endif;

  // Set the division background URL and ID
  $url = get_field( $prefix . '_background', 'option' );
  $id = attachment_url_to_postid( $url );

  // Set values and pass them to the $result array
  $alt = get_field( $prefix . '_name', 'option' );
  $sizes = array(
    'preload' => wp_get_attachment_image_url( $id, 'preload' ),
    '128w' => wp_get_attachment_image_url( $id, '128w' ),
    '240w' => wp_get_attachment_image_url( $id, '240w' ),
    '320w' => wp_get_attachment_image_url( $id, '320w' ),
    '375w' => wp_get_attachment_image_url( $id, '375w' ),
    '480w' => wp_get_attachment_image_url( $id, '480w' ),
    '540w' => wp_get_attachment_image_url( $id, '540w' ),
    '640w' => wp_get_attachment_image_url( $id, '640w' ),
    '720w' => wp_get_attachment_image_url( $id, '720w' ),
    '768w' => wp_get_attachment_image_url( $id, '768w' ),
    '800w' => wp_get_attachment_image_url( $id, '800w' ),
    '960w' => wp_get_attachment_image_url( $id, '960w' ),
    '1024w' => wp_get_attachment_image_url( $id, '1024w' ),
    '1280w' => wp_get_attachment_image_url( $id, '1280w' ),
    '1366w' => wp_get_attachment_image_url( $id, '1366w' ),
    '1440w' => wp_get_attachment_image_url( $id, '1440w' ),
    '1600w' => wp_get_attachment_image_url( $id, '1600w' ),
    '1920w' => wp_get_attachment_image_url( $id, '1920w' ),
    '2560w' => wp_get_attachment_image_url( $id, '2560w' ),
    '3840w' => wp_get_attachment_image_url( $id, '3840w' ),
  );

  $result = array(
    'alt' => $alt,
    'sizes' => $sizes
  );

  return $result;
}