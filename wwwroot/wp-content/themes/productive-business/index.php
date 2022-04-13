<?php
/**
 * Index page.
 *
 * @package    productive-business
 */

?>

<?php get_header(); ?>
	<?php if ( is_home() ) { ?>
	
		<main id="site-content" class="site-content home">
			<?php get_template_part( 'template-parts/page-part-index' ); ?>
		</main>
		
	<?php } else { ?>
	
			<?php get_template_part( 'template-layout-parts/layout-part-index' ); ?>
			
	<?php } ?>
<?php get_footer(); ?>
