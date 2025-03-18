<?php
/**
 * Template part for displaying Field of Study cards
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

?>

<div class="graduate-field-card not-prose my-4 mx-0 p-2 w-full md:w-1/3 item" id="<?php the_title(); ?>">
	<div class="h-full field  mb-4 px-6 py-4 overflow-hidden bg-white graduate-field-card-outline">
		<h3 class="font-heavy font-bold text-2xl leading-snug">
			<?php the_title(); ?>
		</h3>
		<div class="flex items-center flex-wrap ">
			<ul>
				<?php if ( get_post_meta( $post->ID, 'ecpt_degreesoffered', true ) ) : ?>
					<li class="leading-tight my-2"><span class="fas fa-graduation-cap"></span> Degrees Offered: <?php echo esc_html( get_post_meta( $post->ID, 'ecpt_degreesoffered', true ) ); ?></li>
				<?php endif; ?>
				<li class="leading-tight my-2"><span class="fas fa-link"></span> <a href="<?php echo esc_url( get_post_meta( $post->ID, 'ecpt_website', true ) ); ?>" aria-label="<?php the_title(); ?> Program Website">Program Website</a></li>
				<li class="leading-tight my-2"><span class="far fa-id-card"></span>
					<a href="mailto:<?php echo esc_html( get_post_meta( $post->ID, 'ecpt_emailaddress', true ) ); ?>"><?php echo esc_html( get_post_meta( $post->ID, 'ecpt_contactname', true ) ); ?></a></li>
				<li class="leading-tight "><strong class="font-heavy font-bold">Deadline: </strong><?php echo esc_html( get_post_meta( $post->ID, 'ecpt_deadline', true ) ); ?>
					<?php
					if ( get_post_meta( $post->ID, 'ecpt_adddeadline', true ) ) :
						?>
						; <?php echo esc_html( get_post_meta( $post->ID, 'ecpt_adddeadline', true ) ); ?>
					<?php endif; ?>
				</li>
			</ul>

			<?php if ( get_post_meta( $post->ID, 'ecpt_supplementalmaterials', true ) ) : ?>
				<dl>
					<dt class="font-heavy font-bold">Supplemental Materials</dt>
					<dd class="leading-6 !pl-0"><?php echo esc_html( get_post_meta( $post->ID, 'ecpt_supplementalmaterials', true ) ); ?></dd>
				</dl>
			<?php endif; ?>
		</div>
	</div>
</div>
