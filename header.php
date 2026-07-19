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
                    <span>info@adarshaschool.edu.bd</span>
                </div>
                <div class="dnt-topbar-item">
                    <svg class="dnt-icon-sm" viewBox="0 0 24 24"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                    <span>০১৭০০-০০০০০০</span>               
                </div>
            </div>
            <div class="dnt-topbar-right">
                <a href="#" class="dnt-topbar-link">শিক্ষা মন্ত্রণালয়</a>
                <span class="dnt-topbar-divider">|</span>
                <a href="#" class="dnt-topbar-link">মাধ্যমিক ও উচ্চ শিক্ষা অধিদপ্তর</a>
                <span class="dnt-topbar-divider">|</span>
                <a href="#" class="dnt-topbar-link">ঢাকা শিক্ষা বোর্ড</a>
            </div>
        </div>
    </div>

    <!-- ==========================================
         BRANDBAR SECTION (Logo & Title)
         ========================================== -->
    <div class="dnt-brandbar">
        <div class="dnt-container dnt-brand-wrapper">
            
            <div class="dnt-brand-left">
                <!-- School Logo SVG -->
                <div class="dnt-logo-container">
                    <svg class="dnt-logo-svg" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                        <!-- Outer Circles -->
                        <circle cx="100" cy="100" r="95" fill="none" stroke="#006a4e" stroke-width="6"/>
                        <circle cx="100" cy="100" r="85" fill="#e6f3ef" stroke="#fbc02d" stroke-width="4"/>
                        <!-- Inner Shield/Book Motif -->
                        <path d="M100 40 L150 60 L150 120 C150 150 100 170 100 170 C100 170 50 150 50 120 L50 60 Z" fill="#006a4e"/>
                        <path d="M100 60 L140 80 L100 100 L60 80 Z" fill="#fbc02d"/>
                        <path d="M60 90 L100 110 L140 90 L140 120 C140 140 100 155 100 155 C100 155 60 140 60 120 Z" fill="#f42a41"/>
                        <!-- Text -->
                        <path id="curve" d="M 40 100 A 60 60 0 0 1 160 100" fill="transparent"/>
                        <text font-family="sans-serif" font-size="16" fill="#004d38" font-weight="bold">
                            <textPath href="#curve" startOffset="50%" text-anchor="middle">স্থাপিত - ১৯৬০</textPath>
                        </text>
                    </svg>
                </div>
                
                <div class="dnt-brand-text">
                    <h1 class="dnt-brand-title">আদর্শ উচ্চ বিদ্যালয় ও কলেজ</h1>
                    <h2 class="dnt-brand-subtitle">Adarsha High School & College</h2>
                </div>
            </div>

            <!-- EIIN and Codes moved to the right -->
            <div class="dnt-brand-right">
                <div class="dnt-brand-codes">
                    <span><strong>EIIN:</strong> 123456</span>
                    <span class="dnt-code-divider">|</span>
                    <span><strong>স্কুল কোড:</strong> 1234</span>
                    <span class="dnt-code-divider">|</span>
                    <span><strong>কলেজ কোড:</strong> 5678</span>
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