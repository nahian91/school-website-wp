<?php include ('header.php'); ?>

    <!-- স্টাইল সেকশন (শুধুমাত্র স্টাফ প্রোফাইল পেজের জন্য) -->
    <style>
        .staff-profile-wrapper {
            max-width: 1000px;
            margin: 0 auto;
        }

        .staff-premium-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.04);
            overflow: hidden;
            margin-bottom: 30px;
        }

        /* Top Header Grid */
        .staff-header-grid {
            display: grid;
            grid-template-columns: 320px 1fr;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-bottom: 1px solid #e2e8f0;
        }

        .staff-image-area {
            padding: 40px;
            text-align: center;
            background: #ffffff;
            border-right: 1px solid #e2e8f0;
        }

        .staff-img {
            width: 200px;
            height: 200px;
            border-radius: 12px; /* প্রফেশনাল রাউন্ডেড স্কয়ার */
            object-fit: cover;
            border: 5px solid #f8fafc;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            margin-bottom: 20px;
        }

        .staff-social {
            display: flex;
            justify-content: center;
            gap: 12px;
        }

        .staff-social a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            background: #f1f5f9;
            color: #64748b;
            border-radius: 8px;
            transition: 0.3s;
        }

        .staff-social a:hover {
            background: var(--dnt-color-primary, #2563eb);
            color: #ffffff;
            transform: translateY(-2px);
        }

        .staff-core-info {
            padding: 45px 40px;
        }

        .staff-dept-badge {
            display: inline-block;
            background: rgba(16, 185, 129, 0.1); /* হালকা সবুজ শেড */
            color: #059669;
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 15px;
            border: 1px solid #a7f3d0;
        }

        .staff-name {
            font-size: 2.1rem;
            color: var(--dnt-color-primary-dark, #1e293b);
            margin: 0 0 8px 0;
            line-height: 1.2;
        }

        .staff-designation {
            font-size: 1.15rem;
            color: #475569;
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
            width: 34px;
            height: 34px;
            background: #ffffff;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--dnt-color-primary, #2563eb);
            box-shadow: 0 2px 6px rgba(0,0,0,0.06);
        }

        /* Body Sections */
        .staff-body-area {
            padding: 40px;
        }

        .section-title {
            font-size: 1.35rem;
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
            line-height: 1.7;
            color: #475569;
            margin-bottom: 40px;
            text-align: justify;
        }

        .task-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .task-list li {
            position: relative;
            padding-left: 30px;
            margin-bottom: 18px;
            font-size: 1.05rem;
            color: #334155;
            line-height: 1.5;
        }

        .task-list li::before {
            content: '✓';
            position: absolute;
            left: 0;
            top: 0;
            color: #059669; /* সবুজ রঙের চেকমার্ক */
            font-weight: bold;
            font-size: 1.1rem;
            background: #d1fae5;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .exp-list {
            list-style: none;
            padding: 0;
            margin: 0;
            border-left: 2px solid #e2e8f0;
            margin-left: 10px;
        }

        .exp-list li {
            position: relative;
            padding-left: 25px;
            margin-bottom: 25px;
        }

        .exp-list li::before {
            content: '';
            position: absolute;
            left: -7px;
            top: 5px;
            width: 12px;
            height: 12px;
            background: #ffffff;
            border: 3px solid var(--dnt-color-primary, #2563eb);
            border-radius: 50%;
        }

        .exp-title {
            font-weight: bold;
            font-size: 1.1rem;
            color: #1e293b;
            margin: 0 0 4px 0;
        }

        .exp-meta {
            font-size: 0.95rem;
            color: #64748b;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .staff-header-grid {
                grid-template-columns: 1fr;
            }
            .staff-image-area {
                border-right: none;
                border-bottom: 1px solid #e2e8f0;
            }
            .staff-core-info {
                padding: 30px 20px;
            }
        }
    </style>

    <!-- পেজ ব্যানার -->
    <section class="dnt-page-banner">
        <div class="dnt-container">
            <h1 class="dnt-page-title">কর্মকর্তা ও কর্মচারী প্রোফাইল</h1>
            <div class="dnt-breadcrumb">
                <a href="index.php">হোম</a> 
                <span>/</span> 
                <a href="staff.php">কর্মকর্তা ও কর্মচারী</a> 
                <span>/</span> 
                <span style="color:var(--dnt-color-gray-300);">প্রোফাইল বিস্তারিত</span>
            </div>
        </div>
    </section>

    <!-- মেইন কন্টেন্ট -->
    <section class="dnt-page-section">
        <div class="dnt-container">
            <main class="staff-profile-wrapper">
                
                <div class="staff-premium-card">
                    
                    <!-- টপ হেডার এরিয়া: ছবি এবং মূল তথ্য -->
                    <div class="staff-header-grid">
                        
                        <!-- বাম পাশ: ছবি ও সোশ্যাল/ইমেইল -->
                        <div class="staff-image-area">
                            <!-- প্রফেশনাল স্টাফ ইমেজ -->
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=600&auto=format&fit=crop" alt="অফিস স্টাফ ছবি" class="staff-img">
                            
                            <div class="staff-social">
                                <a href="#" title="ফেসবুক">
                                    <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg>
                                </a>
                                <a href="#" title="ইমেইল করুন">
                                    <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                                </a>
                            </div>
                        </div>

                        <!-- ডান পাশ: ব্যক্তিগত ও যোগাযোগের তথ্য -->
                        <div class="staff-core-info">
                            <span class="staff-dept-badge">হিসাবরক্ষণ ও প্রশাসনিক শাখা</span>
                            <h1 class="staff-name">মোঃ হাবিবুর রহমান</h1>
                            <p class="staff-designation">প্রধান হিসাবরক্ষক (Chief Accountant)</p>

                            <ul class="contact-info-list">
                                <li>
                                    <div class="contact-icon">
                                        <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                                    </div>
                                    <span>accounts@adarshaschool.edu.bd</span>
                                </li>
                                <li>
                                    <div class="contact-icon">
                                        <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                                    </div>
                                    <span>+৮৮০ ১৯১১-৩৩৩৪৪৪</span>
                                </li>
                                <li>
                                    <div class="contact-icon">
                                        <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                                    </div>
                                    <span>হিসাবরক্ষণ শাখা, প্রশাসনিক ভবন (নিচ তলা)</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- বডি এরিয়া: পরিচিতি, অভিজ্ঞতা ও দায়িত্ব -->
                    <div class="staff-body-area">
                        
                        <!-- ব্যক্তিগত পরিচিতি -->
                        <h2 class="section-title">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="var(--dnt-color-primary)"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                            পরিচিতি
                        </h2>
                        <div class="bio-text">
                            <p>মোঃ হাবিবুর রহমান অত্র প্রতিষ্ঠানের একজন অত্যন্ত বিশ্বস্ত ও পরিশ্রমী কর্মকর্তা। বিগত এক যুগেরও বেশি সময় ধরে তিনি অত্যন্ত নিষ্ঠার সাথে প্রতিষ্ঠানের আর্থিক ও হিসাব সংক্রান্ত যাবতীয় কার্যাবলি পরিচালনা করে আসছেন। শিক্ষার্থীদের বেতন আদায়, প্রাতিষ্ঠানিক ফান্ডের হিসাব সংরক্ষণ থেকে শুরু করে অডিট কার্যক্রম পরিচালনায় তাঁর দক্ষতা ও স্বচ্ছতা সর্বজনস্বীকৃত।</p>
                        </div>

                        <!-- গ্রিড লেআউট: দায়িত্ব ও কর্ম অভিজ্ঞতা -->
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 40px;">
                            
                            <!-- প্রধান দায়িত্বসমূহ -->
                            <div>
                                <h2 class="section-title">
                                    <svg viewBox="0 0 24 24" width="20" height="20" fill="var(--dnt-color-primary)"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9 14l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                                    প্রধান দায়িত্বসমূহ
                                </h2>
                                <ul class="task-list">
                                    <li>শিক্ষার্থীদের মাসিক বেতন ও অন্যান্য ফিস সংগ্রহ ও রসিদ প্রদান।</li>
                                    <li>শিক্ষক ও কর্মচারীদের মাসিক বেতন বিবরণী তৈরি ও বিলি।</li>
                                    <li>প্রতিষ্ঠানের দৈনন্দিন আয়-ব্যয়ের হিসাব ও ক্যাশ বুক সংরক্ষণ।</li>
                                    <li>বার্ষিক অডিট (Audit) রিপোর্টের জন্য যাবতীয় নথিপত্র প্রস্তুতকরণ।</li>
                                    <li>ব্যাংক হিসাব পরিচালনা ও বিবরণী সমন্বয় (Bank Reconciliation)।</li>
                                </ul>
                            </div>

                            <!-- কর্ম অভিজ্ঞতা -->
                            <div>
                                <h2 class="section-title">
                                    <svg viewBox="0 0 24 24" width="20" height="20" fill="var(--dnt-color-primary)"><path d="M20 6h-4V4c0-1.11-.89-2-2-2h-4c-1.11 0-2 .89-2 2v2H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-6 0h-4V4h4v2z"/></svg>
                                    কর্ম অভিজ্ঞতা (Timeline)
                                </h2>
                                <ul class="exp-list">
                                    <li>
                                        <p class="exp-title">প্রধান হিসাবরক্ষক</p>
                                        <span class="exp-meta">Green Gems International School & College (২০১৮ - বর্তমান)</span>
                                    </li>
                                    <li>
                                        <p class="exp-title">সহকারী হিসাবরক্ষক</p>
                                        <span class="exp-meta">Green Gems International School & College (২০১২ - ২০১৮)</span>
                                    </li>
                                    <li>
                                        <p class="exp-title">অফিস সহকারী</p>
                                        <span class="exp-meta">ঢাকা কমার্স কলেজ (২০০৮ - ২০১২)</span>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <!-- কার্ড ফুটার (অ্যাকশন বাটন) -->
                    <div style="background: #fafafa; border-top: 1px solid #f1f5f9; padding: 20px 40px; display: flex; justify-content: space-between; align-items: center;">
                        <a href="staff.php" style="color: #64748b; text-decoration: none; display: flex; align-items: center; gap: 8px; font-weight: 500;">
                            <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/></svg>
                            স্টাফ তালিকায় ফিরে যান
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