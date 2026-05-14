<?php
/**
 * The template for displaying all single Spotlight Profiles
 *
 * @package KSASAcademicDepartment
 * @since KSASAcademicDepartment 1.0.0
 */

get_header();

?>

<main id="site-content" class="mx-auto prose site-main lg:prose-lg">
	<?php
	if ( function_exists( 'bcn_display' ) ) :
		?>
		<nav class="ml-6 wayfinding mb-8 xl:pl-0 lg:ml-16 2xl:ml-[2%]" aria-label="Breadcrumb Navigation">
			<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
				<?php bcn_display(); ?>
			</div>
		</nav>
	<?php endif; ?>
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'profile' );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
