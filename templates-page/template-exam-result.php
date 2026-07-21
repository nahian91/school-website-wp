<?php 
/*
Template Name: Exam Result
*/

// ==========================================================================
// 1. BACKEND: AJAX PROCESSOR ENGINE (SELF-CONTAINED)
// ==========================================================================
add_action( 'wp_ajax_dnt_fetch_exam_results', 'dnt_handle_exam_results_ajax' );
add_action( 'wp_ajax_nopriv_dnt_fetch_exam_results', 'dnt_handle_exam_results_ajax' );

function dnt_handle_exam_results_ajax() {
    // Verify Security Nonce
    if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'dnt_exam_result_nonce' ) ) {
        wp_send_json_error( array( 'message' => 'সিকিউরিটি টোকেন যাচাই করা সম্ভব হয়নি। পেজটি রিফ্রেশ দিয়ে আবার চেষ্টা করুন।' ) );
    }

    global $wpdb;

    $table_students = $wpdb->prefix . 'sms_students';
    $table_results  = $wpdb->prefix . 'sms_results';
    $table_exams    = $wpdb->prefix . 'sms_exams';

    $exam_id   = isset( $_POST['exam_id'] ) ? intval( $_POST['exam_id'] ) : 0;
    $class_name = isset( $_POST['class_name'] ) ? sanitize_text_field( wp_unslash( $_POST['class_name'] ) ) : '';
    $roll_no    = isset( $_POST['roll_no'] ) ? sanitize_text_field( wp_unslash( $_POST['roll_no'] ) ) : '';

    if ( empty( $exam_id ) || empty( $class_name ) ) {
        wp_send_json_error( array( 'message' => 'অনুগ্রহ করে পরীক্ষা এবং শ্রেণি সঠিকভাবে নির্বাচন করুন।' ) );
    }

    // Fetch Exam Info
    $exam_info = $wpdb->get_row( $wpdb->prepare( "SELECT exam_name FROM {$table_exams} WHERE id = %d", $exam_id ) );

    // Build Base Query
    $sql = "SELECT s.roll_no, s.student_id, s.full_name, s.section_name, 
                   r.obtained_marks, r.total_marks, r.grade, r.gpa, r.subject_name
            FROM {$table_students} s
            INNER JOIN {$table_results} r ON s.id = r.student_id
            WHERE r.exam_id = %d AND s.class_name = %s";
    
    $query_args = array( $exam_id, $class_name );

    if ( ! empty( $roll_no ) ) {
        $sql .= " AND (s.roll_no = %s OR s.student_id = %s)";
        $query_args[] = $roll_no;
        $query_args[] = $roll_no;
    }

    $sql .= " ORDER BY CAST(s.roll_no AS UNSIGNED) ASC, r.subject_name ASC";
    $results = $wpdb->get_results( $wpdb->prepare( $sql, ...$query_args ) );

    if ( empty( $results ) ) {
        wp_send_json_error( array( 'message' => 'কোনো ফলাফল পাওয়া যায়নি। তথ্য সঠিক আছে কিনা তা পুনঃপরীক্ষা করুন।' ) );
    }

    ob_start();
    ?>

    <!-- Print & Meta Action Header -->
    <div class="dnt-result-header-meta" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; background: #f8fafc; padding: 15px 20px; border-radius: 8px; border: 1px solid #e2e8f0;">
        <div>
            <h3 style="margin: 0; font-size: 1.2rem; color: #0f172a; font-weight: 800;"><?php echo esc_html( $exam_info ? $exam_info->exam_name : 'পরীক্ষার ফলাফল' ); ?></h3>
            <span style="font-size: 0.9rem; color: #64748b; font-weight: 600;">শ্রেণি: <?php echo esc_html( $class_name ); ?></span>
        </div>
        <button type="button" class="dnt-btn dnt-btn-secondary" onclick="window.print();" style="display: inline-flex; align-items: center; gap: 8px;">
            <i class="fa-solid fa-print"></i> ফলাফল প্রিন্ট করুন
        </button>
    </div>

    <?php 
    // CASE A: SPECIFIC STUDENT MARKSHEET (Roll or Student ID specified)
    if ( ! empty( $roll_no ) ) : 
        $student_meta = $results[0];
        $total_obtained = 0;
        $total_max = 0;
        $total_gpa_sum = 0;
        $has_failed = false;
        $subject_count = count( $results );

        foreach ( $results as $item ) {
            $total_obtained += floatval( $item->obtained_marks );
            $total_max      += floatval( $item->total_marks );
            $total_gpa_sum  += floatval( $item->gpa );
            if ( $item->grade === 'F' ) {
                $has_failed = true;
            }
        }

        $avg_gpa = $has_failed ? 0.00 : ( $subject_count > 0 ? ( $total_gpa_sum / $subject_count ) : 0.00 );
        ?>

        <!-- Student Profile Summary Card -->
        <div class="dnt-student-card-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; margin-bottom: 20px; background: #ffffff; border: 1px solid #cbd5e1; padding: 20px; border-radius: 10px;">
            <div><strong>শিক্ষার্থীর নাম:</strong> <?php echo esc_html( $student_meta->full_name ); ?></div>
            <div><strong>রোল নম্বর:</strong> #<?php echo esc_html( $student_meta->roll_no ); ?></div>
            <div><strong>শিক্ষার্থী আইডি:</strong> <code><?php echo esc_html( $student_meta->student_id ); ?></code></div>
            <div><strong>শাখা / গ্রুপ:</strong> <?php echo esc_html( $student_meta->section_name ? $student_meta->section_name : 'N/A' ); ?></div>
        </div>

        <!-- Subject Wise Marks Table -->
        <table class="dnt-results-table">
            <thead>
                <tr>
                    <th style="text-align: left;">বিষয়</th>
                    <th>পূর্ণমান</th>
                    <th>প্রাপ্ত নম্বর</th>
                    <th>গ্রেড</th>
                    <th>জিপিএ</th>
                    <th>স্ট্যাটাস</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ( $results as $row ) : 
                    $is_fail = ( $row->grade === 'F' );
                ?>
                <tr>
                    <td style="text-align: left; font-weight: 700; color: #1e293b;"><?php echo esc_html( $row->subject_name ); ?></td>
                    <td><?php echo floatval( $row->total_marks ); ?></td>
                    <td><strong><?php echo floatval( $row->obtained_marks ); ?></strong></td>
                    <td style="font-weight: bold; color: <?php echo $is_fail ? '#ef4444' : '#10b981'; ?>;"><?php echo esc_html( $row->grade ); ?></td>
                    <td><?php echo number_format( floatval( $row->gpa ), 2 ); ?></td>
                    <td>
                        <?php if ( $is_fail ) : ?>
                            <span class="dnt-badge dnt-badge-danger" style="background-color: #fee2e2; color: #991b1b; padding: 4px 8px; border-radius: 4px; font-weight: bold; font-size: 12px;">অকৃতকার্য</span>
                        <?php else : ?>
                            <span class="dnt-badge dnt-badge-success" style="background-color: #d1fae5; color: #065f46; padding: 4px 8px; border-radius: 4px; font-weight: bold; font-size: 12px;">উত্তীর্ণ</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Marksheet Final Analytics Footer Box -->
        <div style="margin-top: 20px; padding: 20px; background: <?php echo $has_failed ? '#fef2f2' : '#f0fdf4'; ?>; border: 1px solid <?php echo $has_failed ? '#fecaca' : '#bbf7d0'; ?>; border-radius: 10px; display: flex; justify-content: space-around; align-items: center; flex-wrap: wrap; gap: 15px;">
            <div><span style="font-size: 13px; color: #64748b; font-weight: 600;">মোট নম্বর:</span> <br><strong style="font-size: 18px; color: #0f172a;"><?php echo $total_obtained; ?> / <?php echo $total_max; ?></strong></div>
            <div><span style="font-size: 13px; color: #64748b; font-weight: 600;">গড় জিপিএ (GPA):</span> <br><strong style="font-size: 18px; color: #0f172a;"><?php echo number_format( $avg_gpa, 2 ); ?></strong></div>
            <div><span style="font-size: 13px; color: #64748b; font-weight: 600;">সর্বশেষ ফলাফল:</span> <br>
                <?php if ( $has_failed ) : ?>
                    <strong style="color: #dc2626; font-size: 18px;"><i class="fa-solid fa-circle-xmark"></i> অকৃতকার্য (FAILED)</strong>
                <?php else : ?>
                    <strong style="color: #16a34a; font-size: 18px;"><i class="fa-solid fa-circle-check"></i> উত্তীর্ণ (PASSED)</strong>
                <?php endif; ?>
            </div>
        </div>

    <?php 
    // CASE B: FULL CLASS RESULT LISTING (All Students)
    else : ?>
        <table class="dnt-results-table">
            <thead>
                <tr>
                    <th>রোল</th>
                    <th>আইডি</th>
                    <th style="text-align: left;">শিক্ষার্থীর নাম</th>
                    <th>বিষয়</th>
                    <th>প্রাপ্ত নম্বর</th>
                    <th>গ্রেড</th>
                    <th>জিপিএ</th>
                    <th>স্ট্যাটাস</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ( $results as $row ) : 
                    $is_fail = ( $row->grade === 'F' );
                ?>
                <tr>
                    <td><strong>#<?php echo esc_html( $row->roll_no ); ?></strong></td>
                    <td><code><?php echo esc_html( $row->student_id ); ?></code></td>
                    <td style="text-align: left; font-weight: bold; color: #0f172a;"><?php echo esc_html( $row->full_name ); ?></td>
                    <td><?php echo esc_html( $row->subject_name ); ?></td>
                    <td><?php echo floatval( $row->obtained_marks ); ?> / <?php echo floatval( $row->total_marks ); ?></td>
                    <td style="font-weight: bold; color: <?php echo $is_fail ? '#ef4444' : '#10b981'; ?>;"><?php echo esc_html( $row->grade ); ?></td>
                    <td><?php echo number_format( floatval( $row->gpa ), 2 ); ?></td>
                    <td>
                        <?php if ( $is_fail ) : ?>
                            <span class="dnt-badge dnt-badge-danger" style="background-color: #fee2e2; color: #991b1b; padding: 4px 8px; border-radius: 4px; font-weight: bold; font-size: 12px;">অকৃতকার্য</span>
                        <?php else : ?>
                            <span class="dnt-badge dnt-badge-success" style="background-color: #d1fae5; color: #065f46; padding: 4px 8px; border-radius: 4px; font-weight: bold; font-size: 12px;">উত্তীর্ণ</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif;

    $html = ob_get_clean();
    wp_send_json_success( array( 'html' => $html ) );
}


