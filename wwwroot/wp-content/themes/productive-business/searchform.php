<?php
/**
 * Search form.
 *
 * @package    productive-business
 */

$search_unique_id1 = promindsone_get_unique_id( 'search_form' );
$search_unique_id2 = promindsone_get_unique_id( 'search_form' );
?>
<form class="searchform search-form" role="search" method="get" id="<?php echo esc_html( $search_unique_id1 ); ?>" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div clas="searchform-inner">
		<input class="search-field" placeholder="<?php echo esc_attr_e( 'Search...', 'productive-business' ); ?>" type="search" name="s" id="<?php echo esc_html( $search_unique_id2 ); ?>" value="<?php echo get_search_query(); ?>"/>
		<button class="searchsubmit" type="submit" value="" >
			<i class="material-icons-round search-button">search</i>
		</button>
	</div>
</form>
