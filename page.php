<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ggisc
 */

get_header();
?>

    <!-- PAGE BREADCRUMB BANNER -->
    <section class="dnt-page-banner">
        <div class="dnt-container">
            <h1 class="dnt-page-title"><?php the_title(); ?></h1>
            <div class="dnt-breadcrumb">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: text-bottom;"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg> 
                    হোম
                </a> 
                
                <?php 
                // Display parent page links dynamically if they exist
                if ( $post->post_parent ) {
                    $ancestors = array_reverse( get_post_ancestors( $post->ID ) );
                    foreach ( $ancestors as $ancestor ) {
                        ?>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="font-size:0.8rem; margin:0 5px; vertical-align: middle;"><path d="m9 18 6-6-6-6"/></svg>
                        </span>
                        <a href="<?php echo esc_url( get_permalink( $ancestor ) ); ?>"><?php echo esc_html( get_the_title( $ancestor ) ); ?></a>
                        <?php
                    }
                }
                ?>

                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="font-size:0.8rem; margin:0 5px; vertical-align: middle;"><path d="m9 18 6-6-6-6"/></svg>
                </span> 
                <span style="color:var(--dnt-color-gray-300);"><?php the_title(); ?></span>
            </div>
        </div>
    </section>

    <!-- MAIN CONTENT AREA (FULL WIDTH, NO SIDEBAR) -->
    <div class="dnt-container dnt-page-container" style="margin-top: 50px; margin-bottom: 50px;">
        <main id="primary" class="dnt-page-content site-main dnt-full-width-content">

            <?php
            while ( have_posts() ) :
                the_post();

                // Dynamic content-page template load
                get_template_part( 'template-parts/content', 'page' );

                // Optional: If comments are open, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

            endwhile; // End of the loop.
            ?>

        </main><!-- #main -->
    </div>

<?php
get_footer();