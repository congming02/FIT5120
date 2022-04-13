<?php
/*--------------------------------------------------------------------*/
/*     Register Google Fonts
/*--------------------------------------------------------------------*/
function greenry_fonts_url() {
	
    $fonts_url = '';
		
    $font_families = array();
 
	$font_families = array('Roboto Slab:100,200,300,400,500,600,700,800,900');
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return $fonts_url;
}
function greenry_scripts_styles() {
    wp_enqueue_style( 'greenry-dark-fonts', greenry_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'greenry_scripts_styles' );