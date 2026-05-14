<?php
/**
 * Single Event Template (Block Editor Enabled)
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/single-event-blocks.php
 *
 * @package KSAS_Blocks
 * @version 7.7.14
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$event_id     = get_the_ID();
$is_recurring = ( function_exists( 'tribe_is_recurring_event' ) && tribe_is_recurring_event( $event_id ) );
?>


<div id="tribe-events-content" class="tribe-events-single tribe-blocks-editor px-6 pb-12 lg:px-14 2xl:px-[2%]">
	
	<?php $this->template( 'single-event/notices' ); ?>
	
	<header class="block! mb-8! mt-6! entry-header">
		<?php $this->template( 'single-event/title' ); ?>
	</header>

	<?php if ( $is_recurring ) : ?>
		<div class="mb-4 italic tribe-events-recurring-description text-grey-darker">
			<?php $this->template( 'single-event/recurring-description' ); ?>
		</div>
	<?php endif; ?>

	<div class="prose entry-content lg:prose-lg max-w-none">
		<?php $this->template( 'single-event/content' ); ?>
	</div>

	<footer class="pt-6 mt-12 border-t entry-footer border-grey">
		<?php $this->template( 'single-event/comments' ); ?>
		<?php $this->template( 'single-event/footer' ); ?>
	</footer>

</div>
