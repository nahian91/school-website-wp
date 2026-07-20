<?php 

/*
Template Name: Biology Lab
*/

get_header(); ?>
    <!-- ৪. পেজ ব্যানার ও ব্রেডক্রাম্ব -->
    <section class="dnt-page-banner" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/img/breadcrumb.jpg');">
        <div class="dnt-container">
            <h1 class="dnt-page-title">বায়োলজি ল্যাব</h1>
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
                <span style="color:var(--dnt-color-gray-300);">বায়োলজি ল্যাব</span>
            </div>
        </div>
    </section>

    <!-- ৫. মেইন কন্টেন্ট সেকশন -->
    <section class="dnt-page-section">
        <div class="dnt-container dnt-page-grid">
            
            <!-- বাম পাশ: ল্যাবরেটরি কন্টেন্ট -->
            <main class="dnt-page-content">
                <div class="dnt-lab-banner-img">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="1em" height="1em"><path d="M512 32c0-17.7-14.3-32-32-32C284.4 0 128 156.4 128 352v64H64c-17.7 0-32 14.3-32 32s14.3 32 32 32h192c17.7 0 32-14.3 32-32s-14.3-32-32-32H192v-64c0-170.8 127.9-312 288-320z"/></svg>
                    <span>জীববিজ্ঞান ল্যাব ভিউ প্লেসহোল্ডার</span>
                </div>

                <h2 class="dnt-section-heading"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="1em" height="1em"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg> ল্যাব পরিচিতি</h2>
                <p class="dnt-intro-text">
                    শিক্ষার্থীদের উদ্ভিদ ও প্রাণিবিজ্ঞান সম্পর্কে বাস্তব ও প্রায়োগিক জ্ঞান প্রদানের জন্য আমাদের রয়েছে একটি সুসজ্জিত জীববিজ্ঞান ল্যাবরেটরি। এখানে মাধ্যমিক ও উচ্চ মাধ্যমিক স্তরের পাঠ্যসূচি অনুযায়ী কোষ বিভাজন, টিস্যু, শারীরবৃত্তীয় প্রক্রিয়া এবং বিভিন্ন নমুনা পর্যবেক্ষণের জন্য উন্নতমানের অণুবীক্ষণ যন্ত্র, স্থায়ী স্লাইড ও রাসায়নিক উপকরণ রয়েছে। স্বাস্থ্যসম্মত ও খোলামেলা পরিবেশে শিক্ষার্থীরা স্বাচ্ছন্দ্যে তাদের ব্যবহারিক কাজ সম্পন্ন করতে পারে।
                </p>

                <h2 class="dnt-section-heading"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="1em" height="1em"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg> প্রধান যন্ত্রপাতি ও নমুনা</h2>
                <div class="dnt-instrument-grid">
                    <div class="dnt-instrument-card">
                        <div class="dnt-ins-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="1em" height="1em"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg></div>
                        <div class="dnt-ins-info">
                            <h4>অণুবীক্ষণ যন্ত্র ও স্লাইড</h4>
                            <p>উদ্ভিদ কোষ, প্রাণী কোষ, ব্যাকটেরিয়া এবং বিভিন্ন অণুজীব সূক্ষ্মভাবে পর্যবেক্ষণের জন্য ব্যবহৃত।</p>
                        </div>
                    </div>
                    <div class="dnt-instrument-card">
                        <div class="dnt-ins-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor" width="1em" height="1em"><path d="M128 0c-35.3 0-64 28.7-64 64c0 22.8 12 42.9 30.1 54.3L37.8 243.6C13.8 259 0 285.8 0 314v4c0 35.3 28.7 64 64 64c22.8 0 42.9-12 54.3-30.1L243.6 408.2C259 432.2 285.8 446 314 446h4c35.3 0 64-28.7 64-64c0-22.8-12-42.9-30.1-54.3L408.2 202.4C432.2 187 446 160.2 446 132v-4c0-35.3-28.7-64-64-64c-22.8 0-42.9 12-54.3 30.1L202.4 37.8C187 13.8 160.2 0 132 0h-4z"/></svg></div>
                        <div class="dnt-ins-info">
                            <h4>মডেল ও থ্রিডি চার্ট</h4>
                            <p>মানব কঙ্কালতন্ত্র, হৃৎপিণ্ড, মস্তিষ্ক এবং উদ্ভিদের বিভিন্ন অংশের নিখুঁত মডেল ও চার্ট।</p>
                        </div>
                    </div>
                    <div class="dnt-instrument-card">
                        <div class="dnt-ins-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor" width="1em" height="1em"><path d="M287.6 248.8L377.9 380c5.9 8.6 9 18.7 9 28.9c0 29.5-23.9 53.3-53.3 53.3H114.3c-29.5 0-53.3-23.9-53.3-53.3c0-10.3 3.1-20.4 9-28.9l90.3-131.2V64h-16c-8.8 0-16-7.2-16-16V16c0-8.8 7.2-16 16-16h160c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16h-16v184.8z"/></svg></div>
                        <div class="dnt-ins-info">
                            <h4>সংরক্ষিত নমুনা (Specimens)</h4>
                            <p>বিভিন্ন পর্বের প্রাণী এবং বিরল প্রজাতির উদ্ভিদের ফর্মালিনে সংরক্ষিত অসংখ্য বাস্তব নমুনা।</p>
                        </div>
                    </div>
                    <div class="dnt-instrument-card">
                        <div class="dnt-ins-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" fill="currentColor" width="1em" height="1em"><path d="M256 0c17.7 0 32 14.3 32 32V64H96V32c0-17.7 14.3-32 32-32H256zM96 96H288V281.3c0 8.5 3.4 16.6 9.4 22.6l45.3 45.3c35.6 35.6 35.6 93.4 0 128.9S249.2 513.7 213.7 478.1L168.4 432.8c-6-6-9.4-14.1-9.4-22.6V96zm128 300.7c26.5 0 48-21.5 48-48s-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48z"/></svg></div>
                        <div class="dnt-ins-info">
                            <h4>ডিসেকশন বক্স ও ট্রে</h4>
                            <p>ব্যবহারিক ক্লাসে ব্যবচ্ছেদ (Dissection) করার জন্য প্রয়োজনীয় ব্লেড, কাঁচি, চিমটা ও বোর্ড।</p>
                        </div>
                    </div>
                </div>

                <h2 class="dnt-section-heading"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="1em" height="1em"><path d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480H40c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24V296c0 13.3 10.7 24 24 24s24-10.7 24-24V184c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"/></svg> ল্যাবরেটরির নিয়মাবলী ও সতর্কতা</h2>
                <ul class="dnt-rules-list">
                    <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="1em" height="1em"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg> ল্যাবে প্রবেশের পূর্বে অবশ্যই ল্যাব এপ্রোন (Lab Apron) পরিধান করতে হবে।</li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="1em" height="1em"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg> অণুবীক্ষণ যন্ত্র সাবধানে ব্যবহার করতে হবে এবং কাজ শেষে লেন্স সঠিকভাবে পরিষ্কার রাখতে হবে।</li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="1em" height="1em"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg> সংরক্ষিত নমুনা বা রাসায়নিক তরল (যেমন ফর্মালিন) শিক্ষকের অনুমতি ব্যতীত সরাসরি স্পর্শ করা নিষেধ।</li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="1em" height="1em"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg> ডিসেকশনের যন্ত্রপাতি (ব্লেড, স্কালপেল ইত্যাদি) ব্যবহারের সময় যেন আঘাত না লাগে সেদিকে সর্বোচ্চ সতর্কতা অবলম্বন করতে হবে।</li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="1em" height="1em"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg> পরীক্ষা শেষে স্লাইড, যন্ত্রপাতি এবং টেবিল পরিষ্কার করে নির্দিষ্ট স্থানে গুছিয়ে রাখতে হবে এবং সাবান দিয়ে হাত ধুয়ে নিতে হবে।</li>
                </ul>
            </main>

            <?php get_sidebar();?>

        </div>
    </section>

    <?php get_footer();?>