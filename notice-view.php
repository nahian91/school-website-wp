<?php include ('header.php'); ?>

    <!-- স্টাইল সেকশন (শুধুমাত্র এই পেজের জন্য) -->
    <style>
        .notice-premium-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.06);
            overflow: hidden;
            margin-bottom: 30px;
        }
        
        .notice-header-area {
            background: linear-gradient(135deg, #f8fafc 0%, #edf2f7 100%);
            padding: 40px;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
        }

        .notice-title {
            font-size: 2.2rem;
            color: var(--dnt-color-primary-dark, #1e293b);
            margin: 0 0 15px 0;
            line-height: 1.4;
        }

        .notice-meta-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .meta-tag {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.9rem;
            color: #64748b;
            background: #ffffff;
            padding: 6px 12px;
            border-radius: 50px;
            border: 1px solid #e2e8f0;
        }

        .notice-date-badge {
            background: var(--dnt-color-primary, #2563eb);
            color: #ffffff;
            text-align: center;
            padding: 12px 20px;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.25);
            min-width: 90px;
        }

        .notice-date-badge .day {
            display: block;
            font-size: 2rem;
            font-weight: 800;
            line-height: 1;
            margin-bottom: 4px;
        }

        .notice-date-badge .month-year {
            display: block;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.9;
        }

        .notice-body-area {
            padding: 40px;
            font-size: 1.1rem;
            line-height: 1.8;
            color: #334155;
        }

        .notice-alert-box {
            display: flex;
            gap: 15px;
            background: #fffbeb;
            border-left: 4px solid #f59e0b;
            padding: 25px;
            border-radius: 8px;
            margin: 35px 0;
        }

        .notice-attachment {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #f8fafc;
            border: 1px solid #cbd5e1;
            padding: 20px;
            border-radius: 12px;
            margin-top: 40px;
            transition: all 0.3s ease;
        }

        .notice-attachment:hover {
            border-color: var(--dnt-color-primary, #2563eb);
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .file-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .file-icon {
            background: #fee2e2;
            color: #ef4444;
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-download-modern {
            background: var(--dnt-color-primary, #2563eb);
            color: #ffffff;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: 0.3s;
        }

        .btn-download-modern:hover {
            background: var(--dnt-color-primary-dark, #1d4ed8);
            transform: translateY(-2px);
            color: #fff;
        }

        .notice-footer-tools {
            border-top: 1px solid #f1f5f9;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fafafa;
        }

        .tool-btn {
            background: transparent;
            border: none;
            color: #64748b;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
            font-size: 0.95rem;
            transition: color 0.2s;
            text-decoration: none;
        }

        .tool-btn:hover { color: var(--dnt-color-primary, #2563eb); }
    </style>

    <!-- পেজ ব্যানার -->
    <section class="dnt-page-banner">
        <div class="dnt-container">
            <h1 class="dnt-page-title">নোটিশ বিস্তারিত</h1>
        </div>
    </section>

    <!-- মেইন কন্টেন্ট -->
    <section class="dnt-page-section">
        <div class="dnt-container">
            <main style="max-width: 900px; margin: 0 auto;">
                
                <div class="notice-premium-card">
                    
                    <!-- কার্ড হেডার (শিরোনাম ও মেটা) -->
                    <div class="notice-header-area">
                        <div>
                            <h2 class="notice-title">২০২৬ শিক্ষাবর্ষের অর্ধবার্ষিক পরীক্ষার সময়সূচী ও নির্দেশনাবলি</h2>
                            <div class="notice-meta-tags">
                                <span class="meta-tag">
                                    <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M10 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2h-8l-2-2z"/></svg>
                                    একাডেমিক নোটিশ
                                </span>
                                <span class="meta-tag">
                                    <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                                    পরীক্ষা নিয়ন্ত্রক
                                </span>
                            </div>
                        </div>
                        
                        <!-- ডেট ব্যাজ -->
                        <div class="notice-date-badge">
                            <span class="day">১৭</span>
                            <span class="month-year">জুলাই, ২০২৬</span>
                        </div>
                    </div>

                    <!-- কার্ড বডি (মূল লেখা) -->
                    <div class="notice-body-area">
                        <p><strong>প্রিয় শিক্ষার্থী ও অভিভাবকবৃন্দ,</strong></p>
                        <p style="text-align: justify;">এতদ্বারা অত্র বিদ্যালয়ের সকল শিক্ষার্থী ও সংশ্লিষ্টদের জানানো যাচ্ছে যে, আগামী ২৫শে জুলাই ২০২৬ থেকে ২০২৬ শিক্ষাবর্ষের অর্ধবার্ষিক পরীক্ষা শুরু হতে যাচ্ছে। পরীক্ষার বিস্তারিত রুটিন ও সময়সূচী নিচে সংযুক্ত করা হলো। সকল শিক্ষার্থীকে নির্ধারিত সময়ের কমপক্ষে ৩০ মিনিট পূর্বে পরীক্ষার হলে উপস্থিত থাকার জন্য নির্দেশ দেওয়া হলো।</p>
                        
                        <!-- সুন্দর অ্যালার্ট বক্স -->
                        <div class="notice-alert-box">
                            <div>
                                <svg viewBox="0 0 24 24" width="32" height="32" fill="#f59e0b"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
                            </div>
                            <div>
                                <h4 style="margin: 0 0 8px 0; color: #b45309; font-size: 1.1rem;">জরুরি নির্দেশনাবলি:</h4>
                                <ul style="margin: 0; padding-left: 20px; color: #92400e; font-size: 1rem;">
                                    <li style="margin-bottom: 5px;">পরীক্ষায় অবশ্যই পরিচ্ছন্ন স্কুল ইউনিফর্ম পরিধান করে আসতে হবে।</li>
                                    <li style="margin-bottom: 5px;">প্রবেশপত্র (Admit Card) ছাড়া কোনো শিক্ষার্থীকে হলে প্রবেশ করতে দেওয়া হবে না।</li>
                                    <li>পরীক্ষার হলে মোবাইল ফোন বা অন্য কোনো ইলেকট্রনিক ডিভাইস আনা সম্পূর্ণ নিষেধ।</li>
                                </ul>
                            </div>
                        </div>

                        <p>পরীক্ষার সুষ্ঠু পরিবেশ বজায় রাখতে আপনাদের সকলের সার্বিক সহযোগিতা একান্ত কাম্য। বিস্তারিত তথ্যের জন্য অফিস চলাকালীন সময়ে যোগাযোগ করুন।</p>
                        <br>
                        <p style="color: #475569;">
                            ধন্যবাদান্তে,<br>
                            <span style="font-size: 1.2rem; font-weight: bold; color: var(--dnt-color-primary-dark, #1e293b); display: inline-block; margin-top: 5px;">অধ্যক্ষ</span><br>
                            Green Gems International School & College।
                        </p>

                        <!-- আধুনিক এটাচমেন্ট বক্স -->
                        <div class="notice-attachment">
                            <div class="file-info">
                                <div class="file-icon">
                                    <svg viewBox="0 0 24 24" width="28" height="28" fill="currentColor"><path d="M20 2H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-8.5 7.5c0 .83-.67 1.5-1.5 1.5H9v2H7.5V7H10c.83 0 1.5.67 1.5 1.5v1zm5 2c0 .83-.67 1.5-1.5 1.5h-2.5V7H15c.83 0 1.5.67 1.5 1.5v3zm4-3H19v1h1.5V11H19v2h-1.5V7h3v1.5zM9 9.5h1v-1H9v1zM4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6zm10 5.5h1v-3h-1v3z"/></svg>
                                </div>
                                <div>
                                    <h4 style="margin: 0 0 4px 0; color: #1e293b; font-size: 1.05rem;">Exam_Routine_2026.pdf</h4>
                                    <span style="color: #64748b; font-size: 0.85rem;">PDF Document • ১.২ MB</span>
                                </div>
                            </div>
                            <a href="#" class="btn-download-modern">
                                <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z"/></svg>
                                ডাউনলোড করুন
                            </a>
                        </div>
                    </div>

                    <!-- কার্ড ফুটার (টুলস) -->
                    <div class="notice-footer-tools">
                        <a href="notice.php" class="tool-btn" style="color: var(--dnt-color-primary, #2563eb); font-weight: 500;">
                            <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/></svg>
                            সকল নোটিশ
                        </a>
                        <div style="display: flex; gap: 20px;">
                            <button class="tool-btn" onclick="window.print()">
                                <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M19 8H5c-1.66 0-3 1.34-3 3v6h4v4h12v-4h4v-6c0-1.66-1.34-3-3-3zm-3 11H8v-5h8v5zm3-7c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm-1-9H6v4h12V3z"/></svg>
                                প্রিন্ট করুন
                            </button>
                            <button class="tool-btn">
                                <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.04.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.47.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.5-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65 0 1.61 1.31 2.92 2.92 2.92 1.61 0 2.92-1.31 2.92-2.92s-1.31-2.92-2.92-2.92z"/></svg>
                                শেয়ার করুন
                            </button>
                        </div>
                    </div>

                </div>

            </main>
        </div>
    </section>

<?php include ('footer.php'); ?>