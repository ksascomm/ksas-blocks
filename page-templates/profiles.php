<?php
/**
 * Template Name: Profiles
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

get_header();
?>

<?php
// Set Research Projects Query Parameters.
$ksas_profile_query = new WP_Query(
	array(
		'post_type'      => 'profile',
		'orderby'        => 'title',
		'order'          => 'ASC',
		'posts_per_page' => 100,
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
	if ( $ksas_profile_query->have_posts() ) :
		?>
		<div class="flex flex-wrap">
			<?php
			while ( $ksas_profile_query->have_posts() ) :
				$ksas_profile_query->the_post();
				?>
				<?php get_template_part( 'template-parts/content', 'profile-card' ); ?>
				<?php
				endwhile;
			?>
		</div>
	<?php endif; ?>
	<?php
	// Return to main loop.
	wp_reset_postdata();
	?>
</main><!-- #main -->

<?php
get_footer();
