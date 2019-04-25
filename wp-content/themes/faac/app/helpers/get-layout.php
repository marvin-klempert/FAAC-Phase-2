<?php
/**
 * Includes a layout file into a page
 *
 * Layouts are a combination of components and common code that can be included
 * as one function instead of repeated get_component() calls or repeated code.
 *
 * @var string $slug        The name of the partial file, without file extension
 *
 * @return string           The template filename if one is located
 */
function get_layout( $slug ) {
  return include( locate_template( 'page-templates/layouts/' . $slug . '.php', false, false ) );
}