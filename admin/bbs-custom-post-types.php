<?php
/*
Barrs Barking Salon Custom Post Types and Fields
Version: 1.0
Author: Jefferson Real
Author URI: https://jeffersonreal.uk
License: GPLv2
*/


// Add custom post type - Service
function bbs_register_post_type_service() {
   register_post_type( 'service',
       array(
           // Define semantic menu labels for the new post type
           'labels' => array(
               'name' => 'Salon Services',
               'singular_name' => 'Service',
               'add_new' => 'New Service',
               'add_new_item' => 'Add New Service',
               'edit_item' => 'Edit Service',
               'new_item' => 'New Service',
               'view_item' => 'View Services',
               'search_items' => 'Search Services',
               'not_found' => 'No Services Found',
               'not_found_in_trash' => 'No Services found in Trash',
           ),
           // WP features the post type supports
           'supports' => array(
               'title',
               'editor',
           ),
           'rewrite' => array(
               'slug' => 'services', // URI to rewrite from the 'ugly' post type
               'with_front' => 'false' // Don't prepend URI with default 'posts'
           ),
           'description' => 'Here are our current services and prices.',
           'has_archive' => true,
           'public' => true,
           'show_in_menu' => true,
           'menu_position' => 6,
           'menu_icon' => 'dashicons-screenoptions',
           'hierarchical' => false,
           'taxonomies' => ['category'],
           'show_in_rest' => false,
           'delete_with_user' => false
       )
   );
   register_taxonomy_for_object_type( 'category', 'service' );
}
add_action( 'init', 'bbs_register_post_type_service' );


// Add custom post type - Review
function bbs_register_post_type_review() {
   register_post_type( 'review',
       array(
           // Define semantic menu labels for the new post type
           'labels' => array(
               'name' => 'Salon Reviews',
               'singular_name' => 'Review',
               'add_new' => 'New Review',
               'add_new_item' => 'Add New Review',
               'edit_item' => 'Edit Review',
               'new_item' => 'New Review',
               'view_item' => 'View Reviews',
               'search_items' => 'Search Reviews',
               'not_found' => 'No Reviews Found',
               'not_found_in_trash' => 'No Reviews found in Trash',
           ),
           // WP features the post type supports
           'supports' => array(
               'title',
               'editor',
           ),
           'rewrite' => array(
               'slug' => 'reviews', // URI to rewrite from the 'ugly' post type
               'with_front' => 'false' // Don't prepend URI with default 'posts'
           ),
           'description' => 'This is a custom post type for storing customer reviews.',
           'has_archive' => false,
           'public' => true,
           'publicly_queryable'  => false,
           'show_in_menu' => true,
           'menu_position' => 7,
           'menu_icon' => 'dashicons-thumbs-up',
           'hierarchical' => false,
		   'taxonomies' => [''], // Had PHP error without this (Invalid argument supplied for foreach()).
           'show_in_rest' => false,
           'delete_with_user' => false
       )
   );
}
add_action( 'init', 'bbs_register_post_type_review' );


// Add Advanced Custom Fields (ACF) to custom post types
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_60a3a82607c77',
	'title' => 'Review Options',
	'fields' => array(
		array(
			'key' => 'field_60a3a8260d65b',
			'label' => 'Social Icon',
			'name' => 'bbs_review_icon',
			'type' => 'image',
			'instructions' => 'Select a social icon to be displayed with the review to represent the review source (optional).',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => 'bbs_review_icon',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => 10,
			'min_height' => 10,
			'min_size' => '0.0001',
			'max_width' => 5000,
			'max_height' => 5000,
			'max_size' => '0.5',
			'mime_types' => 'svg',
		),
		array(
			'key' => 'field_60a3a8260d70d',
			'label' => 'Avatar',
			'name' => 'bbs_review_avatar',
			'type' => 'image',
			'instructions' => 'Select the image that will be displayed with the review (normally a picture or avatar representing the reviewer - e.g their profile pic).',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => 'bbs_review_avatar',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => 50,
			'min_height' => 50,
			'min_size' => '0.01',
			'max_width' => 500,
			'max_height' => 500,
			'max_size' => '0.5',
			'mime_types' => 'jpg',
		),
		array(
			'key' => 'field_60a3a970ccdea',
			'label' => 'Name',
			'name' => 'bbs_review_name',
			'type' => 'text',
			'instructions' => 'This should be the name or username of the person who left the review.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'review',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_609e7a975a390',
	'title' => 'Service Options',
	'fields' => array(
		array(
			'key' => 'field_609e86fcb5781',
			'label' => 'Position',
			'name' => 'bbs_position',
			'type' => 'number',
			'instructions' => 'Enter a position for the service to be displayed in its respective area. For the top services, position 1 is in the middle, then 2 and 3 are left and right respectively - like a podium.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => 'bbs_position',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => 1,
		),
		array(
			'key' => 'field_609e7cfd5a2f1',
			'label' => 'Price',
			'name' => 'bbs_price',
			'type' => 'number',
			'instructions' => 'Enter the price you will charge for this service.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => 'bbs_price',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => 0,
			'max' => 999,
			'step' => '0.01',
		),
		array(
			'key' => 'field_60b10c812aea7',
			'label' => 'Show Price on Homepage?',
			'name' => 'show_homepage_price',
			'type' => 'true_false',
			'instructions' => 'If this is turned on, the service tile on the homepage will display the price set. If no price is set, and/or this option is disabled, a \'see pricelist\' link will be shown instead.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_60b10f2d2aea8',
			'label' => 'Show Price on Price List Table?',
			'name' => 'show_pricelist_price',
			'type' => 'true_false',
			'instructions' => 'If this is turned on, the table on the pricelist page will display the price set. If no price is set, and/or this option is disabled, a \'see pricelist\' link will be shown instead.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_609e7abc5a2f0',
			'label' => 'Icon',
			'name' => 'bbs_icon',
			'type' => 'image',
			'instructions' => 'Select an icon to be displayed with the service.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => 'bbs_icon',
				'id' => '',
			),
			'return_format' => 'id',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => 10,
			'min_height' => 10,
			'min_size' => '0.0001',
			'max_width' => 5000,
			'max_height' => 5000,
			'max_size' => '0.5',
			'mime_types' => 'svg',
		),
		array(
			'key' => 'field_609e7ea21b97b',
			'label' => 'Large Tile Image',
			'name' => 'bbs_tile_image',
			'type' => 'image',
			'instructions' => 'Select the image that will be displayed next to this service when displayed in the \'Other Services\' grid on the homepage.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => 'bbs_tile_image',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'large',
			'library' => 'all',
			'min_width' => 300,
			'min_height' => 300,
			'min_size' => '0.01',
			'max_width' => 3000,
			'max_height' => 3000,
			'max_size' => 2,
			'mime_types' => 'jpg',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'service',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;


// Add ACF meta field columns to service post list in admin area
 function add_acf_columns ( $columns ) {
   return array_merge ( $columns, array (
     'bbs_position' => __ ( 'Position' )
   ) );
 }
 add_filter ( 'manage_service_posts_columns', 'add_acf_columns' );

// Populate ACF meta field columns with meta data
function service_custom_column ( $column, $post_id ) {
  switch ( $column ) {
    case 'bbs_position':
      echo get_post_meta ( $post_id, 'bbs_position', true );
      break;
  }
}
add_action ( 'manage_service_posts_custom_column', 'service_custom_column', 10, 2 );
