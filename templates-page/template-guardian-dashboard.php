<?php
/* Template Name: Guardian Dashboard */
if (!is_user_logged_in()) { wp_redirect(home_url('/login')); exit; }
get_header();

$current_user = wp_get_current_user();
?>

<!-- ৪. পেজ ব্যানার ও ব্রেডক্রাম্ব -->
    <section class="dnt-page-banner" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/img/breadcrumb.jpg');">
        <div class="dnt-container">
            <h1 class="dnt-page-title">অভিভাবক ড্যাশবোর্ড</h1>
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
                <span style="color:var(--dnt-color-gray-300);">অভিভাবক ড্যাশবোর্ড</span>
            </div>
        </div>
    </section>

<!-- ==========================================================================
     ULTRA-PROFESSIONAL WC STYLE GUARDIAN DASHBOARD CSS
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
                    <li class="dnt-wc-nav-item is-active" data-target="wc-dash-guardian">
                        <a>
                            <svg class="dnt-wc-nav-svg" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                            ড্যাশবোর্ড
                        </a>
                    </li>
                    <li class="dnt-wc-nav-item" data-target="wc-attendance">
                        <a>
                            <svg class="dnt-wc-nav-svg" viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                            উপস্থিতি রিপোর্ট
                        </a>
                    </li>
                    <li class="dnt-wc-nav-item" data-target="wc-payments">
                        <a>
                            <svg class="dnt-wc-nav-svg" viewBox="0 0 24 24"><rect x="2" y="5" width="20" height="14" rx="2" ry="2"></rect><line x1="2" y1="10" x2="22" y2="10"></line></svg>
                            ফি ও পেমেন্ট
                        </a>
                    </li>
                    <li class="dnt-wc-nav-item" data-target="wc-notices-guardian">
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
                
                <!-- PANE 1: GUARDIAN DASHBOARD OVERVIEW -->
                <div id="wc-dash-guardian" class="dnt-wc-pane is-active">
                    <div class="dnt-wc-profile-overview">
                        <div class="dnt-wc-user-meta">
                            <h2>সম্মানিত অভিভাবক, <?php echo esc_html($current_user->display_name); ?></h2>
                            <p>পোর্টাল স্ট্যাটাস: <span style="font-weight: 700; color: var(--dnt-wc-brand);">সক্রিয় অভিভাবক অ্যাকাউন্ট</span></p>
                        </div>
                    </div>

                    <p style="color: var(--dnt-wc-text-sub); margin-bottom: 25px;">
                        অভিভাবক পোর্টাল ড্যাশবোর্ড থেকে আপনি আপনার সন্তানের ক্লাসে দৈনিক উপস্থিতির রেকর্ড ট্র্যাক করতে পারেন, তার বকেয়া একাডেমিক ফি ও টিউশন ফির পেমেন্ট বিবরণী দেখতে পারেন এবং বিদ্যালয়ের অফিশিয়াল নোটিশগুলো পর্যবেক্ষণ করতে পারেন।
                    </p>

                    <!-- WooCommerce Custom Notice Box Component -->
                    <div class="dnt-wc-notice-banner">
                        <span style="display: flex; align-items: center; gap: 12px; font-size: 0.95rem; color: var(--dnt-wc-text-main); font-weight: 600;">
                            <svg style="color: var(--dnt-wc-brand); width:20px; height:20px; fill:none; stroke:currentColor; stroke-width:2;" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                            জরুরি আপডেট: চলতি মাসের বেতন পরিশোধের শেষ সময় আগামী ২৫ তারিখ।
                        </span>
                        <a class="dnt-wc-notice-shortcut" style="color: var(--dnt-wc-brand); font-weight: 700; text-decoration: none; font-size: 0.9rem; cursor: pointer; white-space: nowrap;">বিস্তারিত &rarr;</a>
                    </div>

                    <!-- Metric Card Navigation Links -->
                    <div class="dnt-wc-metric-grid">
                        <div class="dnt-wc-metric-card dnt-wc-quick-link" data-destination="wc-attendance">
                            <div>
                                <div class="dnt-wc-card-head">
                                    <svg style="color: var(--dnt-wc-brand); width:22px; height:22px; fill:none; stroke:currentColor; stroke-width:2;" viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                    <h3>উপস্থিতি রিপোর্ট</h3>
                                </div>
                                <p>আপনার সন্তানের দৈনিক ক্লাসে উপস্থিত ও অনুপস্থিতির মাসিক ডেটা ট্র্যাকিং শীট দেখুন।</p>
                            </div>
                            <span class="dnt-wc-card-link-btn">হাজিরা রেকর্ড &rarr;</span>
                        </div>

                        <div class="dnt-wc-metric-card dnt-wc-quick-link" data-destination="wc-payments">
                            <div>
                                <div class="dnt-wc-card-head">
                                    <svg style="color: var(--dnt-wc-brand); width:22px; height:22px; fill:none; stroke:currentColor; stroke-width:2;" viewBox="0 0 24 24"><rect x="2" y="5" width="20" height="14" rx="2" ry="2"></rect><line x1="2" y1="10" x2="22" y2="10"></line></svg>
                                    <h3>ফি ও পেমেন্ট হিস্ট্রি</h3>
                                </div>
                                <p>মাসিক টিউশন ফি ও অন্যান্য বকেয়া ফি খুব সহজে অনলাইনে পরিশোধ করুন ও রশিদ ডাউনলোড করুন।</p>
                            </div>
                            <span class="dnt-wc-card-link-btn">পেমেন্ট গেটওয়ে &rarr;</span>
                        </div>
                    </div>
                </div>

                <!-- PANE 2: ATTENDANCE -->
                <div id="wc-attendance" class="dnt-wc-pane">
                    <h3 style="margin: 0 0 8px 0; font-size: 1.3rem; color: var(--dnt-wc-text-main); font-weight: 700;">সন্তানের উপস্থিতি ওভারভিউ</h3>
                    <p style="color: var(--dnt-wc-text-sub); margin-bottom: 25px; font-size: 0.95rem;">চলতি মাসের ক্লাস হাজিরা রিপোর্টের সংক্ষিপ্ত সারণী:</p>
                    
                    <div style="display:flex; gap:15px; margin-bottom:25px; flex-wrap:wrap;">
                        <div style="background:#f0fdf4; border:1px solid #bbf7d0; padding:15px 25px; border-radius:6px; text-align:center;">
                            <span style="display:block; font-size:1.5rem; font-weight:700; color:#16a34a;">৯৫%</span>
                            <small style="color:#15803d; font-weight:600;">মোট উপস্থিতি</small>
                        </div>
                        <div style="background:#fef2f2; border:1px solid #fecaca; padding:15px 25px; border-radius:6px; text-align:center;">
                            <span style="display:block; font-size:1.5rem; font-weight:700; color:#dc2626;">০১ দিন</span>
                            <small style="color:#b91c1c; font-weight:600;">মোট অনুপস্থিতি</small>
                        </div>
                    </div>

                    <div class="dnt-wc-table-wrapper">
                        <table class="dnt-wc-data-table">
                            <thead>
                                <tr>
                                    <th>তারিখ</th>
                                    <th>দিন</th>
                                    <th>স্ট্যাটাস</th>
                                    <th>মন্তব্য</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>১৯ জুলাই, ২০২৬</td>
                                    <td>রবিবার</td>
                                    <td><span style="color:#16a34a; font-weight:700;">উপস্থিত</span></td>
                                    <td>যথাসময়ে প্রবেশ</td>
                                </tr>
                                <tr>
                                    <td>১৬ জুলাই, ২০২৬</td>
                                    <td>বৃহস্পতিবার</td>
                                    <td><span style="color:#16a34a; font-weight:700;">উপস্থিত</span></td>
                                    <td>যথাসময়ে প্রবেশ</td>
                                </tr>
                                <tr>
                                    <td>১৫ জুলাই, ২০২৬</td>
                                    <td>বুধবার</td>
                                    <td><span style="color:#dc2626; font-weight:700;">অনুপস্থিত</span></td>
                                    <td>ছুটির আবেদন ব্যতিত</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- PANE 3: PAYMENTS -->
                <div id="wc-payments" class="dnt-wc-pane">
                    <h3 style="margin: 0 0 8px 0; font-size: 1.3rem; color: var(--dnt-wc-text-main); font-weight: 700;">ফি বিবরণী ও অনলাইন পেমেন্ট</h3>
                    <p style="color: var(--dnt-wc-text-sub); margin-bottom: 25px; font-size: 0.95rem;">একাডেমিক সেশনের বকেয়া ও পরিশোধিত ফি-এর বিবরণী:</p>
                    
                    <div class="dnt-wc-table-wrapper">
                        <table class="dnt-wc-data-table">
                            <thead>
                                <tr>
                                    <th>ফি ক্যাটাগরি</th>
                                    <th>মাসের নাম</th>
                                    <th>পরিমাণ</th>
                                    <th>স্ট্যাটাস</th>
                                    <th>অ্যাকশন</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>মাসিক টিউশন ফি</td>
                                    <td>জুলাই ২০২৬</td>
                                    <td>১,৫০০/- টাকা</td>
                                    <td><span style="color:#d97706; font-weight:700;">বকেয়া</span></td>
                                    <td><a href="#" style="background:var(--dnt-wc-brand); color:#fff; padding:6px 12px; border-radius:4px; font-weight: 700; text-decoration: none; font-size:0.85rem;">ফি প্রদান করুন</a></td>
                                </tr>
                                <tr>
                                    <td>অর্ধ-বার্ষিক পরীক্ষার ফি</td>
                                    <td>জুন ২০২৬</td>
                                    <td>১,০০০/- টাকা</td>
                                    <td><span style="color:#16a34a; font-weight:700;">পরিশোধিত</span></td>
                                    <td><a href="#" style="color: var(--dnt-wc-brand); font-weight: 700; text-decoration: none;">রশিদ (PDF)</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- PANE 4: NOTICES -->
                <div id="wc-notices-guardian" class="dnt-wc-pane">
                    <h3 style="margin: 0 0 20px 0; font-size: 1.3rem; color: var(--dnt-wc-text-main); font-weight: 700;">অভিভাবক নোটিশ বোর্ড</h3>
                    
                    <div style="border: 1px solid var(--dnt-wc-border-clr); padding: 20px; border-radius: var(--dnt-wc-radius); background: #fff; margin-bottom:20px;">
                        <span style="color: var(--dnt-wc-brand); font-size: 0.85rem; font-weight: 700; background: var(--dnt-wc-brand-light); padding: 4px 8px; border-radius: 4px;">সাধারণ নোটিশ</span>
                        <h4 style="margin: 12px 0 6px 0; font-size: 1.15rem; color: var(--dnt-wc-text-main); font-weight: 700;">চলতি মাসের বেতন ও ফি পরিশোধ সংক্রান্ত বিজ্ঞপ্তি</h4>
                        <small style="color: var(--dnt-wc-text-sub); display: block; margin-bottom: 12px;">প্রকাশের তারিখ: ১৮ জুলাই, ২০২৬</small>
                        <p style="margin: 0; color: #475569; font-size: 0.95rem; line-height: 1.6;">অত্র বিদ্যালয়ের সম্মানিত অভিভাবকদের অবগতির জন্য জানানো যাচ্ছে যে, আপনার সন্তানের চলতি জুলাই মাসের টিউশন ফি অনলাইন গেটওয়ের মাধ্যমে আগামী ২৫ জুলাইয়ের মধ্যে পরিশোধ করার জন্য অনুরোধ করা হলো।</p>
                    </div>
                </div>

            </main>
        </div>
    </div>
</div>

<!-- ==========================================================================
     CORE TAB ENGINE JAVASCRIPT FOR GUARDIAN
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
            executeTabSwitch('wc-notices-guardian');
        });
    }
});
</script>

<?php get_footer(); ?>