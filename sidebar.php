<?php
/**
 * The main template for displaying the sidebar.
 *
 * @package    Mayer
 * @since      1.0.0
 */
?>

<?php if ( is_active_sidebar( 'sidebar-0' ) ) { ?>

	<?php do_action( 'before_sidebar' ); ?>

	<div id="sidebar" class="col-lg-4 col-md-4">
		<?php dynamic_sidebar( 'sidebar-0' ); ?>
	</div><!-- #sidebar -->

<?php } ?>