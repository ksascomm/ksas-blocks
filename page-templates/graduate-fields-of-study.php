<?php
/**
 * Template Name: Graduate Fields of Study
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

get_header();
?>

<?php
// Set Research Projects Query Parameters.
$gradstudyfields_query = new WP_Query(
	array(
		'post_type'      => 'gradstudyfields',
		'orderby'        => 'title',
		'order'          => 'ASC',
		'posts_per_page' => 50,
	)
);
?>

<main id="site-content" class="site-main prose sm:prose lg:prose-lg mx-auto pb-2">

	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', 'page' );

	endwhile; // End of the loop.
	?>
	<?php
	if ( $gradstudyfields_query->have_posts() ) :
		?>
	<div class="mt-8">
		<div class="flex flex-wrap">
			<?php
			while ( $gradstudyfields_query->have_posts() ) :
				$gradstudyfields_query->the_post();
				?>
				<?php get_template_part( 'template-parts/content', 'grad-fields-cards' ); ?>
				<?php
				endwhile;
			?>
		</div>
	</div>
	<?php endif; ?>
	<?php
	// Return to main loop.
	wp_reset_postdata();
	?>
</main><!-- #main -->

<?php
get_footer();
