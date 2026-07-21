<?php
/* Template Name: Student Dashboard */

// 1. Prevent Direct Access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// 2. Safe Output Buffering & Session Engine Guard
if ( ! headers_sent() ) {
    ob_start();
}
if ( ! session_id() && ! headers_sent() ) {
    session_start();
}

// 3. Authentication & Strict Role Check
$is_session_logged_in = ! empty( $_SESSION['dnt_student_id'] ) && isset( $_SESSION['dnt_user_role'] ) && 'student' === $_SESSION['dnt_user_role'];
$is_wp_logged_in      = is_user_logged_in() && in_array( 'student', (array) wp_get_current_user()->roles, true );

if ( ! $is_session_logged_in && ! $is_wp_logged_in ) {
    wp_safe_redirect( site_url( '/custom-login/?login=empty' ) );
    exit;
}

global $wpdb;

// Database Table Definitions
$table_students   = $wpdb->prefix . 'sms_students';
$table_attendance = $wpdb->prefix . 'sms_attendance';
$table_fees       = $wpdb->prefix . 'sms_fees';
$table_notices    = $wpdb->prefix . 'sms_notices';
$table_routine    = $wpdb->prefix . 'sms_routine';
$table_subjects   = $wpdb->prefix . 'sms_subjects';
$table_units      = $wpdb->prefix . 'sms_academic_units';
$table_results    = $wpdb->prefix . 'sms_results';
$table_exams      = $wpdb->prefix . 'sms_exams';

$session_std_id = isset( $_SESSION['dnt_student_id'] ) ? absint( $_SESSION['dnt_student_id'] ) : 0;

// Fetch Student Master Record
$student = null;
if ( $session_std_id > 0 ) {
    $student = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$table_students} WHERE id = %d AND status = 'Active'", $session_std_id ) );
}

if ( ! $student && is_user_logged_in() ) {
    $current_wp_user = wp_get_current_user();
    $student         = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$table_students} WHERE student_email = %s AND status = 'Active'", $current_wp_user->user_email ) );
}

$db_student_id = $student ? $student->id : 0;
$student_name  = $student ? ( $student->name_bn ?: $student->full_name ) : 'শিক্ষার্থী পোর্টাল';
$class_name    = $student ? $student->class_name : '';
$section_name  = $student ? $student->section_name : '';

// 4. Data Layer Executions

// A. Dynamic Day-Wise Attendance Data Engine
$attendance_logs       = array();
$total_days            = 0;
$present_days          = 0;
$absent_days           = 0;
$late_days             = 0;
$attendance_percentage = 0;

if ( $db_student_id > 0 ) {
    $attendance_logs = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$table_attendance} WHERE student_id = %d ORDER BY attendance_date DESC LIMIT 30", $db_student_id ) );
    $total_days      = count( $attendance_logs );
    
    if ( $total_days > 0 ) {
        foreach ( $attendance_logs as $log ) {
            $status_lower = strtolower( trim( $log->status ) );
            if ( 'present' === $status_lower ) {
                $present_days++;
            } elseif ( 'absent' === $status_lower ) {
                $absent_days++;
            } elseif ( 'late' === $status_lower ) {
                $late_days++;
                $present_days++;
            }
        }
        $attendance_percentage = round( ( $present_days / $total_days ) * 100 );
    }
}

// B. Routine Matrix Resolution
$routine_data = array();
if ( ! empty( $class_name ) ) {
    $routine_sql = "
        SELECT r.*, s.subject_name, s.subject_code 
        FROM {$table_routine} r
        INNER JOIN {$table_subjects} s ON r.subject_id = s.id
        INNER JOIN {$table_units} u ON r.class_id = u.id
        WHERE u.class_name = %s
        ORDER BY FIELD(r.day_name, 'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'), r.start_time ASC
    ";
    $routine_data = $wpdb->get_results( $wpdb->prepare( $routine_sql, $class_name ) );
}

// C. Examination Result Engine
$student_results = array();
if ( $db_student_id > 0 ) {
    $results_sql = "
        SELECT res.*, ex.exam_name 
        FROM {$table_results} res
        INNER JOIN {$table_exams} ex ON res.exam_id = ex.id
        WHERE res.student_id = %d
        ORDER BY res.id DESC
    ";
    $student_results = $wpdb->get_results( $wpdb->prepare( $results_sql, $db_student_id ) );
}

