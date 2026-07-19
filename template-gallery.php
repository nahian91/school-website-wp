<?php 

/*
Template Name: Gallery
*/

get_header(); ?>

    <!-- ৪. পেজ ব্যানার ও ব্রেডক্রাম্ব -->
    <section class="dnt-page-banner" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/img/breadcrumb.jpg');">
        <div class="dnt-container">
            <h1 class="dnt-page-title">গ্যালারি</h1>
            <div class="dnt-breadcrumb">
                <a href="<?php echo site_url();?>">
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

    <!-- ৫. মেইন কন্টেন্ট সেকশন -->
    <section class="dnt-page-section">
        <!-- ফুল উইডথ কন্টেইনার -->
        <div class="dnt-container">
            
            <!-- ফটো গ্যালারি গ্রিড (Full Width) -->
            <main class="dnt-page-content" style="width: 100%;">
                <h2 class="dnt-section-heading">
                    <svg viewBox="0 0 24 24" width="24" height="24" fill="currentColor" style="vertical-align: middle; margin-right: 8px;">
                        <path d="M4 4h3l2-2h6l2 2h3c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2zm8 3c-2.76 0-5 2.24-5 5s2.24 5 5 5 5-2.24 5-5-2.24-5-5-5zm0 8c-1.65 0-3-1.35-3-3s1.35-3 3-3 3 1.35 3 3-1.35 3-3 3z"/>
                    </svg>
                    স্থিরচিত্র অ্যালবাম
                </h2>
                
                <!-- ক্যাটাগরি ফিল্টার বাটনসমূহ -->
                <div class="dnt-gallery-filter">
                    <button class="dnt-filter-btn active">সব ছবি</button>
                    <button class="dnt-filter-btn">ক্যাম্পাস ভিউ</button>
                    <button class="dnt-filter-btn">ক্রীড়া প্রতিযোগিতা</button>
                    <button class="dnt-filter-btn">সাংস্কৃতিক অনুষ্ঠান</button>
                    <button class="dnt-filter-btn">পুরস্কার বিতরণী</button>
                </div>

                <!-- ছবির গ্রিড লেআউট (৯টি আইটেম) -->
                <div class="dnt-gallery-grid">
                    
                    <!-- আইটেম ১ -->
                    <div class="dnt-gallery-item">
                        <div class="dnt-gallery-thumb">
                            <img src="https://images.unsplash.com/photo-1541829070764-84a7d30dd3f3?q=80&w=800&auto=format&fit=crop" alt="Gallery Image 1">
                            <div class="dnt-gallery-overlay"><a href="#"><svg viewBox="0 0 24 24" fill="#fff"><path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg></a></div>
                        </div>
                        <div class="dnt-gallery-info"><div class="dnt-gallery-title">মূল একাডেমিক ভবন</div><div class="dnt-gallery-tag">ক্যাম্পাস</div></div>
                    </div>

                    <!-- আইটেম ২ -->
                    <div class="dnt-gallery-item">
                        <div class="dnt-gallery-thumb">
                            <img src="https://images.unsplash.com/photo-1523580494112-071d38458a5c?q=80&w=800&auto=format&fit=crop" alt="Gallery Image 2">
                            <div class="dnt-gallery-overlay"><a href="#"><svg viewBox="0 0 24 24" fill="#fff"><path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg></a></div>
                        </div>
                        <div class="dnt-gallery-info"><div class="dnt-gallery-title">পুরস্কার বিতরণী পর্ব</div><div class="dnt-gallery-tag">পুরস্কার</div></div>
                    </div>

                    <!-- আইটেম ৩ -->
                    <div class="dnt-gallery-item">
                        <div class="dnt-gallery-thumb">
                            <img src="https://images.unsplash.com/photo-1461896836934-ffe607ba8211?q=80&w=800&auto=format&fit=crop" alt="Gallery Image 3">
                            <div class="dnt-gallery-overlay"><a href="#"><svg viewBox="0 0 24 24" fill="#fff"><path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg></a></div>
                        </div>
                        <div class="dnt-gallery-info"><div class="dnt-gallery-title">বার্ষিক ক্রীড়া প্রতিযোগিতা</div><div class="dnt-gallery-tag">ক্রীড়া</div></div>
                    </div>

                    <!-- আইটেম ৪ -->
                    <div class="dnt-gallery-item">
                        <div class="dnt-gallery-thumb">
                            <img src="https://images.unsplash.com/photo-1514525253161-7a46d19cd819?q=80&w=800&auto=format&fit=crop" alt="Gallery Image 4">
                            <div class="dnt-gallery-overlay"><a href="#"><svg viewBox="0 0 24 24" fill="#fff"><path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg></a></div>
                        </div>
                        <div class="dnt-gallery-info"><div class="dnt-gallery-title">সাংস্কৃতিক অনুষ্ঠান</div><div class="dnt-gallery-tag">সাংস্কৃতিক</div></div>
                    </div>

                    <!-- আইটেম ৫ -->
                    <div class="dnt-gallery-item">
                        <div class="dnt-gallery-thumb">
                            <img src="https://images.unsplash.com/photo-1564069114553-7215e1ff1890?q=80&w=800&auto=format&fit=crop" alt="Gallery Image 5">
                            <div class="dnt-gallery-overlay"><a href="#"><svg viewBox="0 0 24 24" fill="#fff"><path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg></a></div>
                        </div>
                        <div class="dnt-gallery-info"><div class="dnt-gallery-title">বিজ্ঞান মেলা প্রদর্শন</div><div class="dnt-gallery-tag">বিজ্ঞান</div></div>
                    </div>

                    <!-- আইটেম ৬ -->
                    <div class="dnt-gallery-item">
                        <div class="dnt-gallery-thumb">
                            <img src="https://images.unsplash.com/photo-1518605368461-1d3ce08ce006?q=80&w=800&auto=format&fit=crop" alt="Gallery Image 6">
                            <div class="dnt-gallery-overlay"><a href="#"><svg viewBox="0 0 24 24" fill="#fff"><path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg></a></div>
                        </div>
                        <div class="dnt-gallery-info"><div class="dnt-gallery-title">ফুটবল টুর্নামেন্ট ফাইনাল</div><div class="dnt-gallery-tag">ক্রীড়া</div></div>
                    </div>

                    <!-- আইটেম ৭ -->
                    <div class="dnt-gallery-item">
                        <div class="dnt-gallery-thumb">
                            <img src="https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?q=80&w=800&auto=format&fit=crop" alt="Gallery Image 7">
                            <div class="dnt-gallery-overlay"><a href="#"><svg viewBox="0 0 24 24" fill="#fff"><path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg></a></div>
                        </div>
                        <div class="dnt-gallery-info"><div class="dnt-gallery-title">গ্রন্থাগার পরিদর্শন</div><div class="dnt-gallery-tag">লাইব্রেরি</div></div>
                    </div>

                    <!-- আইটেম ৮ -->
                    <div class="dnt-gallery-item">
                        <div class="dnt-gallery-thumb">
                            <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?q=80&w=800&auto=format&fit=crop" alt="Gallery Image 8">
                            <div class="dnt-gallery-overlay"><a href="#"><svg viewBox="0 0 24 24" fill="#fff"><path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg></a></div>
                        </div>
                        <div class="dnt-gallery-info"><div class="dnt-gallery-title">শ্রেণিকক্ষ শিক্ষা কার্যক্রম</div><div class="dnt-gallery-tag">শিক্ষা</div></div>
                    </div>

                    <!-- আইটেম ৯ -->
                    <div class="dnt-gallery-item">
                        <div class="dnt-gallery-thumb">
                            <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=800&auto=format&fit=crop" alt="Gallery Image 9">
                            <div class="dnt-gallery-overlay"><a href="#"><svg viewBox="0 0 24 24" fill="#fff"><path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg></a></div>
                        </div>
                        <div class="dnt-gallery-info"><div class="dnt-gallery-title">শিক্ষক ও শিক্ষার্থীদের মিলনমেলা</div><div class="dnt-gallery-tag">অন্যান্য</div></div>
                    </div>

                </div>
            </main>

        </div>
    </section>

<?php get_footer(); ?>