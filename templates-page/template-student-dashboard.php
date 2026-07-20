<?php
/* Template Name: Student Dashboard */
if (!is_user_logged_in()) { wp_redirect(home_url('/login')); exit; }
get_header();

$current_user = wp_get_current_user();
?>

<!-- ৪. পেজ ব্যানার ও ব্রেডক্রাম্ব -->
    <section class="dnt-page-banner" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/img/breadcrumb.jpg');">
        <div class="dnt-container">
            <h1 class="dnt-page-title">শিক্ষার্থী ড্যাশবোর্ড </h1>
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
                <span style="color:var(--dnt-color-gray-300);">শিক্ষার্থী ড্যাশবোর্ড</span>
            </div>
        </div>
    </section>

<!-- ==========================================================================
     ULTRA-PROFESSIONAL WC STYLE STUDENT DASHBOARD CSS
     ========================================================================== -->
<style>
    :root {
        --dnt-wc-brand: #006a4e;
        --dnt-wc-brand-light: #f0fdf4;
        --dnt-wc-danger: #ef4444;
        --dnt-wc-danger-light: #fef2f2;
        --dnt-wc-body-bg: #fafafa;
        --dnt-wc-card-bg: #ffffff;
        --dnt-wc-text-main: #1e293b;
        --dnt-wc-text-sub: #64748b;
        --dnt-wc-border-clr: #e2e8f0;
        --dnt-wc-radius: 8px;
    }

    .dnt-wc-dashboard-wrapper {
        background-color: var(--dnt-wc-body-bg);
        padding: 60px 0;
        font-family: 'Hind Siliguri', system-ui, -apple-system, sans-serif;
    }

    .dnt-wc-account-layout {
        display: flex;
        gap: 50px;
        align-items: flex-start;
    }

    /* Left WooCommerce Sidebar Navigation */
    .dnt-wc-account-nav {
        width: 25%;
        flex-shrink: 0;
        background: var(--dnt-wc-card-bg);
        border: 1px solid var(--dnt-wc-border-clr);
        border-radius: var(--dnt-wc-radius);
        padding: 10px 0;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
    }

    .dnt-wc-account-nav ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .dnt-wc-account-nav ul li a {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 14px 24px;
        color: var(--dnt-wc-text-main);
        font-weight: 600;
        text-decoration: none;
        font-size: 1rem;
        border-left: 4px solid transparent;
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
    }

    .dnt-wc-account-nav ul li:not(:last-child) {
        border-bottom: 1px solid #f1f5f9;
    }

    .dnt-wc-account-nav ul li a:hover,
    .dnt-wc-account-nav ul li.is-active a {
        color: var(--dnt-wc-brand);
        background-color: var(--dnt-wc-brand-light);
        border-left-color: var(--dnt-wc-brand);
    }

    .dnt-wc-account-nav ul li.dnt-logout-item a {
        color: var(--dnt-wc-danger);
    }
    .dnt-wc-account-nav ul li.dnt-logout-item a:hover {
        background-color: var(--dnt-wc-danger-light);
        border-left-color: var(--dnt-wc-danger);
    }

    .dnt-wc-nav-svg {
        width: 20px;
        height: 20px;
        fill: none;
        stroke: currentColor;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
        flex-shrink: 0;
    }

    /* Right Side Content Engine */
    .dnt-wc-account-content {
        width: 75%;
        background: var(--dnt-wc-card-bg);
        border: 1px solid var(--dnt-wc-border-clr);
        border-radius: var(--dnt-wc-radius);
        padding: 40px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
        min-height: 450px;
    }

    .dnt-wc-pane {
        display: none;
    }
    
    .dnt-wc-pane.is-active {
        display: block;
        animation: wcSlideUp 0.35s cubic-bezier(0.4, 0, 0.2, 1);
    }

    @keyframes wcSlideUp {
        from { opacity: 0; transform: translateY(8px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Overview Header Card */
    .dnt-wc-profile-overview {
        background: radial-gradient(circle at top right, var(--dnt-wc-brand-light) 0%, transparent 70%);
        border: 1px solid var(--dnt-wc-border-clr);
        border-radius: var(--dnt-wc-radius);
        padding: 24px;
        margin-bottom: 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .dnt-wc-user-meta h2 {
        font-size: 1.5rem;
        color: var(--dnt-wc-text-main);
        margin: 0 0 6px 0;
        font-weight: 700;
    }
    .dnt-wc-user-meta p {
        margin: 0;
        color: var(--dnt-wc-text-sub);
        font-size: 0.95rem;
    }

    /* Notification/Alert Component */
    .dnt-wc-notice-banner {
        background-color: #fff;
        border: 1px solid var(--dnt-wc-border-clr);
        border-left: 4px solid var(--dnt-wc-brand);
        padding: 16px 20px;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 35px;
    }

    /* Sub Grid Cards */
    .dnt-wc-metric-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 24px;
    }

    .dnt-wc-metric-card {
        border: 1px solid var(--dnt-wc-border-clr);
        border-radius: var(--dnt-wc-radius);
        padding: 24px;
        transition: all 0.2s ease;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .dnt-wc-metric-card:hover {
        border-color: var(--dnt-wc-brand);
        box-shadow: 0 4px 12px rgba(0, 106, 78, 0.04);
    }

    .dnt-wc-card-head {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 12px;
    }

    .dnt-wc-card-head h3 {
        margin: 0;
        font-size: 1.15rem;
        font-weight: 700;
        color: var(--dnt-wc-text-main);
    }

    .dnt-wc-metric-card p {
        margin: 0 0 16px 0;
        font-size: 0.95rem;
        color: var(--dnt-wc-text-sub);
        line-height: 1.6;
    }

    .dnt-wc-card-link-btn {
        font-size: 0.9rem;
        font-weight: 700;
        color: var(--dnt-wc-brand);
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }

    /* Tables Styles */
    .dnt-wc-table-wrapper {
        overflow-x: auto;
        margin-top: 15px;
    }
    .dnt-wc-data-table {
        width: 100%;
        border-collapse: collapse;
        text-align: left;
        font-size: 0.95rem;
    }
    .dnt-wc-data-table th {
        background: #f8fafc;
        color: var(--dnt-wc-text-main);
        font-weight: 700;
        padding: 14px 16px;
        border-bottom: 2px solid var(--dnt-wc-border-clr);
    }
    .dnt-wc-data-table td {
        padding: 14px 16px;
        border-bottom: 1px solid var(--dnt-wc-border-clr);
        color: var(--dnt-wc-text-main);
    }

    /* Responsive Architecture */
    @media (max-width: 992px) {
        .dnt-wc-account-layout { flex-direction: column; gap: 30px; }
        .dnt-wc-account-nav, .dnt-wc-account-content { width: 100%; }
        .dnt-wc-account-content { padding: 30px; }
    }
    @media (max-width: 576px) {
        .dnt-wc-metric-grid { grid-template-columns: 1fr; }
        .dnt-wc-profile-overview { flex-direction: column; align-items: flex-start; gap: 15px; }
    }
</style>

<div class="dnt-wc-dashboard-wrapper">
    <div class="dnt-container">
        <div class="dnt-wc-account-layout">
            
            <!-- LEFT NAVIGATION SIDEBAR -->
            <nav class="dnt-wc-account-nav">
                <ul class="dnt-wc-tabs-trigger">
                    <li class="dnt-wc-nav-item is-active" data-target="wc-dashboard">
                        <a>
                            <svg class="dnt-wc-nav-svg" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                            ড্যাশবোর্ড
                        </a>
                    </li>
                    <li class="dnt-wc-nav-item" data-target="wc-routine">
                        <a>
                            <svg class="dnt-wc-nav-svg" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                            ক্লাস রুটিন
                        </a>
                    </li>
                    <li class="dnt-wc-nav-item" data-target="wc-results">
                        <a>
                            <svg class="dnt-wc-nav-svg" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                            পরীক্ষার ফলাফল
                        </a>
                    </li>
                    <li class="dnt-wc-nav-item" data-target="wc-notices">
                        <a>
                            <svg class="dnt-wc-nav-svg" viewBox="0 0 24 24"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                            নোটিশ বোর্ড
                        </a>
                    </li>
                    <li class="dnt-logout-item">
                        <a href="<?php echo wp_logout_url(home_url()); ?>">
                            <svg class="dnt-wc-nav-svg" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                            লগআউট
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- RIGHT CONTENT CARD -->
            <main class="dnt-wc-account-content">
                
                <!-- PANE 1: DASHBOARD OVERVIEW -->
                <div id="wc-dashboard" class="dnt-wc-pane is-active">
                    <div class="dnt-wc-profile-overview">
                        <div class="dnt-wc-user-meta">
                            <h2>আসসালামু আলাইকুম, <?php echo esc_html($current_user->display_name); ?></h2>
                            <p>স্টুডেন্ট আইডি পোর্টাল: <span style="font-weight: 700; color: var(--dnt-wc-text-main);"><?php echo esc_html($current_user->user_login); ?></span></p>
                        </div>
                    </div>

                    <p style="color: var(--dnt-wc-text-sub); margin-bottom: 25px;">
                        আপনার স্টুডেন্ট ড্যাশবোর্ড প্যানেল থেকে আপনি খুব সহজেই দৈনিক ক্লাস মডিউল ও রুটিন শিডিউল দেখতে পারেন, প্রাতিষ্ঠানিক পরীক্ষার ফলাফল ও গ্রেডশিট ডাউনলোড করতে পারেন এবং নোটিশ বোর্ডের গুরুত্বপূর্ণ বিষয়গুলো তদারকি করতে পারেন।
                    </p>

                    <!-- WooCommerce Custom Notice Box Component -->
                    <div class="dnt-wc-notice-banner">
                        <span style="display: flex; align-items: center; gap: 12px; font-size: 0.95rem; color: var(--dnt-wc-text-main); font-weight: 600;">
                            <svg style="color: var(--dnt-wc-brand); width:20px; height:20px; fill:none; stroke:currentColor; stroke-width:2;" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                            সর্বশেষ নোটিশ: আগামীকাল পবিত্র আশুরা উপলক্ষে বিদ্যালয়ের সমস্ত কার্যক্রম বন্ধ থাকবে।
                        </span>
                        <a class="dnt-wc-notice-shortcut" style="color: var(--dnt-wc-brand); font-weight: 700; text-decoration: none; font-size: 0.9rem; cursor: pointer; white-space: nowrap;">বিস্তারিত &rarr;</a>
                    </div>

                    <!-- Metric Card Navigation Links -->
                    <div class="dnt-wc-metric-grid">
                        <div class="dnt-wc-metric-card dnt-wc-quick-link" data-destination="wc-routine">
                            <div>
                                <div class="dnt-wc-card-head">
                                    <svg style="color: var(--dnt-wc-brand); width:22px; height:22px; fill:none; stroke:currentColor; stroke-width:2;" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                    <h3>ক্লাস রুটিন</h3>
                                </div>
                                <p>আজকের দিনের ক্লাস সূচী ও সময় সারণী সংক্রান্ত তথ্যাদি দ্রুত জেনে নিন।</p>
                            </div>
                            <span class="dnt-wc-card-link-btn">রুটিন শিট দেখুন &rarr;</span>
                        </div>

                        <div class="dnt-wc-metric-card dnt-wc-quick-link" data-destination="wc-results">
                            <div>
                                <div class="dnt-wc-card-head">
                                    <svg style="color: var(--dnt-wc-brand); width:22px; height:22px; fill:none; stroke:currentColor; stroke-width:2;" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line></svg>
                                    <h3>পরীক্ষার ফলাফল</h3>
                                </div>
                                <p>সাম্প্রতিক টার্ম এবং সেমিস্টার ফাইনাল পরীক্ষার প্রোগ্রেস ও মার্কশিট দেখুন।</p>
                            </div>
                            <span class="dnt-wc-card-link-btn">গ্রেড রিপোর্ট &rarr;</span>
                        </div>
                    </div>
                </div>

                <!-- PANE 2: ROUTINE -->
                <div id="wc-routine" class="dnt-wc-pane">
                    <h3 style="margin: 0 0 8px 0; font-size: 1.3rem; color: var(--dnt-wc-text-main); font-weight: 700;">শ্রেণি পাঠদান রুটিন</h3>
                    <p style="color: var(--dnt-wc-text-sub); margin-bottom: 25px; font-size: 0.95rem;">নিয়মিত আপডেট হওয়া দৈনিক ক্লাসের অফিশিয়াল সময়সূচী:</p>
                    
                    <div class="dnt-wc-table-wrapper">
                        <table class="dnt-wc-data-table">
                            <thead>
                                <tr>
                                    <th>সময়</th>
                                    <th>বিষয়</th>
                                    <th>শিক্ষক</th>
                                    <th>কক্ষ নম্বর</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>১০:০০ AM - ১০:৪৫ AM</td>
                                    <td>আবশ্যিক গণিত</td>
                                    <td>জনাব রফিকুল ইসলাম</td>
                                    <td>কক্ষ ৩০২</td>
                                </tr>
                                <tr>
                                    <td>১০:৪৫ AM - ১১:৩০ AM</td>
                                    <td>ইংরেজি প্রথম পত্র</td>
                                    <td>জনাব কামরুল হাসান</td>
                                    <td>কক্ষ ৩০৫</td>
                                </tr>
                                <tr>
                                    <td>১১:৩০ AM - ১২:১৫ PM</td>
                                    <td>পদার্থবিজ্ঞান</td>
                                    <td>জনাব আরিফ হোসেন</td>
                                    <td>বিজ্ঞান ল্যাব ১</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- PANE 3: RESULTS -->
                <div id="wc-results" class="dnt-wc-pane">
                    <h3 style="margin: 0 0 8px 0; font-size: 1.3rem; color: var(--dnt-wc-text-main); font-weight: 700;">পরীক্ষার ফলাফল শিট</h3>
                    <p style="color: var(--dnt-wc-text-sub); margin-bottom: 25px; font-size: 0.95rem;">অ্যাকাডেমিক সেমিস্টার সমূহের চূড়ান্ত প্রোগ্রেসিভ রিপোর্ট:</p>
                    
                    <div class="dnt-wc-table-wrapper">
                        <table class="dnt-wc-data-table">
                            <thead>
                                <tr>
                                    <th>পরীক্ষার নাম</th>
                                    <th>অর্জিত জিপিএ (GPA)</th>
                                    <th>ফলাফল স্ট্যাটাস</th>
                                    <th>অ্যাকশন</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>প্রথম সাময়িক পরীক্ষা ২০২৬</td>
                                    <td><strong>৫.০০</strong></td>
                                    <td><span style="color:#16a34a; font-weight:700;">উত্তীর্ণ</span></td>
                                    <td><a href="#" style="color: var(--dnt-wc-brand); font-weight: 700; text-decoration: none;">ডাউনলোড (PDF)</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- PANE 4: NOTICES -->
                <div id="wc-notices" class="dnt-wc-pane">
                    <h3 style="margin: 0 0 20px 0; font-size: 1.3rem; color: var(--dnt-wc-text-main); font-weight: 700;">প্রাতিষ্ঠানিক নোটিশ বোর্ড</h3>
                    
                    <div style="border: 1px solid var(--dnt-wc-border-clr); padding: 20px; border-radius: var(--dnt-wc-radius); background: #fff;">
                        <span style="color: var(--dnt-wc-danger); font-size: 0.85rem; font-weight: 700; background: var(--dnt-wc-danger-light); padding: 4px 8px; border-radius: 4px;">জরুরি নোটিশ</span>
                        <h4 style="margin: 12px 0 6px 0; font-size: 1.15rem; color: var(--dnt-wc-text-main); font-weight: 700;">পবিত্র আশুরা উপলক্ষে সাধারণ ছুটি ঘোষণা</h4>
                        <small style="color: var(--dnt-wc-text-sub); display: block; margin-bottom: 12px;">প্রকাশের তারিখ: ২০ জুলাই, ২০২৬</small>
                        <p style="margin: 0; color: #475569; font-size: 0.95rem; line-height: 1.6;">আগামীকাল পবিত্র আশুরা উপলক্ষে বিদ্যালয়ের সকল প্রশাসনিক ও একাডেমিক ক্লাসের কার্যক্রম সম্পূর্ণ স্থগিত থাকবে। পরবর্তী কার্যদিবস থেকে সাধারণ সূচী অনুযায়ী যথানিয়মে ক্লাস পরিচালিত হবে।</p>
                    </div>
                </div>

            </main>
        </div>
    </div>
</div>

<!-- ==========================================================================
     CORE TAB ENGINE JAVASCRIPT
     ========================================================================== -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const navItems = document.querySelectorAll('.dnt-wc-nav-item');
    const contentPanes = document.querySelectorAll('.dnt-wc-pane');
    const quickLinks = document.querySelectorAll('.dnt-wc-quick-link');
    const noticeShortcut = document.querySelector('.dnt-wc-notice-shortcut');

    // কোর ট্যাব ট্রান্সলেশন প্রসেসর
    function executeTabSwitch(targetId) {
        // ১. অ্যাক্টিভ স্টেট ক্লিন-আপ
        navItems.forEach(item => item.classList.remove('is-active'));
        contentPanes.forEach(pane => pane.classList.remove('is-active'));

        // ২. নির্দিষ্ট ট্যাবে ভিজ্যুয়াল স্টেট প্রদান
        const intendedNav = document.querySelector(`.dnt-wc-nav-item[data-target="${targetId}"]`);
        const intendedPane = document.getElementById(targetId);

        if (intendedNav && intendedPane) {
            intendedNav.classList.add('is-active');
            intendedPane.classList.add('is-active');
            window.scrollTo({ top: intendedPane.offsetTop - 100, behavior: 'smooth' });
        }
    }

    // সাইডবার এলিমেন্ট ক্লিক ট্রিগার
    navItems.forEach(nav => {
        nav.addEventListener('click', function() {
            const target = this.getAttribute('data-target');
            executeTabSwitch(target);
        });
    });

    // ড্যাশবোর্ড ইন্টেরিয়র কার্ড ট্রিগার
    quickLinks.forEach(card => {
        card.addEventListener('click', function() {
            const destination = this.getAttribute('data-destination');
            executeTabSwitch(destination);
        });
    });

    // নোটিশ ব্যানার শর্টকাট ট্রিগার
    if (noticeShortcut) {
        noticeShortcut.addEventListener('click', function() {
            executeTabSwitch('wc-notices');
        });
    }
});
</script>