<?php 
/*
Template Name: Events Archive
*/

get_header(); 

global $wpdb;

// Bengali Number & Month Converter Helper
if ( ! function_exists( 'dnt_convert_to_bangla_nums' ) ) {
    function dnt_convert_to_bangla_nums( $str ) {
        $eng = array('0','1','2','3','4','5','6','7','8','9','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec','January','February','March','April','May','June','July','August','September','October','November','December');
        $ban = array('০','১','২','৩','৪','৫','৬','৭','৮','৯','জানু','ফেব্রু','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টে','অক্টো','নভে','ডিসে','জানুয়ারি','ফেব্রুয়ারি','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর');
        return str_replace($eng, $ban, $str);
    }
}

// 1. Pagination setup (9 Events Per Page)
$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
$per_page = 9;
$offset = ( $paged - 1 ) * $per_page;

$table_notices = $wpdb->prefix . 'sms_notices';

// 2. Count Total Events
$total_events = $wpdb->get_var(
    $wpdb->prepare(
        "SELECT COUNT(id) FROM {$table_notices} WHERE status = %s AND notice_type = %s",
        'Published',
        'Event'
    )
);

$total_pages = ceil( $total_events / $per_page );

// 3. Fetch Events Ordered by Latest Date First
$events = $wpdb->get_results(
    $wpdb->prepare(
        "SELECT * FROM {$table_notices} 
         WHERE status = %s AND notice_type = %s 
         ORDER BY COALESCE(NULLIF(event_date, '1970-01-01'), created_at) DESC, id DESC 
         LIMIT %d OFFSET %d",
        'Published',
        'Event',
        $per_page,
        $offset
    )
);

