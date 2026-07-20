<?php include ('header.php');?>

<!-- ==========================================================================
     CSS FOR SINGLE EVENT PAGE (আপনার স্টাইলশিটে বা হেডারে রাখতে পারেন)
     ========================================================================== -->
<style>
    /* Page Layout */
    .dnt-page-section { padding: 80px 0; background: #f0f2f5; }
    .dnt-page-grid { display: grid; grid-template-columns: 1fr 350px; gap: 40px; }

    /* Left Content - Event Details */
    .dnt-event-details-wrapper { background: var(--dnt-color-white); border-radius: var(--dnt-radius-md); box-shadow: var(--dnt-shadow-sm); border: 1px solid var(--dnt-color-gray-200); overflow: hidden; }
    .dnt-event-banner-img { width: 100%; height: 400px; object-fit: cover; border-radius: 0; display: block; }
    .dnt-event-body { padding: 40px; }
    
    /* Meta Bar */
    .dnt-event-meta-bar { display: flex; flex-wrap: wrap; gap: 20px; background: var(--dnt-color-gray-50); padding: 25px; border-radius: var(--dnt-radius-md); margin-bottom: 35px; border-left: 5px solid var(--dnt-color-primary); }
    .dnt-event-meta-item { display: flex; align-items: center; gap: 15px; flex: 1; min-width: 200px; }
    .dnt-event-meta-icon { width: 50px; height: 50px; background: var(--dnt-color-white); color: var(--dnt-color-primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: var(--dnt-shadow-sm); flex-shrink: 0;}
    .dnt-event-meta-text h4 { font-size: 0.9rem; color: var(--dnt-color-gray-500); margin-bottom: 2px; text-transform: uppercase; margin-top:0;}
    .dnt-event-meta-text p { font-size: 1.1rem; color: var(--dnt-color-gray-900); font-weight: bold; margin-bottom: 0; line-height: 1.2; }

    /* Event Content */
    .dnt-event-title { font-size: 2.2rem; color: var(--dnt-color-primary-dark); margin-bottom: 20px; font-weight: 800; line-height: 1.3;}
    .dnt-event-desc { font-size: 1.05rem; color: var(--dnt-color-gray-700); line-height: 1.8; margin-bottom: 30px; text-align: justify; }

    /* Agenda / Schedule */
    .dnt-event-agenda { margin-top: 40px; }
    .dnt-event-agenda h3 { font-size: 1.5rem; color: var(--dnt-color-gray-900); margin-bottom: 20px; display: flex; align-items: center; gap: 10px; border-bottom: 2px solid var(--dnt-color-gray-100); padding-bottom: 10px; }
    .dnt-event-agenda h3 .dnt-svg-icon { color: var(--dnt-color-secondary); }
    
    .dnt-agenda-list { list-style: none; padding: 0; margin: 0; position: relative; }
    .dnt-agenda-list::before { content: ''; position: absolute; left: 15px; top: 0; bottom: 0; width: 2px; background: var(--dnt-color-gray-200); }
    
    .dnt-agenda-item { display: flex; gap: 25px; margin-bottom: 25px; position: relative; }
    .dnt-agenda-time { width: 120px; font-weight: bold; color: var(--dnt-color-primary); font-size: 1.05rem; background: var(--dnt-color-white); padding-right: 10px; text-align: right; }
    .dnt-agenda-marker { position: absolute; left: 11px; top: 5px; width: 10px; height: 10px; background: var(--dnt-color-secondary); border-radius: 50%; box-shadow: 0 0 0 4px var(--dnt-color-white); }
    .dnt-agenda-detail { flex: 1; background: var(--dnt-color-gray-50); padding: 15px 20px; border-radius: var(--dnt-radius-sm); border: 1px solid var(--dnt-color-gray-200); }
    .dnt-agenda-detail h4 { color: var(--dnt-color-gray-900); margin-top: 0; margin-bottom: 5px; font-size: 1.1rem; }
    .dnt-agenda-detail p { color: var(--dnt-color-gray-600); margin-bottom: 0; font-size: 0.95rem; }

    /* CTA Box */
    .dnt-event-cta { margin-top: 50px; background: var(--dnt-color-primary-light); padding: 30px; border-radius: var(--dnt-radius-md); text-align: center; border: 1px dashed var(--dnt-color-primary); }
    .dnt-event-cta h3 { color: var(--dnt-color-primary-dark); margin-top: 0; margin-bottom: 10px; }
    .dnt-event-cta p { color: var(--dnt-color-gray-700); margin-bottom: 20px; }

    /* Responsive */
    @media (max-width: 992px) {
        .dnt-page-grid { grid-template-columns: 1fr; }
        .dnt-agenda-item { flex-direction: column; gap: 10px; }
        .dnt-agenda-time { text-align: left; background: transparent; padding-left: 30px; }
        .dnt-agenda-marker { left: 0; }
    }
</style>

<!-- ==========================================================================
     PAGE BREADCRUMB BANNER
     ========================================================================== -->
<section class="dnt-page-banner">
    <div class="dnt-container">
        <h1 class="dnt-page-title">ইভেন্ট বিস্তারিত</h1>
        <div class="dnt-breadcrumb">
            <a href="index.php">
                <svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg> 
                হোম
            </a> 
            <span>
                <svg class="dnt-svg-icon" style="width:12px; height:12px;" viewBox="0 0 24 24"><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/></svg>
            </span> 
            <a href="#">ইভেন্টসমূহ</a>
            <span>
                <svg class="dnt-svg-icon" style="width:12px; height:12px;" viewBox="0 0 24 24"><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/></svg>
            </span> 
            <span style="color:var(--dnt-color-gray-300);">ইভেন্ট বিস্তারিত</span>
        </div>
    </div>
</section>

<!-- ==========================================================================
     MAIN CONTENT
     ========================================================================== -->
<section class="dnt-page-section">
    <div class="dnt-container dnt-page-grid">
        
        <!-- Left Side: Event Details -->
        <main class="dnt-event-details-wrapper">
            
            <!-- Event Banner Image -->
            <img src="https://via.placeholder.com/1000x500/e5e7eb/4b5563?text=Annual+Sports+Competition" alt="Event Banner" class="dnt-event-banner-img">
            
            <div class="dnt-event-body">
                
                <h1 class="dnt-event-title">বার্ষিক ক্রীড়া প্রতিযোগিতা ও পুরস্কার বিতরণী - ২০২৬</h1>
                
                <!-- Meta Info Bar -->
                <div class="dnt-event-meta-bar">
                    <div class="dnt-event-meta-item">
                        <div class="dnt-event-meta-icon">
                            <svg class="dnt-svg-icon dnt-icon-md" viewBox="0 0 24 24"><path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z"/></svg>
                        </div>
                        <div class="dnt-event-meta-text">
                            <h4>তারিখ</h4>
                            <p>২০ ফেব্রুয়ারি, ২০২৬</p>
                        </div>
                    </div>
                    <div class="dnt-event-meta-item">
                        <div class="dnt-event-meta-icon">
                            <svg class="dnt-svg-icon dnt-icon-md" viewBox="0 0 24 24"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg>
                        </div>
                        <div class="dnt-event-meta-text">
                            <h4>সময়সূচী</h4>
                            <p>সকাল ৯:০০ - বিকাল ৪:০০</p>
                        </div>
                    </div>
                    <div class="dnt-event-meta-item">
                        <div class="dnt-event-meta-icon">
                            <svg class="dnt-svg-icon dnt-icon-md" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                        </div>
                        <div class="dnt-event-meta-text">
                            <h4>স্থান</h4>
                            <p>বিদ্যালয় কেন্দ্রীয় খেলার মাঠ</p>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <p class="dnt-event-desc">
                    সুস্থ দেহে সুন্দর মন—এই চিরন্তন সত্যকে ধারণ করে শিক্ষার্থীদের শারীরিক ও মানসিক বিকাশের লক্ষ্যে <strong>আদর্শ উচ্চ বিদ্যালয় ও কলেজ</strong>-এর উদ্যোগে আগামী ২০ ফেব্রুয়ারি, ২০২৬ তারিখে অনুষ্ঠিত হতে যাচ্ছে জাঁকজমকপূর্ণ <strong>"বার্ষিক ক্রীড়া প্রতিযোগিতা ও পুরস্কার বিতরণী - ২০২৬"</strong>।
                </p>
                <p class="dnt-event-desc">
                    উক্ত অনুষ্ঠানে প্রধান অতিথি হিসেবে উপস্থিত থাকতে সদয় সম্মতি জ্ঞাপন করেছেন মাননীয় জেলা প্রশাসক মহোদয়। বিশেষ অতিথি হিসেবে উপস্থিত থাকবেন বিদ্যালয় পরিচালনা পর্ষদের সম্মানিত সভাপতি জনাব আব্দুর রহমান। বিদ্যালয়ের ৬ষ্ঠ থেকে দ্বাদশ শ্রেণির সকল শিক্ষার্থী এই প্রতিযোগিতায় স্বতঃস্ফূর্তভাবে অংশগ্রহণ করবে। 
                </p>
                <p class="dnt-event-desc">
                    প্রতিযোগিতায় দৌড়, দীর্ঘ লাফ, গোলক নিক্ষেপ, যেমন খুশি তেমন সাজো এবং রিলে রেসসহ আকর্ষণীয় নানা ইভেন্ট থাকছে। বিজয়ী শিক্ষার্থীদের জন্য আকর্ষণীয় পুরস্কারের ব্যবস্থা করা হয়েছে। সকল অভিভাবক এবং শুভানুধ্যায়ীদের উক্ত অনুষ্ঠানে উপস্থিত থেকে শিক্ষার্থীদের উৎসাহিত করার জন্য বিনীতভাবে আহ্বান জানানো হচ্ছে।
                </p>

                <!-- Agenda / Schedule -->
                <div class="dnt-event-agenda">
                    <h3>
                        <svg class="dnt-svg-icon dnt-icon-md" viewBox="0 0 24 24"><path d="M3 13h2v-2H3v2zm0 4h2v-2H3v2zm0-8h2V7H3v2zm4 4h14v-2H7v2zm0 4h14v-2H7v2zM7 7v2h14V7H7z"/></svg> 
                        অনুষ্ঠানের সময়সূচী (এজেন্ডা)
                    </h3>
                    
                    <ul class="dnt-agenda-list">
                        <li class="dnt-agenda-item">
                            <div class="dnt-agenda-time">০৯:০০ AM</div>
                            <div class="dnt-agenda-marker"></div>
                            <div class="dnt-agenda-detail">
                                <h4>পবিত্র কোরআন তিলাওয়াত ও জাতীয় সংগীত</h4>
                                <p>সকল শিক্ষার্থী এবং অতিথিদের উপস্থিতিতে জাতীয় পতাকা উত্তোলন ও জাতীয় সংগীত পরিবেশন।</p>
                            </div>
                        </li>
                        <li class="dnt-agenda-item">
                            <div class="dnt-agenda-time">০৯:৩০ AM</div>
                            <div class="dnt-agenda-marker"></div>
                            <div class="dnt-agenda-detail">
                                <h4>উদ্বোধনী বক্তব্য ও মশাল প্রজ্জ্বলন</h4>
                                <p>প্রধান অতিথির মূল্যবান বক্তব্য এবং মশাল প্রজ্জ্বলনের মাধ্যমে প্রতিযোগিতার আনুষ্ঠানিক উদ্বোধন।</p>
                            </div>
                        </li>
                        <li class="dnt-agenda-item">
                            <div class="dnt-agenda-time">১০:০০ AM</div>
                            <div class="dnt-agenda-marker"></div>
                            <div class="dnt-agenda-detail">
                                <h4>ক্রীড়া প্রতিযোগিতা শুরু (পর্যায়ক্রমে)</h4>
                                <p>হাউস ভিত্তিক শিক্ষার্থীদের দৌড়, দীর্ঘ লাফ ও অন্যান্য ইভেন্ট শুরু।</p>
                            </div>
                        </li>
                        <li class="dnt-agenda-item">
                            <div class="dnt-agenda-time">০১:৩০ PM</div>
                            <div class="dnt-agenda-marker"></div>
                            <div class="dnt-agenda-detail">
                                <h4>মধ্যাহ্নভোজ ও বিরতি</h4>
                                <p>সকল প্রতিযোগী এবং অতিথিদের জন্য নামাজ ও খাবারের বিরতি।</p>
                            </div>
                        </li>
                        <li class="dnt-agenda-item">
                            <div class="dnt-agenda-time">০৩:০০ PM</div>
                            <div class="dnt-agenda-marker"></div>
                            <div class="dnt-agenda-detail">
                                <h4>পুরস্কার বিতরণী</h4>
                                <p>বিজয়ী শিক্ষার্থীদের মাঝে ক্রেস্ট ও সনদপত্র তুলে দেবেন আমন্ত্রিত অতিথিবৃন্দ।</p>
                            </div>
                        </li>
                        <li class="dnt-agenda-item">
                            <div class="dnt-agenda-time">০৪:০০ PM</div>
                            <div class="dnt-agenda-marker"></div>
                            <div class="dnt-agenda-detail">
                                <h4>অধ্যক্ষের সমাপনী বক্তব্য</h4>
                                <p>অধ্যক্ষ মহোদয়ের ধন্যবাদ জ্ঞাপন এবং অনুষ্ঠানের আনুষ্ঠানিক সমাপ্তি।</p>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </main>

        <?php get_sidebar();?>

    </div>
</section>

<?php get_footer();?>