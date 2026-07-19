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
                    <img src="<?php echo get_template_directory_uri();?>/assets/img/logo.png" alt="GGISC Logo">
                </div>
                
                <div class="dnt-brand-text">
                    <h1 class="dnt-brand-title">Green Gems International School & College</h1>
                    <h2 class="dnt-brand-subtitle">Quality Education For Better Future</h2>
                </div>
            </div>

            <!-- EIIN and Location replaced with Login Buttons -->
            <div class="dnt-brand-right">
                <div class="dnt-brand-auth-buttons" style="display: flex; gap: 10px; align-items: center;">
                    <!-- Student Login Button -->
                    <a href="#" class="dnt-btn-student-login" style="background-color: #f42a41; color: #fff; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-size: 0.95rem; font-weight: 600; display: inline-flex; align-items: center; gap: 6px; box-shadow: 0 2px 4px rgba(244, 42, 65, 0.2); transition: 0.3s;" onmouseover="this.style.opacity='0.9'; this.style.transform='translateY(-1px)';" onmouseout="this.style.opacity='1'; this.style.transform='translateY(0)';">
                        <svg viewBox="0 0 24 24" style="width: 16px; height: 16px; fill: currentColor;"><path d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3zM5.18 9L12 5.28 18.82 9 12 12.72 5.18 9zM17 15.99l-5 2.73-5-2.73v-3.72L12 15l5-2.73v3.72z"/></svg>
                        শিক্ষার্থী লগইন
                    </a>
                    <!-- Guardian Login Button -->
                    <a href="#" class="dnt-btn-guardian-login" style="background-color: #006a4e; color: #fff; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-size: 0.95rem; font-weight: 600; display: inline-flex; align-items: center; gap: 6px; box-shadow: 0 2px 4px rgba(0, 106, 78, 0.2); transition: 0.3s;" onmouseover="this.style.background='#00523c'; this.style.transform='translateY(-1px)';" onmouseout="this.style.background='#006a4e'; this.style.transform='translateY(0)';">
                        <svg viewBox="0 0 24 24" style="width: 16px; height: 16px; fill: currentColor;"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
                        অভিভাবক লগইন
                    </a>
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
                'walker'         => new DNT_Navbar_Walker(), // Uses our custom layout mapping rules
            )
        );
        ?>

    </div>
</nav>