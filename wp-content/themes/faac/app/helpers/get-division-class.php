<?php
/**
 * Gets the division-related CSS class, if any
 */

function get_division_class() {
  $division = get_the_terms( get_the_ID(), 'division' )[0]->name;

  if( $division == 'FAAC Commercial' ):
    $result = 'faac-commerical';
  elseif( $division == 'FAAC Military' ):
    $result = 'faac-military';
  elseif( $division == 'MILO Range' ):
    $result = 'milo-range';
  elseif( $division == 'Realtime Technologies' ):
    $result = 'rti';
  else:
    $result = '';
  endif;

  return $result;
}
