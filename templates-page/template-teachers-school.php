<?php 

/*
Template Name: Teachers School
*/

get_header(); 

global $wpdb;
$table_staff = $wpdb->prefix . 'sms_staff';

// Fetch Active School Teachers from EduCore Plugin DB
$school_teachers = $wpdb->get_results( 
    $wpdb->prepare(
        "SELECT * FROM {$table_staff} WHERE status = %s AND staff_type = %s ORDER BY id ASC",
        'Active',
        'Teacher (School)'
    )
);
?>

<style>
    /* ==========================================================================
       SVG ICON HELPERS
       ========================================================================== */
    .dnt-svg-icon {
        fill: currentColor;
        display: inline-block;
        vertical-align: middle;
    }
    .dnt-icon-xs { width: 12px; height: 12px; }
    .dnt-icon-sm { width: 16px; height: 16px; }
    .dnt-icon-md { width: 24px; height: 24px; }
    .dnt-icon-lg { width: 32px; height: 32px; }
    .dnt-icon-xl { width: 48px; height: 48px; }
    
    .dnt-teacher-img .dnt-svg-icon {
        width: 60px;
        height: 60px;
    }
</style>

    <!-- ৪. পেজ ব্যানার ও ব্রেডক্রাম্ব -->
    <section class="dnt-page-banner" style="background-image: url('<?php echo esc_url( get_template_directory_uri() . '/assets/img/breadcrumb.jpg' ); ?>');">
        <div class="dnt-container">
            <h1 class="dnt-page-title">শিক্ষকমণ্ডলী (স্কুল শাখা)</h1>
            <div class="dnt-breadcrumb">
                <a href="<?php echo esc_url( site_url() ); ?>">
                    <svg class="dnt-icon-inline" viewBox="0 0 24 24" width="16" height="16" fill="currentColor">
                        <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                    </svg> প্রথম পাতা
                </a> 
                <span>
                    <svg viewBox="0 0 24 24" width="12" height="12" fill="currentColor" style="opacity:0.7;">
                        <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
                    </svg>
                </span> 
                <span style="color:var(--dnt-color-gray-300);">শিক্ষকমণ্ডলী (স্কুল শাখা)</span>
            </div>
        </div>
    </section>

    <!-- 5. MAIN CONTENT -->
    <section class="dnt-page-section">
        <div class="dnt-container">
            
            <!-- Teachers Directory (Full Width) -->
            <main class="dnt-page-content" style="width: 100%;">
                
                <h2 class="dnt-section-heading" style="display:flex; align-items:center; gap:10px;">
                    <svg class="dnt-svg-icon dnt-icon-lg" style="color:var(--dnt-color-primary);" viewBox="0 0 24 24"><path d="M21 3H3c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h7v2H8v2h8v-2h-2v-2h7c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 14H3V5h18v12z"/><circle cx="12" cy="9" r="2.5"/><path d="M16 16v-1.5c0-1.67-3.33-2.5-5-2.5s-5 .83-5 2.5V16h10z"/></svg>
                    শিক্ষকমণ্ডলী (ষষ্ঠ - দশম শ্রেণি)
                </h2>
                
                <p class="dnt-intro-text">
                    স্কুল শাখায় পাঠদানের জন্য রয়েছেন একঝাঁক অভিজ্ঞ, উচ্চশিক্ষিত এবং নিবেদিতপ্রাণ শিক্ষকমণ্ডলী। ডিজিটাল কন্টেন্ট এবং আধুনিক পাঠদান পদ্ধতির মাধ্যমে তারা শিক্ষার্থীদের মাঝে জ্ঞানের আলো ছড়িয়ে দিচ্ছেন।
                </p>

                <!-- Dynamic Teacher Grid -->
                <div class="dnt-teacher-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 25px;">
                    <?php if ( ! empty( $school_teachers ) ) : foreach ( $school_teachers as $teacher ) : ?>
                        <div class="dnt-teacher-card">
                            <div class="dnt-teacher-img" style="overflow: hidden; border-radius: 50%; width: 100px; height: 100px; margin: 0 auto 15px; display: flex; align-items: center; justify-content: center; background: #e2e8f0;">
                                <?php if ( ! empty( $teacher->profile_image ) ) : ?>
                                    <img src="<?php echo esc_url( $teacher->profile_image ); ?>" alt="<?php echo esc_attr( $teacher->full_name ); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                                <?php else : ?>
                                    <svg class="dnt-svg-icon" viewBox="0 0 24 24" style="color: #94a3b8;"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                                <?php endif; ?>
                            </div>

                            <h3 class="dnt-teacher-name">
                                <?php echo esc_html( ! empty( $teacher->name_bn ) ? $teacher->name_bn : $teacher->full_name ); ?>
                            </h3>
                            
                            <div class="dnt-teacher-desig">
                                <?php echo esc_html( $teacher->designation ); ?>
                                <?php echo ! empty( $teacher->subject_expert ) ? ' (' . esc_html( $teacher->subject_expert ) . ')' : ''; ?>
                            </div>
                            
                            <div class="dnt-teacher-edu">
                                <?php echo esc_html( ! empty( $teacher->highest_degree ) ? $teacher->highest_degree : 'শিক্ষক (স্কুল শাখা)' ); ?>
                            </div>
                            
                            <div class="dnt-teacher-social">
                                <?php if ( ! empty( $teacher->email ) ) : ?>
                                    <a href="mailto:<?php echo esc_attr( $teacher->email ); ?>" title="Email">
                                        <svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                                    </a>
                                <?php endif; ?>

                                <?php if ( ! empty( $teacher->facebook_url ) ) : ?>
                                    <a href="<?php echo esc_url( $teacher->facebook_url ); ?>" target="_blank" rel="noopener noreferrer" title="Facebook">
                                        <svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg>
                                    </a>
                                <?php endif; ?>

                                <?php if ( ! empty( $teacher->linkedin_url ) ) : ?>
                                    <a href="<?php echo esc_url( $teacher->linkedin_url ); ?>" target="_blank" rel="noopener noreferrer" title="LinkedIn">
                                        <svg class="dnt-svg-icon dnt-icon-sm" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; else : ?>
                        <div style="grid-column: 1 / -1; text-align: center; padding: 40px; background: #f8fafc; border-radius: 8px;">
                            <p style="margin: 0; color: #64748b; font-size: 1rem;">স্কুল শাখার কোনো শিক্ষকের তথ্য পাওয়া যায়নি।</p>
                        </div>
                    <?php endif; ?>
                </div>

            </main>

        </div>
    </section>

<?php get_footer(); ?>