<ul id="social-icons" class="list-inline nav nav-pills pull-right">

	<?php $visibility = ( '' === trim( get_theme_mod( 'mayer_twitter_username' ) ) ) ? 'hidden' : '' ?>
	<li id="twitter" class="<?php echo $visibility; ?>">
		<a href="<?php echo esc_url( 'http://twitter.com/' . get_theme_mod( 'mayer_twitter_username' ) ); ?>/" title="Twitter">
			<i class="fa fa-twitter fa-stack-1x"></i>
		</a>
	</li><!-- #twitter -->

	<?php $visibility = ( '' === trim( get_theme_mod( 'mayer_facebook_url' ) ) ) ? 'hidden' : '' ?>
	<li id="facebook" class="<?php echo $visibility; ?>">
		<a href="<?php echo esc_url( get_theme_mod( 'mayer_facebook_url' ) ); ?>" title="Facebook">
			<i class="fa fa-facebook fa-stack-1x"></i>
		</a>
	</li><!-- #facebook -->

	<?php $visibility = ( '' === trim( get_theme_mod( 'mayer_pinterest_url' ) ) ) ? 'hidden' : '' ?>
	<li id="pinterest" class="<?php echo $visibility; ?>">
		<a href="<?php echo esc_url( get_theme_mod( 'mayer_pinterest_url' ) ); ?>" title="Pinterest">
			<i class="fa fa-pinterest fa-stack-1x"></i>
		</a>
	</li><!-- #google-plus -->

	<?php $visibility = ( '' === trim( get_theme_mod( 'mayer_googleplus_url' ) ) ) ? 'hidden' : '' ?>
	<li id="google-plus" class="<?php echo $visibility; ?>">
		<a href="<?php echo esc_url( get_theme_mod( 'mayer_googleplus_url' ) ); ?>?rel=author" title="Google Plus">
			<i class="fa fa-google-plus fa-stack-1x"></i>
		</a>
	</li><!-- #google-plus -->

	<?php $visibility = ( '' === trim( get_theme_mod( 'mayer_linkedin_url' ) ) ) ? 'hidden' : '' ?>
	<li id="linkedin" class="<?php echo $visibility; ?>">
		<a href="<?php echo esc_url( get_theme_mod( 'mayer_linkedin_url' ) ); ?>" title="LinkedIn">
			<i class="fa fa-linkedin fa-stack-1x"></i>
		</a>
	</li><!-- #linkedin -->

	<?php $visibility = ( '' === trim( get_theme_mod( 'mayer_email_address' ) ) ) ? 'hidden' : '' ?>
	<li id="email-address" class="<?php echo $visibility; ?>">
		<?php if ( mayer_is_email_address( get_theme_mod( 'mayer_email_address' ) ) ) { ?>
			<a href="mailto:<?php echo esc_attr( get_theme_mod( 'mayer_email_address' ) ); ?>" title="Email">
				<i class="fa fa-envelope fa-stack-1x"></i>
			</a>
		<?php } else { ?>
			<a href="<?php echo esc_url( get_theme_mod( 'mayer_email_address' ) ); ?>" title="Email">
				<i class="fa fa-envelope fa-stack-1x"></i>
			</a>
		<?php } ?>
	</li><!-- #email-address -->

</ul><!-- #social-icons -->