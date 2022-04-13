<?php
/**
 * Part template
 *
 * @package productive-business
 */

?>
<?php

// fetch user defined background.
$thumbnail_image = '';
$thumbnail_image_object = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
if ( ! $thumbnail_image_object ) {
	$thumbnail_image_object = get_theme_mod( 'homepage_usp_image' );
}
if ( $thumbnail_image_object ) {

	$thumbnail_image_theme_mod_array = wp_get_attachment_image_src( $thumbnail_image_object, 'full' );

	if ( $thumbnail_image_theme_mod_array ) {
		$thumbnail_image = $thumbnail_image_theme_mod_array[0];
	} else {
		$thumbnail_image = PROMINDSONE_HOMEPAGE_USP_IMAGE_REMOTE;
	}
} else {
	$thumbnail_image = PROMINDSONE_HOMEPAGE_USP_IMAGE_REMOTE;
}

$is_homepage_usp_scroll = get_theme_mod( 'is_homepage_usp_scroll', false );
$parallax = '';
if ( ! $is_homepage_usp_scroll ) {
	$parallax = 'parallax';
}

?>

<?php
// start hero widget.
if ( is_active_sidebar( 'homepage_hero_widget' ) ) {
	?>
					
		<?php
		// start homepage hero sidebar widget.
		do_action( 'display_homepage_hero_widget', 'homepage_hero_widget' );
		?>
			<?php // end of homepage hero sidebar widget. ?>
		
	<?php } else { // end hero widget. ?>
	 
	 <div class="promindsone_hero_container <?php echo esc_html( $parallax ); ?>"  style="background-image: url(<?php echo esc_html( $thumbnail_image ); ?>)">
		<div class="promindsone_hero_container_content">
		
		<div class="promindsone_hero_container_content_text top">
			<?php echo wp_kses_post( get_the_archive_title() ); ?>
		</div>
			
		</div>
	</div>
<?php } // end top part. ?>
