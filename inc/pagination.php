<?php
/**
 * Custom Pagination
 *
 * @package KSAS_Blocks
 */

if ( ! function_exists( 'ksas_blocks_pagination' ) ) :
	/**
	 * Set up the pagination function.
	 */
	function ksas_blocks_pagination() {
		global $wp_query;
		$total = $wp_query->max_num_pages;
		// Only paginate if we have more than one page!
		if ( $total > 1 ) {
			// Get the current page.
			if (
				! $current_page = get_query_var( 'paged' )
			)
				$current_page = 1;
			// Structure of “format” depends on whether we’re using pretty permalinks.
			$format = empty( get_option( 'permalink_structure' ) ) ? '&page=%#%' : 'page/%#%/';
			echo paginate_links(
				array(
					'base'     => get_pagenum_link( 1 ) . '%_%',
					'format'   => $format,
					'current'  => $current_page,
					'total'    => $total,
					'mid_size' => 4,
					'type'     => 'list',
				)
			);
		}
	}
endif;
