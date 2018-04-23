<?php
/**
 * Content wrappers
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/wrapper-end.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$template = wc_get_theme_slug_for_templates();

switch ( $template ) {
	case 'twentyten' :
		echo '</div></div>';
		break;
	case 'twentyeleven' :
		echo '</div>';
		get_sidebar( 'shop' );
		echo '</div>';
		break;
	case 'twentytwelve' :
		echo '</div></div>';
		break;
	case 'twentythirteen' :
		echo '</div></div>';
		break;
	case 'twentyfourteen' :
		echo '</div></div></div>';
		get_sidebar( 'content' );
		break;
	case 'twentyfifteen' :
		echo '</div></div>';
		break;
	case 'twentysixteen' :
		echo '</main></div>';
		break;
	default :
		global $wp_query, $post;
		$current_product_cat = -1;
		if (is_single()) {
			$current_terms = get_the_terms($post->ID, 'product_cat');
			$current_product_cat = $current_terms[0]->term_id;
		} else {
			$current_product_cat = $wp_query->get_queried_object()->term_id;
		}
		$shop_all_label = 'Shop all Prints';
		$terms_list = '<ul class="terms-list"><a href="' . get_site_url() . '/shop" class="gallery-all">' . $shop_all_label . '</a>';

		$terms = get_terms(
			array(
				'taxonomy' 		=> 'product_cat',
				'hide_empty' 	=> false
			)
		);
		foreach ($terms as $key => $term):
			$active_class = ($current_product_cat == $term->term_id) ? 'term-active' : '';
			$terms_list .= '<li class="term-item ' . $active_class . '"><a href="' . get_term_link($term) . '">' . $term->name . '</a></li>';
		endforeach;
		$terms_list .= '</ul>';
		$terms_list .= '<select class="terms-select" onchange="location = this.value"><option value="/shop" selected>' . $shop_all_label . '</option>';
		foreach ($terms as $key => $term):
			$selected = ($current_product_cat == $term->term_id) ? 'selected' : '';
			$terms_list .= '<option value="' . get_term_link($term) . '" ' . $selected . '>' . $term->name . '</option>';
		endforeach;
		$terms_list .= '</select>';
		echo '</div><div class="page-sidebar page-sidebar__blue">' . $terms_list . '</div></main></div>';
		break;
}
