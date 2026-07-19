<?php
/**
 * ggisc functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ggisc
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ggisc_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on ggisc, use a find and replace
		* to change 'ggisc' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'ggisc', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'ggisc' ),
			'footer-1' => esc_html__( 'Footer 1', 'ggisc' ),
			'footer-2' => esc_html__( 'Footer 2', 'ggisc' ),
			'footer-3' => esc_html__( 'Footer 3', 'ggisc' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'ggisc_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'ggisc_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ggisc_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ggisc_content_width', 640 );
}
add_action( 'after_setup_theme', 'ggisc_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ggisc_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'ggisc' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ggisc' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'ggisc_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ggisc_scripts() {

	wp_enqueue_style( 'ggisc-main-style', get_template_directory_uri() . '/assets/css/style.css', array(), _S_VERSION, 'all' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ggisc_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Custom Walker to match the DNT Navbar structure exactly.
 */
class DNT_Navbar_Walker extends Walker_Nav_Menu {
    // Start Element: Outputs the opening <li> tag, <a> tag, and text/SVGs
    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        // Handle item classes based on depth
        $li_classes = $depth === 0 ? array( 'dnt-nav-item' ) : array();
        
        // If it's a top-level dropdown parent, WordPress adds 'menu-item-has-children'
        if ( in_array( 'menu-item-has-children', $item->classes ) && $depth === 0 ) {
            $li_classes[] = 'dnt-has-dropdown'; // optional helper class
        }

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $li_classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $output .= $indent . '<li' . $class_names . '>';

        // Setup link attributes
        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
        
        // Apply link classes based on layout level
        $atts['class']  = $depth === 0 ? 'dnt-nav-link' : 'dnt-dropdown-item';

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';

        // Check if this is the "Home/প্রথম পাতা" link to insert the home icon
        // Tip: Matches by home URL or if title contains 'প্রথম পাতা'
        if ( $item->url === home_url('/') || trim($item->title) === 'প্রথম পাতা' ) {
            $item_output .= '<svg class="dnt-icon-sm" viewBox="0 0 24 24"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg> ';
        }

        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

        // If it's a top-level menu item with child items, attach your drop arrow SVG
        if ( in_array( 'menu-item-has-children', $item->classes ) && $depth === 0 ) {
            $item_output .= ' <svg class="dnt-nav-link-icon" viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M7 10l5 5 5-5z"/></svg>';
        }

        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    // Start Level: Outputs the nested dropdown <ul> wrapper tag
    function start_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat("\t", $depth);
        // Generates the specific dropdown wrap element
        $output .= "\n$indent<ul class=\"dnt-dropdown-menu\">\n";
    }
}