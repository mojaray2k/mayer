<div id="title" class="col-lg-10 col-md-10 col-sm-12">

	<?php if ( is_front_page() ) {?>

		<a href="<?php echo esc_url( home_url() ); ?>">
			<h1 id="site-title"><?php bloginfo( 'name' ); ?></h1>
		</a>

	<?php } else { ?>

		<a href="<?php echo esc_url( home_url() ); ?>">
			<p id="site-title"><?php bloginfo( 'name' ); ?></p>
		</a>

	<?php } ?>

</div><!-- #title -->
<div id="description" class="col-lg-10 col-md-10 col-sm-12">
	<p id="site-description"><?php bloginfo( 'description' ); ?></p>
</div><!-- #description -->