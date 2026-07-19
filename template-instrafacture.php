<?php 

/*
Template Name: Instrafacture
*/

get_header(); ?>
    <!-- ৪. পেজ ব্যানার ও ব্রেডক্রাম্ব -->
    <section class="dnt-page-banner" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/img/breadcrumb.jpg');">
        <div class="dnt-container">
            <h1 class="dnt-page-title">ভৌত অবকাঠামো</h1>
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
                <span style="color:var(--dnt-color-gray-300);">ভৌত অবকাঠামো</span>
            </div>
        </div>
    </section>

    <!-- 5. MAIN CONTENT -->
    <section class="dnt-page-section">
        <div class="dnt-container dnt-page-grid">
            
            <!-- Left Side: Infrastructure Content -->
            <!-- ভৌত অবকাঠামো ও সুবিধাসমূহ -->
            <main class="dnt-page-content">
                
                <h2 class="dnt-section-heading">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 8px; vertical-align: text-bottom;"><rect width="16" height="20" x="4" y="2" rx="2" ry="2"/><path d="M9 22v-4h6v4"/><path d="M8 6h.01"/><path d="M16 6h.01"/><path d="M12 6h.01"/><path d="M12 10h.01"/><path d="M12 14h.01"/><path d="M16 10h.01"/><path d="M16 14h.01"/><path d="M8 10h.01"/><path d="M8 14h.01"/></svg>
                    ভৌত অবকাঠামো ও সুবিধাসমূহ
                </h2>
                
                <p class="dnt-intro-text">
                    Green Gems International School & College সিলেট বন্দরবাজারের প্রাণকেন্দ্রে একটি সুন্দর, মনোরম এবং সম্পূর্ণ কোলাহলমুক্ত একাডেমিক পরিবেশে অবস্থিত। শিক্ষার্থীদের আন্তর্জাতিক ও আধুনিক মানসম্মত শিক্ষা প্রদানের লক্ষ্যে আমাদের রয়েছে সুবিশাল ক্যাম্পাস এবং যুগোপযোগী ভৌত অবকাঠামো ও আধুনিক সুযোগ-সুবিধা।
                </p>

                <!-- Full Width Highlight Card -->
                <div class="dnt-infra-full-card" style="display: flex; gap: 20px; background: #fff; border: 1px solid #e5e7eb; border-radius: 8px; overflow: hidden; margin-bottom: 30px; box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/infra-academic.jpg" alt="Academic Building" style="width: 45%; height: auto; object-fit: cover;">
                    <div class="dnt-infra-full-text" style="padding: 25px; display: flex; flex-direction: column; justify-content: center;">
                        <h3 style="color: #006a4e; font-size: 1.4rem; margin-top: 0;">আধুনিক একাডেমিক ভবন</h3>
                        <p style="color: #4b5563; line-height: 1.6;">আমাদের মূল একাডেমিক কার্যক্রম পরিচালনার জন্য রয়েছে আধুনিক স্থাপত্যশৈলীতে নির্মিত বহুতল বিশিষ্ট ৩টি সুপরিসর স্মার্ট ভবন।</p>
                        <ul style="padding-left: 20px; line-height: 1.8; color: #4b5563; margin-bottom: 0;">
                            <li>৮০টির অধিক সুসজ্জিত ও আন্তর্জাতিক মানের শ্রেণিকক্ষ।</li>
                            <li>প্রতিটি শ্রেণিকক্ষে পর্যাপ্ত আলো-বাতাস ও সেন্ট্রাল এয়ার ভেন্টিলেশন।</li>
                            <li>ডিজিটাল প্রজেক্টর, স্মার্টবোর্ড ও মাল্টিমিডিয়া সুবিধা।</li>
                            <li>সাউন্ড প্রুফ লার্নিং এনভায়রনমেন্ট এবং নিরবচ্ছিন্ন বিদ্যুৎ ব্যাকআপ (জেনারেটর)।</li>
                        </ul>
                    </div>
                </div>

                <!-- Grid Cards -->
                <div class="dnt-infra-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px;">
                    
                    <!-- Item 1 -->
                    <div class="dnt-infra-card" style="background: #fff; border: 1px solid #e5e7eb; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
                        <div class="dnt-infra-img-wrapper" style="position: relative;">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/infra-science.jpg" alt="Science Lab" style="width: 100%; height: 200px; object-fit: cover;">
                            <div class="dnt-infra-icon" style="position: absolute; bottom: 15px; right: 15px; background: #006a4e; color: #fff; padding: 10px; border-radius: 50%; display: flex;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 2v6l-7 11a1.98 1.98 0 0 0 1.7 3h16.6A1.98 1.98 0 0 0 22 19L15 8V2"/><path d="M8.5 2h7"/><path d="M3 16h18"/></svg>
                            </div>
                        </div>
                        <div class="dnt-infra-details" style="padding: 20px;">
                            <h3 style="color: #006a4e; font-size: 1.2rem; margin-top: 0;">সর্বাধুনিক বিজ্ঞানাগার</h3>
                            <p style="color: #6b7280; font-size: 0.95rem; line-height: 1.6; margin-bottom: 0;">পদার্থবিজ্ঞান, রসায়ন এবং জীববিজ্ঞানের আলাদা ব্যবহারিক ক্লাসের জন্য রয়েছে বিশ্বমানের গবেষণাগার ও অত্যাধুনিক প্র্যাক্টিক্যাল যন্ত্রপাতি।</p>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="dnt-infra-card" style="background: #fff; border: 1px solid #e5e7eb; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
                        <div class="dnt-infra-img-wrapper" style="position: relative;">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/infra-ict.jpg" alt="Computer Lab" style="width: 100%; height: 200px; object-fit: cover;">
                            <div class="dnt-infra-icon" style="position: absolute; bottom: 15px; right: 15px; background: #006a4e; color: #fff; padding: 10px; border-radius: 50%; display: flex;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="14" x="2" y="3" rx="2"/><path d="M8 21h8"/><path d="M12 17v4"/></svg>
                            </div>
                        </div>
                        <div class="dnt-infra-details" style="padding: 20px;">
                            <h3 style="color: #006a4e; font-size: 1.2rem; margin-top: 0;">অত্যাধুনিক আইসিটি ল্যাব</h3>
                            <p style="color: #6b7280; font-size: 0.95rem; line-height: 1.6; margin-bottom: 0;">তথ্যপ্রযুক্তির সঠিক ও প্রায়োগিক শিক্ষায় শিক্ষার্থীদের দক্ষ করে তুলতে রয়েছে হাই-স্পিড ইন্টারনেট এবং সর্বাধুনিক আইটি ইকুইপমেন্ট সম্বলিত শীতাতপ নিয়ন্ত্রিত ল্যাব।</p>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="dnt-infra-card" style="background: #fff; border: 1px solid #e5e7eb; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
                        <div class="dnt-infra-img-wrapper" style="position: relative;">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/infra-library.jpg" alt="Library" style="width: 100%; height: 200px; object-fit: cover;">
                            <div class="dnt-infra-icon" style="position: absolute; bottom: 15px; right: 15px; background: #006a4e; color: #fff; padding: 10px; border-radius: 50%; display: flex;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
                            </div>
                        </div>
                        <div class="dnt-infra-details" style="padding: 20px;">
                            <h3 style="color: #006a4e; font-size: 1.2rem; margin-top: 0;">সমৃদ্ধ কেন্দ্রীয় লাইব্রেরি</h3>
                            <p style="color: #6b7280; font-size: 0.95rem; line-height: 1.6; margin-bottom: 0;">ইসলামী জ্ঞানচর্চা এবং একাডেমিক রেফারেন্সের জন্য প্রায় ১৫,০০০ এর অধিক দেশি-বিদেশি বই, শিক্ষামূলক জার্নাল ও ই-বুক সমৃদ্ধ বিশাল অটোমেটেড লাইব্রেরি।</p>
                        </div>
                    </div>

                    <!-- Item 4 -->
                    <div class="dnt-infra-card" style="background: #fff; border: 1px solid #e5e7eb; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
                        <div class="dnt-infra-img-wrapper" style="position: relative;">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/infra-playground.jpg" alt="Playground" style="width: 100%; height: 200px; object-fit: cover;">
                            <div class="dnt-infra-icon" style="position: absolute; bottom: 15px; right: 15px; background: #006a4e; color: #fff; padding: 10px; border-radius: 50%; display: flex;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20"/><path d="M2 12h20"/></svg>
                            </div>
                        </div>
                        <div class="dnt-infra-details" style="padding: 20px;">
                            <h3 style="color: #006a4e; font-size: 1.2rem; margin-top: 0;">সুপরিসর সবুজ খেলার মাঠ</h3>
                            <p style="color: #6b7280; font-size: 0.95rem; line-height: 1.6; margin-bottom: 0;">ক্যাম্পাসের অভ্যন্তরে রয়েছে সুরক্ষিত ও সুপরিসর খেলার মাঠ, যেখানে শিক্ষার্থীদের মানসিক ও শারীরিক বিকাশের জন্য ইনডোর ও আউটডোর স্পোর্টস মেইনটেইন করা হয়।</p>
                        </div>
                    </div>

                    <!-- Item 5 -->
                    <div class="dnt-infra-card" style="background: #fff; border: 1px solid #e5e7eb; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
                        <div class="dnt-infra-img-wrapper" style="position: relative;">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/infra-auditorium.jpg" alt="Auditorium" style="width: 100%; height: 200px; object-fit: cover;">
                            <div class="dnt-infra-icon" style="position: absolute; bottom: 15px; right: 15px; background: #006a4e; color: #fff; padding: 10px; border-radius: 50%; display: flex;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2a3 3 0 0 0-3 3v7a3 3 0 0 0 6 0V5a3 3 0 0 0-3-3Z"/><path d="M19 10v2a7 7 0 0 1-14 0v-2"/><line x1="12" x2="12" y1="19" y2="22"/></svg>
                            </div>
                        </div>
                        <div class="dnt-infra-details" style="padding: 20px;">
                            <h3 style="color: #006a4e; font-size: 1.2rem; margin-top: 0;">আধুনিক কনফারেন্স হল</h3>
                            <p style="color: #6b7280; font-size: 0.95rem; line-height: 1.6; margin-bottom: 0;">প্রাতিষ্ঠানিক সেমিনার, শিক্ষক-অভিভাবক সিম্পোজিয়াম এবং বিভিন্ন জ্ঞানভিত্তিক সাংস্কৃতিক অনুষ্ঠান আয়োজনের জন্য রয়েছে ১০০০ আসন বিশিষ্ট সেন্ট্রাল অডিটোরিয়াম।</p>
                        </div>
                    </div>

                    <!-- Item 6 -->
                    <div class="dnt-infra-card" style="background: #fff; border: 1px solid #e5e7eb; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
                        <div class="dnt-infra-img-wrapper" style="position: relative;">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/infra-mosque.jpg" alt="Mosque & Security" style="width: 100%; height: 200px; object-fit: cover;">
                            <div class="dnt-infra-icon" style="position: absolute; bottom: 15px; right: 15px; background: #006a4e; color: #fff; padding: 10px; border-radius: 50%; display: flex;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M12 22V2"/></svg>
                            </div>
                        </div>
                        <div class="dnt-infra-details" style="padding: 20px;">
                            <h3 style="color: #006a4e; font-size: 1.2rem; margin-top: 0;">নিজস্ব মসজিদ ও নিরাপত্তা</h3>
                            <p style="color: #6b7280; font-size: 0.95rem; line-height: 1.6; margin-bottom: 0;">নিয়মিত সালাত আদায়ের জন্য ক্যাম্পাসের ভেতরেই রয়েছে সুদৃশ্য নিজস্ব মসজিদ। এছাড়া শিক্ষার্থীদের নিটোল নিরাপত্তা নিশ্চিত করতে পুরো এরিয়া সার্বক্ষণিক সিসিটিভি ক্যামেরা ও সিকিউরিটি টিম দ্বারা নিয়ন্ত্রিত।</p>
                        </div>
                    </div>

                </div>

            </main>

            <?php include ('sidebar.php');?>

        </div>
    </section>

    <?php get_footer();?>