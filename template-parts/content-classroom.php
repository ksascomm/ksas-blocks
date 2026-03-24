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
	<header class="mb-6 entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>

	<div class="pl-4 pr-4 entry-content lg:pr-12 xl:pl-0 xl:pr-0">
		<div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
			<div>
				<div class="flex mt-4">
				<?php
				the_post_thumbnail(
					'full',
					array(
						'class' => 'w-full rounded-md shadow-sm',
						'alt'   => the_title_attribute( array( 'echo' => false ) ),
					)
				);
				?>
				</div>
				
				<h2 class="sr-only">Classroom Overview</h2>
				
				<div class="flex classroom-callouts">
				<?php if ( get_field( 'capacity' ) ) : ?>
					<div class="w-1/2 p-1 m-4 mt-8 overflow-hidden text-lg font-bold text-center bg-white border-2 border-solid rounded-xl text-primary border-primary font-heavy">
						<h3>Capacity</h3> 
						<div class="text-3xl font-bold"><?php echo esc_html( get_field( 'capacity' ) ); ?></div>
					</div>
				<?php endif; ?>

				<?php
				$room_single_terms = get_the_terms( get_the_ID(), 'classroom_type' );
				if ( ! is_wp_error( $room_single_terms ) && ! empty( $room_single_terms ) ) :
					$slugs = wp_list_pluck( $room_single_terms, 'slug' );
					?>
					<div class="w-1/2 overflow-hidden rounded-xl m-4 mt-8 text-center classroom-type <?php echo esc_attr( implode( ' ', $slugs ) ); ?>">
						<h3 class="text-white">Classroom Type</h3>
						<?php foreach ( $room_single_terms as $room_term ) : ?>
							<div class="text-white"><?php echo esc_html( $room_term->name ); ?></div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
				</div>

				<?php if ( get_field( 'comments' ) ) : ?>
					<h3 class="mt-8 text-xl font-bold">Classroom Notes</h3>
					<div class="prose max-w-none">
						<?php the_field( 'comments' ); ?>
					</div>
				<?php endif; ?>
			</div>

			<div>
				<h3 class="mb-4 text-xl font-bold">Supported Built-in Equipment</h3>
				<figure class="wp-block-table classroom-table">
					<table class="w-full table-auto">
						<thead class="bg-grey-cool">
							<tr>
								<th class="px-4 py-2 text-left">Equipment & Features</th>
								<th class="px-4 py-2 text-left">Available/Specifications</th>
							</tr>
						</thead>
						<tbody>
							<?php
							// Array map to loop through ACF fields to reduce code repetition and ensure escaping.
							$equipment_fields = array(
								'built_in_camera'        => 'Built-In Camera',
								'built_in_computer'      => 'Built-in Computer',
								'document_camera'        => 'Document Camera',
								'epiphan_pearl'          => 'Epiphan Pearl',
								'laptop_connection_hdmi' => 'Laptop Connection - HDMI',
								'laptop_connection_wireless' => 'Laptop Connection - Wireless',
								'ceiling_microphones'    => 'Microphones - Ceiling',
								'wireless_microphone'    => 'Microphone - Wireless',
								'projection_screen'      => 'Projection Screen',
								'projector'              => 'Projector',
								'record_conf_ready'      => 'Recording/Conference Ready',
								'screen_size'            => 'Screen Size',
								'student_computers'      => 'Student Computers',
								'supported_resolution'   => 'Supported Resolution',
								'zoom_cart'              => 'Zoom Cart',
							);

							foreach ( $equipment_fields as $field_slug => $label ) :
								$val = get_field( $field_slug );
								if ( $val ) :
									?>
									<tr>
										<td class="px-4 py-2 border-t"><?php echo esc_html( $label ); ?></td>
										<td class="px-4 py-2 border-t"><?php echo esc_html( $val ); ?></td>
									</tr>
									<?php
								endif;
							endforeach;
							?>

							<?php if ( have_rows( 'instruction_sheets' ) ) : ?>
								<tr>
									<td class="px-4 py-2 border-t">Instruction Sheet(s)</td>
									<td class="px-4 py-2 border-t">
									<?php
									while ( have_rows( 'instruction_sheets' ) ) :
										the_row();
										?>
										<?php
										$guides = array(
											'in_room_system_operation_guide' => 'In-room System Operation Guide',
											'zoom_rooms_cart_guide'          => 'Zoom Rooms Cart Guide',
											'room_specific_guide'            => 'Room Specific Guide',
										);
										foreach ( $guides as $sub_slug => $sub_label ) :
											$guide = get_sub_field( $sub_slug );
											if ( $guide ) :
												?>
												<a href="<?php echo esc_url( $guide['url'] ); ?>" class="text-blue hover:underline"><?php echo esc_html( $sub_label ); ?></a><br>
												<?php
											endif;
										endforeach;
									endwhile;
									?>
									</td>
								</tr>
							<?php endif; ?>
						</tbody>
					</table>
				</figure>

				<h3 class="mt-8 mb-4 text-xl font-bold">Additional Equipment/Features</h3>
				<figure class="wp-block-table classroom-table">
					<table class="w-full table-auto">
						<thead class="text-white bg-grey-cool">
							<tr>
								<th class="px-4 py-2 text-left">Feature</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$binary_features = array(
								'blackout_light_dampening_shades' => 'Blackout/Light Dampening Shades',
								'chalkboards'      => 'Chalkboard',
								'instructor_table' => 'Instructor Table',
								'piano'            => 'Piano',
								'tiered_seating'   => 'Tiered Seating',
								'whiteboards'      => 'Whiteboard',
								'windows'          => 'Windows',
							);

							foreach ( $binary_features as $f_slug => $f_label ) :
								if ( get_field( $f_slug ) == 1 ) :
									?>
									<tr><td class="px-4 py-2 border-t"><?php echo esc_html( $f_label ); ?></td></tr>
									<?php
								endif;
							endforeach;

							$text_features = array(
								'chair_type'   => 'Chair Type',
								'lectern_type' => 'Lectern Type',
								'power_source' => 'Power Source',
								'table_type'   => 'Table Type',
								'tablet_chair' => 'Tablet Chair',
							);

							foreach ( $text_features as $t_slug => $t_label ) :
								$t_val = get_field( $t_slug );

								if ( $t_val ) :
									// If the value is an array, join it with commas. Otherwise, use the string.
									$display_val = is_array( $t_val ) ? implode( ', ', $t_val ) : $t_val;
									?>
									<tr>
										<td class="px-4 py-2 border-t">
											<?php echo esc_html( $t_label . ': ' . $display_val ); ?>
										</td>
									</tr>
									<?php
								endif;
							endforeach;
							?>
						</tbody>
					</table>
				</figure>
			</div>
		</div>
	</div>
</article>