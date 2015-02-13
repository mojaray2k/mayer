<?php
/**
 * The single post template file.
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

				<?php while ( have_posts() ) { ?>
					<?php the_post(); ?>
					<div <?php post_class(); ?>>

						<h1 class="post-title entry-title">
							<?php the_title(); ?>
						</h1><!-- .post-title -->

						<?php get_template_part( 'partials/post-meta' ); ?>

						<div class="post-content">
							<?php the_content( __( 'Read More', 'mayer' ) ); ?>
						</div><!-- .post-content -->

						<?php if ( mayer_is_paginated_post() ) { ?>
							<?php get_template_part( 'partials/post-pagination' ); ?>
						<?php } ?>

						<?php comments_template(); ?>

						<?php get_template_part( 'partials/pagination' ); ?>

					</div><!-- .single -->
				<?php } ?>
			</main><!-- #main -->

			<?php if ( ! is_rtl() && ! mayer_has_left_sidebar() ) { ?>
				<?php get_sidebar(); ?>
			<?php } ?>

		</div><!-- #primary -->
	</div><!-- /#primary-wrapper -->

<?php get_footer(); ?>