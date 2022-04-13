<?php
/**
 * Part template
 *
 * @package productive-business
 */

?>
<?php

$homepage_usp_textarea_1 = esc_textarea( get_theme_mod( 'homepage_usp_textarea_1', PROMINDSONE_THEME_DISPLAY_NAME ) );
$homepage_usp_textarea_2 = esc_textarea( get_theme_mod( 'homepage_usp_textarea_2', PROMINDSONE_THEME_DISPLAY_DESC ) );


// fetch user defined background.
$homepage_usp_image = '';
$homepage_usp_image_theme_mod_object = get_theme_mod( 'homepage_usp_image', false );
if ( $homepage_usp_image_theme_mod_object ) {

	$homepage_usp_image_theme_mod_array = wp_get_attachment_image_src( $homepage_usp_image_theme_mod_object, 'full' );

	if ( $homepage_usp_image_theme_mod_array ) {
		$homepage_usp_image = $homepage_usp_image_theme_mod_array[0];
	} else {
		$homepage_usp_image = PROMINDSONE_HOMEPAGE_USP_IMAGE_REMOTE;
	}
} else {
	$homepage_usp_image = PROMINDSONE_HOMEPAGE_USP_IMAGE_REMOTE;
}

$is_homepage_usp_scroll = get_theme_mod( 'is_homepage_usp_scroll', false );
$parallax = '';
if ( ! $is_homepage_usp_scroll ) {
	$parallax = 'parallax';
}

$homepage_page = '';
if ( is_home() ) {
	$homepage_page = ' home ';
}

?>

<?php
if ( is_active_sidebar( 'homepage_hero_widget' ) ) {
	?>
					
		<?php
		// start homepage hero sidebar widget.
		do_action( 'display_homepage_hero_widget', 'homepage_hero_widget' );
		?>
			<?php // end of homepage hero sidebar widget. ?>
		
	<?php } else { // end hero widget. ?>
	 
	 <div class="promindsone_hero_container <?php echo esc_attr( $homepage_page ); ?> <?php echo esc_attr( $parallax ); ?>"  style="background-image: url(<?php echo esc_url( $homepage_usp_image ); ?>)">
		<div class="promindsone_hero_container_content">
			
			
			<?php if ( is_home() ) { ?>
				
				<div class="promindsone_hero_container_content_text top">
					<?php 
					if ( PROMINDSONE_THEME_DISPLAY_NAME != $homepage_usp_textarea_1 ) {
					  echo esc_html( $homepage_usp_textarea_1 );
					} else {
					    bloginfo( 'name' );
					}
					?>
				</div>
								
				<div class="clear_min"></div>
				
				<div class="promindsone_hero_container_content_text bottom">
					<?php 
					if ( PROMINDSONE_THEME_DISPLAY_DESC != $homepage_usp_textarea_2 ) {
					    echo esc_html( $homepage_usp_textarea_2 );
					} else {
					    bloginfo( 'description' );
					}
					?>
				</div>
				
			<?php } else { ?>
				<div class="promindsone_hero_container_content_text top">
					<?php echo wp_kses_post( get_the_archive_title() ); ?>
				</div>
			<?php } ?>
			
		</div>
	</div>
<?php } // end top part. ?>

<div class="site-container">
	
	<?php
	// homepage top sidebar widget.
		  do_action( 'display_homepage_content_widget_top', 'homepage_content_widget_top' );
	?>
	  
		
	<?php get_template_part( 'template-parts/page-part-index-loop' ); ?>
	
		
	<?php
	// homepage bottom sidebar widget.
	   do_action( 'display_homepage_content_widget_bottom', 'homepage_content_widget_bottom' );
	?>
	 
	
</div>
	   
