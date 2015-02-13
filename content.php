<?php
/**
 * The main template for displaying the content.
 *
 * This template is also used to display single post content.
 *
 * @package    Mayer
 * @since      1.0.0
 */
?>

<div <?php post_class(); ?>>

	<?php if ( is_single() ) { ?>

		<h1 class="post-title entry-title">
			<?php the_title(); ?>
		</h1><!-- .post-title -->

	<?php } else { ?>

		<h2 class="post-title entry-title">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h2><!-- .post-title -->

	<?php } ?>

	<?php if ( ! is_page() ) { ?>
		<?php get_template_part( 'partials/post-meta' ); ?>
	<?php } ?>

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

	<?php comments_template(); ?>

</div><!-- post -->