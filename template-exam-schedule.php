<?php 

/*
Template Name: Exam Schedule
*/

get_header(); ?>
    <!-- ৪. পেজ ব্যানার ও ব্রেডক্রাম্ব -->
    <section class="dnt-page-banner">
        <div class="dnt-container">
            <h1 class="dnt-page-title">পরীক্ষার সময়সূচী</h1>
            <div class="dnt-breadcrumb">
                <a href="#"><i class="fa-solid fa-house"></i> হোম</a> 
                <span><i class="fa-solid fa-chevron-right" style="font-size:0.75rem; opacity:0.7;"></i></span> 
                <span>একাডেমিক</span>
                <span><i class="fa-solid fa-chevron-right" style="font-size:0.75rem; opacity:0.7;"></i></span> 
                <span style="color:var(--dnt-color-gray-300);">পরীক্ষার সময়সূচী</span>
            </div>
        </div>
    </section>

    <!-- ৫. মেইন কন্টেন্ট সেকশন -->
    <section class="dnt-page-section">
        <div class="dnt-container dnt-page-grid">
            
            <main class="dnt-page-content">
                <h2 class="dnt-section-heading"><i class="fa-solid fa-calendar-check"></i> অর্ধ-বার্ষিক পরীক্ষা ২০২৬ সময়সূচী</h2>
                <p class="dnt-intro-text">
                    আদর্শ উচ্চ বিদ্যালয় ও কলেজ-এর ২০২৬ শিক্ষাবর্ষের অর্ধ-বার্ষিক পরীক্ষার বিস্তারিত সময়সূচী নিচে দেওয়া হলো। সকল শিক্ষার্থীদের পরীক্ষার ৩০ মিনিট পূর্বে নির্ধারিত কক্ষে উপস্থিত থাকার জন্য নির্দেশ দেওয়া যাচ্ছে।
                </p>

                <!-- পরীক্ষার সময়সূচী টেবিল -->
                <div class="dnt-routine-table-wrapper">
                    <table class="dnt-routine-table">
                        <thead>
                            <tr>
                                <th>তারিখ</th>
                                <th>বার</th>
                                <th>বিষয়</th>
                                <th>সময়</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>১০ আগস্ট, ২০২৬</td><td>সোমবার</td><td>বাংলা ১ম পত্র</td><td>১০:০০ - ০১:০০</td></tr>
                            <tr><td>১১ আগস্ট, ২০২৬</td><td>মঙ্গলবার</td><td>বাংলা ২য় পত্র</td><td>১০:০০ - ০১:০০</td></tr>
                            <tr class="dnt-row-highlight"><td>১২ আগস্ট, ২০২৬</td><td>বুধবার</td><td>ইংরেজি ১ম পত্র</td><td>১০:০০ - ০১:০০</td></tr>
                            <tr><td>১৩ আগস্ট, ২০২৬</td><td>বৃহস্পতিবার</td><td>ইংরেজি ২য় পত্র</td><td>১০:০০ - ০১:০০</td></tr>
                            <tr><td>১৫ আগস্ট, ২০২৬</td><td>শনিবার</td><td>গণিত</td><td>১০:০০ - ০১:০০</td></tr>
                            <tr><td>১৬ আগস্ট, ২০২৬</td><td>রবিবার</td><td>বিজ্ঞান / ব্যবসায় উদ্যোগ</td><td>১০:০০ - ০১:০০</td></tr>
                        </tbody>
                    </table>
                </div>

                <!-- পরীক্ষার নিয়মাবলি -->
                <h3 class="dnt-gb-category-title">পরীক্ষার্থীদের জন্য জরুরি নির্দেশনা</h3>
                <div class="dnt-activity-timeline">
                    <div class="dnt-timeline-item">
                        <div class="dnt-timeline-icon"><i class="fa-solid fa-id-card"></i></div>
                        <div class="dnt-timeline-content">
                            <h4>প্রবেশপত্র সাথে রাখা</h4>
                            <p>পরীক্ষায় অংশগ্রহণের জন্য শিক্ষাপ্রতিষ্ঠান কর্তৃক সরবরাহকৃত মূল প্রবেশপত্র (Admit Card) অবশ্যই সাথে রাখতে হবে।</p>
                        </div>
                    </div>
                    <div class="dnt-timeline-item">
                        <div class="dnt-timeline-icon"><i class="fa-solid fa-ban"></i></div>
                        <div class="dnt-timeline-content">
                            <h4>নিষিদ্ধ সামগ্রী</h4>
                            <p>পরীক্ষার কক্ষে মোবাইল ফোন, স্মার্ট ঘড়ি, ক্যালকুলেটর (প্রয়োজনীয় মডেল ব্যতীত) বা কোনো প্রকার ইলেকট্রনিক ডিভাইস আনা সম্পূর্ণ নিষিদ্ধ।</p>
                        </div>
                    </div>
                    <div class="dnt-timeline-item">
                        <div class="dnt-timeline-icon"><i class="fa-solid fa-pen-nib"></i></div>
                        <div class="dnt-timeline-content">
                            <h4>উপস্থিতি</h4>
                            <p>পরীক্ষা শুরুর ৩০ মিনিট পূর্বে পরীক্ষার্থীদের নিজ নিজ আসনে বসতে হবে। নির্ধারিত সময়ের পরে কোনো পরীক্ষার্থীকে হলে প্রবেশ করতে দেওয়া হবে না।</p>
                        </div>
                    </div>
                </div>
            </main>

            <?php include ('sidebar.php');?>
        </div>
    </section>

<?php get_footer();?>