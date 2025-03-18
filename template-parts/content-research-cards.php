<?php
/**
 * Template part for displaying research projects cards
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

?>

<?php
$program_types = get_the_terms( $post->ID, 'project_type' );
if ( ! empty( $program_types ) ) {
	if ( $program_types && ! is_wp_error( $program_types ) ) :
		$program_type_names = array();
		foreach ( $program_types as $program_type ) {
			$program_type_names[] = $program_type->slug;
		}
		$program_type_name = join( ' ', $program_type_names );
	endif;
}
?>
<div class="research-project-card p-2 w-full not-prose md:w-1/3 item
<?php
if ( ! empty( $program_types ) ) {
	echo esc_html( $program_type_name );
}
?>
">
	<div class="h-full rounded-lg overflow-hidden field mb-4 px-6 py-4 bg-white research-project-card-outline">
		
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="h-64">
			<?php
				the_post_thumbnail(
					'large',
					array(
						'class' => 'object-cover object-top w-full h-full',
						'alt'   => the_title_attribute(
							array(
								'echo' => false,
							)
						),
					)
				);
				?>
			</div>
		<?php endif; ?>

		<h3 class="font-heavy font-bold my-2 text-2xl">
			<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
		</h3>
		<div class="flex items-center flex-wrap ">
		<?php if ( ! empty( get_post_meta( $post->ID, 'ecpt_associate_name', true ) ) ) : ?>
			<ul>
			<?php if ( get_post_meta( $post->ID, 'ecpt_associate_name', true ) ) : ?>
				<li><strong><?php echo esc_html( get_post_meta( $post->ID, 'ecpt_associate_name', true ) ); ?></strong></li>
			<?php endif; ?>
			<?php if ( get_post_meta( $post->ID, 'ecpt_dates', true ) ) : ?>
				<li><strong><?php echo esc_html( get_post_meta( $post->ID, 'ecpt_dates', true ) ); ?></strong></li>
			<?php endif; ?>
			</ul>
		<?php endif; ?>
		<?php
		if ( get_field( 'keywords' ) ) :
			?>
			<span class="hidden">
				<?php the_field( 'keywords' ); ?>
			</span>
		<?php endif; ?>
			<?php the_excerpt(); ?>
		</div>
	</div>
</div>
