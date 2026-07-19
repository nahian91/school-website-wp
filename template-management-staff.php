<?php 

/*
Template Name: Staff List
*/

get_header(); ?>
    <!-- 4. PAGE BREADCRUMB BANNER -->
    <section class="dnt-page-banner">
        <div class="dnt-container">
            <h1 class="dnt-page-title">কর্মচারীবৃন্দ</h1>
            <div class="dnt-breadcrumb">
                <a href="index.html"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="currentColor" width="1em" height="1em"><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg> হোম</a> 
                <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" fill="currentColor" width="1em" height="1em" style="font-size:0.8rem; margin:0 5px;"><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg></span> 
                <span>শিক্ষক ও কর্মচারী</span>
                <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" fill="currentColor" width="1em" height="1em" style="font-size:0.8rem; margin:0 5px;"><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg></span> 
                <span style="color:var(--dnt-color-gray-300);">কর্মচারীবৃন্দ</span>
            </div>
        </div>
    </section>

    <!-- 5. MAIN CONTENT -->
    <section class="dnt-page-section">
        <div class="dnt-container">
            
            <!-- Staff Content (Sidebar Removed, Full Width) -->
            <main class="dnt-page-content" style="grid-column: 1 / -1;">
                
                <h2 class="dnt-section-heading"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor" width="1em" height="1em"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg> কর্মচারীবৃন্দ</h2>
                
                <p class="dnt-intro-text">
                    প্রতিষ্ঠানের সার্বিক পরিচ্ছন্নতা, নিরাপত্তা, যাতায়াত এবং দৈনন্দিন আনুষঙ্গিক কাজে সহায়তার জন্য আমাদের রয়েছে একটি বিশ্বস্ত ও পরিশ্রমী কর্মচারী দল। তাদের নিরলস পরিশ্রমে বিদ্যালয় প্রাঙ্গণ সর্বদা পরিপাটি ও নিরাপদ থাকে।
                </p>

                <!-- 3 Columns Each Row -->
                <div class="dnt-staff-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem;">
                    
                    <!-- Staff 1 -->
                    <div class="dnt-staff-card">
                        <div class="dnt-staff-img">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor" width="1em" height="1em"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                        </div>
                        <h3 class="dnt-staff-name">মোঃ আব্দুল লতিফ</h3>
                        <div class="dnt-staff-desig">দপ্তরী (Peon)</div>
                        <div class="dnt-staff-contact">
                            <p><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="1em" height="1em"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg> ০১৭০০-১১০০০১</p>
                            <p><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="1em" height="1em"><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 26.5 21.5 48 48 48H464c26.5 0 48-21.5 48-48V176L281.6 344c-15.2 11.4-36 11.4-51.2 0L0 176z"/></svg> latif@school.edu.bd</p>
                        </div>
                    </div>

                    <!-- Staff 2 -->
                    <div class="dnt-staff-card">
                        <div class="dnt-staff-img">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor" width="1em" height="1em"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                        </div>
                        <h3 class="dnt-staff-name">শ্রী সুবাস চন্দ্র</h3>
                        <div class="dnt-staff-desig">মালী (Gardener)</div>
                        <div class="dnt-staff-contact">
                            <p><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="1em" height="1em"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg> ০১৭০০-১১০০০২</p>
                            <p><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="1em" height="1em"><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 26.5 21.5 48 48 48H464c26.5 0 48-21.5 48-48V176L281.6 344c-15.2 11.4-36 11.4-51.2 0L0 176z"/></svg> subash@school.edu.bd</p>
                        </div>
                    </div>

                    <!-- Staff 3 -->
                    <div class="dnt-staff-card">
                        <div class="dnt-staff-img">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor" width="1em" height="1em"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                        </div>
                        <h3 class="dnt-staff-name">মোঃ রফিকুল ইসলাম</h3>
                        <div class="dnt-staff-desig">প্রধান নৈশপ্রহরী (Chief Guard)</div>
                        <div class="dnt-staff-contact">
                            <p><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="1em" height="1em"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg> ০১৭০০-১১০০০৩</p>
                            <p><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="1em" height="1em"><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 26.5 21.5 48 48 48H464c26.5 0 48-21.5 48-48V176L281.6 344c-15.2 11.4-36 11.4-51.2 0L0 176z"/></svg> rafiqul@school.edu.bd</p>
                        </div>
                    </div>

                    <!-- Staff 4 -->
                    <div class="dnt-staff-card">
                        <div class="dnt-staff-img">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor" width="1em" height="1em"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                        </div>
                        <h3 class="dnt-staff-name">মোসাঃ রহিমা বেগম</h3>
                        <div class="dnt-staff-desig">আয়া (Ayah)</div>
                        <div class="dnt-staff-contact">
                            <p><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="1em" height="1em"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg> ০১৭০০-১১০০০৪</p>
                            <p><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="1em" height="1em"><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 26.5 21.5 48 48 48H464c26.5 0 48-21.5 48-48V176L281.6 344c-15.2 11.4-36 11.4-51.2 0L0 176z"/></svg> rahima@school.edu.bd</p>
                        </div>
                    </div>
                    
                    <!-- Staff 5 -->
                    <div class="dnt-staff-card">
                        <div class="dnt-staff-img">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor" width="1em" height="1em"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                        </div>
                        <h3 class="dnt-staff-name">মোঃ জয়নাল আবেদীন</h3>
                        <div class="dnt-staff-desig">নিরাপত্তাকর্মী (Security Guard)</div>
                        <div class="dnt-staff-contact">
                            <p><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="1em" height="1em"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg> ০১৭০০-১১০০০৫</p>
                            <p><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="1em" height="1em"><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 26.5 21.5 48 48 48H464c26.5 0 48-21.5 48-48V176L281.6 344c-15.2 11.4-36 11.4-51.2 0L0 176z"/></svg> joynal@school.edu.bd</p>
                        </div>
                    </div>

                    <!-- Staff 6 -->
                    <div class="dnt-staff-card">
                        <div class="dnt-staff-img">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor" width="1em" height="1em"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                        </div>
                        <h3 class="dnt-staff-name">শ্রী হরিদাস</h3>
                        <div class="dnt-staff-desig">পরিচ্ছন্নতাকর্মী (Cleaner)</div>
                        <div class="dnt-staff-contact">
                            <p><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="1em" height="1em"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg> ০১৭০০-১১০০০৬</p>
                            <p><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="1em" height="1em"><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 26.5 21.5 48 48 48H464c26.5 0 48-21.5 48-48V176L281.6 344c-15.2 11.4-36 11.4-51.2 0L0 176z"/></svg> haridas@school.edu.bd</p>
                        </div>
                    </div>

                    <!-- Staff 7 -->
                    <div class="dnt-staff-card">
                        <div class="dnt-staff-img">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor" width="1em" height="1em"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                        </div>
                        <h3 class="dnt-staff-name">মোঃ শওকত আলী</h3>
                        <div class="dnt-staff-desig">স্কুল বাস চালক (Bus Driver)</div>
                        <div class="dnt-staff-contact">
                            <p><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="1em" height="1em"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg> ০১৭০০-১১০০০৭</p>
                            <p><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="1em" height="1em"><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 26.5 21.5 48 48 48H464c26.5 0 48-21.5 48-48V176L281.6 344c-15.2 11.4-36 11.4-51.2 0L0 176z"/></svg> shawkat@school.edu.bd</p>
                        </div>
                    </div>

                    <!-- Staff 8 -->
                    <div class="dnt-staff-card">
                        <div class="dnt-staff-img">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor" width="1em" height="1em"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                        </div>
                        <h3 class="dnt-staff-name">মোঃ বিল্লাল হোসেন</h3>
                        <div class="dnt-staff-desig">বাস হেলপার (Bus Helper)</div>
                        <div class="dnt-staff-contact">
                            <p><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="1em" height="1em"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg> ০১৭০০-১১০০০৮</p>
                            <p><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="1em" height="1em"><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 26.5 21.5 48 48 48H464c26.5 0 48-21.5 48-48V176L281.6 344c-15.2 11.4-36 11.4-51.2 0L0 176z"/></svg> billal@school.edu.bd</p>
                        </div>
                    </div>

                    <!-- Staff 9 -->
                    <div class="dnt-staff-card">
                        <div class="dnt-staff-img">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor" width="1em" height="1em"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                        </div>
                        <h3 class="dnt-staff-name">মোসাঃ ফাতেমা আক্তার</h3>
                        <div class="dnt-staff-desig">আয়া (Ayah)</div>
                        <div class="dnt-staff-contact">
                            <p><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="1em" height="1em"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg> ০১৭০০-১১০০০৯</p>
                            <p><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="1em" height="1em"><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 26.5 21.5 48 48 48H464c26.5 0 48-21.5 48-48V176L281.6 344c-15.2 11.4-36 11.4-51.2 0L0 176z"/></svg> fatema.ayah@school.edu.bd</p>
                        </div>
                    </div>

                </div>

            </main>

        </div>
    </section>

    <?php get_footer();?>