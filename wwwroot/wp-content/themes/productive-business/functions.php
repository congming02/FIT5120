<?php
/**
 * The function php file contain all theme-based customisation and functions
 * including several hooks used within the theme
 *
 * @package    productive-business
 */

define( 'PROMINDSONE_THEME_DISPLAY_NAME', 'Productive Business' );
define( 'PROMINDSONE_THEME_DISPLAY_DESC', 'Just another WordPress website' );
define( 'PROMINDSONE_PRODUCT_DOWNLOAD_TYPE', 'product-download' );
define( 'PROMINDSONE_THEME_DEMO_URL', 'https://www.productiveminds.com/themes/wordpress-theme-for-business/' );
define( 'PROMINDSONE_THEME_DEVELOPER_NAME', 'productiveminds.com' );
define( 'PROMINDSONE_THEME_DEVELOPER_WEBSITE', 'https://www.productiveminds.com' );
define( 'PROMINDSONE_HOMEPAGE_USP_IMAGE_REMOTE', 'https://www.productiveminds.com/demo/images/hero-1.jpg' );

$promindsone_theme_version_obj = wp_get_theme();
$promindsone_theme_version = $promindsone_theme_version_obj->get( 'Version' );

$promindsone_posts_placeholder_image_remote = get_template_directory_uri() . '/assets/images/posts-placeholder.jpg';

// customiser.
require get_template_directory() . '/classes/class-promindsone-theme-customiser.php';



/**
 * Method promindsone_body_open_action.
 * 
 */
function promindsone_body_open_action() {
    echo '<a class="skip-link screen-reader-text" href="#site-content">' . __( "Skip to content", "productive-business" ) . '</a>';
}
add_action( 'promindsone_body_open', 'promindsone_body_open_action' );


/**
 * Register sidebar widgets
 */
