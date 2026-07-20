<?php 

/*
Template Name: Rules
*/

get_header(); ?>
   <!-- ৪. পেজ ব্যানার ও ব্রেডক্রাম্ব -->
    <section class="dnt-page-banner" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/img/breadcrumb.jpg');">
        <div class="dnt-container">
            <h1 class="dnt-page-title">নিয়ম ও বিধিমালা</h1>
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
                <span style="color:var(--dnt-color-gray-300);">নিয়ম ও বিধিমালা</span>
            </div>
        </div>
    </section>

    <section class="dnt-page-section">
        <div class="dnt-container dnt-page-grid">
            
            <main class="dnt-page-content">
                <h2 class="dnt-section-heading"><i class="fa-solid fa-gavel"></i> সাধারণ আচরণবিধি ও শৃঙ্খলা</h2>
                <p class="dnt-intro-text">
                    আদর্শ উচ্চ বিদ্যালয় ও কলেজ-এর সকল শিক্ষার্থীকে প্রতিষ্ঠানের গৌরব ও ঐতিহ্য বজায় রাখার জন্য নির্দিষ্ট শৃঙ্খলা ও নিয়মাবলী কঠোরভাবে মেনে চলতে হবে। নৈতিকতা, সদ্ব্যবহার এবং নিষ্ঠা আমাদের মূল চালিকাশক্তি। বিদ্যালয়ে শৃঙ্খলাভঙ্গকারী যেকোনো কর্মকাণ্ডের জন্য প্রাতিষ্ঠানিক ব্যবস্থা গ্রহণ করা হতে পারে।
                </p>

                <div class="dnt-rule-block">
                    <div class="dnt-rule-block-header">
                        <i class="fa-solid fa-clock"></i>
                        <span>১. সময়ানুবর্তিতা ও উপস্থিতি</span>
                    </div>
                    <ul>
                        <li>প্রতিটি শিক্ষার্থীকে দৈনিক সমাবেশ (Assembly) শুরু হওয়ার অন্তত ১৫ মিনিট পূর্বে বিদ্যালয় প্রাঙ্গণে উপস্থিত হতে হবে।</li>
                        <li>শ্রেণীকক্ষে দৈনিক ন্যূনতম ৭৫% উপস্থিতি বাধ্যতামূলক। কোনো কারণে উপস্থিত হতে না পারলে অভিভাবকের স্বাক্ষরযুক্ত ছুটির আবেদনপত্র জমা দিতে হবে।</li>
                        <li>টানা ৩ দিনের বেশি অনুপস্থিত থাকলে যথাযথ চিকিৎসকের সনদ বা অভিভাবকের সশরীরে যৌক্তিক কারণ ব্যাখ্যা করা প্রয়োজন।</li>
                    </ul>
                </div>

                <div class="dnt-rule-block">
                    <div class="dnt-rule-block-header">
                        <i class="fa-solid fa-shirt"></i>
                        <span>২. পোশাক বিধি ও পরিষ্কার-পরিচ্ছন্নতা</span>
                    </div>
                    <ul>
                        <li>সকল শিক্ষার্থীকে নির্ধারিত ও মার্জিত স্কুল ইউনিফর্ম পরিধান করে আসতে হবে। অপরিষ্কার বা অসম্পূর্ণ ইউনিফর্ম গ্রহণযোগ্য নয়।</li>
                        <li>প্রতিষ্ঠানের আইডি কার্ড (Identity Card) সর্বদা গলায় বা ইউনিফর্মের বুক পকেটে দৃশ্যমান রাখতে হবে।</li>
                        <li>চুল সবসময় পরিপাটি এবং ছেলেদের ক্ষেত্রে ছোট রাখতে হবে। কোনো ধরনের অলংকার বা জমকালো মেকআপ ক্লাসে ব্যবহার করা যাবে না।</li>
                    </ul>
                </div>

                <div class="dnt-rule-block">
                    <div class="dnt-rule-block-header">
                        <i class="fa-solid fa-chalkboard-user"></i>
                        <span>৩. শ্রেণী কক্ষ ও পরীক্ষা সংক্রান্ত নিয়ম</span>
                    </div>
                    <ul>
                        <li>শ্রেণীকক্ষে শিক্ষকের উপস্থিতিতে বা অনুপস্থিতিতে শান্ত ও সুশৃঙ্খল পরিবেশ বজায় রাখা আবশ্যক।</li>
                        <li>পরীক্ষা চলাকালীন যেকোনো ধরণের অসদুপায় অবলম্বন বা নকল করা কঠোরভাবে নিষিদ্ধ। এমন কাজের জন্য তাৎক্ষণিক বহিষ্কারের নিয়ম রয়েছে।</li>
                        <li>বিদ্যালয়ের ডেস্ক, বেঞ্চ, বোর্ড বা দেয়ালের কোনো ক্ষতিসাধন করা যাবে না। এমন ক্ষতি হলে ক্ষতিপূরণ আদায় করা হবে।</li>
                    </ul>
                </div>

                <div class="dnt-warning-block">
                    <h4><i class="fa-solid fa-circle-exclamation"></i> বিশেষ মোবাইল ও ইলেকট্রনিক ডিভাইস নিষেধাজ্ঞা</h4>
                    <p>
                        বিদ্যালয় চলাকালীন শিক্ষার্থীদের স্মার্টফোন বা কোনো ধরনের ক্যামেরা এবং ইলেকট্রনিক বিনোদন সামগ্রী বহন করা সম্পূর্ণ নিষিদ্ধ। বিশেষ প্রয়োজনে সাধারণ বাটন ফোন আনা গেলেও তা শ্রেণী চলাকালীন সম্পূর্ণ বন্ধ রাখতে হবে। নিষেধাজ্ঞা অমান্য করলে উক্ত ডিভাইস বাজেয়াপ্ত করা হবে এবং অভিভাবকের উপস্থিতিতে জরিমানা সাপেক্ষে ফেরত দেওয়া হবে।
                    </p>
                </div>
            </main>

            <?php get_sidebar();?>

        </div>
    </section>

   <?php get_footer();?>