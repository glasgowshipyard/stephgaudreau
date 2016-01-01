<?php
/**
 * Steph Gaudreau functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Steph_Gaudreau
 */

if ( ! function_exists( 'stephgaudreau_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function stephgaudreau_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Steph Gaudreau, use a find and replace
	 * to change 'stephgaudreau' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'stephgaudreau', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' 	=> esc_html__( 'Primary', 'stephgaudreau' ),
		'social' 	=> esc_html__( 'Social', 'stephgaudreau' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'stephgaudreau_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // stephgaudreau_setup
add_action( 'after_setup_theme', 'stephgaudreau_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function stephgaudreau_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'stephgaudreau_content_width', 640 );
}
add_action( 'after_setup_theme', 'stephgaudreau_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function stephgaudreau_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'stephgaudreau' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
        'name' 			=> esc_html__( 'Logo', 'stephgaudreau' ),
        'id' 			=> 'logo',
        'before_widget' => '<figure class="logo">',
		'after_widget'	=> '</figure>',
        'description' 	=> esc_html__( 'logo field.', 'stephgaudreau' ),
        'before_title' 	=> '<h2>',
        'after_title' 	=> '</h2>',
    ) );
    register_sidebar( array(
        'name' 			=> esc_html__( 'Front Left', 'stephgaudreau' ),
        'id' 			=> 'front-left',
        'before_widget' => '<div class="front-left">',
		'after_widget' 	=> '</div>',
        'description' 	=> esc_html__( 'Widget for front left on Front Page.', 'stephgaudreau' ),
        'before_title' 	=> '<h2 class="section-title">',
        'after_title' 	=> '</h2>',
    ) );
    register_sidebar( array(
        'name' 			=> esc_html__( 'Front Right', 'stephgaudreau' ),
        'id' 			=> 'front-right',
        'before_widget' => '<div class="front-right">',
		'after_widget' 	=> '</div>',
        'description' 	=> esc_html__( 'Widget for front right on Front Page.', 'stephgaudreau' ),
        'before_title' 	=> '<h2 class="section-title">',
        'after_title' 	=> '</h2>',
    ) );

}
add_action( 'widgets_init', 'stephgaudreau_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function stephgaudreau_scripts() {
	wp_enqueue_style( 'stephgaudreau-style', get_stylesheet_uri(), $in_footer );
	
	wp_enqueue_style('stephgaudreau-knockout-fonts','http://cloud.typography.com/6869874/7212752/css/fonts.css', $in_footer);
	
	wp_enqueue_style('stephgaudreau-google-fonts','https://fonts.googleapis.com/css?family=Source+Sans+Pro', $in_footer);
	
	wp_enqueue_style('stephgaudreau-fontawesome','https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', $in_footer);

	wp_enqueue_script( 'stephgaudreau-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true , $in_footer);

	wp_enqueue_script( 'stephgaudreau-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true , $in_footer);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'stephgaudreau_scripts' );

function remove_jetpack_styles(){
wp_deregister_style('grunion.css'); // Grunion contact form
}
add_action('wp_print_styles', 'remove_jetpack_styles');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

add_image_size('testimonial-mug',235,235,true);