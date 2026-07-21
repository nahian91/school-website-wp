<?php 
/*
Template Name: Home
*/

get_header(); 

global $wpdb;

// Dynamic Settings
$school_name = get_option( 'educore_school_name', 'গ্রীন জেমস ইন্টারন্যাশনাল স্কুল এন্ড কলেজ' );
$eiin_no     = get_option( 'educore_eiin_number', '130892' );
$school_logo = get_option( 'educore_school_logo', '' );

// Dynamic Live Statistics from EduCore Plugin Database
$total_students_count = $wpdb->get_var( "SELECT COUNT(id) FROM {$wpdb->prefix}sms_students WHERE status = 'Active'" );
$total_teachers_count = $wpdb->get_var( "SELECT COUNT(id) FROM {$wpdb->prefix}sms_staff WHERE status = 'Active' AND staff_type LIKE '%Teacher%'" );

$total_students = $total_students_count ? intval( $total_students_count ) : 2500;
$total_teachers = $total_teachers_count ? intval( $total_teachers_count ) : 75;

// Bengali Number Converter Helper
if ( ! function_exists( 'dnt_convert_to_bangla_nums' ) ) {
    function dnt_convert_to_bangla_nums( $str ) {
        $eng = array('0','1','2','3','4','5','6','7','8','9','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec','January','February','March','April','May','June','July','August','September','October','November','December');
        $ban = array('০','১','২','৩','৪','৫','৬','৭','৮','৯','জানু','ফেব্রু','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টে','অক্টো','নভে','ডিসে','জানুয়ারি','ফেব্রুয়ারি','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর');
        return str_replace($eng, $ban, $str);
    }
}
?>

<!-- News Ticker Section -->
<div class="dnt-news-ticker-section" 
     onmouseover="var m=this.querySelector('marquee'); if(m) m.stop();" 
     onmouseout="var m=this.querySelector('marquee'); if(m) m.start();" 
     style="display: flex; align-items: center; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 8px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.04); font-family: 'Hind Siliguri', system-ui, sans-serif; cursor: pointer;">
    
    <!-- Title Badge -->
    <div class="dnt-ticker-title" style="background: #006a4e; color: #ffffff; padding: 10px 18px; font-weight: 700; font-size: 0.95rem; display: flex; align-items: center; gap: 8px; white-space: nowrap; flex-shrink: 0; z-index: 2;">
        <svg class="dnt-icon-sm" viewBox="0 0 24 24" style="width:16px; height:16px; fill:currentColor;"><path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2zm-2 1H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v6z"/></svg>
        <?php esc_html_e( 'সর্বশেষ খবর', 'ggisc' ); ?>
    </div>

    <!-- Scrolling Viewport -->
    <div class="dnt-ticker-content" style="flex: 1; overflow: hidden; background: #f8fafc; padding: 8px 0; display: flex; align-items: center;">
        <marquee behavior="scroll" direction="left" scrollamount="5" style="vertical-align: middle;">
            <?php
            $table_notices = $wpdb->prefix . 'sms_notices';

            // Fetch latest 5 published notices
            $ticker_notices = $wpdb->get_results(
                $wpdb->prepare(
                    "SELECT * FROM {$table_notices} WHERE status = %s ORDER BY id DESC LIMIT 5",
                    'Published'
                )
            );

            if ( ! empty( $ticker_notices ) ) :
                foreach ( $ticker_notices as $notice ) :
                    $date_raw = ( ! empty( $notice->event_date ) && $notice->event_date !== '1970-01-01' ) 
                        ? $notice->event_date 
                        : $notice->created_at;

                    $formatted_date = date_i18n( 'j F, Y', strtotime( $date_raw ) );
                    $bangla_date    = dnt_convert_to_bangla_nums( $formatted_date );
                    $notice_url     = home_url( '/single-notice/?id=' . absint( $notice->id ) );
            ?>
                    <span style="display: inline-flex; align-items: center; margin-right: 35px; font-size: 0.95rem;">
                        <a href="<?php echo esc_url( $notice_url ); ?>" style="text-decoration: none; color: #1e293b; font-weight: 600; transition: color 0.2s;" onmouseover="this.style.color='#006a4e';" onmouseout="this.style.color='#1e293b';">
                            <strong style="color: #006a4e; margin-right: 5px;">[<?php echo esc_html( $bangla_date ); ?>]</strong>
                            <?php echo esc_html( $notice->title ); ?>
                        </a>
                        <span style="margin-left: 20px; color: #94a3b8;">✦</span>
                    </span>
            <?php 
                endforeach;
            else : 
            ?>
                <span style="font-size: 0.95rem; color: #64748b; font-weight: 600;">
                    <?php esc_html_e( 'প্রতিষ্ঠানের সকল সাম্প্রতিক নোটিশ জানতে ওয়েবসাইট ভিজিট করুন।', 'ggisc' ); ?>
                </span>
            <?php endif; ?>
        </marquee>
    </div>
