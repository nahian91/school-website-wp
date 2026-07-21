<?php 
/*
Template Name: Notices Archive
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

// 1. Pagination setup (Strictly 10 per page)
$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
$per_page = 10;
$offset = ( $paged - 1 ) * $per_page;

$table_notices = $wpdb->prefix . 'sms_notices';

// 2. Total Count of Published Notices
$total_notices = $wpdb->get_var(
    $wpdb->prepare(
        "SELECT COUNT(id) FROM {$table_notices} WHERE status = %s",
        'Published'
    )
);

$total_pages = ceil( $total_notices / $per_page );

// 3. Fetch Notices Ordered by Latest First (event_date DESC or id DESC)
$notices = $wpdb->get_results(
    $wpdb->prepare(
        "SELECT * FROM {$table_notices} 
         WHERE status = %s 
         ORDER BY COALESCE(NULLIF(event_date, '1970-01-01'), created_at) DESC, id DESC 
         LIMIT %d OFFSET %d",
        'Published',
        $per_page,
        $offset
    )
);
?>

    <!-- PAGE BREADCRUMB BANNER -->
    <section class="dnt-page-banner" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/img/breadcrumb.jpg');">
        <div class="dnt-container">
            <h1 class="dnt-page-title">একাডেমিক নোটিশবোর্ড</h1>
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
                <span style="color:var(--dnt-color-gray-300);">সকল নোটিশ</span>
            </div>
        </div>
    </section>

    <!-- MAIN CONTENT -->
    <section class="dnt-page-section" style="padding: 60px 0;">
        <div class="dnt-container dnt-page-grid">
            
            <!-- Left Side: All Notices List -->
            <main class="dnt-page-content">
                <h2 class="dnt-section-heading">
                    <svg class="dnt-icon-heading" viewBox="0 0 24 24" width="24" height="24" fill="currentColor" style="vertical-align: middle; margin-right: 8px;">
                        <path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                    </svg>
                    সর্বশেষ নোটিশসমূহ
                </h2>

                <div class="dnt-notices-archive-wrapper" style="margin-top: 25px;">
                    <?php if ( ! empty( $notices ) ) : ?>
                        <div class="dnt-notice-table-responsive" style="overflow-x: auto;">
                            <table class="dnt-notice-table" style="width: 100%; border-collapse: collapse; background: #fff; box-shadow: 0 2px 8px rgba(0,0,0,0.04); border-radius: 8px; overflow: hidden; border: 1px solid #e5e7eb;">
                                <thead>
                                    <tr style="background: #006a4e; color: #ffffff; text-align: left; font-size: 0.95rem;">
                                        <th style="padding: 12px 15px; width: 18%;">তারিখ</th>
                                        <th style="padding: 12px 15px;">নোটিশের শিরোনাম</th>
                                        <th style="padding: 12px 15px; width: 18%; text-align: center;">ডাউনলোড / দেখুন</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ( $notices as $notice ) : 
                                        $date_raw = ( ! empty( $notice->event_date ) && $notice->event_date !== '1970-01-01' ) 
                                            ? $notice->event_date 
                                            : $notice->created_at;

                                        $formatted_date = date_i18n( 'd F, Y', strtotime( $date_raw ) );
                                        $bangla_date    = dnt_convert_to_bangla_nums( $formatted_date );
                                        $notice_url     = home_url( '/single-notice/?id=' . absint( $notice->id ) );
                                    ?>
                                        <tr style="border-bottom: 1px solid #e5e7eb; transition: background 0.2s;" onmouseover="this.style.background='#f9fafb';" onmouseout="this.style.background='#ffffff';">
                                            <td style="padding: 12px 15px; font-weight: 600; color: #006a4e; font-size: 0.9rem;">
                                                <?php echo esc_html( $bangla_date ); ?>
                                            </td>
                                            <td style="padding: 12px 15px;">
                                                <a href="<?php echo esc_url( $notice_url ); ?>" style="text-decoration: none; color: #1e293b; font-weight: 600; font-size: 0.95rem; transition: color 0.2s;" onmouseover="this.style.color='#006a4e';" onmouseout="this.style.color='#1e293b';">
                                                    <?php echo esc_html( $notice->title ); ?>
                                                </a>
                                            </td>
                                            <td style="padding: 12px 15px; text-align: center;">
                                                <a href="<?php echo esc_url( $notice_url ); ?>" class="dnt-btn dnt-btn-sm" style="padding: 6px 12px; background: #006a4e; color: #ffffff; border-radius: 4px; text-decoration: none; font-size: 0.85rem; display: inline-block;">
                                                    বিস্তারিত ➔
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- PAGINATION -->
                        <?php if ( $total_pages > 1 ) : ?>
                            <div class="dnt-pagination" style="display: flex; gap: 6px; justify-content: center; align-items: center; margin-top: 30px;">
                                <?php
                                // Previous Page Button
                                if ( $paged > 1 ) {
                                    $prev_link = add_query_arg( 'paged', $paged - 1, get_permalink() );
                                    echo '<a href="' . esc_url( $prev_link ) . '" style="padding: 8px 12px; text-decoration: none; border-radius: 4px; font-weight: 600; background: #e5e7eb; color: #333;">« পূর্ববর্তী</a>';
                                }

                                // Page Numbers
                                for ( $i = 1; $i <= $total_pages; $i++ ) {
                                    $active_style = ( $i == $paged ) ? 'background: #006a4e; color: #fff;' : 'background: #e5e7eb; color: #333;';
                                    $page_link = add_query_arg( 'paged', $i, get_permalink() );
                                    echo '<a href="' . esc_url( $page_link ) . '" style="padding: 8px 14px; text-decoration: none; border-radius: 4px; font-weight: 600; ' . $active_style . '">' . dnt_convert_to_bangla_nums( $i ) . '</a>';
                                }

                                // Next Page Button
                                if ( $paged < $total_pages ) {
                                    $next_link = add_query_arg( 'paged', $paged + 1, get_permalink() );
                                    echo '<a href="' . esc_url( $next_link ) . '" style="padding: 8px 12px; text-decoration: none; border-radius: 4px; font-weight: 600; background: #e5e7eb; color: #333;">পরবর্তী »</a>';
                                }
                                ?>
                            </div>
                        <?php endif; ?>

                    <?php else : ?>
                        <div style="padding: 30px; text-align: center; background: #fff; border-radius: 8px; border: 1px solid #e5e7eb; color: #64748b;">
                            <p>বর্তমানে কোনো নোটিশ প্রকাশিত হয়নি।</p>
                        </div>
                    <?php endif; ?>
                </div>
            </main>

            <?php get_sidebar(); ?>

        </div>
    </section>

<?php get_footer(); ?>