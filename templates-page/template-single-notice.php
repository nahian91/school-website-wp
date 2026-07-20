<?php 
/* Template Name: Single Notice */
get_header(); 

global $wpdb;
$table_notices = $wpdb->prefix . 'sms_notices';

// 1. Get and sanitize Notice ID from URL parameter (?id=123)
$notice_id = isset( $_GET['id'] ) ? absint( $_GET['id'] ) : 0;

// 2. Fetch Notice Record from Database
$notice = null;
if ( $notice_id > 0 ) {
    $notice = $wpdb->get_row( 
        $wpdb->prepare( "SELECT * FROM {$table_notices} WHERE id = %d AND status = %s", $notice_id, 'Published' ) 
    );
}

// Bengali Helper Function
if ( ! function_exists( 'dnt_convert_to_bangla_nums' ) ) {
    function dnt_convert_to_bangla_nums( $str ) {
        $eng = array('0','1','2','3','4','5','6','7','8','9','January','February','March','April','May','June','July','August','September','October','November','December');
        $ban = array('০','১','২','৩','৪','৫','৬','৭','৮','৯','জানুয়ারি','ফেব্রুয়ারি','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর');
        return str_replace($eng, $ban, $str);
    }
}
?>

<!-- ==========================================================================
     CSS FOR SINGLE NOTICE PAGE
     ========================================================================== -->
