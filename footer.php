<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ggisc
 */

?>

    <footer class="dnt-footer">
        
        <div class="dnt-footer-top">
            <div class="dnt-container dnt-footer-grid">
                
                <!-- Column 1: Brand Info -->
                <div class="dnt-footer-brand">
                    <div class="dnt-footer-logo-wrapper">
                        <h2 class="dnt-footer-brand-title">আমাদের সম্পর্কে</h2>
                    </div>
                    <p class="dnt-footer-desc">
                        সিলেট অঞ্চলের শিক্ষা বিস্তারে অগ্রণী ভূমিকা পালন করে আসছে আমাদের এই প্রতিষ্ঠান। আমাদের উদ্দেশ্য কেবল ভালো ফলাফল নিশ্চিত করা নয়, বরং প্রতিটি শিক্ষার্থীকে নৈতিক মূল্যবোধসম্পন্ন ও প্রকৃত দেশপ্রেমিক নাগরিক হিসেবে গড়ে তোলা।
                    </p>
                    <div class="dnt-footer-social">
                        <!-- Facebook -->
                        <a href="#" class="dnt-fs-icon" aria-label="Facebook">
                            <svg class="dnt-icon-sm" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.04c-5.5 0-10 4.49-10 10.02 0 5 3.66 9.15 8.44 9.9v-7H7.9v-2.9h2.54V9.85c0-2.51 1.49-3.89 3.78-3.89 1.09 0 2.23.19 2.23.19v2.47h-1.26c-1.24 0-1.63.77-1.63 1.56v1.88h2.78l-.45 2.9h-2.33v7a10 10 0 0 0 8.44-9.9c0-5.53-4.5-10.02-10-10.02z"/></svg>
                        </a>
                        <!-- YouTube -->
                        <a href="#" class="dnt-fs-icon" aria-label="YouTube">
                            <svg class="dnt-icon-sm" viewBox="0 0 24 24" fill="currentColor"><path d="M21.58 7.19c-.23-.86-.91-1.54-1.77-1.77C18.25 5 12 5 12 5s-6.25 0-7.81.42c-.86.23-1.54.91-1.77 1.77C2 8.75 2 12 2 12s0 3.25.42 4.81c.23.86.91 1.54 1.77 1.77C5.75 19 12 19 12 19s6.25 0 7.81-.42c.86-.23 1.54-.91 1.77-1.77C22 15.25 22 12 22 12s0-3.25-.42-4.81zM10 15V9l5.2 3-5.2 3z"/></svg>
                        </a>
                        <!-- Twitter (X) -->
                        <a href="#" class="dnt-fs-icon" aria-label="Twitter">
                            <svg class="dnt-icon-sm" viewBox="0 0 24 24" fill="currentColor"><path d="M18.24 2.5H21.5L14.38 10.63L22.76 21.5H16.2L11.06 14.81L5.19 21.5H1.93L9.56 12.82L1.54 2.5H8.26L12.92 8.64L18.24 2.5ZM17.1 19.58H18.9L7.3 4.31H5.37L17.1 19.58Z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Column 2: Quick Links (Dynamic Menu: footer-1) -->
                <div class="dnt-footer-widget">
                    <h4>প্রয়োজনীয় লিংক</h4>
                    <?php
                    if ( has_nav_menu( 'footer-1' ) ) {
                        wp_nav_menu(
                            array(
                                'theme_location' => 'footer-1',
                                'container'      => false,
                                'menu_class'     => 'dnt-footer-links',
                                'fallback_cb'    => '__return_false',
                            )
                        );
                    } else {
                        echo '<ul class="dnt-footer-links"><li><a href="#">Dashboard -> Menus থেকে লিংক যুক্ত করুন</a></li></ul>';
                    }
                    ?>
                </div>

                <!-- Column 3: Academic Information (Dynamic Menu: footer-2) -->
                <div class="dnt-footer-widget">
                    <h4>একাডেমিক তথ্য</h4>
                    <?php
                    if ( has_nav_menu( 'footer-2' ) ) {
                        wp_nav_menu(
                            array(
                                'theme_location' => 'footer-2',
                                'container'      => false,
                                'menu_class'     => 'dnt-footer-links',
                                'fallback_cb'    => '__return_false',
                            )
                        );
                    } else {
                        echo '<ul class="dnt-footer-links"><li><a href="#">Dashboard -> Menus থেকে লিংক যুক্ত করুন</a></li></ul>';
                    }
                    ?>
                </div>

                <!-- Column 4: Contact Infographics -->
                <div class="dnt-footer-widget">
                    <h4>যোগাযোগ</h4>
                    <ul class="dnt-contact-list">
    <li>
        <!-- Location Icon -->
        <svg class="dnt-icon-sm dnt-contact-icon" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
        </svg>
        <span>বঙ্গবীর রোড, দক্ষিণ সুরমা,<br>সিলেট, বাংলাদেশ।</span>
    </li>
    <li>
        <!-- Phone Icon -->
        <svg class="dnt-icon-sm dnt-contact-icon" viewBox="0 0 24 24" fill="currentColor">
            <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
        </svg>
        <span><a href="tel:01755592295" style="color: inherit; text-decoration: none;">০১৭৫৫-৫৯২২৯৫ (হটলাইন)</a></span>
    </li>
    <li>
        <!-- Email Icon -->
        <svg class="dnt-icon-sm dnt-contact-icon" viewBox="0 0 24 24" fill="currentColor">
            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
        </svg>
        <span>
            <a href="mailto:info@ggisc.edu.bd" style="color: inherit; text-decoration: none;">info@ggisc.edu.bd</a><br>
            <a href="mailto:principal@ggisc.edu.bd" style="color: inherit; text-decoration: none;">principal@ggisc.edu.bd</a>
        </span>
    </li>
</ul>
                </div>

            </div>
        </div>
        
        <!-- Footer Bottom Bar (Dynamic Menu: footer-3) -->
        <div class="dnt-footer-bottom">
            <div class="dnt-container dnt-footer-bottom-wrapper">
                <p class="dnt-copyright">
                    &copy; <?php echo date_i18n( 'Y' ); ?> Green Gems International School & College. সর্বস্বত্ব সংরক্ষিত। 
                </p>
                <div class="dnt-footer-bottom-links">
                    <?php
                    if ( has_nav_menu( 'footer-3' ) ) {
                        wp_nav_menu(
                            array(
                                'theme_location' => 'footer-3',
                                'container'      => false,
                                'depth'          => 1,
                                'fallback_cb'    => '__return_false',
                            )
                        );
                    } else {
                        echo '<a href="#">গোপনীয়তা নীতি</a><a href="#">শর্তাবলি</a>';
                    }
                    ?>
                </div>
            </div>
        </div>        
    </footer>

<?php wp_footer(); ?>

</body>
</html>