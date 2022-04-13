<?php
/**
 * Template Name: Two-Column Left Sidebar Template
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
				do_action( 'display_sidebar_left', 'flex-content-30' );
			?>
			
			<!-- main content -->
			<div class="flex-content-70">
			<?php get_template_part( 'template-parts/page-part' ); ?>
			</div>
			
		</div>
	</div>
</main>
	
<?php get_footer(); ?>
