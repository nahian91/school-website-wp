<?php 
/* Template Name: Single Event */
get_header(); 

global $wpdb;
$table_notices = $wpdb->prefix . 'sms_notices';

// 1. Get and sanitize Event ID from URL parameter
$event_id = isset( $_GET['id'] ) ? absint( $_GET['id'] ) : 0;

// 2. Fetch the Event Record from Database
$event = null;
if ( $event_id > 0 ) {
    $event = $wpdb->get_row( 
        $wpdb->prepare( "SELECT * FROM {$table_notices} WHERE id = %d AND notice_type = %s AND status = %s", $event_id, 'Event', 'Published' ) 
    );
}

// Bengali Helper Function (Fixed Order for Month Names)
if ( ! function_exists( 'dnt_convert_to_bangla_nums' ) ) {
    function dnt_convert_to_bangla_nums( $str ) {
        $eng = array(
            '0','1','2','3','4','5','6','7','8','9',
            'January','February','March','April','May','June','July','August','September','October','November','December',
            'Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'
        );
        $ban = array(
            '০','১','২','৩','৪','৫','৬','৭','৮','৯',
            'জানুয়ারি','ফেব্রুয়ারি','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর',
            'জানু','ফেব্রু','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টে','অক্টো','নভে','ডিসে'
        );
        return str_replace( $eng, $ban, $str );
    }
}
?>

<!-- ==========================================================================
     CSS FOR SINGLE EVENT PAGE
     ========================================================================== -->
