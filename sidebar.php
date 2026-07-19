<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ggisc
 */

?>

<aside class="dnt-sidebar">
    <!-- ১. মেনু উইজেট (একাডেমিক/সম্পর্কে) -->
    <div class="dnt-widget">
        <div class="dnt-widget-header">
            <svg class="dnt-svg-icon dnt-icon-sm" style="margin-right: 8px; fill: white;" viewBox="0 0 24 24"><path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/></svg> 
            প্রধান মেনুসমূহ
        </div>
        <ul class="dnt-widget-menu">
            <li><a href="<?php echo esc_url( site_url( '/' ) ); ?>"><svg class="dnt-svg-icon dnt-icon-xs" style="margin-right: 8px; fill: currentColor;" viewBox="0 0 24 24"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg> প্রচ্ছদ পাতা</a></li>
            <li><a href="<?php echo esc_url( site_url( '/about/' ) ); ?>"><svg class="dnt-svg-icon dnt-icon-xs" style="margin-right: 8px; fill: currentColor;" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93z"/></svg> আমাদের পরিচিতি</a></li>
            <li><a href="<?php echo esc_url( site_url( '/admission-rules/' ) ); ?>"><svg class="dnt-svg-icon dnt-icon-xs" style="margin-right: 8px; fill: currentColor;" viewBox="0 0 24 24"><path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 2 2h12c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/></svg> ভর্তি নির্দেশিকা</a></li>
            <li><a href="<?php echo esc_url( site_url( '/notices/' ) ); ?>"><svg class="dnt-svg-icon dnt-icon-xs" style="margin-right: 8px; fill: currentColor;" viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg> একাডেমিক নোটিশবোর্ড</a></li>
            <li><a href="<?php echo esc_url( site_url( '/results/' ) ); ?>"><svg class="dnt-svg-icon dnt-icon-xs" style="margin-right: 8px; fill: currentColor;" viewBox="0 0 24 24"><path d="M7 14h2v2H7zm0-4h2v2H7zm0-4h2v2H7zm12 8h-8v-2h8v2zm0-4h-8v-2h8v2zm0-4h-8V6h8v2z"/></svg> পরীক্ষার ফলাফল</a></li>
            <li><a href="<?php echo esc_url( site_url( '/gallery/' ) ); ?>"><svg class="dnt-svg-icon dnt-icon-xs" style="margin-right: 8px; fill: currentColor;" viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg> ফটো গ্যালারি</a></li>
            <li><a href="<?php echo esc_url( site_url( '/contact/' ) ); ?>"><svg class="dnt-svg-icon dnt-icon-xs" style="margin-right: 8px; fill: currentColor;" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg> যোগাযোগ করুন</a></li>
        </ul>
    </div>

    <!-- নতুন সেকশন: প্রধান শিক্ষকের বাণী / বার্তা (Message Callout) -->
    <div class="dnt-widget">
        <div class="dnt-widget-header" style="background: #2c3e50;">
            <svg class="dnt-svg-icon dnt-icon-sm" style="margin-right: 8px; fill: white;" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
            অধ্যক্ষের বার্তা
        </div>
        <div class="dnt-info-box" style="padding: 15px; text-align: center;">
            <div class="dnt-avatar-placeholder" style="width: 100px; height: 100px; background: #e5e7eb; border-radius: 50%; margin: 0 auto 12px; display: flex; align-items: center; justify-content: center;">
                <svg class="dnt-svg-icon" style="width: 48px; height: 48px; fill: #9ca3af;" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
            </div>
            <h5 style="margin: 0 0 4px; font-size: 1rem; font-weight: 600; color: #111827;">অধ্যাপক মোঃ ফয়সল আহমদ</h5>
            <small style="color: #6b7280; display: block; margin-bottom: 10px;">অধ্যক্ষ, জিজিআইএসসি</small>
            <p style="margin: 0; font-size: 0.9rem; line-height: 1.5; color: #4b5563; text-align: justify;">
                "সুশিক্ষিত ও নৈতিক মূল্যবোধসম্পন্ন প্রজন্ম গড়াই আমাদের মূল লক্ষ্য। প্রযুক্তিনির্ভর আধুনিক শিক্ষাদানের মাধ্যমে আমরা শিক্ষার্থীদের বৈশ্বিক চ্যালেঞ্জের উপযোগী করে তুলছি..."
            </p>
            <a href="<?php echo esc_url( site_url( '/message-from-principal/' ) ); ?>" style="display: inline-block; margin-top: 10px; font-size: 0.85rem; color: var(--dnt-color-primary); font-weight: 600; text-decoration: none;">বিস্তারিত পড়ুন →</a>
        </div>
    </div>

    <!-- ২. একাডেমিক তথ্য -->
    <div class="dnt-widget">
        <div class="dnt-widget-header" style="background: var(--dnt-color-primary-dark);">
            <svg class="dnt-svg-icon dnt-icon-sm" style="margin-right: 8px; fill: white;" viewBox="0 0 24 24"><path d="M12 2l-7 7v11c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V9l-7-7zM7 19v-1h10v1H7zm14.53-6.46l-6.02-8.59c-.43-.61-1.12-.95-1.85-.95h-3.32c-.73 0-1.42.34-1.85.95l-6.02 8.59c-.48.69-.5 1.6-.05 2.31.45.71 1.23 1.15 2.07 1.15h15.02c.84 0 1.62-.44 2.07-1.15.45-.71.43-1.62-.05-2.31zM12 5.5l5.25 7.5H6.75L12 5.5z"/></svg> 
            একাডেমিক তথ্য
        </div>
        <ul class="dnt-widget-menu">
            <li><a href="<?php echo esc_url( site_url( '/admission/' ) ); ?>"><svg class="dnt-svg-icon dnt-icon-xs" style="margin-right: 8px; fill: currentColor;" viewBox="0 0 24 24"><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/></svg> অনলাইন ভর্তি সংক্রান্ত তথ্য</a></li>
            <li><a href="<?php echo esc_url( site_url( '/exam-routine/' ) ); ?>"><svg class="dnt-svg-icon dnt-icon-xs" style="margin-right: 8px; fill: currentColor;" viewBox="0 0 24 24"><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/></svg> পরীক্ষার সময়সূচী (রুটিন)</a></li>
            <li><a href="<?php echo esc_url( site_url( '/class-routine/' ) ); ?>"><svg class="dnt-svg-icon dnt-icon-xs" style="margin-right: 8px; fill: currentColor;" viewBox="0 0 24 24"><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/></svg> দৈনিক ক্লাস রুটিন</a></li>
            <li><a href="<?php echo esc_url( site_url( '/holiday-calendar/' ) ); ?>"><svg class="dnt-svg-icon dnt-icon-xs" style="margin-right: 8px; fill: currentColor;" viewBox="0 0 24 24"><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/></svg> বাৎসরিক ছুটির ক্যালেন্ডার</a></li>
            <li><a href="<?php echo esc_url( site_url( '/results-archive/' ) ); ?>"><svg class="dnt-svg-icon dnt-icon-xs" style="margin-right: 8px; fill: currentColor;" viewBox="0 0 24 24"><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/></svg> ফলাফল আর্কাইভ সিস্টেম</a></li>
        </ul>
    </div>

    <!-- নতুন সেকশন: অনলাইন গেটওয়ে / কুইক অ্যাকশন বাটন সমূহ -->
    <div class="dnt-widget">
        <div class="dnt-widget-header" style="background: #16a085;">
            <svg class="dnt-svg-icon dnt-icon-sm" style="margin-right: 8px; fill: white;" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/></svg>
            অনলাইন সার্ভিস পোর্টাল
        </div>
        <div class="dnt-info-box" style="padding: 12px; display: flex; flex-direction: column; gap: 8px;">
            <a href="<?php echo esc_url( site_url( '/student-login/' ) ); ?>" style="display: block; padding: 10px; background: #34495e; color: #fff; text-align: center; border-radius: 4px; text-decoration: none; font-weight: 600; font-size: 0.9rem;">
                🙋‍♂️ স্টুডেন্ট লগইন পোর্টাল
            </a>
            <a href="<?php echo esc_url( site_url( '/fees-payment/' ) ); ?>" style="display: block; padding: 10px; background: #e67e22; color: #fff; text-align: center; border-radius: 4px; text-decoration: none; font-weight: 600; font-size: 0.9rem;">
                💳 অনলাইন ফি প্রদান (Payment)
            </a>
        </div>
    </div>

    <!-- ৩. যোগাযোগ -->
    <div class="dnt-widget">
        <div class="dnt-widget-header" style="background: var(--dnt-color-secondary);">
            <svg class="dnt-svg-icon dnt-icon-sm" style="margin-right: 8px; fill: white;" viewBox="0 0 24 24"><path d="M21 16.42V19c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h2.58c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2c2.83 2.83 5.14 5.16 6.59 6.59l2.2-2.2c.28-.28.67-.36 1.02-.25.12.04.24.08.36.11.45.16.89.26 1.34.31.35.04.66.3.74.65l.65 2.82c.08.35-.11.72-.45.86z"/></svg> 
            জরুরী যোগাযোগ
        </div>
        <div class="dnt-info-box" style="padding: 15px;">
            <p style="margin-bottom: 12px; display: flex; align-items: center;"><svg class="dnt-svg-icon dnt-icon-sm" style="margin-right: 10px; fill: var(--dnt-color-primary); flex-shrink: 0;" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg> প্রধান ক্যাম্পাস, ভিআইপি রোড, সিলেট</p>
            <p style="margin-bottom: 12px; display: flex; align-items: center;"><svg class="dnt-svg-icon dnt-icon-sm" style="margin-right: 10px; fill: var(--dnt-color-primary); flex-shrink: 0;" viewBox="0 0 24 24"><path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56-.35-.12-.74-.03-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-1-.99H4c-.55 0-1 .45-1 1 0 9.39 7.61 17 17 17 .55 0 1-.45 1-1v-3.49c0-.55-.45-.99-1-.99z"/></svg> +৮৮০ ১৭০০-০০۰۰০০</p>
            <p style="margin-bottom: 0; display: flex; align-items: center;"><svg class="dnt-svg-icon dnt-icon-sm" style="margin-right: 10px; fill: var(--dnt-color-primary); flex-shrink: 0;" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg> info@gemsinternational.edu.bd</p>
        </div>
    </div>

    <!-- ৪. গুরুত্বপূর্ণ লিংক -->
    <div class="dnt-widget">
        <div class="dnt-widget-header" style="background: #34495e;">
            <svg class="dnt-svg-icon dnt-icon-sm" style="margin-right: 8px; fill: white;" viewBox="0 0 24 24"><path d="M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z"/></svg>
            গুরুত্বপূর্ণ লিংকসমূহ
        </div>
        <ul class="dnt-widget-menu">
            <li><a href="https://moedu.gov.bd/" target="_blank" rel="noopener noreferrer"><svg class="dnt-svg-icon dnt-icon-xs" style="margin-right: 8px; fill: currentColor;" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/></svg> শিক্ষা মন্ত্রণালয় (MoEdu)</a></li>
            <li><a href="https://www.dshe.gov.bd/" target="_blank" rel="noopener noreferrer"><svg class="dnt-svg-icon dnt-icon-xs" style="margin-right: 8px; fill: currentColor;" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/></svg> মাধ্যমিক ও উচ্চ শিক্ষা অধিদপ্তর</a></li>
            <li><a href="http://www.educationboard.gov.bd/" target="_blank" rel="noopener noreferrer"><svg class="dnt-svg-icon dnt-icon-xs" style="margin-right: 8px; fill: currentColor;" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/></svg> বাংলাদেশ শিক্ষা বোর্ডসমূহ</a></li>
        </ul>
    </div>
</aside>