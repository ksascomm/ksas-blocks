<?php
/**
 * Template part for displaying People CPT with 'ecpt_bio' in
 * people-direcory.php and single-people.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'people py-4 ml-4' ); ?>>
	<div class="flex flex-wrap lg:flex-nowrap">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="flex-none pr-4 headshot">
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
			</div>
		<?php endif; ?>
		<div class="grow contact-info">
			<h3 class="font-heavy font-bold text-3xl! leading-9">
			<?php if ( is_singular( 'people' ) ) : ?> 
				<?php the_title(); ?> 
				<?php if ( get_post_meta( $post->ID, 'ecpt_pronoun', true ) ) : ?>
					<small>(<?php echo wp_kses_post( get_post_meta( $post->ID, 'ecpt_pronoun', true ) ); ?>)</small>
				<?php endif; ?>
			<?php else : ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>'s webpage">
					<?php the_title(); ?>
				</a>
				<?php if ( get_post_meta( $post->ID, 'ecpt_pronoun', true ) ) : ?>
					<small>(<?php echo wp_kses_post( get_post_meta( $post->ID, 'ecpt_pronoun', true ) ); ?>)</small>
				<?php endif; ?>
			<?php endif; ?>
			</h3>

			<?php if ( get_post_meta( $post->ID, 'ecpt_position', true ) ) : ?>
				<div class="position"><p class="pr-2 text-xl leading-normal"><?php echo wp_kses_post( get_post_meta( $post->ID, 'ecpt_position', true ) ); ?></p></div>
			<?php endif; ?>

			<h3 class="sr-only">Contact Information</h3>

			<ul class="not-prose">
			<?php
			if ( get_post_meta( $post->ID, 'ecpt_email', true ) ) :
				$email = get_post_meta( $post->ID, 'ecpt_email', true );
				?>
					<li class="text-xl"><span class="fa-solid fa-envelope" aria-hidden="true"></span>
						<a class="text-blue" href="<?php echo esc_url( 'mailto:' . antispambot( $email ) ); ?>">
					<?php echo esc_html( $email ); ?>
						</a>
					</li>
				<?php endif; ?>
				<?php if ( get_field( 'ecpt_cv' ) ) : ?>
					<li class="text-xl"><span class="fa-solid fa-file-pdf" aria-hidden="true"></span> <a class="text-blue" href="<?php echo wp_kses_post( the_field( 'ecpt_cv' ) ); ?>">Curriculum Vitae</a></li>
				<?php endif; ?>
				<?php
				$file = get_field( 'cv_file' );
				if ( $file ) :
					?>
					<li class="text-xl"><span class="fa-solid fa-file-pdf" aria-hidden="true"></span> <a class="text-blue" href="<?php echo esc_url( $file['url'] ); ?>">Curriculum Vitae</a></li>
				<?php endif; ?>
				<?php if ( get_post_meta( $post->ID, 'ecpt_office', true ) ) : ?>
					<li class="text-xl"><span class="fa-solid fa-location-dot" aria-hidden="true"></span> <?php echo esc_html( get_post_meta( $post->ID, 'ecpt_office', true ) ); ?></li>
				<?php endif; ?>

				<?php if ( get_post_meta( $post->ID, 'ecpt_phone', true ) ) : ?>
					<li class="text-xl"><span class="fa-solid fa-phone-office" aria-hidden="true"></span> <?php echo esc_html( get_post_meta( $post->ID, 'ecpt_phone', true ) ); ?></li>
				<?php endif; ?>

				<?php if ( get_post_meta( $post->ID, 'ecpt_lab_website', true ) ) : ?>
					<li class="text-xl"><span class="fa-solid fa-earth-americas"></span> <a class="text-blue" href="<?php echo esc_url( get_post_meta( $post->ID, 'ecpt_lab_website', true ) ); ?>" aria-label="<?php the_title(); ?>'s Group/Lab Website">Group/Lab Website</a></li>
				<?php endif; ?>

			</ul>

			<?php if ( get_post_meta( $post->ID, 'ecpt_expertise', true ) ) : ?>
				<p class="leading-normal pr-2 text-xl my-3!"><strong class="font-bold font-heavy">Research Interests:&nbsp;</strong><?php echo esc_html( get_post_meta( $post->ID, 'ecpt_expertise', true ) ); ?></p>
			<?php endif; ?>
			<?php if ( get_post_meta( $post->ID, 'ecpt_degrees', true ) ) : ?>
				<p class="leading-normal pr-2 text-xl my-3!"><strong class="font-bold font-heavy">Education:&nbsp;</strong><?php echo wp_kses_post( get_post_meta( $post->ID, 'ecpt_degrees', true ) ); ?></p>
			<?php endif; ?>
		</div>
	</div>
	<?php
	if ( is_singular( 'people' ) ) :
		?>
		<?php if ( get_post_meta( $post->ID, 'ecpt_bio', true ) ) : ?>
		<div class="my-4 tabbed">
			<ul>
			<?php if ( get_post_meta( $post->ID, 'ecpt_bio', true ) ) : ?>
				<li>
				<a href="#section1">Biography</a>
				</li>
			<?php endif; ?>
			<?php if ( get_post_meta( $post->ID, 'ecpt_research', true ) ) : ?>
				<li>
				<a href="#section2">Research</a>
				</li>
			<?php endif; ?>
			<?php if ( get_post_meta( $post->ID, 'ecpt_teaching', true ) ) : ?>
				<li>
				<a href="#section3">Teaching</a>
				</li>
			<?php endif; ?>
			<?php if ( get_post_meta( $post->ID, 'ecpt_publications', true ) ) : ?>
				<li>
				<a href="#section4">Publications</a>
				</li>
			<?php endif; ?>
			<?php
			if ( get_post_meta( $post->ID, 'ecpt_books_cond', true ) == 'on' ) :
				?>
				<li>
				<a href="#section5">Faculty Books</a>
				</li>
			<?php endif; ?>
			<?php if ( get_post_meta( $post->ID, 'ecpt_extra_tab_title', true ) ) : ?>
				<li><a href="#section6"><?php echo wp_kses_post( get_post_meta( $post->ID, 'ecpt_extra_tab_title', true ) ); ?></a></li>
			<?php endif; ?>
			<?php if ( get_post_meta( $post->ID, 'ecpt_extra_tab_title2', true ) ) : ?>
				<li><a href="#section7"><?php echo wp_kses_post( get_post_meta( $post->ID, 'ecpt_extra_tab_title2', true ) ); ?></a></li>
			<?php endif; ?>
			</ul>
			<?php if ( get_post_meta( $post->ID, 'ecpt_bio', true ) ) : ?>
			<section class="section-content" id="section1">
					<?php echo wp_kses_post( get_post_meta( $post->ID, 'ecpt_bio', true ) ); ?>
			</section>
			<?php endif; ?>
			<?php if ( get_post_meta( $post->ID, 'ecpt_research', true ) ) : ?>
			<section class="section-content" id="section2">
					<?php echo wp_kses_post( get_post_meta( $post->ID, 'ecpt_research', true ) ); ?>
			</section>
			<?php endif; ?>
			<?php if ( get_post_meta( $post->ID, 'ecpt_teaching', true ) ) : ?>
			<section class="section-content" id="section3">
					<?php echo wp_kses_post( get_post_meta( $post->ID, 'ecpt_teaching', true ) ); ?>
			</section>
			<?php endif; ?>
			<?php if ( get_post_meta( $post->ID, 'ecpt_publications', true ) ) : ?>
			<section class="section-content" id="section4">
					<?php echo wp_kses_post( get_post_meta( $post->ID, 'ecpt_publications', true ) ); ?>
			</section>
			<?php endif; ?>
				<?php if ( get_post_meta( $post->ID, 'ecpt_extra_tab', true ) ) : ?>
			<section class="section-content" id="section6">
					<?php echo apply_filters( 'the_content', wp_kses_post( get_post_meta( $post->ID, 'ecpt_extra_tab', true ) ) ); ?>
			</section>
			<?php endif; ?>

				<?php if ( get_post_meta( $post->ID, 'ecpt_extra_tab2', true ) ) : ?>
			<section class="section-content" id="section7">
					<?php echo apply_filters( 'the_content', wp_kses_post( get_post_meta( $post->ID, 'ecpt_extra_tab2', true ) ) ); ?>
			</section>
			<?php endif; ?>
		</div>
		<?php endif; ?>
	<?php endif; ?>
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
