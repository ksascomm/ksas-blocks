<?php
/**
 * Template part for displaying a singular Classroom CPT post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'classroom mt-8' ); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
			<div>
				<div class="flex mt-4">
				<?php
				the_post_thumbnail(
					'full',
					array(
						'class' => 'w-full rounded-md',
						'alt'   => the_title_attribute(
							array(
								'echo' => false,
							)
						),
					)
				);
				?>
				</div>
				<h2 class="sr-only">Classroom Overview</h2>
				<div class="flex classroom-callouts">
				<?php
				if ( get_field( 'capacity' ) ) :
					?>
					<div class="w-1/2 overflow-hidden rounded-xl text-primary border-primary border-solid border-2 bg-white font-heavy font-bold text-lg px-2 m-4 text-center">
						<h3 class="uppercase">Capacity</h3> 
						<div class="font-bold"><?php the_field( 'capacity' ); ?></div>
					</div>
				<?php endif; ?>
					<div class="w-1/2 overflow-hidden rounded-xl m-4 text-center classroom-type 
						<?php
						$classroom_types = get_the_terms( $post->ID, 'classroom_type' );
						if ( $classroom_types && ! is_wp_error( $classroom_types ) ) :
							foreach ( $classroom_types as $classroom_type ) {
								echo esc_html( $classroom_type->slug );
							}
						endif;
						?>
					">
					<h3 class="uppercase text-white">Classroom Type</h3>
						<?php
						if ( $classroom_types && ! is_wp_error( $classroom_types ) ) :
							foreach ( $classroom_types as $classroom_type ) :
								?>
								<div class="text-white"><?php echo esc_html( $classroom_type->name ); ?> </div>
								<?php
							endforeach;
						endif;
						?>
					</h3>
					</div>
				</div>
				<?php
				if ( get_field( 'comments' ) ) :
					?>
				<h3>Classroom Notes</h3>
					<?php the_field( 'comments' ); ?>
				<?php endif; ?>
			</div>
			<div>
			<h3>Supported Built-in Equipment</h3>
			<figure class="wp-block-table classroom-table">
				<table class="table-auto">
					<thead class="bg-grey-cool bg-opacity-50">
						<tr>
							<th class="font-heavy">Equipment & Features</th>
							<th class="font-heavy">Available/Specifications</th>
						</tr>
					</thead>
					<tbody>

					<?php
					if ( get_field( 'built_in_camera' ) ) :
						?>
					<tr>
						<td>Built-In Camera</td>
						<td><?php the_field( 'built_in_camera' ); ?></td>
					</tr>
					<?php endif; ?>

					<?php
					if ( get_field( 'built_in_computer' ) ) :
						?>
					<tr>
						<td>Built-in Computer</td>
						<td><?php the_field( 'built_in_computer' ); ?></td>
					</tr>
					<?php endif; ?>

					<?php
					if ( get_field( 'document_camera' ) ) :
						?>
					<tr>
						<td>Document Camera</td>
						<td><?php the_field( 'document_camera' ); ?></td>
					</tr>
					<?php endif; ?>

					<?php
					if ( get_field( 'epiphan_pearl' ) ) :
						?>
					<tr>
						<td>Epiphan Pearl</td>
						<td><?php the_field( 'epiphan_pearl' ); ?></td>
					</tr>
					<?php endif; ?>

					<?php
					if ( get_field( 'laptop_connection_hdmi' ) ) :
						?>
					<tr>
						<td>Laptop Connection - HDMI</td>
						<td><?php the_field( 'laptop_connection_hdmi' ); ?></td>
					</tr>
					<?php endif; ?>

					<?php
					if ( get_field( 'laptop_connection_wireless' ) ) :
						?>
					<tr>
						<td>Laptop Connection - Wireless</td>
						<td><?php the_field( 'laptop_connection_wireless' ); ?></td>
					</tr>
					<?php endif; ?>

					<?php
					if ( get_field( 'ceiling_microphones' ) ) :
						?>
					<tr>
						<td>Microphones - Ceiling</td>
						<td><?php the_field( 'ceiling_microphones' ); ?></td>
					</tr>
					<?php endif; ?>

					<?php
					if ( get_field( 'wireless_microphone' ) ) :
						?>
					<tr>
						<td>Microphone - Wireless</td>
						<td><?php the_field( 'wireless_microphone' ); ?></td>
					</tr>
					<?php endif; ?>

					<?php
					if ( get_field( 'projection_screen' ) ) :
						?>
						<tr>
							<td>Projection Screen</td>
							<td><?php the_field( 'projection_screen' ); ?></td>
						</tr>
					<?php endif; ?>

					<?php
					if ( get_field( 'projector' ) ) :
						?>
						<tr>
							<td>Projector</td>
							<td><?php the_field( 'projector' ); ?></td>
						</tr>
					<?php endif; ?>	

					<?php
					if ( get_field( 'record_conf_ready' ) ) :
						?>
					<tr>
						<td>Recording/Conference Ready</td>
						<td><?php the_field( 'record_conf_ready' ); ?></td>
					</tr>
					<?php endif; ?>

					<?php
					if ( get_field( 'screen_size' ) ) :
						?>
					<tr>
						<td>Screen Size</td>
						<td><?php the_field( 'screen_size' ); ?></td>
					</tr>
					<?php endif; ?>

					<?php
					if ( get_field( 'student_computers' ) ) :
						?>
					<tr>
						<td>Student Computers</td>
						<td><?php the_field( 'student_computers' ); ?></td>
					</tr>
					<?php endif; ?>

					<?php
					if ( get_field( 'supported_resolution' ) ) :
						?>
					<tr>
						<td>Supported Resolution</td>
						<td><?php the_field( 'supported_resolution' ); ?></td>
					</tr>
					<?php endif; ?>

					<?php
					if ( get_field( 'zoom_cart' ) ) :
						?>
					<tr>
						<td>Zoom Cart</td>
						<td><?php the_field( 'zoom_cart' ); ?></td>
					</tr>
					<?php endif; ?>

					<?php if ( have_rows( 'instruction_sheets' ) ) : ?>
						<tr>
							<td>Instruction Sheet(s)</td>
							<td>
							<?php
							while ( have_rows( 'instruction_sheets' ) ) :
								the_row();
								?>
								<?php $in_room_system_operation_guide = get_sub_field( 'in_room_system_operation_guide' ); ?>
								<?php if ( $in_room_system_operation_guide ) : ?>
									<a href="<?php echo esc_url( $in_room_system_operation_guide['url'] ); ?>">In-room System Operation Guide</a><br>
								<?php endif; ?>
								<?php $zoom_rooms_cart_guide = get_sub_field( 'zoom_rooms_cart_guide' ); ?>
								<?php if ( $zoom_rooms_cart_guide ) : ?>
									<a href="<?php echo esc_url( $zoom_rooms_cart_guide['url'] ); ?>">Zoom Rooms Cart Guide</a><br>
								<?php endif; ?>
								<?php $room_specific_guide = get_sub_field( 'room_specific_guide' ); ?>
								<?php if ( $room_specific_guide ) : ?>
									<a href="<?php echo esc_url( $room_specific_guide['url'] ); ?>">Room Specific Guide</a>
								<?php endif; ?>
							<?php endwhile; ?>
							</td>
						</tr>
					<?php endif; ?>
					</tbody>
				</table>
			</figure>

			<h3>Additional Equipment/Features</h3>

			<figure class="wp-block-table classroom-table">
				<table class="table-auto">
					<thead class="bg-grey-cool bg-opacity-50">
						<tr>
							<th class="font-heavy">Equipment & Features</th>
						</tr>
					</thead>
					<tbody>

					<?php if ( get_field( 'blackout_light_dampening_shades' ) == 1 ) : ?>
						<tr>
							<td>Blackout/Light Dampening Shades</td>
						</tr>
					<?php else : ?>
						<?php // echo 'false'; ?>
					<?php endif; ?>

					<?php if ( get_field( 'chair_type' ) ) : ?>
					<tr>
						<td>Chair Type: <?php the_field( 'chair_type' ); ?></td>
					</tr>
					<?php endif; ?>

					<?php if ( get_field( 'chalkboards' ) == 1 ) : ?>
						<tr>
							<td>Chalkboard</td>
						</tr>
					<?php else : ?>
						<?php // echo 'false'; ?>
					<?php endif; ?>

					<?php if ( get_field( 'instructor_table' ) == 1 ) : ?>
						<tr>
							<td>Instructor Table</td>
						</tr>
					<?php else : ?>
						<?php // echo 'false'; ?>
					<?php endif; ?>

					<?php if ( get_field( 'lectern_type' ) ) : ?>
					<tr>
						<td>Lectern Type: <?php the_field( 'lectern_type' ); ?></td>
					</tr>
					<?php endif; ?>

					<?php if ( get_field( 'piano' ) == 1 ) : ?>
						<tr>
							<td>Piano</td>
						</tr>
					<?php else : ?>
						<?php // echo 'false'; ?>
					<?php endif; ?>

					<?php if ( get_field( 'power_source' ) ) : ?>
					<tr>
						<td>Power Source: <?php the_field( 'power_source' ); ?></td>
					</tr>
					<?php endif; ?>

					<?php if ( get_field( 'table_type' ) ) : ?>
					<tr>
						<td>Table Type: <?php the_field( 'table_type' ); ?></td>
					</tr>
					<?php endif; ?>

					<?php if ( get_field( 'tablet_chair' ) ) : ?>
					<tr>
						<td>Tablet Chair: <?php the_field( 'tablet_chair' ); ?></td>
					</tr>
					<?php endif; ?>

					<?php if ( get_field( 'tiered_seating' ) == 1 ) : ?>
						<tr>
							<td>Tiered Seating</td>
						</tr>
					<?php else : ?>
						<?php // echo 'false'; ?>
					<?php endif; ?>

					<?php if ( get_field( 'whiteboards' ) == 1 ) : ?>
						<tr>
									<td>Whiteboard</td>
								</tr>
					<?php else : ?>
						<?php // echo 'false'; ?>
					<?php endif; ?>

					<?php if ( get_field( 'windows' ) == 1 ) : ?>
						<tr>
									<td>Windows</td>
								</tr>
					<?php else : ?>
						<?php // echo 'false'; ?>
					<?php endif; ?>

					</tbody>
				</table>
			</figure>
		</div>

	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="sr-only">%s</span>', 'ksas-blocks' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->

