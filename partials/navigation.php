<?php
/**
 * The template for displaying the navigation menu rendered in both the `header`
 * and in the `footer` templates.
 *
 * @package    Mayer
 * @since      1.0.0
 */
?>
<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
	<?php
		wp_nav_menu(
			array(
				'theme_location' => 'main',
				'container'      => '',
				'menu_class'     => 'nav nav-pills',
				'fallback_cb'    => 'mayer_default_menu',
				'walker'         => new Mayer_Nav_Walker()
			)
		);
	?>
</nav><!-- #navigation -->