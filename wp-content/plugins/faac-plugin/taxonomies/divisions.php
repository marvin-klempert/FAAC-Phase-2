<?php

function division_taxonomy() {

    $labels = array(
        'name'                       => _x( 'Divisions', 'Taxonomy General Name', 'faac' ),
        'singular_name'              => _x( 'Division', 'Taxonomy Singular Name', 'faac' ),
        'menu_name'                  => __( 'Division', 'faac' ),
        'all_items'                  => __( 'All Divisions', 'faac' ),
        'parent_item'                => __( 'Parent Division', 'faac' ),
        'parent_item_colon'          => __( 'Parent Division:', 'faac' ),
        'new_item_name'              => __( 'New Division Name', 'faac' ),
        'add_new_item'               => __( 'Add New Division', 'faac' ),
        'edit_item'                  => __( 'Edit Division', 'faac' ),
        'update_item'                => __( 'Update Division', 'faac' ),
        'view_item'                  => __( 'View Division', 'faac' ),
        'separate_items_with_commas' => __( 'Separate divisions with commas', 'faac' ),
        'add_or_remove_items'        => __( 'Add or remove divisions', 'faac' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'faac' ),
        'popular_items'              => __( 'Popular Divisions', 'faac' ),
        'search_items'               => __( 'Search Divisions', 'faac' ),
        'not_found'                  => __( 'Not Found', 'faac' ),
        'no_terms'                   => __( 'No divisions', 'faac' ),
        'items_list'                 => __( 'Divisions list', 'faac' ),
        'items_list_navigation'      => __( 'Divisions list navigation', 'faac' ),
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
    register_taxonomy( 'division', array( 'page', 'testimonial', 'attachment' ), $args );

}
add_action( 'init', 'division_taxonomy', 0 );


?>