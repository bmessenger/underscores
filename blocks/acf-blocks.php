<?php
/**
 * File containing all of the hooks for our custom ACF blocks (for Gutenburg)
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package noted
 */


/* Cache ACF Fields - https://www.advancedcustomfields.com/resources/local-json/ */
add_filter('acf/settings/save_json', 'acf_json_save_point');
function acf_json_save_point( $path ) {
	// update path
	$path = get_stylesheet_directory() . '/js/acf-json';
	return $path;
}

/* Custom Block Category for ACF Blocks */
add_filter( 'block_categories_all' , function( $categories ) {

	// Adding a new category.
	$categories[] = array(
		'slug'  => 'acf-blocks',
		'title' => 'ACF Blocks'
	);

	return $categories;
} );

/* Register Blocks - https://www.advancedcustomfields.com/resources/blocks/ */
add_action( 'init', 'register_acf_blocks' );
function register_acf_blocks() {
	register_block_type(__DIR__ . '/sample-block' );
	//register_block_type(__DIR__ . '/../blocks/sample_block_2' );
	//register_block_type(__DIR__ . '/../blocks/sample_block_3' );
}