</div>

<!-- Hero Section with Background Image -->
<section class="dnt-hero-section" style="
    position: relative; 
    background-image: linear-gradient(rgba(17, 24, 39, 0.85), rgba(17, 24, 39, 0.85)), url('https://images.unsplash.com/photo-1580582932707-520aed937b7b?q=80&w=1920&auto=format&fit=crop'); 
    background-size: cover; 
    background-position: center; 
    background-attachment: fixed;
    padding: 120px 0;
">
    <div class="dnt-container dnt-hero-content-wrapper" style="position: relative; z-index: 1;">
        <div class="dnt-hero-text-box">
            <div class="dnt-hero-badge">স্থাপিত: ২০১৭ ইং</div>
            <h1 class="dnt-hero-title">শিক্ষাই জাতির মেরুদণ্ড, <br><span>সুশিক্ষাই আমাদের ব্রত</span></h1>
            <p class="dnt-hero-desc">সুশৃঙ্খল পরিবেশ, অভিজ্ঞ শিক্ষকমণ্ডলী এবং আধুনিক শিক্ষা ব্যবস্থার সমন্বয়ে আপনার সন্তানের উজ্জ্বল ভবিষ্যৎ গড়তে <?php echo esc_html( $school_name ); ?> দৃঢ় প্রতিজ্ঞ।</p>
            
            <div class="dnt-hero-buttons">
                <a href="<?php echo esc_url( site_url('/admission') ); ?>" class="dnt-btn dnt-btn-primary dnt-btn-lg">
                    ভর্তি তথ্য জানুন
                    <svg class="dnt-icon-sm" viewBox="0 0 24 24" style="width: 20px; height: 20px; fill: currentColor; vertical-align: middle;"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg>
                </a>
                <a href="<?php echo esc_url( site_url('/contact') ); ?>" class="dnt-btn dnt-btn-accent dnt-btn-lg">
                    যোগাযোগ করুন
                </a>
            </div>
        </div>
    </div>
</section>

