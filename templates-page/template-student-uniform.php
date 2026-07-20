<?php 

/*
Template Name: Student Uniform
*/

get_header(); ?>
    <!-- ৪. পেজ ব্যানার ও ব্রেডক্রাম্ব -->
    <section class="dnt-page-banner" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/img/breadcrumb.jpg');">
        <div class="dnt-container">
            <h1 class="dnt-page-title">শিক্ষার্থীদের ইউনিফর্ম</h1>
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
                <span style="color:var(--dnt-color-gray-300);">শিক্ষার্থীদের ইউনিফর্ম</span>
            </div>
        </div>
    </section>

    <!-- ৫. মেইন কন্টেন্ট সেকশন -->
    <section class="dnt-page-section">
        <div class="dnt-container dnt-page-grid">
            
            <!-- বাম পাশ: পোশাক বিধি কন্টেন্ট -->
            <main class="dnt-page-content">
                <h2 class="dnt-section-heading"><i class="fa-solid fa-circle-info"></i> ইউনিফর্ম সংক্রান্ত ভূমিকা</h2>
                <p class="dnt-intro-text">
                    আদর্শ উচ্চ বিদ্যালয় ও কলেজ-এর সকল স্তরের শিক্ষার্থীদের জন্য নির্দিষ্ট পোশাক বা ইউনিফর্ম পরিধান করে প্রতিষ্ঠানে আসা বাধ্যতামূলক। ইউনিফর্ম শিক্ষার্থীদের মাঝে সমতা, শৃঙ্খলা এবং প্রাতিষ্ঠানিক একাত্মতা বজায় রাখতে সাহায্য করে। নিচে ছাত্র ও ছাত্রীদের জন্য নির্ধারিত পোশাকের বিবরণ দেওয়া হলো।
                </p>

                <!-- ছাত্র ও ছাত্রীদের ইউনিফর্ম গ্রিড -->
                <div class="dnt-uniform-grid">
                    
                    <!-- ছাত্রদের ইউনিফর্ম -->
                    <div class="dnt-uniform-box dnt-boys">
                        <div class="dnt-box-title">
                            <i class="fa-solid fa-user-tie"></i>
                            <span>ছাত্রদের পোশাক (Boys)</span>
                        </div>
                        <ul class="dnt-uniform-list">
                            <li><i class="fa-solid fa-circle"></i> <strong>শার্ট:</strong> নেভি ব্লু মনোগ্রাম সম্বলিত ধবধবে সাদা রঙের হাফ/ফুল হাতা শার্ট।</li>
                            <li><i class="fa-solid fa-circle"></i> <strong>প্যান্ট:</strong> গাঢ় বটল গ্রিন (বোতল সবুজ) রঙের ফুল প্যান্ট (বেল্ট ব্যবহারের লুপসহ)।</li>
                            <li><i class="fa-solid fa-circle"></i> <strong>বেল্ট:</strong> কালো রঙের সাধারণ ফরমাল লেদার বা রেক্সিন বেল্ট।</li>
                            <li><i class="fa-solid fa-circle"></i> <strong>জুতো ও মোজা:</strong> কালো রঙের স্কুল শু (কেডস বা ফরমাল) এবং সাদা রঙের মোজা।</li>
                        </ul>
                    </div>

                    <!-- ছাত্রীদের ইউনিফর্ম -->
                    <div class="dnt-uniform-box dnt-girls">
                        <div class="dnt-box-title">
                            <i class="fa-solid fa-user-nurse"></i>
                            <span>ছাত্রীদের পোশাক (Girls)</span>
                        </div>
                        <ul class="dnt-uniform-list">
                            <li><i class="fa-solid fa-circle"></i> <strong>জামা/কামিজ:</strong> বটল গ্রিন (বোতল সবুজ) রঙের ফ্রক বা কামিজ (সাদা কলার ও কাফ সহ)।</li>
                            <li><i class="fa-solid fa-circle"></i> <strong>সেলোয়ার ও ওড়না:</strong> ধবধবে সাদা রঙের সেলোয়ার এবং নিয়ম অনুযায়ী সাদা সুতি ওড়না/ক্রস বেল্ট।</li>
                            <li><i class="fa-solid fa-circle"></i> <strong>স্কার্ফ/হিজাব:</strong> হিজাব পরিধানকারী ছাত্রীদের জন্য সম্পূর্ণ সাদা রঙের সাধারণ হিজাব প্রযোজ্য।</li>
                            <li><i class="fa-solid fa-circle"></i> <strong>জুতো ও মোজা:</strong> কালো রঙের সাধারণ পাম্প শু বা কেডস এবং সাদা রঙের সুতি মোজা।</li>
                        </ul>
                    </div>

                </div>

                <h2 class="dnt-section-heading"><i class="fa-solid fa-snowflake"></i> শীতকালীন পোশাক ও অন্যান্য নির্দেশনা</h2>
                <p class="dnt-intro-text">
                    শীতকালে নিয়মিত স্কুল ইউনিফর্মের সাথে অতিরিক্ত পোশাক হিসেবে নির্দিষ্ট রঙের সোয়েটার বা জ্যাকেট ব্যবহার করতে হবে:
                </p>

                <div class="dnt-uniform-list" style="padding-left: 10px; margin-bottom: 25px;">
                    <li style="margin-bottom: 10px;"><i class="fa-solid fa-check" style="color:var(--dnt-color-primary); font-weight:bold;"></i> <strong>শীতকালীন সোয়েটার:</strong> ছাত্র ও ছাত্রী উভয়ের জন্যই গাঢ় লাল (Maroon/Red) রঙের 'V' গলার সোয়েটার বা কার্ডিগান পরিধান করা আবশ্যক। কোনো ধরণের জমকালো বা ভিন্ন রঙের জ্যাকেট ক্লাসরুমে গ্রহণযোগ্য নয়।</li>
                    <li style="margin-bottom: 10px;"><i class="fa-solid fa-check" style="color:var(--dnt-color-primary); font-weight:bold;"></i> <strong>ডিজিটাল আইডি কার্ড:</strong> প্রতিটি শিক্ষার্থীকে প্রতিষ্ঠান থেকে সরবরাহকৃত ডিজিটাল আইডি কার্ড সর্বদা গলায় ঝুলিয়ে রাখতে হবে। আইডি কার্ড ছাড়া ক্লাসে প্রবেশ করতে দেওয়া হবে না।</li>
                    <li><i class="fa-solid fa-check" style="color:var(--dnt-color-primary); font-weight:bold;"></i> <strong>ব্যাজ ও মনোগ্রাম:</strong> শার্ট বা কামিজের বাম পকেটে বিদ্যালয়ের অফিশিয়াল লোগো সম্বলিত কাপড় বা মেটাল ব্যাজ লাগানো থাকা বাধ্যতামূলক।</li>
                </div>

                <!-- বিশেষ নির্দেশিকা বক্স -->
                <div class="dnt-notice-block">
                    <h4><i class="fa-solid fa-circle-exclamation"></i> অভিভাবকদের প্রতি অনুরোধ</h4>
                    <p>
                        আপনার সন্তান প্রতিদিন পরিষ্কার-পরিচ্ছন্ন ও ইস্ত্রি করা পরিপাটি ইউনিফর্ম পরে বিদ্যালয়ে আসছে কিনা তা নিয়মিত তদারকি করুন। নোংরা বা ছেঁড়া পোশাক পরিধান করে আসা শৃঙ্খলার পরিপন্থী হিসেবে গণ্য হবে।
                    </p>
                </div>
            </main>

            <?php include ('sidebar.php');?>

        </div>
    </section>

   <?php get_footer();?>