<?php
/**
 * The 404 "Not Found" template. Used when WordPress cannot find a post or page that matches the query.
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

				<?php if ( function_exists( 'yoast_breadcrumb' ) ) { ?>
					<?php yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' ); ?>
				<?php } ?>

				<?php get_template_part( 'partials/no-content' ); ?>

			</main><!-- #main -->

			<?php if ( ! is_rtl() && ! mayer_has_left_sidebar() ) { ?>
				<?php get_sidebar(); ?>
			<?php } ?>

		</div><!-- #primary -->
	</div><!-- /#primary-wrapper -->

<?php get_footer(); ?>