<?php
/**
 * The partial used to render post meta data.
 *
 * @package    Mayer
 * @since      1.0.0
 */
?>

<p class="post-meta">

	<span class="post-author-meta">
		<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="post-author" rel="author">
			<?php the_author_meta( 'display_name' ); ?>
		</a>
	</span><!-- .post-author-meta -->

	<span class="post-updated-meta">
		&middot;
		<a href="<?php the_permalink(); ?>" class="updated"><?php the_time( get_option( 'date_format' ) ); ?></a>
	</span><!-- .updated-meta -->

	<?php if ( ! is_attachment() ) { ?>

		<span class="post-category-meta">
			&middot;
			<?php the_category( ', ', 'single' ); ?>
		</span><!-- .category-meta -->

		<?php if ( '' != get_the_tags() ) { ?>
			<span class="post-tag-meta">
				&middot;
				<?php the_tags( '' ); ?>
			</span><!-- tag-meta -->
		<?php } ?>

		<?php if ( comments_open() || pings_open() ) { ?>
			<span class="post-comment-link-meta">
				&middot;
				<a href="<?php comments_link(); ?>">
					<?php comments_number( 'No Comments', 'One Comment', '%  Comments' ); ?>
				</a>
			</span><!-- .comment-link-meta -->
		<?php } ?>

		<?php if ( ! is_single() && current_user_can( 'manage_options' ) ) { ?>
			<span class="post-edit-link-meta">
				&middot;
				<?php edit_post_link( __( 'Edit', 'mayer' ) ); ?>
			</span><!-- .comment-link-meta -->
		<?php } ?>

	<?php }  ?>

</p><!-- .post-meta -->