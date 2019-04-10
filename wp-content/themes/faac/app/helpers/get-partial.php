<?php
/**
 * Includes a partial layout into a page
 *
 * Because get_template_part() does not bring all variables with it, it's not
 * very useful for ACF integration. As such, the include( locate_template() );
 * hack is necessary. To cut down on typing and improve readibility, this
 * function imports a layout partial and keeps variables accessible.
 *
 * @var string $folder      The folder(s) the layout partial resides in
 * @var string $slug        The name of the partial file, without file extension
 *
 * @return string           The template filename if one is located
 */
function get_partial( $folder, $slug ) {
  return include( locate_template( 'page-templates/layouts/' . $folder . '/' . $slug . '.php', false, false ) );
}