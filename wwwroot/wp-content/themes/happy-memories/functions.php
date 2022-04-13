<?php 
add_action( 'wp_enqueue_scripts', 'happy_memories_enqueue_styles' );
function happy_memories_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
} 


function happy_memories_google_fonts() {
	wp_enqueue_style( 'happy-memories-google-fonts', '//fonts.googleapis.com/css?family=Lato:400,700', false ); 
}
add_action( 'wp_enqueue_scripts', 'happy_memories_google_fonts' );



require get_stylesheet_directory() . '/inc/custom-header.php'; 





function happy_memories_customize_register( $wp_customize ) { 
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'refresh';
			$wp_customize->get_setting( 'blogname' )->transport         = 'refresh';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'refresh';

	$wp_customize->add_setting( 'btn_continue_reading_background_color', array(
		'default'           => '#00d07e',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'refresh',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'btn_continue_reading_background_color', array(
		'label'       => __( 'Post feed background button color', 'happy-memories' ),
		'section'     => 'colors',
		'priority'   => 1,
		'settings'    => 'btn_continue_reading_background_color',
		) ) );
	$wp_customize->add_setting( 'btn_continue_reading_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'refresh',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'btn_continue_reading_color', array(
		'label'       => __( 'Post feed button color', 'happy-memories' ),
		'section'     => 'colors',
		'priority'   => 1,
		'settings'    => 'btn_continue_reading_color',
		) ) );
}
add_action( 'customize_register', 'happy_memories_customize_register', 9999 );
if(! function_exists('happy_memories_customizer_css_final_output' ) ):
	function happy_memories_customizer_css_final_output(){
		?>
		<style type="text/css">
		.btn-continue-reading { color: <?php echo esc_attr(get_theme_mod( 'btn_continue_reading_color')); ?>; }
		.btn-continue-reading { background: <?php echo esc_attr(get_theme_mod( 'btn_continue_reading_background_color')); ?>; }
		</style>
		<?php }
		add_action( 'wp_head', 'happy_memories_customizer_css_final_output', 999 );
		endif;