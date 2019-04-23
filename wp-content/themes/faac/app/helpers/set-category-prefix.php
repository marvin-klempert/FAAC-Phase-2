<?php
/**
 * Sets the category prefix for the current post, for ACF purposes
 */
function set_category_prefix( $value = '' ) {

  //If no value is passed, fetch the proper one
  if( !$value ):
    $name = get_the_terms( get_the_ID(), 'category' )[0]->name;

    // Set $value based on $name
    if( $name == 'FAAC Commercial' ):
      $value = 'faacCommercial';
    elseif( $name == 'FAAC Military' ):
      $value = 'faacMilitary';
    elseif( $name == 'MILO Range' ):
      $value = 'miloRange';
    elseif( $name == 'Realtime Technologies' ):
      $value = 'rti';
    else:
      $value = '';
    endif;
  endif;

  set_query_var( 'category-prefix', $value );
}