<style>
    .dnt-page-section { padding: 60px 0; background: #f0f2f5; }
    .dnt-page-grid { display: grid; grid-template-columns: 1fr 350px; gap: 40px; }
    .dnt-notice-details-wrapper { background: #fff; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); border: 1px solid #e2e8f0; overflow: hidden; }
    .dnt-notice-banner-img { width: 100%; height: 320px; object-fit: cover; display: block; }
    .dnt-notice-body { padding: 40px; }
    
    .dnt-notice-meta-bar { display: flex; flex-wrap: wrap; gap: 20px; background: #f8fafc; padding: 25px; border-radius: 8px; margin-bottom: 35px; border-left: 5px solid #006a4e; }
    .dnt-notice-meta-item { display: flex; align-items: center; gap: 15px; flex: 1; min-width: 180px; }
    .dnt-notice-meta-icon { width: 48px; height: 48px; background: #fff; color: #006a4e; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 1px 3px rgba(0,0,0,0.05); flex-shrink: 0;}
    .dnt-notice-meta-text h4 { font-size: 0.85rem; color: #64748b; margin-bottom: 2px; text-transform: uppercase; margin-top:0;}
    .dnt-notice-meta-text p { font-size: 1.05rem; color: #0f172a; font-weight: bold; margin-bottom: 0; line-height: 1.2; }
    
    .dnt-notice-title { font-size: 2rem; color: #1e293b; margin-bottom: 20px; font-weight: 800; line-height: 1.3;}
    .dnt-notice-desc { font-size: 1.05rem; color: #334155; line-height: 1.8; margin-bottom: 30px; text-align: justify; }

    .dnt-notice-badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 4px;
        font-size: 0.85rem;
        font-weight: 700;
        margin-bottom: 15px;
    }
    .badge-urgent { background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; }
    .badge-normal { background: #f0fdf4; color: #006a4e; border: 1px solid #bbf7d0; }

    @media print {
        .no-print, header, footer, .dnt-page-banner, .dnt-sidebar-area { display: none !important; }
        .dnt-page-grid { grid-template-columns: 1fr !important; }
        .dnt-notice-details-wrapper { border: none !important; box-shadow: none !important; }
    }

    @media (max-width: 992px) {
        .dnt-page-grid { grid-template-columns: 1fr; }
    }
</style>

<!-- PAGE BREADCRUMB BANNER -->
<section class="dnt-page-banner" style="background-image: url('<?php echo esc_url( get_template_directory_uri() . '/assets/img/breadcrumb.jpg' ); ?>');">
    <div class="dnt-container">
        <h1 class="dnt-page-title"><?php echo $notice ? esc_html( $notice->title ) : 'নোটিশ পাওয়া যায়নি'; ?></h1>
        <div class="dnt-breadcrumb">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">প্রথম পাতা</a> 
            <span>/</span> 
            <span style="color:var(--dnt-color-gray-300);">নোটিশ বিস্তারিত</span>
        </div>
    </div>
</section>

<!-- MAIN CONTENT -->
<section class="dnt-page-section">
    <div class="dnt-container dnt-page-grid">
        
        <!-- Left Side: Notice Details -->
        <main class="dnt-notice-details-wrapper">
            
            <?php if ( $notice ) : 
                // Format Notice Date
                $date_raw = ( ! empty( $notice->event_date ) && $notice->event_date !== '1970-01-01' ) 
                    ? $notice->event_date 
                    : $notice->created_at;

                $formatted_date = date_i18n( 'j F, Y', strtotime( $date_raw ) );
                $bangla_date    = dnt_convert_to_bangla_nums( $formatted_date );

                // Priority Badge Class
                $priority = strtolower( $notice->priority ?? 'normal' );
                $badge_class = ( $priority === 'urgent' || $priority === 'high' ) ? 'badge-urgent' : 'badge-normal';
                $priority_label = ( $priority === 'urgent' || $priority === 'high' ) ? 'জরুরি নোটিশ' : 'সাধারণ নোটিশ';
            ?>
                
                <!-- Notice Content Body -->
                <div class="dnt-notice-body">
                    
                    <!-- Action Bar -->
                    <div class="no-print" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                        <span class="dnt-notice-badge <?php echo esc_attr( $badge_class ); ?>">
                            <?php echo esc_html( $priority_label ); ?>
                        </span>

                        <button onclick="window.print();" style="background: #f1f5f9; border: 1px solid #cbd5e1; padding: 6px 14px; border-radius: 6px; cursor: pointer; font-size: 0.85rem; font-weight: 600; color: #475569; display: flex; align-items: center; gap: 6px;">
                            <svg viewBox="0 0 24 24" style="width: 16px; height: 16px; fill: currentColor;"><path d="M19 8H5c-1.66 0-3 1.34-3 3v6h4v4h12v-4h4v-6c0-1.66-1.34-3-3-3zm-3 11H8v-5h8v5zm3-7c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm-1-9H6v4h12V3z"/></svg>
                            প্রিন্ট করুন
                        </button>
                    </div>

                    <!-- Title -->
                    <h1 class="dnt-notice-title"><?php echo esc_html( $notice->title ); ?></h1>
                    
                    <!-- Meta Info Bar -->
                    <div class="dnt-notice-meta-bar">
                        <div class="dnt-notice-meta-item">
                            <div class="dnt-notice-meta-icon">
                                <svg class="dnt-svg-icon dnt-icon-md" viewBox="0 0 24 24" style="width:24px; height:24px;"><path fill="currentColor" d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z"/></svg>
                            </div>
                            <div class="dnt-notice-meta-text">
                                <h4>প্রকাশের তারিখ</h4>
                                <p><?php echo esc_html( $bangla_date ); ?></p>
                            </div>
                        </div>
                        <div class="dnt-notice-meta-item">
                            <div class="dnt-notice-meta-icon">
                                <svg class="dnt-svg-icon dnt-icon-md" viewBox="0 0 24 24" style="width:24px; height:24px;"><path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/></svg>
                            </div>
                            <div class="dnt-notice-meta-text">
                                <h4>প্রাপক / টার্গেট</h4>
                                <p><?php echo esc_html( $notice->target_audience ?: 'সকলের জন্য' ); ?></p>
                            </div>
                        </div>
                        <div class="dnt-notice-meta-item">
                            <div class="dnt-notice-meta-icon">
                                <svg class="dnt-svg-icon dnt-icon-md" viewBox="0 0 24 24" style="width:24px; height:24px;"><path fill="currentColor" d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/></svg>
                            </div>
                            <div class="dnt-notice-meta-text">
                                <h4>স্মারক নম্বর / আইডি</h4>
                                <p>#NOT-<?php echo sprintf( '%04d', absint( $notice->id ) ); ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Description Content -->
                    <div class="dnt-notice-desc">
                        <?php echo wp_kses_post( wpautop( $notice->description ) ); ?>
                    </div>

                    <!-- Download Attachment Button (PDF / Document) -->
                    <?php if ( ! empty( $notice->attachment_url ) ) : ?>
                        <div style="margin-top: 35px; padding: 20px; background: #f1f5f9; border-radius: 8px; border: 1px solid #e2e8f0; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 15px;">
                            <div>
                                <strong style="display: block; color: #1e293b;">সংযুক্ত অফিশিয়াল ফাইল/সার্কুলার:</strong>
                                <small style="color: #64748b;">বিস্তারিত দেখতে অথবা প্রিন্ট করতে ফাইলটি ডাউনলোড করুন।</small>
                            </div>
                            <a href="<?php echo esc_url( $notice->attachment_url ); ?>" target="_blank" style="background: #006a4e; color: #fff; padding: 10px 20px; border-radius: 6px; text-decoration: none; font-weight: 700; display: inline-flex; align-items: center; gap: 8px;">
                                <svg viewBox="0 0 24 24" style="width: 16px; height: 16px; fill: currentColor;"><path d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z"/></svg>
                                ডাউনলোড করুন (PDF)
                            </a>
                        </div>
                    <?php endif; ?>

                </div>

            <?php else : ?>
                <div style="padding: 60px; text-align: center;">
                    <h2>দুঃখিত! কোনো নোটিশ পাওয়া যায়নি।</h2>
                    <p>আপনার কাঙ্ক্ষিত নোটিশটি হয়তো মুছে ফেলা হয়েছে অথবা সচল নেই।</p>
                    <a href="<?php echo esc_url( home_url('/') ); ?>" style="color: #006a4e; font-weight: 700;">&larr; প্রথম পাতায় ফিরে যান</a>
                </div>
            <?php endif; ?>

        </main>

        <?php get_sidebar(); ?>

    </div>
</section>

<?php get_footer(); ?>