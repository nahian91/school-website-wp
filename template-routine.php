<?php 

/*
Template Name: Routine
*/

get_header(); ?>
    <!-- ৪. পেজ ব্যানার ও ব্রেডক্রাম্ব -->
    <section class="dnt-page-banner" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/img/breadcrumb.jpg');">
        <div class="dnt-container">
            <h1 class="dnt-page-title">ক্লাস রুটিন</h1>
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
                <span style="color:var(--dnt-color-gray-300);">ক্লাস রুটিন</span>
            </div>
        </div>
    </section>

    <!-- ৫. মেইন কন্টেন্ট সেকশন -->
    <section class="dnt-page-section">
        <div class="dnt-container dnt-page-grid">
            
           <!-- বাম পাশ: দৈনন্দিন কার্যাবলী কন্টেন্ট -->
            <main class="dnt-page-content">
                <h2 class="dnt-section-heading"><i class="fa-regular fa-clock"></i> দৈনিক ক্লাসের সময়সূচী</h2>
                <p class="dnt-intro-text">
                    Green Gems International School & College-এর একাডেমিক কার্যক্রম যথাযথ, সুশৃঙ্খল ও ফলপ্রসূভাবে পরিচালনার জন্য এই সুনির্দিষ্ট সময়সূচী অনুসরণ করা হয়। রবিবার থেকে বৃহস্পতিবার পর্যন্ত নিয়মিত পাঠদান ও প্রয়োজনীয় বিরতিসমূহ নিম্নের ছক অনুযায়ী পরিচালিত হয়ে থাকে।
                </p>

                <!-- রুটিন টেবিল -->
                <div class="dnt-routine-table-wrapper">
                    <table class="dnt-routine-table">
                        <thead>
                            <tr>
                                <th>কার্যक्रम / পিরিয়ড</th>
                                <th>শুরুর সময়</th>
                                <th>শেষের সময়</th>
                                <th>স্থিতিকাল</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>প্রাতঃকালীন সমাবেশ (Assembly)</td>
                                <td>১০:০০ মি.</td>
                                <td>১০:১৫ মি.</td>
                                <td>১৫ মিনিট</td>
                            </tr>
                            <tr>
                                <td>১ম পিরিয়ড</td>
                                <td>১০:১৫ মি.</td>
                                <td>১১:০০ মি.</td>
                                <td>৪৫ মিনিট</td>
                            </tr>
                            <tr>
                                <td>২য় পিরিয়ড</td>
                                <td>১১:০০ মি.</td>
                                <td>১১:৪০ মি.</td>
                                <td>৪০ মিনিট</td>
                            </tr>
                            <tr>
                                <td>৩য় পিরিয়ড</td>
                                <td>১১:৪০ মি.</td>
                                <td>১২:২০ মি.</td>
                                <td>৪০ মিনিট</td>
                            </tr>
                            <tr>
                                <td>৪র্থ পিরিয়ড</td>
                                <td>১২:২০ মি.</td>
                                <td>০১:০০ মি.</td>
                                <td>৪০ মিনিট</td>
                            </tr>
                            <tr class="dnt-row-highlight">
                                <td>মধ্যাহ্ন বিরতি, টিফিন ও যোহরের নামায</td>
                                <td>০১:০০ মি.</td>
                                <td>০১:৪০ মি.</td>
                                <td>৪০ মিনিট</td>
                            </tr>
                            <tr>
                                <td>৫ম পিরিয়ড</td>
                                <td>০১:৪০ মি.</td>
                                <td>০২:২০ মি.</td>
                                <td>৪০ মিনিট</td>
                            </tr>
                            <tr>
                                <td>৬ষ্ঠ পিরিয়ড</td>
                                <td>০২:২০ মি.</td>
                                <td>০৩:০০ মি.</td>
                                <td>৪০ মিনিট</td>
                            </tr>
                            <tr>
                                <td>৭ম পিরিয়ড</td>
                                <td>০৩:০০ মি.</td>
                                <td>০৩:৪০ মি.</td>
                                <td>৪০ মিনিট</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h2 class="dnt-section-heading"><i class="fa-solid fa-timeline"></i> দৈনিক ধাপসমূহের বিবরণ</h2>
                <p class="dnt-intro-text">
                    পাঠ্যক্রমের পাশাপাশি শিক্ষার্থীদের নৈতিক, মানসিক ও শারীরিক বিকাশের জন্য প্রতিদিনের সাধারণ শিক্ষাক্রমের মূল ধাপসমূহ নিচে বিস্তারিত তুলে ধরা হলো:
                </p>

                <!-- টাইমলাইন -->
                <div class="dnt-activity-timeline">
                    <div class="dnt-timeline-item">
                        <div class="dnt-timeline-icon"><i class="fa-solid fa-users"></i></div>
                        <div class="dnt-timeline-content">
                            <h4>১. প্রাতঃকালীন সমাবেশ ও নৈতিক মূল্যবোধ চর্চা</h4>
                            <p>সকাল ১০:০০ মিনিটে পবিত্র কুরআন তিলাওয়াত ও অন্যান্য ধর্মগ্রন্থ পাঠের মাধ্যমে সমাবেশের কার্যক্রম শুরু হয়। এরপর জাতীয় পতাকা উত্তোলন, জাতীয় সঙ্গীত পরিবেশন এবং শিক্ষার্থীদের মাঝে দেশপ্রেম ও নৈতিক মূল্যবোধ বৃদ্ধির লক্ষ্যে বিশেষ শপথ বাক্য পাঠ করানো হয়।</p>
                        </div>
                    </div>
                    <div class="dnt-timeline-item">
                        <div class="dnt-timeline-icon"><i class="fa-solid fa-utensils"></i></div>
                        <div class="dnt-timeline-content">
                            <h4>২. মধ্যাহ্ন বিরতি, পুষ্টি ও প্রার্থনা</h4>
                            <p>দুপুর ০১:০০ টায় ৪র্থ পিরিয়ড শেষে ৪০ মিনিটের মধ্যাহ্নকালীন বিরতি দেওয়া হয়। এই সময়ে শিক্ষার্থীরা শৃঙ্খলার সাথে দুপুরের খাবার গ্রহণ করে এবং ক্যাম্পাসের নির্ধারিত ওজুখানায় পবিত্র হয়ে যোহরের নামায জামায়াতের সাথে আদায় করে।</p>
                        </div>
                    </div>
                    <div class="dnt-timeline-item">
                        <div class="dnt-timeline-icon"><i class="fa-solid fa-volleyball"></i></div>
                        <div class="dnt-timeline-content">
                            <h4>৩. সহ-শিক্ষা ও সৃজনশীল ক্লাব অ্যাক্টিভিটিজ (বৃহস্পতিবার বিশেষ)</h4>
                            <p>সাপ্তাহিক রুটিনের অংশ হিসেবে প্রতি বৃহস্পতিবার শেষ দুই পিরিয়ডে বিশেষ সহ-শিক্ষা কার্যক্রম পরিচালিত হয়। এর মধ্যে রয়েছে বিতর্ক প্রতিযোগিতা, ল্যাঙ্গুয়েজ ক্লাব, বিজ্ঞান ক্লাব, আইসিটি ফোরাম, স্কাউটিং এবং ইনডোর/আউটডোর গেমসের বিশেষ অনুশীলন।</p>
                        </div>
                    </div>
                </div>

                <!-- বিশেষ নির্দেশিকা বক্স -->
                <div class="dnt-highlight-box">
                    <h4><i class="fa-solid fa-cloud-sun"></i> বিশেষ নোটিশ ও পরিবর্তিত সময়সূচী</h4>
                    <p>
                        পবিত্র রমজান মাস, সরকারি ছুটি কিংবা তীব্র আবহাওয়াগত কারণে সরকারের বিশেষ নির্দেশনায় ক্লাস রুটিনের সাধারণ সময়সূচী পরিবর্তিত হতে পারে। যেকোনো ধরনের পরিবর্তনের ক্ষেত্রে পূর্বেই ওয়েবসাইটের নোটিশ বোর্ড এবং অফিসিয়াল ক্ষুদে বার্তার (SMS) মাধ্যমে নতুন সময়সূচী জানিয়ে দেওয়া হবে।
                    </p>
                </div>
            </main>

            <?php include ('sidebar.php');?>
        </div>
    </section>
<?php get_footer();?>