<div class="dnt-container dnt-main-wrapper">
    <main class="dnt-content-area">

        <!-- About Institution Section -->
        <div class="dnt-about-box">
            <div class="dnt-about-header">
                <div class="dnt-about-icon">
                    <svg class="dnt-icon-md" viewBox="0 0 24 24"><path d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3zm6.82 6L12 12.72 5.18 9 12 5.28 18.82 9zM17 15.99l-5 2.73-5-2.73v-3.72L12 15l5-2.73v3.72z"/></svg>
                </div>
                <h2 class="dnt-about-title"><?php echo esc_html( $school_name ); ?>-এ স্বাগতম</h2>
            </div>
            
            <p class="dnt-about-text">
                <?php echo esc_html( $school_name ); ?>, সিলেট বিভাগের সিলেট জেলার দক্ষিণ সুরমা উপজেলার প্রাণকেন্দ্রে অবস্থিত গ্রীন জেমস ইন্টারন্যাশনাল স্কুল অ্যান্ড কলেজ একটি আধুনিক, নৈতিক ও যুগোপযোগী শিক্ষা প্রতিষ্ঠান। “Quality Education for Better Future”—এই মহান প্রত্যয়কে ধারণ করে ২০১৭ সালে একদল স্বপ্নবান ও সমাজসচেতন উদ্যোক্তার হাত ধরে প্রতিষ্ঠানটির যাত্রা শুরু হয়।
            </p>
            <p class="dnt-about-text">
                আধুনিক ল্যাবরেটরি, সমৃদ্ধ লাইব্রেরি, প্রশস্ত খেলার মাঠ এবং ডিজিটাল ক্লাসরুমের মাধ্যমে আমরা যুগের সাথে তাল মিলিয়ে একটি আধুনিক শিক্ষা পরিবেশ নিশ্চিত করেছি।
            </p>

            <div class="dnt-about-features" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-top: 30px;">
                <div class="dnt-about-feature-item">
                    <svg class="dnt-icon dnt-icon-md" style="color:var(--dnt-color-primary); width: 32px; height: 32px;" viewBox="0 0 24 24"><path fill="currentColor" d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"></path></svg>
                    <div>
                        <h4>উন্নত শিক্ষা পরিবেশ</h4>
                        <p>নিরিবিলি ও কোলাহলমুক্ত পরিবেশে পাঠদান করা হয়।</p>
                    </div>
                </div>

                <div class="dnt-about-feature-item">
                    <svg class="dnt-icon dnt-icon-md" style="color:var(--dnt-color-primary); width: 32px; height: 32px;" viewBox="0 0 24 24"><path fill="currentColor" d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"></path></svg>
                    <div>
                        <h4>অভিজ্ঞ শিক্ষকমণ্ডলী</h4>
                        <p>উচ্চ শিক্ষিত ও প্রশিক্ষণপ্রাপ্ত শিক্ষক দ্বারা ক্লাস পরিচালিত হয়।</p>
                    </div>
                </div>

                <div class="dnt-about-feature-item">
                    <svg class="dnt-icon dnt-icon-md" style="color:var(--dnt-color-primary); width: 32px; height: 32px;" viewBox="0 0 24 24"><path fill="currentColor" d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zM7 7h10v2H7zm0 4h10v2H7zm0 4h7v2H7z"></path></svg>
                    <div>
                        <h4>ডিজিটাল ক্লাসরুম</h4>
                        <p>মাল্টিমিডিয়া প্রজেক্টর ও ইন্টারনেট সমৃদ্ধ ক্লাসরুম।</p>
                    </div>
                </div>

                <div class="dnt-about-feature-item">
                    <svg class="dnt-icon dnt-icon-md" style="color:var(--dnt-color-primary); width: 32px; height: 32px;" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm4.5-12.5l-6 6-3-3-1.5 1.5 4.5 4.5 7.5-7.5z"></path></svg>
                    <div>
                        <h4>সহ-শিক্ষা কার্যক্রম</h4>
                        <p>খেলাধুলা, বিতর্ক ও সাংস্কৃতিক কর্মকাণ্ডে নিয়মিত অংশগ্রহণ।</p>
                    </div>
                </div>
            </div>

            <div style="margin-top: 24px;">
                <a href="<?php echo esc_url( site_url('/about-us') ); ?>" class="dnt-btn dnt-btn-outline-primary">বিস্তারিত পড়ুন ➔</a>
            </div>
        </div>
    </main>

    <!-- RIGHT SIDEBAR -->
    <aside class="dnt-sidebar-area">
        <!-- Notice Board Widget -->
        <div class="dnt-widget">
            <div class="dnt-widget-header">
                <svg class="dnt-icon" viewBox="0 0 24 24"><path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/></svg>
                নোটিশ বোর্ড
            </div>
            
            <div class="dnt-widget-body" style="padding: 10px;">
                <div class="dnt-notice-scroller">
                    <?php
                    // Fetch latest 5 published notices from custom SMS table
                    $notices = $wpdb->get_results(
                        $wpdb->prepare(
                            "SELECT * FROM {$table_notices} 
                             WHERE status = %s AND (notice_type = %s OR notice_type = %s OR notice_type IS NULL)
                             ORDER BY id DESC 
                             LIMIT 5",
                            'Published',
                            'Notice',
                            'General'
                        )
                    );

                    if ( ! empty( $notices ) ) :
                        foreach ( $notices as $notice ) :
                            $date_raw   = ( ! empty( $notice->event_date ) && $notice->event_date !== '1970-01-01' ) 
                                ? $notice->event_date 
                                : $notice->created_at;
                            
                            $time_stamp = strtotime( $date_raw );
                            $day_eng    = date_i18n( 'd', $time_stamp );
                            $month_eng  = date_i18n( 'M', $time_stamp );

                            $day_bn     = dnt_convert_to_bangla_nums( $day_eng );
                            $month_bn   = dnt_convert_to_bangla_nums( $month_eng );

                            $view_url   = home_url( '/single-notice/?id=' . absint( $notice->id ) );
                    ?>
                        <div class="dnt-notice-item">
                            <div class="dnt-notice-date">
                                <span class="dnt-day"><?php echo esc_html( $day_bn ); ?></span>
                                <span class="dnt-month"><?php echo esc_html( $month_bn ); ?></span>
                            </div>
                            <div class="dnt-notice-content">
                                <h4>
                                    <a href="<?php echo esc_url( $view_url ); ?>">
                                        <?php echo esc_html( $notice->title ); ?>
                                    </a>
                                </h4>
                                <div class="dnt-notice-meta">
                                    <svg class="dnt-icon-sm" viewBox="0 0 24 24"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg>
                                    প্রকাশিত: <?php echo esc_html( human_time_diff( $time_stamp, current_time( 'timestamp' ) ) . ' আগে' ); ?>
                                </div>
                            </div>
                        </div>
                    <?php 
                        endforeach;
                    else : 
                    ?>
                        <p class="text-center text-muted my-3">কোনো নোটিশ পাওয়া যায়নি।</p>
                    <?php endif; ?>
                </div>
            </div>
                    
            <div class="dnt-widget-footer">
                <a href="<?php echo esc_url( home_url( '/notice' ) ); ?>">সকল নোটিশ দেখুন <svg class="dnt-icon-sm" viewBox="0 0 24 24"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg></a>
            </div>
        </div>
    </aside>
