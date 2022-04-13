<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package happy_memories
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses happy_memories_header_style()
 */
function happy_memories_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'happy_memories_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000',
		'flex-height'            => true,
		'default-image'			=> get_theme_file_uri( '/img/bg-img.png' ),
		'wp-head-callback'       => 'happy_memories_header_style',
		) ) );
	register_default_headers( array(
		'header-bg' => array(
			'url'           => get_theme_file_uri( '/img/bg-img.png' ),
			'thumbnail_url' => get_theme_file_uri( '/img/bg-img.png' ),
			'description'   => _x( 'Default', 'Default header image', 'happy-memories' )
			),	
		'header-bg-2' => array( 
			'url'           => get_theme_file_uri( '/img/bg-img.png' ),
			'thumbnail_url' => get_theme_file_uri( '/img/bg-img.png' ),
			'description'   => _x( 'Default', 'Default header image', 'happy-memories' )
			),	
		) );

}
add_action( 'after_setup_theme', 'happy_memories_custom_header_setup' );

if ( ! function_exists( 'happy_memories_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see happy_memories_custom_header_setup().
	 */
function happy_memories_header_style() {
	$header_text_color = get_header_textcolor();
	$header_image = get_header_image();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( empty( $header_image ) && $header_text_color == get_theme_support( 'custom-header', 'default-text-color' ) ){
			return;
		}

	// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">


		.bottom-header-wrapper .logo-container .logofont {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
		.bottom-header-wrapper .logo-container .logofont {
			border-color:#<?php echo esc_attr( $header_text_color ); ?>;
		}
		<?php if ( ! display_header_text() ) : ?>
		a.logofont {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
			display:none;
		}
		<?php endif; ?>

		<?php header_image(); ?>"
		<?php
		if ( ! display_header_text() ) :
			?>
		a.logofont{
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
			display:none;
		}
		<?php
		else :
			?>
		.bottom-header-wrapper .logo-container .logofont {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
		.bottom-header-wrapper .logo-container .logofont {
			border-color:#<?php echo esc_attr( $header_text_color ); ?>;
		}
		<?php endif; ?>
		</style>
		<?php
	}
	endif;
