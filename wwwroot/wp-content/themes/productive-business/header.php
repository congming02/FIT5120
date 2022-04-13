<?php
/**
 * Header page.
 *
 * @package    productive-business
 */

?>
<!DOCTYPE html>
<html lang="en" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php echo bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
	
</head>
<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>
	<?php promindsone_body_open(); ?>
	
	<?php
    	$site_container_no_logo = '';
    	if ( !has_custom_logo() ) {
    	    $site_container_no_logo = 'site-container-no-logo';
    	}
	?>
	
	<header class="site-header sticky-to-top">
		
		<div class="site-container <?php echo esc_attr( $site_container_no_logo );?>">
			
			 <div class="site-header-logo">
			
				 <div class="float_left">
				 	<?php if ( !has_custom_logo() ) { ?>
    					<div class="site-header-logo-text-name">
        					<a class="logo" href="<?php echo esc_url( home_url() ); ?>" >
        						<?php bloginfo( 'name' ); ?>
        					</a>
    					</div>
    					<div class="site-header-logo-text-desc">
        					<a class="logo" href="<?php echo esc_url( home_url() ); ?>" >
        						<?php bloginfo( 'description' ); ?>
        					</a>
    					</div>
					<?php } else { ?>
						
						<?php the_custom_logo(); ?>
						
					<?php } ?>
				</div>
				
				<!-- nav icon -->
				<button class="site-header-menu-icon show_in_small_screen_only float_right">
					<i class="material-icons-round">menu</i>
					<span class="screen-reader-text"><?php esc_html_e('Menu', 'productive-business'); ?></span>
				</button>
				
				<div class="clear_min"></div>
			 </div>
			
			 <div class="site-header-main">
				 <div class="flex-content-container">
				 
					<?php $header_search_enabled = get_theme_mod( 'enable_header_search', true ); ?>
					<?php if ( $header_search_enabled ) { ?>
						
						 <div class="flex-content-90">
							<?php do_action( 'display_promindsone_header_nav', 'site-header-nav site-header-nav-bigscreen' ); ?>
						 </div>
												
						 <div class="flex-content-10 search-box">
							<div class="show_in_small_screen_only search-box-form">
								<?php
    								get_search_form(
    									array(
    										'arial_label' => esc_html__( 'Search...', 'productive-business' ),
    									)
    								);
    							?>
							</div>
							
    						<button class="site-header-search-icon bigscreen-only float_right">
            					<i class="add_search material-icons-round">search</i>
            					<i class="add_highlight_off material-icons-round">highlight_off</i>
            					<span class="screen-reader-text"><?php esc_html_e('Menu', 'productive-business'); ?></span>
            				</button>
						</div>
						
					<?php } else { ?>
						
						<?php do_action( 'display_promindsone_header_nav', 'site-header-nav site-header-nav-bigscreen' ); ?>
						
					<?php } ?>
				 </div>		 		
			 </div>
			
			 <div class="show_in_small_screen_only menu-nav">
				<?php do_action( 'display_promindsone_header_nav', 'site-header-nav site-header-nav-smallscreen' ); ?>
			 </div>
			
			<div class="clear_min"></div>
			
            <div class="header_search_overlay bigscreen-only noned search-box">
            	<div class="bigscreen-only">
            		<?php
            			get_search_form(
            				array(
            					'arial_label' => esc_html__( 'Search...', 'productive-business' ),
            				)
            			);
            		?>
            	</div>
            </div>
            
		</div>
		
		<div class="clear_min"></div>
		
		<?php do_action( 'display_header_callout', 'site-header-callout show-in-all-screens ten_top_padding' ); ?>
				
		<div class="clear_min"></div>
		
	</header>
	