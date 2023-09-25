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
		if ( is_paged() ) {
			$page_number = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$title       = get_the_title( get_option( 'page_for_posts', true ) ) . ' Page ' . $page_number . ' | ' . get_bloginfo( 'name' ) . ' | Johns Hopkins University';
			return $title;
		} else {
			$title = get_the_title( get_option( 'page_for_posts', true ) ) . ' | ' . get_bloginfo( 'name' ) . ' | Johns Hopkins University';
			return $title;
		}
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
		$title = the_title_attribute( 'echo=0' ) . ' | ' . get_bloginfo( 'name' ) . ' | Johns Hopkins University';
		return $title;
	} elseif ( is_page() ) {
		$title = the_title_attribute( 'echo=0' ) . ' | ' . get_bloginfo( 'name' ) . ' | Johns Hopkins University';
		return $title;
	} elseif ( is_404() ) {
		$title = 'Page Not Found | ' . get_bloginfo( 'name' ) . ' | Johns Hopkins University';
		return $title;
	} else {
		return $title;
	}
}
add_filter( 'pre_get_document_title', 'custom_ksasacademic_page_title', 9999 );

/**
 * Setting Default Blocks in the Block Editor
 *
 * @link https://theeventscalendar.com/knowledgebase/k/change-the-default-event-template-in-block-editor
 */
add_filter(
	'tribe_events_editor_default_template',
	function( $template ) {
		$template = array(
			array( 'tribe/event-datetime' ),
			array(
				'core/paragraph',
				array(
					'placeholder' => __( 'Add Event Description...', 'the-events-calendar' ),
				),
			),
			array( 'tribe/featured-image' ),
			array( 'tribe/event-venue' ),
			array(
				'tribe/event-links',
				array(
					'placeholder' => __( 'Click Me to Add Link', 'the-events-calendar' ),
				),
			),
		);
		return $template;
	},
	11,
	1
);
