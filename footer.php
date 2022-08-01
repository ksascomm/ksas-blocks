<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package KSAS_Blocks
 */

?>
<?php get_template_part( 'template-parts/footer-widgets' ); ?>
<footer class="site-footer bg-old-black text-white mt-20 border-t-1 border-grey-darkest relative">
	<div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20 
	<?php
	if ( is_active_sidebar( 'sidebar-footer' ) ) :
		?>
		 bg-grey-cool bg-opacity-50 <?php endif; ?>" style="height: 80px" >
		<svg
		alt=""
			class="absolute -bottom-px overflow-hidden"
			xmlns="http://www.w3.org/2000/svg"
			preserveAspectRatio="none"
			version="1.1"
			viewBox="0 0 2560 100"
			x="0"
			y="0"
		>
			<polygon
			class="text-old-black fill-old-black"
			points="2560 0 2560 100 0 100"
			></polygon>
		</svg>
	</div>
	<div class="site-info p-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4">
		<div class="m-2 col-span-4 lg:col-span-1">				
			<a href="https://www.jhu.edu/">
			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/university.shield.svg" class="h-auto w-full sm:w-1/2 sm:mx-auto lg:w-full p-5" alt="JHU shield in the footer">
			</a>	
		</div>
		<div class="col-span-4 lg:col-span-2">
			<ul class="flex m-4 justify-center" role="menu" aria-label="University Policies">
				<li role="menuitem" class="ml-4"><a href="https://accessibility.jhu.edu/">Accessibility</a></li>
				<li role="menuitem" class="ml-4"><a href="https://it.johnshopkins.edu/policies/privacystatement">Privacy Statement</a></li>
			</ul>
		</div>
		<div class="social-media m-4 col-span-4 lg:col-span-1 mx-auto">
			<a href="https://facebook.com/JHUArtsSciences"><span class="fa-brands fa-facebook fa-2x pr-2"></span><span class="sr-only">Facebook</span></a>
			<a href="https://www.instagram.com/JHUArtsSciences/"><span class="fa-brands fa-instagram fa-2x pr-2"></span><span class="sr-only">Instagram</span></a>
			<a href="https://twitter.com/JHUArtsSciences"><span class="fa-brands fa-twitter fa-2x pr-2"></span><span class="sr-only">Twitter</span></a>
			<a href="https://www.youtube.com/user/jhuksas"><span class="fa-brands fa-youtube fa-2x pr-2"></span><span class="sr-only">YouTube</span></a>
			<a href="https://www.tiktok.com/@jhuartssciences"><span class="fa-brands fa-tiktok fa-2x"></span><span class="sr-only pr-2">TikTok</span></a>
		</div>
		<div class="col-span-4 my-2">
			<?php if ( get_field( 'custom_address', 'option' ) ) : ?>
				<div class="text-center">&copy;
					<?php
					echo date_i18n(
						/* translators: Copyright date format, see https://www.php.net/manual/datetime.format.php */
						_x( 'Y', 'copyright date format', 'ksas-blocks' )
					);
					?>
					Johns Hopkins University, <br>Zanvyl Krieger School of Arts & Sciences,
				<?php the_field( 'custom_address', 'option' ); ?>
				</div>
			<?php else : ?>
			<p class="text-center">&copy; <?php print gmdate( 'Y' ); ?> Johns Hopkins University, <br>Zanvyl Krieger School of Arts & Sciences, <br>3400 N. Charles St, Baltimore, MD 21218</p>
			<?php endif; ?>
		</div>
	</div><!-- .site-info -->
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
