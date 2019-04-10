<?php
/**
 * Fetches the URL of a placeholder.com image
 *
 * Utilizes the Placeholder.com web API to create a URL for image tags and
 * other elements that displays a sized placeholder image with the option for
 * custom placeholder text.
 *
 * @link https://placeholder.com/
 *
 * @var string $width             The width, in pixels, of the image to be
 *                                displayed
 * @var string $height            The height, in pixels, of the image to be
 *                                displayed (optional)
 * @var string $text_to_display   The text to display within the image bounds
 *                                (optional)
 *
 * @return string                 The URL of a placeholder image
 */
function get_placeholder_url( $width, $height='', $text_to_display='' ) {
  // If no height is defined, set it equal to the width
  if( $height == '' ):
    $height = $width;
  endif;

  if( $text_to_display != ''):
    $text_to_display = str_replace( ' ', '+', $text_to_display);
    return ( '//via.placeholder.com/' . $width . 'x' . $height . '?' . $text_to_display );
  else:
    return ( '//via.placeholder.com/' . $width . 'x' . $height );
  endif;
}