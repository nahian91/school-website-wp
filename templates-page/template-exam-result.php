<?php 
/*
Template Name: Exam Result
*/

get_header(); 

global $wpdb;

// Define Plugin Database Tables
$table_exams    = $wpdb->prefix . 'sms_exams';
$table_students = $wpdb->prefix . 'sms_students';
$table_results  = $wpdb->prefix . 'sms_results';
$table_units    = $wpdb->prefix . 'sms_academic_units';

// Dynamic Options for Form Selects
$dynamic_exams   = $wpdb->get_results( "SELECT id, exam_name FROM {$table_exams} ORDER BY id DESC" );
$dynamic_classes = $wpdb->get_col( "SELECT DISTINCT class_name FROM {$table_units} ORDER BY class_name ASC" );

// Handle Search Query Parameters
$searched_exam_id = isset( $_GET['exam_id'] ) ? intval( $_GET['exam_id'] ) : 0;
$searched_class   = isset( $_GET['class_name'] ) ? sanitize_text_field( $_GET['class_name'] ) : '';
$searched_roll    = isset( $_GET['roll_no'] ) ? sanitize_text_field( $_GET['roll_no'] ) : '';

$is_search_submitted = ( $searched_exam_id > 0 && ! empty( $searched_class ) );
?>

    <!-- ৪. পেজ ব্যানার ও ব্রেডক্রাম্ব -->
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

    <!-- ৫. মেইন কন্টেন্ট সেকশন -->
    <section class="dnt-page-section">
        <div class="dnt-container dnt-page-grid">
            
            <!-- বাম পাশ: ফলাফল সার্চ ফিল্টার এবং ডাটা টেবিল -->
            <main class="dnt-page-content">
                <h2 class="dnt-section-heading"><i class="fa-solid fa-magnifying-glass-chart"></i> ফলাফল অনুসন্ধান করুন</h2>
                
                <!-- সার্চ ফিল্টার ফরম -->
                <div class="dnt-filter-card">
                    <form action="" method="GET">
                        <div class="dnt-form-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px;">
                            
                            <!-- পরীক্ষার ধরন / স্কিম (Dynamic from sms_exams) -->
                            <div class="dnt-form-group">
                                <label for="result-exam">পরীক্ষার নাম <span>*</span></label>
                                <select id="result-exam" name="exam_id" class="dnt-form-control" required>
                                    <option value="">-- পরীক্ষা নির্বাচন করুন --</option>
                                    <?php if ( ! empty( $dynamic_exams ) ) : foreach ( $dynamic_exams as $ex ) : ?>
                                        <option value="<?php echo intval( $ex->id ); ?>" <?php selected( $searched_exam_id, $ex->id ); ?>>
                                            <?php echo esc_html( $ex->exam_name ); ?>
                                        </option>
                                    <?php endforeach; endif; ?>
                                </select>
                            </div>

                            <!-- শ্রেণি ফিল্টার (Dynamic from sms_academic_units) -->
                            <div class="dnt-form-group">
                                <label for="result-class">শ্রেণি <span>*</span></label>
                                <select id="result-class" name="class_name" class="dnt-form-control" required>
                                    <option value="">-- শ্রেণি নির্বাচন করুন --</option>
                                    <?php if ( ! empty( $dynamic_classes ) ) : foreach ( $dynamic_classes as $cls ) : ?>
                                        <option value="<?php echo esc_attr( $cls ); ?>" <?php selected( $searched_class, $cls ); ?>>
                                            <?php echo esc_html( $cls ); ?>
                                        </option>
                                    <?php endforeach; endif; ?>
                                </select>
                            </div>

                            <!-- রোল / স্টুডেন্ট আইডি (ঐচ্ছিক ফিল্টার) -->
                            <div class="dnt-form-group">
                                <label for="student-roll">রোল / আইডি নম্বর (ঐচ্ছিক)</label>
                                <input type="text" id="student-roll" name="roll_no" class="dnt-form-control" value="<?php echo esc_attr( $searched_roll ); ?>" placeholder="উদাঃ ১০১ বা STU-2026-01">
                            </div>
                        </div>

                        <div class="dnt-form-actions" style="margin-top: 20px; display: flex; gap: 10px;">
                            <a href="<?php echo esc_url( get_permalink() ); ?>" class="dnt-btn dnt-btn-secondary" style="text-decoration: none;"><i class="fa-solid fa-rotate-left"></i> রিসেট</a>
                            <button type="submit" class="dnt-btn dnt-btn-primary"><i class="fa-solid fa-magnifying-glass"></i> ফলাফল খুঁজুন</button>
                        </div>
                    </form>
                </div>

                <!-- ফলাফল টেবিল ব্লক (Database Stream) -->
                <h3 class="dnt-section-heading" style="font-size: 1.4rem; margin-top: 30px;"><i class="fa-solid fa-list-check"></i> ফলাফল তালিকা</h3>
                
                <div class="dnt-table-responsive">
                    <?php
                    if ( $is_search_submitted ) {
                        // Prepare Base Query for Selected Exam & Class
                        $sql = "SELECT s.roll_no, s.student_id, s.full_name, r.obtained_marks, r.total_marks, r.grade, r.gpa, r.subject_name
                                FROM {$table_students} s
                                INNER JOIN {$table_results} r ON s.id = r.student_id
                                WHERE r.exam_id = %d AND s.class_name = %s";
                        
                        $query_args = array( $searched_exam_id, $searched_class );

                        if ( ! empty( $searched_roll ) ) {
                            $sql .= " AND (s.roll_no = %s OR s.student_id = %s)";
                            $query_args[] = $searched_roll;
                            $query_args[] = $searched_roll;
                        }

                        $sql .= " ORDER BY s.roll_no ASC";
                        $results = $wpdb->get_results( $wpdb->prepare( $sql, ...$query_args ) );

                        if ( ! empty( $results ) ) {
                            ?>
                            <table class="dnt-results-table">
                                <thead>
                                    <tr>
                                        <th>রোল</th>
                                        <th>আইডি</th>
                                        <th>শিক্ষার্থীর নাম</th>
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
                                        <td style="text-align: left; font-weight: bold;"><?php echo esc_html( $row->full_name ); ?></td>
                                        <td><?php echo esc_html( $row->subject_name ); ?></td>
                                        <td><?php echo floatval( $row->obtained_marks ); ?> / <?php echo floatval( $row->total_marks ); ?></td>
                                        <td style="font-weight: bold; color: <?php echo $is_fail ? '#ef4444' : '#10b981'; ?>;">
                                            <?php echo esc_html( $row->grade ); ?>
                                        </td>
                                        <td><?php echo number_format( floatval( $row->gpa ), 2 ); ?></td>
                                        <td>
                                            <?php if ( $is_fail ) : ?>
                                                <span class="dnt-badge dnt-badge-danger" style="background-color: #fee2e2; color: #991b1b; padding: 4px 8px; border-radius: 4px; font-weight: bold;">অকৃতকার্য</span>
                                            <?php else : ?>
                                                <span class="dnt-badge dnt-badge-success" style="background-color: #d1fae5; color: #065f46; padding: 4px 8px; border-radius: 4px; font-weight: bold;">উত্তীর্ণ</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php
                        } else {
                            echo '<div class="dnt-alert dnt-alert-warning" style="padding: 15px; background: #fffbe3; border: 1px solid #fde68a; border-radius: 6px; color: #92400e;">কোনো ফলাফল পাওয়া যায়নি। তথ্য সঠিকভাবে প্রবেশ করিয়েছেন কিনা পরীক্ষা করুন।</div>';
                        }
                    } else {
                        echo '<div class="dnt-alert dnt-alert-info" style="padding: 15px; background: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 6px; color: #166534;">ফলাফল দেখতে উপরে থেকে পরীক্ষা এবং শ্রেণি নির্বাচন করে "ফলাফল খুঁজুন" বোতামে ক্লিক করুন।</div>';
                    }
                    ?>
                </div>
            </main>

            <?php get_sidebar(); ?>

        </div>
    </section>

<?php get_footer(); ?>