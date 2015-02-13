<?php
/**
 * The template for displaying the pagination link to return the user to the
 * post parent of the given attachment.
 *
 * @package    Mayer
 * @since      1.0.0
 */
?>
<div id="pagination" class="container">
	<ul class="pager">
		<li>
			<a href="<?php echo esc_url( get_permalink( $post->post_parent ) ); ?>">
				<i class="fa fa-chevron-up"></i>
				<?php _e( 'Back To Parent Post', 'mayer' ); ?>
			</a>
		</li>
	</ul><!-- .pager -->
</div><!-- #pagination -->