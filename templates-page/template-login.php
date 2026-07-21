<?php 
/* Template Name: Login Page */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// 1. Redirect logged-in users directly to their designated dashboard
if ( is_user_logged_in() ) {
    $current_user = wp_get_current_user();
    $user_roles   = (array) $current_user->roles;

    if ( in_array( 'student', $user_roles, true ) ) {
        wp_safe_redirect( home_url( '/student-dashboard/' ) );
        exit;
    } elseif ( in_array( 'guardian', $user_roles, true ) || in_array( 'parent', $user_roles, true ) ) {
        wp_safe_redirect( home_url( '/guardian-dashboard/' ) );
        exit;
    }
}

// 2. Safe Session Initialization for Math Captcha
if ( ! session_id() && ! headers_sent() ) {
    session_start();
}

$n1 = wp_rand( 1, 9 );
$n2 = wp_rand( 1, 9 );
$_SESSION['dnt_login_captcha_ans'] = $n1 + $n2;

get_header(); 
?>

    <!-- PAGE BREADCRUMB BANNER -->
    <section class="dnt-page-banner" style="background-image: url('<?php echo esc_url( get_template_directory_uri() . '/assets/img/breadcrumb.jpg' ); ?>');">
        <div class="dnt-container">
            <h1 class="dnt-page-title"><?php esc_html_e( 'অনলাইন পোর্টাল লগইন', 'ggisc' ); ?></h1>
            <div class="dnt-breadcrumb">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'প্রথম পাতা', 'ggisc' ); ?></a> 
                <span>/</span> 
                <span style="color:var(--dnt-color-gray-300);"><?php esc_html_e( 'লগইন', 'ggisc' ); ?></span>
            </div>
        </div>
    </section>

    <!-- MAIN LOGIN SECTION -->
    <section class="dnt-history-section" style="padding: 60px 0; background: #fdfdfd;">
        <div class="dnt-container dnt-history-grid">
            
            <main class="dnt-history-content">
                <div class="dnt-login-wrapper" style="background: #fff; padding: 40px; border-radius: 12px; border: 1px solid #eef2f6; box-shadow: 0 5px 20px rgba(0,0,0,0.05); max-width: 500px; margin: 0 auto;">
                    
                    <h2 style="margin-bottom: 25px; color: #1e293b; font-size: 24px; font-weight: 700; text-align: center;">
                        <?php esc_html_e( 'অ্যাকাউন্ট অ্যাক্সেস', 'ggisc' ); ?>
                    </h2>

                    <!-- Dynamic Flash Notifications -->
                    <?php if ( isset( $_GET['login'] ) ) : 
                        $error_code = sanitize_text_field( $_GET['login'] );
                        $error_msg  = '';

                        switch ( $error_code ) {
                            case 'failed':
                                $error_msg = __( 'আইডি, ফোন নম্বর বা জন্ম তারিখ মিলেনি। সঠিক তথ্য দিন।', 'ggisc' );
                                break;
                            case 'captcha':
                                $error_msg = __( 'নিরাপত্তা যাচাই (Captcha) উত্তরটি সঠিক হয়নি। আবার চেষ্টা করুন।', 'ggisc' );
                                break;
                            case 'empty':
                                $error_msg = __( 'সমস্ত প্রয়োজনীয় তথ্য পূরণ করুন।', 'ggisc' );
                                break;
                            case 'nonce':
                                $error_msg = __( 'নিরাপত্তা সেশন মেয়াদোত্তীর্ণ হয়েছে। অনুগ্রহ করে পেজ রিফ্রেশ করুন।', 'ggisc' );
                                break;
                        }

                        if ( ! empty( $error_msg ) ) :
                    ?>
                        <div class="dnt-alert dnt-alert-danger" style="background-color: #fef2f2; border: 1px solid #fecaca; color: #dc2626; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; font-weight: 600;">
                            <?php echo esc_html( $error_msg ); ?>
                        </div>
                    <?php 
                        endif;
                    endif; 
                    ?>

                    <!-- Role Switcher Tabs -->
                    <div class="dnt-tabs" style="display: flex; gap: 10px; margin-bottom: 30px; background: #f1f5f9; padding: 5px; border-radius: 8px;">
                        <button type="button" class="tab-btn active" data-role="student" style="flex:1; padding:12px; border:none; background:#006a4e; color:#fff; border-radius:6px; cursor:pointer; font-weight:600; transition:0.3s;">
                            <?php esc_html_e( 'শিক্ষার্থী', 'ggisc' ); ?>
                        </button>
                        <button type="button" class="tab-btn" data-role="guardian" style="flex:1; padding:12px; border:none; background:transparent; color:#64748b; border-radius:6px; cursor:pointer; font-weight:600; transition:0.3s;">
                            <?php esc_html_e( 'অভিভাবক', 'ggisc' ); ?>
                        </button>
                    </div>

                    <!-- Login Form Processor Endpoint -->
                    <form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="POST">
                        <?php wp_nonce_field( 'dnt_login_nonce_action', 'dnt_login_nonce' ); ?>
                        <input type="hidden" name="action" value="dnt_login_handler">
                        <input type="hidden" name="user_role" id="selected_role" value="student">
                        
                        <div style="margin-bottom:20px;">
                            <label id="id-label" style="display:block; margin-bottom:8px; font-weight:600; color:#334155;">
                                <?php esc_html_e( 'স্টুডেন্ট আইডি', 'ggisc' ); ?>
                            </label>
                            <input type="text" name="log" id="id-input" style="width:100%; padding:14px; border:1px solid #cbd5e1; border-radius:8px; box-sizing:border-box; outline:none;" placeholder="<?php esc_attr_e( 'আপনার আইডি লিখুন', 'ggisc' ); ?>" required>
                        </div>
                        
                        <div style="margin-bottom:20px;">
                            <label style="display:block; margin-bottom:8px; font-weight:600; color:#334155;">
                                <?php esc_html_e( 'জন্ম তারিখ', 'ggisc' ); ?>
                            </label>
                            <input type="date" name="pwd" style="width:100%; padding:14px; border:1px solid #cbd5e1; border-radius:8px; box-sizing:border-box; outline:none;" required>
                        </div>

                        <!-- Captcha Challenge Box -->
                        <div style="margin-bottom:25px; padding:15px; background:#f8fafc; border:1px dashed #cbd5e1; border-radius:8px;">
                            <label style="font-size: 12px; text-transform: uppercase; font-weight: 700; color: #64748b; display: block; margin-bottom: 5px;">
                                <?php echo esc_html( sprintf( __( 'নিরাপত্তা যাচাই (%d + %d = ?)', 'ggisc' ), $n1, $n2 ) ); ?>
                            </label>
                            <input type="number" name="captcha" style="width:100%; padding:12px; border:1px solid #cbd5e1; border-radius:6px; box-sizing:border-box;" required placeholder="<?php esc_attr_e( 'যোগফল লিখুন', 'ggisc' ); ?>">
                        </div>

                        <button type="submit" style="width:100%; padding:15px; background:#006a4e; color:#fff; border:none; border-radius:8px; cursor:pointer; font-weight:700; transition:0.3s;" onmouseover="this.style.background='#00523d';" onmouseout="this.style.background='#006a4e';">
                            <?php esc_html_e( 'প্রবেশ করুন', 'ggisc' ); ?>
                        </button>
                    </form>
                </div>
            </main>

        </div>
    </section>

    <!-- ROLE SWITCHER INTERFACE SCRIPT -->
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            const tabBtns      = document.querySelectorAll('.tab-btn');
            const selectedRole = document.getElementById('selected_role');
            const idLabel      = document.getElementById('id-label');
            const idInput      = document.getElementById('id-input');

            tabBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    tabBtns.forEach(b => { 
                        b.style.background = 'transparent'; 
                        b.style.color      = '#64748b'; 
                    });

                    this.style.background = '#006a4e'; 
                    this.style.color      = '#fff';

                    const role = this.getAttribute('data-role');
                    selectedRole.value = role;

                    if (role === 'student') {
                        idLabel.textContent = '<?php echo esc_js( __( 'স্টুডেন্ট আইডি / রোল নম্বর', 'ggisc' ) ); ?>';
                        idInput.placeholder = '<?php echo esc_js( __( 'আপনার আইডি লিখুন', 'ggisc' ) ); ?>';
                    } else {
                        idLabel.textContent = '<?php echo esc_js( __( 'গার্ডিয়ান মোবাইল নম্বর', 'ggisc' ) ); ?>';
                        idInput.placeholder = '<?php echo esc_js( __( '01XXXXXXXXX', 'ggisc' ) ); ?>';
                    }
                });
            });
        });
    </script>

<?php get_footer(); ?>