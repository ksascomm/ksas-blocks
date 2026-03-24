<?php
/**
 * Template part for displaying research projects cards
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

// RENAME: Use unique variable names to avoid global collision.
$project_card_terms = get_the_terms( get_the_ID(), 'project_type' );
$project_slug_list  = '';

if ( ! empty( $project_card_terms ) && ! is_wp_error( $project_card_terms ) ) {
	$project_slugs = array();
	foreach ( $project_card_terms as $project_term ) {
		$project_slugs[] = $project_term->slug;
	}
	// Prepare the string for the class list.
	$project_slug_list = join( ' ', $project_slugs );
}
?>

<div class="research-project-card p-2 w-full not-prose md:w-1/3 item <?php echo esc_attr( $project_slug_list ); ?>">
	<div class="h-full px-6 py-4 mb-4 overflow-hidden bg-white border rounded-lg shadow-sm border-grey-light">
		
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="h-64 mb-4">
			<?php
				the_post_thumbnail(
					'large',
					array(
						'class' => 'object-cover object-top w-full h-full rounded',
						'alt'   => the_title_attribute( array( 'echo' => false ) ),
					)
				);
			?>
			</div>
		<?php endif; ?>

		<h3 class="my-2 text-2xl font-bold font-heavy">
			<a href="<?php echo esc_url( get_permalink() ); ?>" class="text-blue hover:underline">
				<?php the_title(); ?>
			</a>
		</h3>

		<div class="flex flex-col gap-2">
			<?php
			$associate_name = get_post_meta( get_the_ID(), 'ecpt_associate_name', true );
			$project_dates  = get_post_meta( get_the_ID(), 'ecpt_dates', true );

			if ( ! empty( $associate_name ) || ! empty( $project_dates ) ) :
				?>
				<ul class="p-0 m-0 list-none">
					<?php if ( ! empty( $associate_name ) ) : ?>
						<li><strong class="font-bold font-heavy"><?php echo esc_html( $associate_name ); ?></strong></li>
					<?php endif; ?>
					<?php if ( ! empty( $project_dates ) ) : ?>
						<li><strong class="font-bold font-heavy"><?php echo esc_html( $project_dates ); ?></strong></li>
					<?php endif; ?>
				</ul>
			<?php endif; ?>

			<?php if ( get_field( 'keywords' ) ) : ?>
				<span class="hidden">
					<?php echo esc_html( get_field( 'keywords' ) ); ?>
				</span>
			<?php endif; ?>

			<div class="text-lg leading-relaxed">
				<?php the_excerpt(); ?>
			</div>
		</div>
	</div>
</div>