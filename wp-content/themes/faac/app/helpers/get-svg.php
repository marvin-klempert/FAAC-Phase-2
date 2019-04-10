<?php
/**
 * Gets SVG file contents
 *
 * Inlining SVG elements isn't fun, so this does it for you. It brings in the
 * entirety of the SVG file and should be placed between svg tags for more full
 * control.
 *
 * @var string $file      The SVG filename to pull in, relative to the parent
 *                        SVG dist folder
 *
 * @return string         The SVG file contents
 */
function get_svg( $file ) {
  return file_get_contents( get_stylesheet_directory_uri() . '/resources/images/dist/svg/' . $file . '.svg');
}
