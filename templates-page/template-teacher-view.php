<?php include ('header.php'); ?>

    <!-- স্টাইল সেকশন (শুধুমাত্র টিচার প্রোফাইল পেজের জন্য) -->
    <style>
        .teacher-profile-wrapper {
            max-width: 1000px;
            margin: 0 auto;
        }

        .teacher-premium-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            margin-bottom: 30px;
        }

        /* Top Header Grid: Image + Core Info */
        .teacher-header-grid {
            display: grid;
            grid-template-columns: 320px 1fr;
            background: linear-gradient(135deg, #f8fafc 0%, #edf2f7 100%);
            border-bottom: 1px solid #e2e8f0;
        }

        .teacher-image-area {
            padding: 40px;
            text-align: center;
            background: #ffffff;
            border-right: 1px solid #e2e8f0;
        }

        .teacher-img {
            width: 220px;
            height: 220px;
            border-radius: 50%;
            object-fit: cover;
            border: 6px solid #f1f5f9;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        .teacher-social {
            display: flex;
            justify-content: center;
            gap: 12px;
        }

        .teacher-social a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: #f1f5f9;
            color: #64748b;
            border-radius: 50%;
            transition: 0.3s;
        }

        .teacher-social a:hover {
            background: var(--dnt-color-primary, #2563eb);
            color: #ffffff;
            transform: translateY(-3px);
        }

        .teacher-core-info {
            padding: 50px 40px;
        }

        .teacher-dept-badge {
            display: inline-block;
            background: rgba(37, 99, 235, 0.1);
            color: var(--dnt-color-primary, #2563eb);
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .teacher-name {
            font-size: 2.2rem;
            color: var(--dnt-color-primary-dark, #1e293b);
            margin: 0 0 8px 0;
            line-height: 1.2;
        }

        .teacher-designation {
            font-size: 1.2rem;
            color: #64748b;
            font-weight: 500;
            margin-bottom: 25px;
        }

        .contact-info-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: grid;
            gap: 15px;
        }

        .contact-info-list li {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1.05rem;
            color: #334155;
        }

        .contact-icon {
            width: 36px;
            height: 36px;
            background: #ffffff;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--dnt-color-primary, #2563eb);
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        /* Body Sections */
        .teacher-body-area {
            padding: 40px;
        }

        .section-title {
            font-size: 1.4rem;
            color: var(--dnt-color-primary-dark, #1e293b);
            margin: 0 0 20px 0;
            display: flex;
            align-items: center;
            gap: 10px;
            border-bottom: 2px solid #f1f5f9;
            padding-bottom: 10px;
        }

        .bio-text {
            font-size: 1.05rem;
            line-height: 1.8;
            color: #475569;
            margin-bottom: 40px;
            text-align: justify;
        }

        .education-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .education-list li {
            position: relative;
            padding-left: 25px;
            margin-bottom: 20px;
        }

        .education-list li::before {
            content: '';
            position: absolute;
            left: 0;
            top: 8px;
            width: 10px;
            height: 10px;
            background: var(--dnt-color-primary, #2563eb);
            border-radius: 50%;
        }

        .edu-degree {
            font-weight: bold;
            font-size: 1.1rem;
            color: #1e293b;
            margin: 0 0 4px 0;
        }

        .edu-inst {
            font-size: 0.95rem;
            color: #64748b;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .teacher-header-grid {
                grid-template-columns: 1fr;
            }
            .teacher-image-area {
                border-right: none;
                border-bottom: 1px solid #e2e8f0;
            }
            .teacher-core-info {
                padding: 30px 20px;
            }
        }
    </style>

    <!-- পেজ ব্যানার -->
    <section class="dnt-page-banner">
        <div class="dnt-container">
            <h1 class="dnt-page-title">শিক্ষকের প্রোফাইল</h1>
            <div class="dnt-breadcrumb">
                <a href="index.php">হোম</a> 
                <span>/</span> 
                <a href="teachers.php">শিক্ষক মণ্ডলী</a> 
                <span>/</span> 
                <span style="color:var(--dnt-color-gray-300);">প্রোফাইল বিস্তারিত</span>
            </div>
        </div>
    </section>

    <!-- মেইন কন্টেন্ট -->
    <section class="dnt-page-section">
        <div class="dnt-container">
            <main class="teacher-profile-wrapper">
                
                <div class="teacher-premium-card">
                    
                    <!-- টপ হেডার এরিয়া: ছবি এবং মূল তথ্য -->
                    <div class="teacher-header-grid">
                        
                        <!-- বাম পাশ: ছবি ও সোশ্যাল -->
                        <div class="teacher-image-area">
                            <!-- প্রফেশনাল রিয়েল ইমেজ -->
                            <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=600&auto=format&fit=crop" alt="শিক্ষকের ছবি" class="teacher-img">
                            
                            <div class="teacher-social">
                                <a href="#" title="ফেসবুক">
                                    <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg>
                                </a>
                                <a href="#" title="লিংকডইন">
                                    <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg>
                                </a>
                                <a href="#" title="ইমেইল করুন">
                                    <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                                </a>
                            </div>
                        </div>

                        <!-- ডান পাশ: ব্যক্তিগত ও যোগাযোগের তথ্য -->
                        <div class="teacher-core-info">
                            <span class="teacher-dept-badge">বিজ্ঞান ও গণিত বিভাগ</span>
                            <h1 class="teacher-name">মোঃ শফিকুল ইসলাম</h1>
                            <p class="teacher-designation">সিনিয়র সহকারী শিক্ষক (গণিত)</p>

                            <ul class="contact-info-list">
                                <li>
                                    <div class="contact-icon">
                                        <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                                    </div>
                                    <span>shafiqul.math@adarshaschool.edu.bd</span>
                                </li>
                                <li>
                                    <div class="contact-icon">
                                        <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                                    </div>
                                    <span>+৮৮০ ১৭১১-০০০০০০</span>
                                </li>
                                <li>
                                    <div class="contact-icon">
                                        <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                                    </div>
                                    <span>রুম নং: ২০৫, একাডেমিক ভবন ১</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- বডি এরিয়া: পরিচিতি, শিক্ষা ও অভিজ্ঞতা -->
                    <div class="teacher-body-area">
                        
                        <!-- ব্যক্তিগত পরিচিতি -->
                        <h2 class="section-title">
                            <svg viewBox="0 0 24 24" width="22" height="22" fill="var(--dnt-color-primary)"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                            পরিচিতি ও জীবনবৃত্তান্ত
                        </h2>
                        <div class="bio-text">
                            <p>মোঃ শফিকুল ইসলাম আমাদের প্রতিষ্ঠানের একজন অত্যন্ত দক্ষ এবং অভিজ্ঞ গণিত শিক্ষক। তিনি বিগত ১৫ বছর ধরে শিক্ষকতা পেশায় নিযুক্ত আছেন এবং অত্র বিদ্যালয়ে গত ৭ বছর ধরে সফলতার সাথে দায়িত্ব পালন করছেন। তাঁর পাঠদানের অনন্য কৌশল এবং শিক্ষার্থীদের প্রতি আন্তরিকতা তাঁকে সবার কাছে অত্যন্ত প্রিয় করে তুলেছে। তিনি গণিত অলিম্পিয়াড এবং বিভিন্ন বিজ্ঞান মেলার সমন্বয়ক হিসেবেও কাজ করছেন।</p>
                        </div>

                        <!-- গ্রিড লেআউট: শিক্ষা ও অন্যান্য -->
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 40px;">
                            
                            <!-- শিক্ষাগত যোগ্যতা -->
                            <div>
                                <h2 class="section-title">
                                    <svg viewBox="0 0 24 24" width="22" height="22" fill="var(--dnt-color-primary)"><path d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3zm6.82 6L12 12.72 5.18 9 12 5.28 18.82 9zM17 15.99l-5 2.73-5-2.73v-3.72l5 2.73 5-2.73v3.72z"/></svg>
                                    শিক্ষাগত যোগ্যতা
                                </h2>
                                <ul class="education-list">
                                    <li>
                                        <p class="edu-degree">স্নাতকোত্তর (এম.এসসি) - ফলিত গণিত</p>
                                        <span class="edu-inst">ঢাকা বিশ্ববিদ্যালয় (২০১০)</span>
                                    </li>
                                    <li>
                                        <p class="edu-degree">স্নাতক (বি.এসসি সম্মান) - গণিত</p>
                                        <span class="edu-inst">ঢাকা বিশ্ববিদ্যালয় (২০০৮)</span>
                                    </li>
                                    <li>
                                        <p class="edu-degree">বি.এড (ব্যাচেলর অব এডুকেশন)</p>
                                        <span class="edu-inst">সরকারি টিচার্স ট্রেনিং কলেজ (২০১২)</span>
                                    </li>
                                </ul>
                            </div>

                            <!-- দক্ষতা ও দায়িত্ব -->
                            <div>
                                <h2 class="section-title">
                                    <svg viewBox="0 0 24 24" width="22" height="22" fill="var(--dnt-color-primary)"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9 14l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                                    বিশেষ দায়িত্ব ও দক্ষতা
                                </h2>
                                <ul class="education-list" style="margin-top: 15px;">
                                    <li>
                                        <p class="edu-degree">কো-অর্ডিনেটর, গণিত ক্লাব</p>
                                        <span class="edu-inst">বিদ্যালয় পর্যায়ে গণিত অলিম্পিয়াডের প্রস্তুতি।</span>
                                    </li>
                                    <li>
                                        <p class="edu-degree">স্কাউট মাস্টার</p>
                                        <span class="edu-inst">বাংলাদেশ স্কাউটস, স্কুল শাখা।</span>
                                    </li>
                                    <li>
                                        <p class="edu-degree">পরীক্ষা নিয়ন্ত্রক কমিটি</p>
                                        <span class="edu-inst">অর্ধবার্ষিক ও বার্ষিক পরীক্ষা পরিচালনা।</span>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <!-- কার্ড ফুটার (অ্যাকশন বাটন) -->
                    <div style="background: #fafafa; border-top: 1px solid #f1f5f9; padding: 20px 40px; display: flex; justify-content: space-between; align-items: center;">
                        <a href="teachers.php" style="color: #64748b; text-decoration: none; display: flex; align-items: center; gap: 8px; font-weight: 500;">
                            <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/></svg>
                            শিক্ষক তালিকায় ফিরে যান
                        </a>
                        <button onclick="window.print()" style="background: transparent; border: 1px solid #cbd5e1; padding: 8px 16px; border-radius: 6px; color: #475569; cursor: pointer; display: flex; align-items: center; gap: 8px; transition: 0.2s;">
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M19 8H5c-1.66 0-3 1.34-3 3v6h4v4h12v-4h4v-6c0-1.66-1.34-3-3-3zm-3 11H8v-5h8v5zm3-7c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm-1-9H6v4h12V3z"/></svg>
                            প্রোফাইল প্রিন্ট
                        </button>
                    </div>

                </div>

            </main>
        </div>
    </section>

<?php include ('footer.php'); ?>