<?php 

/*
Template Name: Governing Body
*/

get_header(); ?>
    <!-- ৪. পেজ ব্যানার ও ব্রেডক্রাম্ব -->
    <section class="dnt-page-banner" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/img/breadcrumb.jpg');">
        <div class="dnt-container">
            <h1 class="dnt-page-title">পরিচালনা পর্ষদ</h1>
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
                <span style="color:var(--dnt-color-gray-300);">পরিচালনা পর্ষদ</span>
            </div>
        </div>
    </section>

    <!-- ৫. মেইন কন্টেন্ট সেকশন -->
    <section class="dnt-page-section">
        <div class="dnt-container"> <!-- সাইডবার না থাকায় dnt-page-grid ক্লাসটি বাদ দিতে পারেন বা সিএসএস এ ফুল উইডথ করে নিতে পারেন -->
            
            <!-- গভর্নিং বডি মেম্বার লিস্ট -->
            <main class="dnt-page-content">
                <h2 class="dnt-section-heading"><i class="fa-solid fa-users-rectangle"></i> পরিচালনা পর্ষদ (গভর্নিং বডি)</h2>
                
                <p class="dnt-intro-text">
                    Green Gems International School & College-এর শিক্ষা ও প্রশাসনিক কার্যক্রম সুষ্ঠুভাবে পরিচালনার জন্য মাধ্যমিক ও উচ্চ মাধ্যমিক শিক্ষা বোর্ড, সিলেট-এর বিধিমালা অনুযায়ী একটি অত্যন্ত দক্ষ ও নিবেদিতপ্রাণ পরিচালনা পর্ষদ বা গভর্নিং বডি গঠিত হয়েছে। এই পর্ষদ প্রতিষ্ঠানের ভৌত অবকাঠামো উন্নয়ন, শিক্ষার গুণগত মান নিশ্চিতকরণ এবং শিক্ষার্থীদের সার্বিক কল্যাণে নিরলসভাবে কাজ করে যাচ্ছে।
                </p>

                <!-- সভাপতি (চেয়ারম্যান) -->
                <div class="dnt-gb-chairman">
                    <div class="dnt-gb-card">
                        <div class="dnt-gb-img"><i class="fa-solid fa-user-tie"></i></div>
                        <div class="dnt-gb-name">জনাব আব্দুর রহমান</div>
                        <div class="dnt-gb-role">সভাপতি</div>
                        <div class="dnt-gb-desc">বিশিষ্ট শিক্ষানুরাগী ও সমাজসেবক</div>
                    </div>
                </div>

                <!-- সদস্য সচিব ও দাতা সদস্য -->
                <h3 class="dnt-gb-category-title">সদস্য সচিব ও দাতা সদস্য</h3>
                <div class="dnt-gb-grid">
                    <div class="dnt-gb-card">
                        <div class="dnt-gb-img"><i class="fa-solid fa-user"></i></div>
                        <div class="dnt-gb-name">মোহাম্মদ আব্দুল করিম</div>
                        <div class="dnt-gb-role" style="background: var(--dnt-color-primary-light); color: var(--dnt-color-primary-dark);">সদস্য সচিব</div>
                        <div class="dnt-gb-desc">অধ্যক্ষ, Green Gems International School & College</div>
                    </div>
                    <div class="dnt-gb-card">
                        <div class="dnt-gb-img"><i class="fa-solid fa-user"></i></div>
                        <div class="dnt-gb-name">ডা. শামসুল হক</div>
                        <div class="dnt-gb-role" style="background: var(--dnt-color-primary-light); color: var(--dnt-color-primary-dark);">দাতা সদস্য</div>
                        <div class="dnt-gb-desc">সাবেক সিভিল সার্জন ও আজীবন ভূমিদাতা</div>
                    </div>
                    <div class="dnt-gb-card">
                        <div class="dnt-gb-img"><i class="fa-solid fa-user"></i></div>
                        <div class="dnt-gb-name">জনাব মোখলেসুর রহমান</div>
                        <div class="dnt-gb-role" style="background: var(--dnt-color-primary-light); color: var(--dnt-color-primary-dark);">প্রতিষ্ঠাতা সদস্য</div>
                        <div class="dnt-gb-desc">বিশিষ্ট ব্যবসায়ী ও সমাজকর্মী</div>
                    </div>
                </div>

                <!-- শিক্ষক প্রতিনিধি -->
                <h3 class="dnt-gb-category-title">শিক্ষক প্রতিনিধি</h3>
                <div class="dnt-gb-grid">
                    <div class="dnt-gb-card">
                        <div class="dnt-gb-img"><i class="fa-solid fa-user-graduate"></i></div>
                        <div class="dnt-gb-name">জনাব মাহফুজুর রহমান</div>
                        <div class="dnt-gb-role" style="background:#fff9c4; color:var(--dnt-color-gray-900);">শিক্ষক প্রতিনিধি (স্কুল)</div>
                        <div class="dnt-gb-desc">সিনিয়র শিক্ষক (ইংরেজি)</div>
                    </div>
                    <div class="dnt-gb-card">
                        <div class="dnt-gb-img"><i class="fa-solid fa-user-graduate"></i></div>
                        <div class="dnt-gb-name">মিসেস ফাতেমা বেগম</div>
                        <div class="dnt-gb-role" style="background:#fff9c4; color:var(--dnt-color-gray-900);">শিক্ষক প্রতিনিধি (কলেজ)</div>
                        <div class="dnt-gb-desc">প্রভাষক (তথ্য ও যোগাযোগ প্রযুক্তি)</div>
                    </div>
                    <div class="dnt-gb-card">
                        <div class="dnt-gb-img"><i class="fa-solid fa-user-graduate"></i></div>
                        <div class="dnt-gb-name">জনাব আরিফ হোসেন</div>
                        <div class="dnt-gb-role" style="background:#fff9c4; color:var(--dnt-color-gray-900);">শিক্ষক প্রতিনিধি (সংরক্ষিত)</div>
                        <div class="dnt-gb-desc">সিনিয়র শিক্ষক (পদার্থবিজ্ঞান)</div>
                    </div>
                </div>

                <!-- অভিভাবক সদস্য -->
                <h3 class="dnt-gb-category-title">অভিভাবক সদস্য</h3>
                <div class="dnt-gb-grid">
                    <div class="dnt-gb-card">
                        <div class="dnt-gb-img"><i class="fa-solid fa-user-group"></i></div>
                        <div class="dnt-gb-name">জনাব কামরুল হাসান</div>
                        <div class="dnt-gb-role" style="background: var(--dnt-color-gray-200); color: var(--dnt-color-gray-800);">অভিভাবক সদস্য</div>
                        <div class="dnt-gb-desc">মাধ্যমিক শাখা</div>
                    </div>
                    <div class="dnt-gb-card">
                        <div class="dnt-gb-img"><i class="fa-solid fa-user-group"></i></div>
                        <div class="dnt-gb-name">জনাব জয়নাল আবেদীন</div>
                        <div class="dnt-gb-role" style="background: var(--dnt-color-gray-200); color: var(--dnt-color-gray-800);">অভিভাবক সদস্য</div>
                        <div class="dnt-gb-desc">উচ্চ মাধ্যমিক শাখা</div>
                    </div>
                    <div class="dnt-gb-card">
                        <div class="dnt-gb-img"><i class="fa-solid fa-user-group"></i></div>
                        <div class="dnt-gb-name">মিসেস রুবিনা আক্তার</div>
                        <div class="dnt-gb-role" style="background: var(--dnt-color-gray-200); color: var(--dnt-color-gray-800);">অভিভাবক সদস্য (মহিলা)</div>
                        <div class="dnt-gb-desc">সংরক্ষিত মহিলা আসন</div>
                    </div>
                </div>
            </main>

        </div>
    </section>

    <?php get_footer();?>