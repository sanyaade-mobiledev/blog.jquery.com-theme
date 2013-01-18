<?php

// Add body classes found in postmeta.
add_filter( 'body_class', function( $classes ) {
	$classes = array( 'jquery' );

	if ( is_page() )
		$classes[] = 'page-slug-' . sanitize_html_class( strtolower( get_queried_object()->post_name ) );
	if ( is_singular() && $post_classes = get_post_meta( get_queried_object_id(), 'body_class', true ) )
		$classes = array_merge( $classes, explode( ' ', $post_classes ) );

	if ( is_archive() || is_search() ) {
		$classes[] = 'listing';
	}

	return $classes;
});