</div>

<!-- Speeches Section - 3 Box Layout -->
<div class="dnt-container" style="margin-top: 40px;">
    <div class="dnt-speech-box" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;"><!-- 1. Chairman Message Widget -->
        <div class="dnt-widget dnt-person-widget">
            <div class="dnt-widget-header dnt-widget-header-accent">
                <svg class="dnt-icon" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                চেয়ারম্যানের বাণী
            </div>
            <div class="dnt-widget-body" style="text-align: center; padding: 20px;">
                <div class="dnt-person-img-wrapper">
                    <img src="<?php echo get_template_directory_uri();?>/assets/img/chairman.jpg ?>">
                </div>
                <h3 class="dnt-person-name" style="font-size: 1.1rem; margin-bottom: 5px;">ডা. মো. আল মাহির ফেরদৌস</h3>
                <p class="dnt-person-designation" style="color: #6b7280; font-size: 0.9rem; margin-bottom: 10px;">চেয়ারম্যান</p>
                <p class="dnt-person-quote" style="font-size: 0.88rem; color: #4b5563; text-align: justify; line-height: 1.5;">
                    একবিংশ শতাব্দীর চ্যালেঞ্জ মোকাবিলায় শিক্ষা কেবল জ্ঞান অর্জনের মাধ্যম নয়; বরং এটি একটি মানবিক ও দায়িত্বশীল সমাজ গঠনের প্রধান ভিত্তি। ২০১৭ সালে "Quality Education for Better Future" মূলমন্ত্র নিয়ে প্রতিষ্ঠানটি যাত্রা শুরু করে। শিক্ষক, অভিভাবক ও পরিচালনা পর্ষদের সম্মিলিত প্রচেষ্টায় আমরা আন্তর্জাতিক মানসম্পন্ন শিক্ষা নিশ্চিত করতে প্রতিশ্রুতিবদ্ধ।
                </p>
                <a href="<?php echo esc_url( site_url('/chairman-speech') ); ?>" class="dnt-btn dnt-btn-outline-primary dnt-btn-sm" style="margin-top: 15px; display: inline-block;">সম্পূর্ণ বাণী ➔</a>
            </div>
        </div>

        <!-- 2. Managing Director Message Widget -->
        <div class="dnt-widget dnt-person-widget">
            <div class="dnt-widget-header dnt-widget-header-accent">
                <svg class="dnt-icon" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                ম্যানেজিং ডিরেক্টরের বাণী
            </div>
            <div class="dnt-widget-body" style="text-align: center; padding: 20px;">
                <div class="dnt-person-img-wrapper">
                    <img src="<?php echo get_template_directory_uri();?>/assets/img/md.jpg ?>">
                </div>
                <h3 class="dnt-person-name" style="font-size: 1.1rem; margin-bottom: 5px;">মো. আব্দুল ওয়াহিদ</h3>
                <p class="dnt-person-designation" style="color: #6b7280; font-size: 0.9rem; margin-bottom: 10px;">ম্যানেজিং ডিরেক্টর</p>
                <p class="dnt-person-quote" style="font-size: 0.88rem; color: #4b5563; text-align: justify; line-height: 1.5;">
                    একটি জাতির উন্নয়ন ও সমৃদ্ধির মূল ভিত্তি হলো আধুনিক ও নৈতিক শিক্ষা। কেবল একাডেমিক সাফল্য নয়; বরং প্রতিটি শিক্ষার্থীর মধ্যে সৃজনশীলতা, নেতৃত্বগুণ ও প্রযুক্তিগত দক্ষতা তৈরি করাই আমাদের মূল উদ্দেশ্য। সকলের আস্থা ও ভালোবাসাকে পাথেয় করে আমরা একটি আলোকিত ও সমৃদ্ধ ভবিষ্যতের দিকে এগিয়ে যাচ্ছি।
                </p>
                <a href="<?php echo esc_url( site_url('/principle-speech') ); ?>" class="dnt-btn dnt-btn-outline-primary dnt-btn-sm" style="margin-top: 15px; display: inline-block;">সম্পূর্ণ বাণী ➔</a>
            </div>
        </div>

        <!-- 3. Principal Message Widget -->
        <div class="dnt-widget dnt-person-widget">
            <div class="dnt-widget-header dnt-widget-header-accent">
                <svg class="dnt-icon" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                অধ্যক্ষের বাণী
            </div>
            <div class="dnt-widget-body" style="text-align: center; padding: 20px;">
                <div class="dnt-person-img-wrapper">
                    <img src="<?php echo get_template_directory_uri();?>/assets/img/principle.jpg ?>">
                </div>
                <h3 class="dnt-person-name" style="font-size: 1.1rem; margin-bottom: 5px;">মো. সিদ্দিকুর রহমান</h3>
                <p class="dnt-person-designation" style="color: #6b7280; font-size: 0.9rem; margin-bottom: 10px;">অধ্যক্ষ</p>
                <p class="dnt-person-quote" style="font-size: 0.88rem; color: #4b5563; text-align: justify; line-height: 1.5;">
                    শিক্ষা মানুষের জীবনের সবচেয়ে শক্তিশালী হাতিয়ার এবং বিদ্যালয় হলো শিশুর সুপ্ত প্রতিভা বিকাশের প্রাক-ক্ষেত্র। "Quality Education for Better Future" নীতিকে ধারন করে আমরা শিক্ষার্থীদের মধ্যে নৈতিকতা, সমালোচনামূলক চিন্তাভাবনা ও মানবিক মূল্যবোধ জাগ্রত করে আন্তর্জাতিক মানের নাগরিক হিসেব গড়ে তুলছি।
                </p>
                <a href="<?php echo esc_url( site_url('/principal-message') ); ?>" class="dnt-btn dnt-btn-outline-primary dnt-btn-sm" style="margin-top: 15px; display: inline-block;">সম্পূর্ণ বাণী ➔</a>
            </div>
        </div>

    </div>