// D. Dynamic Fee & Ledger Engine
$fees_list        = array();
$total_due_amount = 0.00;

if ( $db_student_id > 0 ) {
    $fees_list        = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$table_fees} WHERE student_id = %d ORDER BY id DESC", $db_student_id ) );
    $total_due_amount = $wpdb->get_var( $wpdb->prepare( "SELECT SUM(due_amount) FROM {$table_fees} WHERE student_id = %d AND payment_status != 'Paid'", $db_student_id ) );
    $total_due_amount = $total_due_amount ? floatval( $total_due_amount ) : 0.00;
}

// E. Dynamic Notice Engine
$student_notices = $wpdb->get_results( "SELECT * FROM {$table_notices} WHERE status = 'Published' AND (target_audience = 'All' OR target_audience = 'Students') ORDER BY id DESC LIMIT 10" );

// Helper array for English to Bengali Day Names
$bn_days = array(
    'Saturday'  => 'শনিবার',
    'Sunday'    => 'রবিবার',
    'Monday'    => 'সোমবার',
    'Tuesday'   => 'মঙ্গলবার',
    'Wednesday' => 'বুধবার',
    'Thursday'  => 'বৃহস্পতিবার',
    'Friday'    => 'শুক্রবার',
);

get_header();
?>

<!-- PAGE BANNER & BREADCRUMB -->
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
            <span style="color:var(--dnt-color-gray-300);"><?php esc_html_e( 'শিক্ষার্থী পোর্টাল', 'ggisc' ); ?></span>
        </div>
    </div>
</section>

