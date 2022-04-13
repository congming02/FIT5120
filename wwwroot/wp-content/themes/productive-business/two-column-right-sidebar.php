<?php
/**
 * Template Name: Two-Column Right Sidebar Template
 * Template Post Type: post, page
 *
 * @package    productive-business
 */

?>

<?php get_header(); ?>

	<main id="site-content" class="site-content">
	<div class="site-container">
		<div class="flex-content-container">
		
			<!-- main content -->
			<div class="flex-content-70">
			<?php get_template_part( 'template-parts/page-part' ); ?>
			</div>
			
			<?php
			// right sidebar.
				do_action( 'display_sidebar_right', 'flex-content-30' );
			?>
			
		</div>
	</div>
</main>
	
<?php get_footer(); ?>
