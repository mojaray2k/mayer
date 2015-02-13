<?php $visibility = ( '' === trim( get_theme_mod( 'mayer_display_gravatar' ) ) ) ? 'hidden' : '' ?>
<div id="avatar" class="col-lg-2 col-md-2 col-sm-12 col-xs-12 <?php echo $visibility; ?>">
	<a href="<?php echo esc_url( home_url() ); ?>" title="<?php bloginfo( 'title' ); ?>">
		<?php echo mayer_get_gravatar(); ?>
	</a>
</div><!-- #avatar -->