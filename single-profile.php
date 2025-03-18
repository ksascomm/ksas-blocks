<?php
/**
 * The template for displaying all single Spotlight Profiles
 *
 * @package KSASAcademicDepartment
 * @since KSASAcademicDepartment 1.0.0
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

			get_template_part( 'template-parts/content', 'profile' );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
