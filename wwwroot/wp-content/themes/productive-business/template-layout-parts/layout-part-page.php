<?php
/**
 * Part template
 *
 * @package productive-business
 */

?>

<main id="site-content" class="site-content">
	<div class="site-container">
		<div class="flex-content-container">
		
		<?php
		$template_layout_options = get_theme_mod( 'template_layout_options', 'one_column' );
		$main_css_class = 'flex-content-100';
		$side_css_class = 'flex-content-20';

		if ( 'two_columns_left' == $template_layout_options ) {

			$main_css_class = 'flex-content-70';
			$side_css_class = 'flex-content-30';
			$template_layout_options = 'two_columns_left';

		} else if ( 'two_columns_right' == $template_layout_options ) {

			$main_css_class = 'flex-content-70';
			$side_css_class = 'flex-content-30';
			$template_layout_options = 'two_columns_right';

		} else if ( 'three_columns' == $template_layout_options ) {

			$main_css_class = 'flex-content-60';
			$side_css_class = 'flex-content-20';
			$template_layout_options = 'three_columns';

		}

		?>
			
			<?php
			// left sidebar.
			if ( 'two_columns_left' == $template_layout_options || 'three_columns' == $template_layout_options ) {
				do_action( 'display_sidebar_left', $side_css_class );
			}
			?>
			
			<!-- main content -->
			<div class="<?php echo esc_attr( $main_css_class ); ?>">
				<?php get_template_part( 'template-parts/page-part' ); ?>
			</div>
			
			<?php
			// right sidebar.
			if ( 'two_columns_right' == $template_layout_options || 'three_columns' == $template_layout_options ) {
				do_action( 'display_sidebar_right', $side_css_class );
			}
			?>
			
		</div>
	</div>
</main>
	
