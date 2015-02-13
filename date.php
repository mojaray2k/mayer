<?php
/**
 * The date/time template. Used when a date or time is queried. Year, month, day, hour, minute, second.
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

				<div class="archive-header">
					<h4><<?php printf( __( 'Archives For %s', 'mayer' ), mayer_get_the_time() ); ?></h4>
				</div><!-- .archive-header -->

				<?php while( have_posts() ) { ?>
					<?php the_post(); ?>
					<div <?php post_class(); ?>>

						<h2 class="post-title entry-title">
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</h2><!-- .post-title -->

						<?php get_template_part( 'partials/post-meta' ); ?>

						<div class="post-content">
							<?php if ( has_excerpt() ) { ?>
								<?php the_excerpt(); ?>
							<?php } else { ?>
								<?php the_content( __( 'Read More', 'mayer' ) ); ?>
							<?php } ?>
						</div><!-- .post-content -->

						<?php if ( mayer_is_paginated_post() ) { ?>
							<?php get_template_part( 'partials/post-pagination' ); ?>
						<?php } ?>

					</div><!-- div -->

				<?php } ?>

				<?php get_template_part( 'partials/pagination' ); ?>

			</main><!-- #main -->

			<?php if ( ! is_rtl() && ! mayer_has_left_sidebar() ) { ?>
				<?php get_sidebar(); ?>
			<?php } ?>

		</div><!-- #primary -->

	</div><!-- /#primary-wrapper -->

<?php get_footer(); ?>