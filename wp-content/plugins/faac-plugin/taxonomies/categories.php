<?php

function page_category() {

    $labels = array(
        'name'                       => _x( 'Categories', 'Taxonomy General Name', 'faac' ),
        'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'faac' ),
        'menu_name'                  => __( 'Category', 'faac' ),
        'all_items'                  => __( 'All Categories', 'faac' ),
        'parent_item'                => __( 'Parent Categories', 'faac' ),
        'parent_item_colon'          => __( 'Parent Category:', 'faac' ),
        'new_item_name'              => __( 'New Category', 'faac' ),
        'add_new_item'               => __( 'Add New Category', 'faac' ),
        'edit_item'                  => __( 'Edit Category', 'faac' ),
        'update_item'                => __( 'Update Category', 'faac' ),
        'view_item'                  => __( 'View Category', 'faac' ),
        'separate_items_with_commas' => __( 'Separate categories with commas', 'faac' ),
        'add_or_remove_items'        => __( 'Add or remove categories', 'faac' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'faac' ),
        'popular_items'              => __( 'Popular Categories', 'faac' ),
        'search_items'               => __( 'Search Categories', 'faac' ),
        'not_found'                  => __( 'Not Found', 'faac' ),
        'no_terms'                   => __( 'No categories', 'faac' ),
        'items_list'                 => __( 'Categories list', 'faac' ),
        'items_list_navigation'      => __( 'Categories list navigation', 'faac' ),
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
    register_taxonomy( 'category', array( 'post', 'page', 'attachment' ), $args );

}
add_action( 'init', 'page_category', 0 );

?>