<?php
/* Template Name: Student Dashboard */

if ( ! is_user_logged_in() ) { 
    wp_safe_redirect( home_url( '/login' ) ); 
    exit; 
}

get_header();

global $wpdb;
$current_user   = wp_get_current_user();
$wp_user_id     = $current_user->ID;

// Fetch Student Profile from plugin DB
$table_students = $wpdb->prefix . 'sms_students';
$table_results  = $wpdb->prefix . 'sms_results';
$table_exams    = $wpdb->prefix . 'sms_exams';
$table_notices  = $wpdb->prefix . 'sms_notices';

$student = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$table_students} WHERE wp_user_id = %d AND status = 'Active'", $wp_user_id ) );
$student_id = $student ? absint( $student->id ) : 0;
?>

<!-- Page Banner & Breadcrumb -->
<section class="dnt-page-banner" style="background-image: url('<?php echo esc_url( get_template_directory_uri() . '/assets/img/breadcrumb.jpg' ); ?>');">
    <div class="dnt-container">
        <h1 class="dnt-page-title"><?php esc_html_e( 'শিক্ষার্থী ড্যাশবোর্ড', 'ggisc' ); ?></h1>
        <div class="dnt-breadcrumb">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <svg class="dnt-icon-inline" viewBox="0 0 24 24" width="16" height="16" fill="currentColor">
                    <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                </svg> <?php esc_html_e( 'প্রথম পাতা', 'ggisc' ); ?>
            </a> 
            <span>
                <svg viewBox="0 0 24 24" width="12" height="12" fill="currentColor" style="opacity:0.7;">
                    <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
                </svg>
            </span> 
            <span style="color:var(--dnt-color-gray-300);"><?php esc_html_e( 'শিক্ষার্থী ড্যাশবোর্ড', 'ggisc' ); ?></span>
        </div>
    </div>
</section>