<style>
    .dnt-page-section { padding: 60px 0; background: #f0f2f5; }
    .dnt-page-grid { display: grid; grid-template-columns: 1fr 350px; gap: 40px; }
    .dnt-event-details-wrapper { background: #fff; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); border: 1px solid #e2e8f0; overflow: hidden; }
    .dnt-event-banner-img { width: 100%; height: 380px; object-fit: cover; display: block; }
    .dnt-event-body { padding: 40px; }
    .dnt-event-meta-bar { display: flex; flex-wrap: wrap; gap: 20px; background: #f8fafc; padding: 25px; border-radius: 8px; margin-bottom: 35px; border-left: 5px solid #006a4e; }
    .dnt-event-meta-item { display: flex; align-items: center; gap: 15px; flex: 1; min-width: 200px; }
    .dnt-event-meta-icon { width: 50px; height: 50px; background: #fff; color: #006a4e; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 1px 3px rgba(0,0,0,0.05); flex-shrink: 0;}
    .dnt-event-meta-text h4 { font-size: 0.85rem; color: #64748b; margin-bottom: 2px; text-transform: uppercase; margin-top:0;}
    .dnt-event-meta-text p { font-size: 1.05rem; color: #0f172a; font-weight: bold; margin-bottom: 0; line-height: 1.2; }
    .dnt-event-title { font-size: 2rem; color: #1e293b; margin-bottom: 20px; font-weight: 800; line-height: 1.3;}
    .dnt-event-desc { font-size: 1.05rem; color: #334155; line-height: 1.8; margin-bottom: 30px; text-align: justify; }

    @media (max-width: 992px) {
        .dnt-page-grid { grid-template-columns: 1fr; }
    }
</style>

<!-- PAGE BREADCRUMB BANNER -->
<section class="dnt-page-banner" style="background-image: url('<?php echo esc_url( get_template_directory_uri() . '/assets/img/breadcrumb.jpg' ); ?>');">
    <div class="dnt-container">
        <h1 class="dnt-page-title"><?php echo $event ? esc_html( $event->title ) : 'ইভেন্ট পাওয়া যায়নি'; ?></h1>
        <div class="dnt-breadcrumb">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">প্রথম পাতা</a> 
            <span>/</span> 
            <span style="color:var(--dnt-color-gray-300);">ইভেন্ট বিস্তারিত</span>
        </div>
    </div>
</section>

<!-- MAIN CONTENT -->
<section class="dnt-page-section">
    <div class="dnt-container dnt-page-grid">
        
        <!-- Left Side: Event Details -->
        <main class="dnt-event-details-wrapper">
            
            <?php if ( $event ) : 
                // Format Event Date
                $event_date_raw = ( ! empty( $event->event_date ) && $event->event_date !== '1970-01-01' ) 
                    ? $event->event_date 
                    : $event->created_at;

                $formatted_date = date_i18n( 'j F, Y', strtotime( $event_date_raw ) );
                $bangla_date    = dnt_convert_to_bangla_nums( $formatted_date );

                // Cover Image Resolution Logic (No Default Fallback)
                $banner_img = '';
                if ( ! empty( $event->featured_image ) ) {
                    $banner_img = $event->featured_image;
                } elseif ( ! empty( $event->attachment_url ) ) {
                    $banner_img = $event->attachment_url;
                }
            ?>
                <!-- Event Banner Image (Rendered only if available) -->
                <?php if ( ! empty( $banner_img ) ) : ?>
                    <img src="<?php echo esc_url( $banner_img ); ?>" alt="<?php echo esc_attr( $event->title ); ?>" class="dnt-event-banner-img">
                <?php endif; ?>
                
                <div class="dnt-event-body">
                    
                    <h1 class="dnt-event-title"><?php echo esc_html( $event->title ); ?></h1>
                    
                    <!-- Meta Info Bar -->
                    <div class="dnt-event-meta-bar">
                        <div class="dnt-event-meta-item">
                            <div class="dnt-event-meta-icon">
                                <svg class="dnt-svg-icon dnt-icon-md" viewBox="0 0 24 24" style="width:24px; height:24px;"><path fill="currentColor" d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z"/></svg>
                            </div>
                            <div class="dnt-event-meta-text">
                                <h4>তারিখ</h4>
                                <p><?php echo esc_html( $bangla_date ); ?></p>
                            </div>
                        </div>
                        <div class="dnt-event-meta-item">
                            <div class="dnt-event-meta-icon">
                                <svg class="dnt-svg-icon dnt-icon-md" viewBox="0 0 24 24" style="width:24px; height:24px;"><path fill="currentColor" d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg>
                            </div>
                            <div class="dnt-event-meta-text">
                                <h4>আবেদনকারী/টার্গেট</h4>
                                <p><?php echo esc_html( ! empty( $event->target_audience ) ? $event->target_audience : 'সকলের জন্য' ); ?></p>
                            </div>
                        </div>
                        <div class="dnt-event-meta-item">
                            <div class="dnt-event-meta-icon">
                                <svg class="dnt-svg-icon dnt-icon-md" viewBox="0 0 24 24" style="width:24px; height:24px;"><path fill="currentColor" d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                            </div>
                            <div class="dnt-event-meta-text">
                                <h4>স্থান</h4>
                                <p>বিদ্যালয় প্রাঙ্গণ</p>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="dnt-event-desc">
                        <?php echo wp_kses_post( wpautop( $event->description ) ); ?>
                    </div>

                    <!-- Download Attachment Button (If Available) -->
                    <?php if ( ! empty( $event->attachment_url ) ) : ?>
                        <div style="margin-top: 30px; padding: 20px; background: #f1f5f9; border-radius: 8px; display: flex; align-items: center; justify-content: space-between;">
                            <span><strong>সংযুক্ত নথি/অফিসিয়াল সার্কুলার:</strong></span>
                            <a href="<?php echo esc_url( $event->attachment_url ); ?>" target="_blank" style="background: #006a4e; color: #fff; padding: 10px 20px; border-radius: 6px; text-decoration: none; font-weight: 700;">
                                ডাউনলোড করুন &rarr;
                            </a>
                        </div>
                    <?php endif; ?>

                </div>

            <?php else : ?>
                <div style="padding: 60px; text-align: center;">
                    <h2>দুঃখিত! কোনো ইভেন্ট পাওয়া যায়নি।</h2>
                    <p>আপনার কাঙ্ক্ষিত ইভেন্টটি হয়তো মুছে ফেলা হয়েছে অথবা সচল নেই।</p>
                    <a href="<?php echo esc_url( home_url('/') ); ?>" style="color: #006a4e; font-weight: 700;">&larr; প্রথম পাতায় ফিরে যান</a>
                </div>
            <?php endif; ?>

        </main>

        <?php get_sidebar(); ?>

    </div>
</section>

<?php get_footer(); ?>