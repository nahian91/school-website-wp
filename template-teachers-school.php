<?php 

/*
Template Name: Teachers School
*/

get_header(); ?>

<style>
    /* ==========================================================================
       SVG ICON HELPERS
       এই ক্লাসগুলো SVG আইকনগুলোকে ঠিক Font Awesome-এর মতো আচরণ করতে সাহায্য করবে।
       ========================================================================== */
    .dnt-svg-icon {
        fill: currentColor;
        display: inline-block;
        vertical-align: middle;
    }
    .dnt-icon-xs { width: 12px; height: 12px; }
    .dnt-icon-sm { width: 16px; height: 16px; }
    .dnt-icon-md { width: 24px; height: 24px; }
    .dnt-icon-lg { width: 32px; height: 32px; }
    .dnt-icon-xl { width: 48px; height: 48px; }
    
    .dnt-teacher-img .dnt-svg-icon {
        width: 60px;
        height: 60px;
    }
</style>

    <!-- 4. PAGE BREADCRUMB BANNER -->
    <section class="dnt-page-banner">
        <div class="dnt-container">
            <h1 class="dnt-page-title">শিক্ষকমণ্ডলী (স্কুল শাখা)</h1>
            <div class="dnt-breadcrumb">
                <a href="index.html" style="display:flex; align-items:center; gap:5px;">
                    <svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg>
                    হোম
                </a> 
                <span>
                    <svg class="dnt-svg-icon dnt-icon-xs" style="margin:0 5px;" viewBox="0 0 24 24"><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/></svg>
                </span> 
                <span>শিক্ষক ও কর্মচারী</span>
                <span>
                    <svg class="dnt-svg-icon dnt-icon-xs" style="margin:0 5px;" viewBox="0 0 24 24"><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/></svg>
                </span> 
                <span style="color:var(--dnt-color-gray-300);">স্কুল শাখা</span>
            </div>
        </div>
    </section>

    <!-- 5. MAIN CONTENT -->
    <section class="dnt-page-section">
        <div class="dnt-container">
            
            <!-- Teachers Directory (Full Width) -->
            <main class="dnt-page-content" style="width: 100%;">
                
                <h2 class="dnt-section-heading" style="display:flex; align-items:center; gap:10px;">
                    <svg class="dnt-svg-icon dnt-icon-lg" style="color:var(--dnt-color-primary);" viewBox="0 0 24 24"><path d="M21 3H3c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h7v2H8v2h8v-2h-2v-2h7c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 14H3V5h18v12z"/><circle cx="12" cy="9" r="2.5"/><path d="M16 16v-1.5c0-1.67-3.33-2.5-5-2.5s-5 .83-5 2.5V16h10z"/></svg>
                    শিক্ষকমণ্ডলী (ষষ্ঠ - দশম শ্রেণি)
                </h2>
                
                <p class="dnt-intro-text">
                    আদর্শ উচ্চ বিদ্যালয়ের স্কুল শাখায় পাঠদানের জন্য রয়েছেন একঝাঁক অভিজ্ঞ, উচ্চশিক্ষিত এবং নিবেদিতপ্রাণ শিক্ষকমণ্ডলী। ডিজিটাল কন্টেন্ট এবং আধুনিক পাঠদান পদ্ধতির মাধ্যমে তারা শিক্ষার্থীদের মাঝে জ্ঞানের আলো ছড়িয়ে দিচ্ছেন।
                </p>

                <!-- 1. Science Department -->
                <h3 class="dnt-dept-title" style="display:flex; align-items:center; gap:10px;">
                    <svg class="dnt-svg-icon dnt-icon-md" style="color:var(--dnt-color-primary);" viewBox="0 0 24 24"><path d="M7 19v-1h10v1H7zm14.53-6.46l-6.02-8.59c-.43-.61-1.12-.95-1.85-.95h-3.32c-.73 0-1.42.34-1.85.95l-6.02 8.59c-.48.69-.5 1.6-.05 2.31.45.71 1.23 1.15 2.07 1.15h15.02c.84 0 1.62-.44 2.07-1.15.45-.71.43-1.62-.05-2.31zM12 5.5l5.25 7.5H6.75L12 5.5z"/></svg>
                    বিজ্ঞান বিভাগ
                </h3>
                <div class="dnt-teacher-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 25px;">
                    <div class="dnt-teacher-card">
                        <div class="dnt-teacher-img">
                            <svg class="dnt-svg-icon" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                        </div>
                        <h3 class="dnt-teacher-name">জনাব আরিফ হোসেন</h3>
                        <div class="dnt-teacher-desig">সিনিয়র শিক্ষক (পদার্থবিজ্ঞান)</div>
                        <div class="dnt-teacher-edu">বি.এসসি (অনার্স), এম.এসসি (পদার্থবিজ্ঞান), বি.এড</div>
                        <div class="dnt-teacher-social">
                            <a href="#" title="Email"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg></a>
                            <a href="#" title="Facebook"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg></a>
                            <a href="#" title="LinkedIn"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg></a>
                        </div>
                        <a href="#" class="dnt-btn dnt-btn-outline" style="margin-top: 15px; width: 100%; justify-content: center; padding: 8px 0; font-size: 0.9rem;">প্রোফাইল দেখুন</a>
                    </div>

                    <div class="dnt-teacher-card">
                        <div class="dnt-teacher-img">
                            <svg class="dnt-svg-icon" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                        </div>
                        <h3 class="dnt-teacher-name">মিসেস রুবিনা আক্তার</h3>
                        <div class="dnt-teacher-desig">সহকারী শিক্ষক (জীববিজ্ঞান)</div>
                        <div class="dnt-teacher-edu">বি.এসসি, এম.এসসি (প্রাণিবিদ্যা), এম.এড</div>
                        <div class="dnt-teacher-social">
                            <a href="#" title="Email"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg></a>
                            <a href="#" title="Facebook"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg></a>
                            <a href="#" title="LinkedIn"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg></a>
                        </div>
                        <a href="#" class="dnt-btn dnt-btn-outline" style="margin-top: 15px; width: 100%; justify-content: center; padding: 8px 0; font-size: 0.9rem;">প্রোফাইল দেখুন</a>
                    </div>

                    <div class="dnt-teacher-card">
                        <div class="dnt-teacher-img">
                            <svg class="dnt-svg-icon" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                        </div>
                        <h3 class="dnt-teacher-name">জনাব শামীম আহমেদ</h3>
                        <div class="dnt-teacher-desig">সহকারী শিক্ষক (রসায়ন)</div>
                        <div class="dnt-teacher-edu">বি.এসসি (অনার্স), এম.এসসি (রসায়ন)</div>
                        <div class="dnt-teacher-social">
                            <a href="#" title="Email"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg></a>
                            <a href="#" title="Facebook"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg></a>
                            <a href="#" title="LinkedIn"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg></a>
                        </div>
                        <a href="#" class="dnt-btn dnt-btn-outline" style="margin-top: 15px; width: 100%; justify-content: center; padding: 8px 0; font-size: 0.9rem;">প্রোফাইল দেখুন</a>
                    </div>
                </div>

                <!-- 2. Math Department -->
                <h3 class="dnt-dept-title" style="margin-top: 40px; display:flex; align-items:center; gap:10px;">
                    <svg class="dnt-svg-icon dnt-icon-md" style="color:var(--dnt-color-primary);" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-6 2h4v4h-4V5zm-6 0h4v4H7V5zm0 6h4v2H7v-2zm0 4h4v2H7v-2zm6 2v-4h4v4h-4z"/></svg>
                    গণিত বিভাগ
                </h3>
                <div class="dnt-teacher-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 25px;">
                    <div class="dnt-teacher-card">
                        <div class="dnt-teacher-img">
                            <svg class="dnt-svg-icon" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                        </div>
                        <h3 class="dnt-teacher-name">মো: রফিকুল ইসলাম</h3>
                        <div class="dnt-teacher-desig">সিনিয়র শিক্ষক (গণিত)</div>
                        <div class="dnt-teacher-edu">বি.এসসি, এম.এসসি, বি.এড (ঢাকা বিশ্ববিদ্যালয়)</div>
                        <div class="dnt-teacher-social">
                            <a href="#" title="Email"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg></a>
                            <a href="#" title="Facebook"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg></a>
                            <a href="#" title="LinkedIn"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg></a>
                        </div>
                        <a href="#" class="dnt-btn dnt-btn-outline" style="margin-top: 15px; width: 100%; justify-content: center; padding: 8px 0; font-size: 0.9rem;">প্রোফাইল দেখুন</a>
                    </div>

                    <div class="dnt-teacher-card">
                        <div class="dnt-teacher-img">
                            <svg class="dnt-svg-icon" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                        </div>
                        <h3 class="dnt-teacher-name">জনাব শফিকুল আলম</h3>
                        <div class="dnt-teacher-desig">সহকারী শিক্ষক (উচ্চতর গণিত)</div>
                        <div class="dnt-teacher-edu">বি.এসসি (অনার্স), এম.এসসি (ফলিত গণিত)</div>
                        <div class="dnt-teacher-social">
                            <a href="#" title="Email"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg></a>
                            <a href="#" title="Facebook"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg></a>
                            <a href="#" title="LinkedIn"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg></a>
                        </div>
                        <a href="#" class="dnt-btn dnt-btn-outline" style="margin-top: 15px; width: 100%; justify-content: center; padding: 8px 0; font-size: 0.9rem;">প্রোফাইল দেখুন</a>
                    </div>

                    <div class="dnt-teacher-card">
                        <div class="dnt-teacher-img">
                            <svg class="dnt-svg-icon" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                        </div>
                        <h3 class="dnt-teacher-name">মিসেস নাদিয়া সুলতানা</h3>
                        <div class="dnt-teacher-desig">সহকারী শিক্ষক (গণিত)</div>
                        <div class="dnt-teacher-edu">বি.এসসি (গণিত), বি.এড</div>
                        <div class="dnt-teacher-social">
                            <a href="#" title="Email"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg></a>
                            <a href="#" title="Facebook"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg></a>
                            <a href="#" title="LinkedIn"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg></a>
                        </div>
                        <a href="#" class="dnt-btn dnt-btn-outline" style="margin-top: 15px; width: 100%; justify-content: center; padding: 8px 0; font-size: 0.9rem;">প্রোফাইল দেখুন</a>
                    </div>
                </div>

                <!-- 3. Language Department -->
                <h3 class="dnt-dept-title" style="margin-top: 40px; display:flex; align-items:center; gap:10px;">
                    <svg class="dnt-svg-icon dnt-icon-md" style="color:var(--dnt-color-primary);" viewBox="0 0 24 24"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zm6.93 6h-2.95c-.32-1.25-.78-2.45-1.38-3.56 1.84.63 3.37 1.91 4.33 3.56zM12 4.04c.83 1.2 1.48 2.53 1.91 3.96h-3.82c.43-1.43 1.08-2.76 1.91-3.96zM4.26 14C4.1 13.36 4 12.69 4 12s.1-1.36.26-2h3.38c-.08.66-.14 1.32-.14 2 0 .68.06 1.34.14 2H4.26zm.82 2h2.95c.32 1.25.78 2.45 1.38 3.56-1.84-.63-3.37-1.9-4.33-3.56zm2.95-8H5.08c.96-1.66 2.49-2.93 4.33-3.56C8.81 5.55 8.35 6.75 8.03 8zM12 19.96c-.83-1.2-1.48-2.53-1.91-3.96h3.82c-.43 1.43-1.08 2.76-1.91 3.96zM14.34 14H9.66c-.09-.66-.16-1.32-.16-2 0-.68.07-1.35.16-2h4.68c.09.65.16 1.32.16 2 0 .68-.07 1.34-.16 2zm.25 5.56c.6-1.11 1.06-2.31 1.38-3.56h2.95c-.96 1.65-2.49 2.93-4.33 3.56zM16.36 14c.08-.66.14-1.32.14-2 0-.68-.06-1.34-.14-2h3.38c.16.64.26 1.31.26 2s-.1 1.36-.26 2h-3.38z"/></svg>
                    ভাষা বিভাগ (বাংলা ও ইংরেজি)
                </h3>
                <div class="dnt-teacher-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 25px;">
                    <div class="dnt-teacher-card">
                        <div class="dnt-teacher-img">
                            <svg class="dnt-svg-icon" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                        </div>
                        <h3 class="dnt-teacher-name">মাহমুদা বেগম</h3>
                        <div class="dnt-teacher-desig">সিনিয়র শিক্ষক (বাংলা)</div>
                        <div class="dnt-teacher-edu">বি.এ (অনার্স), এম.এ (বাংলা সাহিত্য), বি.এড</div>
                        <div class="dnt-teacher-social">
                            <a href="#" title="Email"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg></a>
                            <a href="#" title="Facebook"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg></a>
                            <a href="#" title="LinkedIn"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg></a>
                        </div>
                        <a href="#" class="dnt-btn dnt-btn-outline" style="margin-top: 15px; width: 100%; justify-content: center; padding: 8px 0; font-size: 0.9rem;">প্রোফাইল দেখুন</a>
                    </div>

                    <div class="dnt-teacher-card">
                        <div class="dnt-teacher-img">
                            <svg class="dnt-svg-icon" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                        </div>
                        <h3 class="dnt-teacher-name">জনাব কামরুল হাসান</h3>
                        <div class="dnt-teacher-desig">সহকারী শিক্ষক (ইংরেজি)</div>
                        <div class="dnt-teacher-edu">বি.এ (অনার্স), এম.এ (ইংরেজি), বি.এড</div>
                        <div class="dnt-teacher-social">
                            <a href="#" title="Email"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg></a>
                            <a href="#" title="Facebook"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg></a>
                            <a href="#" title="LinkedIn"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg></a>
                        </div>
                        <a href="#" class="dnt-btn dnt-btn-outline" style="margin-top: 15px; width: 100%; justify-content: center; padding: 8px 0; font-size: 0.9rem;">প্রোফাইল দেখুন</a>
                    </div>

                    <div class="dnt-teacher-card">
                        <div class="dnt-teacher-img">
                            <svg class="dnt-svg-icon" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                        </div>
                        <h3 class="dnt-teacher-name">তাসলিমা আক্তার</h3>
                        <div class="dnt-teacher-desig">সহকারী শিক্ষক (বাংলা)</div>
                        <div class="dnt-teacher-edu">বি.এ (অনার্স), এম.এ (বাংলা), এম.এড</div>
                        <div class="dnt-teacher-social">
                            <a href="#" title="Email"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg></a>
                            <a href="#" title="Facebook"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg></a>
                            <a href="#" title="LinkedIn"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg></a>
                        </div>
                        <a href="#" class="dnt-btn dnt-btn-outline" style="margin-top: 15px; width: 100%; justify-content: center; padding: 8px 0; font-size: 0.9rem;">প্রোফাইল দেখুন</a>
                    </div>
                </div>

                <!-- 4. Business Studies Department -->
                <h3 class="dnt-dept-title" style="margin-top: 40px; display:flex; align-items:center; gap:10px;">
                    <svg class="dnt-svg-icon dnt-icon-md" style="color:var(--dnt-color-primary);" viewBox="0 0 24 24"><path d="M3.5 18.49l6-6.01 4 4L22 6.92l-1.41-1.41-7.09 7.97-4-4L2 16.99z"/></svg>
                    ব্যবসায় শিক্ষা বিভাগ
                </h3>
                <div class="dnt-teacher-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 25px;">
                    <div class="dnt-teacher-card">
                        <div class="dnt-teacher-img">
                            <svg class="dnt-svg-icon" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                        </div>
                        <h3 class="dnt-teacher-name">জনাব হাবিবুর রহমান</h3>
                        <div class="dnt-teacher-desig">সিনিয়র শিক্ষক (হিসাববিজ্ঞান)</div>
                        <div class="dnt-teacher-edu">বি.কম (অনার্স), এম.কম (একাউন্টিং)</div>
                        <div class="dnt-teacher-social">
                            <a href="#" title="Email"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg></a>
                            <a href="#" title="Facebook"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg></a>
                            <a href="#" title="LinkedIn"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg></a>
                        </div>
                        <a href="#" class="dnt-btn dnt-btn-outline" style="margin-top: 15px; width: 100%; justify-content: center; padding: 8px 0; font-size: 0.9rem;">প্রোফাইল দেখুন</a>
                    </div>

                    <div class="dnt-teacher-card">
                        <div class="dnt-teacher-img">
                            <svg class="dnt-svg-icon" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                        </div>
                        <h3 class="dnt-teacher-name">ফাতেমা তুজ জোহরা</h3>
                        <div class="dnt-teacher-desig">সহকারী শিক্ষক (ব্যবস্থাপনা)</div>
                        <div class="dnt-teacher-edu">বি.বি.এ, এম.বি.এ (ম্যানেজমেন্ট)</div>
                        <div class="dnt-teacher-social">
                            <a href="#" title="Email"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg></a>
                            <a href="#" title="Facebook"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg></a>
                            <a href="#" title="LinkedIn"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg></a>
                        </div>
                        <a href="#" class="dnt-btn dnt-btn-outline" style="margin-top: 15px; width: 100%; justify-content: center; padding: 8px 0; font-size: 0.9rem;">প্রোফাইল দেখুন</a>
                    </div>

                    <div class="dnt-teacher-card">
                        <div class="dnt-teacher-img">
                            <svg class="dnt-svg-icon" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                        </div>
                        <h3 class="dnt-teacher-name">তরিকুল ইসলাম</h3>
                        <div class="dnt-teacher-desig">সহকারী শিক্ষক (ফিন্যান্স)</div>
                        <div class="dnt-teacher-edu">বি.বি.এ (অনার্স), এম.বি.এ (ফিন্যান্স)</div>
                        <div class="dnt-teacher-social">
                            <a href="#" title="Email"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg></a>
                            <a href="#" title="Facebook"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg></a>
                            <a href="#" title="LinkedIn"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg></a>
                        </div>
                        <a href="#" class="dnt-btn dnt-btn-outline" style="margin-top: 15px; width: 100%; justify-content: center; padding: 8px 0; font-size: 0.9rem;">প্রোফাইল দেখুন</a>
                    </div>
                </div>

                <!-- 5. Humanities & Others -->
                <h3 class="dnt-dept-title" style="margin-top: 40px; display:flex; align-items:center; gap:10px;">
                    <svg class="dnt-svg-icon dnt-icon-md" style="color:var(--dnt-color-primary);" viewBox="0 0 24 24"><path d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 4h5v8l-2.5-1.5L6 12V4z"/></svg>
                    মানবিক ও অন্যান্য বিভাগ
                </h3>
                <div class="dnt-teacher-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 25px;">
                    <div class="dnt-teacher-card">
                        <div class="dnt-teacher-img">
                            <svg class="dnt-svg-icon" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                        </div>
                        <h3 class="dnt-teacher-name">শরীফুল আলম</h3>
                        <div class="dnt-teacher-desig">শিক্ষক (ইসলাম ও নৈতিক শিক্ষা)</div>
                        <div class="dnt-teacher-edu">কামিল (হাদিস), এম.এ (ইসলামের ইতিহাস)</div>
                        <div class="dnt-teacher-social">
                            <a href="#" title="Email"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg></a>
                            <a href="#" title="Facebook"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg></a>
                            <a href="#" title="LinkedIn"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg></a>
                        </div>
                        <a href="#" class="dnt-btn dnt-btn-outline" style="margin-top: 15px; width: 100%; justify-content: center; padding: 8px 0; font-size: 0.9rem;">প্রোফাইল দেখুন</a>
                    </div>

                    <div class="dnt-teacher-card">
                        <div class="dnt-teacher-img">
                            <svg class="dnt-svg-icon" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                        </div>
                        <h3 class="dnt-teacher-name">জাকির হোসেন</h3>
                        <div class="dnt-teacher-desig">সহকারী শিক্ষক (শারীরিক শিক্ষা)</div>
                        <div class="dnt-teacher-edu">বি.পি.এড, স্কাউট লিডার ট্রেনিং প্রাপ্ত</div>
                        <div class="dnt-teacher-social">
                            <a href="#" title="Email"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg></a>
                            <a href="#" title="Facebook"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg></a>
                            <a href="#" title="LinkedIn"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg></a>
                        </div>
                        <a href="#" class="dnt-btn dnt-btn-outline" style="margin-top: 15px; width: 100%; justify-content: center; padding: 8px 0; font-size: 0.9rem;">প্রোফাইল দেখুন</a>
                    </div>

                    <div class="dnt-teacher-card">
                        <div class="dnt-teacher-img">
                            <svg class="dnt-svg-icon" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                        </div>
                        <h3 class="dnt-teacher-name">আয়েশা সিদ্দিকা</h3>
                        <div class="dnt-teacher-desig">সহকারী শিক্ষক (ভূগোল ও ইতিহাস)</div>
                        <div class="dnt-teacher-edu">বি.এ (অনার্স), এম.এ (ভূগোল)</div>
                        <div class="dnt-teacher-social">
                            <a href="#" title="Email"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg></a>
                            <a href="#" title="Facebook"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg></a>
                            <a href="#" title="LinkedIn"><svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg></a>
                        </div>
                        <a href="#" class="dnt-btn dnt-btn-outline" style="margin-top: 15px; width: 100%; justify-content: center; padding: 8px 0; font-size: 0.9rem;">প্রোফাইল দেখুন</a>
                    </div>
                </div>

            </main>

        </div>
    </section>

<?php get_footer();?>