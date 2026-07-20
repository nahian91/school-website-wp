<?php 

/*
Template Name: Management Committee
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

    <!-- 5. MAIN CONTENT -->
    <section class="dnt-page-section">
        <div class="dnt-container dnt-page-grid">
            
            <!-- Left Side: Governing Body Content -->
            <main class="dnt-page-content">
                
                <h2 class="dnt-section-heading"><i class="fa-solid fa-users-rectangle"></i> পরিচালনা পর্ষদ (গভর্নিং বডি)</h2>
                
                <p class="dnt-intro-text">
                    আদর্শ উচ্চ বিদ্যালয় ও কলেজ-এর শিক্ষা ও প্রশাসনিক কার্যক্রম সুষ্ঠুভাবে পরিচালনার জন্য ঢাকা শিক্ষা বোর্ডের বিধিমালা অনুযায়ী একটি অত্যন্ত দক্ষ ও নিবেদিতপ্রাণ পরিচালনা পর্ষদ বা গভর্নিং বডি গঠিত হয়েছে। এই পর্ষদ বিদ্যালয়ের ভৌত অবকাঠামো উন্নয়ন, শিক্ষার গুণগত মান নিশ্চিতকরণ এবং শিক্ষার্থীদের সার্বিক কল্যাণে নিরলসভাবে কাজ করে যাচ্ছে।
                </p>

                <!-- Chairman -->
                <div class="dnt-gb-chairman">
                    <div class="dnt-gb-card">
                        <div class="dnt-gb-img"><i class="fa-solid fa-user-tie"></i></div>
                        <div class="dnt-gb-name">জনাব আব্দুর রহমান</div>
                        <div class="dnt-gb-role">সভাপতি</div>
                        <div class="dnt-gb-desc">বিশিষ্ট শিক্ষানুরাগী ও সমাজসেবক</div>
                    </div>
                </div>

                <h3 class="dnt-gb-category-title">সদস্য সচিব ও দাতা সদস্য</h3>
                <div class="dnt-gb-grid">
                    <!-- Member Secretary -->
                    <div class="dnt-gb-card">
                        <div class="dnt-gb-img"><i class="fa-solid fa-user"></i></div>
                        <div class="dnt-gb-name">মোহাম্মদ আব্দুল করিম</div>
                        <div class="dnt-gb-role" style="background:#e6f3ef; color:var(--dnt-color-primary-dark);">সদস্য সচিব</div>
                        <div class="dnt-gb-desc">অধ্যক্ষ, আদর্শ উচ্চ বিদ্যালয় ও কলেজ</div>
                    </div>
                    <!-- Donor Member -->
                    <div class="dnt-gb-card">
                        <div class="dnt-gb-img"><i class="fa-solid fa-user"></i></div>
                        <div class="dnt-gb-name">ডা. শামসুল হক</div>
                        <div class="dnt-gb-role" style="background:#e6f3ef; color:var(--dnt-color-primary-dark);">দাতা সদস্য</div>
                        <div class="dnt-gb-desc">সাবেক সিভিল সার্জন ও আজীবন দাতা</div>
                    </div>
                    <!-- Founder Member -->
                    <div class="dnt-gb-card">
                        <div class="dnt-gb-img"><i class="fa-solid fa-user"></i></div>
                        <div class="dnt-gb-name">জনাব শফিকুল ইসলাম</div>
                        <div class="dnt-gb-role" style="background:#e6f3ef; color:var(--dnt-color-primary-dark);">প্রতিষ্ঠাতা সদস্য</div>
                        <div class="dnt-gb-desc">বিশিষ্ট ব্যবসায়ী ও সমাজকর্মী</div>
                    </div>
                </div>

                <h3 class="dnt-gb-category-title">শিক্ষক প্রতিনিধি</h3>
                <div class="dnt-gb-grid">
                    <div class="dnt-gb-card">
                        <div class="dnt-gb-img"><i class="fa-solid fa-user-graduate"></i></div>
                        <div class="dnt-gb-name">জনাব রফিকুল ইসলাম</div>
                        <div class="dnt-gb-role" style="background:#fff9c4; color:var(--dnt-color-gray-900);">শিক্ষক প্রতিনিধি (স্কুল)</div>
                        <div class="dnt-gb-desc">সিনিয়র শিক্ষক (গণিত)</div>
                    </div>
                    <div class="dnt-gb-card">
                        <div class="dnt-gb-img"><i class="fa-solid fa-user-graduate"></i></div>
                        <div class="dnt-gb-name">মিসেস ফাতেমা বেগম</div>
                        <div class="dnt-gb-role" style="background:#fff9c4; color:var(--dnt-color-gray-900);">শিক্ষক প্রতিনিধি (কলেজ)</div>
                        <div class="dnt-gb-desc">প্রভাষক (ইতিহাস)</div>
                    </div>
                    <div class="dnt-gb-card">
                        <div class="dnt-gb-img"><i class="fa-solid fa-user-graduate"></i></div>
                        <div class="dnt-gb-name">জনাব আরিফ হোসেন</div>
                        <div class="dnt-gb-role" style="background:#fff9c4; color:var(--dnt-color-gray-900);">শিক্ষক প্রতিনিধি (সংরক্ষিত)</div>
                        <div class="dnt-gb-desc">সিনিয়র শিক্ষক (বিজ্ঞান)</div>
                    </div>
                </div>

                <h3 class="dnt-gb-category-title">অভিভাবক সদস্য</h3>
                <div class="dnt-gb-grid">
                    <div class="dnt-gb-card">
                        <div class="dnt-gb-img"><i class="fa-solid fa-user-group"></i></div>
                        <div class="dnt-gb-name">জনাব আব্দুল জলিল</div>
                        <div class="dnt-gb-role" style="background:#e5e7eb; color:var(--dnt-color-gray-800);">অভিভাবক সদস্য</div>
                        <div class="dnt-gb-desc">মাধ্যমিক শাখা</div>
                    </div>
                    <div class="dnt-gb-card">
                        <div class="dnt-gb-img"><i class="fa-solid fa-user-group"></i></div>
                        <div class="dnt-gb-name">জনাব কামরুল হাসান</div>
                        <div class="dnt-gb-role" style="background:#e5e7eb; color:var(--dnt-color-gray-800);">অভিভাবক সদস্য</div>
                        <div class="dnt-gb-desc">উচ্চ মাধ্যমিক শাখা</div>
                    </div>
                    <div class="dnt-gb-card">
                        <div class="dnt-gb-img"><i class="fa-solid fa-user-group"></i></div>
                        <div class="dnt-gb-name">মিসেস রুবিনা আক্তার</div>
                        <div class="dnt-gb-role" style="background:#e5e7eb; color:var(--dnt-color-gray-800);">অভিভাবক সদস্য (মহিলা)</div>
                        <div class="dnt-gb-desc">সংরক্ষিত মহিলা আসন</div>
                    </div>
                </div>

            </main>

            <?php get_sidebar();?>

        </div>
    </section>
<?php get_footer();?>