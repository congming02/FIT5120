<?php
/**
 * Theme functions and definitions
 *
 * @package Greenry
 */

if ( ! function_exists( 'greenry_enqueue_styles' ) ) :

	/**
	 * Load assets.
	 *
	 * @since 1.0.0
	 */
	function greenry_enqueue_styles() {

		wp_enqueue_style( 'industryup-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'greenry-style', get_stylesheet_directory_uri() . '/style.css', array( 'industryup-style-parent' ), '1.0' );
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
		wp_enqueue_style( 'greenry-default-css', get_stylesheet_directory_uri()."/css/colors/default.css" );
		wp_dequeue_style( 'default',get_template_directory_uri() .'/css/colors/default.css');
	}

endif;

add_action( 'wp_enqueue_scripts', 'greenry_enqueue_styles', 99 );

if (!function_exists('greenry_header_logo_menu_section')) :
/**
 *  Header
 *
 * @since Industryup
 *
 */
function greenry_header_logo_menu_section()
{ 
?>

<!-- Logo image -->  
           <div class="navbar-header"> 
            <?php the_custom_logo(); 
                  if (display_header_text()) : ?>
                    <div class="site-branding-text navbar-brand">
                      <h1 class="site-title"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <?php 
                            echo esc_html(get_bloginfo('name'));
                          ?></a></h1>
                      <p class="site-description"><?php echo esc_html(bloginfo('description')); ?></p>
                    </div>
            <?php endif; ?>
          </div>
          
<?php 
}
endif;
add_action('greenry_action_header_logo_section', 'greenry_header_logo_menu_section', 1);



if ( ! function_exists( 'greenry_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function greenry_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on greenry, use a find and replace
	 * to change 'greenry' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'greenry', get_template_directory() . '/languages' );

	// custom header Support
			$args = array(
			'default-image'		=>  get_template_directory_uri() .'/images/sub-header.jpg',
			'width'			=> '1600',
			'height'		=> '600',
			'flex-height'		=> false,
			'flex-width'		=> false,
			'header-text'		=> true,
			'default-text-color'	=> '000',
			 'wp-head-callback' => 'industryup_header_color',
		);
		add_theme_support( 'custom-header', $args );
	

}
endif;
add_action( 'after_setup_theme', 'greenry_setup' );


add_action( 'customize_register', 'greenry_customizer_rid_values', 1000 );
function greenry_customizer_rid_values($wp_customize) {

  $wp_customize->remove_control('industryup_head_info_icon_one');

  $wp_customize->remove_control('industryup_head_info_text_one');

  $wp_customize->remove_control('industryup_head_info_text_two');

  $wp_customize->remove_control('industryup_head_info_icon_two');

  $wp_customize->remove_control('industryup_head_info_text_three');

  $wp_customize->remove_control('industryup_head_info_text_four');

 }

 require( get_stylesheet_directory() . '/inc/ansar/font/font.php' );