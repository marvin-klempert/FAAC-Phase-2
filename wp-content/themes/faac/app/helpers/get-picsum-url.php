<?php
/**
 * Fetches the URL of a picsum placeholder image
 *
 * Utilizes the Picsum API to create a URL for image tags and other elements
 * that displays a randomized placeholder image from the Picsum archive.
 *
 * @link https://picsum.photos/
 *
 * @var string $width       The width, in pixels, of the image to be displayed
 * @var string $height      The height, in pixels, of the image to be displayed
 *                          (optional)
 * @var string $modifier    The modifier, if any, to apply to the Picsum image
 *                          (optional)
 *
 * @return string           The URL of a Picsum image
 */
function get_picsum_url( $width, $height='', $modifier='' ) {
  // If a height is defined, append a '/' to it for the final URL
  if( $height != '' ):
    $height = '/' . $height;
  endif;

  // Modifier can be either "grayscale" or "blur"
  if( $modifier == 'grayscale' ):
    return ( '//picsum.photos/g/' . $width . $height );
  elseif ( $modifier == 'blur' ):
    return ( '//picsum.photos/' . $width . $height . '/?blur' );
  else:
    return ( '//picsum.photos/' . $width . $height );
  endif;
}