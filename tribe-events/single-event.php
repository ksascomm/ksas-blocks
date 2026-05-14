<?php
/**
 * Single Event Template (Legacy Path)
 *
 * Path: [your-theme]/tribe-events/single-event.php
 *
 * @package KSAS_Blocks
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$event_id              = get_the_ID();
$events_label_singular = tribe_get_event_label_singular();
$events_label_plural   = tribe_get_event_label_plural();
?>

<div id="tribe-events-content" class="tribe-events-single px-6 pb-12 lg:px-14 2xl:px-[2%]">
	
	<!-- Notices: Replaced $this->template with global function -->
	<?php tribe_the_notices(); ?>

	<header class="block! entry-header mb-8">
		<h1 class="mt-6! mb-8! lg:text-4xl! font-bold! entry-title"><?php the_title(); ?></h1>
		<div class="my-4! text-xl font-bold tribe-events-schedule text-grey-darkest font-heavy">
			<?php
			/**
			 * Function tribe_events_event_schedule_details() returns trusted HTML for event timing.
			 */
			//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo tribe_events_event_schedule_details();
			?>
		</div>
	</header>

	<div class="prose entry-content lg:prose-lg max-w-none">
		<!-- Content: Standard WordPress call works best here -->
		<?php the_content(); ?>
	</div>

	<div class="pt-6! mt-12!">
		<!-- Meta: Replaced $this->template with standard legacy include -->
		<?php tribe_get_template_part( 'modules/meta' ); ?>
	</div>
	<!-- Event footer -->
	<div id="tribe-events-footer" class="mt-4!">
		<!-- Navigation -->
		<nav class="tribe-events-nav-pagination" aria-label="
			<?php
			/* translators: %s: The singular label for an event, usually 'Event'. */
			printf( esc_html__( '%s Navigation', 'ksas-office' ), esc_html( $events_label_singular ) );
			?>
		">
			<ul class="tribe-events-sub-nav">
				<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ); ?></li>
				<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ); ?></li>
			</ul>
			<!-- .tribe-events-sub-nav -->
		</nav>
	</div>
	<!-- #tribe-events-footer -->

</div>