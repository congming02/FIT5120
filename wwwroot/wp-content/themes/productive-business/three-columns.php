<?php
/**
 * Template Name: Three-Column Template
 * Template Post Type: post, page
 *
 * @package    productive-business
 */

?>
<?php get_header(); ?>

	<main id="site-content" class="site-content">
	<div class="site-container">
		<div class="flex-content-container">
		
			<?php
			// left sidebar.
				do_action( 'display_sidebar_left', 'flex-content-20' );
			?>
			
			<!-- main content -->
			<div class="flex-content-60">
			<?php get_template_part( 'template-parts/page-part' ); ?>
			</div>
			
			<?php
			// right sidebar.
				do_action( 'display_sidebar_right', 'flex-content-20' );
			?>
			
		</div>
	</div>
</main>
	
<?php get_footer(); ?>
