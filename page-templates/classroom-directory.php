<?php
/**
 * Template Name: Classroom Directory
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

get_header();

// Fetch Classrooms - using a unique variable name.
$classrooms_list_query = new WP_Query(
	array(
		'post_type'      => 'classroom',
		'orderby'        => 'title',
		'order'          => 'ASC',
		'posts_per_page' => -1, // Use -1 to ensure Isotope has all data points.
	)
);
?>

<main id="site-content" class="pb-2 mx-auto prose site-main">
	<?php
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content', 'page' );
	endwhile;
	?>

	<form class="p-4 mb-4 border-2 border-solid isotope-to-sort bg-grey-lightest border-grey" role="region" aria-label="Filters" id="filters">
		
		<fieldset class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4 button-group js-radio-button-group" id="classroom-checkboxes">
			<legend class="font-bold">Filter by Built-in Equipment:</legend>
			<?php
			// Defining these in an array makes it easier to maintain and loop securely.
			$equipment_list = array(
				'Built-In-Camera'     => 'Built-In Camera',
				'Built-In-Computer'   => 'Built-In Computer',
				'Document-Camera'     => 'Document Camera',
				'Epiphan-Pearl'       => 'Epiphan Pearl',
				'Laptop-HDMI'         => 'Laptop Connection - HDMI',
				'Laptop-Wireless'     => 'Laptop Connection - Wireless',
				'Ceiling-Microphones' => 'Microphones - Ceiling',
				'Wireless-Microphone' => 'Microphones - Wireless',
				'Projector'           => 'Projector',
				'Projection-Screen'   => 'Projection Screen',
				'Conf-Ready'          => 'Recording/Conference Ready',
				'Zoom-Cart'           => 'Zoom Cart',
			);

			foreach ( $equipment_list as $equip_id => $equip_label ) :
				?>
				<div>
					<input type="checkbox" id="<?php echo esc_attr( $equip_id ); ?>" name="<?php echo esc_attr( $equip_id ); ?>" value=".<?php echo esc_attr( $equip_id ); ?>" />
					<label for="<?php echo esc_attr( $equip_id ); ?>"><?php echo esc_html( $equip_label ); ?></label>
				</div>
			<?php endforeach; ?>
		</fieldset>

		<?php
		$classroom_types = get_terms(
			array(
				'taxonomy'   => 'classroom_type',
				'orderby'    => 'slug',
				'order'      => 'ASC',
				'hide_empty' => true,
			)
		);

		if ( ! empty( $classroom_types ) && ! is_wp_error( $classroom_types ) ) :
			?>
			<fieldset class="flex flex-col justify-start md:flex-row button-group js-radio-button-group" id="classroom-radio-buttons">
				<legend class="mt-4 font-bold">Filter by Classroom Type:</legend>
				<div class="mr-4 classroom-type" style="background-color:var(--color-primary);">
					<input type="radio" id="all-types" name="classroom_type" value="*" checked />
					<label for="all-types">Show All</label>
				</div>
				<?php foreach ( $classroom_types as $c_type ) : ?>
				<div class="mr-4 classroom-type <?php echo esc_attr( $c_type->slug ); ?>">
					<input type="radio" id="<?php echo esc_attr( $c_type->slug ); ?>" name="classroom_type" value=".<?php echo esc_attr( $c_type->slug ); ?>" />
					<label for="<?php echo esc_attr( $c_type->slug ); ?>"><?php echo esc_html( $c_type->name ); ?></label>
				</div>
				<?php endforeach; ?>
			</fieldset>
		<?php endif; ?>

		<fieldset class="w-auto px-2 my-2 search-form">
			<legend class="px-2 mt-4 mb-2 text-xl font-bold font-heavy">Search by Building, Classroom Number, or Equipment:</legend>
			<label class="sr-only" for="id_search">Enter term</label>
			<input class="w-full p-2 mb-2 ml-2 quicksearch form-input md:w-1/2" type="text" name="search" id="id_search" placeholder="Enter description keyword"/>
		</fieldset>
	</form>

	<?php if ( $classrooms_list_query->have_posts() ) : ?>
		<div class="mt-8" id="isotope-list">
			<div class="flex flex-wrap">
				<?php
				while ( $classrooms_list_query->have_posts() ) :
					$classrooms_list_query->the_post();
					get_template_part( 'template-parts/content', 'classroom-cards' );
				endwhile;
				?>
			</div>
		</div>
	<?php endif; ?>

	<div id="noResult" class="hidden">
		<h2 class="text-center text-grey-dark">No matching results</h2>
	</div>

	<?php wp_reset_postdata(); ?>
</main>

<?php
get_footer();