function promindsone_promindsone_widgets() {
    
    register_sidebar(
        array(
            'name' => esc_html__('Homepage Hero', 'productive-business'),
            'id' => 'homepage_hero_widget',
            'before_widget' => '<div class="promindsone_widget_container_home">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        )
        );
    
    register_sidebar(
        array(
            'name' => esc_html__('Homepage Content Top', 'productive-business'),
            'id' => 'homepage_content_widget_top',
            'before_widget' => '<div class="promindsone_widget_container_home">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        )
        );
    
    register_sidebar(
        array(
            'name' => esc_html__('Homepage Content Bottom', 'productive-business'),
            'id' => 'homepage_content_widget_bottom',
            'before_widget' => '<div class="promindsone_widget_container_home">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        )
        );
    
    register_sidebar(
        array(
            'name' => esc_html__('Left Sidebar', 'productive-business'),
            'id' => 'sidebar_left',
            'before_widget' => '<div class="promindsone_widget_container_sidebar">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        )
        );
    
    register_sidebar(
        array(
            'name' => esc_html__('Right Sidebar', 'productive-business'),
            'id' => 'sidebar_right',
            'before_widget' => '<div class="promindsone_widget_container_sidebar">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        )
        );
    
    register_sidebar(
        array(
            'name' => esc_html__('Footer Right', 'productive-business'),
            'id' => 'footer_right_info',
            'before_widget' => '<div class="promindsone_widget_container_sidebar">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        )
        );
    
    register_sidebar(
        array(
            'name' => esc_html__('Header Callout', 'productive-business'),
            'id' => 'header_callout',
            'before_widget' => '<div class="promindsone_widget_container_callout">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        )
        );
    
}
add_action( 'widgets_init', 'promindsone_promindsone_widgets' );


/**
 * Method promindsone_body_open.
 * 
 */
function promindsone_body_open() {
    do_action( 'promindsone_body_open' );
}

	/**
	 * Method promindsone_menu_navs
	 */
function promindsone_menu_navs() {
	$theme_menus = array(
		'primary' => 'Primary',
		'footer_menu' => 'Footer Menu',
	);
	register_nav_menus( $theme_menus );
}
	// hook for promindsone_menus.
	add_action( 'init', 'promindsone_menu_navs' );


	/**
	 * Method promindsone_get_placeholder_image
	 */
function promindsone_get_placeholder_image() {

	global $promindsone_posts_placeholder_image_remote;

	$posts_placeholder_image = '';
	$posts_placeholder_image_obj = get_theme_mod( 'posts_placeholder_image' );
	if ( $posts_placeholder_image_obj ) {
		$posts_placeholder_image_array = wp_get_attachment_image_src( $posts_placeholder_image_obj, 'full' );
		if ( $posts_placeholder_image_array ) {
			$posts_placeholder_image = $posts_placeholder_image_array[0];
		} else {
			$posts_placeholder_image = $promindsone_posts_placeholder_image_remote;
		}
	} else {
		$posts_placeholder_image = $promindsone_posts_placeholder_image_remote;
	}
	return $posts_placeholder_image;
}


	/**
	 * Method promindsone_do_placeholder_image
	 */
function promindsone_do_placeholder_image() {

	global $promindsone_posts_placeholder_image_remote;

	$posts_placeholder_image = '';
	$posts_placeholder_image_obj = get_theme_mod( 'posts_placeholder_image' );
	if ( $posts_placeholder_image_obj ) {
		$posts_placeholder_image_array = wp_get_attachment_image_src( $posts_placeholder_image_obj, 'full' );
		if ( $posts_placeholder_image_array ) {
			$posts_placeholder_image = $posts_placeholder_image_array[0];
		} else {
			$posts_placeholder_image = $promindsone_posts_placeholder_image_remote;
		}
	} else {
		$posts_placeholder_image = $promindsone_posts_placeholder_image_remote;
	}
	echo '<img src="' . esc_url( $posts_placeholder_image ) . '" alt="" />';
}
	add_action( 'display_placeholder_image', 'promindsone_do_placeholder_image' );


	/**
	 * Method promindsone_scripts
	 */
function promindsone_scripts() {

	global $promindsone_theme_version;

	// Google fonts.
	wp_enqueue_style( 'googlefonts', 'https://fonts.googleapis.com/css2?family=Lato&family=Raleway&family=Roboto&Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Quicksand:wght@400;700&family=Quicksand:wght@400;700&display=swap', array(), $promindsone_theme_version );

	// Google font icons - https://fonts.google.com/icons.
	wp_enqueue_style( 'google_font_icons', 'https://fonts.googleapis.com/css2?family=Material+Icons', array(), $promindsone_theme_version );
	wp_enqueue_style( 'google_font_icons_round', 'https://fonts.googleapis.com/css2?family=Material+Icons+Round', array(), $promindsone_theme_version );

	// theme's main css with normalise & google font as dependencies.
	wp_enqueue_style( 'promindsone_style', get_stylesheet_uri(), array( 'googlefonts', 'google_font_icons', 'google_font_icons_round' ), $promindsone_theme_version );

	// as per number of columns - load only after main css.
	$number_of_items_per_row = promindsone_get_items_per_row_to_display();
	if ( 2 == $number_of_items_per_row ) {
		wp_enqueue_style( 'product_archive_css', get_template_directory_uri() . '/assets/css/archive_2.css', array( 'promindsone_style' ), $promindsone_theme_version );
	} else if ( 3 == $number_of_items_per_row ) {
		wp_enqueue_style( 'product_archive_css', get_template_directory_uri() . '/assets/css/archive_3.css', array( 'promindsone_style' ), $promindsone_theme_version );
	} else if ( 4 == $number_of_items_per_row ) {
		wp_enqueue_style( 'product_archive_css', get_template_directory_uri() . '/assets/css/archive_4.css', array( 'promindsone_style' ), $promindsone_theme_version );
	} else if ( 5 == $number_of_items_per_row ) {
		wp_enqueue_style( 'product_archive_css', get_template_directory_uri() . '/assets/css/archive_5.css', array( 'promindsone_style' ), $promindsone_theme_version );
	} else if ( 6 == $number_of_items_per_row ) {
		wp_enqueue_style( 'product_archive_css', get_template_directory_uri() . '/assets/css/archive_6.css', array( 'promindsone_style' ), $promindsone_theme_version );
	} else if ( 6 == $number_of_items_per_row ) {
		wp_enqueue_style( 'product_archive_css', get_template_directory_uri() . '/assets/css/archive_7.css', array( 'promindsone_style' ), $promindsone_theme_version );
	}

	// JavaScripts...

	// jquery.
	wp_enqueue_script( 'jquery' );

	// theme's main JS.
	wp_enqueue_script( 'promindsone_js', get_template_directory_uri() . '/assets/js/theme.js', array(), $promindsone_theme_version, true );

}
	// hook for promindsone_scripts.
	add_action( 'wp_enqueue_scripts', 'promindsone_scripts' );


	/**
	 * Method add editor css
	 */
function promindsone_add_editor_style() {
	$args = array(
		'/assets/css/editor-styles.css',
	);
	add_editor_style( $args );
}


	/**
	 * Method enqueue comment-reply
	 */
function promindsone_enqueue_comment_reply() {
	if ( ! is_admin() && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}


	/**
	 * Method promindsone_setup_theme
	 */
function promindsone_setup_theme() {
    
	add_theme_support('post-thumbnails');
	add_theme_support('wp-block-styles');
	add_theme_support('responsive-embeds');
	add_theme_support('custom-logo');
	add_theme_support('align-wide');
	add_theme_support('title-tags');
	add_theme_support('automatic-feed-links');
	
	$args = array(
	    'gallery',
	    'caption',
	    'script',
	    'search-form',
	    'comment-form',
	    'comment-list',
	    'navigation-widgets',
	);
	
	add_theme_support( 'html5', $args );
	
	load_theme_textdomain( 'productive-business' );
	
}
    // hook for promindsone_setup_theme.
	add_action( 'after_setup_theme', 'promindsone_setup_theme' );


	/**
	 * Add hooks for the sidebar widgets.
	 *
	 * @param string $class css class name to use to wrap the sidebar.
	 */
	function promindsone_get_homepage_hero_widget( $class = '' ) {
	    
	    if ( is_active_sidebar( 'homepage_hero_widget' ) ) {
        	if ( '' != $class ) {
        		echo '<div class="' . esc_attr( $class ) . '">';
        		if ( is_active_sidebar( 'homepage_hero_widget' ) ) {
        			dynamic_sidebar( 'homepage_hero_widget' );
        		}
        		echo '</div>';
        	} else {
        		if ( is_active_sidebar( 'homepage_hero_widget' ) ) {
        			dynamic_sidebar( 'homepage_hero_widget' );
        		}
        	}  
        }
	}
	// hook for homepage_hero_widget.
	add_action( 'display_homepage_hero_widget', 'promindsone_get_homepage_hero_widget' );


	/**
	 * Method promindsone_get_homepage_content_widget_top.
	 *
	 * @param string $class ''.
	 */
	function promindsone_get_homepage_content_widget_top( $class = '' ) {
	    
	    if ( is_active_sidebar( 'homepage_content_widget_top' ) ) {
        	if ( '' != $class ) {
        		echo '<div class="' . esc_attr( $class ) . '">';
        		if ( is_active_sidebar( 'homepage_content_widget_top' ) ) {
        			dynamic_sidebar( 'homepage_content_widget_top' );
        		}
        		echo '</div>';
        	} else {
        		if ( is_active_sidebar( 'homepage_content_widget_top' ) ) {
        			dynamic_sidebar( 'homepage_content_widget_top' );
        		}
        	}
	    }
    }
	// hook for get_homepage_content_widget_top.
	add_action( 'display_homepage_content_widget_top', 'promindsone_get_homepage_content_widget_top' );


	/**
	 * Method promindsone_get_homepage_content_widget_bottom.
	 *
	 * @param string $class ''.
	 */
	function promindsone_get_homepage_content_widget_bottom( $class = '' ) {
	    
	    if ( is_active_sidebar( 'homepage_content_widget_bottom' ) ) {
        	if ( '' != $class ) {
        		echo '<div class="' . esc_attr( $class ) . '">';
        		if ( is_active_sidebar( 'homepage_content_widget_bottom' ) ) {
        			dynamic_sidebar( 'homepage_content_widget_bottom' );
        		}
        		echo '</div>';
        	} else {
        		if ( is_active_sidebar( 'homepage_content_widget_bottom' ) ) {
        			dynamic_sidebar( 'homepage_content_widget_bottom' );
        		}
        	}
	    }
    }
	// hook for get_homepage_content_widget_bottom.
	add_action( 'display_homepage_content_widget_bottom', 'promindsone_get_homepage_content_widget_bottom' );


	/**
	 * Method promindsone_get_left_sidebar.
	 *
	 * @param string $class ''.
	 */
    function promindsone_get_left_sidebar( $class = '' ) {
    
    	if ( is_active_sidebar( 'sidebar_left' ) ) {
    		echo '<div class="sidebar_left_header">';
    		echo '<i class="add_circle material-icons-round">add_circle</i>';
    		echo '<i class="remove_circle material-icons-round">remove_circle</i>';
    		echo '<span class="sidebar_left_header_text">' . esc_html( get_theme_mod( 'sidebar_left_header_text', 'Info' ) ) . '</span>';
    		echo '</div>';
    
    		if ( '' != $class ) {
    			echo '<aside class="sidebar_left ' . esc_attr( $class ) . '">';
    				dynamic_sidebar( 'sidebar_left' );
    			echo '</aside>';
    		} else {
    			echo '<aside class="sidebar_left">';
    				dynamic_sidebar( 'sidebar_left' );
    			echo '</aside>';
    		}
    	}
    
    }
	// hook for sidebar_left.
	add_action( 'display_sidebar_left', 'promindsone_get_left_sidebar' );


	/**
	 * Method promindsone_get_sidebar_right.
	 *
	 * @param string $class ''.
	 */
function promindsone_get_sidebar_right( $class = '' ) {
    
    if ( is_active_sidebar( 'sidebar_right' ) ) {
    	if ( '' != $class ) {
    		echo '<aside class="' . esc_attr( $class ) . '">';
    		if ( is_active_sidebar( 'sidebar_right' ) ) {
    			dynamic_sidebar( 'sidebar_right' );
    		}
    		echo '</aside>';
    	} else {
    		echo '<aside>';
    		if ( is_active_sidebar( 'sidebar_right' ) ) {
    			dynamic_sidebar( 'sidebar_right' );
    		}
    		echo '</aside>';
    	}
    }
}
	// hook for sidebar_right.
	add_action( 'display_sidebar_right', 'promindsone_get_sidebar_right' );



	/**
	 * Method promindsone_get_footer_right_info.
	 *
	 * @param string $class ''.
	 */
function promindsone_get_footer_right_info( $class = '' ) {
    
    if ( is_active_sidebar( 'footer_right_info' ) ) {
    	if ( '' != $class ) {
    		echo '<aside class="' . esc_attr( $class ) . '">';
    		if ( is_active_sidebar( 'footer_right_info' ) ) {
    			dynamic_sidebar( 'footer_right_info' );
    		}
    		echo '</aside>';
    	} else {
    		echo '<aside>';
    		if ( is_active_sidebar( 'footer_right_info' ) ) {
    			dynamic_sidebar( 'footer_right_info' );
    		}
    		echo '</aside>';
    	}
    }
}
	// hook for footer_right_info.
	add_action( 'display_footer_right_info', 'promindsone_get_footer_right_info' );
	
	
	
	
	/**
	 * Method promindsone_get_header_callout.
	 *
	 * @param string $class ''.
	 */
	function promindsone_get_header_callout( $class = '' ) {
	    
	    if ( is_active_sidebar( 'header_callout' ) ) {
    	    if ( '' != $class ) {
    	        echo '<div class="' . esc_attr( $class ) . '">';
    	        if ( is_active_sidebar( 'header_callout' ) ) {
    	            dynamic_sidebar( 'header_callout' );
    	        }
    	        echo '</div>';
    	    } else {
    	        echo '<div>';
    	        if ( is_active_sidebar( 'header_callout' ) ) {
    	            dynamic_sidebar( 'header_callout' );
    	        }
    	        echo '</div>';
    	    }
	    }
	}
	// hook for footer_right_info.
	add_action( 'display_header_callout', 'promindsone_get_header_callout' );
	
	
	

	/**
	 * Method promindsone_get_site_posts.
	 *
	 * @param number $number_of_posts ''.
	 *
	 * @param string $post_type ''.
	 *
	 * @return WP_Post[]|number[]
	 */
function promindsone_get_site_posts( $number_of_posts = 10, $post_type = 'post' ) {
	$args = array(
		'numberposts' => $number_of_posts,
		'post_type' => $post_type,
	);
	return get_posts( $args );
}


	/**
	 * Add hook to display search box in the header.
	 *
	 * @param string $class ''.
	 */
function promindsone_get_promindsone_header_nav( $class = '' ) {
	if ( '' != $class ) {
		echo '<div class="' . esc_attr( $class ) . '">';
		wp_nav_menu(
			array(
				'theme_location' => 'primary',
				'menu' => 'promindsone-header-nav',
				'menu_id' => 'promindsone-header-nav',
				'container' => 'div',
				'menu_class' => 'header-navbar-nav',
				'containder-class' => 'promindsone-header-nav',
			)
		);
		echo '</div>';
	} else {
		echo '<div>';
		wp_nav_menu(
			array(
				'theme_location' => 'primary',
				'menu' => 'promindsone-header-nav',
				'menu_id' => 'promindsone-header-nav',
				'container' => 'div',
				'menu_class' => 'header-navbar-nav',
				'containder-class' => 'promindsone-header-nav',
			)
		);
		echo '</div>';
	}
}
	// hook for  header_nav form.
	add_action( 'display_promindsone_header_nav', 'promindsone_get_promindsone_header_nav' );


	/**
	 * Method promindsone_is_woocommerce_page.
	 *
	 * @return number|mixed ''
	 */
function promindsone_get_items_per_row_to_display() {

	$items_per_row_to_display = 4;

	if ( promindsone_is_woocommerce_page() ) {
		if ( wc_get_default_products_per_row() != 0 ) {
			$items_per_row_to_display = wc_get_default_products_per_row();
		} else {
			$items_per_row_to_display = esc_html( get_theme_mod( 'items_per_row_to_display', $items_per_row_to_display ) );
		}
	} else {
		$items_per_row_to_display = esc_html( get_theme_mod( 'items_per_row_to_display', $items_per_row_to_display ) );
	}

	return $items_per_row_to_display;

}
	add_action( 'display_items_per_row_to_display', 'promindsone_get_items_per_row_to_display' );


	/**
	 * Method promindsone_is_woocommerce_page.
	 *
	 * @return boolean ''
	 */
function promindsone_is_woocommerce_page() {
	if ( promindsone_is_woocommerce_activated() ) {
		return is_shop() || is_product() || is_product_category();
	} else {
		return false;
	}
}


	/**
	 * Method promindsone_get_unique_id.
	 *
	 * @param string $prefix ''.
	 *
	 * @return string
	 */
function promindsone_get_unique_id( $prefix = '' ) {
	if ( function_exists( 'wp_unique_id' ) ) {
		return wp_unique_id( $prefix );
	} else {
		static $id_counter;
		return $prefix . (string) ++$id_counter;
	}
}
	add_action( 'display_unique_id', 'promindsone_get_unique_id', 1 );


	/**
	 * Method is woocommerce is installed.
	 *
	 * @return boolean
	 */
function promindsone_is_woocommerce_activated() {
	return class_exists( 'woocommerce' );
}