</div>

<!-- Live Stats Counter Section -->
<div class="dnt-container" style="margin-top: 40px;">
    <div class="dnt-stats-wrapper">
        <div class="dnt-stats-pattern"></div>
        <div class="dnt-stats-grid">
            <div class="dnt-stat-box">
                <svg class="dnt-stat-icon" viewBox="0 0 24 24"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
                <div class="dnt-stat-number"><?php echo esc_html( $total_students ); ?>+</div>
                <div class="dnt-stat-label">সর্বমোট শিক্ষার্থী</div>
            </div>
            <div class="dnt-stat-box">
                <svg class="dnt-stat-icon" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                <div class="dnt-stat-number"><?php echo esc_html( $total_teachers ); ?>+</div>
                <div class="dnt-stat-label">অভিজ্ঞ শিক্ষক</div>
            </div>
            <div class="dnt-stat-box">
                <svg class="dnt-stat-icon" viewBox="0 0 24 24"><path d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3zm6.82 6L12 12.72 5.18 9 12 5.28 18.82 9zM17 15.99l-5 2.73-5-2.73v-3.72L12 15l5-2.73v3.72z"/></svg>
                <div class="dnt-stat-number">৬০+</div>
                <div class="dnt-stat-label">শ্রেণিকক্ষ ও ল্যাব</div>
            </div>
            <div class="dnt-stat-box">
                <svg class="dnt-stat-icon" viewBox="0 0 24 24"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"/></svg>
                <div class="dnt-stat-number">৯৮%</div>
                <div class="dnt-stat-label">পাসের হার (বোর্ড)</div>
            </div>
        </div>
    </div>
</div>