<!-- Dashboard CSS Engine -->
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
        gap: 40px;
        align-items: flex-start;
    }

    /* Navigation Sidebar */
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

    /* Content Viewport */
    .dnt-wc-account-content {
        width: 75%;
        background: var(--dnt-wc-card-bg);
        border: 1px solid var(--dnt-wc-border-clr);
        border-radius: var(--dnt-wc-radius);
        padding: 40px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
        min-height: 450px;
    }

    .dnt-wc-pane { display: none; }
    .dnt-wc-pane.is-active {
        display: block;
        animation: wcSlideUp 0.35s cubic-bezier(0.4, 0, 0.2, 1);
    }

    @keyframes wcSlideUp {
        from { opacity: 0; transform: translateY(8px); }
        to { opacity: 1; transform: translateY(0); }
    }

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
        font-size: 1.4rem;
        color: var(--dnt-wc-text-main);
        margin: 0 0 6px 0;
        font-weight: 700;
    }
    .dnt-wc-user-meta p {
        margin: 0;
        color: var(--dnt-wc-text-sub);
        font-size: 0.95rem;
    }

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
            
            <!-- Left Navigation Sidebar -->
            <nav class="dnt-wc-account-nav">
                <ul class="dnt-wc-tabs-trigger">
                    <li class="dnt-wc-nav-item is-active" data-target="wc-dashboard">
                        <a>
                            <svg class="dnt-wc-nav-svg" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                            <?php esc_html_e( 'ড্যাশবোর্ড', 'ggisc' ); ?>
                        </a>
                    </li>
                    <li class="dnt-wc-nav-item" data-target="wc-routine">
                        <a>
                            <svg class="dnt-wc-nav-svg" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                            <?php esc_html_e( 'ক্লাস রুটিন', 'ggisc' ); ?>
                        </a>
                    </li>
                    <li class="dnt-wc-nav-item" data-target="wc-results">
                        <a>
                            <svg class="dnt-wc-nav-svg" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line></svg>
                            <?php esc_html_e( 'পরীক্ষার ফলাফল', 'ggisc' ); ?>
                        </a>
                    </li>
                    <li class="dnt-wc-nav-item" data-target="wc-notices">
                        <a>
                            <svg class="dnt-wc-nav-svg" viewBox="0 0 24 24"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                            <?php esc_html_e( 'নোটিশ বোর্ড', 'ggisc' ); ?>
                        </a>
                    </li>
                    <li class="dnt-logout-item">
                        <a href="<?php echo esc_url( wp_logout_url( home_url() ) ); ?>">
                            <svg class="dnt-wc-nav-svg" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                            <?php esc_html_e( 'লগআউট', 'ggisc' ); ?>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Right Content Viewport -->
            <main class="dnt-wc-account-content">
                
                <!-- PANE 1: DASHBOARD OVERVIEW -->
                <div id="wc-dashboard" class="dnt-wc-pane is-active">
                    <div class="dnt-wc-profile-overview">
                        <div class="dnt-wc-user-meta">
                            <h2><?php printf( esc_html__( 'আসসালামু আলাইকুম, %s', 'ggisc' ), esc_html( $student ? $student->full_name : $current_user->display_name ) ); ?></h2>
                            <p>
                                <?php esc_html_e( 'স্টুডেন্ট আইডি:', 'ggisc' ); ?> 
                                <span style="font-weight: 700; color: var(--dnt-wc-text-main);"><?php echo esc_html( $student ? $student->student_id : $current_user->user_login ); ?></span>
                                <?php if ( $student ) : ?>
                                    | <?php esc_html_e( 'শ্রেণি:', 'ggisc' ); ?> <strong><?php echo esc_html( $student->class_name ); ?></strong> (<?php echo esc_html( $student->section_name ); ?>)
                                    | <?php esc_html_e( 'রোল:', 'ggisc' ); ?> <strong><?php echo esc_html( $student->roll_no ); ?></strong>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>

                    <p style="color: var(--dnt-wc-text-sub); margin-bottom: 25px;">
                        <?php esc_html_e( 'আপনার স্টুডেন্ট ড্যাশবোর্ড প্যানেল থেকে আপনি খুব সহজেই দৈনিক ক্লাস মডিউল ও রুটিন শিডিউল দেখতে পারেন, প্রাতিষ্ঠানিক পরীক্ষার ফলাফল ও গ্রেডশিট ডাউনলোড করতে পারেন এবং নোটিশ বোর্ডের গুরুত্বপূর্ণ বিষয়গুলো তদারকি করতে পারেন।', 'ggisc' ); ?>
                    </p>

                    <!-- Dynamic Recent Notice Flash Banner -->
                    <?php
                    $latest_notice = $wpdb->get_row( "SELECT * FROM {$table_notices} WHERE status = 'Published' ORDER BY id DESC LIMIT 1" );
                    if ( $latest_notice ) :
                    ?>
                        <div class="dnt-wc-notice-banner">
                            <span style="display: flex; align-items: center; gap: 12px; font-size: 0.95rem; color: var(--dnt-wc-text-main); font-weight: 600;">
                                <svg style="color: var(--dnt-wc-brand); width:20px; height:20px; fill:none; stroke:currentColor; stroke-width:2;" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                                <strong><?php esc_html_e( 'সর্বশেষ নোটিশ:', 'ggisc' ); ?></strong> <?php echo esc_html( $latest_notice->title ); ?>
                            </span>
                            <a class="dnt-wc-notice-shortcut" style="color: var(--dnt-wc-brand); font-weight: 700; text-decoration: none; font-size: 0.9rem; cursor: pointer; white-space: nowrap;"><?php esc_html_e( 'বিস্তারিত', 'ggisc' ); ?> &rarr;</a>
                        </div>
                    <?php endif; ?>

                    <!-- Metric Cards -->
                    <div class="dnt-wc-metric-grid">
                        <div class="dnt-wc-metric-card dnt-wc-quick-link" data-destination="wc-routine">
                            <div>
                                <div class="dnt-wc-card-head">
                                    <svg style="color: var(--dnt-wc-brand); width:22px; height:22px; fill:none; stroke:currentColor; stroke-width:2;" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                    <h3><?php esc_html_e( 'ক্লাস রুটিন', 'ggisc' ); ?></h3>
                                </div>
                                <p><?php esc_html_e( 'আজকের দিনের ক্লাস সূচী ও সময় সারণী সংক্রান্ত তথ্যাদি দ্রুত জেনে নিন।', 'ggisc' ); ?></p>
                            </div>
                            <span class="dnt-wc-card-link-btn"><?php esc_html_e( 'রুটিন শিট দেখুন', 'ggisc' ); ?> &rarr;</span>
                        </div>

                        <div class="dnt-wc-metric-card dnt-wc-quick-link" data-destination="wc-results">
                            <div>
                                <div class="dnt-wc-card-head">
                                    <svg style="color: var(--dnt-wc-brand); width:22px; height:22px; fill:none; stroke:currentColor; stroke-width:2;" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line></svg>
                                    <h3><?php esc_html_e( 'পরীক্ষার ফলাফল', 'ggisc' ); ?></h3>
                                </div>
                                <p><?php esc_html_e( 'সাম্প্রতিক টার্ম এবং সেমিস্টার ফাইনাল পরীক্ষার প্রোগ্রেস ও মার্কশিট দেখুন।', 'ggisc' ); ?></p>
                            </div>
                            <span class="dnt-wc-card-link-btn"><?php esc_html_e( 'গ্রেড রিপোর্ট', 'ggisc' ); ?> &rarr;</span>
                        </div>
                    </div>
                </div>

                <!-- PANE 2: ROUTINE -->
                <div id="wc-routine" class="dnt-wc-pane">
                    <h3 style="margin: 0 0 8px 0; font-size: 1.3rem; color: var(--dnt-wc-text-main); font-weight: 700;"><?php esc_html_e( 'শ্রেণি পাঠদান রুটিন', 'ggisc' ); ?></h3>
                    <p style="color: var(--dnt-wc-text-sub); margin-bottom: 25px; font-size: 0.95rem;"><?php esc_html_e( 'নিয়মিত আপডেট হওয়া দৈনিক ক্লাসের অফিশিয়াল সময়সূচী:', 'ggisc' ); ?></p>
                    
                    <div class="dnt-wc-table-wrapper">
                        <table class="dnt-wc-data-table">
                            <thead>
                                <tr>
                                    <th><?php esc_html_e( 'সময়', 'ggisc' ); ?></th>
                                    <th><?php esc_html_e( 'বিষয়', 'ggisc' ); ?></th>
                                    <th><?php esc_html_e( 'শিক্ষক', 'ggisc' ); ?></th>
                                    <th><?php esc_html_e( 'কক্ষ নম্বর', 'ggisc' ); ?></th>
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

                <!-- PANE 3: RESULTS (Dynamic Queries) -->
                <div id="wc-results" class="dnt-wc-pane">
                    <h3 style="margin: 0 0 8px 0; font-size: 1.3rem; color: var(--dnt-wc-text-main); font-weight: 700;"><?php esc_html_e( 'পরীক্ষার ফলাফল শিট', 'ggisc' ); ?></h3>
                    <p style="color: var(--dnt-wc-text-sub); margin-bottom: 25px; font-size: 0.95rem;"><?php esc_html_e( 'অ্যাকাডেমিক সেমিস্টার সমূহের নম্বর ও প্রোগ্রেসিভ রিপোর্ট:', 'ggisc' ); ?></p>
                    
                    <div class="dnt-wc-table-wrapper">
                        <table class="dnt-wc-data-table">
                            <thead>
                                <tr>
                                    <th><?php esc_html_e( 'বিষয়', 'ggisc' ); ?></th>
                                    <th><?php esc_html_e( 'মোট নম্বর', 'ggisc' ); ?></th>
                                    <th><?php esc_html_e( 'প্রাপ্ত নম্বর', 'ggisc' ); ?></th>
                                    <th><?php esc_html_e( 'গ্রেড', 'ggisc' ); ?></th>
                                    <th><?php esc_html_e( 'GPA', 'ggisc' ); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ( $student_id > 0 ) {
                                    $results = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$table_results} WHERE student_id = %d ORDER BY id DESC", $student_id ) );
                                    if ( ! empty( $results ) ) {
                                        foreach ( $results as $res ) {
                                            ?>
                                            <tr>
                                                <td><strong><?php echo esc_html( $res->subject_name ); ?></strong></td>
                                                <td><?php echo esc_html( $res->total_marks ); ?></td>
                                                <td><span style="color:#16a34a; font-weight:700;"><?php echo esc_html( $res->obtained_marks ); ?></span></td>
                                                <td><span class="badge" style="background:#006a4e; color:#fff; padding:3px 8px; border-radius:4px;"><?php echo esc_html( $res->grade ); ?></span></td>
                                                <td><strong><?php echo esc_html( $res->gpa ); ?></strong></td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo '<tr><td colspan="5" class="text-center text-muted py-4">' . esc_html__( 'এখনো কোনো ফলাফল প্রকাশিত হয়নি।', 'ggisc' ) . '</td></tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="5" class="text-center text-muted py-4">' . esc_html__( 'আপনার আইডির সাথে কোনো সক্রিয় স্টুডেন্ট প্রোফাইল যুক্ত নেই।', 'ggisc' ) . '</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- PANE 4: NOTICES (Dynamic Queries) -->
                <div id="wc-notices" class="dnt-wc-pane">
                    <h3 style="margin: 0 0 20px 0; font-size: 1.3rem; color: var(--dnt-wc-text-main); font-weight: 700;"><?php esc_html_e( 'প্রাতিষ্ঠানিক নোটিশ বোর্ড', 'ggisc' ); ?></h3>
                    
                    <?php
                    $notices = $wpdb->get_results( "SELECT * FROM {$table_notices} WHERE status = 'Published' ORDER BY id DESC LIMIT 5" );
                    if ( ! empty( $notices ) ) :
                        foreach ( $notices as $notice ) :
                            $date_raw = ( ! empty( $notice->event_date ) && $notice->event_date !== '1970-01-01' ) ? $notice->event_date : $notice->created_at;
                            $pub_date = date_i18n( 'd F, Y', strtotime( $date_raw ) );
                    ?>
                        <div style="border: 1px solid var(--dnt-wc-border-clr); padding: 20px; border-radius: var(--dnt-wc-radius); background: #fff; margin-bottom: 15px;">
                            <span style="color: var(--dnt-wc-brand); font-size: 0.85rem; font-weight: 700; background: var(--dnt-wc-brand-light); padding: 4px 8px; border-radius: 4px;">
                                <?php echo esc_html( $notice->notice_type ?: 'নোটিশ' ); ?>
                            </span>
                            <h4 style="margin: 12px 0 6px 0; font-size: 1.15rem; color: var(--dnt-wc-text-main); font-weight: 700;"><?php echo esc_html( $notice->title ); ?></h4>
                            <small style="color: var(--dnt-wc-text-sub); display: block; margin-bottom: 12px;"><?php esc_html_e( 'প্রকাশের তারিখ:', 'ggisc' ); ?> <?php echo esc_html( $pub_date ); ?></small>
                            <p style="margin: 0; color: #475569; font-size: 0.95rem; line-height: 1.6;"><?php echo wp_kses_post( wpautop( $notice->description ) ); ?></p>
                            <?php if ( ! empty( $notice->attachment_url ) ) : ?>
                                <a href="<?php echo esc_url( $notice->attachment_url ); ?>" target="_blank" style="display:inline-block; margin-top:10px; color:var(--dnt-wc-brand); font-weight:700; text-decoration:none;">
                                    <?php esc_html_e( 'সংযুক্ত ফাইল ডাউনলোড করুন &rarr;', 'ggisc' ); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php 
                        endforeach;
                    else : 
                    ?>
                        <p class="text-muted"><?php esc_html_e( 'কোনো নোটিশ পাওয়া যায়নি।', 'ggisc' ); ?></p>
                    <?php endif; ?>
                </div>

            </main>
        </div>
    </div>
</div>

<!-- Tab Navigation Script Engine -->
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
    const navItems = document.querySelectorAll('.dnt-wc-nav-item');
    const contentPanes = document.querySelectorAll('.dnt-wc-pane');
    const quickLinks = document.querySelectorAll('.dnt-wc-quick-link');
    const noticeShortcut = document.querySelector('.dnt-wc-notice-shortcut');

    function executeTabSwitch(targetId) {
        navItems.forEach(item => item.classList.remove('is-active'));
        contentPanes.forEach(pane => pane.classList.remove('is-active'));

        const intendedNav = document.querySelector(`.dnt-wc-nav-item[data-target="${targetId}"]`);
        const intendedPane = document.getElementById(targetId);

        if (intendedNav && intendedPane) {
            intendedNav.classList.add('is-active');
            intendedPane.classList.add('is-active');
            window.scrollTo({ top: intendedPane.offsetTop - 100, behavior: 'smooth' });
        }
    }

    navItems.forEach(nav => {
        nav.addEventListener('click', function() {
            const target = this.getAttribute('data-target');
            executeTabSwitch(target);
        });
    });

    quickLinks.forEach(card => {
        card.addEventListener('click', function() {
            const destination = this.getAttribute('data-destination');
            executeTabSwitch(destination);
        });
    });

    if (noticeShortcut) {
        noticeShortcut.addEventListener('click', function() {
            executeTabSwitch('wc-notices');
        });
    }
});
</script>

<?php get_footer(); ?>