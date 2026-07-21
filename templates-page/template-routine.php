<?php 
/*
Template Name: Routine
*/

get_header(); 

global $wpdb;

// Exact Table Names from DB Schema
$table_routine  = $wpdb->prefix . 'sms_routine';
$table_units    = $wpdb->prefix . 'sms_academic_units';
$table_subjects = $wpdb->prefix . 'sms_subjects'; 

// Fetch Dynamic Academic Classes for Dropdown Filter
$all_classes = $wpdb->get_results( "SELECT id, class_name FROM {$table_units} ORDER BY id ASC" );

// GET Parameter Sanitization
$selected_class_id = isset( $_GET['class_filter'] ) ? sanitize_text_field( wp_unslash( $_GET['class_filter'] ) ) : 'all';

// English to Bengali Day Mapper
$day_map_bn = array(
    'Saturday'  => 'শনিবার',
    'Sunday'    => 'রবিবার',
    'Monday'    => 'সোমবার',
    'Tuesday'   => 'মঙ্গলবার',
    'Wednesday' => 'বুধবার',
    'Thursday'  => 'বৃহস্পতিবার',
    'Friday'    => 'শুক্রবার',
);

// SQL Query with Foreign Key Joins to Get Class Name and Subject Name
$query = "SELECT r.*, u.class_name, s.subject_name 
          FROM {$table_routine} r
          INNER JOIN {$table_units} u ON r.class_id = u.id
          INNER JOIN {$table_subjects} s ON r.subject_id = s.id";

if ( 'all' !== $selected_class_id && ! empty( $selected_class_id ) ) {
    $query .= $wpdb->prepare( " WHERE r.class_id = %d", intval( $selected_class_id ) );
}

$query .= " ORDER BY FIELD(r.day_name, 'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'), r.start_time ASC";

$db_routines = $wpdb->get_results( $query );

