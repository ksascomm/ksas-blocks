<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package KSAS_Blocks
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function ksas_blocks_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) && ! is_active_sidebar( 'sidebar-2' ) && ! is_active_sidebar( 'sidebar-3' ) && ! is_active_sidebar( 'sidebar-4' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'ksas_blocks_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function ksas_blocks_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'ksas_blocks_pingback_header' );

/**
 * Add custom text to <title> using pre_get_document_title hook
 *
 * @param array $title <title> element.
 */
function custom_ksasacademic_page_title( $title ) {
	if ( is_front_page() && is_home() ) {
		$title = get_bloginfo( 'name' ) . ' | Johns Hopkins University';
		return $title;
	} elseif ( is_front_page() ) {
		$title = get_bloginfo( 'name' ) . ' | Johns Hopkins University';
		return $title;
	} elseif ( is_home() ) {
		$title = get_the_title( get_option( 'page_for_posts', true ) ) . ' | ' . get_bloginfo( 'name' ) . ' | Johns Hopkins University';
		return $title;
	} elseif ( is_category() ) {
		$title = single_cat_title( '', false ) . ' | ' . get_bloginfo( 'name' ) . ' | Johns Hopkins University';
		return $title;
	} elseif ( is_author() ) {
		global $post;
		$title = get_the_author_meta( 'display_name', $post->post_author ) . ' Author Archives | ' . get_bloginfo( 'name' ) . ' | Johns Hopkins University';
		return $title;
	} elseif ( is_archive() ) {
		if ( is_category() ) :
			$title = single_cat_title( '', false ) . ' | ' . get_bloginfo( 'name' ) . ' | Johns Hopkins University';
			return $title;
		endif;
	} elseif ( is_single() ) {
		$title = get_the_title() . ' | ' . get_bloginfo( 'name' ) . ' | Johns Hopkins University';
		return $title;
	} elseif ( is_page() ) {
		$title = get_the_title() . ' | ' . get_bloginfo( 'name' ) . ' | Johns Hopkins University';
		return $title;
	} elseif ( is_404() ) {
		$title = 'Page Not Found | ' . get_bloginfo( 'name' ) . ' | Johns Hopkins University';
		return $title;
	} else {
		return $title;
	}
}
add_filter( 'pre_get_document_title', 'custom_ksasacademic_page_title', 9999 );
