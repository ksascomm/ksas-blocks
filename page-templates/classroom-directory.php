<?php
/**
 * Template Name: Classroom Directory
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

get_header();
?>
<?php
// Set Research Projects Query Parameters.
$classrooms_query = new WP_Query(
	array(
		'post_type'      => 'classroom',
		'orderby'        => 'title',
		'order'          => 'ASC',
		'posts_per_page' => 100,
	)
);
?>

<main id="site-content" class="site-main prose mx-auto pb-2">
	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', 'page' );

	endwhile; // End of the loop.
	?>

		<form class="isotope-to-sort bg-grey-lightest border-solid border-grey border-2 p-4 mb-4" role="region" aria-label="Filters" id="filters">
			
			<fieldset class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 button-group js-radio-button-group" id="classroom-checkboxes">
				<legend>Filter by Built-in Equipment:</legend>
				<div>
					<input type="checkbox" id="Built-In-Camera" name="Built-In-Camera" value=".Built-In-Camera" />
					<label for="Built-In-Camera">Built-In Camera</label>
				</div>
				<div>
					<input type="checkbox" id="Built-In-Computer" name="Built-In-Computer" value=".Built-In-Computer" />
					<label for="Built-In-Computer">Built-In Computer</label>
				</div>
				<div>
					<input type="checkbox" id="Document-Camera" name="Document-Camera" value=".Document-Camera" />
					<label for="Document-Camera">Document Camera</label>
				</div>
				<div>
					<input type="checkbox" id="Epiphan-Pearl" name="Epiphan-Pearl" value=".Epiphan-Pearl" />
					<label for="Epiphan-Pearl">Epiphan Pearl</label>
				</div>
				<div>
					<input type="checkbox" id="Laptop-HDMI" name="Laptop-HDMI" value=".Laptop-HDMI" />
					<label for="Laptop-HDMI">Laptop Connection - HDMI</label>
				</div>
				<div>
					<input type="checkbox" id="Laptop-Wireless" name="Laptop-Wireless" value=".Laptop-Wireless" />
					<label for="Laptop-Wireless">Laptop Connection - Wireless</label>
				</div>
				<div>
					<input type="checkbox" id="Ceiling-Microphones" name="Ceiling-Microphones" value=".Ceiling-Microphones" />
					<label for="Ceiling-Microphones">Microphones - Ceiling</label>
				</div>
				<div>
					<input type="checkbox" id="Wireless-Microphone" name="Wireless-Microphone" value=".Wireless-Microphone" />
					<label for="Wireless-Microphone">Microphones - Wireless</label>
				</div>
				<div>
					<input type="checkbox" id="Projector" name="Projector" value=".Projector" />
					<label for="Projector">Projector</label>
				</div>
				<div>
					<input type="checkbox" id="Projection-Screen" name="Projection-Screen" value=".Projection-Screen" />
					<label for="Projection-Screen">Projection Screen</label>
				</div>
				<div>
					<input type="checkbox" id="Conf-Ready" name="Conf-Ready" value=".Conf-Ready" />
					<label for="Conf-Ready">Recording/Conference Ready</label>
				</div>
				<div>
					<input type="checkbox" id="Zoom-Cart" name="Zoom-Cart" value=".Zoom-Cart" />
					<label for="Zoom-Cart">Zoom Cart</label>
				</div>
			</fieldset>
			<?php
			$filters = get_terms(
				array(
					'taxonomy'   => 'classroom_type',
					'orderby'    => 'slug',
					'order'      => 'ASC',
					'hide_empty' => true,
				)
			);
			if ( ! empty( $filters ) && ! is_wp_error( $filters ) ) :
				?>
				
				<fieldset class="flex flex-col md:flex-row justify-start button-group js-radio-button-group" id="classroom-radio-buttons">
				<legend class="mt-4">Filter by Classroom Type:</legend>
				<?php foreach ( $filters as $filter ) : ?>
				<div class="classroom-type <?php echo esc_html( $filter->slug ); ?>">
					<input type="radio" id="<?php echo esc_html( $filter->slug ); ?>" name="classroom_type" value=".<?php echo esc_html( $filter->slug ); ?>" />
					<label for="<?php echo esc_html( $filter->slug ); ?>"><?php echo esc_html( $filter->name ); ?></label>
				</div>
				<?php endforeach; ?>
				</fieldset>
			<?php endif; ?>
			<fieldset class="w-auto search-form my-2 px-2">
				<legend class="mt-4 mb-2">Search by Building, Classroom Number, or Equipment:</legend>
				<label class="sr-only" for="id_search">Enter term</label>
				<input class="quicksearch ml-2 p-2 form-input w-full md:w-1/2" type="text" name="search" id="id_search" aria-label="Search Form" placeholder="Enter description keyword"/>
			</fieldset>
		</form>


		<!--<div class="output">*</div>-->
	<?php
	if ( $classrooms_query->have_posts() ) :
		?>
	<div class="mt-8" id="isotope-list">
		<div class="flex flex-wrap">
			<?php
			while ( $classrooms_query->have_posts() ) :
				$classrooms_query->the_post();
				?>
				<?php get_template_part( 'template-parts/content', 'classroom-cards' ); ?>
				<?php
				endwhile;
			?>
		</div>
	</div>
	<?php endif; ?>
	<div id="noResult">
		<h2>No matching results</h2>
	</div>
	<?php
	// Return to main loop.
	wp_reset_postdata();
	?>
</main><!-- #main -->

<?php
get_footer();
