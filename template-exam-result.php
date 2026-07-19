<?php 

/*
Template Name: Exam Result
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
            
            <!-- বাম পাশ: ফলাফল সার্চ ফিল্টার এবং ডাটা টেবিল -->
            <main class="dnt-page-content">
                <h2 class="dnt-section-heading"><i class="fa-solid fa-magnifying-glass-chart"></i> ফলাফল অনুসন্ধান করুন</h2>
                
                <!-- সার্চ ফিল্টার ফরম -->
                <div class="dnt-filter-card">
                    <form action="#" method="GET">
                        <div class="dnt-form-grid">
                            <!-- বছর ফিল্টার -->
                            <div class="dnt-form-group">
                                <label for="result-year">শিক্ষাবর্ষ/বছর <span>*</span></label>
                                <select id="result-year" class="dnt-form-control" required>
                                    <option value="">নির্বাচন করুন</option>
                                    <option value="2026" selected>২০২৬</option>
                                    <option value="2025">২০২৫</option>
                                    <option value="2024">২০২৪</option>
                                </select>
                            </div>

                            <!-- শ্রেণি ফিল্টার -->
                            <div class="dnt-form-group">
                                <label for="result-class">শ্রেণি <span>*</span></label>
                                <select id="result-class" class="dnt-form-control" required>
                                    <option value="">নির্বাচন করুন</option>
                                    <option value="6">ষষ্ঠ শ্রেণি</option>
                                    <option value="7">সপ্তম শ্রেণি</option>
                                    <option value="8">অষ্টম শ্রেণি</option>
                                    <option value="9">নবম শ্রেণি</option>
                                    <option value="10">দশম শ্রেণি</option>
                                    <option value="11">একাদশ শ্রেণি</option>
                                    <option value="12">দ্বাদশ শ্রেণি</option>
                                </select>
                            </div>

                            <!-- শাখা ফিল্টার -->
                            <div class="dnt-form-group">
                                <label for="result-section">শাখা/গ্রুপ <span>*</span></label>
                                <select id="result-section" class="dnt-form-control" required>
                                    <option value="">নির্বাচন করুন</option>
                                    <option value="A">ক শাখা</option>
                                    <option value="B">খ শাখা</option>
                                    <option value="science">বিজ্ঞান গ্রুপ</option>
                                    <option value="humanities">মানবিক গ্রুপ</option>
                                    <option value="business">ব্যবসায় শিক্ষা গ্রুপ</option>
                                </select>
                            </div>

                            <!-- পরীক্ষার ধরন ফিল্টার -->
                            <div class="dnt-form-group">
                                <label for="result-exam">পরীক্ষার ধরন <span>*</span></label>
                                <select id="result-exam" class="dnt-form-control" required>
                                    <option value="">নির্বাচন করুন</option>
                                    <option value="half-yearly">অর্ধ-বার্ষিক পরীক্ষা</option>
                                    <option value="yearly">বার্ষিক পরীক্ষা</option>
                                    <option value="pre-test">প্রাক-নির্বাচনী পরীক্ষা</option>
                                    <option value="test">নির্বাচনী (টেস্ট) পরীক্ষা</option>
                                </select>
                            </div>

                            <!-- রোল নম্বর (ঐচ্ছিক সার্চ) -->
                            <div class="dnt-form-group" style="grid-column: span 2;">
                                <label for="student-roll">রোল / আইডি নম্বর (নির্দিষ্ট শিক্ষার্থীর জন্য)</label>
                                <input type="text" id="student-roll" class="dnt-form-control" placeholder="উদাঃ ১০১">
                            </div>
                        </div>

                        <div class="dnt-form-actions">
                            <button type="reset" class="dnt-btn dnt-btn-secondary"><i class="fa-solid fa-rotate-left"></i> রিসেট</button>
                            <button type="submit" class="dnt-btn dnt-btn-primary"><i class="fa-solid fa-magnifying-glass"></i> ফলাফল খুঁজুন</button>
                        </div>
                    </form>
                </div>

                <!-- ফলাফল টেবিল ব্লক (সার্চ রেসপন্স ডেমো) -->
                <h3 class="dnt-section-heading" style="font-size: 1.4rem;"><i class="fa-solid fa-list-check"></i> ফলাফল তালিকা</h3>
                
                <div class="dnt-table-responsive">
                    <table class="dnt-results-table">
                        <thead>
                            <tr>
                                <th>রোল</th>
                                <th>শিক্ষার্থীর নাম</th>
                                <th>প্রাপ্ত নম্বর / জিপিএ</th>
                                <th>মেধা স্থান</th>
                                <th>ফলাফল স্ট্যাটাস</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>১০১</td>
                                <td style="text-align: left;">মোঃ আশরাফুল ইসলাম</td>
                                <td>৫.০০ (A+)</td>
                                <td>১ম</td>
                                <td><span class="dnt-badge dnt-badge-success">উত্তীর্ণ</span></td>
                            </tr>
                            <tr>
                                <td>১০২</td>
                                <td style="text-align: left;">মোসাম্মৎ সাদিয়া আক্তার</td>
                                <td>৪.৮৫ (A)</td>
                                <td>২য়</td>
                                <td><span class="dnt-badge dnt-badge-success">উত্তীর্ণ</span></td>
                            </tr>
                            <tr>
                                <td>১০৩</td>
                                <td style="text-align: left;">আরিফুর রহমান রনি</td>
                                <td>৪.৫০ (A-)</td>
                                <td>৩য়</td>
                                <td><span class="dnt-badge dnt-badge-success">উত্তীর্ণ</span></td>
                            </tr>
                            <tr>
                                <td>১০৪</td>
                                <td style="text-align: left;">তানভীর আহমেদ</td>
                                <td>৩.২০ (B)</td>
                                <td>৪র্থ</td>
                                <td><span class="dnt-badge dnt-badge-success">উত্তীর্ণ</span></td>
                            </tr>
                            <tr>
                                <td>১০৫</td>
                                <td style="text-align: left;">ফাহমিদা চৌধুরী</td>
                                <td>---</td>
                                <td>---</td>
                                <td><span class="dnt-badge dnt-badge-danger">অকৃতকার্য</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>

            <?php include ('sidebar.php');?>

        </div>
    </section>

  <?php get_footer();?>