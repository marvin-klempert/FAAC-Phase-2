<?php
// Extends taxonomies to apply to other post types
function faac_taxonomy_extender() {

  register_taxonomy_for_object_type( 'category', 'attachment' );
  register_taxonomy_for_object_type( 'category', 'page' );

}
add_action( 'init', 'faac_taxonomy_extender', 0 );