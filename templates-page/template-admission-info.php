<?php 

/*
Template Name: Admission Info
*/

get_header(); ?>
    <!-- ৪. পেজ ব্যানার ও ব্রেডক্রাম্ব -->
    <section class="dnt-page-banner" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/img/breadcrumb.jpg');">
        <div class="dnt-container">
            <h1 class="dnt-page-title">ভর্তি তথ্য</h1>
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
                <span style="color:var(--dnt-color-gray-300);">ভর্তি তথ্য</span>
            </div>
        </div>
    </section>

    <!-- ৫. মেইন কন্টেন্ট সেকশন -->
    <section class="dnt-page-section">
        <div class="dnt-container dnt-page-grid">
            
            <!-- বাম পাশ: ভর্তি সংক্রান্ত মূল কন্টেন্ট -->
            <main class="dnt-page-content">
                <h2 class="dnt-section-heading">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 8px; vertical-align: text-bottom;"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><path d="M12 18v-6"/><path d="m9 15 3 3 3-3"/></svg>
                    একাদশ শ্রেণিতে ভর্তি বিজ্ঞপ্তি (২০২৬-২০২৭)
                </h2>
                
                <p class="dnt-intro-text">
                    Green Gems International School & College-এর ২০২৬-২০২৭ শিক্ষাবর্ষে একাদশ শ্রেণিতে (বিজ্ঞান, মানবিক ও ব্যবসায় শিক্ষা শাখা) ভর্তিচ্ছু শিক্ষার্থীদের জানাই আন্তরিক শুভেচ্ছা। গণপ্রজাতন্ত্রী বাংলাদেশ সরকারের শিক্ষা মন্ত্রণালয় ও ঢাকা শিক্ষা বোর্ডের সর্বশেষ ভর্তি নীতিমালা অনুসরণ করে সম্পূর্ণ অনলাইন প্রক্রিয়ার মাধ্যমে মেধা তালিকা ও পছন্দক্রমের ভিত্তিতে শিক্ষার্থী ভর্তি করা হবে।
                </p>

                <!-- গুরুত্বপূর্ণ নোটিশ অ্যালার্ট -->
                <div class="dnt-notice-alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 8px;"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><path d="M12 9v4"/><path d="M12 17h.01"/></svg>
                    <strong>জরুরি নির্দেশিকা:</strong> সকল আবেদনকারীকে সরকারি নির্ধারিত কেন্দ্রীয় ওয়েবসাইটে (xiclassadmission.gov.bd) পছন্দক্রমে "Green Gems International School & College" (EIIN: 123456) প্রথম তালিকায় রাখার জন্য পরামর্শ দেওয়া হলো।
                </div>

                <!-- শাখাভিত্তিক যোগ্যতা ও আসন সংখ্যা -->
                <h3 class="dnt-gb-category-title">শাখাভিত্তিক ভর্তির ন্যূনতম যোগ্যতা ও আসন</h3>
                <div class="dnt-gb-grid">
                    <div class="dnt-gb-card">
                        <div class="dnt-gb-img"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2v6h6"/><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="m12 18-2-8-2 8"/><path d="M10 16h4"/></svg></div>
                        <div class="dnt-gb-name">বিজ্ঞান শাখা</div>
                        <div class="dnt-gb-role">জিপিএ: ৫.০০</div>
                        <div class="dnt-gb-desc">আসন সংখ্যা: ১৫০টি<br>(উচ্চতর গণিত ও জীববিজ্ঞান আবশ্যক)</div>
                    </div>
                    <div class="dnt-gb-card">
                        <div class="dnt-gb-img"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><path d="M18.7 8l-5.1 5.1-2.6-2.6L7 14"/></svg></div>
                        <div class="dnt-gb-name">ব্যবসায় শিক্ষা</div>
                        <div class="dnt-gb-role">জিপিএ: ৪.০০</div>
                        <div class="dnt-gb-desc">আসন সংখ্যা: ১৫০টি<br>(এসএসসি সমমান পরীক্ষায় উত্তীর্ণ)</div>
                    </div>
                    <div class="dnt-gb-card">
                        <div class="dnt-gb-img"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg></div>
                        <div class="dnt-gb-name">মানবিক শাখা</div>
                        <div class="dnt-gb-role">জিপিএ: ৩.৫০</div>
                        <div class="dnt-gb-desc">আসন সংখ্যা: ১৫০টি<br>(এসএসসি সমমান পরীক্ষায় উত্তীর্ণ)</div>
                    </div>
                </div>

                <!-- ভর্তি কার্যক্রমের সময়সূচী -->
                <h3 class="dnt-gb-category-title">ভর্তি কার্যক্রমের গুরুত্বপূর্ণ সময়সূচী</h3>
                <div class="dnt-timeline-box">
                    <div class="dnt-info-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24" fill="none" stroke="var(--dnt-color-primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/><path d="M12 14h6"/><path d="M12 18h6"/></svg>
                        <div class="dnt-info-text"><h5>অনলাইন আবেদন গ্রহণ</h5><p>২৬ মে, ২০২৬ হতে ১৫ জুন, ২০২৬ পর্যন্ত।</p></div>
                    </div>
                    <div class="dnt-info-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24" fill="none" stroke="var(--dnt-color-primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                        <div class="dnt-info-text"><h5>১ম মেধা তালিকা প্রকাশ</h5><p>২৩ জুন, ২০২৬ (রাত ৮:০০ টা)।</p></div>
                    </div>
                    <div class="dnt-info-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24" fill="none" stroke="var(--dnt-color-primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        <div class="dnt-info-text"><h5>প্রাথমিক সিট নিশ্চয়ন</h5><p>২৪ জুন হতে ২৯ জুন, ২০২৬ এর মধ্যে (ফি প্রদান সাপেক্ষে)।</p></div>
                    </div>
                    <div class="dnt-info-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24" fill="none" stroke="var(--dnt-color-secondary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m22 20-.94-2.82a3 3 0 0 0-2.86-2.18H5.8a3 3 0 0 0-2.86 2.18L2 20"/><path d="M6 10H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-2"/><path d="M12 10v4"/><path d="M10 12h4"/></svg>
                        <div class="dnt-info-text"><h5>চূড়ান্ত ভর্তি ও ক্লাস শুরু</h5><p>ভর্তি: ০১-০৭ জুলাই | ক্লাস শুরু: ১০ জুলাই, ২০২৬।</p></div>
                    </div>
                </div>

                <!-- চূড়ান্ত ভর্তির প্রয়োজনীয় কাগজপত্র -->
                <h3 class="dnt-gb-category-title">চূড়ান্ত ভর্তির জন্য প্রয়োজনীয় কাগজপত্র</h3>
                <ul class="dnt-doc-list">
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg> <span>অনলাইন আবেদন ফরমের মূল কপি এবং সিট নিশ্চয়ন স্লিপ।</span></li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg> <span>এসএসসি/সমমান পরীক্ষার মূল নম্বরপত্র এবং এর ৩টি সত্যায়িত ফটোকপি।</span></li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg> <span>মূল প্রশংসাপত্র এবং এর ২টি ফটোকপি।</span></li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg> <span>শিক্ষার্থীর সদ্য তোলা পাসপোর্ট সাইজের রঙিন ছবি (৪ কপি)।</span></li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg> <span>পিতা ও মাতার NID এবং শিক্ষার্থীর অনলাইন জন্ম সনদের ফটোকপি।</span></li>
                </ul>
            </main>

            <?php get_sidebar();?>
        </div>
    </section>

<?php get_footer();?>