// Fallback Images for Events
$default_images = array(
    'https://images.unsplash.com/photo-1461896836934-ffe607ba8211?q=80&w=600',
    'https://images.unsplash.com/photo-1532094349884-543bc11b234d?q=80&w=600',
    'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?q=80&w=600',
    'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=600'
);
?>

    <!-- PAGE BREADCRUMB BANNER -->
    <section class="dnt-page-banner" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/img/breadcrumb.jpg');">
        <div class="dnt-container">
            <h1 class="dnt-page-title">ইভেন্ট ও কার্যক্রমসমূহ</h1>
            <div class="dnt-breadcrumb">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <svg class="dnt-icon-inline" viewBox="0 0 24 24" width="16" height="16" fill="currentColor">
                        <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                    </svg> প্রথম পাতা
                </a> 
                <span>
                    <svg viewBox="0 0 24 24" width="12" height="12" fill="currentColor" style="opacity:0.7;">
                        <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
                    </svg>
                </span> 
                <span style="color:var(--dnt-color-gray-300);">সকল ইভেন্ট</span>
            </div>
        </div>
    </section>

    <!-- MAIN CONTENT -->
    <section class="dnt-page-section" style="padding: 60px 0;">
        <div class="dnt-container dnt-page-grid">
            
            <!-- Left Side: All Events Grid -->
            <main class="dnt-page-content">
                <h2 class="dnt-section-heading">
                    <svg class="dnt-icon-heading" viewBox="0 0 24 24" width="24" height="24" fill="currentColor" style="vertical-align: middle; margin-right: 8px;">
                        <path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10z"/>
                    </svg>
                    প্রতিষ্ঠানের সাম্প্রতিক ইভেন্টসমূহ
                </h2>

                <div class="dnt-events-archive-wrapper" style="margin-top: 25px;">
                    <?php if ( ! empty( $events ) ) : ?>
                        
                        <div class="dnt-event-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 25px;">
                            <?php 
                            $img_index = 0;
                            foreach ( $events as $event ) : 
                                $img_url = ! empty( $event->attachment_url ) ? $event->attachment_url : $default_images[$img_index % 4];
                                $img_index++;

                                $date_raw = ( ! empty( $event->event_date ) && $event->event_date !== '1970-01-01' ) 
                                    ? $event->event_date 
                                    : $event->created_at;

                                $time_stamp     = strtotime( $date_raw );
                                $formatted_date = date_i18n( 'j F, Y', $time_stamp );
                                $bangla_date    = dnt_convert_to_bangla_nums( $formatted_date );
                                $event_url      = home_url( '/single-event/?id=' . absint( $event->id ) );
                            ?>
                                <div class="dnt-event-card" style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.04); transition: transform 0.3s, box-shadow 0.3s;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 15px rgba(0,0,0,0.1)';" onmouseout="this.style.transform='none'; this.style.boxShadow='0 2px 8px rgba(0,0,0,0.04)';">
                                    <div class="dnt-event-thumb" style="position: relative; height: 180px; background-image: url('<?php echo esc_url( $img_url ); ?>'); background-size: cover; background-position: center;">
                                        <div class="dnt-event-date-badge" style="position: absolute; top: 12px; right: 12px; background: #006a4e; color: #fff; padding: 4px 10px; border-radius: 4px; font-size: 0.8rem; font-weight: 600;">
                                            <?php echo esc_html( $bangla_date ); ?>
                                        </div>
                                    </div>

                                    <div class="dnt-event-body" style="padding: 18px;">
                                        <h3 style="font-size: 1.1rem; margin-bottom: 10px; line-height: 1.4;">
                                            <a href="<?php echo esc_url( $event_url ); ?>" style="text-decoration: none; color: #1e293b; font-weight: 700; transition: color 0.2s;" onmouseover="this.style.color='#006a4e';" onmouseout="this.style.color='#1e293b';">
                                                <?php echo esc_html( $event->title ); ?>
                                            </a>
                                        </h3>
                                        
                                        <?php if ( ! empty( $event->description ) ) : ?>
                                            <p style="color: #64748b; font-size: 0.88rem; line-height: 1.5; margin-bottom: 15px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                                <?php echo esc_html( wp_strip_all_tags( $event->description ) ); ?>
                                            </p>
                                        <?php endif; ?>

                                        <a href="<?php echo esc_url( $event_url ); ?>" style="font-size: 0.85rem; color: #006a4e; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 4px;">
                                            বিস্তারিত বিবরণ ➔
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- PAGINATION -->
                        <?php if ( $total_pages > 1 ) : ?>
                            <div class="dnt-pagination" style="display: flex; gap: 6px; justify-content: center; align-items: center; margin-top: 40px;">
                                <?php
                                if ( $paged > 1 ) {
                                    $prev_link = add_query_arg( 'paged', $paged - 1, get_permalink() );
                                    echo '<a href="' . esc_url( $prev_link ) . '" style="padding: 8px 12px; text-decoration: none; border-radius: 4px; font-weight: 600; background: #e5e7eb; color: #333;">« পূর্ববর্তী</a>';
                                }

                                for ( $i = 1; $i <= $total_pages; $i++ ) {
                                    $active_style = ( $i == $paged ) ? 'background: #006a4e; color: #fff;' : 'background: #e5e7eb; color: #333;';
                                    $page_link = add_query_arg( 'paged', $i, get_permalink() );
                                    echo '<a href="' . esc_url( $page_link ) . '" style="padding: 8px 14px; text-decoration: none; border-radius: 4px; font-weight: 600; ' . $active_style . '">' . dnt_convert_to_bangla_nums( $i ) . '</a>';
                                }

                                if ( $paged < $total_pages ) {
                                    $next_link = add_query_arg( 'paged', $paged + 1, get_permalink() );
                                    echo '<a href="' . esc_url( $next_link ) . '" style="padding: 8px 12px; text-decoration: none; border-radius: 4px; font-weight: 600; background: #e5e7eb; color: #333;">পরবর্তী »</a>';
                                }
                                ?>
                            </div>
                        <?php endif; ?>

                    <?php else : ?>
                        <div style="padding: 40px; text-align: center; background: #fff; border-radius: 8px; border: 1px solid #e5e7eb; color: #64748b;">
                            <p>বর্তমানে কোনো ইভেন্ট পাওয়া যায়নি।</p>
                        </div>
                    <?php endif; ?>
                </div>
            </main>

            <?php get_sidebar(); ?>

        </div>
    </section>

<?php get_footer(); ?>