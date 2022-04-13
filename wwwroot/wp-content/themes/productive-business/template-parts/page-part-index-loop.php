<?php
/**
 * Part template
 *
 * @package     productive-business
 */

?>
		
<?php
	$promindsone_get_items_per_row_to_display = promindsone_get_items_per_row_to_display();
?>		
 <?php $show_homepage_blog_excerpts = get_theme_mod( 'show_homepage_blog_excerpts', true ); ?>
<?php if ( ( is_home() && $show_homepage_blog_excerpts ) || ! is_home() ) { ?>
	<div class="homepage-block-container">
		<div class="promindsone_section columns-<?php echo esc_attr( $promindsone_get_items_per_row_to_display ); ?>">
			<div class="products-grid products columns-<?php echo esc_attr( $promindsone_get_items_per_row_to_display ); ?>">
				<?php $counter = 0; ?>
				<?php while ( have_posts() && ( ( is_home() && $counter < $promindsone_get_items_per_row_to_display ) || ! is_home() ) ) : ?>
					<?php the_post(); ?>	
					<?php get_template_part( 'template-parts/page-part-index-excerpt' ); ?>
					<?php $counter++; ?>
				<?php endwhile; ?>
				<li class="clear_min"></li>
			</div>
			<div class="clear_min"></div>
		</div> 
	</div>
<?php } ?>
