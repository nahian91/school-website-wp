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
 */
function ggisc_setup() {
    load_theme_textdomain( 'ggisc', get_template_directory() . '/languages' );

    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );

    register_nav_menus(
        array(
            'menu-1'   => esc_html__( 'Primary', 'ggisc' ),
            'footer-1' => esc_html__( 'Footer 1', 'ggisc' ),
            'footer-2' => esc_html__( 'Footer 2', 'ggisc' ),
            'footer-3' => esc_html__( 'Footer 3', 'ggisc' ),
        )
    );

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

    add_theme_support( 'customize-selective-refresh-widgets' );

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
 * Set the content width in pixels.
 */
function ggisc_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'ggisc_content_width', 640 );
}
add_action( 'after_setup_theme', 'ggisc_content_width', 0 );

/**
 * Register widget area.
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
 * Includes
 */
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';

if ( defined( 'JETPACK__VERSION' ) ) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Custom Walker to match the DNT Navbar structure.
 */
class DNT_Navbar_Walker extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $li_classes = $depth === 0 ? array( 'dnt-nav-item' ) : array();
        
        if ( in_array( 'menu-item-has-children', $item->classes ) && $depth === 0 ) {
            $li_classes[] = 'dnt-has-dropdown';
        }

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $li_classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $output .= $indent . '<li' . $class_names . '>';

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
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

        if ( $item->url === home_url('/') || trim($item->title) === 'প্রথম পাতা' ) {
            $item_output .= '<svg class="dnt-icon-sm" viewBox="0 0 24 24"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg> ';
        }

        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

        if ( in_array( 'menu-item-has-children', $item->classes ) && $depth === 0 ) {
            $item_output .= ' <svg class="dnt-nav-link-icon" viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M7 10l5 5 5-5z"/></svg>';
        }

        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    function start_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"dnt-dropdown-menu\">\n";
    }
}

/**
 * Synchronized Custom Login Form Processor (admin-post.php)
 */
add_action( 'admin_post_dnt_login_handler', 'ggisc_process_custom_login' );
add_action( 'admin_post_nopriv_dnt_login_handler', 'ggisc_process_custom_login' );

function ggisc_process_custom_login() {
    if ( ! headers_sent() ) {
        ob_start();
    }

    if ( ! session_id() && ! headers_sent() ) {
        session_start();
    }

    global $wpdb;
    $login_page_url = site_url( '/custom-login/' );

    // 1. Verify Nonce Security
    if ( ! isset( $_POST['dnt_login_nonce'] ) || ! wp_verify_nonce( $_POST['dnt_login_nonce'], 'dnt_login_nonce_action' ) ) {
        wp_safe_redirect( add_query_arg( 'login', 'nonce', $login_page_url ) );
        exit;
    }

    // 2. Verify Captcha
    $user_captcha = isset( $_POST['captcha'] ) ? absint( $_POST['captcha'] ) : -1;
    $ans_captcha  = isset( $_SESSION['dnt_login_captcha_ans'] ) ? absint( $_SESSION['dnt_login_captcha_ans'] ) : -2;

    if ( $user_captcha !== $ans_captcha ) {
        wp_safe_redirect( add_query_arg( 'login', 'captcha', $login_page_url ) );
        exit;
    }

    // 3. Sanitize Inputs
    $user_role = isset( $_POST['user_role'] ) ? sanitize_text_field( $_POST['user_role'] ) : 'student';
    $identity  = isset( $_POST['log'] ) ? sanitize_text_field( trim( $_POST['log'] ) ) : '';
    $dob       = isset( $_POST['pwd'] ) ? sanitize_text_field( trim( $_POST['pwd'] ) ) : '';

    if ( empty( $identity ) || empty( $dob ) ) {
        wp_safe_redirect( add_query_arg( 'login', 'empty', $login_page_url ) );
        exit;
    }

    $table_students = $wpdb->prefix . 'sms_students';

    // 4. Role Wise Auth Logic
    if ( 'student' === $user_role ) {
        $student = $wpdb->get_row( $wpdb->prepare(
            "SELECT * FROM {$table_students} WHERE (student_id = %s OR roll_no = %s) AND dob = %s AND status = 'Active'",
            $identity,
            $identity,
            $dob
        ) );

        if ( $student ) {
            $_SESSION['dnt_student_id'] = $student->id;
            $_SESSION['dnt_user_role']  = 'student';

            // Native WP Auth Login if linked
            if ( ! empty( $student->wp_user_id ) ) {
                $wp_user = get_user_by( 'id', $student->wp_user_id );
                if ( $wp_user ) {
                    wp_clear_auth_cookie();
                    wp_set_current_user( $wp_user->ID );
                    wp_set_auth_cookie( $wp_user->ID, true );
                }
            }

            unset( $_SESSION['dnt_login_captcha_ans'] );

            if ( ob_get_length() ) {
                ob_end_clean();
            }

            wp_safe_redirect( site_url( '/student-dashboard/' ) );
            exit;
        } else {
            wp_safe_redirect( add_query_arg( 'login', 'failed', $login_page_url ) );
            exit;
        }

    } elseif ( 'guardian' === $user_role ) {
        $student = $wpdb->get_row( $wpdb->prepare(
            "SELECT * FROM {$table_students} WHERE guardian_phone = %s AND dob = %s AND status = 'Active'",
            $identity,
            $dob
        ) );

        if ( $student ) {
            $_SESSION['dnt_student_id'] = $student->id;
            $_SESSION['dnt_user_role']  = 'guardian';

            unset( $_SESSION['dnt_login_captcha_ans'] );

            if ( ob_get_length() ) {
                ob_end_clean();
            }

            wp_safe_redirect( site_url( '/guardian-dashboard/' ) );
            exit;
        } else {
            wp_safe_redirect( add_query_arg( 'login', 'failed', $login_page_url ) );
            exit;
        }
    }

    wp_safe_redirect( add_query_arg( 'login', 'failed', $login_page_url ) );
    exit;
}

/**
 * Custom Student & Guardian Logout Action Handler
 */
add_action( 'init', 'ggisc_custom_student_logout' );
function ggisc_custom_student_logout() {
    if ( isset( $_GET['action'] ) && $_GET['action'] === 'dnt_logout' ) {
        
        if ( isset( $_GET['_wpnonce'] ) && wp_verify_nonce( $_GET['_wpnonce'], 'dnt_logout_action' ) ) {
            
            if ( ! session_id() && ! headers_sent() ) {
                session_start();
            }

            unset( $_SESSION['dnt_student_id'] );
            unset( $_SESSION['dnt_user_role'] );
            session_destroy();

            if ( is_user_logged_in() ) {
                wp_logout();
            }

            wp_safe_redirect( site_url( '/custom-login/?logout=success' ) );
            exit;
        }
    }
}