<!-- Facilities Section -->
<section class="dnt-facilities-section" style="padding: 60px 0; background-color: #fff;">
    <div class="dnt-container">
        <div class="dnt-section-title-wrapper" style="text-align: center; margin-bottom: 50px;">
            <h2 style="font-size: 2.2rem; color: #004d38; margin-bottom: 15px;">ভৌত অবকাঠামো ও সুবিধাসমূহ</h2>
            <p class="dnt-section-subtitle" style="color: #6b7280; font-size: 1.1rem;">শিক্ষার্থীদের পাঠদানের পাশাপাশি মানসিক ও শারীরিক বিকাশের জন্য আমাদের রয়েছে আধুনিক ও যুগোপযোগী সকল সুযোগ-সুবিধা।</p>
        </div>

        <div class="dnt-facility-grid" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 30px;">
            <div class="dnt-facility-card" style="background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 8px; text-align: center; padding: 30px 20px; transition: 0.3s; border-bottom: 4px solid #006a4e;">
                <div class="dnt-facility-icon" style="width: 70px; height: 70px; background: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                    <svg style="width:35px; height:35px; color:#006a4e;" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2l-7 7v11c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V9l-7-7zM7 19v-1h10v1H7zm14.53-6.46l-6.02-8.59c-.43-.61-1.12-.95-1.85-.95h-3.32c-.73 0-1.42.34-1.85.95l-6.02 8.59c-.48.69-.5 1.6-.05 2.31.45.71 1.23 1.15 2.07 1.15h15.02c.84 0 1.62-.44 2.07-1.15.45-.71.43-1.62-.05-2.31zM12 5.5l5.25 7.5H6.75L12 5.5z"/></svg>
                </div>
                <h3 style="font-size: 1.3rem; color: #111827; margin-bottom: 10px;">আধুনিক বিজ্ঞানাগার</h3>
                <p style="color: #4b5563; font-size: 0.95rem; margin-bottom: 20px;">উন্নত যন্ত্রপাতি সমৃদ্ধ বিজ্ঞানাগার, যেখানে হাতে কলমে শিক্ষা দেওয়া হয়।</p>
                <a href="#" class="dnt-btn dnt-btn-outline" style="padding: 8px 15px; font-size: 0.85rem; border: 1px solid #006a4e; color: #006a4e; border-radius: 4px; text-decoration: none;">বিস্তারিত দেখুন</a>
            </div>

            <div class="dnt-facility-card" style="background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 8px; text-align: center; padding: 30px 20px; transition: 0.3s; border-bottom: 4px solid #006a4e;">
                <div class="dnt-facility-icon" style="width: 70px; height: 70px; background: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                    <svg style="width:35px; height:35px; color:#006a4e;" viewBox="0 0 24 24"><path fill="currentColor" d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z"/></svg>
                </div>
                <h3 style="font-size: 1.3rem; color: #111827; margin-bottom: 10px;">সমৃদ্ধ গ্রন্থাগার</h3>
                <p style="color: #4b5563; font-size: 0.95rem; margin-bottom: 20px;">হাজারো বইয়ের সমাহারে সজ্জিত লাইব্রেরি যা শিক্ষার্থীদের জ্ঞানপিপাসা মেটায়।</p>
                <a href="#" class="dnt-btn dnt-btn-outline" style="padding: 8px 15px; font-size: 0.85rem; border: 1px solid #006a4e; color: #006a4e; border-radius: 4px; text-decoration: none;">বিস্তারিত দেখুন</a>
            </div>

            <div class="dnt-facility-card" style="background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 8px; text-align: center; padding: 30px 20px; transition: 0.3s; border-bottom: 4px solid #006a4e;">
                <div class="dnt-facility-icon" style="width: 70px; height: 70px; background: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                    <svg style="width:35px; height:35px; color:#006a4e;" viewBox="0 0 24 24"><path fill="currentColor" d="M21 2H3c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h7l-2 3v1h8v-1l-2-3h7c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 12H3V4h18v10z"/></svg>
                </div>
                <h3 style="font-size: 1.3rem; color: #111827; margin-bottom: 10px;">কম্পিউটার ল্যাব</h3>
                <p style="color: #4b5563; font-size: 0.95rem; margin-bottom: 20px;">হাই-স্পিড ইন্টারনেট ও আধুনিক কম্পিউটার সম্বলিত আইসিটি ল্যাব।</p>
                <a href="#" class="dnt-btn dnt-btn-outline" style="padding: 8px 15px; font-size: 0.85rem; border: 1px solid #006a4e; color: #006a4e; border-radius: 4px; text-decoration: none;">বিস্তারিত দেখুন</a>
            </div>

            <div class="dnt-facility-card" style="background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 8px; text-align: center; padding: 30px 20px; transition: 0.3s; border-bottom: 4px solid #006a4e;">
                <div class="dnt-facility-icon" style="width: 70px; height: 70px; background: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                    <svg style="width:35px; height:35px; color:#006a4e;" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z"/></svg>
                </div>
                <h3 style="font-size: 1.3rem; color: #111827; margin-bottom: 10px;">বিশাল খেলার মাঠ</h3>
                <p style="color: #4b5563; font-size: 0.95rem; margin-bottom: 20px;">শারীরিক বিকাশের জন্য বিশাল খেলার মাঠ, যেখানে নিয়মিত ক্রীড়া আয়োজিত হয়।</p>
                <a href="#" class="dnt-btn dnt-btn-outline" style="padding: 8px 15px; font-size: 0.85rem; border: 1px solid #006a4e; color: #006a4e; border-radius: 4px; text-decoration: none;">বিস্তারিত দেখুন</a>
            </div>
        </div>
    </div>