// ==========================================================================
// 2. FRONTEND TEMPLATE RENDER
// ==========================================================================
get_header(); 

global $wpdb;

$table_exams    = $wpdb->prefix . 'sms_exams';
$table_units    = $wpdb->prefix . 'sms_academic_units';

// Dynamic Options for Select Boxes
$dynamic_exams   = $wpdb->get_results( "SELECT id, exam_name FROM {$table_exams} ORDER BY id DESC" );
$dynamic_classes = $wpdb->get_col( "SELECT DISTINCT class_name FROM {$table_units} ORDER BY CAST(class_name AS UNSIGNED) ASC, class_name ASC" );
?>

    <!-- পেজ ব্যানার ও ব্রেডক্রাম্ব -->
    <section class="dnt-page-banner" style="background-image: url('<?php echo esc_url( get_template_directory_uri() . '/assets/img/breadcrumb.jpg' ); ?>');">
        <div class="dnt-container">
            <h1 class="dnt-page-title">পরীক্ষার ফলাফল</h1>
            <div class="dnt-breadcrumb">
                <a href="<?php echo esc_url( site_url( '/' ) ); ?>">
                    <svg class="dnt-icon-inline" viewBox="0 0 24 24" width="16" height="16" fill="currentColor">
                        <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                    </svg> প্রথম পাতা
                </a> 
                <span>
                    <svg viewBox="0 0 24 24" width="12" height="12" fill="currentColor" style="opacity:0.7;">
                        <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
                    </svg>
                </span> 
                <span style="color:var(--dnt-color-gray-300);">পরীক্ষার ফলাফল</span>
            </div>
        </div>
    </section>

    <!-- মেইন কন্টেন্ট সেকশন -->
    <section class="dnt-page-section">
        <div class="dnt-container dnt-page-grid">
            
            <main class="dnt-page-content">
                <h2 class="dnt-section-heading"><i class="fa-solid fa-magnifying-glass-chart"></i> ফলাফল অনুসন্ধান করুন</h2>
                
                <!-- সার্চ ফিল্টার ফরম -->
                <div class="dnt-filter-card">
                    <form id="dnt-ajax-result-form" method="POST">
                        <div class="dnt-form-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px;">
                            
                            <!-- পরীক্ষার নাম -->
                            <div class="dnt-form-group">
                                <label for="result-exam">পরীক্ষার নাম <span>*</span></label>
                                <select id="result-exam" name="exam_id" class="dnt-form-control" required>
                                    <option value="">-- পরীক্ষা নির্বাচন করুন --</option>
                                    <?php if ( ! empty( $dynamic_exams ) ) : foreach ( $dynamic_exams as $ex ) : ?>
                                        <option value="<?php echo intval( $ex->id ); ?>">
                                            <?php echo esc_html( $ex->exam_name ); ?>
                                        </option>
                                    <?php endforeach; endif; ?>
                                </select>
                            </div>

                            <!-- শ্রেণি -->
                            <div class="dnt-form-group">
                                <label for="result-class">শ্রেণি <span>*</span></label>
                                <select id="result-class" name="class_name" class="dnt-form-control" required>
                                    <option value="">-- শ্রেণি নির্বাচন করুন --</option>
                                    <?php if ( ! empty( $dynamic_classes ) ) : foreach ( $dynamic_classes as $cls ) : ?>
                                        <option value="<?php echo esc_attr( $cls ); ?>">
                                            <?php echo esc_html( $cls ); ?>
                                        </option>
                                    <?php endforeach; endif; ?>
                                </select>
                            </div>

                            <!-- রোল / স্টুডেন্ট আইডি -->
                            <div class="dnt-form-group">
                                <label for="student-roll">রোল / আইডি নম্বর (ঐচ্ছিক)</label>
                                <input type="text" id="student-roll" name="roll_no" class="dnt-form-control" placeholder="উদাঃ ১০১ বা STU-2026-01">
                            </div>
                        </div>

                        <div class="dnt-form-actions" style="margin-top: 20px; display: flex; gap: 10px;">
                            <button type="reset" id="dnt-btn-reset" class="dnt-btn dnt-btn-secondary"><i class="fa-solid fa-rotate-left"></i> রিসেট</button>
                            <button type="submit" id="dnt-btn-search" class="dnt-btn dnt-btn-primary">
                                <span class="btn-text"><i class="fa-solid fa-magnifying-glass"></i> ফলাফল খুঁজুন</span>
                                <span class="btn-spinner" style="display: none;"><i class="fa-solid fa-spinner fa-spin"></i> খোঁজা হচ্ছে...</span>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- ফলাফল টেবিল ব্লক (AJAX Stream Viewport) -->
                <h3 class="dnt-section-heading" style="font-size: 1.4rem; margin-top: 30px;"><i class="fa-solid fa-list-check"></i> ফলাফল তালিকা</h3>
                
                <div class="dnt-table-responsive" id="dnt-ajax-result-container">
                    <div class="dnt-alert dnt-alert-info" style="padding: 15px; background: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 6px; color: #166534;">
                        <i class="fa-solid fa-circle-info"></i> ফলাফল দেখতে উপরে থেকে পরীক্ষা এবং শ্রেণি নির্বাচন করে "ফলাফল খুঁজুন" বোতামে ক্লিক করুন।
                    </div>
                </div>
            </main>

            <?php get_sidebar(); ?>

        </div>
    </section>

    <!-- 3. Dynamic AJAX Engine Script -->
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        var ajaxUrl = "<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>";
        var nonce = "<?php echo esc_js( wp_create_nonce( 'dnt_exam_result_nonce' ) ); ?>";

        $('#dnt-ajax-result-form').on('submit', function(e) {
            e.preventDefault();

            var examId = $('#result-exam').val();
            var className = $('#result-class').val();
            var rollNo = $('#student-roll').val();

            if (!examId || !className) {
                alert('অনুগ্রহ করে পরীক্ষা এবং শ্রেণি সিলেক্ট করুন।');
                return;
            }

            // UI Loading State
            $('#dnt-btn-search .btn-text').hide();
            $('#dnt-btn-search .btn-spinner').show();
            $('#dnt-btn-search').prop('disabled', true);

            $('#dnt-ajax-result-container').html('<div style="text-align: center; padding: 40px;"><i class="fa-solid fa-spinner fa-spin fa-2x" style="color: #006a4e;"></i><p style="margin-top: 10px; color: #64748b;">ফলাফল লোড হচ্ছে, অনুগ্রহ করে অপেক্ষা করুন...</p></div>');

            $.ajax({
                url: ajaxUrl,
                type: 'POST',
                data: {
                    action: 'dnt_fetch_exam_results',
                    nonce: nonce,
                    exam_id: examId,
                    class_name: className,
                    roll_no: rollNo
                },
                success: function(response) {
                    if (response.success) {
                        $('#dnt-ajax-result-container').html(response.data.html);
                    } else {
                        var errorMsg = response.data && response.data.message ? response.data.message : 'কোনো তথ্য পাওয়া যায়নি।';
                        $('#dnt-ajax-result-container').html('<div class="dnt-alert dnt-alert-warning" style="padding: 15px; background: #fffbe3; border: 1px solid #fde68a; border-radius: 6px; color: #92400e;"><i class="fa-solid fa-triangle-exclamation"></i> ' + errorMsg + '</div>');
                    }
                },
                error: function() {
                    $('#dnt-ajax-result-container').html('<div class="dnt-alert dnt-alert-danger" style="padding: 15px; background: #fef2f2; border: 1px solid #fecaca; border-radius: 6px; color: #991b1b;"><i class="fa-solid fa-circle-exclamation"></i> সার্ভারের সাথে সংযোগ বিচ্ছিন্ন হয়েছে। আবার চেষ্টা করুন।</div>');
                },
                complete: function() {
                    // Reset UI State
                    $('#dnt-btn-search .btn-spinner').hide();
                    $('#dnt-btn-search .btn-text').show();
                    $('#dnt-btn-search').prop('disabled', false);
                }
            });
        });

        // Form Reset Event
        $('#dnt-btn-reset').on('click', function() {
            $('#dnt-ajax-result-container').html('<div class="dnt-alert dnt-alert-info" style="padding: 15px; background: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 6px; color: #166534;"><i class="fa-solid fa-circle-info"></i> ফলাফল দেখতে উপরে থেকে পরীক্ষা এবং শ্রেণি নির্বাচন করে "ফলাফল খুঁজুন" বোতামে ক্লিক করুন।</div>');
        });
    });
    </script>

<?php get_footer(); ?>