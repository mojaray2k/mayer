<?php
/**
 * The template for displaying the footer.
 *
 * Displays the closing #content element, the #footer-wrapper, and `wp_footer`.
 *
 * @package    Mayer
 * @since      1.0.0
 */
?>

	<div id="footer-wrapper">
			<div class="container">
				<div class="navigation row">
					<div id="mayer-back-to-top" class="col-lg-12">
						<a href="#top"><?php _e( 'Back To Top', 'mayer' ); ?></a>
					</div><!-- #mayer-back-to-top -->
				</div><!-- .navigation -->
			</div><!-- .container -->
		</div><!-- #footer-wrapper -->

		<div id="credit">
			<div class="container">
				<?php if ( '1' == get_theme_mod( 'mayer_display_footer_social_icons' ) ) { ?>
					<div class="row">
						<div id="social-icons-footer">
							<?php get_template_part( 'partials/social-icons' ); ?>
						</div><!-- #social-icons-footer -->
					</div><!-- #social-icons-footer -->
				<?php } ?>
				<div class="row">
					<div class="col-lg-12">
						<p>
							<a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'mayer' ); ?>" rel="generator">
								<?php printf( __( 'Proudly powered by %s', 'mayer' ), 'WordPress' ); ?>
							</a>
							<span class="sep"> &middot; </span>
							<?php printf( __( 'Theme: %1$s by %2$s.', 'mayer' ), 'Mayer', '<a href="https://wordpress.com/themes/by/pressware/" rel="designer">Pressware</a>' ); ?>
						</p>
					</div><!-- .col-lg-12 -->
				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- #credit -->

		<?php wp_footer(); ?>
	</body>
</html>