</section>

<!-- Upcoming Events Section -->
<section class="dnt-events-section" style="padding: 60px 0;">
    <div class="dnt-container">
        <div class="dnt-section-title-wrapper" style="text-align:center; margin-bottom:40px;">
            <h2 style="color: #004d38; font-size: 2rem;">আসন্ন ইভেন্টসমূহ</h2>
        </div>

        <div class="dnt-event-grid" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px;">
    <?php
    // Fetch Latest 4 Published Academic Events
    $events = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT * FROM {$table_notices} 
             WHERE status = %s AND notice_type = %s 
             ORDER BY id DESC 
             LIMIT 4",
            'Published',
            'Event'
        )
    );

    // Default Fallback Image Stock
    $default_images = array(
        'https://images.unsplash.com/photo-1461896836934-ffe607ba8211?q=80&w=400',
        'https://images.unsplash.com/photo-1532094349884-543bc11b234d?q=80&w=400',
        'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?q=80&w=400',
        'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=400'
    );

    if ( ! empty( $events ) ) :
        $img_index = 0;
        foreach ( $events as $event ) :
            $img_url = ! empty( $event->attachment_url ) ? $event->attachment_url : $default_images[$img_index % 4];
            $img_index++;

            $event_date_raw = ( ! empty( $event->event_date ) && $event->event_date !== '1970-01-01' ) 
                ? $event->event_date 
                : $event->created_at;

            $formatted_date = date_i18n( 'j F, Y', strtotime( $event_date_raw ) );
            $bangla_date    = dnt_convert_to_bangla_nums( $formatted_date );

            $event_url = home_url( '/single-event/?id=' . absint( $event->id ) );
    ?>
            <div class="dnt-event-item" style="border: 1px solid #eef2f6; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.04);">
                <a href="<?php echo esc_url( $event_url ); ?>" style="text-decoration: none; color: inherit;">
                    <div class="dnt-event-img" style="background-image: url('<?php echo esc_url( $img_url ); ?>'); height: 160px; background-size: cover; background-position: center; border-radius: 8px 8px 0 0;"></div>
                    <div class="dnt-event-content" style="padding: 15px; background: #fff;">
                        <h4 style="font-size: 1.1rem; margin-bottom: 8px; color: #1e293b; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;">
                            <?php echo esc_html( $event->title ); ?>
                        </h4>
                        <p style="color: #6b7280; font-size: 0.85rem; margin: 0; display: flex; align-items: center; gap: 6px;">
                            <svg class="dnt-svg-icon dnt-icon-xs" viewBox="0 0 24 24" style="width: 14px; height: 14px;"><path fill="currentColor" d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10z"/></svg> 
                            <?php echo esc_html( $bangla_date ); ?>
                        </p>
                    </div>
                </a>
            </div>
    <?php 
        endforeach;
    else : 
    ?>
        <div style="grid-column: span 4; text-align: center; padding: 40px; background: #fff; border-radius: 8px; color: #64748b;">
            <p>কোনো সাম্প্রতিক একাডেমি ইভেন্ট পাওয়া যায়নি।</p>
        </div>
    <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>