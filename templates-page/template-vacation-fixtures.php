<?php 

/*
Template Name: Vacation Fixture
*/

get_header(); ?>
    <!-- ৪. পেজ ব্যানার ও ব্রেডক্রাম্ব -->
    <section class="dnt-page-banner" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/img/breadcrumb.jpg');">
        <div class="dnt-container">
            <h1 class="dnt-page-title">ছুটির তালিকা</h1>
            <div class="dnt-breadcrumb">
                <a href="<?php echo site_url();?>">
                    <svg class="dnt-icon-inline" viewBox="0 0 24 24" width="16" height="16" fill="currentColor">
                        <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                    </svg> প্রথম পাতা
                </a> 
                <span>
                    <svg viewBox="0 0 24 24" width="12" height="12" fill="currentColor" style="opacity:0.7;">
                        <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
                    </svg>
                </span> 
                <span style="color:var(--dnt-color-gray-300);">ছুটির তালিকা</span>
            </div>
        </div>
    </section>

    <!-- ৫. মেইন কন্টেন্ট সেকশন -->
    <section class="dnt-page-section">
        <div class="dnt-container dnt-page-grid">
            
            <main class="dnt-page-content">
                <h2 class="dnt-section-heading"><i class="fa-solid fa-calendar-days"></i> শিক্ষাবর্ষের বিস্তারিত ছুটির তালিকা (২০২৬)</h2>
                <p class="dnt-intro-text">
                    শিক্ষা মন্ত্রণালয়ের প্রজ্ঞাপন অনুযায়ী আদর্শ উচ্চ বিদ্যালয় ও কলেজ-এর ২০২৬ শিক্ষাবর্ষের সরকারি ও অন্যান্য ছুটির তালিকা নিচে বিস্তারিতভাবে দেওয়া হলো। মনে রাখবেন, ক্লাস ও পরীক্ষার সাথে সামঞ্জস্য রেখে এই তালিকা সমন্বয় করা হয়েছে।
                </p>

                <!-- ছুটির ক্যাটাগরি কার্ড -->
                <div class="dnt-gb-grid">
                    <div class="dnt-gb-card">
                        <div class="dnt-gb-img"><i class="fa-solid fa-mosque"></i></div>
                        <div class="dnt-gb-name">ধর্মীয় ছুটি</div>
                        <div class="dnt-gb-desc">ঈদুল ফিতর, ঈদুল আযহা, দুর্গাপূজা, বুদ্ধ পূর্ণিমা ও বড়দিন ইত্যাদি।</div>
                    </div>
                    <div class="dnt-gb-card">
                        <div class="dnt-gb-img"><i class="fa-solid fa-flag"></i></div>
                        <div class="dnt-gb-name">জাতীয় দিবস</div>
                        <div class="dnt-gb-desc">শহীদ দিবস, স্বাধীনতা দিবস, বিজয় দিবস ও জাতীয় শোক দিবস।</div>
                    </div>
                    <div class="dnt-gb-card">
                        <div class="dnt-gb-img"><i class="fa-solid fa-sun"></i></div>
                        <div class="dnt-gb-name">ঋতুভিত্তিক ছুটি</div>
                        <div class="dnt-gb-desc">গ্রীষ্মকালীন অবকাশ, শীতকালীন অবকাশ ও বর্ষাকালীন বিরতি।</div>
                    </div>
                </div>

                <h3 class="dnt-gb-category-title">মাসিক ছুটির বিবরণী</h3>
                <div class="dnt-routine-table-wrapper">
                    <table class="dnt-routine-table">
                        <thead>
                            <tr>
                                <th>ছুটির নাম</th>
                                <th>শুরুর তারিখ</th>
                                <th>শেষের তারিখ</th>
                                <th>দিন</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>শহীদ দিবস</td><td>২১ ফেব্রুয়ারি</td><td>২১ ফেব্রুয়ারি</td><td>০১</td></tr>
                            <tr><td>স্বাধীনতা দিবস</td><td>২৬ মার্চ</td><td>২৬ মার্চ</td><td>০১</td></tr>
                            <tr><td>ঈদুল ফিতর</td><td>২০ মার্চ</td><td>২৫ মার্চ</td><td>০৬</td></tr>
                            <tr class="dnt-row-highlight"><td>গ্রীষ্মকালীন অবকাশ</td><td>০১ জুন</td><td>১০ জুন</td><td>১০</td></tr>
                            <tr><td>ঈদুল আযহা</td><td>২৬ জুন</td><td>৩০ জুন</td><td>০৫</td></tr>
                            <tr><td>জাতীয় শোক দিবস</td><td>১৫ আগস্ট</td><td>১৫ আগস্ট</td><td>০১</td></tr>
                            <tr><td>শারদীয় দুর্গাপূজা</td><td>২০ অক্টোবর</td><td>২৩ অক্টোবর</td><td>০৪</td></tr>
                            <tr><td>বিজয় দিবস</td><td>১৬ ডিসেম্বর</td><td>১৬ ডিসেম্বর</td><td>০১</td></tr>
                            <tr class="dnt-row-highlight"><td>শীতকালীন অবকাশ</td><td>২০ ডিসেম্বর</td><td>৩০ ডিসেম্বর</td><td>১১</td></tr>
                        </tbody>
                    </table>
                </div>

                <!-- সতর্কতা ও নির্দেশিকা -->
                <div class="dnt-notice-alert">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <strong>জরুরি নির্দেশিকা:</strong> 
                    <ul>
                        <li>চাঁদ দেখার উপর ভিত্তি করে সকল ধর্মীয় ছুটির তারিখ পরিবর্তন হতে পারে।</li>
                        <li>সরকারি নির্দেশে বিশেষ কোনো ছুটির ঘোষণা হলে তা দ্রুত ওয়েবসাইটের নোটিশ বোর্ডে জানিয়ে দেওয়া হবে।</li>
                        <li>পরীক্ষা চলাকালীন কোনো প্রকার ছুটির পরিবর্তন কার্যকর হবে না।</li>
                    </ul>
                </div>
            </main>

            <?php include ('sidebar.php');?>

        </div>
    </section>

<?php get_footer();?>