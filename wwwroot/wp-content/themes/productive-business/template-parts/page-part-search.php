<?php
/**
 * Part template
 *
 * @package productive-business
 */

?>
<?php while ( have_posts() ) : ?>
	<?php the_post(); ?>
	<?php get_template_part( 'template-parts/page-part-search-excerpt' ); ?>
	<?php
endwhile;
