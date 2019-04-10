<?php

function sector_taxonomy() {

    $labels = array(
        'name'                       => _x( 'Sectors', 'Taxonomy General Name', 'faac' ),
        'singular_name'              => _x( 'Sector', 'Taxonomy Singular Name', 'faac' ),
        'menu_name'                  => __( 'Sector', 'faac' ),
        'all_items'                  => __( 'All Sectors', 'faac' ),
        'parent_item'                => __( 'Parent Sector', 'faac' ),
        'parent_item_colon'          => __( 'Parent Sector:', 'faac' ),
        'new_item_name'              => __( 'New Sector Name', 'faac' ),
        'add_new_item'               => __( 'Add New Sector', 'faac' ),
        'edit_item'                  => __( 'Edit Sector', 'faac' ),
        'update_item'                => __( 'Update Sector', 'faac' ),
        'view_item'                  => __( 'View Sector', 'faac' ),
        'separate_items_with_commas' => __( 'Separate sectors with commas', 'faac' ),
        'add_or_remove_items'        => __( 'Add or remove sectors', 'faac' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'faac' ),
        'popular_items'              => __( 'Popular Sectors', 'faac' ),
        'search_items'               => __( 'Search Sectors', 'faac' ),
        'not_found'                  => __( 'Not Found', 'faac' ),
        'no_terms'                   => __( 'No sectors', 'faac' ),
        'items_list'                 => __( 'Sectors list', 'faac' ),
        'items_list_navigation'      => __( 'Sectors list navigation', 'faac' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'sector', array( 'page', 'testimonial', 'attachment' ), $args );

}
add_action( 'init', 'sector_taxonomy', 0 );

?>