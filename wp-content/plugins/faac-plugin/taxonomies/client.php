<?php

function client_taxonomy() {

  $labels = array(
    'name'                       => _x( 'Clients', 'Taxonomy General Name', 'faac_extended' ),
    'singular_name'              => _x( 'Client', 'Taxonomy Singular Name', 'faac_extended' ),
    'menu_name'                  => __( 'Client', 'faac_extended' ),
    'all_items'                  => __( 'All Clients', 'faac_extended' ),
    'parent_item'                => __( 'Parent Client', 'faac_extended' ),
    'parent_item_colon'          => __( 'Parent Client:', 'faac_extended' ),
    'new_item_name'              => __( 'New Client', 'faac_extended' ),
    'add_new_item'               => __( 'Add New Client', 'faac_extended' ),
    'edit_item'                  => __( 'Edit Client', 'faac_extended' ),
    'update_item'                => __( 'Update Client', 'faac_extended' ),
    'view_item'                  => __( 'View Client', 'faac_extended' ),
    'separate_items_with_commas' => __( 'Separate clients with commas', 'faac_extended' ),
    'add_or_remove_items'        => __( 'Add or remove clients', 'faac_extended' ),
    'choose_from_most_used'      => __( 'Choose from the most used', 'faac_extended' ),
    'popular_items'              => __( 'Popular Clients', 'faac_extended' ),
    'search_items'               => __( 'Search Clients', 'faac_extended' ),
    'not_found'                  => __( 'Not Found', 'faac_extended' ),
    'no_terms'                   => __( 'No clients', 'faac_extended' ),
    'items_list'                 => __( 'Clients list', 'faac_extended' ),
    'items_list_navigation'      => __( 'Clients list navigation', 'faac_extended' ),
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => false,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
    'show_in_rest'               => true,
  );
  register_taxonomy( 'client', array( 'testimonial' ), $args );

}
add_action( 'init', 'client_taxonomy', 0 );

?>