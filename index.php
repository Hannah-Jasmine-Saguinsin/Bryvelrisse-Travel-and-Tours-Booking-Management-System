<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Search Bar JS-->
    <script src="searchbar.js" defer></script>

    <!--Home Page JS-->
    <script src="home.js" defer></script>
    <script src="navbar.js" defer></script>
    
    <!-- Global CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Navbar CSS -->
    <link rel="stylesheet" href="navbar.css">

    <!-- Home Page CSS -->
    <link rel="stylesheet" href="home.css">

    <!--Search Bar CSS-->
    <link rel="stylesheet" href="searchbar.css">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/6a1f3f4237.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Home | Bryvelrisse Travel and Tours</title>
</head>

<body>

    <!-- Navbar -->
    <nav class="navigation">
        <a href="index.html" class="logo"><img src="assets/Bryvelrisse-Logo.png" alt="Bryvelrisse Travel and Tours brand mark with mountain sun airplane and palm tree" style="height: 60px; width: auto;"></a>
        <div class="nav-links">
            <a href="index.html">Home</a>
            <a href="destinations.html">Destinations</a>
            <a href="about.html">About</a>
            <a href="contact.html">Contact</a>
            <a href="booking.html" class="btn-booking">
                <i class="fa-solid fa-plane nav-icon" aria-hidden="true"></i>
                Booking
            </a>
            <a href="login.html" class="btn-login">
                <i class="fa-solid fa-user nav-icon" aria-hidden="true"></i>
                Sign In
            </a>
        </div>
        <button class="menu-toggle" type="button" aria-label="Toggle navigation" aria-expanded="false">
            <i class="fa-solid fa-bars"></i>
        </button>
    </nav>

    <!-- Hero -->
    <div class="hero-section" id="section-1">
        <div class="hero-content">
            <h1>Bryvelrisse Travel and Tours</h1>
            <h2>WANDER TO WONDER</h2>
            <p>
                Thoughtfully crafted journeys designed to turn travel
                dreams into unforgettable experiences.
            </p>
        </div>

        <div class="btn-hero">
            <a href="destinations.html" class="btn-1">
                <i class="fa-regular fa-compass"></i>
                Explore Now
            </a>
            <a href="contact.html" class="btn-2">Plan your journey</a>
        </div>
        <!--Search Bar-->
        <div class="search-bar" role="search" aria-label="Destination search">

            <!-- WHERE TO -->
            <div class="search-box" id="destination-box" tabindex="0">
                <i class="fa-solid fa-location-dot search-box__icon"></i>
                <div class="text">
                    <span class="title">Where To?</span>
                    <span class="subtitle">Search for your Destination</span>
                    <input
                        type="text"
                        id="destination-input"
                        class="search-input"
                        placeholder="Type Destination..."
                        autocomplete="off"
                        aria-label="Search destination"
                        aria-controls="suggestions"
                    >
                    <div class="suggestions" id="suggestions" role="listbox" aria-label="Destination suggestions"></div>
                </div>
            </div>

            <!-- WHEN TO -->
            <div class="search-box" id="date-box" tabindex="0">
                <i class="fa-regular fa-calendar search-box__icon"></i>
                <div class="text">
                    <span class="title">When To?</span>
                    <span class="subtitle">Select Preferred Dates</span>
                    <div class="date-display" id="date-display">
                        <input
                            type="text"
                            id="date-input"
                            class="date-input"
                            placeholder="Choose available date"
                            autocomplete="off"
                            readonly
                            aria-label="Travel date"
                        >
                        <button
                            type="button"
                            class="date-display__trigger"
                            id="date-trigger"
                            aria-label="Open calendar"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            <i class="fa-regular fa-calendar"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- WHO -->
            <div class="search-box" id="people-box" tabindex="0">
                <i class="fa-solid fa-user search-box__icon"></i>
                <div class="text">
                    <span class="title">Who?</span>
                    <span class="subtitle">People Included</span>
                    <div class="people-display" id="people-display" role="button" aria-haspopup="true">
                        <i class="fa-solid fa-users people-display__icon"></i>
                        <span id="people-label">1 adult</span>
                        <i class="fa-solid fa-chevron-down people-display__arrow"></i>
                    </div>
                </div>

                <div class="people-dropdown" id="people-dropdown" role="dialog" aria-label="People selector">
                    <div class="people-row">
                        <div>
                            <span class="people-row__label">Adult</span>
                            <span class="people-row__sub">Ages 18 above</span>
                        </div>
                        <div class="people-counter">
                            <button class="counter-btn" id="adult-dec" type="button" aria-label="Decrease adults">−</button>
                            <span class="counter-val" id="adult-count">1</span>
                            <button class="counter-btn" id="adult-inc" type="button" aria-label="Increase adults">+</button>
                        </div>
                    </div>
                    <div class="people-row">
                        <div>
                            <span class="people-row__label">Children</span>
                            <span class="people-row__sub">Ages 0–17</span>
                        </div>
                        <div class="people-counter">
                            <button class="counter-btn" id="child-dec" type="button" aria-label="Decrease children">−</button>
                            <span class="counter-val" id="child-count">0</span>
                            <button class="counter-btn" id="child-inc" type="button" aria-label="Increase children">+</button>
                        </div>
                    </div>
                </div>
            </div>

            <button class="search-btn" id="search-button" type="button" aria-label="Search destinations">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>

        </div>

        <!--End of Search Bar-->
    </div>

    <!-- Packages -->
    <section class="package-gallery" id="packages">
        <div class="section-header">
            <h3>Explore Our Packages</h3>
            <p class="section-subtitle">Handpicked destinations crafted just for you</p>
        </div>

        <div class="gallery-scroll-area">
            <button class="gallery-arrow gallery-arrow--left" id="galleryLeft" aria-label="Scroll left">
                <i class="fa-solid fa-chevron-left"></i>
            </button>

            <div class="gallery-track" id="galleryTrack">
                <!-- Card 1 Packages-->
                <div class="pkg-card" data-title="South Korea" data-img="assets/packages-korea1.jpg">
                    <div class="pkg-card__img-wrap">
                        <img src="assets/packages-korea1.jpg" alt="South Korea" loading="lazy">
                        <div class="pkg-card__overlay">
                            <i class="fa-solid fa-magnifying-glass-plus"></i>
                        </div>
                    </div>
                    <div class="pkg-card__info">
                        <span class="pkg-card__tag">Culture</span>
                        <h4>South Korea - Manila Departure</h4>
                        <p>Discover K-culture, scenic spots, and vibrant city life with a convenient Manila departure.</p>
                    </div>
                </div>
                <!-- Card 2 Packages-->
                <div class="pkg-card" data-title="South Korea" data-img="assets/packages-korea2.jpg">
                    <div class="pkg-card__img-wrap">
                        <img src="assets/packages-korea2.jpg" alt="South Korea" loading="lazy">
                        <div class="pkg-card__overlay">
                            <i class="fa-solid fa-magnifying-glass-plus"></i>
                        </div>
                    </div>
                    <div class="pkg-card__info">
                        <span class="pkg-card__tag">Culture</span>
                        <h4>South Korea - Cebu Departure</h4>
                        <p>Enjoy the best of Korea’s modern cities and traditional charm with an easy Cebu departure.</p>
                    </div>
                </div>
                <!-- Card 3 Packages -->
                <div class="pkg-card" data-title="Shanghai, China" data-img="assets/packages-shanghai.jpg">
                    <div class="pkg-card__img-wrap">
                        <img src="assets/packages-shanghai.jpg" alt="Shanghai, China" loading="lazy">
                        <div class="pkg-card__overlay">
                            <i class="fa-solid fa-magnifying-glass-plus"></i>
                        </div>
                    </div>
                    <div class="pkg-card__info">
                        <span class="pkg-card__tag">Modernity</span>
                        <h4>Shanghai, China</h4>
                        <p>Experience a dynamic city where futuristic skylines meet rich cultural heritage.</p>
                    </div>
                </div>
                <!-- Card 4 Packages -->
                <div class="pkg-card" data-title="Taiwan" data-img="assets/packages-taiwan.jpg">
                    <div class="pkg-card__img-wrap">
                        <img src="assets/packages-taiwan.jpg" alt="Taiwan" loading="lazy">
                        <div class="pkg-card__overlay">
                            <i class="fa-solid fa-magnifying-glass-plus"></i>
                        </div>
                    </div>
                    <div class="pkg-card__info">
                        <span class="pkg-card__tag">Top Spots</span>
                        <h4>Taiwan</h4>
                        <p>Explore popular attractions, vibrant night markets, and must-visit scenic destinations.</p>
                    </div>
                </div>
                <!-- Card 5 Packages -->
                <div class="pkg-card" data-title="Hongkong" data-img="assets/packages-hongkong.jpg">
                    <div class="pkg-card__img-wrap">
                        <img src="assets/packages-hongkong.jpg" alt="Hongkong" loading="lazy">
                        <div class="pkg-card__overlay">
                            <i class="fa-solid fa-magnifying-glass-plus"></i>
                        </div>
                    </div>
                    <div class="pkg-card__info">
                        <span class="pkg-card__tag">City Life</span>
                        <h4>Hongkong</h4>
                        <p>Explore iconic skylines, shopping hubs, and world-class entertainment.</p>
                    </div>
                </div>
                <!-- Card 6 Packages -->
                <div class="pkg-card" data-title="Singapore" data-img="assets/packages-singapore.jpg">
                    <div class="pkg-card__img-wrap">
                        <img src="assets/packages-singapore.jpg" alt="Singapore" loading="lazy">
                        <div class="pkg-card__overlay">
                            <i class="fa-solid fa-magnifying-glass-plus"></i>
                        </div>
                    </div>
                    <div class="pkg-card__info">
                        <span class="pkg-card__tag">City</span>
                        <h4>Singapore</h4>
                        <p>Enjoy a clean, modern city filled with attractions and multicultural experiences.</p>
                    </div>
                </div>
                <!-- Card 7 Packages -->
                <div class="pkg-card" data-title="Thailand" data-img="assets/packages-thailand.jpg">
                    <div class="pkg-card__img-wrap">
                        <img src="assets/packages-thailand.jpg" alt="Thailand" loading="lazy">
                        <div class="pkg-card__overlay">
                            <i class="fa-solid fa-magnifying-glass-plus"></i>
                        </div>
                    </div>
                    <div class="pkg-card__info">
                        <span class="pkg-card__tag">Adventure</span>
                        <h4>Thailand</h4>
                        <p>Dive into vibrant street markets, temples, and tropical escapes.</p>
                    </div>
                </div>
                <!-- Card 8 Packages -->
                <div class="pkg-card" data-title="Japan" data-img="assets/packages-japan.jpg">
                    <div class="pkg-card__img-wrap">
                        <img src="assets/packages-japan.jpg" alt="Japan" loading="lazy">
                        <div class="pkg-card__overlay">
                            <i class="fa-solid fa-magnifying-glass-plus"></i>
                        </div>
                    </div>
                    <div class="pkg-card__info">
                        <span class="pkg-card__tag">Tradition</span>
                        <h4>Japan</h4>
                        <p>Discover a perfect blend of ancient traditions and cutting-edge technology.</p>
                    </div>
                </div>
                <!-- Card 9 Packages -->
                <div class="pkg-card" data-title="Batanes, Philippines" data-img="assets/packages-batanes.jpg">
                    <div class="pkg-card__img-wrap">
                        <img src="assets/packages-batanes.jpg" alt="Batanes" loading="lazy">
                        <div class="pkg-card__overlay">
                            <i class="fa-solid fa-magnifying-glass-plus"></i>
                        </div>
                    </div>
                    <div class="pkg-card__info">
                        <span class="pkg-card__tag">Nature</span>
                        <h4>Batanes, Philippines</h4>
                        <p>Relax in peaceful rolling hills, dramatic cliffs, and untouched beauty.</p>
                    </div>
                </div>
                <!-- Card 10 Packages -->
                <div class="pkg-card" data-title="El Nido, Philippines" data-img="assets/packages-el-nido.jpg">
                    <div class="pkg-card__img-wrap">
                        <img src="assets/packages-el-nido.jpg" alt="El Nido, Philippines" loading="lazy">
                        <div class="pkg-card__overlay">
                            <i class="fa-solid fa-magnifying-glass-plus"></i>
                        </div>
                    </div>
                    <div class="pkg-card__info">
                        <span class="pkg-card__tag">Islands</span>
                        <h4>El Nido, Philippines</h4>
                        <p>Explore crystal-clear lagoons and breathtaking limestone formations.</p>
                    </div>
                </div>
                <!-- Card 11 Packages -->
                <div class="pkg-card" data-title="Siargao, Philippines" data-img="assets/packages-siargao.jpg">
                    <div class="pkg-card__img-wrap">
                        <img src="assets/packages-siargao.jpg" alt="Siargao, Philippines" loading="lazy">
                        <div class="pkg-card__overlay">
                            <i class="fa-solid fa-magnifying-glass-plus"></i>
                        </div>
                    </div>
                    <div class="pkg-card__info">
                        <span class="pkg-card__tag">Beach</span>
                        <h4>Siargao, Philippines</h4>
                        <p>Experience laid-back island vibes and world-famous waves.</p>
                    </div>
                </div>
                <!-- Card 12 Packages -->
                <div class="pkg-card" data-title="Iloilo, Philippines" data-img="assets/packages-iloilo.jpg">
                    <div class="pkg-card__img-wrap">
                        <img src="assets/packages-iloilo.jpg" alt="Iloilo, Philippines" loading="lazy">
                        <div class="pkg-card__overlay">
                            <i class="fa-solid fa-magnifying-glass-plus"></i>
                        </div>
                    </div>
                    <div class="pkg-card__info">
                        <span class="pkg-card__tag">Heritage</span>
                        <h4>Iloilo, Philippines</h4>
                        <p>Enjoy historic sites, local cuisine, and a calm riverside atmosphere.</p>
                    </div>
                </div>
            </div>
            
            <button class="gallery-arrow gallery-arrow--right" id="galleryRight" aria-label="Scroll right">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
    </section>

    <div class="pkg-modal" id="pkgModal" role="dialog" aria-modal="true" aria-label="Package preview">
        <div class="pkg-modal__backdrop" id="modalBackdrop"></div>
        <div class="pkg-modal__box">
            <button class="pkg-modal__close" id="modalClose" aria-label="Close modal">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <img src="" id="modalImg" alt="" class="pkg-modal__img">
            <div class="pkg-modal__caption" id="modalCaption"></div>
        </div>
    </div>

    <!-- Why Choose Us -->
    <section class="why-choose-us" id="why-us">
        <div class="section-header">
            <h3>Why Choose Us</h3>
            <p class="section-subtitle">The values that drive every journey we plan</p>
        </div>

        <div class="values-grid">
            <div class="value-card fade-in-up">
                <div class="value-card__icon">🎯</div>
                <h4>Personalization</h4>
                <p>We believe every traveler is unique. We design travel packages that reflect individual preferences, goals, and non-negotiables.</p>
            </div>

            <div class="value-card fade-in-up">
                <div class="value-card__icon">😊</div>
                <h4>Customer Satisfaction</h4>
                <p>Client happiness is our top priority. We strive to exceed expectations in every trip we organize.</p>
            </div>

            <div class="value-card fade-in-up">
                <div class="value-card__icon">🤝</div>
                <h4>Integrity</h4>
                <p>We operate with honesty, transparency, and professionalism in all transactions.</p>
            </div>

            <div class="value-card fade-in-up">
                <div class="value-card__icon">✈️</div>
                <h4>Passion for Travel</h4>
                <p>Our love for travel drives us to continuously explore, learn, and improve our services.</p>
            </div>

            <div class="value-card fade-in-up">
                <div class="value-card__icon">⭐</div>
                <h4>Excellence in Service</h4>
                <p>We are committed to delivering quality service with attention to detail and care.</p>
            </div>

            <div class="value-card fade-in-up">
                <div class="value-card__icon">💰</div>
                <h4>Budget Friendly</h4>
                <p>We make dream travel accessible. Great experiences don't have to break the bank.</p>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials-slider" id="testimonials">
        <div class="section-header">
            <h3>What Travellers Say</h3>
            <p class="section-subtitle">Real stories from real adventurers</p>
        </div>

        <div class="slider-container">
            <button class="slider-btn slider-btn--prev" id="sliderPrev" aria-label="Previous testimonial">
                <i class="fa-solid fa-chevron-left"></i>
            </button>

            <div class="slider-track-wrap">
                <div class="slider-track" id="sliderTrack">
                    <div class="testimonial-slide">
                        <div class="testi-card">
                            <div class="testi-stars">⭐⭐⭐⭐⭐</div>
                            <blockquote>
                                "Super smooth and hassle-free experience! From March 31 to April 1, everything was already arranged for us. Yung mga flights, hotel, tours, and transfers. As a family, sobrang dali lang namin nag-enjoy without worrying about anything. Highly recommended for families!"
                            </blockquote>
                            <div class="testi-footer">
                                <div class="testi-avatar">MF</div>
                                <div>
                                    <cite class="testi-name">Magsipoc Family</cite>
                                    <span class="testi-detail">Family Travel &middot; Boracay, Philippines</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-slide">
                        <div class="testi-card">
                            <div class="testi-stars">⭐⭐⭐⭐⭐</div>
                            <blockquote>
                                "As a first-time traveler kasama ko pa girlfriend ko, sobrang dali ng buong trip. Everything went smoothly and organized. We didn't stress at all and focused lang kami sa pag-explore and picture taking. Definitely worth it!"
                            </blockquote>
                            <div class="testi-footer">
                                <div class="testi-avatar">CC</div>
                                <div>
                                    <cite class="testi-name">Christian Cruz</cite>
                                    <span class="testi-detail">First-Time Traveller &middot; South Korea</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-slide">
                        <div class="testi-card">
                            <div class="testi-stars">⭐⭐⭐⭐⭐</div>
                            <blockquote>
                                "Finally, natuloy din! Me and my best friend always dreamed of going to China, parang napapanood lang namin sa C-dramas before. The whole plan was easy and well arranged. Super unforgettable experience!"
                            </blockquote>
                            <div class="testi-footer">
                                <div class="testi-avatar">KR</div>
                                <div>
                                    <cite class="testi-name">Kathlyn Ramos</cite>
                                    <span class="testi-detail">Traveler &middot; China</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-slide">
                        <div class="testi-card">
                            <div class="testi-stars">⭐⭐⭐⭐ <span style="opacity:0.4">⭐</span> <small>(4.9)</small></div>
                            <blockquote>
                                "Booking was very easy and organized. I traveled with my employees and everything went smoothly from start to finish. It made our trip stress-free and enjoyable."
                            </blockquote>
                            <div class="testi-footer">
                                <div class="testi-avatar">AS</div>
                                <div>
                                    <cite class="testi-name">Angela Soriano</cite>
                                    <span class="testi-detail">Business Owner &middot; Batangas</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-slide">
                        <div class="testi-card">
                            <div class="testi-stars">⭐⭐⭐⭐ <span style="opacity:0.4">⭐</span> <small>(4.8)</small></div>
                            <blockquote>
                                "My wife, our young son, and I had a wonderful honeymoon trip. Everything was planned perfectly. We just enjoyed every moment without worrying about logistics."
                            </blockquote>
                            <div class="testi-footer">
                                <div class="testi-avatar">JA</div>
                                <div>
                                    <cite class="testi-name">John Aquino</cite>
                                    <span class="testi-detail">Occasional Traveller &middot; Singapore</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-slide">
                        <div class="testi-card">
                            <div class="testi-stars">⭐⭐⭐⭐ <span style="opacity:0.4">⭐</span> <small>(4.5)</small></div>
                            <blockquote>
                                "It was a sudden trip for me and my kids, but everything worked out perfectly. This trip gave us more time together before my son leaves for college. Very meaningful and smooth experience."
                            </blockquote>
                            <div class="testi-footer">
                                <div class="testi-avatar">MO</div>
                                <div>
                                    <cite class="testi-name">Maria Ocampo</cite>
                                    <span class="testi-detail">Traveler &middot; Thailand</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button class="slider-btn slider-btn--next" id="sliderNext" aria-label="Next testimonial">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>

        <div class="slider-dots" id="sliderDots"></div>
    </section>

    <!--CTA SECTION-->
