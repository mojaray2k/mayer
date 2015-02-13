<?php
/**
 * The page template. Used when an individual page is queried.
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

				<?php while ( have_posts() ) { ?>
					<?php the_post(); ?>
					<div <?php post_class(); ?>>

						<h1 class="page-title entry-title">
							<?php the_title(); ?>
						</h1><!-- .post-title -->

						<div class="post-content">
							<?php the_content( __( 'Read More', 'mayer' ) ); ?>
						</div><!-- .post-content -->

						<?php comments_template(); ?>

					</div><!-- .col-lg-8 -->
				<?php } ?>

			</main><!-- #main -->

			<?php if ( ! is_rtl() && ! mayer_has_left_sidebar() ) { ?>
				<?php get_sidebar(); ?>
			<?php }  ?>

		</div><!-- #primary -->
	</div><!-- /#primary-wrapper -->

<?php get_footer(); ?>