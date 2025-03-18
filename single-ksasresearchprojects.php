<?php
/**
 * The template for displaying all single Research Projects posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package KSAS_Blocks
 */

get_header();
?>

	<main id="site-content" class="site-main prose sm:prose lg:prose-lg mx-auto">
	<?php
	if ( function_exists( 'bcn_display' ) ) :?>
	<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
		<?php bcn_display(); ?>
	</div>
	<?php endif; ?>
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'research-full' );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
