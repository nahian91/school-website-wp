<?php 

/*
Template Name: Contact
*/

get_header(); ?>

    <!-- ৪. পেজ ব্যানার ও ব্রেডক্রাম্ব -->
    <section class="dnt-page-banner" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/img/breadcrumb.jpg');">
        <div class="dnt-container">
            <h1 class="dnt-page-title">যোগাযোগ করুন</h1>
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
                <span style="color:var(--dnt-color-gray-300);">যোগাযোগ</span>
            </div>
        </div>
    </section>

    <!-- ৫. মেইন কন্টেন্ট সেকশন -->
    <section class="dnt-page-section">
        <div class="dnt-container dnt-page-grid">
            
            <!-- বাম পাশ: যোগাযোগের মূল তথ্য ও ফর্ম -->
            <main class="dnt-page-content">
                <h2 class="dnt-section-heading">
                    <svg class="dnt-icon-heading" viewBox="0 0 24 24" width="24" height="24" fill="currentColor" style="vertical-align: middle; margin-right: 8px;">
                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                    </svg>
                    যোগাযোগের বিবরণ
                </h2>
                
                <!-- কন্টাক্ট ইনফো কার্ড গ্রিড -->
                <div class="dnt-contact-info-grid">
                    <div class="dnt-contact-card">
                        <div class="dnt-contact-card-icon">
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                            </svg>
                        </div>
                        <div class="dnt-contact-card-details">
                            <h4>প্রতিষ্ঠানের ঠিকানা</h4>
                            <p>বঙ্গবীর রোড, দক্ষিণ সুরমা,<br>সিলেট, বাংলাদেশ।</p>
                        </div>
                    </div>
                    
                    <div class="dnt-contact-card">
                        <div class="dnt-contact-card-icon">
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                            </svg>
                        </div>
                        <div class="dnt-contact-card-details">
                            <h4>ফোন ও মোবাইল</h4>
                            <p>হটলাইন: <a href="tel:+8801755592295" style="color: inherit; text-decoration: none;">+880 1755-592295</a></p>
                        </div>
                    </div>

                    <div class="dnt-contact-card">
                        <div class="dnt-contact-card-icon">
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                            </svg>
                        </div>
                        <div class="dnt-contact-card-details">
                            <h4>ইমেইল ঠিকানা</h4>
                            <p>
                                <a href="mailto:ggisc.syl@gmail.com" style="color: inherit; text-decoration: none;">ggisc.syl@gmail.com</a>
                            </p>
                        </div>
                    </div>

                    <div class="dnt-contact-card">
                        <div class="dnt-contact-card-icon">
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                                <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z"/><path d="M12.5 7H11v6l5.25 3.15.75-1.23-4.5-2.67z"/>
                            </svg>
                        </div>
                        <div class="dnt-contact-card-details">
                            <h4>অফিস সময়সূচি</h4>
                            <p>রবিবার - বৃহস্পতিবার<br>সকাল ০৯:০০ টা - বিকাল ০৪:০০ টা</p>
                        </div>
                    </div>
                </div>

                <!-- যোগাযোগ ফর্ম -->
                <h2 class="dnt-section-heading" style="margin-top: 40px;">
                    <svg class="dnt-icon-heading" viewBox="0 0 24 24" width="24" height="24" fill="currentColor" style="vertical-align: middle; margin-right: 8px;">
                        <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
                    </svg>
                    অনলাইন অনুসন্ধান ও জিজ্ঞাসা
                </h2>
                <div class="dnt-contact-form-wrapper">
                    <form action="#" method="POST">
                        <div class="dnt-form-grid">
                            <div class="dnt-form-group">
                                <label for="contact-name">আপনার পূর্ণ নাম <span>*</span></label>
                                <input type="text" id="contact-name" name="contact-name" class="dnt-form-control" placeholder="উদাঃ আব্দুল্লাহ নাহিয়ান" required>
                            </div>
                            <div class="dnt-form-group">
                                <label for="contact-phone">সক্রিয় মোবাইল নম্বর <span>*</span></label>
                                <input type="tel" id="contact-phone" name="contact-phone" class="dnt-form-control" placeholder="উদাঃ ০১৭৫৫-৫৯২২৯৫" required>
                            </div>
                            <div class="dnt-form-group" style="grid-column: span 2;">
                                <label for="contact-email">ইমেইল ঠিকানা (যদি থাকে)</label>
                                <input type="email" id="contact-email" name="contact-email" class="dnt-form-control" placeholder="উদাঃ nahian@example.com">
                            </div>
                            <div class="dnt-form-group" style="grid-column: span 2;">
                                <label for="contact-subject">বার্তার মূল বিষয় <span>*</span></label>
                                <input type="text" id="contact-subject" name="contact-subject" class="dnt-form-control" placeholder="উদাঃ একাদশ শ্রেণীতে ভর্তি সংক্রান্ত তথ্য" required>
                            </div>
                            <div class="dnt-form-group" style="grid-column: span 2;">
                                <label for="contact-message">আপনার বিস্তারিত তথ্য বা মতামত লিখুন <span>*</span></label>
                                <textarea id="contact-message" name="contact-message" class="dnt-form-control" placeholder="এখানে আপনার মতামত, জিজ্ঞাসা বা অভিযোগ বিস্তারিতভাবে লিখুন..." required></textarea>
                            </div>
                        </div>
                        <div class="dnt-form-actions">
                            <button type="reset" class="dnt-btn dnt-btn-secondary">
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor" style="vertical-align: middle; margin-right: 4px;">
                                    <path d="M17.65 6.35C16.2 4.9 14.21 4 12 4c-4.42 0-7.99 3.58-7.99 8s3.57 8 7.99 8c3.73 0 6.84-2.55 7.73-6h-2.08c-.82 2.33-3.04 4-5.65 4-3.31 0-6-2.69-6-6s2.69-6 6-6c1.66 0 3.14.69 4.22 1.78L13 11h7V4l-2.35 2.35z"/>
                                </svg> রিসেট করুন
                            </button>
                            <button type="submit" class="dnt-btn dnt-btn-primary">
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor" style="vertical-align: middle; margin-right: 4px;">
                                    <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
                                </svg> সাবমিট করুন
                            </button>
                        </div>
                    </form>
                </div>

                <!-- গুগল ম্যাপ লোকেশন এরিয়া (লাইভ আইফ্রেম যুক্ত) -->
                <h2 class="dnt-section-heading" style="margin-top: 40px;">
                    <svg class="dnt-icon-heading" viewBox="0 0 24 24" width="24" height="24" fill="currentColor" style="vertical-align: middle; margin-right: 8px;">
                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                    </svg>
                    ডিজিটাল ম্যাপে আমাদের অবস্থান
                </h2>
                <div class="dnt-map-container" style="border-radius: 8px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #e5e7eb;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14480.201416809312!2d91.85501865!3d24.86212175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x37505a41be7f0bb7%3A0x6a1f81014a098864!2sBangobir%20Rd%2C%20Sylhet!5e0!3m2!1sen!2sbd!4v1710000000000!5m2!1sen!2sbd" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </main>

            <?php get_sidebar();?>

        </div>
    </section>

<?php get_footer(); ?>