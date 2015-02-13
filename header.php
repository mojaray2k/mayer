<?php
/**
 * The template for displaying the header.
 *
 * Displays all of the <head> section, `wp_title`, `wp_head`, the navigation
 * and everything up to div#content.
 *
 * @package    Mayer
 * @since      1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

		<?php do_action( 'before' ); ?>

		<div id="top-navigation-wrapper">
			<div class="container navigation">
				<div class="col-lg-8 col-md-8">
					<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
						<span class="sr-only"><?php _e( 'Toggle Navigation', 'mayer' ); ?></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button><!-- .navbar-toggle -->
					<?php get_template_part( 'partials/navigation' ); ?>
				</div><!-- .col-lg-12 -->
				<div class="col-lg-4 col-md-4 hidden-sm hidden-xs pull-right">
					<div class="container pull-right">
						<?php get_template_part( 'partials/social-icons' ); ?>
					</div><!-- .container -->
				</div><!-- .col-lg-3 -->
			</div><!-- .navigation -->
		</div><!-- /#top-navigation-wrapper -->

		<header id="masthead" role="banner">
			<div class="container">
				<?php if ( is_rtl() ) { ?>
					<?php get_template_part( 'partials/title' ); ?>
					<?php get_template_part( 'partials/avatar' ); ?>
				<?php } else { ?>
					<?php get_template_part( 'partials/avatar' ); ?>
					<?php get_template_part( 'partials/title' ); ?>
				<?php } ?>
			</div><!-- .container -->
		</header><!-- #masthead -->