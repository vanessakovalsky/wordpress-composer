<?php
/**
 * Kovalibre functions and definitions
 *
 * @package Kovalibre
 * @since Kovalibre 1.0
 */

if ( ! function_exists( 'kovalibre_setup' ) ):
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which runs
     * before the init hook. The init hook is too late for some features, such as indicating
     * support post thumbnails.
     *
     * @since Kovalibre 1.0
     */
    function kovalibre_setup() {
     
        /**
         * Custom template tags for this theme.
         */
        require( get_template_directory() . '/inc/template-tags.php' );

        /**
         * Custom functions that act independently of the theme templates
         */
        //require( get_template_directory() . '/inc/tweaks.php' );
     
        /**
         * Make theme available for translation
         * Translations can be filed in the /languages/ directory
         * If you're building a theme based on Kovalibre, use a find and replace
         * to change 'kovalibre' to the name of your theme in all the template files
         */
        load_theme_textdomain( 'kovalibre', get_template_directory() . '/languages' );

        /**
         * Add default posts and comments RSS feed links to head
         */
        add_theme_support( 'automatic-feed-links' );
     
        /**
         * Enable support for the Aside Post Format
         */
        add_theme_support( 'post-formats', array( 'aside','link' ) );
     
        /**
         * This theme uses wp_nav_menu() in one location.
         */
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'kovalibre' ),
        ) );

        if (! term_exists('Competence', 'category')){
            wp_insert_term('Competence','category');
        }
    }
endif; // kovalibre_setup
add_action( 'after_setup_theme', 'kovalibre_setup' );

/**
 * Enqueue scripts and styles
 */
function kovalibre_scripts() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );

    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    
    wp_enqueue_script( 'navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
    /*
    if ( is_singular() && wp_attachment_is_image() ) {
        wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
    }*/
}
add_action( 'wp_enqueue_scripts', 'kovalibre_scripts' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since Kovalibre 1.0
 */
function kovalibre_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Primary Widget Area', 'kovalibre' ),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );
 
    register_sidebar( array(
        'name' => __( 'Secondary Widget Area', 'kovalibre' ),
        'id' => 'sidebar-2',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );
}
add_action( 'widgets_init', 'kovalibre_widgets_init' );

function kovalibre_shortcode(){
    return 'Kovalibre shortcode';
}

add_shortcode('kovalibre','kovalibre_shortcode');