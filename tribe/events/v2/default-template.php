<?php
/**
 * View: Default Template Override
 *
 * @package KSAS_Blocks
 * @version 7.7.14
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

get_header();
?>

<main id="site-content" class="mx-auto prose site-main lg:prose-lg">
		<?php if ( function_exists( 'bcn_display' ) ) : ?>
		<nav class="ml-6 my-6! wayfinding xl:pl-0 lg:ml-10 2xl:ml-[2%]" aria-label="Breadcrumb">
			<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
				<?php bcn_display(); ?>
			</div>
		</nav>
	<?php endif; ?>
	
	<div id="tribe-events" class="tribe-common px-6! pb-12! lg:px-14! 2xl:px-[2%]! pt-4!">
		<?php
		// Use the official hook to output the view content.
		// This is safer than trying to instantiate the Bootstrap class manually.
		if ( function_exists( 'tribe_get_view' ) ) {
			echo wp_kses_post( tribe_get_view() );
		}
		?>
	</div>
</main>

<?php
get_footer();