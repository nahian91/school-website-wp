<?php 

/*
Template Name: Exam Rules
*/

get_header(); ?>
    <!-- ৪. পেজ ব্যানার ও ব্রেডক্রাম্ব -->
    <section class="dnt-page-banner">
        <div class="dnt-container">
            <h1 class="dnt-page-title">পরীক্ষা ও মূল্যায়ন পদ্ধতি</h1>
            <div class="dnt-breadcrumb">
                <a href="#"><i class="fa-solid fa-house"></i> হোম</a> 
                <span><i class="fa-solid fa-chevron-right" style="font-size:0.75rem; opacity:0.7;"></i></span> 
                <span>একাডেমিক</span>
                <span><i class="fa-solid fa-chevron-right" style="font-size:0.75rem; opacity:0.7;"></i></span> 
                <span style="color:var(--dnt-color-gray-300);">পরীক্ষা পদ্ধতি</span>
            </div>
        </div>
    </section>

    <!-- ৫. মেইন কন্টেন্ট সেকশন -->
    <section class="dnt-page-section">
        <div class="dnt-container dnt-page-grid">
            
            <!-- বাম পাশ: পরীক্ষা পদ্ধতি কন্টেন্ট -->
            <main class="dnt-page-content">
                <h2 class="dnt-section-heading"><i class="fa-solid fa-square-poll-vertical"></i> মূল্যায়ন কাঠামো</h2>
                <p class="dnt-intro-text">
                    আদর্শ উচ্চ বিদ্যালয় ও কলেজ-এ জাতীয় শিক্ষাক্রম ও পাঠ্যপুস্তক বোর্ড (NCTB) এবং শিক্ষা মন্ত্রণালয়ের সর্বশেষ নির্দেশিকা মোতাবেক শিক্ষার্থীদের মেধা মূল্যায়ন করা হয়। আমাদের প্রতিষ্ঠানে বছরে প্রধানত দুটি সামষ্টিক পরীক্ষা এবং নিয়মিত ধারাবাহিক মূল্যায়ন (Class Test / Assignment) ব্যবস্থা চালু রয়েছে।
                </p>

                <!-- পরীক্ষার ধাপসমূহ -->
                <div class="dnt-exam-step-grid">
                    <div class="dnt-exam-card">
                        <h4>ধারাবাহিক মূল্যায়ন</h4>
                        <p>ক্লাস টেস্ট, কুইজ ও অ্যাসাইনমেন্টের মাধ্যমে নিয়মিত মূল্যায়ন।</p>
                    </div>
                    <div class="dnt-exam-card">
                        <h4>অর্ধ-বার্ষিক পরীক্ষা</h4>
                        <p>সিলেবাসের প্রথম অংশের উপর ভিত্তি করে বছরের মাঝামাঝি অনুষ্ঠিত পরীক্ষা।</p>
                    </div>
                    <div class="dnt-exam-card">
                        <h4>বার্ষিক পরীক্ষা</h4>
                        <p>সম্পূর্ণ সিলেবাসের আলোকে শিক্ষাবর্ষের শেষে চূড়ান্ত ফলাফল নির্ধারণী পরীক্ষা।</p>
                    </div>
                </div>

                <h2 class="dnt-section-heading"><i class="fa-solid fa-table-list"></i> সরকারি লেটার গ্রেডিং সিস্টেম</h2>
                <p class="dnt-intro-text">
                    মাধ্যমিক ও উচ্চ মাধ্যমিক স্তরের পরীক্ষার ফলাফল প্রকাশের জন্য নিচের সরকারি গ্রেড বিন্যাস অনুসরণ করা হয়:
                </p>

                <!-- গ্রেডিং টেবিল -->
                <div class="dnt-table-wrapper">
                    <table class="dnt-table">
                        <thead>
                            <tr>
                                <th>নম্বরের ব্যাপ্তি (Marks Range)</th>
                                <th>লেটার গ্রেড (Letter Grade)</th>
                                <th>গ্রেড পয়েন্ট (Grade Point)</th>
                                <th>মন্তব্য (Remarks)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>৮০ - ১০০</td>
                                <td>A+</td>
                                <td>৫.০০</td>
                                <td>অসাধারণ (Outstanding)</td>
                            </tr>
                            <tr>
                                <td>৭০ - ৭৯</td>
                                <td>A</td>
                                <td>৪.০০</td>
                                <td>চমৎকার (Excellent)</td>
                            </tr>
                            <tr>
                                <td>৬০ - ৬৯</td>
                                <td>A-</td>
                                <td>৩.৫০</td>
                                <td>খুব ভালো (Very Good)</td>
                            </tr>
                            <tr>
                                <td>৫০ - ৫৯</td>
                                <td>B</td>
                                <td>৩.০০</td>
                                <td>ভালো (Good)</td>
                            </tr>
                            <tr>
                                <td>৪০ - ৪৯</td>
                                <td>C</td>
                                <td>২.০০</td>
                                <td>চলনসই (Satisfactory)</td>
                            </tr>
                            <tr>
                                <td>৩৩ - ৩৯</td>
                                <td>D</td>
                                <td>১.০০</td>
                                <td>উত্তীর্ণ (Pass)</td>
                            </tr>
                            <tr>
                                <td>০০ - ৩২</td>
                                <td>F</td>
                                <td>০.০০</td>
                                <td>অকৃতকার্য (Fail)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h2 class="dnt-section-heading"><i class="fa-solid fa-clipboard-list"></i> পরীক্ষা সংক্রান্ত সাধারণ নিয়মাবলী</h2>
                <ul class="dnt-rule-list">
                    <li><i class="fa-solid fa-circle-chevron-right"></i> পরীক্ষার হলে প্রতিটি শিক্ষার্থীকে অবশ্যই নির্দিষ্ট ইউনিফর্ম ও মূল প্রবেশপত্র (Admit Card) সাথে আনতে হবে।</li>
                    <li><i class="fa-solid fa-circle-chevron-right"></i> পরীক্ষা শুরুর অন্তত ১৫ মিনিট পূর্বে পরীক্ষার্থীদের নিজ নিজ আসনে বসতে হবে।</li>
                    <li><i class="fa-solid fa-circle-chevron-right"></i> সৃজনশীল, বহুদ্বিনির্বাচনী (MCQ) এবং ব্যবহারিক (Practical) খাতার প্রতিটিতে আলাদাভাবে পাস নম্বর (৩৩%) পেতে হবে।</li>
                    <li><i class="fa-solid fa-circle-chevron-right"></i> পরীক্ষার হলে কোনো ধরণের ডিজিটাল বা ইলেকট্রনিক ডিভাইস (স্মার্টওয়াচ, মোবাইল ফোন) বহন করা সম্পূর্ণ নিষিদ্ধ।</li>
                    <li><i class="fa-solid fa-circle-chevron-right"></i> কোনো পরীক্ষা অনিবার্য কারণে স্থগিত হলে তা পরবর্তী নোটিশের মাধ্যমে পুনরায় জানানো হবে।</li>
                </ul>
            </main>

            <?php include ('sidebar.php');?>

        </div>
    </section>

    <?php get_footer();?>