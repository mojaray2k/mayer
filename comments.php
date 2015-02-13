<?php
/**
 * The main template for displaying comments.
 *
 * @package    Mayer
 * @since      1.0.0
 */
?>

<?php if ( ! post_password_required( get_the_ID() ) ) { ?>

	<div id="comments">

		<?php if ( mayer_post_has_comments( get_the_ID(), 'comment' ) ) { ?>

			<h3>
				<?php
					printf(
						_n(
							'One Comment', '%1$s Comments', get_comments_number(),
							'mayer'
						),
						number_format_i18n( get_comments_number() )
					);
				?>
			</h3>

			<div class="response-list">
			<?php
				wp_list_comments(
					array(
						'type'       => 'comment',
						'callback'   => 'mayer_comment',
						'avatar_size'=> 100
					)
				);
			?>
			</div><!-- .comment-list -->

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>
				<div id="comment-pagination" class="col-lg-12">
					<ul class="pager">
						<li class="previous">
							<?php previous_comments_link( '<i class="fa fa-chevron-left"></i> ' . __( 'Older Comments', 'mayer' ) ); ?>
						</li><!-- .previous -->
						<li class="next">
							<?php next_comments_link( __( 'Newer Comments ', 'mayer' ) . '<i class="fa fa-chevron-right"></i>' ); ?>
						</li><!-- .next -->
					</ul><!-- .pager -->
				</div><!-- #comment-pagination -->
			<?php } ?>

		<?php } ?>

		<?php if ( mayer_post_has_comments( get_the_ID(), 'pings' ) ) { ?>

			<h3><?php _e( 'Trackbacks and Pingbacks', 'mayer' ); ?></h3>

			<div class="response-list">
			<?php
				wp_list_comments(
					array(
						'type'       => 'pings',
						'callback'   => 'mayer_pings',
					)
				);
			?>
			</div><!-- .ping-list -->

		<?php } ?>

		<?php if ( comments_open() && 0 == get_comment_count( get_the_ID() ) ) { ?>
			<div id="no-responses">
				<h3><?php _e( 'No Comments', 'mayer' ); ?></h3>
				<p><?php _e( 'There are no comments for this post.', 'mayer' ); ?></p>
			</div><!-- #no-responses -->
		<?php } ?>

		<?php mayer_comment_form(); ?>

	</div><!-- #comments -->

<?php } ?>