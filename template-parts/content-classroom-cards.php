<?php
/**
 * Template part for displaying Classroom CPT as cards
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

?>

<div class="classroom-field-card p-2 w-full lg:w-1/4 item  <?php echo esc_html( get_the_classroom_type( $post ) ); ?>
	<?php
	if ( get_field( 'projector' ) == 'Yes' ) :
		?>
		Projector
	<?php endif; ?>
	<?php
	if ( get_field( 'projection_screen' ) == 'Yes' ) :
		?>
	Projection-Screen
	<?php endif; ?>
	<?php
	if ( get_field( 'built_in_computer' ) == 'Yes' ) :
		?>
		Built-in-Computer
	<?php endif; ?>
	<?php
	if ( get_field( 'laptop_connection_hdmi' ) == 'Yes' ) :
		?>
		Laptop-HDMI
	<?php endif; ?>
	<?php
	if ( get_field( 'laptop_connection_wireless' ) == 'Yes' ) :
		?>
		Laptop-Wireless
	<?php endif; ?>
	<?php
	if ( get_field( 'document_camera' ) == 'Yes' ) :
		?>
		Document-Camera
	<?php endif; ?>
	<?php
	if ( get_field( 'wireless_microphone' ) == 'Yes' ) :
		?>
		Wireless-Microphone
	<?php endif; ?>
	<?php
	if ( get_field( 'built_in_camera' ) == 'Yes' ) :
		?>
		Built-In-Camera
	<?php endif; ?>
	<?php
	if ( get_field( 'record_conf_ready' ) == 'Yes' ) :
		?>
		Conf-Ready
	<?php endif; ?>
	<?php
	if ( get_field( 'student_computers' ) == 'Yes' ) :
		?>
		Student-Computers
	<?php endif; ?>
	<?php
	if ( get_field( 'epiphan_pearl' ) == 'Yes' ) :
		?>
		Epiphan-Pearl
	<?php endif; ?>
	<?php
	if ( get_field( 'ceiling_microphones' ) == 'Yes' ) :
		?>
		Ceiling-Microphones
	<?php endif; ?>
	<?php
	if ( get_field( 'zoom_cart' ) == 'Yes' ) :
		?>
		Zoom-Cart
	<?php endif; ?>"
		id="<?php the_title(); ?>">

	<div class="h-full rounded-lg overflow-hidden field mb-4 overflow-hidden bg-white classroom-field-card-outline">
		<?php
			the_post_thumbnail(
				'medium',
				array(
					'alt' => the_title_attribute(
						array(
							'echo' => false,
						)
					),
				)
			);
			?>
		<div class="px-6 py-4">
			<h2 class="font-heavy font-bold">
				<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
			</h2>
			<div>
				<?php
				if ( get_field( 'capacity' ) ) :
					?>
					<div class="my-2">
						<span class="text-primary border-primary border-solid border-2 bg-white font-heavy font-bold text-xl px-2">Capacity: <?php the_field( 'capacity' ); ?></span>
					</div>
					<div class="my-2">
					<?php
						$classroom_types = get_the_terms( $post->ID, 'classroom_type' );
					?>
						<span class="text-xl px-2 my-2 classroom-type
						<?php
						if ( $classroom_types && ! is_wp_error( $classroom_types ) ) :
							foreach ( $classroom_types as $classroom_type ) {
								echo esc_html( $classroom_type->slug );
							}
						endif;
						?>
						">
						<?php
						if ( $classroom_types && ! is_wp_error( $classroom_types ) ) :
							foreach ( $classroom_types as $classroom_type ) {
								echo esc_html( $classroom_type->name );
							}
						endif;
						?>
						</span>
					</div>
					<div class="hidden">
						<?php the_field( 'capacity' ); ?>
						<?php
						if ( get_field( 'projector' ) == 'Yes' ) :
							?>
						Projector
						<?php endif; ?>	
						<?php
						if ( get_field( 'projection_screen' ) == 'Yes' ) :
							?>
						Projection Screen
						<?php endif; ?>
						<?php
						if ( get_field( 'built_in_computer' ) == 'Yes' ) :
							?>
						Built-in Computer
						<?php endif; ?>
						<?php
						if ( get_field( 'laptop_connection_hdmi' ) == 'Yes' ) :
							?>
						HDMI
						<?php endif; ?>
						<?php
						if ( get_field( 'laptop_connection_wireless' ) == 'Yes' ) :
							?>
						Wireless
						<?php endif; ?>
						<?php
						if ( get_field( 'document_camera' ) == 'Yes' ) :
							?>
						Document Camera
						<?php endif; ?>
						<?php
						if ( get_field( 'wireless_microphone' ) == 'Yes' ) :
							?>
						Wireless Microphone
						<?php endif; ?>
						<?php
						if ( get_field( 'built_in_camera' ) == 'Yes' ) :
							?>
						Built-In Camera
						<?php endif; ?>
						<?php
						if ( get_field( 'record_conf_ready' ) == 'Yes' ) :
							?>
						Recording/Conference Ready
						<?php endif; ?>
						<?php
						if ( get_field( 'student_computers' ) == 'Yes' ) :
							?>
						Student Computers
						<?php endif; ?>
						<?php
						if ( get_field( 'epiphan_pearl' ) == 'Yes' ) :
							?>
						Epiphan Pearl
						<?php endif; ?>
						<?php
						if ( get_field( 'ceiling_microphones' ) == 'Yes' ) :
							?>
						Ceiling Microphones
						<?php endif; ?>
						<?php
						if ( get_field( 'zoom_cart' ) == 'Yes' ) :
							?>
						Zoom Cart
						<?php endif; ?>
						<?php if ( get_field( 'blackout_light_dampening_shades' ) == 1 ) : ?>
						Blackout/Light Dampening Shades
					<?php else : ?>
						<?php // echo 'false'; ?>
					<?php endif; ?>

					<?php if ( get_field( 'chair_type' ) ) : ?>
						<?php the_field( 'chair_type' ); ?>
					<?php endif; ?>

					<?php if ( get_field( 'chalkboards' ) == 1 ) : ?>
						Chalkboard
					<?php else : ?>
						<?php // echo 'false'; ?>
					<?php endif; ?>

					<?php if ( get_field( 'instructor_table' ) == 1 ) : ?>
						Instructor Table
					<?php else : ?>
						<?php // echo 'false'; ?>
					<?php endif; ?>

					<?php if ( get_field( 'lectern_type' ) ) : ?>
						<?php the_field( 'lectern_type' ); ?>
					<?php endif; ?>

					<?php if ( get_field( 'power_source' ) ) : ?>
						<?php the_field( 'power_source' ); ?>
					<?php endif; ?>

					<?php if ( get_field( 'table_type' ) ) : ?>
						<?php the_field( 'table_type' ); ?>
					<?php endif; ?>

					<?php if ( get_field( 'tiered_seating' ) == 1 ) : ?>
						Tiered Seating
					<?php else : ?>
						<?php // echo 'false'; ?>
					<?php endif; ?>

					<?php if ( get_field( 'whiteboards' ) == 1 ) : ?>
						Whiteboard
					<?php else : ?>
						<?php // echo 'false'; ?>
					<?php endif; ?>

					<?php if ( get_field( 'windows' ) == 1 ) : ?>
						Windows
					<?php else : ?>
						<?php // echo 'false'; ?>
					<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
