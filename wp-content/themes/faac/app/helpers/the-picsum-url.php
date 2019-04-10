<?php
/**
 * Echoes the URL from get_picsum_img_url()
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
function the_picsum_url( $width, $height='', $modifier='' ) {
  echo get_picsum_url( $width, $height='', $modifier='' );
}