<section class="cta-section">
    <div class="cta-inner">
        <p class="cta-accent">Your next journey awaits</p>

        <h2 class="cta-heading">
        Find your perfect trip,<br><em>your way</em>
        </h2>

        <p class="cta-sub">
            Whether custom-designed or curated, we create unforgettable experiences.
        </p>

        <div class="cta-buttons">
        <a href="#packages" class="cta-btn cta-btn--primary">
            <i class="fa-solid fa-paper-plane"></i>Browse featured packages
        </a>
        <a href="contact.html?concern=custom" class="cta-btn cta-btn--secondary">
            <i class="fa-solid fa-user-plus"></i> Ask for a custom itinerary
        </a>
        </div>
    </div>

    <div class="cta-trust">
        <p>Tailored experiences</p>
        <p class="cta-trust-dot"></p>
        <p>No hidden fees</p>
        <p class="cta-trust-dot"></p>
        <p>Personal travel support</p>
    </div>
</section>
    <!-- Button -->
    <button id="back-to-top" aria-label="Back to top">
    <i class="fa-solid fa-chevron-up"></i>
    </button>

    <!--(Footer)-->
    <footer class="site-footer">
        <div class="footer-inner">
            <div class="footer-main">
                <div class="footer-brand">
                    <a href="index.html" class="footer-logo">Bryvelrisse<br><span>Travel and Tours</span></a>
                    <p class="footer-tagline">Crafting unforgettable journeys since 2019. Your adventure begins with a single step.</p>
                    <div class="footer-socials">
                        <a href="https://www.facebook.com/share/1YTtkZ2UkY/" target="_blank" rel="noopener" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="tel:+639422699852" aria-label="Phone"><i class="fa-solid fa-phone"></i></a>
                        <a href="mailto:bryvelrissetravelandtours@gmail.com" aria-label="Email"><i class="fa-regular fa-envelope"></i></a>
                        <a href="https://www.google.com/maps/place/Bryvelrisse+Travel+and+Tours/@14.5233841,121.1476712,17z/data=!4m15!1m8!3m7!1s0x3397c6955a4ae49d:0xab32088e8de36c2d!2s336+E+Bautista+St,+Angono,+1930+Rizal!3b1!8m2!3d14.5233841!4d121.1476712!16s%2Fg%2F11f776jr0_!3m5!1s0x3397c78057d49b99:0xb929b7ba022f704f!8m2!3d14.5235852!4d121.1475056!16s%2Fg%2F11flbfqtfb?entry=ttu&g_ep=EgoyMDI2MDUxMy4wIKXMDSoASAFQAw%3D%3D" target="_blank" rel="noopener" aria-label="Location">
                            <i class="fa-solid fa-location-dot"></i>
                        </a>
                    </div>
                </div>

                <div class="footer-col">
                    <h4>Company</h4>
                    <ul>
                        <li><a href="about.html">About Us</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Support</h4>
                    <ul>
                        <li><a href="contact.html#faq">FAQ</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="terms.html" target="_blank">Terms</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-col footer-contact">
                <h4>Contact Info</h4>
                <ul class="footer-contact-list">
                    <li>
                        <i class="fa-solid fa-phone"></i>
                        <a href="tel:+639422699852">+63 942 269 9852</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-location-dot"></i>
                        <a href="https://www.google.com/maps/place/Bryvelrisse+Travel+and+Tours/@14.5233841,121.1476712,17z/data=!4m15!1m8!3m7!1s0x3397c6955a4ae49d:0xab32088e8de36c2d!2s336+E+Bautista+St,+Angono,+1930+Rizal!3b1!8m2!3d14.5233841!4d121.1476712!16s%2Fg%2F11f776jr0_!3m5!1s0x3397c78057d49b99:0xb929b7ba022f704f!8m2!3d14.5235852!4d121.1475056!16s%2Fg%2F11flbfqtfb?entry=ttu&g_ep=EgoyMDI2MDUxMy4wIKXMDSoASAFQAw%3D%3D" target="_blank" rel="noopener">336 E. Bautista St., Brgy. San Vicente, Angono, Philippines, 1930</a>
                    </li>
                    <li>
                        <i class="fa-regular fa-envelope"></i>
                        <a href="mailto:bryvelrissetravelandtours@gmail.com">bryvelrissetravelandtours@gmail.com</a>
                    </li>
                    <li>
                        <i class="fa-brands fa-facebook-f"></i>
                        <a href="https://www.facebook.com/share/1YTtkZ2UkY/" target="_blank" rel="noopener">Bryvelrisse Travel and Tours</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2026 Bryvelrisse Travel and Tours. All rights reserved.</p>
            <p>Designed with <i class="fa-solid fa-heart" style="color:#F0B13D;"></i> for every traveler</p>
        </div>
    </footer>
</body>

</html>
