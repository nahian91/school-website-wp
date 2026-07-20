<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ggisc
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ==========================================
        TOPBAR SECTION
        ========================================== -->
    <div class="dnt-topbar">
        <div class="dnt-container dnt-topbar-wrapper">
            <div class="dnt-topbar-left">
                <div class="dnt-topbar-item">
                    <svg class="dnt-icon-sm" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                    <span>info@ggisc.edu.bd</span>
                </div>
                <div class="dnt-topbar-item">
                    <svg class="dnt-icon-sm" viewBox="0 0 24 24"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                    <span>০১৩০০-০০০০০০</span>              
                </div>
            </div>
            <div class="dnt-topbar-right">
                <a href="#" class="dnt-topbar-link">শিক্ষা মন্ত্রণালয়</a>
                <span class="dnt-topbar-divider">|</span>
                <a href="#" class="dnt-topbar-link">মাধ্যমিক ও উচ্চ শিক্ষা অধিদপ্তর</a>
                <span class="dnt-topbar-divider">|</span>
                <a href="#" class="dnt-topbar-link">সিলেট শিক্ষা বোর্ড</a>
            </div>
        </div>
    </div>

    <!-- ==========================================
        BRANDBAR SECTION (Logo & Title)
        ========================================== -->
    <div class="dnt-brandbar">
        <div class="dnt-container dnt-brand-wrapper">
            
            <div class="dnt-brand-left">
                <!-- School Logo Image -->
                <div class="dnt-logo-container">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/logo.png' ); ?>" alt="GGISC Logo">
                    </a>
                </div>
                
                <div class="dnt-brand-text">
                    <h1 class="dnt-brand-title">Green Gems International School & College</h1>
                    <h2 class="dnt-brand-subtitle">Quality Education For Better Future</h2>
                </div>
            </div>

            <div class="dnt-brand-right">
                <div class="dnt-brand-auth-buttons" style="display: flex; gap: 10px; align-items: center;">
                    
                    <?php if ( is_user_logged_in() ) : 
                        $current_user = wp_get_current_user();
                        $first_letter = mb_substr( $current_user->display_name, 0, 1, 'utf-8' );
                        
                        // Dynamic Dashboard Routing Logic based on User Role
                        $dashboard_url = admin_url(); // Default fallback to WP Admin
                        $user_roles    = (array) $current_user->roles;

                        if ( in_array( 'student', $user_roles, true ) ) {
                            $dashboard_url = home_url( '/student-dashboard' );
                        } elseif ( in_array( 'guardian', $user_roles, true ) || in_array( 'parent', $user_roles, true ) ) {
                            $dashboard_url = home_url( '/guardian-dashboard' );
                        }
                    ?>
                        <!-- Logged In Badge with Clickable Profile Link -->
                        <div class="dnt-logged-in-badge" style="display: inline-flex; align-items: center; gap: 10px; background-color: #f8fafc; border: 1px solid #e2e8f0; padding: 6px 14px; border-radius: 30px; box-shadow: 0 1px 2px rgba(0,0,0,0.05);">
                            
                            <!-- Profile Link wrapper for avatar and display name -->
                            <a href="<?php echo esc_url( $dashboard_url ); ?>" style="display: inline-flex; align-items: center; gap: 8px; text-decoration: none;" title="<?php esc_attr_e( 'Go to Dashboard', 'ggisc' ); ?>">
                                <!-- Avatar Initial -->
                                <span class="dnt-avatar-name" style="width: 28px; height: 28px; background-color: #006a4e; color: #fff; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; font-weight: 700; font-size: 0.9rem;">
                                    <?php echo esc_html( $first_letter ); ?>
                                </span>
                                <!-- Display Name -->
                                <span style="font-size: 0.9rem; font-weight: 600; color: #1e293b; max-width: 120px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    <?php echo esc_html( $current_user->display_name ); ?>
                                </span>
                            </a>

                            <span style="color: #cbd5e1;">|</span>

                            <!-- Logout Link -->
                            <a href="<?php echo esc_url( wp_logout_url( home_url() ) ); ?>" style="color: #f42a41; text-decoration: none; font-size: 0.85rem; font-weight: 700; display: inline-flex; align-items: center; gap: 4px; transition: 0.2s;" onmouseover="this.style.opacity='0.8';" onmouseout="this.style.opacity='1';">
                                <svg viewBox="0 0 24 24" style="width: 14px; height: 14px; fill: none; stroke: currentColor; stroke-width: 2.5; stroke-linecap: round; stroke-linejoin: round;"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                <?php esc_html_e( 'লগআউট', 'ggisc' ); ?>
                            </a>
                        </div>

                    <?php else : ?>
                        <!-- Single Login Button for Logged-Out Users -->
                        <a href="<?php echo esc_url( home_url( '/custom-login' ) ); ?>" class="dnt-btn-portal-link" style="background-color: #006a4e; color: #fff; padding: 10px 20px; border-radius: 6px; text-decoration: none; font-size: 0.95rem; font-weight: 600; display: inline-flex; align-items: center; gap: 8px; box-shadow: 0 2px 4px rgba(0, 106, 78, 0.2); transition: 0.3s;" onmouseover="this.style.background='#00523c'; this.style.transform='translateY(-1px)';" onmouseout="this.style.background='#006a4e'; this.style.transform='translateY(0)';">
                            <svg viewBox="0 0 24 24" style="width: 16px; height: 16px; fill: currentColor;"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/></svg>
                            <?php esc_html_e( 'অ্যাকাউন্ট লগইন', 'ggisc' ); ?>
                        </a>
                    <?php endif; ?>

                </div>
            </div>

        </div>
    </div>

<!-- ==========================================
     NAVIGATION BAR SECTION
     ========================================== -->
<nav class="dnt-navbar">
    <div class="dnt-container dnt-nav-wrapper">
        
        <button class="dnt-mobile-toggle" aria-label="Toggle Menu">
            <svg class="dnt-icon-md" viewBox="0 0 24 24"><path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/></svg>
        </button>

        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'menu-1',
                'container'      => false,
                'menu_class'     => 'dnt-nav-menu',
                'fallback_cb'    => '__return_false',
                'walker'         => new DNT_Navbar_Walker(),
            )
        );
        ?>

    </div>
</nav>