<?php
/**
 * The custom search results template. Used to display the search form whenever
 * `get_search_form()` is called.
 *
 * Note that the query is read using `get_search_query()` and then populates the value of
 * the input when rendered.
 *
 * @package    Mayer
 * @since      1.0.0
 */
?>
<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="form-group">
		<?php $search_query = strlen( get_search_query() ) == 0 ? '' : get_search_query(); ?>
		<input placeholder="<?php esc_attr_e( 'Search...', 'mayer' ); ?>" type="text" value="<?php echo esc_attr( $search_query ); ?>" name="s" id="s" class="form-control" />
	</div><!-- .form-group -->
</form><!-- #searchform -->