<!-- ULTRA-PROFESSIONAL WC STYLE STUDENT DASHBOARD CSS -->
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
        font-family: inherit;
    }

    .dnt-wc-account-layout {
        display: flex;
        gap: 40px;
        align-items: flex-start;
    }

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

    .dnt-badge-status {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 700;
    }
    .dnt-badge-present { background: #dcfce7; color: #16a34a; }
    .dnt-badge-absent { background: #fee2e2; color: #dc2626; }
    .dnt-badge-late { background: #fef3c7; color: #d97706; }

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
                    <li class="dnt-wc-nav-item is-active" data-target="wc-dash-student">
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
                    <li class="dnt-wc-nav-item" data-target="wc-attendance">
                        <a>
                            <svg class="dnt-wc-nav-svg" viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                            <?php esc_html_e( 'দিনভিত্তিক উপস্থিতি', 'ggisc' ); ?>
                        </a>
                    </li>
                    <li class="dnt-wc-nav-item" data-target="wc-results">
                        <a>
                            <svg class="dnt-wc-nav-svg" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                            <?php esc_html_e( 'পরীক্ষার ফলাফল', 'ggisc' ); ?>
                        </a>
                    </li>
                    <li class="dnt-wc-nav-item" data-target="wc-payments">
                        <a>
                            <svg class="dnt-wc-nav-svg" viewBox="0 0 24 24"><rect x="2" y="5" width="20" height="14" rx="2" ry="2"></rect><line x1="2" y1="10" x2="22" y2="10"></line></svg>
                            <?php esc_html_e( 'ফি ও পেমেন্ট', 'ggisc' ); ?>
                        </a>
                    </li>
                    <li class="dnt-wc-nav-item" data-target="wc-notices-student">
                        <a>
                            <svg class="dnt-wc-nav-svg" viewBox="0 0 24 24"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                            <?php esc_html_e( 'নোটিশ বোর্ড', 'ggisc' ); ?>
                        </a>
                    </li>
                    <li class="dnt-logout-item">
                        <?php 
                            $logout_url = wp_nonce_url( add_query_arg( 'action', 'dnt_logout', site_url('/') ), 'dnt_logout_action' ); 
                        ?>
                        <a href="<?php echo esc_url( $logout_url ); ?>">
                            <svg class="dnt-wc-nav-svg" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                            <?php esc_html_e( 'লগআউট', 'ggisc' ); ?>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- RIGHT CONTENT CARD -->
            <main class="dnt-wc-account-content">
                
                <!-- PANE 1: STUDENT DASHBOARD OVERVIEW -->
                <div id="wc-dash-student" class="dnt-wc-pane is-active">
                    <div class="dnt-wc-profile-overview">
                        <div class="dnt-wc-user-meta">
                            <h2><?php echo esc_html( sprintf( __( 'স্বাগতম, %s', 'ggisc' ), $student_name ) ); ?></h2>
                            <p><?php esc_html_e( 'পোর্টাল স্ট্যাটাস:', 'ggisc' ); ?> <span style="font-weight: 700; color: var(--dnt-wc-brand);"><?php esc_html_e( 'সক্রিয় শিক্ষার্থী অ্যাকাউন্ট', 'ggisc' ); ?></span></p>
                        </div>
                        <div>
                            <span style="font-size:0.9rem; background:#fff; border:1px solid var(--dnt-wc-border-clr); padding:8px 14px; border-radius:20px; font-weight:600;">
                                <?php esc_html_e( 'শ্রেণী:', 'ggisc' ); ?> <strong><?php echo esc_html( $class_name ?: 'N/A' ); ?></strong> | <?php esc_html_e( 'রোল:', 'ggisc' ); ?> <strong><?php echo esc_html( $student->roll_no ?? 'N/A' ); ?></strong>
                            </span>
                        </div>
                    </div>

                    <p style="color: var(--dnt-wc-text-sub); margin-bottom: 25px;">
                        <?php esc_html_e( 'শিক্ষার্থী পোর্টাল ড্যাশবোর্ড থেকে তোমার প্রতিদিনের ক্লাস রুটিন, উপস্থিতি রিপোর্ট, পরীক্ষার রেজাল্ট, বকেয়া ফি এবং ক্লাসের অফিশিয়াল নোটিশগুলো সরাসরি পর্যবেক্ষণ করতে পারো।', 'ggisc' ); ?>
                    </p>

                    <!-- WooCommerce Custom Notice Box Component -->
                    <div class="dnt-wc-notice-banner">
                        <span style="display: flex; align-items: center; gap: 12px; font-size: 0.95rem; color: var(--dnt-wc-text-main); font-weight: 600;">
                            <svg style="color: var(--dnt-wc-brand); width:20px; height:20px; fill:none; stroke:currentColor; stroke-width:2;" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                            <?php 
                                if ( $total_due_amount > 0 ) {
                                    echo esc_html( sprintf( __( 'জরুরি আপডেট: তোমার মোট ৳ %s টাকা একাডেমিক ফি বকেয়া রয়েছে।', 'ggisc' ), number_format( $total_due_amount, 2 ) ) );
                                } else {
                                    esc_html_e( 'তোমার সকল একাডেমিক ও টিউশন ফি পরিশোধিত অবস্থায় রয়েছে। ধন্যবাদ।', 'ggisc' );
                                }
                            ?>
                        </span>
                        <a class="dnt-wc-notice-shortcut" style="color: var(--dnt-wc-brand); font-weight: 700; text-decoration: none; font-size: 0.9rem; cursor: pointer; white-space: nowrap;"><?php esc_html_e( 'বিস্তারিত →', 'ggisc' ); ?></a>
                    </div>

                    <!-- Metric Card Navigation Links -->
                    <div class="dnt-wc-metric-grid">
                        <div class="dnt-wc-metric-card dnt-wc-quick-link" data-destination="wc-routine">
                            <div>
                                <div class="dnt-wc-card-head">
                                    <svg style="color: var(--dnt-wc-brand); width:22px; height:22px; fill:none; stroke:currentColor; stroke-width:2;" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                    <h3><?php esc_html_e( 'ক্লাস রুটিন', 'ggisc' ); ?></h3>
                                </div>
                                <p><?php esc_html_e( 'তোমার শ্রেণীর বিষয়ভিত্তিক সাপ্তাহিক ক্লাস রুটিন ও সময়সূচী দেখুন।', 'ggisc' ); ?></p>
                            </div>
                            <span class="dnt-wc-card-link-btn"><?php esc_html_e( 'রুটিন দেখুন →', 'ggisc' ); ?></span>
                        </div>

                        <div class="dnt-wc-metric-card dnt-wc-quick-link" data-destination="wc-results">
                            <div>
                                <div class="dnt-wc-card-head">
                                    <svg style="color: var(--dnt-wc-brand); width:22px; height:22px; fill:none; stroke:currentColor; stroke-width:2;" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line></svg>
                                    <h3><?php esc_html_e( 'পরীক্ষার ফলাফল', 'ggisc' ); ?></h3>
                                </div>
                                <p><?php esc_html_e( 'বিষয়ভিত্তিক প্রাপ্ত নম্বর, গ্রেড ও একাডেমিক জিপিএ (GPA) মার্কশিট দেখুন।', 'ggisc' ); ?></p>
                            </div>
                            <span class="dnt-wc-card-link-btn"><?php esc_html_e( 'মার্কশিট দেখুন →', 'ggisc' ); ?></span>
                        </div>
                    </div>
                </div>

                <!-- PANE 2: CLASS ROUTINE SECTION -->
                <div id="wc-routine" class="dnt-wc-pane">
                    <h3 style="margin: 0 0 8px 0; font-size: 1.3rem; color: var(--dnt-wc-text-main); font-weight: 700;"><?php esc_html_e( 'শ্রেণীর ক্লাস রুটিন', 'ggisc' ); ?></h3>
                    <p style="color: var(--dnt-wc-text-sub); margin-bottom: 25px; font-size: 0.95rem;"><?php esc_html_e( 'তোমার শ্রেণীর বিষয়ভিত্তিক সপ্তাহের সকল ক্লাসের সময়সূচী:', 'ggisc' ); ?></p>

                    <div class="dnt-wc-table-wrapper">
                        <?php if ( ! empty( $routine_data ) ) : ?>
                            <table class="dnt-wc-data-table">
                                <thead>
                                    <tr>
                                        <th><?php esc_html_e( 'দিন (Day)', 'ggisc' ); ?></th>
                                        <th><?php esc_html_e( 'বিষয়', 'ggisc' ); ?></th>
                                        <th><?php esc_html_e( 'সময় (Time)', 'ggisc' ); ?></th>
                                        <th><?php esc_html_e( 'কক্ষ নং', 'ggisc' ); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ( $routine_data as $row ) : 
                                        $day_bn = isset( $bn_days[$row->day_name] ) ? $bn_days[$row->day_name] : $row->day_name;
                                    ?>
                                        <tr>
                                            <td><strong><?php echo esc_html( $day_bn ); ?></strong></td>
                                            <td><?php echo esc_html( $row->subject_name ); ?> (<?php echo esc_html( $row->subject_code ); ?>)</td>
                                            <td><?php echo esc_html( date( 'h:i A', strtotime( $row->start_time ) ) . ' - ' . date( 'h:i A', strtotime( $row->end_time ) ) ); ?></td>
                                            <td><?php echo esc_html( $row->room_no ?: 'N/A' ); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <div style="background: #f8fafc; border: 1px dashed var(--dnt-wc-border-clr); padding: 30px; border-radius: 8px; text-align: center;">
                                <p style="color: var(--dnt-wc-text-sub); margin:0;"><?php esc_html_e( 'তোমার শ্রেণীর ক্লাস রুটিন এখনো আপলোড করা হয়নি।', 'ggisc' ); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- PANE 3: DAY-WISE ATTENDANCE SECTION -->
                <div id="wc-attendance" class="dnt-wc-pane">
                    <h3 style="margin: 0 0 8px 0; font-size: 1.3rem; color: var(--dnt-wc-text-main); font-weight: 700;"><?php esc_html_e( 'দিনভিত্তিক উপস্থিতি রিপোর্ট', 'ggisc' ); ?></h3>
                    <p style="color: var(--dnt-wc-text-sub); margin-bottom: 25px; font-size: 0.95rem;"><?php esc_html_e( 'সাম্প্রতিক ৩০ কার্যদিবসের দৈনিক উপস্থিতি ট্র্যাকিং শীট:', 'ggisc' ); ?></p>
                    
                    <div style="display:flex; gap:15px; margin-bottom:25px; flex-wrap:wrap;">
                        <div style="background:#f0fdf4; border:1px solid #bbf7d0; padding:15px 25px; border-radius:6px; text-align:center; flex: 1;">
                            <span style="display:block; font-size:1.5rem; font-weight:700; color:#16a34a;"><?php echo esc_html( $attendance_percentage . '%' ); ?></span>
                            <small style="color:#15803d; font-weight:600;"><?php esc_html_e( 'মোট উপস্থিতি হার', 'ggisc' ); ?></small>
                        </div>
                        <div style="background:#fef2f2; border:1px solid #fecaca; padding:15px 25px; border-radius:6px; text-align:center; flex: 1;">
                            <span style="display:block; font-size:1.5rem; font-weight:700; color:#dc2626;"><?php echo esc_html( sprintf( __( '%02d দিন', 'ggisc' ), $absent_days ) ); ?></span>
                            <small style="color:#b91c1c; font-weight:600;"><?php esc_html_e( 'মোট অনুপস্থিতি', 'ggisc' ); ?></small>
                        </div>
                        <div style="background:#fef3c7; border:1px solid #fde68a; padding:15px 25px; border-radius:6px; text-align:center; flex: 1;">
                            <span style="display:block; font-size:1.5rem; font-weight:700; color:#d97706;"><?php echo esc_html( sprintf( __( '%02d দিন', 'ggisc' ), $late_days ) ); ?></span>
                            <small style="color:#92400e; font-weight:600;"><?php esc_html_e( 'মোট বিলম্ব (Late)', 'ggisc' ); ?></small>
                        </div>
                    </div>

                    <div class="dnt-wc-table-wrapper">
                        <?php if ( ! empty( $attendance_logs ) ) : ?>
                            <table class="dnt-wc-data-table">
                                <thead>
                                    <tr>
                                        <th><?php esc_html_e( 'তারিখ (Date)', 'ggisc' ); ?></th>
                                        <th><?php esc_html_e( 'বার (Day)', 'ggisc' ); ?></th>
                                        <th><?php esc_html_e( 'প্রবেশের সময়', 'ggisc' ); ?></th>
                                        <th><?php esc_html_e( 'স্ট্যাটাস', 'ggisc' ); ?></th>
                                        <th><?php esc_html_e( 'মন্তব্য / কারণ', 'ggisc' ); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ( $attendance_logs as $log ) : 
                                        $timestamp  = strtotime( $log->attendance_date );
                                        $day_en     = date( 'l', $timestamp );
                                        $day_bn     = isset( $bn_days[$day_en] ) ? $bn_days[$day_en] : $day_en;
                                        $status_val = strtolower( trim( $log->status ) );
                                    ?>
                                        <tr>
                                            <td><strong><?php echo esc_html( date( 'd F, Y', $timestamp ) ); ?></strong></td>
                                            <td><?php echo esc_html( $day_bn ); ?></td>
                                            <td>
                                                <?php 
                                                    echo ! empty( $log->in_time ) ? esc_html( date( 'h:i A', strtotime( $log->in_time ) ) ) : 'N/A'; 
                                                ?>
                                            </td>
                                            <td>
                                                <?php if ( 'present' === $status_val ) : ?>
                                                    <span class="dnt-badge-status dnt-badge-present"><?php esc_html_e( 'উপস্থিত', 'ggisc' ); ?></span>
                                                <?php elseif ( 'late' === $status_val ) : ?>
                                                    <span class="dnt-badge-status dnt-badge-late"><?php esc_html_e( 'বিলম্বিত', 'ggisc' ); ?></span>
                                                <?php else : ?>
                                                    <span class="dnt-badge-status dnt-badge-absent"><?php esc_html_e( 'অনুপস্থিত', 'ggisc' ); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo esc_html( $log->remarks ?: '—' ); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <div style="background: #f8fafc; border: 1px dashed var(--dnt-wc-border-clr); padding: 30px; border-radius: 8px; text-align: center;">
                                <p style="color: var(--dnt-wc-text-sub); margin:0;"><?php esc_html_e( 'কোনো দিনভিত্তিক উপস্থিতি রেকর্ড পাওয়া যায়নি।', 'ggisc' ); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- PANE 4: EXAMINATION RESULTS SECTION -->
                <div id="wc-results" class="dnt-wc-pane">
                    <h3 style="margin: 0 0 8px 0; font-size: 1.3rem; color: var(--dnt-wc-text-main); font-weight: 700;"><?php esc_html_e( 'পরীক্ষার ফলাফল ও মার্কশিট', 'ggisc' ); ?></h3>
                    <p style="color: var(--dnt-wc-text-sub); margin-bottom: 25px; font-size: 0.95rem;"><?php esc_html_e( 'একাডেমিক পরীক্ষার বিষয়ভিত্তিক নম্বর ও লেটার গ্রেড বিবরণী:', 'ggisc' ); ?></p>

                    <div class="dnt-wc-table-wrapper">
                        <?php if ( ! empty( $student_results ) ) : ?>
                            <table class="dnt-wc-data-table">
                                <thead>
                                    <tr>
                                        <th><?php esc_html_e( 'পরীক্ষার নাম', 'ggisc' ); ?></th>
                                        <th><?php esc_html_e( 'বিষয়', 'ggisc' ); ?></th>
                                        <th><?php esc_html_e( 'প্রাপ্ত নম্বর', 'ggisc' ); ?></th>
                                        <th><?php esc_html_e( 'গ্রেড', 'ggisc' ); ?></th>
                                        <th><?php esc_html_e( 'জিপিএ (GPA)', 'ggisc' ); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ( $student_results as $res ) : ?>
                                        <tr>
                                            <td><strong><?php echo esc_html( $res->exam_name ); ?></strong></td>
                                            <td><?php echo esc_html( $res->subject_name ); ?></td>
                                            <td><?php echo esc_html( $res->obtained_marks . ' / ' . $res->total_marks ); ?></td>
                                            <td><span class="dnt-badge-status dnt-badge-late"><?php echo esc_html( $res->grade ); ?></span></td>
                                            <td><strong><?php echo esc_html( $res->gpa ); ?></strong></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <div style="background: #f8fafc; border: 1px dashed var(--dnt-wc-border-clr); padding: 30px; border-radius: 8px; text-align: center;">
                                <p style="color: var(--dnt-wc-text-sub); margin:0;"><?php esc_html_e( 'তোমার কোনো পরীক্ষার ফলাফল এখনো প্রকাশিত হয়নি।', 'ggisc' ); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- PANE 5: PAYMENTS -->
                <div id="wc-payments" class="dnt-wc-pane">
                    <h3 style="margin: 0 0 8px 0; font-size: 1.3rem; color: var(--dnt-wc-text-main); font-weight: 700;"><?php esc_html_e( 'ফি বিবরণী ও অনলাইন পেমেন্ট', 'ggisc' ); ?></h3>
                    <p style="color: var(--dnt-wc-text-sub); margin-bottom: 25px; font-size: 0.95rem;"><?php esc_html_e( 'একাডেমিক সেশনের বকেয়া ও পরিশোধিত ফি-এর বিবরণী:', 'ggisc' ); ?></p>
                    
                    <div class="dnt-wc-table-wrapper">
                        <?php if ( ! empty( $fees_list ) ) : ?>
                            <table class="dnt-wc-data-table">
                                <thead>
                                    <tr>
                                        <th><?php esc_html_e( 'ইনভয়েস আইডি', 'ggisc' ); ?></th>
                                        <th><?php esc_html_e( 'ফি টাইপ', 'ggisc' ); ?></th>
                                        <th><?php esc_html_e( 'মাস/বছর', 'ggisc' ); ?></th>
                                        <th><?php esc_html_e( 'পরিমাণ', 'ggisc' ); ?></th>
                                        <th><?php esc_html_e( 'স্ট্যাটাস', 'ggisc' ); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ( $fees_list as $fee ) : ?>
                                        <tr>
                                            <td><strong>#<?php echo esc_html( $fee->invoice_id ); ?></strong></td>
                                            <td><?php echo esc_html( $fee->fee_type ); ?></td>
                                            <td><?php echo esc_html( $fee->fee_month . ' ' . $fee->fee_year ); ?></td>
                                            <td>৳ <?php echo esc_html( number_format( $fee->net_payable, 2 ) ); ?></td>
                                            <td>
                                                <?php if ( 'Paid' === $fee->payment_status ) : ?>
                                                    <span style="color:#16a34a; font-weight:700;"><?php esc_html_e( 'পরিশোধিত', 'ggisc' ); ?></span>
                                                <?php else : ?>
                                                    <span style="color:#d97706; font-weight:700;"><?php esc_html_e( 'বকেয়া', 'ggisc' ); ?></span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <div style="background: #f8fafc; border: 1px dashed var(--dnt-wc-border-clr); padding: 30px; border-radius: 8px; text-align: center;">
                                <p style="color: var(--dnt-wc-text-sub); margin:0;"><?php esc_html_e( 'কোনো পেমেন্ট লেজার ডাটা পাওয়া যায়নি।', 'ggisc' ); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- PANE 6: NOTICES -->
                <div id="wc-notices-student" class="dnt-wc-pane">
                    <h3 style="margin: 0 0 20px 0; font-size: 1.3rem; color: var(--dnt-wc-text-main); font-weight: 700;"><?php esc_html_e( 'শিক্ষার্থী নোটিশ বোর্ড', 'ggisc' ); ?></h3>
                    
                    <?php if ( ! empty( $student_notices ) ) : ?>
                        <?php foreach ( $student_notices as $notice ) : ?>
                            <div style="border: 1px solid var(--dnt-wc-border-clr); padding: 20px; border-radius: var(--dnt-wc-radius); background: #fff; margin-bottom:20px;">
                                <span style="color: var(--dnt-wc-brand); font-size: 0.85rem; font-weight: 700; background: var(--dnt-wc-brand-light); padding: 4px 8px; border-radius: 4px;"><?php echo esc_html( $notice->notice_type ); ?></span>
                                <h4 style="margin: 12px 0 6px 0; font-size: 1.15rem; color: var(--dnt-wc-text-main); font-weight: 700;"><?php echo esc_html( $notice->title ); ?></h4>
                                <small style="color: var(--dnt-wc-text-sub); display: block; margin-bottom: 12px;"><?php echo esc_html( sprintf( __( 'প্রকাশের তারিখ: %s', 'ggisc' ), date( 'd F, Y', strtotime( $notice->created_at ) ) ) ); ?></small>
                                <p style="margin: 0 0 10px 0; color: #475569; font-size: 0.95rem; line-height: 1.6;"><?php echo esc_html( $notice->description ); ?></p>
                                <?php if ( ! empty( $notice->attachment_url ) ) : ?>
                                    <a href="<?php echo esc_url( $notice->attachment_url ); ?>" target="_blank" style="display: inline-flex; align-items: center; gap: 5px; color: var(--dnt-wc-brand); text-decoration: none; font-size: 13px; font-weight: 700;">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                        <?php esc_html_e( 'সংযুক্ত ফাইল ডাউনলোড করুন', 'ggisc' ); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div style="background: #f8fafc; border: 1px dashed var(--dnt-wc-border-clr); padding: 30px; border-radius: 8px; text-align: center;">
                            <p style="color: var(--dnt-wc-text-sub); margin:0;"><?php esc_html_e( 'বর্তমানে কোনো নোটিশ নেই।', 'ggisc' ); ?></p>
                        </div>
                    <?php endif; ?>
                </div>

            </main>
        </div>
    </div>
</div>

<!-- CORE TAB ENGINE JAVASCRIPT FOR STUDENT -->
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
    const navItems       = document.querySelectorAll('.dnt-wc-nav-item');
    const contentPanes   = document.querySelectorAll('.dnt-wc-pane');
    const quickLinks     = document.querySelectorAll('.dnt-wc-quick-link');
    const noticeShortcut = document.querySelector('.dnt-wc-notice-shortcut');

    function executeTabSwitch(targetId) {
        navItems.forEach(item => item.classList.remove('is-active'));
        contentPanes.forEach(pane => pane.classList.remove('is-active'));

        const intendedNav  = document.querySelector(`.dnt-wc-nav-item[data-target="${targetId}"]`);
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
            executeTabSwitch('wc-notices-student');
        });
    }
});
</script>

<?php get_footer(); ?>