// Group Routine Data by Day Name
$grouped_routines = array();
if ( ! empty( $db_routines ) ) {
    foreach ( $db_routines as $r ) {
        $day_key = ucfirst( strtolower( trim( $r->day_name ) ) );
        $grouped_routines[ $day_key ][] = $r;
    }
}
?>

    <!-- ৪. পেজ ব্যানার ও ব্রেডক্রাম্ব -->
    <section class="dnt-page-banner" style="background-image: url('<?php echo esc_url( get_template_directory_uri() . '/assets/img/breadcrumb.jpg' ); ?>');">
        <div class="dnt-container">
            <h1 class="dnt-page-title"><?php esc_html_e( 'ক্লাস রুটিন ও সময়সূচী', 'dnt-theme' ); ?></h1>
            <div class="dnt-breadcrumb">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <svg class="dnt-icon-inline" viewBox="0 0 24 24" width="16" height="16" fill="currentColor">
                        <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                    </svg> <?php esc_html_e( 'প্রথম পাতা', 'dnt-theme' ); ?>
                </a> 
                <span>
                    <svg viewBox="0 0 24 24" width="12" height="12" fill="currentColor" style="opacity:0.7;">
                        <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
                    </svg>
                </span> 
                <span style="color:var(--dnt-color-gray-300);"><?php esc_html_e( 'ক্লাস রুটিন', 'dnt-theme' ); ?></span>
            </div>
        </div>
    </section>

    <!-- ৫. মেইন কন্টেন্ট সেকশন -->
    <section class="dnt-page-section">
        <div class="dnt-container dnt-page-grid">
            
            <main class="dnt-page-content" id="dnt-printable-routine-area">
                
                <div class="dnt-routine-header-flex">
                    <div>
                        <h2 class="dnt-section-heading"><i class="fa-regular fa-clock"></i> <?php esc_html_e( 'দৈনিক ও সাপ্তাহিক ক্লাসের সময়সূচী', 'dnt-theme' ); ?></h2>
                        <p class="dnt-intro-text">
                            <?php esc_html_e( 'স্কুল ম্যানেজমেন্ট সিস্টেমের অ্যাডমিন প্যানেল থেকে হালনাগাদকৃত শ্রেণীভিত্তিক রুটিন নিচে প্রদর্শিত হচ্ছে।', 'dnt-theme' ); ?>
                        </p>
                    </div>
                </div>

                <!-- ফিল্টার ও কন্ট্রোল বার -->
                <div class="dnt-routine-filter-bar dnt-no-print">
                    <form method="GET" action="" id="dnt-routine-filter-form">
                        <input type="hidden" name="page_id" value="<?php echo get_the_ID(); ?>">
                        
                        <div class="dnt-filter-wrapper">
                            <div class="dnt-filter-item">
                                <label for="dnt-class-select"><strong><?php esc_html_e( 'শ্রেণী নির্বাচন করুন:', 'dnt-theme' ); ?></strong></label>
                                <select name="class_filter" id="dnt-class-select" class="dnt-select-control" onchange="document.getElementById('dnt-routine-filter-form').submit();">
                                    <option value="all" <?php selected( $selected_class_id, 'all' ); ?>><?php esc_html_e( '-- সকল ক্লাস --', 'dnt-theme' ); ?></option>
                                    <?php if ( ! empty( $all_classes ) ) : ?>
                                        <?php foreach ( $all_classes as $cls ) : ?>
                                            <option value="<?php echo esc_attr( $cls->id ); ?>" <?php selected( $selected_class_id, $cls->id ); ?>>
                                                <?php 
                                                    /* translators: %s: Class Name */
                                                    printf( esc_html__( 'শ্রেণী: %s', 'dnt-theme' ), esc_html( $cls->class_name ) ); 
                                                ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>

                            <div class="dnt-action-btns">
                                <button type="button" onclick="window.print();" class="dnt-btn-print">
                                    <i class="fa-solid fa-print"></i> <?php esc_html_e( 'রুটিন প্রিন্ট করুন', 'dnt-theme' ); ?>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- সাপ্তাহিক দিনের ট্যাব ফিল্টার -->
                <div class="dnt-weekly-directory dnt-no-print">
                    <div class="dnt-day-tabs">
                        <button class="dnt-tab-btn active" data-day="all-days"><?php esc_html_e( 'সকল দিন', 'dnt-theme' ); ?></button>
                        <button class="dnt-tab-btn" data-day="Saturday"><?php esc_html_e( 'শনিবার', 'dnt-theme' ); ?></button>
                        <button class="dnt-tab-btn" data-day="Sunday"><?php esc_html_e( 'রবিবার', 'dnt-theme' ); ?></button>
                        <button class="dnt-tab-btn" data-day="Monday"><?php esc_html_e( 'সোমবার', 'dnt-theme' ); ?></button>
                        <button class="dnt-tab-btn" data-day="Tuesday"><?php esc_html_e( 'মঙ্গলবার', 'dnt-theme' ); ?></button>
                        <button class="dnt-tab-btn" data-day="Wednesday"><?php esc_html_e( 'বুধবার', 'dnt-theme' ); ?></button>
                        <button class="dnt-tab-btn" data-day="Thursday"><?php esc_html_e( 'বৃহস্পতিবার', 'dnt-theme' ); ?></button>
                    </div>
                </div>

                <!-- প্রিন্ট হেডার -->
                <div class="dnt-print-only-header">
                    <h2><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h2>
                    <p><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
                    <h3><?php esc_html_e( 'শ্রেণী রুটিন - মাষ্টার সময়সূচী', 'dnt-theme' ); ?></h3>
                </div>

                <!-- ডাইনামিক রুটিন টেবিল -->
                <div class="dnt-routine-table-wrapper">
                    <table class="dnt-matrix-routine-table">
                        <thead>
                            <tr>
                                <th><?php esc_html_e( 'বার / দিন', 'dnt-theme' ); ?></th>
                                <th><?php esc_html_e( 'শ্রেণী', 'dnt-theme' ); ?></th>
                                <th><?php esc_html_e( 'বিষয়', 'dnt-theme' ); ?></th>
                                <th><?php esc_html_e( 'সময়সূচী (Timeline)', 'dnt-theme' ); ?></th>
                                <th><?php esc_html_e( 'রুম নং', 'dnt-theme' ); ?></th>
                            </tr>
                        </thead>
                        <tbody id="dnt-routine-matrix-body">
                            <?php 
                            $weekdays = array( 'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday' );

                            $has_data = false;
                            foreach ( $weekdays as $day ) :
                                if ( ! empty( $grouped_routines[ $day ] ) ) :
                                    $has_data = true;
                                    $bn_day_title = isset( $day_map_bn[ $day ] ) ? $day_map_bn[ $day ] : $day;
                                    $total_slots  = count( $grouped_routines[ $day ] );
                                    
                                    foreach ( $grouped_routines[ $day ] as $index => $slot ) :
                                        ?>
                                        <tr class="<?php echo esc_attr( $day ); ?>">
                                            <?php if ( 0 === $index ) : ?>
                                                <td class="dnt-day-name" rowspan="<?php echo esc_attr( $total_slots ); ?>">
                                                    <strong><?php echo esc_html( $bn_day_title ); ?></strong>
                                                </td>
                                            <?php endif; ?>
                                            <td><strong><?php echo esc_html( $slot->class_name ); ?></strong></td>
                                            <td><span class="dnt-subject-badge"><?php echo esc_html( $slot->subject_name ); ?></span></td>
                                            <td>
                                                <div class="dnt-timeline-badge">
                                                    <i class="fa-regular fa-clock"></i>
                                                    <?php 
                                                        $start = ! empty( $slot->start_time ) ? date( 'h:i A', strtotime( $slot->start_time ) ) : '';
                                                        $end   = ! empty( $slot->end_time ) ? date( 'h:i A', strtotime( $slot->end_time ) ) : '';
                                                        echo esc_html( trim( $start . ' - ' . $end, ' -' ) );
                                                    ?>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="dnt-room-badge">
                                                    <?php echo ! empty( $slot->room_no ) ? esc_html( $slot->room_no ) : 'N/A'; ?>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php 
                                    endforeach;
                                endif;
                            endforeach; 

                            if ( ! $has_data ) :
                                ?>
                                <tr>
                                    <td colspan="5" style="text-align:center; padding: 35px; color: #64748b;">
                                        <i class="fa-solid fa-folder-open" style="font-size:24px; margin-bottom:10px; display:block; color:#94a3b8;"></i>
                                        <?php esc_html_e( 'কোন রুটিন তথ্য পাওয়া যায়নি।', 'dnt-theme' ); ?>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <!-- বিশেষ নির্দেশিকা -->
                <div class="dnt-highlight-box dnt-mtop-30">
                    <h4><i class="fa-solid fa-circle-info"></i> <?php esc_html_e( 'বিশেষ নির্দেশিকা', 'dnt-theme' ); ?></h4>
                    <p>
                        <?php esc_html_e( 'প্রাতঃকালীন সমাবেশ প্রতিদিন নির্ধারিত সময়ে অনুষ্ঠিত হবে। রুটিন সংক্রান্ত যেকোনো আপডেট অ্যাডমিন সাবট্যাব থেকে সরাসরি নিযন্ত্রণযোগ্য।', 'dnt-theme' ); ?>
                    </p>
                </div>

            </main>

            <?php get_sidebar(); ?>
        </div>
    </section>

    <!-- JS Filtering Controls -->
    <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        const tabBtns = document.querySelectorAll('.dnt-tab-btn');
        const matrixRows = document.querySelectorAll('#dnt-routine-matrix-body tr');

        tabBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                tabBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                const selectedDay = this.getAttribute('data-day');

                matrixRows.forEach(function(row) {
                    if (selectedDay === 'all-days' || row.classList.contains(selectedDay)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });
    });
    </script>

    <!-- CSS Styling -->
    <style>
        .dnt-routine-filter-bar {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            padding: 16px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.02);
        }
        .dnt-filter-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }
        .dnt-select-control {
            padding: 8px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 14px;
            outline: none;
            background: #f8fafc;
            cursor: pointer;
        }
        .dnt-btn-print {
            background: var(--dnt-color-primary, #006a4e);
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .dnt-btn-print:hover {
            background: #00523c;
        }
        .dnt-day-tabs {
            display: flex;
            gap: 8px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        .dnt-tab-btn {
            background: #f1f5f9;
            border: 1px solid #cbd5e1;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 700;
            color: #475569;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .dnt-tab-btn.active, .dnt-tab-btn:hover {
            background: #006a4e;
            color: #ffffff;
            border-color: #006a4e;
        }
        .dnt-routine-table-wrapper {
            overflow-x: auto;
            background: #ffffff;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
        }
        .dnt-matrix-routine-table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            font-size: 14px;
        }
        .dnt-matrix-routine-table th, 
        .dnt-matrix-routine-table td {
            border: 1px solid #e2e8f0;
            padding: 12px 10px;
            color: #0f172a;
        }
        .dnt-matrix-routine-table th {
            background-color: #f8fafc;
            font-weight: 800;
            font-size: 13px;
        }
        .dnt-day-name {
            font-weight: 700;
            background-color: #f8fafc;
            vertical-align: middle;
        }
        .dnt-subject-badge {
            background: #eff6ff;
            color: #1d4ed8;
            padding: 4px 10px;
            border-radius: 4px;
            font-weight: 600;
        }
        .dnt-timeline-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #f0fdf4;
            color: #15803d;
            border: 1px solid #bbf7d0;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        .dnt-room-badge {
            background: #f1f5f9;
            border: 1px solid #cbd5e1;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
        }
        .dnt-mtop-30 {
            margin-top: 30px;
        }
        .dnt-print-only-header {
            display: none;
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #000000;
            padding-bottom: 10px;
        }

        @media print {
            body * {
                visibility: hidden;
            }
            .dnt-no-print, header, footer, .dnt-page-banner, .dnt-sidebar, .dnt-highlight-box {
                display: none !important;
            }
            #dnt-printable-routine-area, #dnt-printable-routine-area * {
                visibility: visible;
            }
            #dnt-printable-routine-area {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                margin: 0;
                padding: 0;
            }
            .dnt-print-only-header {
                display: block;
            }
            .dnt-matrix-routine-table {
                width: 100%;
                border-collapse: collapse;
            }
            .dnt-matrix-routine-table th, 
            .dnt-matrix-routine-table td {
                border: 1px solid #000000 !important;
                padding: 8px 4px;
                color: #000000 !important;
                font-size: 12px;
            }
        }
    </style>

<?php get_footer(); ?>