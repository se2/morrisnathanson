<?php
/**
 * For more info: https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */

// Theme support options
require_once(get_template_directory().'/functions/theme-support.php');

// WP Head and other cleanup functions
require_once(get_template_directory().'/functions/cleanup.php');

// Register scripts and stylesheets
require_once(get_template_directory().'/functions/enqueue-scripts.php');

// Register custom menus and menu walkers
require_once(get_template_directory().'/functions/menu.php');

// Register sidebars/widget areas
require_once(get_template_directory().'/functions/sidebar.php');

// Makes WordPress comments suck less
require_once(get_template_directory().'/functions/comments.php');

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/functions/page-navi.php');

// Adds support for multiple languages
require_once(get_template_directory().'/functions/translation/translation.php');

// Adds site styles to the WordPress editor
// require_once(get_template_directory().'/functions/editor-styles.php');

// Remove Emoji Support
// require_once(get_template_directory().'/functions/disable-emoji.php');

// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/functions/related-posts.php');

// Use this as a template for custom post types
// require_once(get_template_directory().'/functions/custom-post-type.php');

// Customize the WordPress login menu
// require_once(get_template_directory().'/functions/login.php');

// Customize the WordPress admin
// require_once(get_template_directory().'/functions/admin.php');

// Add Lato from Google Fonts
function wpb_add_google_fonts() {

wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Lato:300,400,400i,700', false );
}

add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );

// Add support for WooCommerce
function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 150,
		'single_image_width'    => 300,
        'product_grid'          => array(
            'default_rows'    => 4,
            'min_rows'        => 2,
            'max_rows'        => 4,
            'default_columns' => 3,
            'min_columns'     => 1,
            'max_columns'     => 3,
        ),
	) );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

// Remove all WooCommerce styling
add_filter( 'woocommerce_enqueue_styles', '__return_false' );


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
function custom_post_type_stories() {

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
		'taxonomies'            => array( 'category', 'post_tag' ),
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
	register_post_type( 'stories', $args );

}
add_action( 'init', 'custom_post_type_stories', 0 );


// Custom Color Palette
function my_mce4_options($init) {

    $custom_colours = '
        "e63c2f", "MN Red",
        "0076a9", "MN Blue",
        "ffa400", "MN Saturated Yellow",
        "f9e0a4", "MN Pale Yellow",
				"231f20", "MN Dark Gray",
				"ffffff", "White",
				"000000", "Black"
    ';

    // build colour grid default+custom colors
    $init['textcolor_map'] = '['.$custom_colours.']';

    // change the number of rows in the grid if the number of colors changes
    // 8 swatches per row
    $init['textcolor_rows'] = 1;

    return $init;
}

if ( function_exists('register_sidebar') ) {
	for ($i = 1; $i <=6 ; $i++) {
		register_sidebar(
			array(
				'name' 					=> 'Footer Sidebar ' . $i,
				'id' 						=> 'footer-sidebar-' . $i,
				'description' 	=> 'Appears in the footer area',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget' 	=> '</aside>',
				'before_title' 	=> '<h3 class="footer-title">',
				'after_title' 	=> '</h3>',
			)
		);
	}
}

