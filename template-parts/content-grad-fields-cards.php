<?php
/**
 * Template part for displaying Field of Study cards
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

// Use the global $post object or get_the_ID() for better compatibility.
$field_post_id = get_the_ID();
$field_title   = get_the_title();
?>

<div class="w-full p-2 my-4 graduate-field-card not-prose 2xl:mx-0 md:w-1/2 xl:w-1/3 item" id="field-<?php echo esc_attr( sanitize_title( $field_title ) ); ?>">
	<div class="h-full px-6 py-4 mb-4 overflow-hidden bg-white field graduate-field-card-outline">
		<h3 class="text-2xl font-bold leading-snug font-heavy">
			<?php echo esc_html( $field_title ); ?>
		</h3>
		<div class="flex flex-wrap items-center">
			<ul class="w-full list-none">
				<?php
					$degrees = get_post_meta( $field_post_id, 'ecpt_degreesoffered', true );
				if ( ! empty( $degrees ) ) :
					?>
					<li class="my-2 leading-tight">
						<span class="fas fa-graduation-cap" aria-hidden="true"></span> 
						Degrees Offered: <?php echo esc_html( $degrees ); ?>
					</li>
				<?php endif; ?>

				<?php
					$website = get_post_meta( $field_post_id, 'ecpt_website', true );
				if ( ! empty( $website ) ) :
					?>
					<li class="my-2 leading-tight">
						<span class="fas fa-link" aria-hidden="true"></span> 
						<a href="<?php echo esc_url( $website ); ?>" aria-label="<?php echo esc_attr( $field_title ); ?> Program Website">Program Website</a>
					</li>
				<?php endif; ?>

				<?php
				$email = get_post_meta( $field_post_id, 'ecpt_emailaddress', true );
				$name  = get_post_meta( $field_post_id, 'ecpt_contactname', true );
				if ( $email || $name ) :
					?>
					<li class="my-2 leading-tight">
						<span class="far fa-id-card" aria-hidden="true"></span>
						<a href="mailto:<?php echo esc_attr( $email ); ?>">
							<?php echo esc_html( $name ? $name : $email ); ?>
						</a>
					</li>
				<?php endif; ?>

				<li class="leading-tight">
					<strong class="font-bold font-heavy">Deadline: </strong>
					<span class="text-lg">
						<?php echo esc_html( get_post_meta( $field_post_id, 'ecpt_deadline', true ) ); ?>
						<?php
						$add_deadline = get_post_meta( $field_post_id, 'ecpt_adddeadline', true );

						if ( ! empty( $add_deadline ) ) :
							?>
							; <?php echo esc_html( $add_deadline ); ?>
						<?php endif; ?>
					</span>
				</li>
			</ul>
			<?php
			$supp_materials = get_post_meta( $field_post_id, 'ecpt_supplementalmaterials', true );
			if ( ! empty( $supp_materials ) ) :
				?>
				<dl class="w-full mt-4">
					<dt class="font-bold font-heavy">Supplemental Materials</dt>
					<dd class="pl-0 text-lg leading-6"><?php echo esc_html( $supp_materials ); ?></dd>
				</dl>
			<?php endif; ?>
		</div>
	</div>
</div>