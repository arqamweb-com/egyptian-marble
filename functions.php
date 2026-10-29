<?php

/**
 * ArqamWeb Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ArqamWeb
 * @since 1.0.1
 */

/**
 * Define Constants
 */
define('CHILD_THEME_ARQAMWEB_VERSION', '1.1.4');

/**
 * Enqueue styles
 */
function child_enqueue_styles()
{
    wp_enqueue_style(
        'arqamweb-theme-css',
        get_stylesheet_directory_uri() . '/style.css',
        ['astra-theme-css'],
        CHILD_THEME_ARQAMWEB_VERSION,
        'all'
    );

    wp_enqueue_style(
        'blaze-slider-css',
        get_stylesheet_directory_uri() . '/frontend/public/css/blaze.css',
        ['astra-theme-css'],
        CHILD_THEME_ARQAMWEB_VERSION,
        'all'
    );

    wp_enqueue_style(
        'style-css',
        get_stylesheet_directory_uri() . '/frontend/public/style.min.css',
        array('arqamweb-theme-css'),
        CHILD_THEME_ARQAMWEB_VERSION,
        'all'
    );
}

add_action('wp_enqueue_scripts', 'child_enqueue_styles', 15);



/**

 * Enqueue script

 */

function my_custom_scripts()
{

    wp_enqueue_script(

        'blaze-slider-js',

        get_stylesheet_directory_uri() . '/frontend/public/js/blaze-slider.min.js',

        array(),

        CHILD_THEME_ARQAMWEB_VERSION,

        array(
            'strategy' => 'defer',
            'in_footer' => 'false',
        )
    );


    wp_enqueue_script(

        'flowbite-js',

        get_stylesheet_directory_uri() . '/frontend/public/js/flowbite.min.js',

        array(),

        CHILD_THEME_ARQAMWEB_VERSION,

        array(
            'strategy' => 'defer',
            'in_footer' => 'false',
        )
    );

    wp_enqueue_script(

        'main-js',

        get_stylesheet_directory_uri() . '/frontend/public/js/main.js',

        array(),

        CHILD_THEME_ARQAMWEB_VERSION,

        array(
            'strategy' => 'defer',
            'in_footer' => 'true',
        )
    );
}

add_action('wp_enqueue_scripts', 'my_custom_scripts');


require_once(get_stylesheet_directory() . '/inc/helpers.php');
require_once(get_stylesheet_directory() . '/inc/features.php');
require_once(get_stylesheet_directory() . '/inc/product-fields.php');


// AWB: hide the users list from the REST API for visitors who are not logged in
add_filter( 'rest_endpoints', function ( $endpoints ) {
	if ( is_user_logged_in() ) {
		return $endpoints;
	}
	foreach ( array_keys( $endpoints ) as $route ) {
		if ( 0 === strpos( $route, '/wp/v2/users' ) ) {
			unset( $endpoints[ $route ] );
		}
	}
	return $endpoints;
} );


// AWB: single H1 on the blog index (/blogs/)
add_action( 'astra_primary_content_top', function () {
	if ( is_home() && ! is_front_page() ) {
		echo '<header class="ast-archive-description"><h1 class="page-title ast-archive-title">EML Blog</h1></header>';
	}
} );


// AWB: Organization details (parent CID Group) and Product schema for EML products, no price
add_filter( 'rank_math/json_ld', function ( $data ) {
	foreach ( $data as $key => $entity ) {
		if ( is_array( $entity ) && isset( $entity['@type'] ) && in_array( 'Organization', (array) $entity['@type'], true ) ) {
			$data[ $key ]['parentOrganization'] = array(
				'@type' => 'Organization',
				'name'  => 'CID Group',
				'url'   => 'https://cidegypt.com/',
			);
			$data[ $key ]['address'] = array(
				'@type'           => 'PostalAddress',
				'streetAddress'   => '9 Omar Ibn ElKhattab St., branched from El Nasr Road, Ramo Buildings, 9th floor, Office #904',
				'addressLocality' => 'Nasr City, Cairo',
				'addressCountry'  => 'EG',
			);
			$data[ $key ]['telephone'] = '+20 100 164 9770';
			$data[ $key ]['email']     = 'info@egyptian-marble.com';
		}
	}

	if ( is_singular( 'eml-product' ) ) {
		$post_id = get_queried_object_id();
		$product = array(
			'@type'        => 'Product',
			'@id'          => get_permalink( $post_id ) . '#product',
			'name'         => wp_strip_all_tags( get_the_title( $post_id ) ),
			'url'          => get_permalink( $post_id ),
			'brand'        => array( '@type' => 'Brand', 'name' => 'EML' ),
			'manufacturer' => array( '@id' => home_url( '/#organization' ) ),
		);
		$desc = wp_strip_all_tags( get_the_excerpt( $post_id ) );
		if ( $desc ) {
			$product['description'] = $desc;
		}
		$img = get_the_post_thumbnail_url( $post_id, 'full' );
		if ( $img ) {
			$product['image'] = $img;
		}
		$terms = get_the_terms( $post_id, 'product_category' );
		if ( $terms && ! is_wp_error( $terms ) ) {
			$product['category'] = implode( ', ', wp_list_pluck( $terms, 'name' ) );
		}
		$data['emlProduct'] = $product;
	}

	return $data;
}, 99 );
