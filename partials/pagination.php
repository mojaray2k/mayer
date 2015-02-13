<?php
/**
 * The main template used for pagination.
 *
 * @package    Mayer
 * @since      1.0.0
 */
global $wp_query;
?>

<div id="pagination" class="col-lg-12">
	<ul class="pager">

	<?php if ( is_single() && 'post' == get_post_type() ) { ?>

		<?php if( get_previous_post() ) { ?>
			<li class="previous single-previous">
				<?php previous_post_link( '%link', '<span class="nav-previous"><i class="fa fa-chevron-left"></i>&nbsp;%title</span>' ); ?>
			</li><!-- .previous -->
		<?php } ?>

		<?php if( get_next_post() ) { ?>
			<li class="next single-next">
				<?php next_post_link( '%link', '<span class="nav-next">%title&nbsp;<i class="fa fa-chevron-right"></i></span>' ); ?>
			</li><!-- .next -->
		<?php } ?>

	<?php } elseif ( 1 < $wp_query->max_num_pages && ( is_home() || is_archive() || is_search() ) ) { ?>

		<?php if( class_exists( 'PageNavi_Core' ) ) { ?>
			<?php wp_pagenavi(); ?>
		<?php } else { ?>

			<?php if ( get_next_posts_link() ) { ?>
				<li class="previous archive-previous">
					<?php next_posts_link( '<span class="nav-previous"><i class="fa fa-chevron-left"></i>&nbsp;' . __( 'Older Posts', 'mayer' ) . '</span>' ); ?>
				</li><!-- .previous -->
			<?php } ?>

			<?php if ( get_previous_posts_link() ) { ?>
				<li class="next archive-next">
					<?php previous_posts_link( '<span class="nav-next">' . __( 'Newer Posts', 'mayer' ) . '&nbsp;<i class="fa fa-chevron-right"></i></span>' ); ?>
				</li><!-- .next -->
			<?php } ?>

		<?php } ?>

	<?php } ?>

	</ul><!-- .pager -->
</div><!-- #pagination -->