<?php

function testimonial_post_type() {

  $labels = array(
    'name'                  => _x( 'Testimonials', 'Post Type General Name', 'faac_extended' ),
    'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'faac_extended' ),
    'menu_name'             => __( 'Testimonials', 'faac_extended' ),
    'name_admin_bar'        => __( 'Testimonial', 'faac_extended' ),
    'archives'              => __( 'Testimonial Archives', 'faac_extended' ),
    'attributes'            => __( 'Testimonial Attributes', 'faac_extended' ),
    'parent_item_colon'     => __( 'Parent Testimonial:', 'faac_extended' ),
    'all_items'             => __( 'All Testimonials', 'faac_extended' ),
    'add_new_item'          => __( 'Add New Testimonial', 'faac_extended' ),
    'add_new'               => __( 'Add New', 'faac_extended' ),
    'new_item'              => __( 'New Testimonial', 'faac_extended' ),
    'edit_item'             => __( 'Edit Testimonial', 'faac_extended' ),
    'update_item'           => __( 'Update Testimonial', 'faac_extended' ),
    'view_item'             => __( 'View Testimonial', 'faac_extended' ),
    'view_items'            => __( 'View Testimonials', 'faac_extended' ),
    'search_items'          => __( 'Search Testimonial', 'faac_extended' ),
    'not_found'             => __( 'Not found', 'faac_extended' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'faac_extended' ),
    'featured_image'        => __( 'Client Logo', 'faac_extended' ),
    'set_featured_image'    => __( 'Set Client Logo', 'faac_extended' ),
    'remove_featured_image' => __( 'Remove client logo', 'faac_extended' ),
    'use_featured_image'    => __( 'Use as client logo', 'faac_extended' ),
    'insert_into_item'      => __( 'Insert into testimonial', 'faac_extended' ),
    'uploaded_to_this_item' => __( 'Uploaded to this testimonial', 'faac_extended' ),
    'items_list'            => __( 'Testimonials list', 'faac_extended' ),
    'items_list_navigation' => __( 'Testimonials list navigation', 'faac_extended' ),
    'filter_items_list'     => __( 'Filter testimonials list', 'faac_extended' ),
  );
  $args = array(
    'label'                 => __( 'Testimonial', 'faac_extended' ),
    'description'           => __( 'Testimonial', 'faac_extended' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
    'taxonomies'            => array( 'category', 'post_tag', 'client' ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 25,
    'menu_icon'             => 'dashicons-thumbs-up',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,    
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'post',
    'show_in_rest'          => true,
  );
  register_post_type( 'testimonial', $args );

}
add_action( 'init', 'testimonial_post_type', 0 );

?>