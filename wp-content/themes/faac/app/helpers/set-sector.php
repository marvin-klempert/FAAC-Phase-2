<?php
/**
 * Sets the sector prefix for the current page, for ACF purposes
 */
function set_sector( $value = '' ) {

  $sector = get_the_terms( get_the_ID(), 'sector' )[0]->slug;
  set_query_var( 'sector', $value );
}