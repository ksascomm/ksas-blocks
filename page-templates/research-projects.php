<?php
/**
 * Template Name: Research Projects
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

get_header();
?>

<?php
// Set Research Projects Query Parameters.
$flagship_researchprojects_query = new WP_Query(
	array(
		'posts_per_page' => 100,
		'post_type'      => 'ksasresearchprojects',
		'orderby'        => 'date',
		'order'          => 'DESC',
	)
);
?>

<main id="site-content" class="site-main prose mx-auto pb-2 mb-12">
	
	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', 'page' );

	endwhile; // End of the loop.
	?>
	<form class="isotope-to-sort bg-grey-lightest border-solid border-grey border-2 p-4 mb-4" role="region" aria-label="Filters">
		<?php
			$projects = get_terms(
				'project_type',
				array(
					'orderby'    => 'ID',
					'order'      => 'ASC',
					'hide_empty' => true,
				)
			);
			?>
	<?php if ( ! empty( $projects ) ) : ?>
		
		<fieldset class="flex flex-col md:flex-row justify-start" id="filters">
		<legend class="text-2xl -mt-2">Filter by type or area:</legend>
			<?php foreach ( $projects as $project ) : ?>
				<button class="all button bg-blue text-white hover:bg-blue-light hover:text-primary text-lg p-1" href="javascript:void(0)" data-filter=".<?php echo esc_html( $project->slug ); ?>"><?php echo esc_html( $project->name ); ?></button>
			<?php endforeach; ?>
		</fieldset>
	<?php endif; ?>
		<fieldset class="w-auto search-form my-2 px-2">
			<legend class="mt-4 mb-2 text-xl font-bold font-heavy px-2">Search by keyword:</legend>
			<label class="sr-only" for="id_search">Enter term</label>
			<input class="quicksearch mb-2 ml-2 p-2 form-input w-full md:w-1/2" type="text" name="search" id="id_search" aria-label="Search Form" placeholder="Enter description keyword"/>
		</fieldset>
	</form>
	<?php
	if ( $flagship_researchprojects_query->have_posts() ) :
		?>
	<div class="mt-8" id="isotope-list" >
		<div class="flex flex-wrap">
			<?php
			while ( $flagship_researchprojects_query->have_posts() ) :
				$flagship_researchprojects_query->the_post();
				?>
				<?php get_template_part( 'template-parts/content', 'research-cards' ); ?>
				<?php
				endwhile;
			?>
			<div id="noResult">
				<span>No matching results</span>
			</div>
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
