<?php
/**
 * Default page.
 *
 * @package    productive-business
 */

?>

<?php get_header(); ?>

	<?php if ( is_page() || get_post_type() == 'post' ) { ?>
		
			<?php get_template_part( 'template-layout-parts/layout-part-page' ); ?>
		
	<?php } else { ?>
		<main id="site-content" class="site-content">
			<div class="site-container">
				<?php get_template_part( 'template-parts/page-part' ); ?>
			</div>
		</main>
	<?php } ?>
	
<?php get_footer(); ?>
