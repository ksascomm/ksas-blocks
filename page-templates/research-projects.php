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

<main id="site-content" class="pb-2 mx-auto mb-12 prose site-main">
	<?php
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content', 'page' );
	endwhile;
	?>

	<form class="p-4 mb-4 border-2 border-solid isotope-to-sort bg-grey-lightest border-grey" role="region" aria-label="Filters">
		<?php
		$project_terms = get_terms(
			array(
				'taxonomy'   => 'project_type',
				'orderby'    => 'name', // Changed from ID to name for better UX.
				'order'      => 'ASC',
				'hide_empty' => true,
			)
		);

		if ( ! is_wp_error( $project_terms ) && ! empty( $project_terms ) ) :
			?>
			<fieldset class="flex flex-col justify-start gap-2 md:flex-row" id="filters">
				<legend class="mb-2 -mt-2 text-2xl font-bold">Filter by type or area:</legend>
				
				<button type="button" class="px-4 py-1 text-lg text-white button bg-blue hover:bg-blue-800" data-filter="*">Show All</button>

				<?php foreach ( $project_terms as $project_item ) : ?>
					<button type="button" 
							class="px-4 py-1 text-lg text-white button bg-blue hover:bg-blue-800" 
							data-filter=".<?php echo esc_attr( $project_item->slug ); ?>">
						<?php echo esc_html( $project_item->name ); ?>
					</button>
				<?php endforeach; ?>
			</fieldset>
		<?php endif; ?>

		<fieldset class="w-auto px-2 my-2 search-form">
			<legend class="px-2 mt-4 mb-2 text-xl font-bold font-heavy">Search by keyword:</legend>
			<label class="sr-only" for="id_search">Enter term</label>
			<input class="w-full p-2 mb-2 ml-2 quicksearch form-input md:w-1/2" 
					type="text" 
					name="search" 
					id="id_search" 
					placeholder="Enter description keyword"/>
		</fieldset>
	</form>

	<?php if ( $flagship_researchprojects_query->have_posts() ) : ?>
		<div class="mt-8" id="isotope-list">
			<div class="flex flex-wrap">
				<?php
				while ( $flagship_researchprojects_query->have_posts() ) :
					$flagship_researchprojects_query->the_post();
					get_template_part( 'template-parts/content', 'research-cards' );
				endwhile;
				?>
				<div id="noResult" class="hidden w-full p-8 text-center bg-grey-lightest">
					<span class="text-xl font-bold text-grey-dark">No matching results</span>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<?php wp_reset_postdata(); ?>
</main>

<?php
get_footer();
