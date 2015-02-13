<?php
/**
 * The main template file.
 *
 * @package    Mayer
 * @since      1.0.0
 */
?>
<?php get_header(); ?>

	<div id="primary-wrapper">
		<div id="primary" class="container">

			<?php if ( is_rtl() || mayer_has_left_sidebar() ) { ?>
				<?php get_sidebar(); ?>
			<?php } ?>

			<main id="main" class="site-main col-lg-8 col-md-8" role="main">
			<?php if ( have_posts() ) {

				while ( have_posts() ) {

					the_post();
					get_template_part( 'content' );

				}

				// If this is a page, then we won't show the pager.
				if ( ! is_page() ) {
					get_template_part( 'partials/pagination' );
				}

			} else {

				get_template_part( 'partials/no-content' );

			}

			?>
			</main><!-- #main -->

			<?php if ( ! is_rtl() && ! mayer_has_left_sidebar() ) { ?>
				<?php get_sidebar(); ?>
			<?php } ?>

		</div><!-- #primary -->

	</div><!-- /#primary-wrapper -->

<?php get_footer(); ?>