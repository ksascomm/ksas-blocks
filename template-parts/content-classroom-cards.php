<?php
/**
 * Template part for displaying Classroom CPT as cards
 *
 * @package KSAS_Blocks
 */

// 1. Collect all filter classes into an array to ensure clean output.
$classroom_filters = array( 'item', 'classroom-field-card' );

// Add Classroom Type Slug.
$room_terms = get_the_terms( get_the_ID(), 'classroom_type' );
if ( ! is_wp_error( $room_terms ) && ! empty( $room_terms ) ) {
	foreach ( $room_terms as $room_term ) {
		$classroom_filters[] = $room_term->slug;
	}
}

// Add Equipment Slugs (Matching the checkbox values in your directory template).
$equipment_map = array(
	'projector'                  => 'Projector',
	'projection_screen'          => 'Projection-Screen',
	'built_in_computer'          => 'Built-in-Computer',
	'laptop_connection_hdmi'     => 'Laptop-HDMI',
	'laptop_connection_wireless' => 'Laptop-Wireless',
	'document_camera'            => 'Document-Camera',
	'wireless_microphone'        => 'Wireless-Microphone',
	'built_in_camera'            => 'Built-In-Camera',
	'record_conf_ready'          => 'Conf-Ready',
	'student_computers'          => 'Student-Computers',
	'epiphan_pearl'              => 'Epiphan-Pearl',
	'ceiling_microphones'        => 'Ceiling-Microphones',
	'zoom_cart'                  => 'Zoom-Cart',
);

foreach ( $equipment_map as $field_key => $class_name ) {
	if ( get_field( $field_key ) == 'Yes' ) {
		$classroom_filters[] = $class_name;
	}
}

// Create a clean, space-separated string.
$filter_class_string = implode( ' ', $classroom_filters );
?>

<div class="p-2 w-full lg:w-1/4 <?php echo esc_attr( $filter_class_string ); ?>" id="room-<?php echo esc_attr( sanitize_title( get_the_title() ) ); ?>">
	<div class="h-full mb-4 overflow-hidden transition-shadow bg-white border rounded-lg shadow-sm field border-grey-light hover:shadow-md">
		
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="classroom-thumb">
				<?php
				the_post_thumbnail(
					'medium',
					array(
						'class' => 'w-full h-48 object-cover',
						'alt'   => the_title_attribute( array( 'echo' => false ) ),
					)
				);
				?>
			</div>
		<?php endif; ?>

		<div class="px-6 py-4">
			<h2 class="mb-2 text-xl font-bold font-heavy">
				<a href="<?php echo esc_url( get_permalink() ); ?>" class="text-blue hover:underline"><?php the_title(); ?></a>
			</h2>

			<?php if ( get_field( 'capacity' ) ) : ?>
				<div class="my-3">
					<span class="inline-block px-2 text-lg font-bold bg-white border-2 rounded text-blue border-blue font-heavy">
						Capacity: <?php echo esc_html( get_field( 'capacity' ) ); ?>
					</span>
				</div>
			<?php endif; ?>

			<?php
			if ( ! is_wp_error( $room_terms ) && ! empty( $room_terms ) ) :
				// Get an array of slugs for the class attribute.
				$room_type_classes = wp_list_pluck( $room_terms, 'slug' );
				// Get an array of names for the visible text.
				$room_type_names = wp_list_pluck( $room_terms, 'name' );
				?>
				<div class="inline-block text-lg px-2 my-2 classroom-type <?php echo esc_attr( implode( ' ', $room_type_classes ) ); ?>">
					<?php echo esc_html( implode( ', ', $room_type_names ) ); ?>
				</div>
			<?php endif; ?>

			<div class="hidden sr-only">
				<?php
				the_title();
				echo ' ' . esc_html( get_field( 'capacity' ) );
				// Output all equipment names for text search.
				foreach ( $equipment_map as $field_key => $label ) {
					if ( get_field( $field_key ) == 'Yes' ) {
						echo ' ' . esc_html( $label ); }
				}
				?>
			</div>
		</div>
	</div>
</div>