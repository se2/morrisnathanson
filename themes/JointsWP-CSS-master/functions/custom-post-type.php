<?php
/* joints Custom Post Type Example
This page walks you through creating
a custom post type and taxonomies. You
can edit this one or copy the following code
to create another one.

I put this in a separate file so as to
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

*/


// Register News Article Post Type
function custom_post_type_news_article() {

	$labels = array(
		'name'                  => _x( 'News Articles', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'News Article', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'News Articles', 'text_domain' ),
		'name_admin_bar'        => __( 'Post Type', 'text_domain' ),
		'archives'              => __( 'News Archives', 'text_domain' ),
		'attributes'            => __( 'Article Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Article:', 'text_domain' ),
		'all_items'             => __( 'All News Articles', 'text_domain' ),
		'add_new_item'          => __( 'Add New Article', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Article', 'text_domain' ),
		'edit_item'             => __( 'Edit Article', 'text_domain' ),
		'update_item'           => __( 'Update Article', 'text_domain' ),
		'view_item'             => __( 'View Article', 'text_domain' ),
		'view_items'            => __( 'View Articles', 'text_domain' ),
		'search_items'          => __( 'Search Article', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'News Articles list', 'text_domain' ),
		'items_list_navigation' => __( 'News Articles list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Articles list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'News Article', 'text_domain' ),
		'description'           => __( 'News Article Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'custom-fields', 'excerpt' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-media-document',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'news-article', $args );
}
add_action( 'init', 'custom_post_type_news_article', 0 );

// Register Stories Post Type
function custom_post_type_story() {

	$labels = array(
		'name'                  => _x( 'Stories', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Story', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Stories', 'text_domain' ),
		'name_admin_bar'        => __( 'Stories', 'text_domain' ),
		'archives'              => __( 'Story Archives', 'text_domain' ),
		'attributes'            => __( 'Story Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Story:', 'text_domain' ),
		'all_items'             => __( 'All Stories', 'text_domain' ),
		'add_new_item'          => __( 'Add New Story', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Story', 'text_domain' ),
		'edit_item'             => __( 'Edit Story', 'text_domain' ),
		'update_item'           => __( 'Update Story', 'text_domain' ),
		'view_item'             => __( 'View Story', 'text_domain' ),
		'view_items'            => __( 'View Stories', 'text_domain' ),
		'search_items'          => __( 'Search Story', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into story', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this story', 'text_domain' ),
		'items_list'            => __( 'Stories list', 'text_domain' ),
		'items_list_navigation' => __( 'Stories list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Story', 'text_domain' ),
		'description'           => __( 'Story Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'custom-fields' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-book-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'story', $args );
}
add_action( 'init', 'custom_post_type_story', 0 );

function story_taxonomy() {

	register_taxonomy(
			'story-category',
			'story',
			array(
					'label' => __( 'Story Category' ),
					'rewrite' => array( 'slug' => 'story-category' ),
					'hierarchical' => true,
			)
	);
}
add_action( 'init', 'story_taxonomy' );

// Register Galleries Post Type
function custom_post_type_gallery() {

	$labels = array(
		'name'                  => _x( 'Galleries', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Gallery', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Galleries', 'text_domain' ),
		'name_admin_bar'        => __( 'Galleries', 'text_domain' ),
		'archives'              => __( 'Gallery Archives', 'text_domain' ),
		'attributes'            => __( 'Gallery Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Gallery:', 'text_domain' ),
		'all_items'             => __( 'All Galleries', 'text_domain' ),
		'add_new_item'          => __( 'Add New Gallery', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Gallery', 'text_domain' ),
		'edit_item'             => __( 'Edit Gallery', 'text_domain' ),
		'update_item'           => __( 'Update Gallery', 'text_domain' ),
		'view_item'             => __( 'View Gallery', 'text_domain' ),
		'view_items'            => __( 'View Galleries', 'text_domain' ),
		'search_items'          => __( 'Search Gallery', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into gallery', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this gallery', 'text_domain' ),
		'items_list'            => __( 'Galleries list', 'text_domain' ),
		'items_list_navigation' => __( 'Galleries list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Gallery', 'text_domain' ),
		'description'           => __( 'Gallery Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'custom-fields', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-book-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'gallery', $args );
}

add_action( 'init', 'custom_post_type_gallery', 0 );

function gallery_taxonomy() {

	register_taxonomy(
			'gallery-category',
			'gallery',
			array(
					'label' => __( 'Art Work Category' ),
					'rewrite' => array( 'slug' => 'gallery-category' ),
					'hierarchical' => true,
			)
	);
}
add_action( 'init', 'gallery_taxonomy' );