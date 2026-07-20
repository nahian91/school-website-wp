<?php 

/*
Template Name: Offices List
*/

get_header(); 

global $wpdb;
$table_staff = $wpdb->prefix . 'sms_staff';

// Fetch active administrative staff members dynamically from EduCore DB
$staff_members = $wpdb->get_results( "SELECT * FROM {$table_staff} WHERE status = 'Active' ORDER BY id ASC" );
?>

    <!-- ৪. পেজ ব্যানার ও ব্রেডক্রাম্ব -->
    <section class="dnt-page-banner" style="background-image: url('<?php echo esc_url( get_template_directory_uri() . '/assets/img/breadcrumb.jpg' ); ?>');">
        <div class="dnt-container">
            <h1 class="dnt-page-title">প্রশাসনিক কর্মকর্তাবৃন্দ</h1>
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
                <span style="color:var(--dnt-color-gray-300);">প্রশাসনিক কর্মকর্তাবৃন্দ</span>
            </div>
        </div>
    </section>

    <!-- 5. MAIN CONTENT -->
    <section class="dnt-page-section">
        <div class="dnt-container">
            
            <!-- Admin Staff Content (Sidebar Removed) -->
            <main class="dnt-page-content" style="grid-column: 1 / -1;">
                
                <h2 class="dnt-section-heading">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor" width="1em" height="1em">
                        <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
                    </svg> প্রশাসনিক কর্মকর্তাবৃন্দ
                </h2>
                
                <p class="dnt-intro-text">
                    আমাদের প্রতিষ্ঠানের দাপ্তরিক ও প্রশাসনিক কার্যক্রম সুষ্ঠুভাবে পরিচালনার জন্য আমাদের রয়েছে একটি অত্যন্ত দক্ষ এবং নিবেদিতপ্রাণ প্রশাসনিক টিম। ভর্তি কার্যক্রম, হিসাবরক্ষণ, আইটি সাপোর্ট এবং শিক্ষার্থীদের সার্বিক সেবায় তারা সর্বদা নিয়োজিত আছেন।
                </p>

                <!-- Grid layout for staff cards -->
                <div class="dnt-staff-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem;">
                    
                    <?php if ( ! empty( $staff_members ) ) : foreach ( $staff_members as $staff ) : ?>
                        
                        <div class="dnt-staff-card">
                            <div class="dnt-staff-img" style="overflow: hidden; border-radius: 50%; width: 100px; height: 100px; margin: 0 auto 15px; display: flex; align-items: center; justify-content: center; background: #e2e8f0;">
                                <?php if ( ! empty( $staff->profile_image ) ) : ?>
                                    <img src="<?php echo esc_url( $staff->profile_image ); ?>" alt="<?php echo esc_attr( $staff->full_name ); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                                <?php else : ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor" width="3em" height="3em" style="color: #94a3b8;">
                                        <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
                                    </svg>
                                <?php endif; ?>
                            </div>

                            <h3 class="dnt-staff-name"><?php echo esc_html( $staff->full_name ); ?></h3>
                            <div class="dnt-staff-desig"><?php echo esc_html( $staff->designation ); ?></div>
                            
                            <div class="dnt-staff-contact">
                                <?php if ( ! empty( $staff->phone ) ) : ?>
                                    <p>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="1em" height="1em"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg> 
                                        <?php echo esc_html( $staff->phone ); ?>
                                    </p>
                                <?php endif; ?>

                                <?php if ( ! empty( $staff->email ) ) : ?>
                                    <p>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="1em" height="1em"><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 26.5 21.5 48 48 48H464c26.5 0 48-21.5 48-48V176L281.6 344c-15.2 11.4-36 11.4-51.2 0L0 176z"/></svg> 
                                        <?php echo esc_html( $staff->email ); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>

                    <?php endforeach; else : ?>
                        <div style="grid-column: 1 / -1; text-align: center; padding: 30px; background: #f8fafc; border-radius: 8px;">
                            <p style="margin: 0; color: #64748b;">কোনো প্রশাসনিক কর্মকর্তার তথ্য পাওয়া যায়নি।</p>
                        </div>
                    <?php endif; ?>

                </div>

            </main>

        </div>
    </section>

<?php get_footer(); ?>