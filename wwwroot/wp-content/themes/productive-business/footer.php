<?php
/**
 * Footer file
 *
 * @package productive-business
 */

?>

	<footer class="site-footer">
		
		<div class="site-container">
			<div class="flex-content-container">
				<div class="flex-content-60">
					<div class="site-footer-nav">
						<?php
						if ( has_nav_menu( 'footer_menu' ) ) {

							wp_nav_menu(
								array(
									'theme_location' => 'footer_menu',
									'menu' => 'promindsone-footer-nav',
									'menu_id' => 'promindsone-footer-nav',
									'container' => 'div',
									'menu_class' => 'footer-menu',
									'containder-class' => 'footer-menu',
								)
							);
						}
						?>
					 </div>
				</div>
				
				<div class="flex-content-40 footer-about">
					<?php
						do_action( 'display_footer_right_info', 'footer-right-widget' );
					?>
				</div>
			 </div>
		</div>
		
		<div class="site-container-copyright">
			 <div class="copyright">
				<?php
				if ( PROMINDSONE_PRODUCT_DOWNLOAD_TYPE == 'product' ) {
					$footer_copyright = get_theme_mod( 'footer_copyright_textarea', '' );
					echo esc_html( $footer_copyright );
				} else {
					echo 'A WordPress theme by <a target="_blank" href="' . esc_url( PROMINDSONE_THEME_DEVELOPER_WEBSITE ) . '">productiveminds.com</a>';
				}
				?>
			 </div>
		</div> 
		
	</footer>

<?php wp_footer(); ?>

</body>
</html>
