<?php 
/*
Template Name: Gallery
*/

get_header(); ?>

    <!-- Page Banner -->
    <section class="dnt-page-banner" style="background-image: url('<?php echo esc_url( get_template_directory_uri() . '/assets/img/breadcrumb.jpg' ); ?>');">
        <div class="dnt-container">
            <h1 class="dnt-page-title">গ্যালারি</h1>
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
                <span style="color:var(--dnt-color-gray-300);">গ্যালারি</span>
            </div>
        </div>
    </section>

    <!-- Main Content Section -->
    <section class="dnt-page-section">
        <div class="dnt-container">
            <main class="dnt-page-content" style="width: 100%;">
                <h2 class="dnt-section-heading">
                    <svg viewBox="0 0 24 24" width="24" height="24" fill="currentColor" style="vertical-align: middle; margin-right: 8px;">
                        <path d="M4 4h3l2-2h6l2 2h3c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2zm8 3c-2.76 0-5 2.24-5 5s2.24 5 5 5 5-2.24 5-5-2.24-5-5-5zm0 8c-1.65 0-3-1.35-3-3s1.35-3 3-3 3 1.35 3 3-1.35 3-3 3z"/>
                    </svg>
                    স্থিরচিত্র অ্যালবাম
                </h2>

                <?php
                global $wpdb;
                $table_albums = $wpdb->prefix . 'sms_gallery_albums';
                $table_photos = $wpdb->prefix . 'sms_gallery_photos';

                // Fetch published albums
                $albums = $wpdb->get_results( "SELECT * FROM {$table_albums} WHERE status = 'Published' ORDER BY id DESC" );

                if ( ! empty( $albums ) ) :
                    $categories = array_unique( array_filter( wp_list_pluck( $albums, 'category' ) ) );
                ?>
                    <!-- Category Filters -->
                    <div class="dnt-gallery-filter">
                        <button class="dnt-filter-btn active" data-filter="all">সব অ্যালবাম</button>
                        <?php foreach ( $categories as $cat ) : ?>
                            <button class="dnt-filter-btn" data-filter="<?php echo esc_attr( sanitize_title( $cat ) ); ?>">
                                <?php echo esc_html( $cat ); ?>
                            </button>
                        <?php endforeach; ?>
                    </div>

                    <!-- Album Grid -->
                    <div class="dnt-gallery-grid">
                        <?php foreach ( $albums as $album ) : 
                            $album_id    = absint( $album->id );
                            $photos      = $wpdb->get_results( $wpdb->prepare( "SELECT image_url FROM {$table_photos} WHERE album_id = %d ORDER BY id ASC", $album_id ) );
                            $photo_urls  = wp_list_pluck( $photos, 'image_url' );
                            
                            $cover_image = ! empty( $album->cover_image ) ? $album->cover_image : ( ! empty( $photo_urls[0] ) ? $photo_urls[0] : get_template_directory_uri() . '/assets/img/placeholder.jpg' );
                            $cat_slug    = ! empty( $album->category ) ? sanitize_title( $album->category ) : 'general';
                            
                            // Securely escape JSON string
                            $json_photos = htmlspecialchars( wp_json_encode( array_values( $photo_urls ) ), ENT_QUOTES, 'UTF-8' );
                        ?>
                            <div class="dnt-gallery-item" data-category="<?php echo esc_attr( $cat_slug ); ?>">
                                <div class="dnt-gallery-thumb dnt-open-album" 
                                     style="cursor: pointer;"
                                     data-title="<?php echo esc_attr( $album->title ); ?>" 
                                     data-photos="<?php echo $json_photos; ?>">
                                     
                                    <img src="<?php echo esc_url( $cover_image ); ?>" alt="<?php echo esc_attr( $album->title ); ?>">
                                    <div class="dnt-gallery-overlay">
                                        <span class="dnt-icon-wrapper">
                                            <svg viewBox="0 0 24 24" fill="#fff" width="28" height="28">
                                                <path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="dnt-gallery-info dnt-open-album" 
                                     style="cursor: pointer;" 
                                     data-title="<?php echo esc_attr( $album->title ); ?>" 
                                     data-photos="<?php echo $json_photos; ?>">
                                    <div class="dnt-gallery-title"><?php echo esc_html( $album->title ); ?></div>
                                    <div class="dnt-gallery-tag"><?php echo esc_html( $album->category ?: 'অ্যালবাম' ); ?> (<?php echo count( $photo_urls ); ?>টি ছবি)</div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else : ?>
                    <p class="text-center text-muted py-5">কোনো গ্যালারি অ্যালবাম পাওয়া যায়নি।</p>
                <?php endif; ?>

            </main>
        </div>
    </section>

    <!-- Popup Lightbox Modal Structure -->
    <div id="dntAlbumModal" class="dnt-popup-modal">
        <div class="dnt-popup-backdrop"></div>
        <div class="dnt-popup-dialog">
            <button class="dnt-popup-close" id="dntPopupClose">&times;</button>
            <h3 id="dntPopupTitle" class="dnt-popup-title"></h3>
            
            <div class="dnt-popup-slider">
                <button class="dnt-slide-nav dnt-prev-btn" id="dntSlidePrev">&#10094;</button>
                <div class="dnt-slide-viewport">
                    <img id="dntPopupImg" src="" alt="Album Photo">
                </div>
                <button class="dnt-slide-nav dnt-next-btn" id="dntSlideNext">&#10095;</button>
            </div>
            
            <div class="dnt-slide-counter" id="dntSlideCounter">1 / 1</div>
        </div>
    </div>

    <!-- Isolated Modal CSS Styles -->
    <style>
        .dnt-popup-modal {
            display: none !important;
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            width: 100vw !important;
            height: 100vh !important;
            z-index: 9999999 !important;
            align-items: center !important;
            justify-content: center !important;
        }
        .dnt-popup-modal.is-visible {
            display: flex !important;
        }
        .dnt-popup-backdrop {
            position: absolute !important;
            top: 0 !important;
            left: 0 !important;
            width: 100% !important;
            height: 100% !important;
            background: rgba(0, 0, 0, 0.88) !important;
            backdrop-filter: blur(5px) !important;
        }
        .dnt-popup-dialog {
            position: relative !important;
            z-index: 10 !important;
            width: 90% !important;
            max-width: 850px !important;
            background: #0f172a !important;
            border-radius: 12px !important;
            padding: 24px !important;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7) !important;
            color: #ffffff !important;
            text-align: center !important;
        }
        .dnt-popup-close {
            position: absolute !important;
            top: 12px !important;
            right: 18px !important;
            background: transparent !important;
            border: none !important;
            color: #ffffff !important;
            font-size: 36px !important;
            cursor: pointer !important;
            line-height: 1 !important;
            transition: color 0.2s !important;
        }
        .dnt-popup-close:hover {
            color: #10b981 !important;
        }
        .dnt-popup-title {
            font-size: 1.25rem !important;
            margin-bottom: 20px !important;
            color: #f8fafc !important;
            padding-right: 40px !important;
            font-weight: 600 !important;
        }
        .dnt-popup-slider {
            position: relative !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            min-height: 300px !important;
            max-height: 65vh !important;
        }
        .dnt-slide-viewport {
            width: 100% !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
        }
        .dnt-slide-viewport img {
            max-width: 100% !important;
            max-height: 60vh !important;
            object-fit: contain !important;
            border-radius: 8px !important;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3) !important;
        }
        .dnt-slide-nav {
            position: absolute !important;
            top: 50% !important;
            transform: translateY(-50%) !important;
            background: rgba(15, 23, 42, 0.75) !important;
            color: #ffffff !important;
            border: 1px solid rgba(255, 255, 255, 0.2) !important;
            font-size: 22px !important;
            width: 44px !important;
            height: 44px !important;
            cursor: pointer !important;
            border-radius: 50% !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            transition: all 0.2s !important;
            z-index: 15 !important;
        }
        .dnt-slide-nav:hover {
            background: #006a4e !important;
            border-color: #006a4e !important;
        }
        .dnt-prev-btn { left: 8px !important; }
        .dnt-next-btn { right: 8px !important; }
        .dnt-slide-counter {
            margin-top: 15px !important;
            font-size: 0.95rem !important;
            color: #94a3b8 !important;
            font-weight: 500 !important;
        }
    </style>

    <!-- Modal Execution Script -->
    <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        // Category Filtering
        const filterBtns = document.querySelectorAll('.dnt-filter-btn');
        const galleryItems = document.querySelectorAll('.dnt-gallery-item');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                filterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                const filter = this.getAttribute('data-filter');

                galleryItems.forEach(item => {
                    if (filter === 'all' || item.getAttribute('data-category') === filter) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });

        // Modal Popup Elements
        const modal = document.getElementById('dntAlbumModal');
        const backdrop = document.querySelector('.dnt-popup-backdrop');
        const closeBtn = document.getElementById('dntPopupClose');
        const titleEl = document.getElementById('dntPopupTitle');
        const imgEl = document.getElementById('dntPopupImg');
        const counterEl = document.getElementById('dntSlideCounter');
        const prevBtn = document.getElementById('dntSlidePrev');
        const nextBtn = document.getElementById('dntSlideNext');

        let albumPhotos = [];
        let currentIdx = 0;

        function renderSlide() {
            if (albumPhotos.length > 0) {
                imgEl.src = albumPhotos[currentIdx];
                counterEl.textContent = (currentIdx + 1) + ' / ' + albumPhotos.length;
            }
        }

        // Open Modal Handler
        document.querySelectorAll('.dnt-open-album').forEach(elem => {
            elem.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                const albumTitle = this.getAttribute('data-title');
                const photosAttr = this.getAttribute('data-photos');

                try {
                    albumPhotos = JSON.parse(photosAttr);
                } catch(err) {
                    albumPhotos = [];
                }

                if (!albumPhotos || albumPhotos.length === 0) {
                    alert('এই অ্যালবামে কোনো ছবি পাওয়া যায়নি।');
                    return;
                }

                currentIdx = 0;
                titleEl.textContent = albumTitle;
                renderSlide();
                modal.classList.add('is-visible');
                document.body.style.overflow = 'hidden'; // Stop background scrolling
            });
        });

        function hideModal() {
            modal.classList.remove('is-visible');
            imgEl.src = '';
            document.body.style.overflow = '';
        }

        closeBtn.addEventListener('click', hideModal);
        backdrop.addEventListener('click', hideModal);

        prevBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            if (albumPhotos.length > 0) {
                currentIdx = (currentIdx - 1 + albumPhotos.length) % albumPhotos.length;
                renderSlide();
            }
        });

        nextBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            if (albumPhotos.length > 0) {
                currentIdx = (currentIdx + 1) % albumPhotos.length;
                renderSlide();
            }
        });

        // Keyboard Controls
        document.addEventListener('keydown', function(e) {
            if (!modal.classList.contains('is-visible')) return;
            if (e.key === 'Escape') hideModal();
            if (e.key === 'ArrowLeft') prevBtn.click();
            if (e.key === 'ArrowRight') nextBtn.click();
        });
    });
    </script>

<?php get_footer(); ?>