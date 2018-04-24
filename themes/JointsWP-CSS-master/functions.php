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

add_filter( 'nav_menu_link_attributes', 'mn_shop_menu_atts', 10, 3 );

function mn_shop_menu_atts( $atts, $item, $args ) {

	// The ID of the target menu item
  $menu_target = 155;

  // inspect $item
  if ($item->ID == $menu_target) {
    $atts['data-open'] = 'studio-purchase-modal';
  }
  return $atts;
}

############################# function-pagination.php ##########################

/**
* @link: http://callmenick.com/post/custom-wordpress-loop-with-pagination
* Create this as a separate file function-pagination.php
*/

function mn_custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  /**
  * This first part of our function is a fallback
  * for custom pagination inside a regular loop that
  * uses the global $paged and global $wp_query variables.
  *
  * It's good because we can now override default pagination
  * in our theme, and use this function in default quries
  * and custom queries.
  */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
      $numpages = 1;
    }
  }

  /**
  * We construct the pagination arguments to enter into our paginate_links
  * function.
  */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('<span class="icon-pagi-arrow icon-pagi-arrow__reverse"></span>'),
    'next_text'       => __('<span class="icon-pagi-arrow"></span>'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<div class='custom-pagination'>";
    // echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span> ";
    echo $paginate_links;
    echo "</div>";
  }

}

############################# / function-pagination.php ##########################

/**
 * Woo-commerce Custom Functions
 */

// Remove all WooCommerce styling
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

// Remove breadcrumbs
add_action( 'init', 'woo_remove_wc_breadcrumbs' );

function woo_remove_wc_breadcrumbs() {
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

// Remove sidebar
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

//remove display notice - Showing all x results
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

//remove default sorting drop-down from WooCommerce
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

/**
 * @snippet       WooCommerce Hide Prices on the Shop Page
 * @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
 * @sourcecode    https://businessbloomer.com/?p=406
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 2.4.7
 */

// Remove prices
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

// Add product short description to Shop page
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_single_excerpt' );

// Change In Stock / Out of Stock labels
add_filter( 'woocommerce_get_availability', 'mn_custom_get_availability', 1, 2);

function mn_custom_get_availability( $availability, $_product ) {
	// Change In Stock Text
	if ( $_product->is_in_stock() ) {
			$availability['availability'] = __('Available', 'woocommerce');
	}
	// Change Out of Stock Text
	if ( ! $_product->is_in_stock() ) {
			$availability['availability'] = __('Sold', 'woocommerce');
	}
	return $availability;
}

//* Add stock status to archive pages
function mn_stock_catalog() {
	global $product;
	if ( $product->is_in_stock() ) {
		echo '<div class="gallery-info"><p>' . $product->get_stock_quantity() . __( 'Available', 'mn' ) . '</p></div>';
	} else {
		echo '<div class="gallery-info"><p>' . __( 'Sold', 'mn' ) . '</p></div>';
	}
}

add_action( 'woocommerce_after_shop_loop_item_title', 'mn_stock_catalog' );

/* This snippet removes the action that inserts thumbnails to products in teh loop
 * and re-adds the function customized with our wrapper in it.
 * It applies to all archives with products.
 *
 * @original plugin: WooCommerce
 * @author of snippet: Brian Krogsard
 */

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

/**
 * WooCommerce Loop Product Thumbs
 **/
if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {
	function woocommerce_template_loop_product_thumbnail() {
		echo woocommerce_get_product_thumbnail();
	}
}

/**
 * WooCommerce Product Thumbnail
 **/
if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {
	function woocommerce_get_product_thumbnail( $size = 'shop_catalog', $placeholder_width = 0, $placeholder_height = 0  ) {
		global $post, $woocommerce;
		$output = '<div class="gallery-bg">';
		if ( has_post_thumbnail() ) {
			$output .= get_the_post_thumbnail( $post->ID, $size );
		} else {
			$output .= '<img src="'. woocommerce_placeholder_img_src() .'" alt="Placeholder"" />';
		}
		$output .= '</div>';
		return $output;
	}
}

add_filter( 'woocommerce_product_single_add_to_cart_text', 'add_icon_add_cart_button_single' );

function add_icon_add_cart_button_single( $button ) {
	$button_new = $button . " »";
	return $button_new;
}

function remove_loop_button() {
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
}

add_action('init','remove_loop_button');

add_action('woocommerce_after_shop_loop_item','mn_replace_add_to_cart');

function mn_replace_add_to_cart() {
	global $product;
	$product_id = $product->get_id();
	$link = $product->add_to_cart_url();
	echo ( woo_in_cart( $product_id ) ) ? '<a class="add-to-cart__custom" href="' . esc_attr($link) . '" ><span class="icon icon-bag icon__red"></span></a>' : '<a class="add-to-cart__custom" href="' . esc_attr($link) . '" ><span class="icon icon-bag-outline"><span class="icon path1"></span><span class="icon path2"></span></span></a>';
}

// Ensure cart contents update when products are added to the cart via AJAX
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	ob_start();
	?>
	<a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
		<span class="shopping-label">Shopping Cart</span><span class="icon-bag"></span>
		<?php echo ( WC()->cart->get_cart_contents_count() > 0 ) ? '<span class="cart-total">' . WC()->cart->get_cart_contents_count() . '</span>' : ''; ?>
	</a>
	<?php
	$fragments['a.cart-contents'] = ob_get_clean();
	return $fragments;
}

/**
 *
 * Change number of related products on product page
 * Set your own value for 'posts_per_page'
 *
 */
function woo_related_products_limit() {
  global $product;
	$args['posts_per_page'] = 6;
	return $args;
}

add_filter( 'woocommerce_output_related_products_args', 'mn_related_products_args' );

function mn_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 3 related products
	$args['columns'] = 3; 			// arranged in 3 columns
	return $args;
}

// Remove product meta data from product single page
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

// Remove woocommerce tabs
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );

// Add full description to below price
function woocommerce_template_product_description() {
  woocommerce_get_template( 'single-product/tabs/description.php' );
}

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_product_description', 20 );

// Change the Product Description Title
add_filter('woocommerce_product_description_heading', 'mn_product_description_heading');

function mn_product_description_heading() {
	return __('Details', 'woocommerce');
}

add_filter( 'woocommerce_order_button_text', 'mn_woo_custom_order_button_text' );

function mn_woo_custom_order_button_text() {
    return __( 'Place order »', 'woocommerce' );
}

function woo_in_cart($product_id) {
	global $woocommerce;
	foreach($woocommerce->cart->get_cart() as $key => $val ) {
			$_product = $val['data'];
			if($product_id == $_product->id ) {
					return true;
			}
	}
	return false;
}

/**
 * @snippet       Display Advanced Custom Fields @ Single Product - WooCommerce
 * @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
 * @sourcecode    https://businessbloomer.com/?p=22015
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 2.5.2
 */

// add_action( 'woocommerce_single_product_summary', 'mn_display_acf_field_summary', 30 );

// function mn_display_acf_field_summary() {
//   echo '<h5 class="gallery-single-field-title">Size:</h5><p>' . get_field('product_size') . '</p>';
// }