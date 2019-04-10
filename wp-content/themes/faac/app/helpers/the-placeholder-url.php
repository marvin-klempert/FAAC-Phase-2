<?php
/**
 * Echoes the URL from get_placeholder_img_url()
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
function the_placeholder_url( $width, $height='', $text_to_display='' ) {
  echo get_placeholder_url( $width, $height='', $text_to_display='' );
}