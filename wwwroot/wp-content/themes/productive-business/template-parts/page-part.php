<?php
/**
 * Part template
 *
 * @package productive-business
 */

while ( have_posts() ) : ?>

	<?php the_post(); ?>	
	
	<?php if ( has_post_thumbnail() ) : ?>
		
		<?php
		$main_image = '';
		$image_srcs_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
		if ( $image_srcs_array ) {
			$main_image = $image_srcs_array[0];
		}
		?>
		<div class="main-top-featured-content">
		   <div class="main-top-featured-image" style="background-image: url(<?php echo esc_url( $main_image ); ?>)">
				  <div>
					  <h1><span class="main-product-title"><?php esc_html( the_title() ); ?></span></h1>
				  </div>
		   </div>
	   </div>
	   <?php else : ?>
	   
		   <h1 class="wc-page-title"><?php esc_html( the_title() ); ?></h1>
		
	<?php endif; ?>
	
	<?php // post attributes. ?>
	<?php if ( is_single() && get_post_type() == 'post' ) { ?>
		<div class="blog-post-attributes">
			
			<div class="blog-post-attributes-author">    			
				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" ><?php echo esc_html( get_the_author() ); ?></a>
				- <?php esc_html( the_date() ); ?>
			</div>
			
			<?php if ( has_category() ) { ?>
			<div class="blog-post-attributes-category">
				<?php echo 'Posted in '; ?>
				<?php the_category( ' | ' ); ?>
			</div>
			<?php } ?>
		</div> 
	<?php } ?>
	
	<div <?php post_class(); ?> id="post-<?php echo esc_attr( the_ID() ); ?>">
		<?php the_content(); ?>
	</div>
	
	<?php wp_link_pages(); ?>

	<?php
	if ( is_single() ) {
		get_template_part( 'template-parts/prev-next' );
	}

	if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
		comments_template( '/comments.php' );
	}
	?>

<?php endwhile; ?>
