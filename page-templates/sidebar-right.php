<?php
/**
 * Template Name: Page With Sidebar Right
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

get_header();
?>
<div class="flex flex-wrap p-1 sm:p-2 md:p-4">
	<main id="site-content" class="site-main page-with-sidebar w-full lg:w-3/4 prose lg:prose-lg mx-auto">
		<?php
		if ( function_exists( 'bcn_display' ) ) :?>
		<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
			<?php bcn_display(); ?>
		</div>
		<?php endif; ?>
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

	<?php
	get_sidebar();
	?>
</div>
<?php
get_footer();

