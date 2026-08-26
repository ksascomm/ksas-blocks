<?php

/**
 * Custom functions for submenu menus
 *
 * @package Flagship_Tailwind
 * @since  Flagship_Tailwind 1.2.0
 */


/**
 * Get the top ancestor ID
 * Used to only show child & grandchild pages in sidebar dropdown menu
 */
function get_the_top_ancestor_id() {
	global $post;
	if ( $post->post_parent ) {
		$ancestors = array_reverse( get_post_ancestors( $post->ID ) );
		return $ancestors[0];
	} else {
		return $post->ID;
	}
}

/**
 * WP_nav_menu separate submenu output.
 *
 * Optional $args contents:
 *
 * string theme_location - The menu that is desired.  Accepts (matching in order) id, slug, name. Defaults to blank.
 * string xpath - Optional. xPath syntax.
 * string before - Optional. Text before the menu tree.
 * string after - Optional. Text after the menu tree.
 * bool echo - Optional, default is TRUE. Whether to echo the menu or return it.
 *
 * @param array $args Arguments.
 * @return String If $echo value is set to FALSE.
 *
 * @link https://www.isitwp.com/wp_nav_menu-separate-submenu-output/
 */
function internal_page_submenu( $args = array() ) {
	$defaults = array(
		'theme_location' => 'main-nav',
		'xpath'          => "./li[contains(@class,'current-menu-item') or contains(@class,'current-menu-ancestor')]/ul",
		'before'         => '',
		'after'          => '',
		'echo'           => true,
	);
	$args     = wp_parse_args( $args, $defaults );
	$args     = (object) $args;

	$output = array();

	$menu_tree     = wp_nav_menu(
		array(
			'theme_location' => $args->theme_location,
			'container'      => '',
			'echo'           => false,
		)
	);
	$menu_tree_XML = new SimpleXMLElement( $menu_tree );
	$path          = $menu_tree_XML->xpath( $args->xpath );

	$output[] = $args->before;

	if ( ! empty( $path ) ) {
		$output[] = $path[0]->asXML();
	}

	$output[] = $args->after;

	if ( $args->echo ) {
		echo implode( '', $output );
	} else {
		return implode( '', $output );
	}
}
