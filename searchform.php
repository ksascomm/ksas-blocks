<?php
/**
 * Search form
 *
 * @package KSAS_Blocks
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
$twentytwenty_unique_id = twentytwenty_unique_id( 'search-form-' );

$twentytwenty_aria_label = ! empty( $args['label'] ) ? 'aria-label="' . esc_attr( $args['label'] ) . '"' : '';
?>
<form role="search" <?php echo $twentytwenty_aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?> method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr( $twentytwenty_unique_id ); ?>">
		<span class="sr-only"><?php _e( 'Search for:', 'ksas-blocks' ); // phpcs:ignore: WordPress.Security.EscapeOutput.UnsafePrintingFunction -- core trusts translations ?></span>
		<input type="search" id="<?php echo esc_attr( $twentytwenty_unique_id ); ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search this site &hellip;', 'placeholder', 'ksas-blocks' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'ksas-blocks' ); ?>" />
</form>