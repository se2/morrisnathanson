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
require_once(get_template_directory().'/functions/custom-post-type.php');

// Customize the WordPress login menu
// require_once(get_template_directory().'/functions/login.php');

// Customize the WordPress admin
// require_once(get_template_directory().'/functions/admin.php');

// Add Lato from Google Fonts
function wpb_add_google_fonts() {

wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Lato:300,400,400i,700', false );
}

add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );

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

// Woocommerce functions

// Remove all WooCommerce styling
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

// Remove breadcrumbs
add_action( 'init', 'woo_remove_wc_breadcrumbs' );

function woo_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

// Remove sidebar
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
