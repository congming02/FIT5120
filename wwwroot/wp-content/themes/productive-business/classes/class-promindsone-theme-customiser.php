<?php
/**
 * Theme Customiser
 *
 * This file is used to customise theme features, including
 * Homepage content
 * Footer copyright
 * Search box visibility in header
 * Layout options
 * number of columns per row to display in archive pages
 *
 * @package productive-business
 */

if ( ! defined( 'ABSPATH' ) ) {
    die();
}

if ( ! class_exists( 'PromindsOne_Theme_Customiser' ) ) {
    
    /**
     * PromindsOne_Theme_Customiser
     */
    class PromindsOne_Theme_Customiser {
        
        /**
         * Register the customizer
         *
         * @param WP_Customize_Manager $wp_customise Param.
         */
        public static function register( $wp_customise ) {
            
            // first, add a theme_options panel for the theme.
            $wp_customise->add_panel(
                'theme_options',
                array(
                    'title' => esc_html__( 'Theme Options', 'productive-business' ),
                    'description' => esc_html__( 'Customisable theme options', 'productive-business' ),
                    'priority' => 20,
                )
                );
            
            // first, add a go_pro for the theme.
            $wp_customise->add_section(
                'go_pro',
                array(
                    'title' => esc_html__( 'Get Pro Version', 'productive-business' ),
                    'description' => esc_html__( 'Get Pro Version', 'productive-business' ),
                    'priority' => 10,
                    'capability' => 'edit_theme_options',
                )
                );
            
            // first, add a theme_header for the theme.
            $wp_customise->add_section(
                'theme_header',
                array(
                    'title' => esc_html__( 'Header Options', 'productive-business' ),
                    'description' => esc_html__( 'Header options', 'productive-business' ),
                    'panel' => 'theme_options',
                    'priority' => 10,
                    'capability' => 'edit_theme_options',
                )
                );
            
            // first, add a footer_options for the theme.
            $wp_customise->add_section(
                'footer_options',
                array(
                    'title' => esc_html__( 'Footer Options', 'productive-business' ),
                    'description' => esc_html__( 'Footer options', 'productive-business' ),
                    'panel' => 'theme_options',
                    'priority' => 20,
                    'capability' => 'edit_theme_options',
                )
                );
            
            // first, add a homepage_options for the theme.
            $wp_customise->add_section(
                'homepage_options',
                array(
                    'title' => esc_html__( 'Homepage Options', 'productive-business' ),
                    'description' => esc_html__( 'Homepage options', 'productive-business' ),
                    'panel' => 'theme_options',
                    'priority' => 30,
                    'capability' => 'edit_theme_options',
                )
                );
            
            // first, add a layout_options for the theme.
            $wp_customise->add_section(
                'layout_options',
                array(
                    'title' => esc_html__( 'Layout Options', 'productive-business' ),
                    'description' => esc_html__( 'Layout options', 'productive-business' ),
                    'panel' => 'theme_options',
                    'priority' => 40,
                    'capability' => 'edit_theme_options',
                )
                );
            
            // first, add a archive_options for the theme.
            $wp_customise->add_section(
                'archive_options',
                array(
                    'title' => esc_html__( 'Archive Page(s) Options', 'productive-business' ),
                    'description' => esc_html__( 'Archive page(s) options', 'productive-business' ),
                    'panel' => 'theme_options',
                    'priority' => 50,
                    'capability' => 'edit_theme_options',
                )
                );
            
            // add a setting for enable_header_search control, below.
            $wp_customise->add_setting(
                'enable_header_search',
                array(
                    'type' => 'theme_mod',
                    'default' => true,
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(__CLASS__, 'promindsone_sanitize_checkbox'),
                )
                );
            
            // add control..
            $wp_customise->add_control(
                'enable_header_search',
                array(
                    'type' => 'checkbox',
                    'priority' => 10,
                    'section' => 'theme_header',
                    'label' => esc_html__( 'Enable Header Search?', 'productive-business' ),
                    'description' => esc_html__( 'Enable search box in the header', 'productive-business' ),
                    // 'active_callback' => 'is_front_page',
                )
                );
            
            // add a setting for items_per_row_to_display, below.
            $wp_customise->add_setting(
                'items_per_row_to_display',
                array(
                    'type' => 'theme_mod',
                    'default' => '4',
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(__CLASS__, 'promindsone_sanitize_absint'),
                )
                );
            
            // add control.
            $wp_customise->add_control(
                'items_per_row_to_display',
                array(
                    'type' => 'text',
                    'priority' => 20,
                    'section' => 'archive_options',
                    'label' => esc_html__( 'Number of posts/pages per row', 'productive-business' ),
                    'description' => esc_html__( '3 or more for best result', 'productive-business' ),
                    // 'active_callback' => 'is_front_page'
                )
                );
            
            // add a setting for posts_placeholder_image control, below.
            $wp_customise->add_setting(
                'posts_placeholder_image',
                array(
                    'type' => 'theme_mod',
                    'default' => true,
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(__CLASS__, 'promindsone_sanitize_image'),
                )
                );
            
            // add control.
            $wp_customise->add_control(
                new WP_Customize_Media_Control(
                    $wp_customise,
                    'posts_placeholder_image',
                    array(
                        'priority' => 30,
                        'section' => 'archive_options',
                        'label' => esc_html__( 'Placeholder image', 'productive-business' ),
                        'description' => esc_html__( 'An image that shows as thumbnail if a post does not have one', 'productive-business' ),
                        // 'active_callback' => 'is_front_page'
                    )
                    )
                );
            
            // add a setting for homepage_usp_image control, below.
            $wp_customise->add_setting(
                'homepage_usp_image',
                array(
                    'type' => 'theme_mod',
                    'default' => true,
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(__CLASS__, 'promindsone_sanitize_image'),
                )
                );
            
            // add control..
            $wp_customise->add_control(
                new WP_Customize_Media_Control(
                    $wp_customise,
                    'homepage_usp_image',
                    array(
                        'priority' => 10,
                        'section' => 'homepage_options',
                        'label' => esc_html__( 'Homepage baackground image', 'productive-business' ),
                        'description' => esc_html__( 'The main background image in the homepage', 'productive-business' ),
                    )
                    )
                );
            
            // add a setting for is_homepage_usp_scroll control, below.
            $wp_customise->add_setting(
                'is_homepage_usp_scroll',
                array(
                    'type' => 'theme_mod',
                    'default' => false,
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(__CLASS__, 'promindsone_sanitize_checkbox'),
                )
                );
            
            // add control..
            $wp_customise->add_control(
                'is_homepage_usp_scroll',
                array(
                    'type' => 'checkbox',
                    'priority' => 20,
                    'section' => 'homepage_options',
                    'label' => esc_html__( 'Scroll background image?', 'productive-business' ),
                    'description' => esc_html__( 'Image scrolls or behaves fixed as in parallax effect.', 'productive-business' ),
                    // 'active_callback' => 'is_front_page',
                )
                );
            
            // add a setting for show_homepage_blog_excerpts control, below.
            $wp_customise->add_setting(
                'show_homepage_blog_excerpts',
                array(
                    'type' => 'theme_mod',
                    'default' => true,
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(__CLASS__, 'promindsone_sanitize_checkbox'),
                )
                );
            
            // add control..
            $wp_customise->add_control(
                'show_homepage_blog_excerpts',
                array(
                    'type' => 'checkbox',
                    'priority' => 25,
                    'section' => 'homepage_options',
                    'label' => esc_html__( 'Show Homepage Posts?', 'productive-business' ),
                    'description' => esc_html__( 'Show latest blog posts in homepage', 'productive-business' ),
                    // 'active_callback' => 'is_front_page',
                )
                );
            
            // add a setting for homepage_usp_textarea_1, below.
            $wp_customise->add_setting(
                'homepage_usp_textarea_1',
                array(
                    'type' => 'theme_mod',
                    'default' => PROMINDSONE_THEME_DISPLAY_NAME,
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(__CLASS__, 'promindsone_sanitize_html'),
                )
                );
            
            // add control..
            $wp_customise->add_control(
                'homepage_usp_textarea_1',
                array(
                    'type' => 'textarea',
                    'priority' => 30,
                    'section' => 'homepage_options',
                    'label' => esc_html__( 'Homepage text 1 (above search box)', 'productive-business' ),
                    'description' => esc_html__( 'Leave empty for blank', 'productive-business' ),
                    // 'active_callback' => 'is_front_page'
                )
                );
            
            // add a setting for homepage_usp_textarea_2, below.
            $wp_customise->add_setting(
                'homepage_usp_textarea_2',
                array(
                    'type' => 'theme_mod',
                    'default' => PROMINDSONE_THEME_DISPLAY_DESC,
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(__CLASS__, 'promindsone_sanitize_html'),
                )
                );
            
            // add control..
            $wp_customise->add_control(
                'homepage_usp_textarea_2',
                array(
                    'type' => 'textarea',
                    'priority' => 40,
                    'section' => 'homepage_options',
                    'label' => esc_html__( 'Homepage text 2 (below search box)', 'productive-business' ),
                    'description' => esc_html__( 'Leave empty for blank', 'productive-business' ),
                )
                );
            
            // add a setting for footer_copyright_textarea control, below.
            $wp_customise->add_setting(
                'footer_copyright_textarea',
                array(
                    'type' => 'theme_mod',
                    'default' => esc_html__( 'A WordPress theme by ', 'productive-business' ) . '<a target="_blank" href="' . esc_url( PROMINDSONE_THEME_DEVELOPER_WEBSITE ) . '">' . esc_attr( PROMINDSONE_THEME_DEVELOPER_NAME ) . '</a>',
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(__CLASS__, 'promindsone_sanitize_html'),
                )
                );
            
            if ( PROMINDSONE_PRODUCT_DOWNLOAD_TYPE != 'product' ) {
                
                // add control..
                $wp_customise->add_control(
                    'footer_copyright_textarea',
                    array(
                        'type' => 'hidden',
                        'priority' => 10,
                        'section' => 'footer_options',
                        'label' => esc_html__( 'Pro only feature', 'productive-business' ),
                        'description' => '<a href="' . esc_url( PROMINDSONE_THEME_DEVELOPER_WEBSITE ) . '">' . esc_html__( 'Get Pro here', 'productive-business' ) . '</a> ' . esc_html__( ' to remove or change the Copyright text', 'productive-business' ),
                    )
                    );
            } else {
                
                // add control..
                $wp_customise->add_control(
                    'footer_copyright_textarea',
                    array(
                        'type' => 'textarea',
                        'priority' => 10,
                        'section' => 'footer_options',
                        'label' => esc_html__( 'Footer copyright content', 'productive-business' ),
                        'description' => esc_html__( 'Leave blank for no copyright info', 'productive-business' ),
                    )
                    );
                
            }
            
            // add a setting for template_layout_options control, below.
            $wp_customise->add_setting(
                'template_layout_options',
                array(
                    'type' => 'theme_mod',
                    'default' => 'one_column',
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(__CLASS__, 'promindsone_sanitize_select'),
                )
                );
            
            // add control..
            $wp_customise->add_control(
                'template_layout_options',
                array(
                    'type' => 'radio',
                    'priority' => 10,
                    'section' => 'layout_options',
                    'label' => esc_html__( 'Layout options for templates', 'productive-business' ),
                    'description' => '',
                    'choices' => array(
                        'one_column' => esc_html__( 'One Column', 'productive-business' ),
                        'two_columns_left' => esc_html__( 'Two Column Left Sidebar', 'productive-business' ),
                        'two_columns_right' => esc_html__( 'Two Column Right Sidebar', 'productive-business' ),
                        'three_columns' => esc_html__( 'Three columns', 'productive-business' ),
                    ),
                )
                );
            
            // add a setting for sidebar_left_header_text control, below.
            $wp_customise->add_setting(
                'sidebar_left_header_text',
                array(
                    'type' => 'theme_mod',
                    'default' => 'Info',
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(__CLASS__, 'promindsone_sanitize_no_html'),
                )
                );
            
            // add control..
            $wp_customise->add_control(
                'sidebar_left_header_text',
                array(
                    'type' => 'text',
                    'priority' => 20,
                    'section' => 'layout_options',
                    'label' => 'Small screen left sidebar header',
                    'description' => 'Text to display on small screens left sidebar header',
                    // 'active_callback' => 'is_front_page'
                )
                );
            
            /*
             add a setting for go_pro_url control, below
             $wp_customise->add_setting( 'go_pro_url', array(
             'type' => 'theme_mod',
             'default' => true,
             'theme_supports' => '',
             'transport' => 'refresh',
             'capability' => 'edit_theme_options',
             'sanitize_callback' => array(__CLASS__, 'promindsone_sanitize_url'),
             )
             );
             
             add control.
             $wp_customise->add_control(
             new PromindsOne_Url_Customiser (
             $wp_customise,
             'go_pro_url',
             array(
             'section' => 'go_pro'
             )
             )
             );
             */
        }
        
        /**
         * Method promindsone_sanitize_checkbox ''.
         *
         * @param boolean $checked ''.
         *
         * @return boolean ''.
         */
        public static function promindsone_sanitize_checkbox( $checked ) {
            return ( ( isset( $checked ) && true == $checked ) ?  true : false );
        }
        
        /**
         * Method promindsone_sanitize_select ''.
         *
         * @param string $input ''.
         * @param object $setting ''.
         *
         * @return string Input or default.
         */
        public static function promindsone_sanitize_select( $input, $setting ) {
            $input = sanitize_key( $input );
            $choices = $setting->manager->get_control( $setting->id )->choices;
            return ( ( array_key_exists( $input, $choices ) ) ? $input : $setting->default );
        }
        
        /**
         * Method promindsone_sanitize_html ''.
         *
         * @param string $html ''.
         *
         * @return string Sanitized version of the $html param.
         */
        public static function promindsone_sanitize_html( $html ) {
            return wp_filter_post_kses( $html );
        }
        
        /**
         * Method promindsone_sanitize_no_html ''.
         *
         * @param string $text ''.
         *
         * @return string ''.
         */
        public static function promindsone_sanitize_no_html( $text ) {
            return wp_filter_nohtml_kses( $text );
        }
        
        /**
         * Method promindsone_sanitize_url ''.
         *
         * @param string $url ''.
         *
         * @return string Sanitized version of the $url param.
         */
        public static function promindsone_sanitize_url( $url ) {
            return esc_url_raw( $url );
        }
        
        /**
         * Method promindsone_sanitize_absint ''.
         *
         * @param int $number ''.
         * @param object $setting ''.
         *
         * @return string Sanitized version of the $number or setting default.
         */
        public static function promindsone_sanitize_absint( $number, $setting ) {
            $number = absint( $number );
            
            return ( $number ? $number : $setting->default );
        }
        
        /**
         * Method promindsone_sanitize_image ''.
         *
         * @param string $image ''.
         * @param object $setting ''.
         *
         * @return string ''.
         */
        public static function promindsone_sanitize_image( $image, $setting ) {
            
            $mimes = array(
                'jpg|jpeg|jpe'    => 'image/jpeg',
                'png'             => 'image/png',
                'gif'             => 'image/gif',
                'bmp'             => 'image/bmp',
                'tif/tiff'        => 'image/tiff',
                'ico'             => 'image/x-icon'
            );
            
            $file = wp_check_filetype( $image, $mimes );
            
            if ( null != $file && array_key_exists('ext', $file) ) {
                return $image;
            } else {
                return $setting->default;
            }
            
        }
        
        
    } // end of class.
    
    // add hook for the class.
    add_action( 'customize_register', array( 'PromindsOne_Theme_Customiser', 'register' ) );
    
}
